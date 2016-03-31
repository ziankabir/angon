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
                                <li class="active">Donate</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Donate</h1>
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
                                    <h2 class="post-title">Choose Your Donation Plan</h2>
                                </header>
                                <div class="post-content">
                                    <p style="text-align:center"></p>
                                    <div class="accordion" id="accordionArea">
                                        <div class="accordion-group panel">
                                            <div class="accordion-heading accordionize">
                                                <a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordionArea" href="#oneArea" style="font-size:20px"> 
                                                    One Time Donation
                                                    <i class="fa fa-angle-down"></i>
                                                </a> </div>
                                            <div id="oneArea" class="accordion-body in collapse">
                                                <div class="accordion-inner"> 
                                                    <form method="POST" action="" accept-charset="UTF-8"><input name="_token" type="hidden" value="t3OkQub72RFZU5g89fC9OrRbVsM5zOy7pTRyIeku">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-6">
                                                                    <label>Your name *</label>
                                                                    <input placeholder="" class="form-control input-lg" id="name" name="name" type="text" value="">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Your email *</label>
                                                                    <input placeholder="" class="form-control input-lg" id="email" name="email" type="email" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-6">
                                                                    <label>Your phone *</label>
                                                                    <input placeholder="" class="form-control input-lg" id="phone" name="phone" type="text" value="">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Your address *</label>
                                                                    <input placeholder="" class="form-control input-lg" id="address" name="address" type="text" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-6">
                                                                    <label>Amount *</label>
                                                                    <input placeholder="" class="form-control input-lg" id="amount" name="amount" type="text" value="">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Choose How You Pay*</label> <br \>
                                                                    <select name="paymethod"><option value="bank">Transfer To Bank Account</option><option value="bkash">Via BKASH</option><option value="hand">Hand to Hand</option></select>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="submit" value="Submit" class="btn btn-primary" data-loading-text="Loading...">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-group panel">
                                            <div class="accordion-heading accordionize"> 
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionArea" href="#twoArea" style="font-size:20px">
                                                    Monthly Donation
                                                    <i class="fa fa-angle-down"></i>
                                                </a> </div>
                                            <div id="twoArea" class="accordion-body collapse">
                                                <div class="accordion-inner"> 
                                                    <form method="POST" action="" accept-charset="UTF-8"><input name="_token" type="hidden" value="t3OkQub72RFZU5g89fC9OrRbVsM5zOy7pTRyIeku">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-6">
                                                                    <label>Your name *</label>
                                                                    <input placeholder="" class="form-control input-lg" id="name" name="name" type="text" value="">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Your email *</label>
                                                                    <input placeholder="" class="form-control input-lg" id="email" name="email" type="email" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-6">
                                                                    <label>Your phone *</label>
                                                                    <input placeholder="" class="form-control input-lg" id="phone" name="phone" type="text" value="">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Your address *</label>
                                                                    <input placeholder="" class="form-control input-lg" id="address" name="address" type="text" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-6">
                                                                    <label>Amount *</label>
                                                                    <input placeholder="" class="form-control input-lg" id="amount" name="amount" type="text" value="">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Choose How You Pay*</label> <br \>
                                                                    <select name="paymethod"><option value="bank">Transfer To Bank Account</option><option value="bkash">Via BKASH</option><option value="hand">Hand to Hand</option></select>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="submit" value="Submit" class="btn btn-primary" data-loading-text="Loading...">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-group panel">
                                            <div class="accordion-heading accordionize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionArea" href="#threeArea" style="font-size:20px"> Sponsor For Old People <i class="fa fa-angle-down"></i> </a> </div>
                                            <div id="threeArea" class="accordion-body collapse">
                                                <div class="accordion-inner"> 
                                                    <form method="POST" action="" accept-charset="UTF-8"><input name="_token" type="hidden" value="">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-6">
                                                                    <label>Your name *</label>
                                                                    <input placeholder="" class="form-control input-lg" id="name" name="name" type="text" value="">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Your email *</label>
                                                                    <input placeholder="" class="form-control input-lg" id="email" name="email" type="email" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-6">
                                                                    <label>Your phone *</label>
                                                                    <input placeholder="" class="form-control input-lg" id="phone" name="phone" type="text" value="">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Your address *</label>
                                                                    <input placeholder="" class="form-control input-lg" id="address" name="address" type="text" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-6">
                                                                    <label>How many Child *</label>
                                                                    <input placeholder="" class="form-control input-lg" id="amount" name="amount" type="text" value="">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Choose How You Pay*</label> <br \>
                                                                    <select name="paymethod"><option value="bank">Transfer To Bank Account</option><option value="bkash">Via BKASH</option><option value="hand">Hand to Hand</option></select>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="submit" value="Submit" class="btn btn-primary" data-loading-text="Loading...">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 sidebar">
                                <div class="widget-upcoming-events widget">
                                    <div class="sidebar-widget-title">
                                        <h3>Upcoming Events</h3>
                                    </div>
                                    <ul>
                                        <li class="item event-item clearfix">
                                            <div class="event-date"> <span class="date">1</span> 
                                                <span class="month">Dec</span>
                                            </div>
                                            <div class="event-detail">
                                                <h4><a href="">Social Reform and Future Security Model</a></h4>
                                                <span class="event-dayntime meta-data">2015 | Tues | 12:00</span> </div>
                                        </li>
                                        <li class="item event-item clearfix">
                                            <div class="event-date"> <span class="date">2</span> 
                                                <span class="month">Jan</span>
                                            </div>
                                            <div class="event-detail">
                                                <h4><a href="">Opening Seminar For Angon Old Home</a></h4>
                                                <span class="event-dayntime meta-data">2016 | Wednes | 12:00</span> </div>
                                        </li>
                                        <li class="item event-item clearfix">
                                            <div class="event-date"> <span class="date">3</span> 
                                                <span class="month">Feb</span> 
                                            </div>
                                            <div class="event-detail">
                                                <h4><a href="">Opening Angon-2 At Gazipur</a></h4>
                                                <span class="event-dayntime meta-data">2016 | Thurs | 12:00</span> </div>
                                        </li>
                                    </ul>
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
    <!-- Mirrored from www.obhizatrik.foundation/donate by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Mar 2016 17:02:09 GMT -->
</html>