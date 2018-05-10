<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class FunanasTable extends Table{

    public function initialize(array $config){
        $this->belongsTo('account');
        $this->belongsTo('fruit');
        $this->belongsTo('skin');
        $this->belongsTo('record');
    }
}