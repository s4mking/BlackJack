<?php
?>
<?php include("../views/head.php");?>
<h2>Partie fini</h2>
<?php
 foreach($board->getPlayers() as $player):?>
  <li>
  <form method="post" action="?controller=play&action=delete_user">
    <div class="form-group">
      <label for="user"> <?php echo($player->name); echo $player->getMoney();?> $ </label>
      <input type="hidden" value=<?php echo $player->id; ?> class="form-control" name='id_user' id="user">
      <button type="submit" class="btn btn-primary">Supprimer le joueur</button>
    </div>
  </form>
   
    
  </li>
<?php endforeach;?>
?>
<h3>Relancer une partie</h3>
<form method="post" action="?controller=play&action=relaunch">
  <button class='btn-primary' type="submit">Encore !!!</button>
</form>
