<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Logs Controller
 *
 * @property \App\Model\Table\LogsTable $Logs
 */
class LogsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('logs', $this->paginate($this->Logs));
        $this->set('_serialize', ['logs']);
    }

    /**
     * View method
     *
     * @param string|null $id Log id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $log = $this->Logs->get($id, [
            'contain' => []
        ]);
        $this->set('log', $log);
        $this->set('_serialize', ['log']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $data = $this->request->data;
        $logsTable = TableRegistry::get('Logs');
        $log = $logsTable->newEntity();
        $log->level = $data['level'];
        $log->content = $data['message'];
        if ($logsTable->save($log)) {
        // L'entity $article contient maintenant l'id
            $id = $log->id;      
        }

 

    }

    /**
     * Edit method
     *
     * @param string|null $id Log id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $log = $this->Logs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $log = $this->Logs->patchEntity($log, $this->request->data);
            if ($this->Logs->save($log)) {
                $this->Flash->success(__('The log has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The log could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('log'));
        $this->set('_serialize', ['log']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Log id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $log = $this->Logs->get($id);
        if ($this->Logs->delete($log)) {
            $this->Flash->success(__('The log has been deleted.'));
        } else {
            $this->Flash->error(__('The log could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
