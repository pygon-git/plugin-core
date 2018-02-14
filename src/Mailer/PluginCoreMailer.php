<?php
namespace PygonGit\PluginCore\Mailer;

use Cake\Datasource\EntityInterface;
use CakeDC\Users\Mailer\UsersMailer;

class PluginCoreMailer extends UsersMailer
{
    public function resetPassword(EntityInterface $user)
    {
        parent::resetPassword($user);
        $this->setTemplate('PygonGit/PluginCore.reset_password');
    }
}
