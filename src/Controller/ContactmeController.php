<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Contactme Controller
 *
 * @property \App\Model\Table\ContactmeTable $Contactme
 * @method \App\Model\Entity\Contactme[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactmeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $contactme = $this->paginate($this->Contactme);

        $this->set(compact('contactme'));
    }

    /**
     * View method
     *
     * @param string|null $id Contactme id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contactme = $this->Contactme->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('contactme'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactme = $this->Contactme->newEmptyEntity();
        if ($this->request->is('post')) {
            $contactme = $this->Contactme->patchEntity($contactme, $this->request->getData());
            if ($this->Contactme->save($contactme)) {
                $this->Flash->success(__('The contactme has been saved.'));

            }
            $this->Flash->error(__('The contactme could not be saved. Please, try again.'));
        }
        $this->set(compact('contactme'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contactme id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactme = $this->Contactme->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactme = $this->Contactme->patchEntity($contactme, $this->request->getData());
            if ($this->Contactme->save($contactme)) {
                $this->Flash->success(__('The contactme has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contactme could not be saved. Please, try again.'));
        }
        $this->set(compact('contactme'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contactme id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactme = $this->Contactme->get($id);
        if ($this->Contactme->delete($contactme)) {
            $this->Flash->success(__('The contactme has been deleted.'));
        } else {
            $this->Flash->error(__('The contactme could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
