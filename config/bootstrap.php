<?php

use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\Core\Plugin;

try {
    Configure::config('PluginCore', new PhpConfig());
    Configure::load('app', 'PluginCore', false);
} catch (\Exception $e) {
    exit($e->getMessage() . "\n");
}

Plugin::load('Migrations');
Plugin::load('BootstrapUI');
Plugin::load('Cake/ElasticSearch', ['bootstrap' => true]);
