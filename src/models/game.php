<?php
//Définition modèle globale du jeu qui va grosso modo faire la liaison entre les différents élèments + save/load/reset
namespace Models;
  class Game{

    private $moneys = [];
    private $status = "initial";
    private $players = [];
    
    public function start(){
      $this->status = "started";
    }

    public function getPlayers(){
      return $this->players;
    }
    public function addPlayer(Player $player){
      if($this->status != "initial")
      throw new Exception("Le jeu a déjà commencé!!!");
      $this->players[$player->name] = $player;
      $this->moneys[$player->money] = 100;
    }
   
    public function drawCard($element){
      $mydecks = new Deck();
      $testsam = array();
      $testsam = $mydecks->pullCard();
       $card_array = $element->arrayCardPlay;
        // var_dump($element->arrayCardPlay);
        ?><br><?php
        // var_dump($testsam);
        ?><br><?php
       array_push($element->arrayCardPlay,$testsam);
    }
   
    
    public function reinit(){
      session_destroy();
	    session_start();
    }
    public function getStatus(){
      return $this->status;
    }

    public function save(){
      return [
        "players" => $this->players,
        "moneys" => $this->moneys
      ];
    }
    public function load($saved_game){
      $this->players = $saved_game["players"];
      $this->moneys = $saved_game["moneys"];
    }
   
    function calcCards($cards)
    {
      global $cards;
      $sum = 0;
      $aces = 0;
      
      foreach($cards as $card)
      {
          if($card['card'] != "A")
          {
            $sum += $cards[$card['card']];
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
  }