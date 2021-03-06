<?php
//Définition deck

namespace Models;
  class Deck{
  
    private $number = array('2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9, 'T' => 10, 'J' => 10, 'Q' => 10, 'K' => 10, 'A' => 11);
    private $type = array('H','D','S','C');
    private $nmb_deck = array(1,2,3,4,5);
    private $used_cards = [];

    function getUsedCards(){
      return $this->used_cards;
    }
    function setUsedCards($cards){
      $this->used_cards=$cards;
    }
    function pullCard()
    {
      $tmp['card'] = array_rand($this->number);
      $tmp['type'] = $this->type[array_rand($this->type)];
      $tmp['deck'] = array_rand($this->nmb_deck);
      while(in_array($tmp['card'].$tmp['type'].$tmp['deck'], $_SESSION['used_cards']))
      // while(in_array($tmp['card'].$tmp['type'].$tmp['deck'], $this->getUsedCards()))
      {
        $tmp['card'] = array_rand($this->number);
        $tmp['type'] = $this->type[array_rand($this->type)];
        $tmp['deck'] = array_rand($this->nmb_deck);
      }
      
      $_SESSION['used_cards'][] = $tmp['card'].$tmp['type'].$tmp['deck'];
      
      return $tmp;
    }    
  }