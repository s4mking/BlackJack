<?php
//Définition carte

  class Card{

    var $value;
    var $color;
    function __construct($color,$value){
      $this->color = $color;
      $this->value = $value;
    }

  }