<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class FunanaController extends AppController{

    public function initialize(){
        $this->funanas = TableRegistry::get('funanas');
        $this->account = TableRegistry::get('account');
        $this->fruit = TableRegistry::get('fruit');
        $this->skin = TableRegistry::get('skin');
        $this->record = TableRegistry::get('record');
    }

    public function index(){
        $session = $this->request->session();
        $this->set('entity',$this->account->newEntity());
        $data = $this->account->find('all');
        $this->set('data',$data);
    }

    //ユーザー作成画面
    public function regist(){
        $data = $this->account->find('all');
        $this->set('data',$data);
        $this->set('entity',$this->account->newEntity());
    }
    
    public function registConfirmation(){
        if($this->request->is('post')){
            $name = $_POST['NAME'];
            $mail = $_POST['MAiL'];
            $pass = $_POST['PASS'];
            $phone = $_POST['PHONE'];
            $this->set('entity',$this->account->newEntity());
            $board = $this->account->newEntity($this->request->data);
            $this->set('data',$board);
        }
    }

    //実際にユーザーを作成してる画面
    public function addRecord(){
        if($this->request->is('post')){
            $session = $this->request->session();
            $board = $this->account->newEntity($this->request->data);
            if($this->account->save($board)){
                $account = $this->account->find('all')->where(['NAME'=>$_POST['NAME']])
                $session->write('id',$account->ID);
                $this->redirect(['action'=>'friendList']);
            }
            $this->set('entity',$board);
        }
    }
    
    //友達一覧
    public function friendList(){
        if($this->request->is('post')){
            $data = $this->account->find('all')->where(['id'=>$session->read('id')]);
            if(count($data) > 0){
                foreach($data as $obj):
                if(strcmp($obj->pass, $_POST['pass']) == 0){
                    $session->write('id',$obj->id);
                    return $this->redirect(['action'=>'choice']);
                }
                endforeach;
            }
        }
    }
}