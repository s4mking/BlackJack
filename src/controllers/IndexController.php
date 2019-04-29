<?php
namespace Controllers;

use \Models\Game as Game;

class IndexController{
 
 
    private function getBoard(){
      $board = new Game();
      if(isset($_SESSION["saved_game"])){
        $board->load($_SESSION["saved_game"]);
      }
      return $board;
    }
    public function home(){
      $board = $this->getBoard();
      if($board->getStatus() == "initial"){
        $allPlayers = $board->getPlayers();
        include("../views/index/initial.php");
      }else if($board->getStatus() == "bet"){
        include("../views/index/bets.php");
      }else{
        include("../views/index/game.php");
      }
    }
 
  }