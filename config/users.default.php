<?php


$config = [];
/*
$config['Auth']['authorize']['Users.Superuser'] = [
        //superuser field in the Users table
        'superuser_field' => 'is_superuser',
    ];
*/
$config['Users']['table'] = 'PygonGit/PluginCore.Users';
$config['Users']['controller'] = 'PygonGit/PluginCore.Users';
return $config;
