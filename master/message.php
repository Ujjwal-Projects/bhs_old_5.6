<?php
error_reporting(0);
session_start();
include('../includes/connection.php');
adminSecure();

?>
<!DOCTYPE html>
<html>
<?php include('page_includes/head.php');?>
<!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">    
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
        Message
        <small>BHS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> ADMIN</a></li>
        <li class="active">NOTICE</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Unread Message</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped  table-hover ">
                <thead class="thead-dark">
                <tr>
                 <th>Date/Time</th>
                  <th>Student</th>
                  <th>Class</th>
                  <th>Section</th>
                  <th>Roll</th>
                  <th>Contact</th>
                  <th >Message</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$i=1;
					$res = $obj->selectData(TABLE_MESSAGE,"","status='unread' order by id desc");
					while($data=mysql_fetch_assoc($res)){
					$status_change_to=$data['status']=='unread'?'read':'unread';
								if($data['status']=="unread")
									$activeimg='<span class="btn btn-sm btn-success">READ</span>';
								else
									$activeimg='<span class="btn btn-sm btn-danger">UN-READ</span>';
                ?>
                <tr>
                 <td><?php echo $data['message_time'];?></td>
                  <td><?php echo $data['student_name'];?></td>
                  <td><?php echo $data['class'];?></td>
                  <td><?php echo $data['section'];?></td>
                  <td><?php echo $data['roll_no'];?></td>
                  <td><?php echo $data['contact_no'];?></td>
                  <td><?php echo $data['message_text'];?></td>
                  <td><a href="status_change.php?id=<?php echo $data['id']?>&status=<?php echo $status_change_to?>&return_url=<?php echo base64_encode($_SERVER['REQUEST_URI'])?>&tbl=<?php echo TABLE_MESSAGE;?>&fld=id"><?php echo $activeimg;?></a></td>
                  
                </tr>
				<!-- Modal -->

					<?php $i++; } ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		  <div class="box">
            <div class="box-header">
              <h3 class="box-title">Read Message</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                <tr>
                  <th>Date/Time</th>
                  <th>Student</th>
                  <th>Class</th>
                  <th>Section</th>
                  <th>Roll</th>
                  <th>Contact</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$i=1;
					$res = $obj->selectData(TABLE_MESSAGE,"","status='read' order by id desc");
					while($data=mysql_fetch_assoc($res)){
					$status_change_to=$data['status']=='read'?'deleted':'read';
								if($data['status']=="read")
									$activeimg='<span class="btn btn-sm btn-danger">Delete</span>';
								else
									$activeimg='<span class="btn btn-sm btn-success">Read</span>';
                ?>
                <tr>
                  <td><?php echo $data['message_time'];?></td>
                  <td><?php echo $data['student_name'];?></td>
                  <td><?php echo $data['class'];?></td>
                  <td><?php echo $data['section'];?></td>
                  <td><?php echo $data['roll_no'];?></td>
                  <td><?php echo $data['contact_no'];?></td>
                  <td><?php echo $data['message_text'];?></td>
                  <td><a href="status_change.php?id=<?php echo $data['id']?>&status=<?php echo $status_change_to?>&return_url=<?php echo base64_encode($_SERVER['REQUEST_URI'])?>&tbl=<?php echo TABLE_MESSAGE;?>&fld=id"><?php echo $activeimg;?></a></td>
                  
                </tr>
				<!-- Modal -->

					<?php $i++; } ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include('page_includes/footer.php'); ?>

  
</div>
<?php include('page_includes/footer_script.php'); ?>

    <!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
 <script>

  var loadFile = function(event) {

    var output = document.getElementById('output');

    output.src = URL.createObjectURL(event.target.files[0]);

	$('#output').show();

  };

</script>
</body>
</html>
