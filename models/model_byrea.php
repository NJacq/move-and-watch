<?php
require_once'../utils/bdd.php';
require_once'../utils/param.php';

//affichage par réalisateur
function byRea($rea){
    global $bdd;

    $response = $bdd->prepare("SELECT * FROM `tournages` WHERE realisateur LIKE \':rea\'");
    $response->bindParam(":rea", $rea, PDO::PARAM_STR);
    $response->execute();

    // $result = $response->fetchAll(PDO::FETCH_ASSOC);
    $result = generator_tab($response);

    return $result;
}

$byRea = byRea();

echo json_encode($byRea,  JSON_UNESCAPED_UNICODE); /*encodage de l'array $formation*/