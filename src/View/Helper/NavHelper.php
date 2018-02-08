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
            $icon = $this->icon($options['icon'], $iconOptions);
            unset($options['icon']);
            if(!isset($options['badge']))
                $title = $this->tag('span', $title, ['class' => 'sr-only']);
        }

        // badge
        $badge = null;
        $badgeOptions = [];
        if(isset($options['badgeOptions']))
        {
            $badgeOptions = $options['badgeOptions'];
            unset($options['badgeOptions']);
        }

        if(isset($options['badge']))
        {
            $title = $this->badge($title, $badgeOptions);
            unset($options['badge']);
        }

        if(!isset($options['class']))
            $options['class'] = [];

        $options['class']['nav-link'] = 'nav-link';
        $options['class']['waves-light'] = 'waves-light';
        $options['class']['waves-effect'] = 'waves-effect';

        $options['class'] = implode(' ', $options['class']);


        return parent::link($icon.$title, $url, $options);
    }

    public function dropdownLink(string $title, $url = null, array $options = [])
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
            $icon = $this->icon($options['icon'], $iconOptions);
            unset($options['icon']);
        }

        // badge
        $badge = null;
        $badgeOptions = [];
        if(isset($options['badgeOptions']))
        {
            $badgeOptions = $options['badgeOptions'];
            unset($options['badgeOptions']);
        }

        if(isset($options['badge']))
        {
            $title = $this->badge($title, $badgeOptions);
            unset($options['badge']);
        }

        if(!isset($options['class']))
            $options['class'] = [];

        $options['class']['dropdown-item'] = 'dropdown-item';
        $options['class']['notify-item'] = 'notify-item';

        $options['class'] = implode(' ', $options['class']);


        return parent::link($icon.$title, $url, $options);
    }

    public function siteTitle(string $title, $url = null, array $options = [])
    {
    }
}
