<?php echo $player->name;?>: 
<?php  echo $player->money; 
echo 'totot';?>

<br> 

<form method="post" action="/?controller=play&action=new_player">
  <input type="text" name="player">
  <button type="submit">Ajouter</button>
</form>