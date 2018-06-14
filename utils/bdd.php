<?php

try{
  
    $bdd = new PDO('mysql:host=localhost;dbname=move_watch;charset=utf8','admin','Ma Ch1p3tt3!');

}
catch(Exeption $e)
{      
	die('Erreur:'.$e->getMessage());
}
    