<?php

namespace App\Shell;

use Cake\Console\Shell;
use Nexmo\Client;
use Nexmo\Message\Message;

class DemoShell extends Shell {

    /** @var Client */
    private $client;

    public function main(...$args) {
        $this->client = new Client(new Client\Credentials\Basic(NEXMO_KEY, NEXMO_SECRET), [
        ]);
        $message = [];
        try {
            $message = $this->getInsight('1-651-555-0001');
            //$message = $this->getInsight('16515550000');
            //$message = $this->getMessageLog(NEXMO_MESSAGE_ID);
        } catch (Client\Exception\Request $e) {
            echo $e->getMessage() . PHP_EOL;
        } catch (Client\Exception\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
        print_r($message);
    }

    /**
     * @param string $number
     * @return mixed
     */
    private function getInsight(string $number) {
        /** @var \Nexmo\Insights\Basic $insight */
        $insight = $this->client->insights()->basic($number)->jsonSerialize();
        return $insight;
    }

    /**
     * @param string $id
     * @return array
     * @throws \Nexmo\Client\Exception\Exception
     * @throws \Nexmo\Client\Exception\Request
     */
    private function getMessageLog(string $id): array {
        $message = $this->client->message()->search($id);
        $log = [];
        $log['body'] = $message->getBody();
        $log['id'] = $message->getMessageId();
        $log['price'] = $message->getPrice();
        return $log;
    }

    /**
     * @return \Nexmo\Message\Message
     * @throws \Nexmo\Client\Exception\Exception
     * @throws \Nexmo\Client\Exception\Request
     * @throws \Nexmo\Client\Exception\Server
     */
    private function sendSms(): Message {
        return $this->client->message()->send([
            'to' => NEXMO_TO,
            'from' => NEXMO_FROM,
            'text' => NEXMO_TEXT,
        ])
            ;
    }
}
