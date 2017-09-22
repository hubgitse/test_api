<?php

require 'bootstrap.php';

$routing = $config['api_routing'];

$route = isset($routing[$_SERVER['REQUEST_URI']])
    ? $routing[$_SERVER['REQUEST_URI']]
    : false;

if ($route === false) {
    throw new \RuntimeException('Could not find route');
}

$controllerClass = $route['_controller'];
$controllerMethod = $route['_method'];
$controller = new $controllerClass($serviceLocator);

$controller->{$controllerMethod}();