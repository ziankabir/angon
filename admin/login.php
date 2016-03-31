<?php
include '../config/config.php';;
$email_address = "";
$password = "";
include basePath('admin/login_check.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $config['ADMIN_SITE_NAME']; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link  rel="stylesheet" type="text/css" href="<?php echo baseUrl('admin/assets/bootstrap/css/bootstrap.min.css') ?>"  />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo baseUrl('admin/assets/dist/css/AdminLTE.min.css') ?>"  />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a class="logo" href="#"><img style="width: 158px;margin-top: -3px;" src="../images/angon_logo_1.png"></a>
            </div>
            <div class="login-box-body">
                <?php include basePath('admin/message.php'); ?>
                <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="email_address" value="<?php echo $email_address; ?>" placeholder="Email Address" autofocus="autofocus"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div style="height: 20px;"></div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="submit" name="btnLogin" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script  type="text/javascript" src="<?php echo baseUrl('admin/assets/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
        <script  type="text/javascript" src="<?php echo baseUrl('admin/assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    </body>
</html>