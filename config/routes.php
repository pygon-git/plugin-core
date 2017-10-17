<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'PluginCore',
    ['path' => '/plugin-core'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);
Router::connect('/register', ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'register']);
