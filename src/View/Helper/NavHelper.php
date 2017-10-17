<?php
namespace PygonGit\PluginCore\View\Helper;

class NavHelper extends \PygonGit\PluginCore\View\Helper\HtmlHelper
{

    public function initialize(array $config)
    {
        parent::initialize($config);

    }

    public function topLink(string $title, $url = null, array $options = [])
    {
        if(!isset($options['escape']))
            $options['escape'] = false;

        // icon
        $icon = null;
        $iconOptions = [];
        if(isset($options['iconOptions']))
        {
            $iconOptions = $options['iconOptions'];
            unset($options['iconOptions']);
        }

        if(isset($options['icon']))
        {
            $icon = $this->icon($options['icon']);
            unset($options['icon']);

            $title = $this->tag('span', $title, ['class' => 'sr-only']);
        }

        if(!isset($options['class']))
            $options['class'] = [];

        $options['class']['nav-link'] = 'nav-link';
        $options['class']['waves-light'] = 'waves-light';
        $options['class']['waves-effect'] = 'waves-effect';

        $options['class'] = implode(' ', $options['class']);


        return parent::link($icon.$title, $url, $options);
    }
}
