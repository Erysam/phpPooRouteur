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

    public function resolve(string $uri)
    {
        $path = explode('?', $uri)[0]; //la 1er clé sera tjrs la bonne
        $action = $this->routes[$path] ?? null; //??null ets un ternaire : $message = ($age >= 18) ? 'Vous êtes majeur.' : 'Vous êtes mineur.';
    }
}
