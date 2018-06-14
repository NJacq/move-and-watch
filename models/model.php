<?php
require_once('../utils/bdd.php');
require_once'../utils/param.php';

$req = $bdd->prepare("SELECT * FROM `tournages` WHERE ardt = '1er'"); /*requète vers la table*/
	
$req->execute();
$tournage = generator_tab($req);
echo json_encode($tournage,  JSON_UNESCAPED_UNICODE); /*encodage de l'array $formation*/

// print_r($geo);


// $tournages = file_get_contents('../view/tournages.geojson', 'r+');  /* ouverture du fichier geojson*/


// file_put_contents($tournages, $geo, FILE_APPEND | LOCK_EX); /* ecriture des points récupérés depuis la base de données*/


// // fclose($tournages); /* fermeture du fichier geojson*/									
															
									
// // header('Location: form_carto.php'); /* renvoie vers la le formulaire*/	


// $fp = fopen('../view/tournages.geojson', 'a');//opens file in append mode  
// fwrite($fp, $geo);  
// // fwrite($fp, 'appending data');  
// fclose($fp);  
																	
?>



