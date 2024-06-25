<?php

use Exceptions\RouteNotFoundException;
use Router\Router;


require './../vendor/autoload.php';

//use \Colors\RandomColor;

$router = new Router();

//ci-dessous des roots stockés dans un tab, attribut  de ma classe routeur
$router->register('/', function () { // on lui donne le registre racine '/' et on lui passe un function anonyme (clé et action, pour le tab de la classe)
    return 'HomePage';
});

$router->register('/contact', function () {
    return 'Contact Page ';
});

// on doit également faire une methode resolve ou run pour resoudre tout les pb de root
echo '<pre>';
var_dump($_SERVER['REQUEST_URI']); //superGlobal sur laquelle on peut faire un explode avec le ? pour eviter les argu passés : explode ('?', $_SERVER['REQUEST_URI']))
echo '</pre>';


try {
    $router->resolve($_SERVER['REQUEST_URI']);
} catch (RouteNotFoundException $e) {
    echo $e->getMessage();
}
