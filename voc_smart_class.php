<?php
error_reporting(0);
session_start();
include('includes/connection.php');

?>
<style>
.body_block{
	min-height:800px;
}
.card-img-top{
	max-height:200px;
	min-height:100px;
	margin-top: 50px;
	
}
</style>
<!DOCTYPE html>

 <html lang="en" class="no-js"> 
    <head>
    	<?php include('head.php'); ?>

    </head>
	
    <body id="body">

		<!-- preloader -->
		<div id="preloader">
            <div class="loder-box">
            	<div class="battery"></div>
            </div>
		</div>
		<!-- end preloader -->
        <?php if($_SESSION['succ_msg']!="") {?> 
		<script>
		Swal.fire({
			  title: 'Message Send Successfully.',
			  animation: false,
			  customClass: {
				popup: 'animated tada'
			  }
			})
		</script>
		<?php } unset($_SESSION['succ_msg']);?>
       
		<?php //include('menu.php'); ?>
		<?php //include('slider.php'); ?>
		
		
		<section id="notice">
				<div >
    				<div class="container">
    					<div class="row">
    					<br>
    						<div class="sec-title text-center ">
    							<h3><b>Study Materials</b></h3>
    							<h5 class="text-center">(Date : <?php echo date('d-m-Y');?>)</h5>
    							<a href="index.php" class="btn btn-info">Home</a>
    						</div>

    						<div class="vscroll">
                                    <table id="example1" class="table table-bordered table-striped card">
                    <thead>
                    <tr>
                      <th>Date</th>
                      <th>Teacher Name</th>
                      <th>Subject</th>
                      <th>VIEW</th>
                    </tr>
                    </thead>
                    <tbody>
    				<?php
    					$i=1;
    					$res = $obj->selectData(TABLE_MATERIAL,"","status='active' and notice_for='VOC' order by id desc");
    					while($data=mysql_fetch_assoc($res)){
    					
                    ?>
                    <tr >
                      <td width="20%"><?php echo $data['post_date'];?></td>
                      <td width="20%"><?php if($data['teacher_name']!=""){ echo $data['teacher_name']; }else{ echo 'Headmaster'; }?></td>
                      <td><?php echo $data['title'];?></td>
                      <?php if($data['type']=='PDF'){ ?>
						<td width="10%" ><a class="btn btn-info" target="_blank" href="master/<?php echo $data['attachment'];?>" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
                      <?php }else if($data['type']=='LINK'){ ?>
						<td width="10%" ><a class="btn btn-info" target="_blank" href="<?php echo $data['attachment'];?>" ><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
					  <?php }else{?>
                      <td width="10%" data-toggle="modal" data-target="#view<?php echo $i;?>" ><div class="btn btn-info" ><i class="fa fa-eye" aria-hidden="true"></i></div></td>
                      <?php } ?>
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
						           <?php if($data['attachment']!=""){?><img  src="master/notice_img/<?php echo $data['attachment'];?>" width="100%" height="100%"><?php } ?>     
						          </div>
						          <div class="modal-footer">
						            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						            
						          </div>
						        </div>
						      </div>
						    </div>
    					<?php  $i++; } ?>
                    </tbody>
                    
                  </table>
                            </div>
                        </div>
                    </div>
                </div>
		
					
				
			</section>
		<?php include('footer.php'); ?>
    </body>
</html>