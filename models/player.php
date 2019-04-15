<?php
// Définition d'un utilisateur
class Player{
  
  var $name;
  var $mise;
  var $money;
  var $arrayCardPlay = array();

  function __construct( $name,$money ) {
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