<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <?php include './header_script.php'; ?>
    </head>
    <body>
        <!--[if lt IE 7]>
                <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
          <![endif]-->
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
                                <li class="active">Contact</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Contact</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Header --> 
            <!-- Start Content -->
            <div class="main" role="main">
                <div id="content" class="content full">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <header class="single-post-header clearfix">
                                    <h2 class="post-title">Contact With Us</h2>
                                </header>
                                <div class="post-content">
                                    <div class="row">
                                        <p style="text-align:center"></p>
                                        <form method="POST" action="" accept-charset="UTF-8"><input name="_token" type="hidden" value="t3OkQub72RFZU5g89fC9OrRbVsM5zOy7pTRyIeku">
                                            <div class="col-md-12 margin-15">
                                                <div class="form-group">
                                                    <input placeholder="Name*" class="form-control input-lg" id="name" name="name" type="text" value="">
                                                </div>
                                                <div class="form-group">
                                                    <input placeholder="Email*" class="form-control input-lg" id="email" name="email" type="email" value="">
                                                </div>
                                                <div class="form-group">
                                                    <input placeholder="Phone*" class="form-control input-lg" id="phone" name="phone" type="text" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-12  margin-15">
                                                <div class="form-group">
                                                    <textarea placeholder="Message*" class="form-control input-lg" id="comments" name="comments" cols="6" rows="7"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <input id="submit" name="submit" type="submit" class="btn btn-primary btn-lg pull-right" value="Submit now!">
                                            </div>
                                        </form>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12">
                                            <div id="message"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 sidebar"> 
                                <!-- Recent Posts Widget -->
                                <div class="widget-recent-posts widget">

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
            </div>

            <?php include './footer.php'; ?>
        </div>
        <?php include './footer_script.php'; ?>
    </body>
</html>