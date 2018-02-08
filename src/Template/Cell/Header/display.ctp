<?php

use Cake\Core\Configure;
?>

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <?= $this->Html->link(
                            $this->Html->icon('fa-home').
                            $this->Html->tag('span', Configure::read('App.title')),
                            ['_name' => 'home'],
                            ['class' => 'logo', 'escape' => false]
                        ) ?>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <nav class="navbar-custom">

                    <?= $this->cell('PygonGit/PluginCore.UserNav')->render() ?>

                    <?= $this->cell('PygonGit/PluginCore.Search')->render() ?>

                </nav>

            </div>
            <!-- Top Bar End -->
