<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Judges Controller
 *
 * @property \App\Model\Table\JudgesTable $Judges
 * @method \App\Model\Entity\Judge[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JudgesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $judges = $this->paginate($this->Judges);
        $judges = $this->Judges->find()->toArray();
        $this->set(compact('judges'));
    }

    /**
     * View method
     *
     * @param string|null $id Judge id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $judge = $this->Judges->get($id, [
            'contain' => ['Processes'],
        ]);

        $this->set(compact('judge'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $judge = $this->Judges->newEmptyEntity();
        if ($this->request->is('post')) {
            $judge = $this->Judges->patchEntity($judge, $this->request->getData());
            if ($this->Judges->save($judge)) {
                $this->Flash->success(__('The judge has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The judge could not be saved. Please, try again.'));
        }
        $this->set(compact('judge'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Judge id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $judge = $this->Judges->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $judge = $this->Judges->patchEntity($judge, $this->request->getData());
            if ($this->Judges->save($judge)) {
                $this->Flash->success(__('The judge has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The judge could not be saved. Please, try again.'));
        }
        $this->set(compact('judge'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Judge id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $judge = $this->Judges->get($id);
        if ($this->Judges->delete($judge)) {
            $this->Flash->success(__('The judge has been deleted.'));
        } else {
            $this->Flash->error(__('The judge could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
