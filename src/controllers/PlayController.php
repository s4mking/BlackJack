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
    if($board->getPlayerByName('Croupier') == NULL){
      $board->addPlayer("Croupier",0);
      $listPlayers = $board->getPlayers();
   
    }
    $list_player = $board->getPlayers();
    // if(sizeof($list_player)>=3){
    //   //  die('Too much players....');
    // }else{
      $name = $_POST["player_name"];
    $board->addPlayer($name);
    $_SESSION["saved_game"] = $board->save();
    header("Location: /"); exit;
    // }
  }
  function delete_user(){
    $board = $this->getBoard();
    $id_user = $_POST["id_user"];
    $board->deletePlayer($id_user);
    // $usertodelete = $board->getPlayerById($id_user);
    // $usertodelete
    // var_dump($board);
    $_SESSION["saved_game"] = $board->save();
    header("Location: /"); exit;
  }
  function reinit(){
    $board = $this->getBoard();
    $board->reinit();
    header("Location: /"); exit;
  }

  function bet_game(){
    $board = $this->getBoard();
    //Ici on va setter les différents bets des gens
    $board->bet();
    $_SESSION["saved_game"] = $board->save();
    header("Location: /"); exit;
  }

  function setBet(){
    
    $board = $this->getBoard();
    $bet_num = $_POST["bet"];
    $all_players = $board->getPlayers();
    $actualPlayer = $board->getPlayerById($board->getActual_player());
    $nextPlayer = $board->getPlayerById($board->getActual_player()+1);
    $actualPlayer->setMise($bet_num);
    $board->setActual_player($board->getActual_player() + 1);
    $_SESSION["saved_game"] = $board->save();
    if($board->getActual_player() == sizeof($all_players)){
    $board->setActual_player(1);
      $this->start_game();
      exit;
    };
    header("Location: /"); exit;
  }

  function start_game(){
    $board = $this->getBoard();
    $_SESSION['used_cards']=array();
    //Ici on va fournir les mains de départ + ajout de l'utilisateur croupier
    // var_dump($board);
    
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
    $testplayer = $board->checkCards($actualPlayer);
      $_SESSION["saved_game"] = $board->save();
      header("Location: /"); exit;
  }

    function win(){
      $board = $this->getBoard();
      $board->winGame();
      
      $_SESSION["saved_game"] = $board->save();
      
      header("Location: /"); exit;
    }
      function relaunch(){
        $board = $this->getBoard();
      $board->relaunchGame();
      $_SESSION['used_cards']=[];
    
      $_SESSION["saved_game"] = $board->save();
      header("Location: /"); exit;
      }
  function pass(){
    $board = $this->getBoard();
    $id_actual = $board->getActual_player();
    $board->setActual_player($id_actual + 1);
    $board->checkCasino();
    $_SESSION["saved_game"] = $board->save();
    header("Location: /"); exit;
  }
}