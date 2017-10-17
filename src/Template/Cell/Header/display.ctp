<?php

use Cake\Core\Configure;
?>

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><i class="mdi mdi-radar"></i> <span><?= Configure::read('App.title') ?></span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <nav class="navbar-custom">

                    <?= $this->cell('PygonGit/PluginCore.UserNav')->render() ?>

                    <?= $this->cell('PygonGit/PluginCore.Search')->render() ?>

                </nav>

            </div>
            <!-- Top Bar End -->
