<?php

namespace PygonGit\PluginCore\View;

use Cake\View\View;
use BootstrapUI\View\UIViewTrait;


class PluginCoreView extends View
{
    use UIViewTrait;

    public function initialize()
    {
        parent::initialize();

        $this->initializeUI(['layout' => 'PygonGit/PluginCore.default']);
    }
}
