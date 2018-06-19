<?php
require_once'../utils/bdd.php';
require_once'../utils/param.php';

// $lol = ['ouf' => $_POST['ardt']];
// echo json_encode($lol);

$Ardt = $_POST["ardt"];
//Requête pour affichage par arrondissement

function byArdt($ardt){
    global $bdd;

    $response = $bdd->prepare("SELECT * FROM tournages WHERE ardt = :ardt");
    $response->bindParam(":ardt", $ardt, PDO::PARAM_STR);
    $response->execute();

    // $result = $response->fetchAll(PDO::FETCH_ASSOC);
    $result = generator_tab($response);

    return $result;
}

$byArdt = byArdt($Ardt);
echo json_encode($byArdt);

// echo json_encode($byArdt, JSON_UNESCAPED_UNICODE); /*encodage de l'array $formation*/
// echo json_encode($Ardt, JSON_UNESCAPED_UNICODE);
