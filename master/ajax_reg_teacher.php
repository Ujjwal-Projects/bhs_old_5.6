<?php
include("../includes/connection.php");
$username=trim($_GET['username']," ");

$dataset=$obj->selectData(TABLE_USER,"count(*) counter","username='".$username."'",1);
//pre($dataset);
if($dataset['counter']>0)
echo 1;
else
echo 2;
?>