<?php

namespace PygonGit\PluginCore\Controller;

use CakeDC\Users\Controller\UsersController as Controller;
use CakeDC\Users\Controller\Traits\LoginTrait;
use CakeDC\Users\Controller\Traits\RegisterTrait;

class UsersController extends Controller
{
    use LoginTrait;
    use RegisterTrait;

    public function initialize()
    {
        parent::initialize();
    }
}
