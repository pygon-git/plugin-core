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
    try {
        Plugin::load('DebugKit', ['bootstrap' => true]);
    } catch (\Exception $e) {
    }
}

Plugin::load('Migrations');
Plugin::load('BootstrapUI');
Plugin::load('Cake/ElasticSearch', ['bootstrap' => true]);

// User management from the CakeDC
Configure::write('Users.config', ['users']);
Plugin::load('CakeDC/Users', ['routes' => true, 'bootstrap' => true]);

Configure::write('Users.Registration.active', false);
Configure::write('Auth.authenticate.Form.fields.username', 'email'); // use their email instead of a username

// allow social logins // All of the keys are test keys and route to a non-public website
Configure::write('Users.Social.login', true); //to enable social login

Configure::write('Users.GoogleAuthenticator.login', false);
Configure::write('OAuth.providers.facebook.options.clientId', '536639270007034');
Configure::write('OAuth.providers.facebook.options.clientSecret', 'ade8b402cb34fae5c24f6978631bdfd1');
Configure::write('OAuth.providers.facebook.options.graphApiVersion', 'v2.8');

Configure::write('OAuth.providers.twitter.options.clientId', '18nzzMJ3dEUbJO2HgClcDMLU8');
Configure::write('OAuth.providers.twitter.options.clientSecret', 'wKrfiZAnCaORzFpKy8wQAiTo7XRNfpqVDSlibQoMAqk4MKpq6Q');

// Enable recaptcha
Configure::write('Users.reCaptcha.key', '6LeEgDMUAAAAADbL8LWGIOeSJDD7opS4BV3-KlO-');
Configure::write('Users.reCaptcha.secret', '6LeEgDMUAAAAAA7On51ITALhomGC_mbctQBOiXuh');
Configure::write('Users.reCaptcha.registration', true); //enable on registration
Configure::write('Users.reCaptcha.login', true); //enable on login
