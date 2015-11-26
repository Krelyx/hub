<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Http\Client;

/**
 * Nodes Controller
 *
 * @property \App\Model\Table\NodesTable $Nodes
 */
class NodesController extends AppController
{
    /*
     * SendCodeToNode method
     * 
     */
    public function sendCodeToNode($id) 
    {
        $http = new Client();
        $node = $this->Nodes->get($id, [
            'fields' => 'node_code'
        ]);
        $node_code = $node['node_code'];
        $master_address = \Cake\Core\Configure::read('Master.master_address');
        $master_port = \Cake\Core\Configure::read('Master.master_port');
        $address = $master_address.':'.$master_port.'/node/link?target='.$node_code.'&sender=1';
        $response = $http->get((string)$address);
        $this->Flash->success('Code sent');
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('nodes', $this->paginate($this->Nodes));
        $this->set('_serialize', ['nodes']);
    }

    /**
     * View method
     *
     * @param string|null $id Node id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $node = $this->Nodes->get($id, [
            'contain' => []
        ]);
        $this->set('node', $node);
        $this->set('_serialize', ['node']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $node = $this->Nodes->newEntity();
        if ($this->request->is('post')) {
            $node = $this->Nodes->patchEntity($node, $this->request->data);
            if ($this->Nodes->save($node)) {
                $this->Flash->success(__('The node has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The node could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('node'));
        $this->set('_serialize', ['node']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Node id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $node = $this->Nodes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $node = $this->Nodes->patchEntity($node, $this->request->data);
            if ($this->Nodes->save($node)) {
                $this->Flash->success(__('The node has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The node could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('node'));
        $this->set('_serialize', ['node']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Node id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $node = $this->Nodes->get($id);
        if ($this->Nodes->delete($node)) {
            $this->Flash->success(__('The node has been deleted.'));
        } else {
            $this->Flash->error(__('The node could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
