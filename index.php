<?php 
$url = $_SERVER['REQUEST_URI'];
var_dump($url);
if (isset($url)){

    switch ($url) { 
        case "/move-and-watch/home":
            require('view/index.html');
        break;

        case "/move-and-watch/contact":
            require_once 'view/contact.html';
        break;

        default:
            require_once 'view/error.html';
        break;
    }
} 
