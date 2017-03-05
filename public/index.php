<?php

require_once '../vendor/pillax/debug/debug.php';
require_once '../vendor/autoload.php';

/////////////////////////////////////////////////////////////////////
// Autoload
$loader = new \Aura\Autoload\Loader;
$loader->register();
$loader->addPrefix('app\controllers', '../app/controllers');

/////////////////////////////////////////////////////////////////////
// Router
$request = Zend\Diactoros\ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
$routerContainer = new \Aura\Router\RouterContainer();
$map = $routerContainer->getMap();
require_once '../app/router.php';
$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
if ($route) {
    $params = explode('#', $route->handler);
    $object = 'app\controllers\\' . $params[0];
    call_user_func_array([new $object, $params[1]], $route->attributes);
} else {
    echo "No route found for the request.";
    exit;
}





