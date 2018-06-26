<?php
require_once'../utils/bdd.php';
require_once'../utils/param.php';


$Rea = $_POST["realisateur"];

//affichage par réalisateur
function byRea($rea){
    global $bdd;

    $response = $bdd->prepare("SELECT * FROM `tournages` WHERE realisateur = :rea");
    $response->bindParam(":rea", $rea, PDO::PARAM_STR);
    $response->execute();

    $result = generator_tab($response);

    return $result;
}

$byRea = byRea($Rea);

echo json_encode($byRea,  JSON_UNESCAPED_UNICODE); /*encodage de l'array $formation*/