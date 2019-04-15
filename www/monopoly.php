<?php
    require_once("../src/Dice.php");
    require_once("../src/Game.php");
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
            <?php
                $board = new Game();
                $dice = new Dice();
                $result = $dice->launch();
            
                echo $result;


            ?>
    </body>
    </html>