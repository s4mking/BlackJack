<?php
include("../views/head.php");
var_dump($board->getPlayers());
// die('ttt');
foreach($board->getPlayers() as $player){
  if($player->name != 'Croupier'){
  $cards = $player->getCards();
  $sum = $player->calcCards();
   
  if($player->id == $board->getActual_player()){ ?>
<form method="post" action="?controller=play&action=setBet">
          <div class="form-group">
            <label for="bet"> <?php echo $player->name ?> </label>
            <div class="slidecontainer">
                 <input type="range" name='bet' min="1" max="<?php echo $player->getMoney() ?>" value="1" class="slider" id="myRange">
                 <label for='myRange' id='demo'></label>
            </div>
            <!-- <input type="text" class="form-control betInput" name='bet' id="bet" placeholder="Votre mise"> -->
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
    <button type="submit" class="btn btn-danger">Recommencer à zéro !</button>
  </form>
  <script>
    var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value+' $'; 

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value +' $';
}
  </script>