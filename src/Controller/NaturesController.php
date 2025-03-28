<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Natures Controller
 *
 * @property \App\Model\Table\NaturesTable $Natures
 * @method \App\Model\Entity\Nature[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NaturesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $natures = $this->paginate($this->Natures);

        $this->set(compact('natures'));
    }

    /**
     * View method
     *
     * @param string|null $id Nature id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nature = $this->Natures->get($id, [
            'contain' => ['Processes'],
        ]);

        $this->set(compact('nature'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nature = $this->Natures->newEmptyEntity();
        if ($this->request->is('post')) {
            $nature = $this->Natures->patchEntity($nature, $this->request->getData());
            if ($this->Natures->save($nature)) {
                $this->Flash->success(__('The nature has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nature could not be saved. Please, try again.'));
        }
        $this->set(compact('nature'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Nature id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nature = $this->Natures->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nature = $this->Natures->patchEntity($nature, $this->request->getData());
            if ($this->Natures->save($nature)) {
                $this->Flash->success(__('The nature has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nature could not be saved. Please, try again.'));
        }
        $this->set(compact('nature'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Nature id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nature = $this->Natures->get($id);
        if ($this->Natures->delete($nature)) {
            $this->Flash->success(__('The nature has been deleted.'));
        } else {
            $this->Flash->error(__('The nature could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
