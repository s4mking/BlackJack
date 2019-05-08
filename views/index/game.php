<?php 
include("../views/head.php");
//  var_dump($board);
foreach($board->getPlayers() as $player){
  $cards = $player->getCards();
  $sum = $player->calcCards();
if($player->name == "Croupier"){
  ?> <div class='container_game'><h1>Croupier</h1><h2>Score : <?php echo($player->calcCards()); ?></h2><div class='croupier'><?php
  foreach($cards as $card){
    ?>
           <div>
             <img src="/cards/<?=$card['card'].$card['type']?>.gif" /><br>
             </div>
   <?php } ?><br>
 <?php }
}
foreach($board->getPlayers() as $player){
  $cards = $player->getCards();
  $sum = $player->calcCards();
  if( $player->name != "Croupier"){
    ?></div><h1><?php echo $player->name ?></h1><h2>Score : <?php echo($player->calcCards()); ?></h2><div class='actual_player'><?php
    foreach($cards as $card){
      // echo($card['card'].$card['type']);
      ?>
             <div>
               <img src="/cards/<?=$card['card'].$card['type']?>.gif" /><br>
               </div>
     <?php } ?><br>
     <?php
  }
  
}

?>
</div>
<?php 
var_dump($player->name);
if( $board->getActual_player()+1 != sizeof($board->getPlayers())){
?>
<div> 
<form method="post" action="/?controller=play&action=drawcard">
  <button class="btn btn-primary" type="submit">Piocher une carte</button>
</form>
<form method="post" action="/?controller=play&action=pass">
  <button class="btn btn-primary" type="submit">Passer son tour</button>
</form>
</div>
<?php }else{ ?>
  <form method="post" action="/?controller=play&action=win">
  <button class="btn btn-primary" type="submit">Résultats</button>
</form>
<?php } ?>


</div>