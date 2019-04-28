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
    header("Location: /"); exit;
  }
  function reinit(){
    $board = $this->getBoard();
    $board->reinit();
    header("Location: /"); exit;
  }
  function start_game(){
    // die('totot');
    $board = $this->getBoard();
    $_SESSION['used_cards']=array();
    //Ici on va fournir les mains de départ + ajout de l'utilisateur croupier
    $croupier = new \Models\Player("Croupier");
    $board->addPlayer($croupier);
    $list_player = $board->getPlayers();
    
    foreach($list_player as $element){
      if($element->name == "Croupier"){
        $board->drawCard($element);
      }else{
        $board->drawCard($element);
      $board->drawCard($element);
      }
      
    }
    $board->start();
    // var_dump($board);
    $_SESSION["saved_game"] = $board->save();
    header("Location: /"); exit;
    
    // header("Location: /www/index.php"); exit;
  }

  //ici on va avoir l'ction du joueur plus vérification dans un second temps
  function drawCard(){

  }
}