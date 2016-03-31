<?php
include './config/config.php';
$arraySlider = array();
$sqlSlider = "SELECT * FROM banner WHERE banner_status = 'Active' ORDER BY banner_id DESC";
$resultSlider = mysqli_query($con, $sqlSlider);
if ($resultSlider) {
    while ($objSlider = mysqli_fetch_object($resultSlider)) {
        $arraySlider[] = $objSlider;
    }
} else {
    
}

$title = '';
$short_details = '';
$venue = '';
$date = '';
$image = '';
// recent event
$sqlRE = "SELECT * FROM angon_event WHERE angon_event_status='Active' ORDER BY angon_event_created_on DESC LIMIT 1";
$resultRE = mysqli_query($con, $sqlRE);
if ($resultRE) {
    $objRE = mysqli_fetch_object($resultRE);
    $title = $objRE->angon_event_title;
    $short_details = $objRE->angon_event_short_details;
    $date = $objRE->angon_event_date;
    $image = $objRE->angon_event_image;
    $venue = $objRE->angon_event_venue;
} else {
    
}
?>
<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <?php include './header_script.php'; ?>
    </head>
    <body>
        <div class="body"> 
            <!-- Start Site Header -->
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
                            <?php include 'menu.php'; ?>
                        </div>
                    </div>
                </div>
            </header>
            <?php if (count($arraySlider) > 0): ?>
                <div class="hero-slider flexslider clearfix" data-autoplay="yes" data-pagination="yes" data-arrows="yes" data-style="fade" data-pause="yes">
                    <ul class="slides">
                        <?php foreach ($arraySlider AS $slider): ?>
                            <li class="parallax" style="background-image:url(<?php echo $config['IMAGE_UPLOAD_URL'] . '/banner_image/' . $slider->banner_image; ?>);"></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
<!--                <div class="notice-bar">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-6 notice-bar-title"> <span class="notice-bar-title-icon hidden-xs"><i class="fa fa-calendar fa-3x"></i></span> <span class="title-note">Next</span> <strong>Upcoming Event</strong> </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 notice-bar-event-title">
                                <h5><a href="">Opening Angon at Gazipur</a></h5>

                                <span class="meta-data">1 November, 2015</span>
                            </div>
                            <div id="counter" class="col-md-4 col-sm-6 col-xs-12 counter" data-date="November 1, 2015">
                                <div class="timer-col"> <span id="days"></span> <span class="timer-type">days</span> </div>
                                <div class="timer-col"> <span id="hours"></span> <span class="timer-type">hrs</span> </div>
                                <div class="timer-col"> <span id="minutes"></span> <span class="timer-type">mins</span> </div>
                                <div class="timer-col"> <span id="seconds"></span> <span class="timer-type">secs</span> </div>
                            </div>
                            <div class="col-md-2 col-sm-6 hidden-xs"> <a href="" class="btn btn-primary btn-lg btn-block">All Events</a> </div>
                        </div>
                    </div>
                </div>-->
            <?php endif; ?>
            <div class="main" role="main">
                <div id="content" class="content full">
                    <div class="container">
                        <div class="row"> 
                            <?php include './project.php'; ?>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-sm-6"> 
                                <!-- Events Listing -->
                                <div class="listing events-listing">
                                    <?php include './coming_event.php'; ?>
                                </div>
                                <div class="spacer-30"></div>
                                <!-- Latest News -->
                                <div class="listing post-listing">
                                    <?php include './latest_news.php'; ?>
                                </div>
                            </div>
                            <?php ?>
                            <?php if ($title != ''): ?>
                                <div class="col-md-4 col-sm-6"> 
                                    <div class="listing sermons-listing">
                                        <header class="listing-header">
                                            <h3>Recent Event</h3>
                                        </header>
                                        <section class="listing-cont">
                                            <ul>
                                                <li class="item sermon featured-sermon"> <span class="date"><?php echo date("j F Y", strtotime(($date))); ?></span>

                                                    <h4><?php echo $title; ?> </h4>
                                                    <div class="featured-sermon-video">
                                                        <img src="<?php echo $config['IMAGE_UPLOAD_URL'] . '/angon_event_image/' . $image; ?>" alt="<?php echo $title; ?>">
                                                    </div>
                                                    <span class="date"><?php echo $venue; ?></span>
                                                    <p style="text-align: justify"><?php echo html_entity_decode($short_details); ?></p>
                                                    <a class="btn btn-default btn-sm" href="event-details.php?id=<?php echo $ME->angon_event_id; ?>">Read More</a>

                                                </li>
                                            </ul>
                                        </section>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php include './footer.php'; ?>
        </div>
        <?php include './footer_script.php'; ?>
    </body>
</html>