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
    $this->setActual_player(0);
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
    public function addPlayer($name){
      if($this->status != "initial")
      throw new Exception("Le jeu a déjà commencé!!!");
       $player = new  \Models\Player(
        $name,
        $this->getActual_player()
      );
      $this->players[$player->name] = $player;
      // $this->players[$player->id]= 0;
      $this->setActual_player($this->actual_player + 1);
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
   
    
  
  function checkWinner($player, $computer)
{	
	global $winner;
	if($winner != true)
	{
		if(calcCards($player) == 21 && calcCards($computer) == 21)
		{
			print notification("Tie game");
			$winner = true;
		}
		elseif(calcCards($player) > 21 || calcCards($computer) == 21)
		{
			print notification("You lost, the computer won");
			$winner = true;
		}
		elseif(calcCards($computer) > 21 || calcCards($player) == 21)
		{
			print notification("You won, the computer lost");
			$winner = true;
		}
		else
		{
			return false;
		}
	}
}

  }