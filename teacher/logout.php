<?php 
session_start();
include("../includes/connection.php");
memberSecure();
session_start();
session_destroy();
$obj->reDirect('index.php');
?>