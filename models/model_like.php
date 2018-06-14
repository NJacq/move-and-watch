<?php
require_once'..utils/bdd.php';
// require_once'..utils/param.php';


//Insérer le like de l'utilisateur

function like($getId){
    global $bdd;
    $insert = $bdd->prepare("UPDATE tournages SET note = note + 1 WHERE id = :getId");
    $insert->bindParam(":getId", $getId, PDO::PARAM_INT);
    $insert->execute();
}

