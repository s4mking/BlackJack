<?php
?>
<?php include("../views/head.php");?>
<h2>Partie fini</h2>
<table class="table table_result">
  <thead class="thead-light">
    <tr>
      <th scope="col">Joueur</th>
      <th scope="col">Score</th>
    </tr>
  </thead>
  <tbody>
<?php
 foreach($board->getPlayers() as $player):
 if($player->name != 'Croupier'){?>

    <tr>
      <td><?php echo($player->name); ?></td>
      <td><?php echo $player->getMoney(); ?> $</td>
    </tr>    
  </li>
<?php } endforeach;?>
</tbody>
 </table>
<h3>Relancer une partie</h3>
<form method="post" action="?controller=play&action=relaunch">
  <button class='btn-primary' type="submit">Encore !!!</button>
</form>
