<?php
include '../config/config.php';
session_destroy();
header("Location:login.php");
?>