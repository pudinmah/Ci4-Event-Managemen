                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                        <!DOCTYPE html>
                        <html lang="en">

                        <head>
                            <meta charset="UTF-8">
                            <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
                            <?= $this->renderSection('title') ?>

                            <!-- General CSS Files -->
                            <!-- E:\CI4\ci4-undangan\public\template\node_modules\@fortawesome\fontawesome-free\css -->
                            <!-- E:\CI4\ci4-undangan\public\template\node_modules\bootstrap\dist\css -->
                            <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
                            <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.css">

                            <!-- CSS Libraries -->

                            <!-- Template CSS -->
                            <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
                            <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">
                        </head>

                        <body>
                            <div id="app">
                                <div class="main-wrapper">
                                    <div class="navbar-bg"></div>
                                    <nav class="navbar navbar-expand-lg main-navbar">
                                        <form class="form-inline mr-auto">
                                            <ul class="navbar-nav mr-3">
                                                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                                            </ul>

                                        </form>
                                        <ul class="navbar-nav navbar-right">
                                            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                                                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                                    <div class="dropdown-header">Messages
                                                        <div class="float-right">
                                                            <a href="#">Mark All As Read</a>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-list-content dropdown-list-message">
                                                        <a href="#" class="dropdown-item dropdown-item-unread">
                                                            <div class="dropdown-item-avatar">
                                                                <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-3.png" class="rounded-circle">
                                                                <div class="is-online"></div>
                                                            </div>
                                                            <div class="dropdown-item-desc">
                                                                <b>Agung Ardiansyah</b>
                                                                <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                                <div class="time">12 Hours Ago</div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="dropdown-item">
                                                            <div class="dropdown-item-avatar">
                                                                <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-4.png" class="rounded-circle">
                                                            </div>
                                                            <div class="dropdown-item-desc">
                                                                <b>Ardian Rahardiansyah</b>
                                                                <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                                                                <div class="time">16 Hours Ago</div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="dropdown-item">
                                                            <div class="dropdown-item-avatar">
                                                                <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-5.png" class="rounded-circle">
                                                            </div>
                                                            <div class="dropdown-item-desc">
                                                                <b>Alfa Zulkarnain</b>
                                                                <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                                                <div class="time">Yesterday</div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="dropdown-footer text-center">
                                                        <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                                                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                                    <div class="dropdown-header">Notifications
                                                        <div class="float-right">
                                                            <a href="#">Mark All As Read</a>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-list-content dropdown-list-icons">
                                                        <a href="#" class="dropdown-item dropdown-item-unread">
                                                            <div class="dropdown-item-icon bg-primary text-white">
                                                                <i class="fas fa-code"></i>
                                                            </div>
                                                            <div class="dropdown-item-desc">
                                                                Template update is available now!
                                                                <div class="time text-primary">2 Min Ago</div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="dropdown-item">
                                                            <div class="dropdown-item-icon bg-info text-white">
                                                                <i class="far fa-user"></i>
                                                            </div>
                                                            <div class="dropdown-item-desc">
                                                                <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                                                                <div class="time">10 Hours Ago</div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="dropdown-item">
                                                            <div class="dropdown-item-icon bg-success text-white">
                                                                <i class="fas fa-check"></i>
                                                            </div>
                                                            <div class="dropdown-item-desc">
                                                                <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                                                                <div class="time">12 Hours Ago</div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="dropdown-item">
                                                            <div class="dropdown-item-icon bg-danger text-white">
                                                                <i class="fas fa-exclamation-triangle"></i>
                                                            </div>
                                                            <div class="dropdown-item-desc">
                                                                Low disk space. Let's clean it!
                                                                <div class="time">17 Hours Ago</div>
                                                            </div>
                                                        </a>
                                                        <a href="#" class="dropdown-item">
                                                            <div class="dropdown-item-icon bg-info text-white">
                                                                <i class="fas fa-bell"></i>
                                                            </div>
                                                            <div class="dropdown-item-desc">
                                                                Welcome to Stisla template!
                                                                <div class="time">Yesterday</div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="dropdown-footer text-center">
                                                        <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                                    <img alt="image" src="<?= base_url() ?>template/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                                                    <div class="d-sm-none d-lg-inline-block">Hi, Mahpudin</div>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <div class="dropdown-title">Logged in 5 min ago</div>
                                                    <a href="features-profile.html" class="dropdown-item has-icon">
                                                        <i class="far fa-user"></i> Profile
                                                    </a>
                                                    <a href="features-settings.html" class="dropdown-item has-icon">
                                                        <i class="fas fa-cog"></i> Settings
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="<?= site_url('auth/logout') ?>" class="dropdown-item has-icon text-danger" id="logout" data-confirm="Logout?|Yakin keluar aplikasi?" data-confirm-yes="Logout()">
                                                        <i class="fas fa-sign-out-alt"></i> Logout
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="main-sidebar">
                                        <aside id="sidebar-wrapper">
                                            <div class="sidebar-brand">
                                                <a href="<?= site_url() ?>">yukNikah</a>
                                            </div>
                                            <div class="sidebar-brand sidebar-brand-sm">
                                                <a href="<?= site_url() ?>">yN</a>
                                            </div>
                                            <ul class="sidebar-menu">
                                                <!-- Including View Partials -->
                                                <!-- https://codeigniter.com/user_guide/outgoing/view_layouts.html#using-layouts-in-views -->
                                                <?= $this->include('layouts/menu') ?>
                                            </ul>

                                            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                                                <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                                                    <i class="fas fa-rocket"></i> Upgrade to Pro
                                                </a>
                                            </div>
                                        </aside>
                                    </div>

                                    <!-- Main Content -->
                                    <!-- https://codeigniter.com/user_guide/outgoing/view_layouts.html -->
                                    <div class="main-content">
                                        <!-- Creating A Layout -->
                                        <?= $this->renderSection('content') ?>
                                    </div>
                                    <footer class="main-footer">
                                        <div class="footer-left">
                                            Copyright &copy; 2025 <div class="bullet"></div> Delevoper By <a href="https://nauval.in/">Mahpudin</a>
                                        </div>
                                        <div class="footer-right">
                                            2.3.0
                                        </div>
                                    </footer>
                                </div>
                            </div>

                            <!-- General JS Scripts -->
                            <script src="<?= base_url() ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
                            <script src="<?= base_url() ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="<?= base_url() ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
                            <script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>


                            <!-- JS Libraies -->

                            <!-- Template JS File -->
                            <script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
                            <script src="<?= base_url() ?>/template/assets/js/custom.js"></script>

                            <!-- Page Specific JS File -->
                        </body>

                        </html>