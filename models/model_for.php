<?php
require_once('../utils/bdd.php');

function allFormat(){
    global $bdd;
    $response = $bdd->prepare("SELECT DISTINCT `type_de_tournage` as `format` FROM `tournages`");
    $response->execute();
    $result = $response->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

$allFormat = allFormat();
echo json_encode($allFormat);