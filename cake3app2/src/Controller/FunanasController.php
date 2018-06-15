<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class FunanasController extends AppController{

    public function initialize(){
        $this->viewBuilder()->Layout('funana');
        $this->funanas = TableRegistry::get('funanas');
        $this->account = TableRegistry::get('account');
        $this->fruit = TableRegistry::get('fruit');
        $this->item = TableRegistry::get('item');
        $this->skin = TableRegistry::get('skin');
        $this->record = TableRegistry::get('record');
        if (empty($_SERVER['HTTPS'])) {
            header("Location: https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");
            exit;
        }
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

    //実際にユーザーを作成してる画面
    public function addRecord(){
        $session = $this->request->session();
        if($this->request->is('post')){
            $account_data = $this->account->newEntity();
            $account_data->NAME = $this->request->data['NAME'];
            $account_data->MAIL = $this->request->data['MAIL'];
            $hash = password_hash($this->request->data['PASS'], PASSWORD_DEFAULT);
            $account_data->PASS = $hash;
            $qrpass = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', 5)), 0, 5);
            $account_data->QRPASS = $qrpass;
            if($this->account->save($account_data)){
                $account = $this->account->find('all')->where(['NAME'=>$_POST['NAME']]);
                foreach($account as $obj){
                    $session->write('id',$obj->ID);
                    $entity = $this->account->newEntity(['ID' => $session->read('id'),'ICON_URL' => 'noIcon.png']);
                    $this->account->save($entity);
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
            if(isset($_POST['MAIL'])){
                $data = $this->account->find('all')->where(['MAIL' => $_POST['MAIL']]);
                foreach($data as $obj){
                    if(password_verify($_POST['PASS'], $obj->PASS)){
                        $session->write('id', $obj->ID);
                        return $this->redirect(['action'=>'profileList']);
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

    //皮情報
    public function skin(){
        //皮情報表示
        $session = $this->request->session();
        $this->set('entity',$this->skin->newEntity());
        $data = $this->skin->find('all',[
            'conditions'=>['ID' => $session->read('id')]
        ]);
        $acc = $this->account->find('all',[
            'conditions'=>['ID' => $session->read('id')]
        ]);
        $this->set('acc', $acc);
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
        $data = $this->skin->find('all',[
            'conditions'=>['ID' => $session->read('id')]
        ]);
        $this->set('data',$data);
    }

    public function fruit(){
        //実情報表示
        $session = $this->request->session();
        $this->set('entity',$this->fruit->newEntity());
        $data = $this->fruit->find('all',[
            'conditions'=>['ID' => $session->read('id')]
        ]);
        $this->set('data',$data);
        //実情報編集
        if($this->request->data('button') == 'add'){
            $fruit = $this->fruit->newEntity($this->request->data);
            $this->fruit->save($fruit);
        }else if($this->request->data('button') == 'del'){
            $session = $this->request->session();
            if($this->request->is('post')){
                $this->fruit->deleteAll(['ID'=>$session->read('id'),'ITEM_ID'=>$this->request->data['ITEM_ID']]);
            }
            return $this->redirect(['action' => 'fruitEdit']);
        }
    }

    //実編集画面
    public function fruitEdit(){
        $session = $this->request->session();
        $this->set('entity',$this->fruit->newEntity());
        $id = $session->read('id');
        $data = $this->fruit->find('all',[
            'conditions'=>['ID' => $id]
        ]);
        $record = $this->record->find('all',[
            'conditions'=>['RECORD_ID' => $id]
        ]);
        foreach($record as $obj){
            $record = $obj->RECORD_ID;
        }
        $iddata = $this->fruit->find('all')->where(['id'=>$id]);
        //一番数字の大きいidを取得して、プラス１してる
        foreach($iddata as $obj){
            $maxid = $obj->ITEM_ID;
        }
        $maxid += 1;
        $this->set('data',$data);
        $this->set('maxid',$maxid);
        $this->set('id',$id);
        $this->set('record',$record);
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
    public function friendsSkin(){
        $session = $this->request->session();
        $this->set('entity',$this->skin->newEntity());
        $account = $this->skin->newEntity($this->request->data);
        $session->write('viewid','');
        echo $this->request->data('content');
        if(isset($this->request->query['id'])){
            if($_SESSION['viewid'] != null){
                unset($_SESSION["viewid"]);
            }
            $session->write('viewid',$this->request->query['id']);
        }
        $data = $this->skin->find('all',[
            'conditions'=>['ID' => $session->read('viewid')]
        ]);
        $acc = $this->account->find('all',[
            'conditions'=>['ID' => $session->read('viewid')]
        ]);
        $this->set('acc', $acc);
        $this->set('data', $data);
    }

    public function friendsFruit(){
        $session = $this->request->session();
        $this->set('entity',$this->fruit->newEntity());
        // Fruit Table の“１“を
        $fruit = $this->fruit->find('all',[
            'conditions'=>['ID' => $session->read('viewid')]
        ]);
        $this->set('fruit',$fruit);
        $acc = $this->account->find('all',[
            'conditions'=>['ID' => $session->read('viewid')]
        ]);
        $this->set('acc', $acc);
        $record = $this->record->find('all',[
            'conditions' =>['ID' => $session->read('id'),'RECORD_ID'=> $session->read('viewid')]
        ]);
        $this->set('record',$record);
    }

    //QR読み取り後画面
    public function anyoneReadqr(){
        $session = $this->request->session();
        if($this->request->query['id'] != null){
            $id = $this->request->query['id'];
            $session->write('publicid',$id);
        }
        $id = $session->read('publicid');
        $account = $this->account->find('all',['conditions'=>['ID' => $id]]);
        $this->set('account',$account);
        $this->set('id',$id);
        foreach($account as $obj){
            if(isset($_POST['password'])){
                //パスワード認証
                if(strcmp($_POST['password'],$obj->QRPASS) == 0){
                    $this->redirect(['action' => "afterSkin"]);
                }
            }
        }
    }

    //QR読み取り後画面
    public function afterReadqr(){
        $item = array();
        $session = $this->request->session();
        if(isset($this->request->data)){
            $content = $this->request->data('content');
            $recordid = substr($content,0,strcspn($content,','));
            $content = substr($content,strcspn($content,',')+1);
            $j = 0;
            for($i=0; $i<strlen($content); $i+=2){
                $item += array($j => substr($content,$i,1));
                $j++;
            }
            //送られてきた値をID、RECIRD_ID、ITEM_IDを用いて保存
            for($i=0; $i < count($item); $i++){
                $entity = $this->record->newEntity(['ID'=>$session->read('id'),'RECORD_ID'=>$recordid,'ITEM_ID'=>$item[$i]]);
                $this->record->save($entity);
            }
            //パラメータつきでリダイレクト
            return $this->redirect([
                'controller' => 'Funanas',
                'action' => 'qrReader',
                '?' => [
                    'para' => $this->request->data('paramater')
                ]
            ]);
        }
        /*$session = $this->request->session();
        //読み取られる
        //皮情報表示
        $skin = $this->skin->find('all',[
            'conditions'=>['ID' => $session->read('id')]
        ]);
        $acc = $this->account->find('all',[
            'conditions'=>['ID' => $session->read('id')]
        ]);
        $this->set('acc', $acc);
        $this->set('skin',$skin);

        //実情報表示
        $fruit = $this->fruit->find('all',[
            'conditions'=>['ID' => $session->read('id')]
        ]);
        $this->set('fruit',$fruit);*/
    }

    public function afterSkin(){
        //皮情報表示
        $session = $this->request->session();
        $this->set('entity',$this->skin->newEntity());
        $id = $session->read('publicid');
        $data = $this->skin->find('all',['conditions'=>['ID' => $id]]);
        $acc = $this->account->find('all',[
            'conditions'=>['ID' => $id]
        ]);
        $this->set('acc', $acc);
        $this->set('data',$data);
    }

    public function afterFruit(){
        //相手の実情報表示
        $session = $this->request->session();
        $this->set('entity',$this->fruit->newEntity());
        $id = $session->read('publicid');
        $data = $this->fruit->find('all',[
            'conditions'=>['DISPLAY' => 1,'ID'=>$id]
        ]);
        $acc = $this->account->find('all',[
            'conditions'=>['ID' => $id]
        ]);
        $this->set('acc', $acc);
        $this->set('data',$data);
    }

    //交換相手に渡す情報を選ぶ画面
    public function tradefruitSelect(){
        $session = $this->request->session();
        //送信が確定されている皮情報表示
        $skin = $this->skin->find('all',[
            'conditions'=>['ID' => $session->read('id')]
        ]);
        $this->set('skin',$skin);
        //送信時にチェックする実情報表示
        $fruit = $this->fruit->find('all',[
            'conditions'=>['ID' => $session->read('id')]
        ]);
        $this->set('fruit',$fruit);
        $this->set('entity',$this->fruit->newEntity());
    }

    //交換相手に渡す情報からQRを作成する機能
    public function tradefruit(){
        $session = $this->request->session();
        if($this->request->data('paramater') != null){
            $this->set('paramater',$this->request->data('paramater'));
        }else{
            $myid = $session->read('id');
            $paramater = $myid;
            $ar = array();
            if(isset($this->request->data)){
                $check = $this->request->data;
                foreach($check as $num => $value){
                    $ar += $value;
                }
            }
            foreach($ar as $array => $value){
                if(strcmp($value,'0') != 0 ){
                    $paramater .= ",".$value;
                }
            }
            $this->set('check',$ar);
            $this->set('paramater',$paramater);
        }
    }
    
    public function qrReader(){
        $this->set('paramater','');
        if($this->request->data('paramater') != null){
            $this->set('paramater',$this->request->data('paramater'));
        }else if($this->request->query['para'] != null){
            $this->set('paramater',$this->request->query['para']);
            echo '<script>alert("友達を追加しました");</script>';
        }
    }

    //パスワード変更確認メール送信機能
    public function updatePassword(){
        $session = $this->request->session();
        $data = $this->account->find('all',['conditions'=>['ID ='=>$session->read('id')]]);
        $data->select(['MAIL', 'PASS']);
        $this->set('data',$data);
        $entity = $this->account->newEntity();
        foreach($data as $obj):
        $mail = $obj->MAIL;
        $pass = $obj->PASS;
        endforeach;
        $this->set('entity',$entity);

        if($this->request->is('post')){
            if(password_verify($this->request->data['now_password'],$pass)){
                //パスワードが入力されたものと登録されたPWが同じか確認
                if(strcmp($this->request->data['new_password'], $this->request->data['check_password']) == 0){
                    //入力された新しいパスワードが同じものか確認
                    //変更を保存し、メールを送る
                    $ent = $this->account->get($session->read('id'));
                    $newhash = password_hash($this->request->data['new_password'], PASSWORD_DEFAULT);
                    $ent->PASS = $newhash;
                    $this->account->save($ent);
                    return $this->redirect(['action'=>'confirm']);
                }else{
                    //PW不一致
                    echo "入力されたパスワードが違います";
                    //確認用passが違う出力
                    echo "入力された内容が異なります。";
                    return $this->redirect(['action' => 'update_password']);
                }
            }else{
                //PW不一致
                echo "入力されたパスワードが違います";
                return $this->redirect(['action' => 'update_password']);
            }
        }
    }

    public function confirm(){}

    public function accountinformation(){
        $session = $this->request->session();
        $this->set('entity',$this->account->newEntity());
        //アカウント情報表示
        $data = $this->account->find('all',[
            'conditions'=>['ID' => $session->read('id')]
        ]);
        $this->set('data',$data);

        //画像のアップロード処理
        if (isset($this->request->data['UploadData'])) {
            //アップロードするファイルの場所
            $uploaddir = "img/";
            $uploadfile = $uploaddir.basename($this->request->data['UploadData']['img_name']['name']);
            //echo $uploaddir."<br/>".$uploadfile."<br/>";

            //画像をテンポラリーの場所から、上記で設定したアップロードファイルの置き場所へ移動
            if (move_uploaded_file($this->request->data['UploadData']['img_name']['tmp_name'],$uploadfile)){
                $deleteimg = $this->account->find('all')->where(['ID' => $session->read('id')]);
                foreach($deleteimg as $obj){
                    if($obj->ICON_URL != 'noIcon.png'){
                        if(unlink("./img/$obj->ICON_URL")){ //削除成功
                            //成功したら、Successを表示
                            $this->set("message","読み込み成功です");
                            //$deletefiles = $this->account->get($this->request->data['ICON_URL'])
                            //unlink("/img/51UvGrv6pmL.jpg");
                        }else{
                            //削除失敗
                        }
                    }
                    $getName = basename($this->request->data['UploadData']['img_name']['name']);
                    $entity = $this->account->newEntity(['ID' => $session->read('id'),'ICON_URL' => $getName]);
                    $this->account->save($entity);
                }
            }else{
                //失敗したら、errorを表示
                $this->set("message","読み込み失敗です");
            }            
        }

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

    public function readAfter(){
        $this->set('content',$this->request->data['content']);
    }

    //友達一覧
    public function profileList(){
        $session = $this->request->session();
        //Record_Tableのentity_recordをセット
        $this->set('entity_record',$this->record->newEntity());
        $account = $this->account->find('all',['conditions'=>['ID ='=>$session->read('id')]]);
        foreach($account as $obj){
            $prime = $obj->PREMIER;
        }
        $this->set('prime',$prime);
        $this->set('id',$session->read('id'));
        $this->set('account',$account);
        $record = $this->record->find('all',['conditions'=>['ID ='=>$session->read('id')]])->group('ID');
        $friends = $record->count();
        if($friends != 0){
            foreach($record as $obj){
                $recordId[] = $obj->RECORD_ID;
                $this->set('recordId',$recordId);
            }
        }else{
            $this->set('recordId', '');
        }
        //検索したか？
        if(isset($this->request->data['serch'])){
            //検索
            $friend_name = $this->account->find()->where([
                'NAME like'=>'%'. $this->request->data['search'] .'%']);
        }else{
            if($this->request->data('shojun') != null){
                $friend_name = $this->account->find('all')->order(['NAME'=>'ASC']);
            }else if($this->request->data('kojun') != null){
                $friend_name = $this->account->find('all')->order(['NAME'=>'DESC']);
            }else{
                $friend_name = $this->account->find('all');
            }
        }
        $this->set('data',$this->record->find('all'));
        $this->set('friends',$friends);
        $this->set('friend',$friend_name);
    }

    public function delRecord(){
        $session = $this->request->session();
        $entity_account = $this->record->get($this->request->data['data']);
        $entity_account = $this->record->find()->where([
            'ID=' => $session->read('id')
        ]);
        $this->record->delete($entity_account);
        return $this->redirect(['action' => 'profileList']);
    }
}