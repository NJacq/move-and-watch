<?php
require_once('../utils/bdd.php');

function allRea(){
    global $bdd;
    $response = $bdd->prepare("SELECT DISTINCT `realisateur` FROM `tournages`  ORDER BY realisateur");
    $response->execute();

    $result = $response->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
}

$allRea = allRea();
echo json_encode($allRea);