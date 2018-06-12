<?php

try{
  
    $bdd=new PDO('mysql:host=localhost;dbname=move_watch;charset=utf8','','');
}
catch(Exeption $e)
{      
	die('Erreur:'.$e->getMessage());
}
    