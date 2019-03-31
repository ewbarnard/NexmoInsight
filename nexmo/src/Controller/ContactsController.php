<?php

namespace App\Controller;

use App\Model\Entity\Contact;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\TableRegistry;
use Nexmo\Client;

/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 *
 * @method Contact[]|ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactsController extends AppController {
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $contacts = $this->paginate($this->Contacts);

        $this->set(compact('contacts'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $contact = $this->Contacts->get($id, [
            'contain' => ['Formattings'],
        ]);

        $this->set('contact', $contact);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $contact = $this->Contacts->newEntity();
        if ($this->request->is('post')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->nexmoFormatNumber($contact->id, $contact->phone);
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $this->set(compact('contact'));
    }

    private function nexmoFormatNumber(int $contactId, string $number): void {
        $client = new Client(new Client\Credentials\Basic(NEXMO_KEY, NEXMO_SECRET));
        $insight = $client->insights()->basic($number)->jsonSerialize();
        $insight['contact_id'] = $contactId;
        $insight['intl_format_number'] = $insight['international_format_number'];
        $insight['natl_format_number'] = $insight['national_format_number'];
        $formattings = TableRegistry::getTableLocator()->get('Formattings');
        $entity = $formattings->newEntity($insight, ['associated' => []]);
        $formattings->save($entity);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $contact = $this->Contacts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->getData());
            if ($this->Contacts->save($contact)) {
                $this->nexmoFormatNumber($contact->id, $contact->phone);
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $this->set(compact('contact'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $contact = $this->Contacts->get($id);
        if ($this->Contacts->delete($contact)) {
            $this->Flash->success(__('The contact has been deleted.'));
        } else {
            $this->Flash->error(__('The contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
