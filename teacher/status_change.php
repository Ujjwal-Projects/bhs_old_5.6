<?php
session_start();
include("../includes/connection.php");
adminSecure();
$return_url=base64_decode($_REQUEST['return_url']);
$tbl=$_GET['tbl'];
if($return_url)
{
	$redirect_url=$return_url;
}
$id=$_GET['id'];
$fld=$_GET['fld'];
$_POST["status"]=$_GET['status'];
$obj->updateData($tbl,$_POST," ".$fld."='".$id."'");
$_SESSION['succ_msg']=UPDATE_SUCCESSFULL;
$obj->reDirect($redirect_url);
?>
