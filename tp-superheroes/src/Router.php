<?php

class Router extends AltoRouter
{
    public function run()
    {
        // Renvoie un tableau avec la route qui "matche" avec l'URL actuelle
        $match = $this->match();

        // On exécute la "closure" correspondante à la route sinon on renvoie une 404
        if (is_array($match) && is_callable($match['target'])) {
            call_user_func_array($match['target'], $match['params']);
        // Sinon si c'est un controller Controller@method
        } else if (is_array($match) && is_string($match['target'])) {
            // Transforme Controller@method en ['Controller', 'method']
            [$controller, $action] = explode('@', $match['target']);
            $controller = 'Controller\\'.$controller;
            call_user_func_array([new $controller(), $action], $match['params']);
        } else {
            header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
            require __DIR__.'/../templates/404.php';
        }
    }
}
