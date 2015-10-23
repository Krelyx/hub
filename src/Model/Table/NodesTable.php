<?php
namespace App\Model\Table;

use App\Model\Entity\Node;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nodes Model
 *
 */
class NodesTable extends Table
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

        $this->table('nodes');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->hasMany('Sensors');

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

        $validator
            ->add('node_code', 'valid', ['rule' => 'numeric'])
            ->requirePresence('node_code', 'create')
            ->notEmpty('node_code')
            ->add('node_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }
}