 <?php

if((isset($_POST['submit'])) && (!empty($_POST["mail"])) && (!empty($_POST["message"]))){
   
    $from = $_POST['mail'];;

    $to = "claire.b@codeur.online";

    $message = $_POST['message'];

    $headers = "From:" . $from;

    mail($to, $message, $headers);

    echo '<span class="envoi">Email envoyé.</span>';
}else{
    //echo '<span class="echec">Tapez un email valide.</span>';
}
?>