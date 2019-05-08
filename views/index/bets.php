<?php
include("../views/head.php");
foreach($board->getPlayers() as $player){
  if($player->name != 'Croupier'){
  $cards = $player->getCards();
  $sum = $player->calcCards();
   
  if($player->id == $board->getActual_player()){ ?>
<form method="post" action="?controller=play&action=setBet">
          <div class="form-group">
            <label for="bet"> <?php echo $player->name ?> </label>
            <input type="text" class="form-control betInput" name='bet' id="bet" placeholder="Votre mise">
            <button type="submit" class="btn btn-primary">Ajouter la mise</button>
          </div>
        </form>
    <br>
     <?php
  }
}
}
?>

<h3>Reset</h3>
<form method="post" action="?controller=play&action=reinit">
    <button type="submit" class="btn btn-primary">Recommencer à zéro !</button>
  </form>