<?php
require_once('../utils/bdd.php');

// $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

// if ($contentType === "application/json") {
//   //Receive the RAW post data.
//   $content = trim(file_get_contents("php://input"));

//   $decoded = json_decode($content, true);

//   //If json_decode failed, the JSON is invalid.
//   if(! is_array($decoded)) {

//   } else {
//     // Send error back to user.
//   }
// }

// var_dump($decoded);

//Requête pour affichage par arrondissement

function byArdt($ardt){
    global $bdd;

    $response = $bdd->prepare("SELECT * FROM `tournages` WHERE ardt LIKE \':ardt%\'");
    $response->bindParam(":ardt", $ardt, PDO::PARAM_INT);
    $response->execute();

    $result = $response->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

$byArdt = byArdt($_POST['data']);

echo json_encode($byArdt,  JSON_UNESCAPED_UNICODE); /*encodage de l'array $formation*/
