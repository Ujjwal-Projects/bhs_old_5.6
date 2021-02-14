<?php 
//$count_unread=$obj->selectData(TABLE_MESSAGE,"count(*) as counter","status='unread'",1);
//pre($count_unread);die;
?>
<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>BHS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Teacher-</b>Panel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!--
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"><?php echo $count_unread['counter'];?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $count_unread['counter'];?> messages</li>
              <li>
                
                <ul class="menu">
					<?php $res = $obj->selectData(TABLE_MESSAGE,"","status='unread'");
					while($data=mysql_fetch_assoc($res)){?>
				  <li>
                    <a href="message.php">
                      <div class="pull-left">
                        <img src="dist/img/message.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        <?php echo $data['contact_no'];?>
                        <small><i class="fa fa-clock-o"></i> <?php echo date('H:i', strtotime($data['message_time'])); ?></small>
                      </h4>
                      <p><?php echo $data['message_text'];?></p>
                    </a>
                  </li>
					<?php }?>
                  
                </ul>
              </li>
              <li class="footer"><a href="message.php">See All Messages</a></li>
            </ul>
          </li>
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../img/logo.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Teacher</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../img/logo.png" class="img-circle" alt="User Image">

                <p>
                  Welcome to BHS
                  
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <!--a href="#" class="btn btn-default btn-flat">Profile</a-->
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
