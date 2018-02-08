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

use Cake\Utility\Security;
use Composer\Script\Event;
use Exception;

/**
 * Provides installation hooks for when this application is installed via
 * composer. Customize this class to suit your needs.
 */
class PluginCoreInstaller
{

    /**
     * Does some routine installation tasks so people don't have to.
     *
     * @param \Composer\Script\Event $event The composer event object.
     * @param string $dir The application's root directory.
     * @return void
     */
    public static function postInstall(Event $event)
    {
        $io = $event->getIO();

        $rootDir = dirname(dirname(__DIR__));
        $io->write('PygonGit\PluginCore: $rootDir: '+$rootDir);

        require $rootDir.DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."paths.php";

        static::linkVendorAssets($event);
        static::createUserConfig($rootDir);

        $io->write('PygonGit\PluginCore is installed.');
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
        $io = $event->getIO();

        $rootDir = dirname(dirname(__DIR__));
        $io->write('PygonGit\PluginCore: $rootDir: '+$rootDir);

        require $rootDir.DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."paths.php";

        static::linkVendorAssets($event);
        static::createUserConfig($event, $rootDir);

        $io->write('PygonGit\PluginCore is updated.');
    }

    /**
     * links the vendor assets to the webroot for the css/js files
     *
     * @param \Composer\Script\Event $event
     * @return void
     */
    public static function linkVendorAssets(Event $event)
    {
        $io = $event->getIO();
        $io->write('Checking Vendor Assets');

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
            $io->write('Relinking Vendor Assets');
            unlink(WWW_ROOT.DS.'assets');
        }
        else
        {
            $io->write('Linking Vendor Assets');

            symlink(ROOT.DS.'vendor', WWW_ROOT.DS.'assets');
        }

    }

    /**
     * Create the config/user.php file if it does not exist.
     *
     * @param string $dir The application's root directory.
     * @return void
     */
    public static function createUserConfig(Event $event, $dir)
    {
        $io = $event->getIO();
        $io->write('Checking Users Config');

        $rootDir = dirname(dirname(__DIR__));
        $io->write('PygonGit\PluginCore: $rootDir: '+$rootDir);

        $appConfig = $dir.DS.'config'.DS.'users.php';
        $defaultConfig = $rootDir.DS.'config'.DS.'users.default.php';
        if (!file_exists($appConfig))
        {
            copy($defaultConfig, $appConfig);
            $io->write('Created `config/users.php` file');
        }
        else
        {
            $io->write('`config/users.php` file already exists.');
        }
    }
}
