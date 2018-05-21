<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class FunanaController extends AppController{
  public function initialize(){
    $this->account = TableRegistry::get('account');
    $this->fruit = TableRegistry::get('fruit');
    $this->skin = TableRegistry::get('skin');
    $this->record = TableRegistry::get('record');
    $this->viewBuilder()->layout('Funana');
    $this->viewBuilder()->autoLayout(true);
    $this->fruit->primaryKey('ID','ITEM_ID');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'fruit');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
  }

  //メイン画面
  public function index(){
    $session = $this->request->session();
    $this->set('entity',$this->account->newEntity());
  }

  //ログイン画面
  public function login(){

  }

  //アカウント画面
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
    if($this->request->is('post')){;
      $account = $this->fruit->newEntity($this->request->data);
      $entity = $this->fruit->get($session->read('id'));
      $this->skin->patchEntity($entity, $this->request->data);
      $this->fruit->save($entity);
      $this->set('entity',$entity);
    }
  }

  //実編集画面
  public function fruitEdit(){
    $session = $this->request->session();
    $this->set('entity',$this->fruit->newEntity());
    $session->write('id',1);
    $data = $this->fruit->find('all',[
      'conditions'=>['ID' => $session->read('id')]
    ]);
    $this->set('data',$data);
  }
  //実情報追加機能
  public function addRecord(){
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

  //プロフィール情報&相手の情報の表示
  public function profileList(){
    $session = $this->request->session();
    $this->set('entity',$this->account->newEntity());
    $session->write('id',1);
    //自分の情報を表示する関数を作成
    $account = $this->account->find('all',[
      'conditions'=>['ID'=>$session->read('id')]
    ]);
    $this->set('account',$account);
    $count = $account->count();
    $this->set('count',$count);

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
        if(strcmp($this->request->data['now_password'],$pass) == 0){       //パスワードが入力されたものと登録されたPWが同じか確認
            if(strcmp($this->request->data['new_password'], $this->request->data['check_password']) == 0){   //入力された新しいパスワードが同じものか確認
                //変更を保存し、メールを送る
                $ent = $this->account->get($session->read('id'));
                $ent->PASS = $this->request->data['new_password'];
                //var_dump($ent);
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
}
