<?php
namespace App\Controller;
use App\Controller\AppController;
class AfterskinController extends AppController {

    public function index(){
        

} 
    public function afterskin(){

        if (isset($_GET['id'])){
            $id = $_GET['id'];
            print("$id<br>\n");
        }
        if (isset($_GET['name'])){
            $name = $_GET['name'];
            print("$name<br>\n");
        }
    }
}