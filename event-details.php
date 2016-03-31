<?php
include './config/config.php';
$id = '';
$title = '';
$image = '';
$details = '';
$date = '';
$time = '';
$venue = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
// getting data
if ($id != '' && $id > 0) {
    $sql = "SELECT * FROM angon_event WHERe angon_event_id = $id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $obj = mysqli_fetch_object($result);
        $title = $obj->angon_event_title;
        $image = $obj->angon_event_image;
        $details = $obj->angon_event_details;
        $date = $obj->angon_event_date;
        $time = $obj->angon_event_time;
        $venue = $obj->angon_event_venue;
    } else {
        
    }
}

$arrayME = array();
$sqlME = "SELECT * FROM angon_event WHERE angon_event_is_upcoming='Yes' AND angon_event_status='Active'";
$resultME = mysqli_query($con, $sqlME);
if ($resultME) {
    while ($objME = mysqli_fetch_object($resultME)) {
        $arrayME[] = $objME;
    }
} else {
    
}

$array = array();
$sql = "SELECT * FROM news WHERE news_status='Active' ORDER BY news_id DESC LIMIT 3";
$result = mysqli_query($con, $sql);
if ($result) {
    while ($obj = mysqli_fetch_object($result)) {
        $array[] = $obj;
    }
} else {
    
}
//debug($array);
?>
<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <?php include './header_script.php'; ?> 
    </head>
    <body>
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
            <div class="nav-backed-header parallax" style="background-image:url(images/slide1.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="event.php">Events</a></li>
                                <li class="active"><?php echo $title; ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-sm-10 col-xs-8">
                            <h1>Events</h1>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4"> <a href="event.php" class="pull-right btn btn-primary">All events</a> </div>
                    </div>
                </div>
            </div>
            <div class="main" role="main">
                <div id="content" class="content full">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <header class="single-post-header clearfix">
                                    <nav class="btn-toolbar pull-right"> 
                                        <a href="#" class="btn btn-default" data-placement="bottom" data-toggle="tooltip" data-original-title="Print" >
                                            <i class="fa fa-print"></i>
                                        </a>
                                        <a href="#" class="btn btn-default" data-placement="bottom" data-toggle="tooltip" data-original-title="Contact us" >
                                            <i class="fa fa-envelope"></i>
                                        </a> 
                                        <a href="#" class="btn btn-default" data-placement="bottom" data-toggle="tooltip" data-original-title="Share event" >
                                            <i class="fa fa-location-arrow"></i>
                                        </a>
                                    </nav>
                                    <h2 class="post-title"><?php echo $title; ?></h2>
                                </header>
                                <article class="post-content">
                                    <div class="event-description"> <img src="<?php echo $config['IMAGE_UPLOAD_URL'] . '/angon_event_image/' . $image; ?>" alt="<?php echo $title; ?>" class="img-responsive" style="width: 100%;">
                                        <div class="spacer-20"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Event details</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <ul class="info-table">
                                                            <li><i class="fa fa-calendar"></i> <strong><?php echo date('D', strtotime($date)); ?></strong> | <?php echo date('d', strtotime($date)); ?> <?php echo date('M', strtotime($date)); ?>, <?php echo date('Y', strtotime($date)); ?></li>
                                                            <li><i class="fa fa-clock-o"></i> <?php echo $time; ?></li>
                                                            <?php if ($venue): ?>
                                                                <li><i class="fa fa-map-marker"></i> <?php echo $venue; ?></li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <p><?php echo html_entity_decode($details); ?></p>
                                    </div>
                                </article>
                            </div>

                            <div class="col-md-3 sidebar">
                                <?php if (count($arrayME) > 0): ?>
                                    <div class="widget sidebar-widget">
                                        <div class="sidebar-widget-title">
                                            <h3>Upcoming Events</h3>
                                        </div>
                                        <ul>
                                            <?php foreach ($arrayME AS $ME): ?>
                                                <li class="item event-item clearfix">
                                                    <div class="event-date"> <span class="date"><?php echo date('d', strtotime($ME->angon_event_date)); ?></span> <span class="month"><?php echo date('M', strtotime($ME->angon_event_date)); ?></span> </div>
                                                    <div class="event-detail">
                                                        <h4><a href="event-details.php?id=<?php echo $ME->angon_event_id; ?>"><?php echo $ME->angon_event_title; ?></a></h4>
                                                        <span class="event-dayntime meta-data"><?php echo date('D', strtotime($ME->angon_event_date)); ?> | <?php echo $ME->angon_event_time; ?></span> 
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <?php if (count($array) > 0): ?>
                                    <div class="widget-recent-posts widget">
                                        <div class="sidebar-widget-title">
                                            <h3>Recent Posts</h3>
                                        </div>
                                        <ul>
                                            <?php foreach ($array AS $news): ?>
                                            <li class="clearfix"> 
                                                <a href="latest_news_details.php?id=<?php echo $news->news_id; ?>" class="media-box post-image">
                                                    <img src="<?php echo $config['IMAGE_UPLOAD_URL'] . '/news_image/' . $news->news_image;; ?>" alt="<?php echo $news->news_title; ?>" class="img-thumbnail"> 
                                                </a>
                                                <div class="widget-blog-content">
                                                    <a href="latest_news_details.php?id=<?php echo $news->news_id; ?>"><?php echo $news->news_title; ?></a> 
                                                    <span class="meta-data"><i class="fa fa-calendar"></i> on <?php echo date('d', strtotime($news->news_date)); ?> <?php echo date('M', strtotime($news->news_date)); ?>, <?php echo date('Y', strtotime($news->news_date)); ?></span> 
                                                </div>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
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