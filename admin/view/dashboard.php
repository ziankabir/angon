<?php
include '../../config/config.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <?php include basePath('admin/header_script.php'); ?>
    </head>
    <body class="skin-blue">
        <div class="wrapper">
            <?php include basePath('admin/header.php'); ?>
            <aside class="main-sidebar">
                <?php include basePath('admin/site_menu.php'); ?>
            </aside>
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>Dashboard</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i>&nbsp;Home</li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <section class="content">
                    <?php include basePath('admin/message.php'); ?>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="ion-ios-people-outline"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Projects</span>
                                    <span class="info-box-number">10</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </section>

            </div>
            <?php include basePath('admin/footer.php'); ?>
        </div>
        <script type="text/javascript">
            $("#dashActive").addClass("active");
            $("#dashActive").parent().parent().addClass("treeview active");
            $("#dashActive").parent().addClass("in");
        </script>

        <?php include basePath('admin/footer_script.php'); ?>
    </body>
</html>