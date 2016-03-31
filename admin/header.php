
<header class="main-header">
    <a class="logo" href="<?php echo baseUrl('admin/view/dashboard.php'); ?>"><img style="width: 158px;margin-top: -3px;height: 45px;" src="<?php echo baseUrl('images/angon_logo_1.png'); ?>"></a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span class="hidden-xs"><?php echo "" . getSession("admin_name") . ""; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <div class="pull-left">
                                <a href="javascript:void(0);" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo baseUrl('admin/logout.php'); ?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>
</header>

