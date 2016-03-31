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



$arrayME = array();
$sqlME = "SELECT * FROM angon_event WHERE angon_event_status='Active' LIMIT 5";
$resultME = mysqli_query($con, $sqlME);
if ($resultME) {
    while ($objME = mysqli_fetch_object($resultME)) {
        $arrayME[] = $objME;
    }
} else {
    
}
?>
<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <?php include './header_script.php'; ?>
        <script src="js/modernizr.js"></script>
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