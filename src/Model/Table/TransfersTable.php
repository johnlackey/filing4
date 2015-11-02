<?php
namespace App\Model\Table;

use App\Model\Entity\Transfer;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transfers Model
 *
 */
class TransfersTable extends Table
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

        $this->table('transfers');
        $this->displayField('TransferId');
        $this->primaryKey('TransferId');
        $this->belongsTo(
                'Items',
                [
                    'foreignKey' => 'OldItemRecId',
                    'bindingKey' => 'RecordId',
                ]
        );
        $this->belongsTo(
                'NewItems',
                [
                    'className' => 'Items',
                    'foreignKey' => 'NewItemRecId',
                    'bindingKey' => 'RecordId',
                ]
        );
        $this->belongsTo(
                'OldLocations',
                [
                    'className' => 'Locations',
                    'foreignKey' => 'OldLocId',
                    'bindingKey' => 'LocId',
                ]
        );
        $this->belongsTo(
                'NewLocations',
                [
                    'className' => 'Locations',
                    'foreignKey' => 'NewLocId',
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
            ->add('TransferId', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('TransferId', 'create')
            ->add('TransferId', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->add('OldLocId', 'valid', ['rule' => 'numeric'])
            ->requirePresence('OldLocId', 'create')
            ->notEmpty('OldLocId');

        $validator
            ->add('OldItemId', 'valid', ['rule' => 'numeric'])
            ->requirePresence('OldItemId', 'create')
            ->notEmpty('OldItemId');

        $validator
            ->add('OldItemRecId', 'valid', ['rule' => 'numeric'])
            ->requirePresence('OldItemRecId', 'create')
            ->notEmpty('OldItemRecId');

        $validator
            ->add('NewLocId', 'valid', ['rule' => 'numeric'])
            ->requirePresence('NewLocId', 'create')
            ->notEmpty('NewLocId');

        $validator
            ->add('NewItemId', 'valid', ['rule' => 'numeric'])
            ->requirePresence('NewItemId', 'create')
            ->notEmpty('NewItemId');

        $validator
            ->add('NewItemRecId', 'valid', ['rule' => 'numeric'])
            ->requirePresence('NewItemRecId', 'create')
            ->notEmpty('NewItemRecId');

        $validator
            ->requirePresence('IsConfirmed', 'create')
            ->notEmpty('IsConfirmed');

        $validator
            ->allowEmpty('TransferDate');

        $validator
            ->allowEmpty('ConfirmDate');

        $validator
            ->requirePresence('IsCancelled', 'create')
            ->notEmpty('IsCancelled');

        $validator
            ->allowEmpty('TransferType');

        $validator
            ->allowEmpty('UserId');

        return $validator;
    }
}
