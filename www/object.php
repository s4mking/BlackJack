<?php
class Existence{
    var $vie=0;
    var $force=0;

    function __construct($vie,$force){
        $this->vie=$vie;
        $this->force=$force;
    }

    function attack($personnage){   
            $personnage->vie=$personnage->vie - $this->force;        
    }
}
class Monde{
    var $personnages=[];

    static $instance;

    static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new Monde();
        }else{
            return self::$instance;
        }
    }
    function ajouterPersonnage($personnage){

    }
}


class Personnage extends Existence{
    var $pseudo = "";

    function __construct($pseudo,$vie,$force){
        parent::__construct($vie,$force);
        $this->pseudo=$pseudo;
    }

    static function hasard(){
        $array_character=array(
            "samuel",
            "Bob",
            "Peter",
            "Jerome",
            "Xavier"
        );

        $personnage=new Personnage("Doe",20,250);
        $new_name=$array_character;
        $this->pseudo=$new_name;
        return $personnage;
    }
}
class Monstre extends Existence{

    var $nom = "";  

    function __construct($nom,$vie,$force){
        parent::__construct($vie,$force);
        $this->nom=$nom;
    }

    function attack($existence){
        if(get_class($existence)=='Monstre'){
            echo "Tas pas le droit!!!";
        }else{
            echo("Vous avez attaqué".$existence->pseudo);
        }
    }
}

$personnage1 = new Monstre("Samuel",50,50);
$personnage2 = new Monstre("Lambda",100,100);
$personnage3 = new Personnage("Hector",100,100);
var_dump($personnage3);
$personnage1->attack($personnage2);
$personnage1->attack($personnage3);
$personnage1->attack($personnage2);
$monde=Monde::getInstance();