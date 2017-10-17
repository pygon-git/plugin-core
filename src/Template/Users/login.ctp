<?php
/**
 * Copyright 2010 - 2017, Cake Development Corporation (https://www.cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2017, Cake Development Corporation (https://www.cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

use Cake\Core\Configure;
$this->extend('PygonGit/PluginCore.Layout/signin');

echo $this->Flash->render('auth');
echo $this->Form->loginCreate();
echo $this->Form->loginFields();
echo $this->Form->loginButton(__d('CakeDC/Users', 'Login'));
echo $this->Form->loginLinks();
echo $this->Form->end();
