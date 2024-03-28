<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table {

    public function initialize(array $config): void{
        parent::initialize($config);

        $this->addBehavior('Timestamp');


        //ajoute la liaison avec les Comments
        $this->hasMany('Comments', [
            'foreignKey' => 'user_id'
        ]);
    }


    public function validationDefault(Validator $validator): Validator{
        $validator
            ->maxLength('pseudo', 20)
            ->notEmptyString('pseudo');

        $validator
            ->maxLength('password', 250)
            ->notEmptyString('password');

        return $validator;
    }
}
