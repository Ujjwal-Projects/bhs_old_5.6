<?php
error_reporting(0);
session_start();
include('../includes/connection.php');
adminSecure();
$mode='add';
if($_POST['Save']=='add'){	
	
	//pre($_FILES);die;
    $file_part=explode('/', $_FILES['attachment']['type']);
    if($file_part['1']=='pdf'){
    	    $image=$_FILES['attachment']['name']; 
		    $expimage=explode('.',$image);
		    $imageexptype=$expimage[1];
    	    $rand=rand(10000,99999);
    	    $rand_name=time();
		    $imagename=$rand_name.'.'.$imageexptype;
		    $imagepath="notice_img/".$imagename; 
		    
		    //$targetfolder = $imagepath . basename( $_FILES['attachment']['name']) ;
		    if(move_uploaded_file($_FILES['attachment']['tmp_name'], $imagepath))
             {
                 $data['attachment'] = $imagepath;
                 $data['type'] = 'PDF';
             }
            
    }else{
    	    list($fileName,$error)=$obj->uploadFile('attachment', NOTICE, 'gif,jpg,jpeg,png');
			if($fileName) 
			{ 
				$data['attachment'] = $fileName;
			}
			$data['type'] = 'JPG';
    }
			
		
    	$data['notice_for']=$_POST['notice_for'];
    	$data['notice_date']=$_POST['notice_date'];
    	$data['subject']=$_POST['subject'];
    	$data['content']=$_POST['content'];
    	$data['active']='active';
    	
    	//pre($data);die;
    		if($data['attachment']=='' && $data['content']==''){
                $_SESSION['fail_msg'] = 'Content Required.';
		        unset($_POST);
		        $obj->reDirect('notice.php');
    		}else{
    		    $insert_id=$obj->insertData(bhs_notice,$data);
    		}
	if($insert_id!=''){
	    
		$_SESSION['succ_msg'] = 'Notice Added Successfully.';
		unset($_POST);
		$obj->reDirect('notice.php');
	}else{
		$_SESSION['fail_msg'] = 'Submit All data correctly.';
		unset($_POST);
		$obj->reDirect('notice.php');		
	}
}elseif($_POST['Save']=='edit'){
	
	if($_FILES['attachment']['name']!=""){
		list($fileName,$error)=$obj->uploadFile('attachment', NOTICE, 'gif,jpg,jpeg,png');
			if($fileName) 
			{ 
				$_POST['attachment'] = $fileName;
			}
	}
	//pre($_POST);die;
	$obj->updateData(TABLE_NOTICE,$_POST,"id='".$_POST['id']."'");	
	$_SESSION['succ_msg'] = 'Notice updated Successfully.';
	unset($_POST);
	$obj->reDirect('notice.php');
	
}
if($_GET['id']!=""){
	$id=$_GET['id'];
	$mode=$_GET['mode'];
	$dataset=$obj->selectData(TABLE_NOTICE,"","id='".$id."'",1);
	//pre($data);die;
	if($mode=='deleted'){
		$data['status']='deleted';
		$obj->updateData(TABLE_NOTICE,$data,"id='".$id."'");
		$_SESSION['fail_msg'] = 'Notice deleted Successfully.';		
		unset($data);
		$obj->reDirect('notice.php');	
	}else{
		$dataset=$obj->selectData(TABLE_NOTICE,"","id='".$id."'",1);
	}
}

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
        NOTICE
        <small>BHS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> ADMIN</a></li>
        <li class="active">NOTICE</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
				<?php if($_SESSION['succ_msg']){?>
				<div class="alert alert-success">
				<h4><?php echo $_SESSION['succ_msg']; unset($_SESSION['succ_msg']);?></h4>
				</div><?php }?>
				<?php if($_SESSION['fail_msg']){?>
				<div class="alert alert-danger">
				<h4><?php echo $_SESSION['fail_msg']; unset($_SESSION['fail_msg']);?></h4>
				</div><?php }?>
        <div class="box-header with-border">
          <h3 class="box-title">ADD NOTICE</h3>

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
           
            <div class="col-md-6">
              <div class="form-group">
                <label>For</label>
                <select name="notice_for" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" required>					
                  <?php if($mode=="edit"){ ?><option value="<?php echo $dataset['notice_for'];?>"><?php echo $dataset['notice_for'];?></option><?php } ?>
                  <option value="Students">Students</option>
                  <option value="Teachers">Teachers</option>
                  <option value="Guardian">Guardian</option>
                  <option value="All">All</option>
                  
                </select>
              </div>
              
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="notice_date" type="date" class="form-control pull-right" value="<?php echo $dataset['notice_date'];?>" required>
                </div>
                <!-- /.input group -->
              </div>              
            </div>
            <!-- /.col --><!-- /.col -->
            <div class="col-md-12">
              
			<div class="form-group">
			    <label>Subject:</label>
                <input name="subject" class="form-control" placeholder="Subject:" value="<?php echo $dataset['subject'];?>" required>
              </div>		
            </div>
			<div class="col-md-12">
              
			<div class="form-group">
			    <label>Content:</label>
                <textarea id="editor1" class="form-control" name="content" rows="10" cols="80" Placeholder="Notice Content...." required>
                      <?php echo $dataset['content'];?>                      
                </textarea>
             </div>
			 <div class="form-group">
			    <label>Attachment</label>
                <input type="file" class="form-control" name="attachment"  onChange="loadFile(event)">
				 <?php if($mode=="edit" && $dataset['attachment']!=""){?><img src="notice_img/<?php echo $dataset['attachment'];?>" width="400" height="300"  id="output"><?php } ?>
                <img src="" width="400" height="300" style="display:none;" id="output">
             </div>		
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="">
			  <div class="pull-right">
                
                <button type="submit" name="Save" value="<?php echo $mode; ?>" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Save</button>
              </div>
              
        </div>
        </form>    
      </div>
	   <div class="box">
            <div class="box-header">
              <h3 class="box-title">View All Notice</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>				
                  <th>#</th>
                  <th>Date</th>
                  <th>For</th>
                  <th>Subject</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$i=1;
					$res = $obj->selectData(TABLE_NOTICE,"","status<>'deleted' order by id desc");	
					while($data=mysql_fetch_assoc($res)){
					$status_change_to=$data['status']=='active'?'inactive':'ACTIVE';
								if($data['status']=="active")
									$activeimg='<span class="btn btn-sm btn-success">Active</span>';
								else
									$activeimg='<span class="btn btn-sm btn-danger">Inactive</span>';
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $data['notice_date'];?></td>
                  <td><?php echo $data['notice_for'];?></td>
                  <td><?php echo $data['subject'];?></td>
                  <td><a href="status_change.php?id=<?php echo $data['id']?>&status=<?php echo $status_change_to?>&return_url=<?php echo base64_encode($_SERVER['REQUEST_URI'])?>&tbl=<?php echo TABLE_NOTICE;?>&fld=id"><?php echo $activeimg;?></a></td>
                  <td>
				  <a href="notice.php?id=<?php echo $data['id'];?>&mode=deleted" class="btn btn-danger"><i class="fa fa-trash"></i></a>
				  <a href="#" class="btn btn-success" data-toggle="modal" data-target="#view<?php echo $i;?> "><i class="fa fa-eye" aria-hidden="true"></i></a>
				  <a href="notice.php?id=<?php echo $data['id'];?>&mode=edit" class="btn btn-info"><i class="fa fa-edit"></i></a>
				  </td>
                </tr>
				<!-- Modal -->
<div class="modal fade" id="view<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle"><?php echo $data['subject'];?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<?php echo html_entity_decode($data['content']);?>                     
        <?php if($data['attachment']!=""){?><img  src="notice_img/<?php echo $data['attachment'];?>" width="100%" height="100%"><?php } ?>     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
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
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
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
