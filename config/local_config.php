<?php

/* change when upload to different domain 
 * setting site hosting  data 
 */

$host = $_SERVER['HTTP_HOST'];

$domain = str_replace('www.', '', str_replace('http://', '', $host));

if ($domain == 'angon.com') {
    $config['SITE_NAME'] = 'angon';
    $config['BASE_URL'] = 'http://angon.com';
    $config['ROOT_DIR'] = '/home/angon/public_html/';
    $config['ADMIN_SITE_NAME'] = 'KKRDF | ADMIN PANEL';
    $config['DB_TYPE'] = 'mysql';
    $config['DB_HOST'] = 'localhost';
    $config['DB_NAME'] = 'db_name';
    $config['DB_USER'] = 'db_user';
    $config['DB_PASSWORD'] = 'db_pass';
} elseif ($domain == 'arkhairul.com') {
    $config['SITE_NAME'] = 'angon';
    $config['ADMIN_SITE_NAME'] = 'ANGON | ADMIN PANEL';
    $config['BASE_URL'] = 'http://arkhairul.com/angon/';
    $config['ROOT_DIR'] = '/home/arkhairul/public_html/angon/';
    $config['DB_TYPE'] = 'mysql';
    $config['DB_HOST'] = 'localhost';
    $config['DB_NAME'] = 'arkhairu_angon';
    $config['DB_USER'] = 'arkhairu_angon';
    $config['DB_PASSWORD'] = '@@123@@angon';
} elseif ($domain == '192.168.0.103') {
    $config['SITE_NAME'] = 'angon';
    $config['ADMIN_SITE_NAME'] = 'ANGON | ADMIN PANEL';
    $config['BASE_URL'] = 'http://192.168.0.103/angon/';
    $config['ROOT_DIR'] = '/demo/';
    $config['DB_TYPE'] = 'mysql';
    $config['DB_HOST'] = 'localhost';
    $config['DB_NAME'] = 'demo_db';
    $config['DB_USER'] = 'root';
    $config['DB_PASSWORD'] = '';
} else {
    $config['SITE_NAME'] = 'angon';
    $config['ADMIN_SITE_NAME'] = 'ANGON | ADMIN PANEL';
    $config['BASE_URL'] = 'http://localhost/angon/';
    $config['ROOT_DIR'] = '/angon/';
    $config['DB_TYPE'] = 'mysql';
    $config['DB_HOST'] = 'localhost';
    $config['DB_NAME'] = 'angon_db';
    $config['DB_USER'] = 'root';
    $config['DB_PASSWORD'] = '';
}

date_default_timezone_set('Asia/Dhaka');
$config['MASTER_ADMIN_EMAIL'] = "khairul@eyhost.biz"; /* Developer */
$config['PASSWORD_KEY'] = "#kkrdf#"; /* If u want to change PASSWORD_KEY value first of all make the admin table empty */
$config['ADMIN_PASSWORD_LENGTH_MAX'] = 15; /* Max password length for admin user  */
$config['ADMIN_PASSWORD_LENGTH_MIN'] = 5; /* Min password length for admin user  */
$config['ADMIN_COOKIE_EXPIRE_DURATION'] = (60 * 60 * 24 * 30); /* Min password length for admin user  */


$config['IMAGE_UPLOAD_PATH'] = $config['BASE_DIR'] . '/upload'; /* Upload files go here */
$config['IMAGE_UPLOAD_URL'] = $config['BASE_URL'] . 'upload'; /* Upload link with this */


   