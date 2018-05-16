<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class FunanaController extends AppController{

    public function initialize(){
        $this->funanas = TableRegistry::get('funanas');
        $this->account = TableRegistry::get('account');
        $this->fruit = TableRegistry::get('fruit');
        $this->item = TableRegistry::get('item');
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
    
    public function registConfirmation($length = 5){
        if($this->request->is('post')){
            $name = $_POST['NAME'];
            $mail = $_POST['MAIL'];
            $pass = $_POST['PASS'];
            $phone = $_POST['PHONE'];
            $this->set('entity',$this->account->newEntity());
            $board = $this->account->newEntity($this->request->data);
            $pass2 = str_repeat('*', strlen($pass));
            $qrpass = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', $length)), 0, $length);
            $this->set('data',$board);
            $this->set('name',$name);
            $this->set('mail',$mail);
            $this->set('pass',$pass);
            $this->set('pass2',$pass2);
            $this->set('qrpass',$qrpass);
            $this->set('phone',$phone);
        }
    }

    //実際にユーザーを作成してる画面
    public function addRecord(){
        $session = $this->request->session();
        if($this->request->is('post')){
            $account_data = $this->account->newEntity($this->request->data);
            if($this->account->save($account_data)){
                $account = $this->account->find('all')->where(['NAME'=>$_POST['NAME']]);
                foreach($account as $obj){
                    $session->write('id',$obj->ID);
                }
                $new = $this->fruit->newEntity();
                $new->ID = $session->read('id');
                $new->ITEM_ID = 1;
                $new->ITEM_NAME = "趣味";
                $new->CONTENT = "音楽鑑賞";
                $this->fruit->save($new);//実テーブルを仮作成
                
                $new_skin = $this->fruit->newEntity();
                $new_skin->ID = $session->read('id');
                if($this->skin->save($new_skin)){//皮テーブル作成
                    $this->redirect(['action'=>'skinEdit']);
                }
            }
            $this->set('entity',$account_data);
        }
    }
    
    //ログイン画面
    public function login(){
        $session = $this->request->session();
        $this->set('entity',$this->account->newEntity());
        if($this->request->is('post')){
            if(isset($_POST['NAME'])){
                $data = $this->account->find('all')->where(['NAME' => $_POST['NAME']]);
                foreach($data as $obj){
                    if(strcmp($obj->PASS, $_POST['PASS']) == 0){
                        return $this->redirect(['action'=>'friendList']);
                    }
                }
            }
        }
    }
    
    //ログアウト
    public function logout(){
        unset($session);
        return $this->redirect(['action'=>'index']);
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