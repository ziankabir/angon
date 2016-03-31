<?php
include './config/config.php';
$arraySlider = array();
$sqlSlider = "SELECT * FROM banner WHERE banner_status = 'Active' ORDER BY banner_id DESC";
$resultSlider = mysqli_query($con, $sqlSlider);
if ($resultSlider){
    while ($objSlider = mysqli_fetch_object($resultSlider)) {
        $arraySlider[] = $objSlider;
    }
} else {
    
}
//debug($arraySlider);
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
                            <div class="col-md-4 col-sm-6"> 
                                <div class="listing sermons-listing">
                                    <header class="listing-header">
                                        <h3>Recent Event</h3>
                                    </header>
                                    <section class="listing-cont">
                                        <ul>
                                            <li class="item sermon featured-sermon"> <span class="date">2 January 2016</span>

                                                <h4>Angon Swapnolok peace valley </h4>
                                                <div class="featured-sermon-video">
                                                    <img src="images/valleyjpg.jpg">
                                                </div>
                                                <span class="date">Dhaka, Bangladesh</span>
                                                <p style="text-align: justify">Angon OLd Home has materialised its dream by completing formalities for purchasing land. Twenty individual, Institution or corporate bodies will be the owner of Twenty cottages at village Baniara under Singair upazila first of its kind in Bangladesh.</p>

                                            </li>
                                        </ul>
                                    </section>
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
    <!-- Mirrored from www.obhizatrik.foundation/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Mar 2016 17:01:29 GMT -->
</html>