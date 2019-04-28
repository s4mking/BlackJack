<?php 
foreach($board->getPlayers() as $player){
  $cards = $player->getCards();
  $sum = $player->calcCards();
  var_dump($sum);
  foreach($cards as $card){
   ?>
          <div>
						<img src="/cards/<?=$card['card'].$card['type']?>.gif" /><br>
            </div>
  <?php } ?><br><?php
}
?>
<form method="post" action="/?controller=play&action=drawcard">
  <input type="text" name="player">
  <button type="submit">Piocher une carte</button>
</form>
<h3>Reset</h3>
<form method="post" action="?controller=play&action=reinit">
  <button type="submit">Recommencer à zéro !</button>
</form>