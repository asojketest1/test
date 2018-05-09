<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ShoplistsController extends AppController{
    
    public function initialize(){
        $this->Testusers = TableRegistry::get('Testusers');
        $this->shops = TableRegistry::get('shops');
        $this->shops = TableRegistry::get('product');
    }

    public function index(){
        $session = $this->request->session();
        $data = $this->Testusers->find('all');
        $this->set('data',$data);
        $this->set('entity',$this->Testusers->newEntity());
        if($this->request->is('post')){
            $data = $this->Testusers->find('all')->where(['name'=>$_POST['name']]);
            if(count($data) > 0){
                foreach($data as $obj):
                if(strcmp($obj->pass, $_POST['pass']) == 0){
                    $session->write('Member.name', $obj->name);
                    $session->write('Member.display', $obj->display_name);
                    $session->write('Member.id',$obj->id);
                    return $this->redirect(['action'=>'choice']);
                }
                endforeach;
            }
        }
    }
    
    //ログイン画面
    public function login(){
        $this->set('entity',$this->Shoplists->newEntity());
        if($this->request->is('post')){
            $board = $this->Shoplists->newEntity($this->request->data);
            $data = $this->Shoplists->find('all',['conditions'=>['or'=>['article like '=>"%{$board['search']}%",'username like '=>"%{$board['search']}%"]],'order'=>['contributiondate'=>'DESC']]);
        }
    }
    
    //ログイン後画面
    public function choice(){
        $session = $this->request->session();
        $display = $session->read('Member.display');
        $this->set('entity',$this->shops->newEntity());
        $data = $this->Shoplists->find('all')->contain(['shops'])->where(['testuser_id'=>$session->read('Member.id')]);
        $this->set('data',$data);
        $this->set('display',$display);
    }
    
    //ユーザー作成画面
    public function regist(){
        $data = $this->Testusers->find('all');
        $this->set('data',$data);
        $this->set('entity',$this->Testusers->newEntity());
    }
    
    //実際にユーザーを作成してる画面
    public function addRecord(){
        if($this->request->is('post')){
            $board = $this->Testusers->newEntity($this->request->data);
            if($this->Testusers->save($board)){
                $this->redirect(['action'=>'index']);
            }
            $this->set('entity',$board);
        }
    }
    
    //買う物登録画面
    public function wantProduct(){
        $this->set('entity',$this->shops->newEntity());
        $data = $this->Shoplists->find('all')->contain(['shops']);
        $this->set('data',$data);
    }
    
    //買う物一覧表示、削除画面
    public function list(){
        $board = $this->Testusers->newEntity($this->request->data);
        $data = $this->Shoplists->find('all')->contain(['product'])->where(['shop_id'=>$board['shopid']]);
        $this->set('data',$data);
    }
    
    //店種登録画面
    public function shopRegist(){
        
    }
}