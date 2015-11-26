<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
require_once(ROOT.DS.'plugins'.DS.'GoogleCharts'.DS.'vendor'.DS.'GoogleCharts.php');
use GoogleCharts ;
//App::uses('GoogleCharts', 'GoogleCharts.Lib');
/**
 * Sensors Controller
 *
 * @property \App\Model\Table\SensorsTable $Sensors
 */
class SensorsController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Nodes', 'DataTypes']
        ];
        $this->set('sensors', $this->paginate($this->Sensors));
        $this->set('_serialize', ['sensors']);
    }

    /**
     * View method
     *
     * @param string|null $id Sensor id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $sensor = $this->Sensors->get($id, [
            'contain' => ['Nodes', 'DataTypes']
        ]);
        $this->set('sensor', $sensor);

        $sensordatasTable = TableRegistry::get('SensorDatas');
        $sensordatas = $sensordatasTable
                ->find()
                ->where(['sensor_id =' => $id])
                ->toArray();
        $this->set('sensordatas', $sensordatas);
        $this->set(compact('sensordatas'));
        $this->set('_serialize', ['sensor', 'sensordatas']);
        
        $symbol = $this->Sensors->DataTypes->find()
                ->select('symbol')
                ->where(['id = ' => $sensor['data_type_id']])
                ->first();
        $symbol = $symbol['symbol'];
        $this->set('symbol', $symbol);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $sensor = $this->Sensors->newEntity();
        if ($this->request->is('post')) {
            $sensor = $this->Sensors->patchEntity($sensor, $this->request->data);
            if ($this->Sensors->save($sensor)) {
                $this->Flash->success(__('The sensor has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sensor could not be saved. Please, try again.'));
            }
        }
        $nodes = $this->Sensors->Nodes->find('list', ['limit' => 200]);
        $dataTypes = $this->Sensors->DataTypes->find('list', ['limit' => 200]);
        $this->set(compact('sensor', 'nodes', 'dataTypes'));
        $this->set('_serialize', ['sensor']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sensor id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $sensor = $this->Sensors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sensor = $this->Sensors->patchEntity($sensor, $this->request->data);
            if ($this->Sensors->save($sensor)) {
                $this->Flash->success(__('The sensor has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sensor could not be saved. Please, try again.'));
            }
        }
        $nodes = $this->Sensors->Nodes->find('list', ['limit' => 200]);
        $dataTypes = $this->Sensors->DataTypes->find('list', ['limit' => 200]);
        $this->set(compact('sensor', 'nodes', 'dataTypes'));
        $this->set('_serialize', ['sensor']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sensor id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $sensor = $this->Sensors->get($id);
        if ($this->Sensors->delete($sensor)) {
            $this->Flash->success(__('The sensor has been deleted.'));
        } else {
            $this->Flash->error(__('The sensor could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
