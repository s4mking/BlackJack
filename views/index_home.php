<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Filer</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
  <section class="section">
  <div class="container">
    <h1 class="title">Mon filer</h1>
    <div class="columns">
      <div class="column">
      <table class="table is-fullwidth is-hoverable">
<?php
foreach($array_files as $key=>$file){
  
    if($file =="dir"){?>
       <tr>
            <td><i class="fas fa-folder"></i></td>
            <td><?php echo("<a href='index.php".make_path("index","list",["path"=>$key])."'>".$key."</a>");?></td>
            <td></td>
          </tr>
    <?php }else{ ?>
             <tr>
             <td><i class="fas fa-file"></i></td>
             <td><?php echo("<a href='index.php".make_path("index","list",["path"=>"zz"])."'>".$key."</a>");?></td>
             <td>
               <form>
               <input type="hidden" name="localisation_del" value="">
                 <button class="button is-light is-small"  type="submit"><i class="fas fa-trash-alt"></i></button>
               </form>
             </td>
           </tr>
  <?php  }
}    