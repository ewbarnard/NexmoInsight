<?php

namespace App\Shell;

use Cake\Console\Shell;
use Cake\ORM\TableRegistry;
use ErrorException;
use Exception;
use Nexmo\Client;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class InsightShell extends Shell {

    public function main(...$args) {
        $this->verbose('Begin insight consumer');

        $url = parse_url(CLOUDAMQP_URL);
        $vhost = substr($url['path'], 1);
        $connection = new AMQPStreamConnection($url['host'], 5672, $url['user'], $url['pass'], $vhost);
        $channel = $connection->channel();
        $channel->exchange_declare(CLOUDAMQP_EXCHANGE, 'direct', false, true, false);

        $channel->queue_declare(CLOUDAMQP_QUEUE, false, true, false, false);
        $channel->queue_bind(CLOUDAMQP_QUEUE, CLOUDAMQP_EXCHANGE);

        $callback = function (AMQPMessage $message) {
            $this->processMessage($message);
        };

        $this->verbose('Consuming...');
        $channel->basic_consume(CLOUDAMQP_QUEUE, '', false, false, false, false, $callback);

        try {
            while (count($channel->callbacks)) {
                $channel->wait();
            }
        } catch (ErrorException $e) {
            $this->out($e->getMessage());
        }

        $channel->close();
        $connection->close();
    }

    private function processMessage(AMQPMessage $message) {
        try {
            $payload = json_decode($message->body, true);
            $contactId = (int)$payload['contactId'];
            $number = (string)$payload['number'];
            $this->callNexmo($contactId, $number);
        } catch (Exception $e) {
            $this->out($e->getMessage());
        }

        $this->ackMessage($message);
    }

    private function callNexmo(int $contactId, string $number): void {
        $client = new Client(new Client\Credentials\Basic(NEXMO_KEY, NEXMO_SECRET));
        $insight = $client->insights()->basic($number)->jsonSerialize();
        $insight['contact_id'] = $contactId;
        $insight['intl_format_number'] = $insight['international_format_number'];
        $insight['natl_format_number'] = $insight['national_format_number'];
        $formattings = TableRegistry::getTableLocator()->get('Formattings');
        $entity = $formattings->newEntity($insight, ['associated' => []]);
        $formattings->save($entity);
    }

    private function ackMessage(AMQPMessage $message) {
        /** @var \PhpAmqpLib\Channel\AMQPChannel $channel */
        $channel = $message->delivery_info['channel'];
        $channel->basic_ack($message->delivery_info['delivery_tag']);
    }
}
