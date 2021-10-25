<!-- Start Header Top Area -->
<div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('frontassets/tta/img/logo/logo.png')); ?>" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <!-- <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-search"></i></span></a>
                                <div role="menu" class="dropdown-menu search-dd animated flipInX">
                                    <div class="search-input">
                                        <i class="notika-icon notika-left-arrow"></i>
                                        <input type="text" />
                                    </div>
                                </div>
                            </li> -->
                            
                        
                            <?php if(!Auth::guest()): ?>
                                
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span>Welcome :- <?php echo e(Auth::user()->name); ?></span> <span class="caret"></span></a>
                                <div role="menu" class="dropdown-menu message-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Hi, <?php echo e(Auth::user()->name); ?></h2>
                                    </div>
                                    <div class="hd-message-info">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <?php echo e(__('Logout')); ?>

                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
                                    
                                </div>
                            </li>
                            <?php endif; ?>
                            
                        
                            
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="<?php echo e(route('home')); ?>">Check for updates</a></li>
                                    </ul>
                                </li>
                                <?php if(!Auth::guest()): ?>
                                <li><a data-toggle="collapse" data-target="#demoevent" href="#">Reviews</a>
                                    <ul id="demoevent" class="collapse dropdown-header-top">
                                        <li><a href="inbox.html">Review Requests</a></li>
                                        <li><a href="view-email.html">Reviews Given</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#democrou" href="#">Profile</a>
                                    <ul id="democrou" class="collapse dropdown-header-top">
                                        <li><a href="<?php echo e(route('profile')); ?>">Company logo</a></li>
                                        <li><a href="<?php echo e(route('profile')); ?>">Profile Details</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demolibra" href="#">Pack Balance</a>
                                    <ul id="demolibra" class="collapse dropdown-header-top">
                                        <li><a href="<?php echo e(route('home')); ?>">Check for pack balance</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="#">Custom Review Form</a>
                                    <ul id="demodepart" class="collapse dropdown-header-top">
                                        <li><a href="<?php echo e(route('managereviewform')); ?>">Manage Review Form</a></li>
                                    </ul>
                                </li>
                                <?php endif; ?>
                                <?php if(auth()->guard()->guest()): ?>
                                <li><a data-toggle="collapse" data-target="#demo" href="#">Access Account</a>
                                    <ul id="demo" class="collapse dropdown-header-top">
                                        <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                                        <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                                    </ul>
                                </li>
                                <?php endif; ?>
                                
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="active"><a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <?php if(!Auth::guest()): ?>
                        <li><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-mail"></i> Reviews</a>
                        </li>
                        <li><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-edit"></i> Profile</a>
                        </li>
                        <li><a data-toggle="tab" href="#Charts"><i class="notika-icon notika-bar-chart"></i> Pack Balance</a>
                        </li>
                        <li><a data-toggle="tab" href="#Tables"><i class="notika-icon notika-windows"></i> Custom Review Form</a>
                        </li>
                        <?php else: ?>
                        <li><a data-toggle="tab" href="#Forms"><i class="notika-icon notika-form"></i> Access Account</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="<?php echo e(route('home')); ?>">Check for updates</a>
                                </li>
                            </ul>
                        </div>
                        <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                            <li><a href="<?php echo e(route('reviewrequestssent')); ?>">Review Requests</a></li>
                                        <li><a href="<?php echo e(route('reviewsgiven')); ?>">Reviews Given</a></li>
                                        <li><a href="<?php echo e(route('home')); ?>">Send review request</a></li>
                            </ul>
                        </div>
                        <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                            <li><a href="<?php echo e(route('profile')); ?>">Company logo</a></li>
                                        <li><a href="<?php echo e(route('profile')); ?>">Profile Details</a></li>
                            </ul>
                        </div>
                        <div id="Charts" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                            <li><a href="<?php echo e(route('home')); ?>">Check for pack balance</a></li>
                            </ul>
                        </div>
                        <div id="Tables" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                            <li><a href="<?php echo e(route('managereviewform')); ?>">Manage Review Form</a></li>
                            </ul>
                        </div>
                        <div id="Forms" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                            <?php if(auth()->guard()->guest()): ?>
                                <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                                <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                            <?php endif; ?>
                            </ul>
                        </div>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End--><?php /**PATH /home/jatin/Web/kops/resources/views/includes/topheader.blade.php ENDPATH**/ ?>