
<?php

require_once('utils/bdd.php');

// global $bdd;

// $sql = $bdd->prepare('SELECT * FROM test');
// $sql->execute();
// $response = $sql->fetchAll(PDO::FETCH_ASSOC);

// echo json_encode($response, JSON_UNESCAPED_UNICODE);

//Requête pour affichage par arrondissement

function byArdt($ardt){
    global $bdd;

    $response = $bdd->prepare("SELECT * FROM `tournages` WHERE ardt LIKE \':ardt%\'");
    $response->bindParam(":ardt", $ardt, PDO::PARAM_INT);
    $response->execute();

    $result = $response->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}


//affichage par réalisateur
function byRea($rea){
    global $bdd;

    $response = $bdd->prepare("SELECT * FROM `tournages` WHERE realisateur LIKE \':rea\'");
    $response->bindParam(":rea", $rea, PDO::PARAM_STR);
    $response->execute();

    $result = $response->fetchAll(PDO::FETCH_ASSOC);

    return $result;

}

//





