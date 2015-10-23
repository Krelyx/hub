<?php
namespace App\Model\Table;

use App\Model\Entity\Sensor;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sensors Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Nodes
 * @property \Cake\ORM\Association\BelongsTo $DataTypes
 */
class SensorsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('sensors');
        $this->displayField('name');
        $this->primaryKey('id');    

        $this->belongsTo('Nodes', [
            'foreignKey'=>'node_code_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('DataTypes', [
            'foreignKey'=>'data_type_id',
            'joinType'=>'INNER',
        ]);
                
                
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['node_code_id'], 'Nodes'));
        $rules->add($rules->existsIn(['data_type_id'], 'DataTypes'));
        $rules->add($rules->isUnique(['node_code_id', 'data_type_id']));
        return $rules;
    }
    
    public function findSensor(Query $query, array $options)
    {      
        return $this->find()
            ->select(['id'])
            ->join([
                'n' => [
                    'table' => 'nodes',
                    'type' => 'INNER',
                    'conditions' => 'n.id = node_code_id'
                ],
                'd' => [
                    'table' => 'data_types',
                    'type' => 'INNER',
                    'conditions' => 'd.id = data_type_id'
                ]
            ])
            ->contain(['n.node_code =' => $options['sender']] and ['d.data_type =' => $options['type']])
            ->first();    ;       
    }





}

