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
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('username')
            ->maxLength('username', 20)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->integer('age')
            ->allowEmptyString('age');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('gender')
            ->notEmptyString('gender');

        $validator
            ->scalar('password')
            ->maxLength('password', 250)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('phoneNumber')
            ->maxLength('phoneNumber', 35)
            ->requirePresence('phoneNumber', 'create')
            ->notEmptyString('phoneNumber');
        
            $validator
            ->scalar('code')
            ->maxLength('code', 300)
            ->allowEmptyString('code');
        $validator
            ->notEmptyFile('image_file')
            ->add('image_file', [
                'mimeType'=>[
                    'rule'=>['mimeType',['image/png','image/jpg','image/jpeg']],
                  'message'=>'only jpg,jpeg,png files allowed.', 
                ],
                'fileSize'=>[
                  'rule'=>['filesize', '<=', '1MB'],
                  'message'=>'Image file size must be lessthan 1mb',
                ],
            ]);
        $validator
            ->notEmptyFile('image_change')
            ->add('image_change', [
                'mimeType' => [
                    'rule' => ['mimeType', ['image/png', 'image/jpg', 'image/jpeg']],
                    'message' => 'only jpg,jpeg,png files allowed.',
                ],
                'fileSize' => [
                    'rule' => ['filesize', '<=', '10MB'],
                    'message' => 'Image file size must be lessthan 1mb',
                ],
            ]);
       

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
        $rules->add($rules->isUnique(['username']), ['errorField' => 'username']);
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
}
