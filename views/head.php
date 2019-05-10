<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="assets/theme.css">  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <meta charset="UTF-8">
  <title>Blackjack</title>
  <style>
    body{background-color: #ccc;}
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #07b1f4;">
  <a class="navbar-brand" href="#">Blackjack</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <form method="post" action="?controller=play&action=reinit">
        <button type="submit" class="btn btn-warning">Recommencer à zéro !</button>
       </form>
      </li>
    </ul>
  </div>
</nav>