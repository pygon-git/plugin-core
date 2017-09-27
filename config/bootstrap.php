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

/*
 * Only try to load DebugKit in development mode
 * Debug Kit should not be installed on a production system
 */
if (Configure::read('debug')) {
    Plugin::load('DebugKit', ['bootstrap' => true]);
}

Plugin::load('Migrations');
Plugin::load('BootstrapUI');
Plugin::load('Cake/ElasticSearch', ['bootstrap' => true]);
