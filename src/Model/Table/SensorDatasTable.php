<?php
namespace App\Model\Table;

use App\Model\Entity\SensorData;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SensorDatas Model
 *
 */
class SensorDatasTable extends Table
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

        $this->table('sensor_datas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Sensors', [
            'foreignKey'=>'sensor_id',
            'joinType'=>'INNER',
        ]);
        $this->addBehavior('Timestamp');

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
            ->add('sender', 'valid', ['rule' => 'numeric'])
            ->requirePresence('sender', 'create')
            ->notEmpty('sender');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->add('value', 'valid', ['rule' => 'numeric'])
            ->requirePresence('value', 'create')
            ->notEmpty('value');

        return $validator;
    }
    
    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    /*public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['sensor_id'], 'Sensors'));
        return $rules;
    }*/
   /* public function findSensor(Query $query, array $options)
    {      
        return $this->find()
            ->select(['Sensors.id'])
            ->join([
                'n' => [
                    'table' => 'nodes',
                    'type' => 'INNER',
                    'conditions' => 'n.id = sensors.node_code_id'
                ],
                'd' => [
                    'table' => 'data_types',
                    'type' => 'INNER',
                    'conditions' => 'd.id = sensors.data_type_id'
                ]
            ])
            ->where(['n.node_code =' => $options['sender']]and ['d.data_type =' => $options['type']]);
            
    }
    * 
    */
}
