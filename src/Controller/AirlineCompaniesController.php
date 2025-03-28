<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * AirlineCompanies Controller
 *
 * @property \App\Model\Table\AirlineCompaniesTable $AirlineCompanies
 * @method \App\Model\Entity\AirlineCompany[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AirlineCompaniesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $airlineCompanies = $this->AirlineCompanies->find()->toArray();
        $this->set(compact('airlineCompanies'));
    }

    /**
     * View method
     *
     * @param string|null $id Airline Company id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $airlineCompany = $this->AirlineCompanies->get($id, [
            'contain' => ['Processes'],
        ]);

        $this->set(compact('airlineCompany'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $airlineCompany = $this->AirlineCompanies->newEmptyEntity();
        if ($this->request->is('post')) {
            $airlineCompany = $this->AirlineCompanies->patchEntity($airlineCompany, $this->request->getData());
            if ($this->AirlineCompanies->save($airlineCompany)) {
                $this->Flash->success(__('The airline company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The airline company could not be saved. Please, try again.'));
        }
        $this->set(compact('airlineCompany'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Airline Company id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $airlineCompany = $this->AirlineCompanies->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $airlineCompany = $this->AirlineCompanies->patchEntity($airlineCompany, $this->request->getData());
            if ($this->AirlineCompanies->save($airlineCompany)) {
                $this->Flash->success(__('The airline company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The airline company could not be saved. Please, try again.'));
        }
        $this->set(compact('airlineCompany'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Airline Company id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $airlineCompany = $this->AirlineCompanies->get($id);
        if ($this->AirlineCompanies->delete($airlineCompany)) {
            $this->Flash->success(__('The airline company has been deleted.'));
        } else {
            $this->Flash->error(__('The airline company could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
