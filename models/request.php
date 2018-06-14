
<?php

require_once('../utils/bdd.php');

// global $bdd;

// $sql = $bdd->prepare('SELECT * FROM test');
// $sql->execute();
// $response = $sql->fetchAll(PDO::FETCH_ASSOC);

// echo json_encode($response, JSON_UNESCAPED_UNICODE);



//Insérer le like de l'utilisateur

function like($getId){
    global $bdd;
    $insert = $bdd->prepare("UPDATE tournages SET note = note + 1 WHERE id = :getId");
    $insert->bindParam(":getId", $getId, PDO::PARAM_INT);
    $insert->execute();
}

//Affichage des dix meilleurs notes utilisateur

function getBest(){
    global $bdd;
    $response = $bdd->prepare("SELECT * FROM `tournages` ORDER BY note DESC LIMIT 10");
    $response->execute();

    $result = $response->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}





