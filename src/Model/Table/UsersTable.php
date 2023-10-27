<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\ApartmentsTable&\Cake\ORM\Association\HasMany $Apartments
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
        ]);
        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
        ]);
        $this->hasMany('Apartments', [
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
            ->scalar('name')
            ->maxLength('name', 150)
            ->allowEmptyString('name');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 150)
            ->allowEmptyString('lastname');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->allowEmptyString('password');

        $validator
            ->integer('status_id')
            ->allowEmptyString('status_id');

        $validator
            ->integer('role_id')
            ->allowEmptyString('role_id');

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
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->existsIn('status_id', 'Statuses'), ['errorField' => 'status_id']);
        $rules->add($rules->existsIn('role_id', 'Roles'), ['errorField' => 'role_id']);

        return $rules;
    }

    public function verify($dataPost) {
        $response = [
            'error' => true
        ];

        $conditions = [
            'email' => @$dataPost['username'],
            'password' => hash('md5', trim(@$dataPost['password'])),
            'Users.status_id' => 1
        ];

        $user = $this->find()
            ->where($conditions)
            ->contain(['Roles'])
            ->first();

        if (is_object($user)) {
            $response = [
                'error' => false,
                'info' => $user
            ];
        }

        return $response;
    }

    private function validateRegister($dataPost) {
        $response = [
            'error' => false
        ];


        if (empty($dataPost["name"]) || empty($dataPost["lastname"]) || empty($dataPost["email"]) || empty($dataPost["password"]) ) {
            $response['error'] = true;
            $response['error_description'] = 'Invalid fields';

            return $response;
        }


        $uniques = $this->find()->where(["email" => $dataPost["email"]])->count();

        if ($uniques > 0) {
            $response['error'] = true;
            $response['error_description'] = 'Email already used.';
        }

        return $response;
    }


    public function register($dataPost) {
        $response = [
            'error' => true
        ];

        $validation = $this->validateRegister($dataPost);

        if (!$validation['error']) {
            $user = $this->newEmptyEntity();
            $newUser = [
                'status_id' => 1,
                'role_id' => 2,
                'name' => @$dataPost['name'],
                'lastname' => @$dataPost['lastname'],
                'email' => @$dataPost['email'],
                'password' => hash('md5', trim(@$dataPost['password'])),
            ];
            $user = $this->patchEntity($user, $newUser);

            if ($this->save($user)) {
                $response['error'] = false;
            } else {
                $response['error_code'] = true;
                $response['error_description'] = $user->getErrors();
            }
        } else {
            $response = $validation;
        }

        return $response;
    }


}
