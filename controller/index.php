<?php

function index_list($dir){
   
    $array_files=[];
    require_once("../models/filer.php");
    $list_files = listDir($dir);
    foreach($list_files as $link){
        if ($link === '.' or $link === '..' or $link ==='.DS_Store') continue;
        if (is_dir($dir . '/' . $link)) {
            $array_files[$link]="dir";
        }else{
            $array_files[$link]="file";
        }
    //Dans mon idee on affihce tout la
    }
    include("../views/index_home.php");
}