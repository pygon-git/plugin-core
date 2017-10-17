<?php
namespace PygonGit\PluginCore\View\Cell;

use PygonGit\PluginCore\View\Cell\AppCell as Cell;

class UserNavCell extends Cell
{
    public function display()
    {
        $user = $this->request->session()->read('Auth.User');
        $this->set('user', $user);
    }
}
