<?php
require_once'../utils/bdd.php';
require_once'../utils/param.php';


//Requête pour afficher par format (télévisuel, cinématog etc...)
$Format = $_POST['format'];

function byFormat($format){
    global $bdd;
    $response = $bdd->prepare("SELECT * FROM `tournages` WHERE type_de_tournage = :forma");
    $response->bindParam(":forma", $format, PDO::PARAM_STR);
    $response->execute();

    $result = generator_tab($response);
    // $result = $response->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

$byFormat = byFormat($Format);

echo json_encode($byFormat,  JSON_UNESCAPED_UNICODE); /*encodage de l'array $formation*/