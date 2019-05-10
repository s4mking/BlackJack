<?php include("../views/head.php");?>
<h1>Blackjack !</h1>
<div class='container'>
<div class="card rule">
  <div class="card-body">
  <h3 class="spip card-title ">But du jeu</h3>
  <p>Après avoir reçu deux cartes, le joueur tire des cartes pour s’approcher de la valeur 21 sans la dépasser. Le but du joueur est de battre le croupier en obtenant un total de points supérieur à celui-ci ou en voyant ce dernier dépasser 21. Chaque joueur joue contre le croupier, qui représente la banque, ou le casino, et non contre les autres joueurs.</p>
  <h3 class="spip card-title">Valeurs des cartes au blackjack</h3>
  <ul>
    <li>Chaque carte numérotée de 2 à 10 a sa valeur nominale (égale au numéro sur la carte)</li>
    <li>Les valets, les dames et les rois (les figures), ont une valeur de 10 points</li>
    <li>L’As vaut 1 point ou 11 points, au choix du joueur</li>
  </ul>
    <img src='assets/imgs/cards/value.gif' alt='blackjack'>
  </div>
</div>
<div class='display_user'>
<?php if(count($board->getPlayers())):?>
  <h3>Liste des joueurs</h3>
  <ul>
    <?php foreach($board->getPlayers() as $player):
         if($player->name != 'Croupier'){?>
      <li>
      <form method="post" action="?controller=play&action=delete_user">
        <div class="form-group">
          <label for="user"> <?php echo($player->name).' '; echo $player->getMoney();?> $</span> </label>
          <input type="hidden" value=<?php echo $player->id; ?> class="form-control" name='id_user' id="user">
          <button type="submit" class="btn btn-danger">Supprimer le joueur</button>
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
    <button type="submit" class="btn btn-success">Commencer la partie !</button>
  </form>
</div>


<?php include("../views/foot.php"); ?>
</div>
