<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Shoplist extends Entity{
    protected $_accesible = [
        '*' => true,
        'id' => false
    ];
}