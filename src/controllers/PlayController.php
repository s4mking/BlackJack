<?php

namespace Controllers;

// use \Models\Game as Game

class PlayController{
  private function getBoard(){
    $board = new \Models\Game();
    if(isset($_SESSION["saved_game"])){
      $board->load($_SESSION["saved_game"]);
    }
    return $board;
  }
  function new_player(){
    $board = $this->getBoard();
    $player = new  \Models\Player(
      $_POST["player_name"]
    );
    $board->addPlayer($player);
    $_SESSION["saved_game"] = $board->save();
    header("Location: /www/index.php"); exit;
  }
  function start_game(){
    $board = $this->getBoard();
    $_SESSION['used_cards']=array();
    //Ici on va fournir les mains de départ + ajout de l'utilisateur croupier
    $croupier = new \Models\Player("Croupier");
    $board->addPlayer($croupier);
    
    $list_player = $board->getPlayers();
    foreach($list_player as $element){
      $board->drawCard($element);
      $board->drawCard($element);
    }
      var_dump($list_player);
    $board->start();
  }
}