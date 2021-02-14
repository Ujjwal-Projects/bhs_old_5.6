<?php
error_reporting(0);
session_start();
include('../includes/connection.php');
adminSecure();
//pre($_POST);
if($_POST['Save']){
	pre($_POST);
	if($_POST['description']!=""){
			list($fileName,$error)=$obj->uploadFile('attachment', GALARY, 'gif,jpg,jpeg,png');
			if($fileName) 
			{ 
				$_POST['attachment'] = $fileName;
			}
		
		$insert_id=$obj->insertData(TABLE_GALARY,$_POST);	
		$_SESSION['succ_msg'] = 'Photo Added Successfully.';
		unset($_POST);
		$obj->reDirect('gallery.php');
	}else{
		$_SESSION['fail_msg'] = 'Photo All data correctly.';
		unset($_POST);
		$obj->reDirect('gallery.php');		
	}
	
}
?>
<!DOCTYPE html>
<html>
<?php include('page_includes/head.php');?>
  
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
        GALLERY
        <small>BHS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> ADMIN</a></li>
        <li class="active">GALLERY</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	   <div class="row">
        <!-- left column -->
       <div class="col-md-6">
	   <?php if($_SESSION['succ_msg']){?>
				<div class="alert alert-success">
				<h4><?php echo $_SESSION['succ_msg']; unset($_SESSION['succ_msg']);?></h4>
				</div><?php }?>
				<?php if($_SESSION['fail_msg']){?>
				<div class="alert alert-danger">
				<h4><?php echo $_SESSION['fail_msg']; unset($_SESSION['fail_msg']);?></h4>
				</div><?php }?>
		  <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Gallery</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input name="title" type="text" class="form-control" placeholder="Type Title">				
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea name="description" class="form-control" placeholder="Type Description"></textarea>				
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Image</label>
                  <input name="attachment" type="file" class="form-control" accept="image/*" onChange="loadFile(event)">
				 <img src="" width="100" height="60" style="display:none;" id="output">
                </div>
			  </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="Save" value="save" class="btn btn-primary">Add</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
	   </div>
	   <div class="col-md-12 box">
	   <div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$i=1;
					$res = $obj->selectData(TABLE_GALARY,"","status<>'deleted'");
					while($data=mysql_fetch_assoc($res)){
					$status_change_to=$data['status']=='active'?'inactive':'ACTIVE';
								if($data['status']=="active")
									$activeimg='<span class="btn btn-sm btn-success">Active</span>';
								else
									$activeimg='<span class="btn btn-sm btn-danger">Inactive</span>';
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
				  <td><?php echo $data['title'];?></td>
                  <td><?php echo $data['description'];?></td>
                  <td><?php if($data['attachment']!=""){?><img  src="galary/<?php echo $data['attachment'];?>" width="200" height="150"><?php } ?></td>
                  <td><a href="status_change.php?id=<?php echo $data['id']?>&status=<?php echo $status_change_to?>&return_url=<?php echo base64_encode($_SERVER['REQUEST_URI'])?>&tbl=<?php echo TABLE_GALARY;?>&fld=id"><?php echo $activeimg;?></a></td>
                  
                </tr>
					<?php $i++; } ?>
                </tbody>
		</table>		
      </div>
      </div>
	   
	   </div>
	   
    </section>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include('page_includes/footer.php'); ?>

  
</div>
<?php include('page_includes/footer_script.php'); ?>

    
 <script>

  var loadFile = function(event) {

    var output = document.getElementById('output');

    output.src = URL.createObjectURL(event.target.files[0]);

	$('#output').show();

  };

</script>
</body>
</html>
