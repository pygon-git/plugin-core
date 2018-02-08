<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'PygonGit/PluginCore',
    [
        'path' => '/plugin-core',
//        '_namePrefix' => 'plugin-core:',
    ],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);

Router::connect('/register', ['plugin' => 'PygonGit/PluginCore', 'controller' => 'Users', 'action' => 'register'], ['_name' => 'plugin-core:register']);
Router::connect('/profile/*', ['plugin' => 'PygonGit/PluginCore', 'controller' => 'Users', 'action' => 'profile'], ['_name' => 'plugin-core:profile']);
Router::connect('/login', ['plugin' => 'PygonGit/PluginCore', 'controller' => 'Users', 'action' => 'login'], ['_name' => 'plugin-core:login']);
Router::connect('/logout', ['plugin' => 'PygonGit/PluginCore', 'controller' => 'Users', 'action' => 'logout'], ['_name' => 'plugin-core:logout']);

Router::connect('/users', ['plugin' => 'PygonGit/PluginCore', 'controller' => 'Users', 'action' => 'index'], ['_name' => 'plugin-core:users-index']);
