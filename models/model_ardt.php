<?php
require_once('../utils/bdd.php');

//Requête pour affichage par arrondissement

function byArdt($ardt){
    global $bdd;

    $response = $bdd->prepare("SELECT * FROM `tournages` WHERE ardt LIKE \':ardt%\'");
    $response->bindParam(":ardt", $ardt, PDO::PARAM_INT);
    $response->execute();

    $result = $response->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

$byArdt = byArdt();