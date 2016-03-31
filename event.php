<?php
include './config/config.php';

$arrayME = array();
$sqlME = "SELECT * FROM angon_event WHERE angon_event_status='Active'";
$resultME = mysqli_query($con, $sqlME);
if ($resultME) {
    while ($objME = mysqli_fetch_object($resultME)) {
        $arrayME[] = $objME;
    }
} else {
    
}

$array = array();
$sql = "SELECT * FROM news WHERE news_status='Active' ORDER BY news_id DESC LIMIT 2";
$result = mysqli_query($con, $sql);
if ($result) {
    while ($obj = mysqli_fetch_object($result)) {
        $array[] = $obj;
    }
} else {
    
}
?>
<!DOCTYPE HTML>
<html class="no-js">
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
                            <li class="active">All Events</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>All Events</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="main" role="main">
            <div id="content" class="content full">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9"> 
                            <div class="listing events-listing">
                                <header class="listing-header">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <h3>All Events</h3>
                                        </div>

                                    </div>
                                </header>
                                <section class="listing-cont">
                                    <?php if (count($arrayME) > 0): ?>
                                        <ul>
                                            <?php foreach ($arrayME AS $ME): ?>
                                                <li class="item event-item">
                                                    <div class="event-date">
                                                        <span class="date"><?php echo date('d', strtotime($ME->angon_event_date)); ?></span> 
                                                        <span class="month"><?php echo date('M', strtotime($ME->angon_event_date)); ?></span>
                                                    </div>
                                                    <div class="event-detail">
                                                        <h4><a href="event-details.php?id=<?php echo $ME->angon_event_id; ?>"><?php echo $ME->angon_event_title; ?></a></h4>
                                                        <span class="event-dayntime meta-data"><?php echo date('D', strtotime($ME->angon_event_date)); ?> | <?php echo $ME->angon_event_time; ?> | <?php echo date('Y', strtotime($ME->angon_event_date)); ?></span>
                                                    </div>
                                                    <div>
                                                        <div><a href="event-details.php?id=<?php echo $ME->angon_event_id; ?>" class="btn btn-default btn-sm">Details</a></div>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </section>

                            </div>
                        </div>
                        <div class="col-md-3 sidebar">
                            <div class="widget sidebar-widget">
                                <div class="widget-recent-posts widget">
                                    <div class="sidebar-widget-title">
                                        <h3>Recent News</h3>
                                    </div>
                                    <?php if (count($array) > 0): ?>
                                        <ul>
                                            <?php foreach ($array AS $news): ?>
                                                <li class="clearfix"> 
                                                    <a href="#" class="media-box post-image">
                                                        <img src="<?php echo $config['IMAGE_UPLOAD_URL'] . '/news_image/' . $news->news_image; ?>" alt="<?php echo $news->news_title; ?>" class="img-thumbnail">
                                                    </a>
                                                    <div class="widget-blog-content"><a href="latest_news_details.php?id=<?php echo $news->news_id; ?>"><?php echo $news->news_title; ?></a>
                                                        <span class="meta-data"><i class="fa fa-calendar"></i> on <?php echo date('d-M-Y', strtotime($news->news_date)); ?></span>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include './footer.php'; ?>
        </div>
        <?php include './footer_script.php'; ?>
    </div>
</body>
</html>