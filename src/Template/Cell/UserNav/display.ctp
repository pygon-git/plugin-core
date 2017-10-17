
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
                                ['class' => ['right-bar-toggle' => 'right-bar-toggle'], 'icon' => 'mdi-dots-horizontal', 'iconOptions' => ['noti' => true]]
                            ) ?>
                        </li>

                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <?= $this->Html->icon('mdi-bell', ['noti' => true]) ?>
                                <?= $this->Html->badge('4', ['noti' => true, 'color' => 'pink']) ?>
                            </a>
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
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <?= $this->Html->icon('mdi-account', ['noti' => true]) ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>Welcome ! <?= $user['first_name'] ?></small> </h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <?= $this->Html->icon('mdi-account-star-variant') ?>
                                    <span>Profile</span>
                                </a>

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
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <?= $this->Html->icon('mdi-logout') ?>
                                    <span>Logout</span>
                                </a>

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
