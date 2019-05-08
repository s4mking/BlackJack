<?php include("../views/head.php");?>
<h1>Blackjack !</h1>
<div class='container'>
<div class='display_user'>
<?php if(count($board->getPlayers())):?>
  <h3>Liste des joueurs</h3>
  <ul>
    <?php foreach($board->getPlayers() as $player):
         if($player->name != 'Croupier'){?>
      <li>
      <form method="post" action="?controller=play&action=delete_user">
        <div class="form-group">
          <label for="user"> <?php echo($player->name); echo $player->getMoney();?> $ </label>
          <input type="hidden" value=<?php echo $player->id; ?> class="form-control" name='id_user' id="user">
          <button type="submit" class="btn btn-primary">Supprimer le joueur</button>
        </div>
      </form>
       
        
      </li>
    <?php } endforeach;?>
  </ul>
<?php else:?>
  <em>Pas encore de joueurs inscrits</em>
<?php endif;?>
</div>
<div class='form_controls'>
  <h3>Ajouter un joueur</h3>
  <form method="post" action="?controller=play&action=new_player">
          <div class="form-group">
            <label for="userName"> Nom : </label>
            <input type="text" class="form-control" name='player_name' id="userName">
            <button type="submit" class="btn btn-primary">Ajouter le joueur</button>
          </div>
        </form>

  <h3>Prêt ?</h3>
  <form method="post" action="?controller=play&action=bet_game">
  <!-- <form method="post" action="?controller=play&action=start_game"> -->
    <button type="submit" class="btn btn-primary">Commencer la partie !</button>
  </form>
</div>


<?php include("../views/foot.php"); ?>
</div>
