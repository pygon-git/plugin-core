<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace PygonGit\PluginCore\Console;

define('BASE_PATH', realpath(dirname(dirname(dirname(dirname(dirname(__FILE__)))))));
include( BASE_PATH. DIRECTORY_SEPARATOR. 'autoload.php');
/*
exit();
function my_autoloader($class)
{
    $filename = BASE_PATH . '/lib/' . str_replace('\\', '/', $class) . '.php';
    include($filename);
}
spl_autoload_register('Migrations');
*/

use Cake\Console\Shell;
use Cake\Utility\Security;
use Composer\Script\Event;
use Composer\Installer\PackageEvent;
use Exception;

/**
 * Provides installation hooks for when this application is installed via
 * composer. Customize this class to suit your needs.
 */
class PluginCoreInstaller
{

    public static $ioPrefix = 'PygonGit\PluginCore: ';

    /**
     * Does some routine installation tasks so people don't have to.
     *
     * @param \Composer\Script\Event $event The composer event object.
     * @param string $dir The application's root directory.
     * @return void
     */
    public static function postInstall(Event $event)
    {
        $rootDir = dirname(dirname(dirname(dirname(dirname(__DIR__)))));
        static::ioWrite($event, ' $rootDir: '.$rootDir);

        require $rootDir.DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."paths.php";

        static::linkVendorAssets($event);
        static::createUserConfig($event, $rootDir);

        if (class_exists('\Cake\Codeception\Console\Installer')) {
            \Cake\Codeception\Console\Installer::customizeCodeceptionBinary($event);
        }

        static::ioWrite($event, 'Installed.');
    }

    /**
     * Runs post update methods/actions
     *
     * @param \Composer\Script\Event $event
     * @param string $dir The application's root directory.
     * @return void
     */
    public static function postUpdate(Event $event)
    {
        $rootDir = dirname(dirname(dirname(dirname(dirname(__DIR__)))));
        static::ioWrite($event, ' $rootDir: '.$rootDir);

        require $rootDir.DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."paths.php";

        static::linkVendorAssets($event);
        static::createUserConfig($event, $rootDir);

        if (class_exists('\Cake\Codeception\Console\Installer')) {
            \Cake\Codeception\Console\Installer::customizeCodeceptionBinary($event);
        }

        static::ioWrite($event, 'Updated');
    }

    /**
     * links the vendor assets to the webroot for the css/js files
     *
     * @param \Composer\Script\Event $event
     * @return void
     */
    public static function linkVendorAssets(Event $event)
    {
        static::ioWrite($event, 'Checking Vendor Assets');

        $isLinked = false;

        if ($handle = opendir(WWW_ROOT))
        {

            while (false !== ($entry = readdir($handle)))
            {
                if($entry == 'assets')
                    $isLinked = true;
            }

            closedir($handle);
        }

        if($isLinked)
        {
            static::ioWrite($event, 'Relinking Vendor Assets');
            unlink(WWW_ROOT.DS.'assets');
        }
        static::ioWrite($event, 'Linking Vendor Assets');
        symlink('..'.DS.'vendor', WWW_ROOT.DS.'assets');

    }

    /**
     * Create the config/user.php file if it does not exist.
     *
     * @param \Composer\Script\Event $event
     * @param string $dir The application's root directory.
     * @return void
     */
    public static function createUserConfig(Event $event, $dir)
    {
        static::ioWrite($event, 'Checking Users Config ');

        $rootDir = dirname(dirname(dirname(dirname(dirname(__DIR__)))));
        static::ioWrite($event, '$rootDir: '.$rootDir);

        $appConfig = $dir.DS.'config'.DS.'users.php';
        $defaultConfig = $rootDir.DS.'config'.DS.'users.default.php';
        if (!file_exists($appConfig))
        {
            copy($defaultConfig, $appConfig);
            static::ioWrite($event, 'Created `config/users.php` file');
        }
        else
        {
            static::ioWrite($event, '`config/users.php` file already exists.');
        }
    }

    /**
     * Write out information in a standard format.
     *
     * @param \Composer\Script\Event $event
     * @param string $msg The message to write
     * @return void
     */
    public static function ioWrite(Event $event, $msg = '')
    {
        // track what called me
        $backtrace = debug_backtrace();
        $function = (isset($backtrace[1]['function'])?$backtrace[1]['function']:'unknown');
        $io = $event->getIO();
        $io->write(sprintf('%s - %s: %s', static::$ioPrefix, $function, $msg));
    }
}
