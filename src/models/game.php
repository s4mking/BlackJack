<?php
//Définition modèle globale du jeu qui va grosso modo faire la liaison entre les différents élèments + save/load/reset
namespace Models;
  class Game{

    private $status = "initial";
    private $players = [];
    private $actual_player=0;

    
   function setStatus($status){
      $this->status = $status;
   }
   function setActual_player($actual_player){
    $this->actual_player = $actual_player;
 }

   public function start(){
    $this->status = "started";
    $this->setActual_player(1);
  }
  public function bet(){
    $this->status = "bet";
    $this->setActual_player(1);
  }
  
    public function getActual_player(){
      return $this->actual_player;
    }
    public function getPlayers(){
      return $this->players;
    }
   
    public function getPlayerById($idPlayer){
      foreach($this->getPlayers() as $player){
        if($player->id == $idPlayer){
          return $player;
        }
      }
    }

    public function getPlayerByName($namePlayer){
      foreach($this->getPlayers() as $player){
        if($player->name == $namePlayer){
          return $player;
        }
      }
    }
    public function addPlayer($name,$id =1){
      // if($this->status != "initial")
      // throw new Exception("Le jeu a déjà commencé!!!");
      $error = $this->getErrorName($name);
      
      if($error != true){
        return $error;
      }else{
        $list_players = $this->getPlayers();
      if($id == 1){
        $id = sizeof($list_players);
      }
       $player = new  \Models\Player(
        $name,
        $id
      );
      $this->players[$player->name] = $player;      
      $this->setActual_player($this->actual_player + 1);
      }
      
    }

    public function deletePlayer($id){
      $user = $this->getPlayerById($id);
      
      $listPlayers = $this->getPlayers();

      foreach($listPlayers as $key=>$player){
        if($player->id == $id){
         $deletePlayer = $key;
        }
      }
      unset(($this->players)[$deletePlayer]);
      // var_dump($this);
    }
   
    public function drawCard($element){
      $mydecks = new Deck();
      $testsam = array();
      $testsam = $mydecks->pullCard();
       $card_array = $element->arrayCardPlay;
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
        "status"=> $this->status,
        "actual_player"=> $this->actual_player,
        "players" => $this->players
      ];
    }
    public function load($saved_game){
      $this->status = $saved_game["status"];
      $this->actual_player = $saved_game["actual_player"];
      $this->players = $saved_game["players"];
    
    }
//on va test ter si c'est le casino ou pas

    function checkCasino(){
      $actual_id = ($this->actual_player);
      
      if($actual_id == sizeof($this->getPlayers())){
        $casino = $this->getPlayerById(0);
          while($casino->calcCards() <= 16){
            $this->drawCard($casino);
          }
      }
    }

    function checkCards($player)
{	
		if($player->calcCards() == 21)
		{	
      $this->setActual_player($this->actual_player + 1);
		}
		elseif($player->calcCards() > 21)
		{
      $this->setActual_player($this->actual_player + 1);
		}
		else
		{
			
    }
    $this->checkCasino();

}  

  function winGame(){
    //Calcul des mises
    $listplayers = $this->getPlayers();
    $casino_score = $this->getPlayerByName('Croupier')->calcCards();
    foreach( $listplayers as $player){
      $score = $player->calcCards();
        if( $score == 21){
          $mise = $player->getMise();
          $actual_money = $player->getMoney();
          $player->setMoney($actual_money + ($mise*2));
        }
        elseif(($casino_score < 21 && $score< 21 && $score>=$casino_score) || ($casino_score > 21 && $score> 21 && $score<=$casino_score)){
          
        }
        else{
          $mise = $player->getMise();
          $actual_money = $player->getMoney();
          $player->setMoney($actual_money - ($mise));
        }
    }


    $this->setStatus("finish");
  }
  function relaunchGame(){
    $listplayers = $this->getPlayers();
    foreach($listplayers as $player){
      $player->destroyCards();
    }
    $this->setActual_player(0);
    $this->setStatus("initial"); 
  }

  //Gestion des erreurs en cours mais pas fini
  function getErrorName($name){
    if($name == " "){
      return 'Vous devez avoir un vrai nom!!!';
    }
    else if(sizeof($this->getPlayers()) > 4){
      return 'Vopus ne pouvez pas avoir plus de 4 joueurs!!!';
    }
    else{
      return true;
    }
  }

  function getErrorMise($mise,$playerId){
    $monney = $this->getPlayerById($playerId)->getMoney();
   if($mise > $monney){
    return "Vous n'avez pas cet argent de disponible!!!";
   }
   else{
    return true;
  }
  }



  }