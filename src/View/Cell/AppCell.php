<?php
namespace PygonGit\PluginCore\View\Cell;

use Cake\View\Cell;

class AppCell extends Cell
{
    public function __construct($request, $response, $eventManager, array $cellOptions)
    {
        parent::__construct($request, $response, $eventManager, $cellOptions);
        $this->viewBuilder()->autoLayout(false);
    }

    public function display()
    {
    }
}
