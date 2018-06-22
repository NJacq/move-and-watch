<?php
require_once('../utils/bdd.php');

function allArdt(){
    global $bdd;
    $response = $bdd->prepare("SELECT DISTINCT `ardt` FROM `tournages`  ORDER BY ASC");
    $response->execute();

    $result = $response->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
}

$allArdt = allArdt();
echo json_encode($allArdt);