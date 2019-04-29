<?php
namespace Models;


// Définition d'un utilisateur
class Player{
  
  public $id;
  public $name;
  var $mise;
  public $money;
  var $arrayCardPlay = array();

  public function __construct( $name,$id,$money=100 ) {
    $this->name = $name;
    $this->money = 100;
    $this->id=$id;
 }

  function setMise($mise){
   $this->mise = $mise;
}
public function getId(){
  return $this->id;
}
public function getCards(){
    return $this->arrayCardPlay;
  }


  public function calcCards()
  {

    $cards=$this->getCards();
    $sum = 0;
    $aces = 0;
    
    foreach($cards as $card)
    {
     
        if($card['card'] != "A")
        {
          if(is_string($card['card'])){
            $sum += 10;
          }else{
            $sum += $card['card'];
          }
        }
        else
        {
          $aces++;
        }
    }
    
    for($i=0; $i<$aces; $i++)
    {
      if($sum+11 > 21)
      {
        $sum += 1;
      }
      else
      {
        $sum+= 11;
      }
    }
    
    return $sum;
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