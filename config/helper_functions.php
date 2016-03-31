<?php

/**
 * redirect by Javascript to given link
 *
 * @return string
 */
function redirect($link = NULL) {

    if ($link) {
        echo "<script language=Javascript>document.location.href='$link';</script>";
    } else {
        /* echo '$link does not specified'; */
    }
}

/**
 * Give your file name as suffix it will return full base path
 * @return string 
 */
function basePath($suffix = '') {
    global $config;
    $suffix = ltrim($suffix, '/');
    return $config['BASE_DIR'] . '/' . trim($suffix);
}

/**
 * Give your file name as suffix it will return full base url
 * @return string 
 */
function baseUrl($suffix = '') {
    global $config;
    $suffix = ltrim($suffix, '/');
    return $config['BASE_URL'] . trim($suffix);
}

/**
 * Check the mail is valid or not
 * 
 * @return string
 */
function isValidEmail($email = '') {
    return preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email);
}

/**
 * @return string
 */
function securedPass($pass = '') {

    global $config;
    $saltKeyWord = $config['PASSWORD_KEY']; /* If u want to change $saltKeyWord value first of all make the admin table empty */

    if ($pass != '') {
        $pass = md5($pass);
        /* created md5 hash */
        $length = strlen($pass);
        /* calculating the lengh of the value */
        $password_code = $saltKeyWord;
        if ($password_code != '') {
            $security_code = trim($password_code);
        } else {
            $security_code = '';
        }
        /* checking set $password_code or not */
        $start = floor($length / 2);
        /* dividing the lenght */
        $search = substr($pass, 1, $start);
        /* $search = which part will replace */
        $secur_password = str_replace($search, $search . $security_code, $pass);

        /* $search.$security_code replacing a part this password_code */
        return $secur_password;
    } else {
        return '';
    }
}

/**
 * Auto creates a 6 char string [a-z A-Z 0-9]
 *
 * @return string
 */
function passwordGenerator() {
    $buchstaben = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
    $pw_gen = '';

    for ($i = 1; $i <= 6; $i++) {
        mt_srand((double) microtime() * 1000000);
        $tmp = mt_rand(0, count($buchstaben) - 1);
        $pw_gen.=$buchstaben[$tmp];
    }

    return $pw_gen;
}

/*
 * setSession function set value with custom unique session key
 *  $indexName:   $_SESSION['session_name']
 *  $value:   $_SESSION['session_name'] = $value
 * @return NULL
 */

function setSession($indexName = '', $value = '') {
    global $config;
    $indexName = trim($indexName);
    $value = trim($value);
    $_SESSION[md5($config['PASSWORD_KEY']) . '_' . $indexName] = $value;
}

/*
 * unsetSession function unset value with custom unique session key
 *  $indexName:   $_SESSION['session_name']
 * @return NULL
 */

function unsetSession($indexName = '') {
    global $config;
    $indexName = trim($indexName);
    if (isset($_SESSION[md5($config['PASSWORD_KEY']) . '_' . $indexName])) {
        unset($_SESSION[md5($config['PASSWORD_KEY']) . '_' . $indexName]);
    }
}

/*
 * getSession function set value with custom unique session key
 *  $indexName:   $_SESSION['session_name']
 *  @return String or boolean
 * 
 */

function getSession($indexName = '') {
    global $config;
    $indexName = trim($indexName);

    if (isset($_SESSION[md5($config['PASSWORD_KEY']) . '_' . $indexName])) {
        return $_SESSION[md5($config['PASSWORD_KEY']) . '_' . $indexName];
    } else {
        return FALSE;
    }
}

/**
 * show an array with pre tag<br/>
 * Default die false 
 * @return string  
 */
function debug($object) {
    echo "<pre>";
    print_r($object);
    echo "</pre>";
}

/*
 * This function will generate random number 
 * @return string or number
 */

function randCode($length) {
    $random = "";
    $data = "102030405060708090";
    $data .= "090807060504030201";
    $data .= "123456789";
    $data .= "987654321";

    for ($i = 0; $i < $length; $i++) {
        $random .= substr($data, (rand() % (strlen($data))), 1);
    }
    return $random;
}

/**
 * Check Image Uploaded File
 */
function checkFiles($files) {
    $path = '';
    if (isset($_POST['path'])) {
        $path = $_POST['path'];
    }
    move_uploaded_file($files["file"]["tmp_name"], $path . $_FILES["file"]["name"]);
}

function getCurrentDirectory() {
    $path = dirname($_SERVER['PHP_SELF']);
    $position = strrpos($path, '/') + 1;
    return substr($path, $position);
}

/**
 * This removes special characters from a string<br> 
 * @return string 
 */
function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-_]/', '', $string); // Removes special chars.
}

/**
 * This function removes a word from last in a string<br> 
 * @return string 
 */
function removeWord($string) {
    $string = explode(" ", $string);
    array_splice($string, -2);
    return implode(" ", $string);
}

/**
 * This removes special characters from a string<br> 
 * @return string 
 */
function validateInput($value = '') {
    $output = '';
    global $con;
    if ($value != "") {
        $output = trim($value);
        $output = strip_tags($output);
        if (is_int($output)) {
            $output = intval($output);
        } elseif (is_float($output)) {
            $output = floatval($output);
        } elseif (is_string($output)) {
            $output = mysqli_real_escape_string($con, $output);
        }
    }
    return $output;
}

/*
 * This function will remove the word
 * from last
 */

function shorten_string($string, $wordsreturned) {
    $retval = $string;
    $array = explode(" ", $string);
    if (count($array) <= $wordsreturned) {
        $retval = $string;
    } else {
        array_splice($array, $wordsreturned);
        $retval = implode(" ", $array) . " ...";
    }
    return $retval;
}