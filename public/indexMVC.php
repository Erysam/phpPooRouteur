<?php

use Exceptions\RouteNotFoundException;
use Router\Router;


require './../vendor/autoload.php';


$router = new Router();

$router->register('/', ['Controllers\HomeController', 'index']); //on execute la methode index dans HomeController 

/*$router->register('/contact', function () {
    return 'Contact Page ';
});*/


try {
    $router->resolve($_SERVER['REQUEST_URI']);
} catch (RouteNotFoundException $e) {
    echo $e->getMessage();
}
