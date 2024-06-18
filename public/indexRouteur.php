<?php

require './../vendor/autoload.php';

//use \Colors\RandomColor;

use Router\Router;



$routeur = new Router;

//ci-dessous des roots stockés dans un tab, attribut  de ma classe routeur
$router->register('/', function () { // on lui donne le registre racine '/' et on lui passe un function anonyme
    return 'HomePage';
});

$router->register('/contact', function () {
    return 'Contact Page ';
});

// on doit également faire une methode resolve ou run pour resoudre tout les pb de root