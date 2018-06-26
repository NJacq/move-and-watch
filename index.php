<?php

if (isset($_GET['action'])){
    switch ($_GET['action']) { 
        case "home":
            require_once 'view/index.html';
        break;

        case "us/":
            require_once 'view/contact.html';
            require_once 'models/contact.php';
        break;

        default:
            require_once 'view/error.html';
        break;
        
        
    }
}

