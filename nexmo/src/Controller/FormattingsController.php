<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Formattings Controller
 *
 * @property \App\Model\Table\FormattingsTable $Formattings
 *
 * @method \App\Model\Entity\Formatting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FormattingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Contacts']
        ];
        $formattings = $this->paginate($this->Formattings);

        $this->set(compact('formattings'));
    }

    /**
     * View method
     *
     * @param string|null $id Formatting id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formatting = $this->Formattings->get($id, [
            'contain' => ['Contacts']
        ]);

        $this->set('formatting', $formatting);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formatting = $this->Formattings->newEntity();
        if ($this->request->is('post')) {
            $formatting = $this->Formattings->patchEntity($formatting, $this->request->getData());
            if ($this->Formattings->save($formatting)) {
                $this->Flash->success(__('The formatting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formatting could not be saved. Please, try again.'));
        }
        $contacts = $this->Formattings->Contacts->find('list', ['limit' => 200]);
        $this->set(compact('formatting', 'contacts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Formatting id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formatting = $this->Formattings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formatting = $this->Formattings->patchEntity($formatting, $this->request->getData());
            if ($this->Formattings->save($formatting)) {
                $this->Flash->success(__('The formatting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formatting could not be saved. Please, try again.'));
        }
        $contacts = $this->Formattings->Contacts->find('list', ['limit' => 200]);
        $this->set(compact('formatting', 'contacts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Formatting id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formatting = $this->Formattings->get($id);
        if ($this->Formattings->delete($formatting)) {
            $this->Flash->success(__('The formatting has been deleted.'));
        } else {
            $this->Flash->error(__('The formatting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
