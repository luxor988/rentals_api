<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Apartments Model
 *
 * @property \App\Model\Table\ApartmentTypesTable&\Cake\ORM\Association\BelongsTo $ApartmentTypes
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Apartment newEmptyEntity()
 * @method \App\Model\Entity\Apartment newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Apartment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Apartment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Apartment findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Apartment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Apartment[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Apartment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Apartment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Apartment[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Apartment[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Apartment[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Apartment[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ApartmentsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('apartments');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ApartmentTypes', [
            'foreignKey' => 'apartment_type_id',
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('apartment_type_id')
            ->allowEmptyString('apartment_type_id');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->allowEmptyString('title');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmptyString('address');

        $validator
            ->scalar('zipcode')
            ->maxLength('zipcode', 10)
            ->allowEmptyString('zipcode');

        $validator
            ->scalar('apartment_number')
            ->maxLength('apartment_number', 10)
            ->allowEmptyString('apartment_number');

        $validator
            ->integer('floor')
            ->allowEmptyString('floor');

        $validator
            ->integer('rooms')
            ->allowEmptyString('rooms');

        $validator
            ->integer('bathrooms')
            ->allowEmptyString('bathrooms');

        $validator
            ->boolean('has_heating')
            ->allowEmptyString('has_heating');

        $validator
            ->boolean('has_gas')
            ->allowEmptyString('has_gas');

        $validator
            ->boolean('has_parking')
            ->allowEmptyString('has_parking');

        $validator
            ->numeric('apartment_size')
            ->allowEmptyString('apartment_size');

        $validator
            ->boolean('is_occuped')
            ->allowEmptyString('is_occuped');

        $validator
            ->integer('status_id')
            ->allowEmptyString('status_id');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('apartment_type_id', 'ApartmentTypes'), ['errorField' => 'apartment_type_id']);
        $rules->add($rules->existsIn('status_id', 'Statuses'), ['errorField' => 'status_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
