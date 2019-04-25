<?php include("../views/head.php");?>
<h1>Blackjack !</h1>

    
<?php if(count($board->getPlayers())):?>
  <h3>Liste des joueurs</h3>
  <ul>
    <?php foreach($board->getPlayers() as $player):?>
      <li>
        <?php echo $player->name; ?>
        (<?php echo $player->money; ?> $)
        
      </li>
    <?php endforeach;?>
  </ul>
<?php else:?>
  <em>Pas encore de joueurs inscrits</em>
<?php endif;?>

<h3>Ajouter un joueur</h3>

<form method="post" action="?controller=play&action=new_player">
  <input type="text" name="player_name">
  <button type="submit">Ajouter</button>

</form>

<h3>Prêt ?</h3>
<form method="post" action="?controller=play&action=start_game">
  <button type="submit">Commencer la partie !</button>
</form>
<h3>Reset</h3>
<form method="post" action="?controller=play&action=reinit">
  <button type="submit">Recommencer à zéro !</button>
</form>

<?php include("../views/foot.php"); ?>