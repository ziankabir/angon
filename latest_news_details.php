<?php
include './config/config.php';
$news_id = '';
$news_title = '';
$news_details = '';
$news_status = 'Inactive';
$news_image = '';
$news_date = '';
if (isset($_GET['id'])) {
    $news_id = $_GET['id'];
}
$sql = "SELECT * FROM news WHERE news_id=$news_id";
$result = mysqli_query($con, $sql);
if ($result) {
    $obj = mysqli_fetch_object($result);
    $news_title = $obj->news_title;
    $news_details = $obj->news_details;
    $news_date = $obj->news_date;
    $news_image = $obj->news_image;
}
?>
<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <?php include './header_script.php'; ?>
        <script src="js/modernizr.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
                <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
        <div class="body"> 
            <header class="site-header">
                <div class="topbar">
                    <div class="container">
                        <div class="row">
                            <?php include './header.php'; ?>
                        </div>
                    </div>
                </div>
                <div class="main-menu-wrapper">
                    <div class="container">
                        <div class="row">
                            <?php include './menu.php'; ?>
                        </div>
                    </div>
                </div>
            </header>
            <div class="nav-backed-header parallax" style="background-image:url(images/timthumb.png);">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="#">News</a></li>
                                <li class="active">Post title</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <h1><?php echo $news_title; ?></h1>
                        </div>

                    </div>
                </div>
            </div>
            <div class="main" role="main">
                <div id="content" class="content full">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <header class="single-post-header clearfix">
                                    <div class="pull-right post-comments-count">  </div>
                                    <h2 class="post-title"><?php echo $news_title; ?></h2>
                                </header>
                                <article class="post-content"> 
                                    <span class="post-meta meta-data"><span>
                                            <i class="fa fa-calendar"></i> Posted on <?php echo date('d-M-Y', strtotime($news_date)); ?></span>
                                    </span>
                                    <div class="featured-image"> <img src="<?php echo $config['IMAGE_UPLOAD_URL'] . '/news_image/' . $news_image; ?>" alt="<?php echo $news_title; ?>"> </div>
                                    <p><?php echo html_entity_decode($news_details); ?></p>                               
                                </article>
                            </div>
                            <div class="col-md-3 sidebar">
                                <div class="widget sidebar-widget search-form-widget">
                                    <div class="input-group input-group-lg">
                                        <input type="text" class="form-control" placeholder="Search Posts...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button"><i class="fa fa-search fa-lg"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="widget sidebar-widget">
                                    <div class="sidebar-widget-title">
                                        <h3>Post Categories</h3>
                                    </div>
                                    <ul>
                                        <li><a href="#">Faith</a> (10)</li>
                                        <li><a href="#">Missions</a> (12)</li>
                                        <li><a href="#">Salvation</a> (34)</li>
                                        <li><a href="#">Worship</a> (14)</li>
                                    </ul>
                                </div>
                                <div class="widget sidebar-widget">
                                    <div class="sidebar-widget-title">
                                        <h3>Post Tags</h3>
                                    </div>
                                    <div class="tag-cloud"> <a href="#">Faith</a> <a href="#">Heart</a> <a href="#">Love</a> <a href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a href="#">Missions</a> <a href="#">Worship</a> <a href="#">Faith</a> <a href="#">Heart</a> <a href="#">Love</a> <a href="#">Praise</a> <a href="#">Sin</a> <a href="#">Soul</a> <a href="#">Missions</a> <a href="#">Worship</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include './footer.php'; ?>
        </div>
        <?php include './footer_script.php'; ?>
    </body>
</html>