<?php

if (!session_id()) {
    session_start();
}
define('DEBUG', true);
if (DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 0);
}

/*
 * $config :  
 * All index name will be capitalized
 */
$config = array();
$success = '';
$error = '';
$warning = '';
$information = '';
if (isset($_GET['success']) AND $_GET['success'] != '') {
    $success = base64_decode(trim($_GET['success']));
}
if (isset($_GET['error']) AND $_GET['error'] != '') {
    $error = base64_decode(trim($_GET['error']));
}
if (isset($_GET['warning']) AND $_GET['warning'] != '') {
    $warning = base64_decode(trim($_GET['warning']));
}
if (isset($_GET['information']) AND $_GET['information'] != '') {
    $information = base64_decode(trim($_GET['information']));
}

$config['BASE_DIR'] = dirname(dirname(__FILE__));

/* local.config.php
 * local configuration here 
 * SET the database username and password 
 */
include ($config['BASE_DIR'] . '/config/local_config.php');

$con = mysqli_connect($config['DB_HOST'], $config['DB_USER'], $config['DB_PASSWORD'], $config['DB_NAME']);
@mysqli_query($con, 'SET CHARACTER SET utf8');
@mysqli_query($con, "SET SESSION collation_connection ='utf8_general_ci'");
if (!$con) {
    die('Databse Connect Error: ' . mysqli_connect_error());
}

/*
 * helper_functions.php
 * All helper function here 
 * You can call the functions from anywhere
 * Write the description before the function  
 */
include ($config['BASE_DIR'] . '/config/helper_functions.php');
/*
 * Image upload file
 */
include ($config['BASE_DIR'] . '/config/zebra_image.php');

?>