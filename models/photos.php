<?php
require_once('../utils/bdd.php');
//charger l'image
$photo = monfichier;
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['monfichier']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['monfichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['monfichier']['tmp_name'], 'site/' . basename($_FILES['monfichier']['name']));
                        echo "L'envoi a bien été effectué !";
                         
 
                }
        }
//requete pour insérer l'image dans la base de données        
function photos(){
    global $bdd;
    $response = $bdd->prepare("INSERT INTO images (id_image, url_image) VALUES ('', '$photo') while images.id_tournage = tournages.id");
    $response->execute();

    $result = $response->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
}

$photos = photos();
echo json_encode($photos);