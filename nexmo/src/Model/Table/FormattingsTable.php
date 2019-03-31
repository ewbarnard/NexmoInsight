<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Formattings Model
 *
 * @property \App\Model\Table\ContactsTable|\Cake\ORM\Association\BelongsTo $Contacts
 *
 * @method \App\Model\Entity\Formatting get($primaryKey, $options = [])
 * @method \App\Model\Entity\Formatting newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Formatting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Formatting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Formatting saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Formatting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Formatting[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Formatting findOrCreate($search, callable $callback = null, $options = [])
 */
class FormattingsTable extends Table
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

        $this->setTable('formattings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Contacts', [
            'foreignKey' => 'contact_id',
            'joinType' => 'INNER'
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('intl_format_number')
            ->maxLength('intl_format_number', 255)
            ->requirePresence('intl_format_number', 'create')
            ->allowEmptyString('intl_format_number', false);

        $validator
            ->scalar('natl_format_number')
            ->maxLength('natl_format_number', 255)
            ->requirePresence('natl_format_number', 'create')
            ->allowEmptyString('natl_format_number', false);

        $validator
            ->scalar('country_code')
            ->maxLength('country_code', 16)
            ->requirePresence('country_code', 'create')
            ->allowEmptyString('country_code', false);

        $validator
            ->scalar('country_code_iso3')
            ->maxLength('country_code_iso3', 3)
            ->requirePresence('country_code_iso3', 'create')
            ->allowEmptyString('country_code_iso3', false);

        $validator
            ->scalar('country_name')
            ->maxLength('country_name', 255)
            ->requirePresence('country_name', 'create')
            ->allowEmptyString('country_name', false);

        $validator
            ->scalar('country_prefix')
            ->maxLength('country_prefix', 16)
            ->requirePresence('country_prefix', 'create')
            ->allowEmptyString('country_prefix', false);

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
        $rules->add($rules->existsIn(['contact_id'], 'Contacts'));

        return $rules;
    }
}
