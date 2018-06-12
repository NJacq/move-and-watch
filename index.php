<?php

if (isset($_GET['action'])){
    switch ($_GET['action']) { 
        case "home":
            require_once 'view/index.html';
        break;

        case "contact":
            require_once 'view/contact.html';
        break;

        default:
            require_once 'view/error.html';
        break;
    }
}

