<?php 
foreach($board->getPlayers() as $player){
  $cards = $player->getCards();
  $sum = $player->calcCards();
   
  if($player->id == $board->getActual_player()){
    var_dump($player);
    foreach($cards as $card){
      echo($card['card'].$card['type']);
      ?>
             <div>
               <img src="/cards/<?=$card['card'].$card['type']?>.gif" /><br>
               </div>
     <?php } ?><br>
     <?php
  }
  
}
?>
<form method="post" action="/?controller=play&action=drawcard">
  <button type="submit">Piocher une carte</button>
</form>
<form method="post" action="/?controller=play&action=pass">
  <button type="submit">Passer son tour</button>
</form>
<h3>Reset</h3>
<form method="post" action="?controller=play&action=reinit">
  <button type="submit">Recommencer à zéro !</button>
</form>