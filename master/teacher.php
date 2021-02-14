<?php
error_reporting(0);
session_start();
include('../includes/connection.php');
adminSecure();
$mode='add';
if($_POST['Save']=='add'){	

	$dataset=$obj->selectData(TABLE_USER,"count(*) counter","username='".$_POST['username']."'",1);
	if($dataset['counter']>0){
		$_SESSION['fail_msg'] = '**Username Already Exist';		
		unset($_POST);
		$obj->reDirect('teacher.php');	
		$err=1;
	}else{
		$err=0;
	}
	if($err==0){
	$_POST['password']=$obj->encryptPass($_POST['password']);
//	pre($_POST);die;
    $_POST['id']='0';
	$insert_id=$obj->insertData(TABLE_USER,$_POST);

	$_SESSION['succ_msg'] = 'Teacher Added Successfully.';
	unset($_POST);
	$obj->reDirect('teacher.php');
	}
}elseif($_POST['Save']=='edit'){
	pre($_POST);die;	
	
	$obj->updateData(TABLE_USER,$_POST,"id='".$_POST['id']."'");	
	$_SESSION['succ_msg'] = 'Teacher updated Successfully.';
	unset($_POST);
	$obj->reDirect('teacher.php');
	
}
if($_GET['id']!=""){
	$id=$_GET['id'];
	$mode=$_GET['mode'];
	$dataset=$obj->selectData(TABLE_USER,"","id='".$id."'",1);
	//pre($data);die;
	if($mode=='deleted'){
		$data['status']='deleted';
		$obj->updateData(TABLE_USER,$data,"id='".$id."'");
		$_SESSION['fail_msg'] = 'Teacher deleted Successfully.';		
		unset($data);
		$obj->reDirect('teacher.php');	
	}else{
		$dataset=$obj->selectData(TABLE_USER,"","id='".$id."'",1);
	}
}

