<?php

spl_autoload_register(function($class){
  $elements = explode("\\", $class);
  $path = implode("/", $elements).".php";
  // var_dump(realpath(__DIR__)."/".$path);
  require_once(realpath(__DIR__)."/".$path);
});