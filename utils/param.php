<?php
function generator_tab($response){

    while($geo = $response->fetch(PDO::FETCH_ASSOC))   /*génération du tableau */
    {
	
    $tournage[] = array( /*tableau des objets*/
        
        'type' => 'Feature', /*en tête de l'objet voir http://geojson.org/*/
        
		'geometry' => array(
            'type' => 'Point', /*type de l'objet*/
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
    return $tournage;
}	