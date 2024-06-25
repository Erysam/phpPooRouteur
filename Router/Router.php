<?php

namespace Router;

use Exceptions\RouteNotFoundException;

class Router
{
    //on declare un attribut tab 
    private array $routes;

    // callable (call : qui peut etre appelé) type de donnée qui represente une fonction, 
    //souvent used pour passer une focntion en parametre à une methode (utilisé sur les callback, les tris personnalisés)
    public function register(string $path, callable|array $action): void // c ets une union de typage '|' sinon peut mettre un mixed (pas réduit les avantages du typage)
    {
        $this->routes[$path] = $action;
    }

    public function resolve(string $uri): mixed //(car on peut revoyer un callable ou une exception)
    {
        $path = explode('?', $uri)[0]; //la 1er clé sera tjrs la bonne
        $action = $this->routes[$path] ?? null; //?? null ets un ternaire: si $this->routes[$path] est defini et différent de null on le met dans $action
        //exemple de ternaire plus parlant: $message = ($age >= 18) ? 'Vous êtes majeur.' : 'Vous êtes mineur.';
        if (!is_callable($action)) { //si c'est différent de is callable qui est methode a appliquer si le path ets difini
            throw new RouteNotFoundException();
        }
        return $action(); // $action est un callable donc on met des parentheses
    }
}
