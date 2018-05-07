<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ShoplistsTable extends Table{

    public function initialize(array $config){
        $this->belongsTo('Testusers');
        $this->belongsTo('shops');
        $this->belongsTo('product');
    }
    
    public function validationDefault(Validator $validator){
        $validator->integer('id');
        $validator
            ->add('name','custom',[
                'rule'=>['custom',"/^[0-9a-z]+$/"],
                'message'=>__('英数字で入力してください'),
            ])
            ->notEmpty('username')
            ->minLength('username',6,'6文字以上で入力してください。')
            ->maxLength('username',20,'20文字以内で入力してください。');
        $validator
            ->add('display_name','custom',[
                'rule'=>['custom',"/^[0-9a-z]+$/"],
                'message'=>__('英数字で入力してください'),
            ])
            ->notEmpty('display_name')
            ->minLength('display_name',6,'6文字以上で入力してください。')
            ->maxLength('display_name',20,'20文字以内で入力してください。');
        $validator
            ->add('password','custom',[
                'rule'=>['custom',"/^[0-9a-z]+$/"],
                'message'=>__('英数字で入力してください'),
            ])
            ->minLength('password',8,'8文字以上で入力してください。')
            ->maxLength('password',16,'16文字以内で入力してください。');
    }
}