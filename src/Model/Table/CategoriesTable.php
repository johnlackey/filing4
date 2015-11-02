<?php
namespace App\Model\Table;

use App\Model\Entity\Category;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categories Model
 *
 */
class CategoriesTable extends Table
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

        $this->table('categories');
        $this->displayField('CatName');
        $this->primaryKey('CatId');

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
            ->add('CatId', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('CatId', 'create')
            ->add('CatId', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('CatName')
            ->add('CatName', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('Catnote');

        $validator
            ->requirePresence('Viewable', 'create')
            ->notEmpty('Viewable');

        $validator
            ->allowEmpty('TimeStamp');

        return $validator;
    }
}
