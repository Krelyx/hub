<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DataTypes Controller
 *
 * @property \App\Model\Table\DataTypesTable $DataTypes
 */
class DataTypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('dataTypes', $this->paginate($this->DataTypes));
        $this->set('_serialize', ['dataTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Data Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dataType = $this->DataTypes->get($id, [
            'contain' => []
        ]);
        $this->set('dataType', $dataType);
        $this->set('_serialize', ['dataType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dataType = $this->DataTypes->newEntity();
        if ($this->request->is('post')) {
            $dataType = $this->DataTypes->patchEntity($dataType, $this->request->data);
            if ($this->DataTypes->save($dataType)) {
                $this->Flash->success(__('The data type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The data type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('dataType'));
        $this->set('_serialize', ['dataType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Data Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dataType = $this->DataTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dataType = $this->DataTypes->patchEntity($dataType, $this->request->data);
            if ($this->DataTypes->save($dataType)) {
                $this->Flash->success(__('The data type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The data type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('dataType'));
        $this->set('_serialize', ['dataType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Data Type id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dataType = $this->DataTypes->get($id);
        if ($this->DataTypes->delete($dataType)) {
            $this->Flash->success(__('The data type has been deleted.'));
        } else {
            $this->Flash->error(__('The data type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
