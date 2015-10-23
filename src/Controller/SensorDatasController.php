<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


class SensorDatasController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sensors']
        ];
        $this->set('sensorDatas', $this->paginate($this->SensorDatas));
        $this->set('_serialize', ['sensorDatas']);
    }

    
    public function addtest(){
        
        $data = $this->request->input('json_decode', true );
        $sender_data = $data['sender'];
        $type_data = $data['type'];
/*
 * @todo changer cette merde
 */        
        $options = array(
            'fields' => array(
		'Sensors.id',
            ),
            'joins' => array(
		array(
                	'conditions' => array(
                	'Sensors.node_code_id = Nodes.id',
                    ),
                    'table' => 'nodes',
                    'alias' => 'Nodes',
                    'type' => 'join',
		),
            ),
            'conditions' => array(
		'Nodes.node_code' => $sender_data,
		'DataTypes.type' => $type_data,
            ),
            'contain' => array(
		'Nodes',
		'DataTypes',
            ),
        );
        $sensor = TableRegistry::get('Sensors');
        /*
         * @todo finir cette fonction
         * $sensor_id = $sensor->find('sensor',[
            'sender'=> $sender_data,
            'type' => $type_data
                ]);
         * 
         */
        
        
        $sensor_id = $sensor->find('all', $options);
        $sensordataTable = TableRegistry::get('SensorDatas');
        $sensordata = $sensordataTable->newEntity();
        $sensordata->sensor_id = $sensor_id;
        $sensordata->value = $data['value'];
        if ($sensordataTable->save($sensordata)) {
        // L'entity $article contient maintenant l'id
            $id = $sensordata->id;
        }
        
    }

    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100,
        'fields' => [
            'sensor_id', 'value', 'created'
        ],
        'sortWhitelist' => [
            'sensor_id', 'value', 'created'
        ]
    ];
}