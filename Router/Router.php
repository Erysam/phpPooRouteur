<?php

namespace Router;

class Router
{
    //on declare un attribut tab 
    private array $routes;

    // callable (call : qui peut etre appelé) type de donnée qui represente une fonction, 
    //souvent used pour passer une focntion en parametre à une methode (utilisé sur les callback, les tris personnalisés)
    public function register(string $path, callable $action): void
    {
        $this->routes[$path] = $action;
    }
}
