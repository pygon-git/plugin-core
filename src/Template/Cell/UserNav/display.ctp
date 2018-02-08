
                    <ul class="list-inline float-right mb-0">
                        <li class="list-inline-item notification-list hide-phone">
                            <?= $this->Nav->topLink(__('Toggle Full Screen'),
                                '#',
                                ['id' => 'btn-fullscreen', 'icon' => 'mdi-crop-free', 'iconOptions' => ['noti' => true]]
                            ) ?>
                        </li>
                        <?php
                        //debug($user);
                        if($user):
                        ?>

                        <li class="list-inline-item notification-list">
                            <?= $this->Nav->topLink(__('Toggle Full Screen'),
                                '#',
                                [
                                    'class' => ['right-bar-toggle' => 'right-bar-toggle'],
                                    'icon' => 'mdi-dots-horizontal',
                                    'iconOptions' => ['noti' => true]
                                ]
                            ) ?>
                        </li>

                        <li class="list-inline-item dropdown notification-list">
                            <?= $this->Nav->topLink(__('4'),
                                '#',
                                [
                                    'class' => ['dropdown-toggle' => 'dropdown-toggle', 'arrow-none' => 'arrow-none'],
                                    'data-toggle' => 'dropdown',
                                    'role' => 'button',
                                    'aria-haspopup' => 'false',
                                    'aria-expanded' => 'false',
                                    'icon' => 'mdi-bell',
                                    'iconOptions' => ['noti' => true],
                                    'badge' => true,
                                    'badgeOptions' => ['noti' => true, 'color' => 'pink']
                                ]
                            ) ?>
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg" aria-labelledby="Preview">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="font-16"><span class="badge badge-danger float-right">5</span>Notification</h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-comment-account"></i></div>
                                    <p class="notify-details">Robert S. Taylor commented on Admin<small class="text-muted">1 min ago</small></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info"><i class="mdi mdi-account"></i></div>
                                    <p class="notify-details">New user registered.<small class="text-muted">1 min ago</small></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger"><i class="mdi mdi-airplane"></i></div>
                                    <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">1 min ago</small></p>
                                </a>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item notify-all">
                                    View All
                                </a>

                            </div>
                        </li>

                        <li class="list-inline-item dropdown notification-list">
                            <?= $this->Nav->topLink(__('Account'),
                                '#',
                                [
                                    'class' => ['dropdown-toggle' => 'dropdown-toggle', 'nav-user' => 'nav-user'],
                                    'data-toggle' => 'dropdown',
                                    'role' => 'button',
                                    'aria-haspopup' => 'false',
                                    'aria-expanded' => 'false',
                                    'icon' => 'mdi-account',
                                    'iconOptions' => ['noti' => true]
                                ]
                            ) ?>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>Welcome ! <?= $user['first_name'] ?></small> </h5>
                                </div>

                                <!-- item-->
                                <?= $this->Nav->dropdownLink(__('Profile'),
                                    ['_name' => 'plugin-core:profile'],
                                    [
                                        'icon' => 'mdi-account-star-variant',
                                    ]
                                ) ?>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <?= $this->Html->icon('mdi-settings') ?>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <?= $this->Html->icon('mdi-lock-open') ?>
                                    <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                <?= $this->Nav->dropdownLink(__('Logout'),
                                    ['_name' => 'plugin-core:logout'],
                                    [
                                        'icon' => 'mdi-logout',
                                    ]
                                ) ?>

                            </div>
                        </li>
                    <?php else: ?>

                        <li class="list-inline-item notification-list">
                            <?= $this->Nav->topLink(__('Login'),
                                ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'login'],
                                ['icon' => 'mdi-login']
                            ) ?>
                        </li>
                    <?php endif; ?>

                    </ul>