?>
<!DOCTYPE html>
<html>
<?php include('page_includes/head.php');?>
<!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>  
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
        TEACHER
        <small>BHS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">TEACHER</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-default" >
				<?php 
				if($_SESSION['succ_msg']){							
					echo "<script>	Swal.fire(  'Good job!',  '".$_SESSION['succ_msg']."',  'success' )   </script>"; 				 
					}
				 unset($_SESSION['succ_msg']); 
				 ?>
				<?php if($_SESSION['fail_msg']){
					echo "<script>	Swal.fire(  'Sorry!',  '".$_SESSION['fail_msg']."',  'Error' )   </script>"; 				 
				}
				unset($_SESSION['fail_msg']);
				?>
        <div class="box-header with-border">
          <h3 class="box-title">ADD TEACHER</h3>

          <div class="box-tools pull-right">
            <!--button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button-->
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <form action="" method="post" enctype="multipart/form-data">
		    <div class="box-body" style="">
          <input type="hidden" name="id" value="<?php echo $id;?>">
		    <div class="row">
				<div class="text text-danger text-center col-md-12" id="err" style="display:none;"></div>
				<div class="text text-success text-center col-md-12" id="succ" style="display:none;"></div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Username</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input name="username" type="text" class="form-control pull-right" onKeyPress="return AvoidSpace(event)" onblur="check_teacher(this.value);" value="" required>
                </div>
				
              </div>
				
            </div>
			
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Name </label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input name="full_name" type="text" class="form-control pull-right" value="<?php echo $dataset['notice_date'];?>" required>
                </div>
                
              </div>              
            </div>
            <!-- /.col --><!-- /.col -->
            <div class="col-md-6">
				<div class="form-group">
                <label>Stream </label>

                <select name="stream" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" required>					
                  <?php if($mode=="edit"){ ?><option value="<?php echo $dataset['notice_for'];?>"><?php echo $dataset['notice_for'];?></option><?php } ?>
                  <option value="GEN">General</option>
                  <option value="VOC">Vocational</option>
                </select>
                
              </div>  	
            </div>
			<div class="col-md-6">
				<div class="form-group">
                <label>Name </label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-key"></i>
                  </div>
                  <input name="password" type="password" class="form-control pull-right" value="<?php echo $dataset['notice_date'];?>" required>
                </div>
                
              </div> 	
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="">
			  <div class="pull-right">
                
                <button type="submit" name="Save" id="submit" value="<?php echo $mode; ?>" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
              </div>
              
        </div>
        </form>    
      </div>
	   <div class="box">
            <div class="box-header">
              <h3 class="box-title">View All Teacher</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>				
                  <th>#</th>
                  <th>Stream</th>
                  <th>Name</th>
                  <th>username</th>
                  <th>password</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$i=1;
					$res = $obj->selectData(TABLE_USER,"","status<>'deleted'");	
					while($data=mysql_fetch_assoc($res)){
					$status_change_to=$data['status']=='ACTIVE'?'inactive':'ACTIVE';
								if($data['status']=="ACTIVE")
									$activeimg='<span class="btn btn-sm btn-success">Active</span>';
								else
									$activeimg='<span class="btn btn-sm btn-danger">Inactive</span>';
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $data['stream'];?></td>
                  <td><?php echo $data['full_name'];?></td>
                  <td><?php echo $data['username'];?></td>
                  <td><?php echo $obj->retrievePass($data['password']);?></td>
                  <td><a href="teacher.php?id=<?php echo $data['id']?>&status=<?php echo $status_change_to?>&return_url=<?php echo base64_encode($_SERVER['REQUEST_URI'])?>&tbl=<?php echo TABLE_NOTICE;?>&fld=id"><?php echo $activeimg;?></a></td>
                  <td>
				  <a href="teacher.php?id=<?php echo $data['id'];?>&mode=deleted" class="btn btn-danger"><i class="fa fa-trash"></i></a>
				  
				  <a href="teacher.php?id=<?php echo $data['id'];?>&mode=edit" class="btn btn-info"><i class="fa fa-edit"></i></a>
				  </td>
                </tr>
				
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
<script src="bower_components/ckeditor/ckeditor.js"></script>
    <!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
	function AvoidSpace(event)
	{
		var k = event ? event.which : window.event.keyCode;
		if (k == 32) return false;
		if (k == 08) return true;
		if ( ( k >= 48 && k <= 57 ) || ( k >= 97 && k <= 122 ) || ( k >= 65 && k <= 90 ))
		{
			return true;
		}
		else
		{
			return false
		}

	}
</script>
<script>

function check_teacher(value)
{	
	var username=value;
	if(username !="")
	{
		$.ajax({
			type: "GET",
			url: "ajax_reg_teacher.php",
			data: {username:username},
			success: function(msg){
				//alert(msg);
				if(msg==1)
				{
					$('#err').html('**Username Already Exist');					
					$('#err').show();
					$('#succ').hide();
					document.getElementById('submit').disabled = true;
					/*document.getElementById('submit').disabled = true;
					document.getElementById('email').disabled = true;
					document.getElementById('phone').disabled = true;
					document.getElementById('full_name').disabled = true;
					document.getElementById('country').disabled = true;
					document.getElementById('password').disabled = true;
					document.getElementById('repassword').disabled = true;
					document.getElementById('upassword').disabled = true;
					*/
					
					//return false;
				}
				else
				{
					
					$('#succ').html('Congratulation! Its Available');					
					$('#succ').show();
					$('#err').hide();
					document.getElementById('submit').disabled = false;
					/*$("#sponsor_id").prop('readonly', true);
					//document.getElementById('submit').disabled = false;
					document.getElementById('email').disabled = false;
					document.getElementById('phone').disabled = false;
					document.getElementById('full_name').disabled = false;
					document.getElementById('country').disabled = false;
					document.getElementById('password').disabled = false;
					document.getElementById('repassword').disabled = false;
					document.getElementById('upassword').disabled = false;*/
					//return false;
				}
			}
			
		});
	}
	else
	{
		$('#err').html('**Please Enter Valid UserId');		
		$('#err').show();			
		$('#succ').show();
		document.getElementById('submit').disabled = true;	
	}
}
</script>
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
