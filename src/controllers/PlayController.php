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
    $name = $_POST["player_name"];
    $board->addPlayer($name);
    $_SESSION["saved_game"] = $board->save();
    header("Location: /"); exit;
    var_dump($_SESSION);
  }
  function reinit(){
    $board = $this->getBoard();
    $board->reinit();
    header("Location: /"); exit;
  }
  function start_game(){
    $board = $this->getBoard();
    $_SESSION['used_cards']=array();
    //Ici on va fournir les mains de départ + ajout de l'utilisateur croupier
    $board->addPlayer("Croupier");
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
    $board = $this->getBoard();
    $actualPlayer = $board->getPlayerById($board->getActual_player());
    $board->drawCard($actualPlayer);
    $_SESSION["saved_game"] = $board->save();
    header("Location: /"); exit;
  }
  function pass(){
    $board = $this->getBoard();
    $id_actual = $board->getActual_player();
    $board->setActual_player($id_actual + 1);
    $_SESSION["saved_game"] = $board->save();
    // die($id_actual);
    header("Location: /"); exit;
  }
}