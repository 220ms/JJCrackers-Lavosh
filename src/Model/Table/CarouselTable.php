<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Carousel Model
 *
 * @method \App\Model\Entity\Carousel newEmptyEntity()
 * @method \App\Model\Entity\Carousel newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Carousel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Carousel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Carousel findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Carousel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Carousel[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Carousel|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Carousel saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Carousel[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Carousel[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Carousel[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Carousel[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CarouselTable extends Table
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

        $this->setTable('carousel');
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
            ->scalar('photo')
            ->maxLength('photo', 255)
            ->requirePresence('photo', 'create')
            ->notEmptyString('photo');
        
        $validator
            ->allowEmptyFile('change_photo')
            ->add('change_photo', [
                'mimeType' =>[
                    'rule' => [ 'mimeType', ['image/jpg', 'image/png', 'image/jpeg'] ],
                    'message' => 'Please upload only jpg and png.',
                ],
                'fileSize' => [
                    'rule' => [ 'fileSize', '<=', '10MB' ],
                    'message' => 'Image file size must be less than 1MB.',
                ],
            ] );

        $validator
            ->scalar('heading')
            ->maxLength('heading', 20)
            ->requirePresence('heading', 'create')
            ->notEmptyString('heading');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        return $validator;
    }
}
