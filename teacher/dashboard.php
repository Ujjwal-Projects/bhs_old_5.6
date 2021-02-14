<?php
error_reporting(0);
session_start();
include('../includes/connection.php');
memberSecure();
?>
<!DOCTYPE html>
<html>
<?php include('page_includes/head.php');?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include('page_includes/header.php');?>
 <!-- Left side column. contains the logo and sidebar -->
  <?php include('page_includes/sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include('page_includes/footer.php'); ?>

  
</div>
<?php include('page_includes/footer_script.php'); ?>
<?php 
if($_SESSION['user_msg']!=''){ 
echo "<script>	Swal.fire(  'Thank you.',  '".$_SESSION['user_msg']."',  'success' )   </script>";
unset($_SESSION['user_msg']);
}  
?>
</body>
</html>
