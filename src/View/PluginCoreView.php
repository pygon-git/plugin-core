<?php

namespace PygonGit\PluginCore\View;


class PluginCoreView extends \Cake\View\View
{

    public function initialize()
    {
        parent::initialize();

        $this->layout = 'PygonGit/PluginCore.default';
        $this->loadHelper('Html', ['className' => 'PygonGit/PluginCore.Html']);
        $this->loadHelper('Form', ['className' => 'PygonGit/PluginCore.Form']);
        $this->loadHelper('Flash', ['className' => 'PygonGit/PluginCore.Flash']);
        $this->loadHelper('Paginator', ['className' => 'PygonGit/PluginCore.Paginator']);
        if (class_exists('\Cake\View\Helper\BreadcrumbsHelper')) {
            $this->loadHelper('Breadcrumbs', ['className' => 'PygonGit/PluginCore.Breadcrumbs']);
        }
        $this->loadHelper('Nav', ['className' => 'PygonGit/PluginCore.Nav']);
    }
}
