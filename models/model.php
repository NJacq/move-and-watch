<?php
require_once('../utils/bdd.php');
require_once'../utils/param.php';

$req = $bdd->prepare("SELECT * FROM `tournages` WHERE ardt = '20ème'"); /*requète vers la table*/
	
$req->execute();

$tournage = generator_tab($req);

echo json_encode($tournage,  JSON_UNESCAPED_UNICODE); /*encodage de l'array $formation*/
													
?>



