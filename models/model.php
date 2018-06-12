


<?php


// 
// $db = new PDO('mysql:host=localhost;dbname=move_watch;charset=utf8','admin','Ma Ch1p3tt3!');

// $sql = $db->prepare('SELECT * FROM tournages');
// $sql->execute();
// $response = $sql->fetchAll(PDO::FETCH_ASSOC);

// echo json_encode($response, JSON_UNESCAPED_UNICODE);


$db = new PDO('mysql:host=localhost;dbname=move_watch;charset=utf8','admin','Ma Ch1p3tt3!');

	
	$req = $db->prepare("SELECT * FROM `tournages` WHERE ardt = '2ème'"); /*requète vers la table*/
	
$req->execute();
	while($geo = $req->fetch())   /*génération du tableau */
    {
	
	$tournage[] = array(  															 /*tableau des objets*/
						 'type' 		=> 'Feature',  								 /*en tête de l'objet voir http://geojson.org/*/
						 'geometry'	=> array(
                                                 'type' => 'Point', 					 /*type de l'objet*/
                                                 'coordinates'=>array(floatval($geo['y']),floatval($geo['x']))),
												// 'coordinates' => "[".$geo['y'].",".$geo['x']."]"),
						 'properties' => array(
												'titre' => $geo['titre'], /* concaténation des variables dates et nom pour l'affichage du titre*/
                                                'adresse' => $geo['adresse'],/* concaténation des variables  pour l'affichage des details*/ 
                                                'realisateur' => $geo['realisateur'],
                                                'type_de_tournage' => $geo['type_de_tournage'],
                                                'organisme_demandeur' => $geo['organisme_demandeur'],
                                                'ardt' => $geo['ardt'],
                                                'xy'=>array(floatval($geo['x']),floatval($geo['y']))
												));
	
	}
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



