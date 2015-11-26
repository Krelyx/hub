<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;

/**
 * Scenarios Controller
 *
 * @property \App\Model\Table\ScenariosTable $Scenarios
 */
class ScenariosController extends AppController
{

    /*
     * Activate script method
     */
    public function activateScenario($id)
    {
        $scenariosTable = TableRegistry::get('Scenarios');
        $scenario = $scenariosTable->get($id);
        
        $http = new Client();
        $master_address = \Cake\Core\Configure::read('Master.master_address');
        $master_port = \Cake\Core\Configure::read('Master.master_port');
        $address = $master_address.':'.$master_port.'/master/activateScript?script_file='.$scenario->script_file;
        $response = $http->get((string)$address);
      
        $scenario->status = true;
        $scenariosTable->save($scenario);
        $this->Flash->success('Scenario activated');
        return $this->redirect(['action' => 'view'.'/'.$id]);
    }  
    
    /*
    * Desactivate script method
    */
    public function desactivateScenario($id)
    {
        $scenariosTable = TableRegistry::get('Scenarios');
        $scenario = $scenariosTable->get($id); 

        $http = new Client();
        $master_address = \Cake\Core\Configure::read('Master.master_address');
        $master_port = \Cake\Core\Configure::read('Master.master_port');
        $address = $master_address.':'.$master_port.'/master/desactivateScript?script_file='.$scenario->script_file;
        $response = $http->get((string)$address);

        $scenario->status = false;
        $scenariosTable->save($scenario);
        $this->Flash->success('Scenario desactivated');
        return $this->redirect(['action' => 'view'.'/'.$id]);        
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('scenarios', $this->paginate($this->Scenarios));
        $this->set('_serialize', ['scenarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Scenario id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $scenario = $this->Scenarios->get($id, [
            'contain' => []
        ]);
        $this->set('scenario', $scenario);
        $this->set('_serialize', ['scenario']);
        
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $scenario = $this->Scenarios->newEntity();
        if ($this->request->is('post')) {
            $scenario = $this->Scenarios->patchEntity($scenario, $this->request->data);
            if ($this->Scenarios->save($scenario)) {
                $this->Flash->success(__('The scenario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The scenario could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('scenario'));
        $this->set('_serialize', ['scenario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Scenario id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $scenario = $this->Scenarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scenario = $this->Scenarios->patchEntity($scenario, $this->request->data);
            if ($this->Scenarios->save($scenario)) {
                $this->Flash->success(__('The scenario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The scenario could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('scenario'));
        $this->set('_serialize', ['scenario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Scenario id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $scenario = $this->Scenarios->get($id);
        if ($this->Scenarios->delete($scenario)) {
            $this->Flash->success(__('The scenario has been deleted.'));
        } else {
            $this->Flash->error(__('The scenario could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
