<?php
namespace PygonGit\PluginCore\View\Cell;

use PygonGit\PluginCore\View\Cell\AppCell as Cell;

class PagetitleCell extends Cell
{
    public function display($page_title = null)
    {
        if(!$page_title)
            $page_title = $this->request->controller;

        $this->set(compact('page_title'));
    }
}
