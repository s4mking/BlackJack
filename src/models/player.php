<?php
namespace Models;


// Définition d'un utilisateur
class Player{
  
  public $name;
  var $mise;
  public $money;
  var $arrayCardPlay = array();

  public function __construct( $name,$money=100 ) {
    $this->name = $name;
    $this->money = $money;
 }

  function setMise($mise){
   $this->mise = $mise;
}

  function getMise(){
    return $this->mise;
}
  function setMoney($money){
    $this->money = $money;
  }

  function getMoney(){
    return $this->money;
}
 
 
}