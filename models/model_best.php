
<?php

require_once('../utils/bdd.php');
require_once'../utils/param.php';

//Affichage des dix meilleurs notes utilisateur

function getBest(){
    global $bdd;
    $response = $bdd->prepare("SELECT * FROM `tournages` ORDER BY note DESC LIMIT 10");
    $response->execute();

    // $result = $response->fetchAll(PDO::FETCH_ASSOC);

    $result = generator_tab($response);

    return $result;
}


$getBest = getBest();

echo json_encode($getBest,  JSON_UNESCAPED_UNICODE); /*encodage de l'array $formation*/


