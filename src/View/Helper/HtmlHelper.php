<?php

namespace PygonGit\PluginCore\View\Helper;

class HtmlHelper extends \BootstrapUI\View\Helper\HtmlHelper
{

    public function initialize(array $config)
    {
        parent::initialize($config);

    }

    public function icon($name, array $options = [])
    {
        $options['aria-hidden'] = 'true';
        if(!isset($options['class']))
            $options['class'] = [];
        // see what icon class we're dealing with
        if(stripos($name, 'fa') !== false)
        {
            $options['class']['fa'] = 'fa';
            $options['class']['fa-fw'] = 'fa-fw';
        }
        if(stripos($name, 'mdi') !== false)
        {
            $options['class']['mdi'] = 'mdi';
        }
        $options['class'][$name] = $name;

        if(isset($options['noti']))
        {
            $options['class']['noti-icon'] = 'noti-icon';
            unset($options['noti']);
        }

        $options['class'] = implode(' ', $options['class']);

        return parent::tag('i', '', $options);
    }

    public function badge($text, array $options = [] )
    {
        $options['aria-hidden'] = 'true';
        if(!isset($options['class']))
            $options['class'] = [];

        $options['class']['badge'] = 'badge';

        if(isset($options['color']))
        {
            $options['class']['badge-'.$options['color']] = 'badge-'.$options['color'];
            unset($options['color']);
        }

        if(isset($options['noti']))
        {
            $options['class']['noti-icon-badge'] = 'noti-icon-badge';
            unset($options['noti']);
        }

        $options['class'] = implode(' ', $options['class']);

        return parent::tag('span', $text, $options);
    }
}
