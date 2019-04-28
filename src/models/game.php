<?php
//Définition modèle globale du jeu qui va grosso modo faire la liaison entre les différents élèments + save/load/reset
namespace Models;
  class Game{

    private $moneys = [];
    private $status = "initial";
    private $players = [];
    
    

    function setStatus($status){
      $this->status = $status;
   }

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
        "players" => $this->players
      ];
    }
    public function load($saved_game){
      $this->status = $saved_game["status"];
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