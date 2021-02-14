<?php 
session_start();
include("../includes/connection.php");
adminSecure();
session_start();
session_destroy();
$obj->reDirect('index.php');
?>