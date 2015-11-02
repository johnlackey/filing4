<?php
namespace App\Model\Table;

use App\Model\Entity\Item;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 *
 */
class ItemsTable extends Table
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

        $this->table('items');
        $this->displayField('ItemName');
        $this->primaryKey('RecordId');
        $this->belongsTo(
                'Locations',
                [
                    'foreignKey' => 'LocId',
                    'bindingKey' => 'LocId',
                ]
        );
        $this->belongsTo(
                'Categories',
                [
                    'foreignKey' => 'CatId',
                    'bindingKey' => 'CatId',
                ]
        );
        $this->belongsTo(
                'Statuses',
                [
                    'foreignKey' => 'Status',
                    'bindingKey' => 'id',
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
            ->add('RecordId', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('RecordId', 'create')
            ->add('RecordId', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->add('NumItemId', 'valid', ['rule' => 'numeric'])
            ->requirePresence('NumItemId', 'create')
            ->notEmpty('NumItemId');

        $validator
            ->requirePresence('TextItemId', 'create')
            ->notEmpty('TextItemId');

        $validator
            ->add('LocId', 'valid', ['rule' => 'numeric'])
            ->requirePresence('LocId', 'create')
            ->notEmpty('LocId');

        $validator
            ->allowEmpty('ItemName');

        $validator
            ->allowEmpty('Keywords');

        $validator
            ->add('CatId', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('CatId');

        $validator
            ->allowEmpty('ActionDate');

        $validator
            ->allowEmpty('DateCreated');

        $validator
            ->add('ReviewFreq', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ReviewFreq', 'create')
            ->notEmpty('ReviewFreq');

        $validator
            ->allowEmpty('ItemNote');

        $validator
            ->requirePresence('IsTagged', 'create')
            ->notEmpty('IsTagged');

        $validator
            ->add('Status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('Status', 'create')
            ->notEmpty('Status');

        $validator
            ->allowEmpty('TimeStamp');

        $validator
            ->allowEmpty('ItemNotes');

        return $validator;
    }
}
