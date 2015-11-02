<?php
namespace App\Model\Table;

use App\Model\Entity\Location;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Locations Model
 *
 */
class LocationsTable extends Table
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

        $this->table('locations');
        $this->displayField('LocName');
        $this->primaryKey('LocId');
        $this->hasMany(
                'Items',
                [
                    'foreignKey' => 'LocId',
                    'bindingKey' => 'LocId',
                ]
        );

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
            ->add('LocId', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('LocId', 'create')
            ->add('LocId', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('LocName');

        $validator
            ->allowEmpty('LocNote');

        $validator
            ->allowEmpty('DateCreated');

        $validator
            ->requirePresence('AllowDecimals', 'create')
            ->notEmpty('AllowDecimals');

        $validator
            ->add('MaxCapacity', 'valid', ['rule' => 'numeric'])
            ->requirePresence('MaxCapacity', 'create')
            ->notEmpty('MaxCapacity');

        $validator
            ->requirePresence('Viewable', 'create')
            ->notEmpty('Viewable');

        $validator
            ->allowEmpty('ReviewFreqString');

        $validator
            ->allowEmpty('Timestamp');

        return $validator;
    }
}
