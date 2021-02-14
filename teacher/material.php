<?php
error_reporting(0);
session_start();
include('../includes/connection.php');
memberSecure();
$member_data=GetMemberData();
//pre($member_data);die;
$mode='add';
if($_POST['Save']=='add'){	
		
	//$teacher=$obj->selectData(TABLE_USER,"","id='".$_POST['teacher_id']."'",1);
	$_POST['id']='0';
	$_POST['teacher_id']=$member_data['id'];
	$_POST['notice_for']=$member_data['stream'];
	$_POST['post_date']=date('Y-m-d');
	$_POST['teacher_name']=$member_data['full_name'];
	
	
	
	if(($_POST['r1']=="content")&&($_POST['content']!="")){
		$_POST['type']='JPG';
			
		
		$insert_id=$obj->insertData(TABLE_MATERIAL,$_POST);	
		$_SESSION['succ_msg'] = 'Study Material Added Successfully.';
		unset($_POST);
		$obj->reDirect('material.php');
	}elseif(($_POST['r1']=="file")&&(isset($_FILES))){
			$image=$_FILES['attachment']['name']; 
		    $expimage=explode('.',$image);
		    $imageexptype=$expimage[1];
    	    $rand=rand(10000,99999);
    	    $rand_name=time();
		    $imagename=$rand_name.'.'.$imageexptype;
		    $imagepath="../master/material/".$imagename; 
		    
		    //$targetfolder = $imagepath . basename( $_FILES['attachment']['name']) ;
		    if(move_uploaded_file($_FILES['attachment']['tmp_name'], $imagepath))
             {
				 $_POST['attachment'] = $imagepath;
                 $_POST['type'] = 'PDF';
             }
			 $_POST['content'] = '';
			// pre($_FILES);
			//pre($_POST);die;
			$insert_id=$obj->insertData(TABLE_MATERIAL,$_POST);	
			$_SESSION['succ_msg'] = 'Study Material Added Successfully.';
			unset($_POST);
			$obj->reDirect('material.php');
			
	}elseif(($_POST['r1']=="link")&&($_POST['link']!="")){
		$_POST['type']='LINK';	
		$_POST['content']='';	
		$_POST['attachment']=$_POST['link'];	
			
		$insert_id=$obj->insertData(TABLE_MATERIAL,$_POST);	
		$_SESSION['succ_msg'] = 'Study Material Added Successfully.';
		unset($_POST);
		$obj->reDirect('material.php');
		
	}else{
		
		$_SESSION['fail_msg'] = 'Submit All data correctly.';
		unset($_POST);
		$obj->reDirect('material.php');		
	}	
}elseif($_POST['Save']=='edit'){
	pre($_POST);die;
	if($_FILES['attachment']['name']!=""){
		list($fileName,$error)=$obj->uploadFile('attachment', NOTICE, 'gif,jpg,jpeg,png');
			if($fileName) 
			{ 
				$_POST['attachment'] = $fileName;
			}
	}
	//pre($_POST);die;
	$obj->updateData(TABLE_NOTICE,$_POST,"id='".$_POST['id']."'");	
	$_SESSION['succ_msg'] = 'Study Material updated Successfully.';
	unset($_POST);
	$obj->reDirect('notice.php');
	
}
if($_GET['id']!=""){
	//echo 'ok';die;
	$id=$_GET['id'];
	$mode=$_GET['mode'];
	$dataset=$obj->selectData(TABLE_MATERIAL,"","id='".$id."'",1);
	//pre($data);die;
	if($mode=='deleted'){
		$data['status']='deleted';
		$obj->updateData(TABLE_MATERIAL,$data,"id='".$id."'");
		$_SESSION['fail_msg'] = 'Study Material deleted Successfully.';		
		unset($data);
		$obj->reDirect('material.php');	
	}else{
		$dataset=$obj->selectData(TABLE_MATERIAL,"","id='".$id."'",1);
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
        Study Material
        <small>BHS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Study Material</li>
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
          <h3 class="box-title">ADD Study Material</h3>

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
           <!--
            <div class="col-md-6">
              <div class="form-group">
                <label>Teacher</label>
                <select name="teacher_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" required>					
                  <?php 
				  $teacher_data=$obj->selectData(TABLE_USER,"","status='ACTIVE' ");
				  
				  while($teacher_row=mysql_fetch_assoc($teacher_data)){
				  ?>
                  <option value="<?php echo $teacher_row['id']; ?>"><?php echo $teacher_row['full_name']; ?></option>
                  
                  <?php } ?>
                </select>
              </div>
              
            </div>
             /.col -->
			
            <div class="col-md-2">
              <div class="form-group">
                <label>Class:</label>
				
                <select name="class" class="form-control" required>				
					<option value="" selected disabled>Class</option>   
					<?php if($member_data['stream']!='VOC'){ ?>					
					<option value="V">V</option>   
					<option value="VI">VI</option>    
					<option value="VII">VII</option>    
					<option value="VIII">VIII</option>    
					<option value="IX">IX</option>    
					<option value="X">X</option>    
					<?php } ?>
					<option value="XI">XI</option>    
					<option value="XII">XII</option>    
				</select>
                <!-- /.input group -->
              </div>              
            </div>
			<?php if($member_data['stream']!='VOC'){ ?>
            <div class="col-md-2">
              <div class="form-group">
                <label>Subject:</label>

                <select name="subject" class="form-control" required>
					<option value="" selected disabled>Subject</option>   
					<option value="BENG">BENG</option>   
					<option value="ENGB">ENGB</option>    
					<option value="MATH">MATH</option>    
					<option value="P.Sci.">P.Sci.</option>    
					<option value="L.Sci.">L.Sci.</option>    
					<option value="HIST">HIST</option>    
					<option value="GEO">GEO</option>    
					<option value="COM">COM</option>    
					<option value="SCI">SCI</option>    
					<option value="ARTS">ARTS</option>    
					
				</select>
                <!-- /.input group -->
              </div>              
            </div>
			<?php } ?>
            <div class="col-md-8">
				<div class="form-group">
					<label>Title:</label>
					<input name="title" class="form-control" placeholder="Subject:" value="<?php echo $dataset['subject'];?>" required>
				</div>		
            </div>
			<div class="col-md-4">
				<div class="form-group">					
					<label class="btn btn-info">
					  <input type="radio" name="r1" value="content" class="minimal" id="C_Content" checked>
					  Content
					</label>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">					
					<label class="btn btn-info">
					  <input type="radio" name="r1" value="file" class="minimal" id="C_file">
					  File
					</label>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">					
					<label class="btn btn-info">
					  <input type="radio" name="r1" value="link" class="minimal" id="C_link">
					  Link
					</label>
				</div>
			</div>
			<div class="col-md-12" id="content">              
				<div class="form-group">
					<label>Content:</label>
					<textarea id="editor1" class="form-control" name="content" rows="10" cols="80" Placeholder="Notice Content...." required>
						  <?php echo $dataset['content'];?>                      
					</textarea>
				</div>
						
            </div>
			<div class="col-md-12" id="file" style="display:none;"> 
				<div class="form-group">
					<label>File</label>
					<input type="file" class="form-control" name="attachment" onChange="loadFile(event)">
					 <?php if($mode=="edit" && $dataset['attachment']!=""){?><img src="notice_img/<?php echo $dataset['attachment'];?>" width="400" height="300"  id="output"><?php } ?>
					<!--<img src="" width="400" height="300" style="display:none;" id="output">-->
				</div>
			</div>
			<div class="col-md-12" id="link" style="display:none;"> 
				<div class="form-group">
					<label>Link</label>
					<input type="text" name="link" class="form-control">
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
              <h3 class="box-title">View All Study Material</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>				
                  <th>#</th>
                  <th>Date</th>
                  <th>Class</th>
                  <!--<th>SEC</th>
                  <th>Teacher</th>-->
                  <th>Title</th>
                  <th>View</th>
                  <!--<th>Status</th>-->
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$i=1;
					$res = $obj->selectData(TABLE_MATERIAL,"","status<>'deleted' and teacher_id='".$member_data['id']."' order by id desc");	
					while($data=mysql_fetch_assoc($res)){
					/*$status_change_to=$data['status']=='active'?'inactive':'ACTIVE';
								if($data['status']=="active")
									$activeimg='<span class="btn btn-sm btn-success">Active</span>';
								else
									$activeimg='<span class="btn btn-sm btn-danger">Inactive</span>';*/
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $data['post_date'];?></td>
                  <td><?php echo $data['class'];?></td>
                 <!-- <td><?php echo $data['notice_for'];?></td>
                  <td><?php echo $data['teacher_name'];?></td>-->
                  <td><?php echo $data['title'];?></td>
                  <td>
					<?php if($data['type']=='JPG'){?>
						<a href="#" class="btn btn-success" data-toggle="modal" data-target="#view<?php echo $i;?> "><i class="fa fa-eye" aria-hidden="true"></i></a>
					<?php }else if($data['type']=='PDF'){?>
						<a class="btn btn-warning" target="_blank" href="../master/<?php echo $data['attachment'];?>" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
					<?php }else if($data['type']=='LINK'){?>
						<a class="btn btn-info" target="_blank" href="<?php echo $data['attachment'];?>" ><i class="fa fa-external-link" aria-hidden="true"></i></a>
					<?php } ?>
				  </td>
                 <!-- <td>
				  <?php if($data['status']=='active'){ ?>
				  <a href="#" class="btn btn-success">ACTIVE</a>				  
                  <?php }else{ ?>
				  <a href="#" class="btn btn-danger"><?php echo $data['status']; ?></a>				  
				  <?php } ?>
				  </td>-->
				  <td>
				  <a href="material.php?id=<?php echo $data['id'];?>&mode=deleted" class="btn btn-danger"><i class="fa fa-trash"></i></a>
				  
				  <!--<a href="material.php?id=<?php echo $data['id'];?>&mode=edit" class="btn btn-info"><i class="fa fa-edit"></i></a>-->
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
	$('#C_Content').on('click',function(){	   
	   if(this.checked){		
		$('#content').show();
		$('#file').hide();
		$('#link').hide();
	   }
	});
	$('#C_file').on('click',function(){	   
	   if(this.checked){		
		$('#content').hide();
		$('#file').show();
		$('#link').hide();
	   }
	});
	$('#C_link').on('click',function(){	   
	   if(this.checked){		
		$('#content').hide();
		$('#file').hide();
		$('#link').show();
	   }
	});
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
