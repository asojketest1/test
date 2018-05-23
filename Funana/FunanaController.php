<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class FunanaController extends AppController{

    public function initialize(){
        $this->viewBuilder()->Layout('funana');
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
    public function register(){
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
    
    //皮情報
    public function skin(){
        //皮情報表示
        $session = $this->request->session();
        $this->set('entity',$this->skin->newEntity());
        $session->write('id',1);
        $data = $this->skin->find('all',[
            'conditions'=>['ID' => $session->read('id')]
        ]);
        $this->set('data',$data);
        //皮情報編集
        if($this->request->is('post')){
            $account = $this->skin->newEntity($this->request->data);
            $entity = $this->skin->get($session->read('id'));
            $this->skin->patchEntity($entity, $this->request->data);
            $this->skin->save($entity);
            $this->set('entity',$entity);
        }
    }
    
    //皮編集画面
    public function skinEdit(){
        $session = $this->request->session();
        $this->set('entity',$this->skin->newEntity());
        $session->write('id',1);
        $data = $this->skin->find('all',[
            'conditions'=>['ID' => $session->read('id')]
        ]);
        $this->set('data',$data);
    }
    
    //実情報
    public function fruit(){
        //実情報表示
        $session = $this->request->session();
        $this->set('entity',$this->fruit->newEntity());
        $session->write('id',1);
        $data = $this->fruit->find('all',[
            'conditions'=>['ID' => $session->read('id')]
        ]);
        $this->set('data',$data);
        //実情報編集
        if($this->request->is('post')){
           $fruit = $this->fruit->newEntity($this->request->data);
           $this->fruit->save($fruit);
        }
    }
    
    //実編集画面
    public function fruitEdit(){
        $session = $this->request->session();
        $this->set('entity',$this->fruit->newEntity());
        $session->write('id',1);
        $id = $session->read('id');
        $data = $this->fruit->find('all',[
            'conditions'=>['ID' => $id]
        ]);
        $iddata = $this->fruit->find('all')->where(['id'=>$id]);
        //一番数字の大きいidを取得して、プラス１してる
        foreach($iddata as $obj){
            $maxid = $obj->ITEM_ID;
        }
        $maxid += 1;
        $this->set('data',$data);
        $this->set('maxid',$maxid);
        $this->set('id',$id);
    }
    
    //実情報追加機能
    public function addFruit(){
        $session = $this->request->session();
        if($this->request->is('post')){
            $fruit = $this->fruit->newEntity($this->request->data);
            $this->fruit->save($fruit);
            $this->redirect(['action' => 'fruit']);
        }
    }
    
    //実情報の削除機能
    public function deleteFruit(){
        if($this->request->is('post')){
            $entity = $this->fruit->get($session->read('id'));
            $this->Takebookarticles->delete($entity);
        }
        return $this->redirect(['action' => 'fruitEdit']);
    }
    
    //友達一覧タップ後の皮情報表示
    public function friendsprofileAfterPeel(){
        $session = $this->request->session();
        $this->set('entity',$this->skin->newEntity());
        $account = $this->skin->newEntity($this->request->data);
        $session->write('id',1);
        $data = $this->skin->find('all',[
            'conditions'=>['ID' => $session->read('id')]
        ]);
        $this->set('data',$data);
    }
    
    //QR読み取り後画面
    public function afterReadqr(){
        $session = $this->request->session();
        $session->write('id',1);
        //皮情報表示
        $skin = $this->skin->find('all',[
            'conditions'=>['ID' => $session->read('id')]
        ]);
        $this->set('skin',$skin);
    }
    
    //パスワード変更確認メール送信機能
    public function updatePassword(){
        $session = $this->request->session();
        $session -> write('id',1);
        $data = $this->account->find('all',['conditions'=>['ID ='=>"1"]]);
        $data->select(['MAIL', 'PASS']);
        $this->set('data',$data);
        $entity = $this->account->newEntity();
        foreach($data as $obj):
            $mail = $obj->MAIL;
            $pass = $obj->PASS;
        endforeach;
        $this->set('entity',$entity);

        if($this->request->is('post')){
            if(strcmp($this->request->data['now_password'],$pass) == 0){
            //パスワードが入力されたものと登録されたPWが同じか確認
                if(strcmp($this->request->data['new_password'], $this->request->data['check_password']) == 0){
                //入力された新しいパスワードが同じものか確認
                    //変更を保存し、メールを送る
                    $ent = $this->account->get($session->read('id'));
                    $ent->PASS = $this->request->data['new_password'];
                    $this->account->save($ent);

                    mb_language("Japanese");
                    mb_internal_encoding("UTF-8");
                    $to = $mail;  //送信先
                    $title = "パスワードが変更されました";   //タイトル
                    $content = "パスワードの変更が完了しました。";   //本文
                    if(mb_send_mail($to, $title, $content)){
                        echo "変更されました。";
                    }
                }else{
                    //PW不一致
                        echo "入力されたパスワードが違います";
                    //確認用passが違う出力
                        echo "入力された内容が異なります。";
                    $this->redirect(['action' => 'update_password']);
                }
            }else{
                //PW不一致
                echo "入力されたパスワードが違います";
                $this->redirect(['action' => 'update_password']);
            }
        }
    }
    
    public function accountinformation(){
        $session = $this->request->session();
        $session->write('id',1);
        $this->set('entity',$this->account->newEntity());
        //アカウント情報表示
        $data = $this->account->find('all',[
            'conditions'=>['ID' => $session->read('id')]
        ]);
        $this->set('data',$data);

        //アカウント情報編集
        if($this->request->is('post')){
            $session = $this->request->session();
            $account = $this->account->newEntity($this->request->data);
            $entity = $this->account->get($session->read('id'));
            $this->account->patchEntity($entity, $this->request->data);
            if($this->account->save($entity)){
                $this->redirect(['action'=>'accountinformation']);
            }
            $this->set('entity',$entity);
        }
    }
    
    public function qrReader(){
    }
    
    public function readAfter(){
        $this->set('content',$this->request->data['content']);
    }
}