<section class="sidebar">
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li id="dashActive"><a href="<?php echo baseUrl('admin/view/dashboard.php'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>General Settings</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li id="bannerActive"><a href="<?php echo baseUrl('admin/view/banner/list.php'); ?>"><i class="fa fa-circle-o"></i> Banner List</a></li>
                <li id="projectActive"><a href="<?php echo baseUrl('admin/view/project/list.php'); ?>"><i class="fa fa-circle-o"></i> Project List</a></li>
                <li id="newsActive"><a href="<?php echo baseUrl('admin/view/news/list.php'); ?>"><i class="fa fa-circle-o"></i> News List</a></li>
            </ul>
        </li>
        <li id="contactActive"><a href="<?php echo baseUrl('admin/view/contact/contact_list.php'); ?>"><i class="fa fa-comment"></i> Contact Information</a></li>
        
    </ul>
</section>