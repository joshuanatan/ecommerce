<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided" data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
            <i class="icon md-more" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
            <img class="navbar-brand-logo" src="<?php echo base_url();?>assets/main/images/logo.png" title="Remark">
            <span class="navbar-brand-text hidden-xs-down"> Remark</span>
        </div>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search" data-toggle="collapse">
            <span class="sr-only">Toggle Search</span>
            <i class="icon md-search" aria-hidden="true"></i>
        </button>
    </div>

    <div class="navbar-container container-fluid">
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <ul class="nav navbar-toolbar">
                <li class="nav-item hidden-float" id="toggleMenubar">
                    <a class="nav-link" data-toggle="menubar" href="#" role="button" style="height: 100%;padding-top: 60%;">
                        <i class="icon hamburger hamburger-arrow-left">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                        </i>
                    </a>
                </li>
                <li class="nav-item hidden-sm-down" id="toggleFullscreen">
                    <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                        <span class="sr-only">Toggle fullscreen</span>
                    </a>
                </li>
                <li class="nav-item hidden-float">
                    <a class="nav-link icon md-search" data-toggle="collapse" href="#" data-target="#site-navbar-search" role="button">
                        <span class="sr-only">Toggle Search</span>
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-fw dropdown-mega">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="fade" role="button">Mega <i class="icon md-chevron-down" aria-hidden="true"></i></a>
                    <div class="dropdown-menu" role="menu">
                        <div class="mega-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>UI Kit</h5>
                                    <ul class="blocks-2">
                                        <li class="mega-menu m-0">
                                            <ul class="list-icons">
                                                <li>
                                                    <i class="md-chevron-right" aria-hidden="true"></i>
                                                    <a href="advanced/animation.html">Animation</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mega-menu m-0">
                                            <ul class="list-icons">
                                                <li>
                                                    <i class="md-chevron-right" aria-hidden="true"></i>
                                                    <a href="uikit/modals.html">Modals</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <h5>Media
                                        <span class="badge badge-pill badge-success">4</span>
                                    </h5>
                                    <ul class="blocks-3">
                                        <li>
                                            <a class="thumbnail m-0" href="javascript:void(0)">
                                                <img class="w-full" src="<?php echo base_url();?>assets/global/photos/placeholder.png" alt="..." />
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="mb-0">Accordion</h5>
                                    <!-- Accordion -->
                                    <div class="panel-group panel-group-simple" id="siteMegaAccordion" aria-multiselectable="true" role="tablist">
                                        <div class="panel">
                                            <div class="panel-heading" id="siteMegaAccordionHeadingOne" role="tab">
                                                <a class="panel-title" data-toggle="collapse" href="#siteMegaCollapseOne" data-parent="#siteMegaAccordion" aria-expanded="false" aria-controls="siteMegaCollapseOne">
                                                    Collapsible Group Item #1
                                                </a>
                                            </div>
                                            <div class="panel-collapse collapse" id="siteMegaCollapseOne" aria-labelledby="siteMegaAccordionHeadingOne" role="tabpanel">
                                                <div class="panel-body">
                                                    De moveat laudatur vestra parum doloribus labitur sentire partes, eripuit praesenti
                                                    congressus ostendit alienae, voluptati ornateque accusamus
                                                    clamat reperietur convicia albucius.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" data-animation="scale-up" aria-expanded="false" role="button">
                        <span class="flag-icon flag-icon-us" style="height: 100%;padding-top: 60%;"></span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                            <span class="flag-icon flag-icon-gb"></span> English
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
                        <span class="avatar avatar-online">
                            <img src="<?php echo base_url();?>assets/global/portraits/5.jpg" alt="...">
                            <i></i>
                        </span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                            <i class="icon md-account" aria-hidden="true"></i> Profile
                        </a>
                        <div class="dropdown-divider" role="presentation"></div>
                        <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                            <i class="icon md-power" aria-hidden="true"></i> Logout
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications" aria-expanded="false"  data-animation="scale-up" role="button">
                        <i class="icon md-notifications" aria-hidden="true"></i>
                        <span class="badge badge-pill badge-danger up">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                        <div class="dropdown-menu-header">
                            <h5>NOTIFICATIONS</h5>
                            <span class="badge badge-round badge-danger">New 5</span>
                        </div>
                        <div class="list-group">
                            <div data-role="container">
                                <div data-role="content">
                                    <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="pr-10">
                                                <i class="icon md-receipt bg-red-600 white icon-circle" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">A new order has been placed</h6>
                                                <time class="media-meta" datetime="2017-06-12T20:50:48+08:00">5 hours ago</time>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-menu-footer">
                            <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                <i class="icon md-settings" aria-hidden="true"></i>
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                All notifications
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Messages" aria-expanded="false" data-animation="scale-up" role="button">
                        <i class="icon md-email" aria-hidden="true"></i>
                        <span class="badge badge-pill badge-info up">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                        <div class="dropdown-menu-header" role="presentation">
                            <h5>MESSAGES</h5>
                            <span class="badge badge-round badge-info">New 3</span>
                        </div>
                        <div class="list-group" role="presentation">
                            <div data-role="container">
                                <div data-role="content">
                                    <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                                        <div class="media">
                                            <div class="pr-10">
                                                <span class="avatar avatar-sm avatar-online">
                                                    <img src="<?php echo base_url();?>assets/global/portraits/2.jpg" alt="..." />
                                                    <i></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Mary Adams</h6>
                                                <div class="media-meta">
                                                    <time datetime="2017-06-17T20:22:05+08:00">30 minutes ago</time>
                                                </div>
                                                <div class="media-detail">Anyways, i would like just do it</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-menu-footer" role="presentation">
                            <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                                <i class="icon md-settings" aria-hidden="true"></i>
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                                See all messages
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item" id="toggleChat">
                    <a class="nav-link" data-toggle="site-sidebar" href="javascript:void(0)" title="Chat" data-url="site-sidebar.tpl">
                        <i class="icon md-comment" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
            <form role="search">
            <div class="form-group">
                <div class="input-search">
                <i class="input-search-icon md-search" aria-hidden="true"></i>
                <input type="text" class="form-control" name="site-search" placeholder="Search...">
                <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search"
                    data-toggle="collapse" aria-label="Close"></button>
                </div>
            </div>
            </form>
        </div>
    </div>
</nav>    
<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu" data-plugin="menu">
                    <li class="site-menu-category">General</li>
                    <li class="site-menu-item active">
                        <a class="animsition-link" href="index.html">
                                <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                                <span class="site-menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                            <span class="site-menu-title">Layouts</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="layouts/menu-collapsed.html">
                                    <span class="site-menu-title">Menu Collapsed</span>
                                </a>
                            </li>
                            <li class="site-menu-item has-sub">
                                <a href="javascript:void(0)">
                                    <span class="site-menu-title">Page Aside</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href="layouts/aside-left-static.html">
                                            <span class="site-menu-title">Left Static</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="site-menu-category">Elements</li>
                </ul>
                <div class="site-menubar-section">
                    <h5>
                        Milestone
                        <span class="float-right">30%</span>
                    </h5>
                    <div class="progress progress-xs">
                        <div class="progress-bar active" style="width: 30%;" role="progressbar"></div>
                    </div>
                </div>
            </div>      
        </div>
    </div>
</div>
<div class="site-menubar-footer">
    <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip" data-original-title="Settings">
        <span class="icon md-settings" aria-hidden="true"></span>
    </a>
    <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
        <span class="icon md-eye-off" aria-hidden="true"></span>
    </a>
    <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
        <span class="icon md-power" aria-hidden="true"></span>
    </a>
</div>
