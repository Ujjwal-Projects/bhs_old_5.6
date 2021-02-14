<?php
error_reporting(0);
session_start();
include('includes/connection.php');
if($_POST){
    //pre($_POST);die;
	$insert_id=$obj->insertData(TABLE_MESSAGE,$_POST);	
		$_SESSION['succ_msg'] = 'Message Send Successfully.';
		unset($_POST);
		$obj->reDirect('index.php');
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
    	<!-- meta character set -->
        <meta charset="utf-8">
		<!-- Always force latest IE rendering engine or request Chrome Frame -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Behala High School</title>		
		<!-- Meta Description -->
        <meta name="description" content="Behala High School">
		<link rel="shortcut icon" href="img/favicon.png" />
        <meta name="keywords" content="Behala High School, General, Vocational Stream, Bengali Medium, English Medium, Co-education, school">
        <meta name="author" content="Ujjwal Maji">
		
		<!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- CSS
		================================================== -->
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
		<!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/jquery.fancybox.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/owl.carousel.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/slit-slider.css">
		<!-- bootstrap.min -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- Main Stylesheet -->
        <link rel="stylesheet" href="css/main.css">

		<!-- Modernizer Script for old Browsers -->
        <script src="js/modernizr-2.6.2.min.js"></script>

    </head>
	
    <body id="body">

		<!-- preloader -->
		<div id="preloader">
            <div class="loder-box">
            	<!--<div class="battery"></div>-->
            	<img src="img/loading.gif" height="100px" width="100px">
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
        <!--
        Fixed Navigation
        ==================================== -->
        <header id="navigation" class="navbar-inverse navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
                    </button>
					<!-- /responsive nav button -->
					<img src="img/logo.png" class="logo-img" alt="logo">
					<!-- logo -->
					<h1 class="navbar-brand">
                        
						<!--a href="#body">Behala High School</a-->
					</h1>
					<!-- /logo -->
                </div>

				<!-- main nav -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <ul id="nav" class="nav navbar-nav">
                        <li><a href="#body">Home</a></li>
                        <li><a href="#service">Facilities</a></li>
                        <li><a href="#portfolio">Activities</a></li>
                        <li><a href="#performance">Performance</a></li>
                        <li><a href="#testimonials">Administration</a></li>
                        <li><a href="#notice">Notice</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#study_materials" class="btn btn-info">Study Materials</a></li>
                        
                    </ul>
                </nav>
				<!-- /main nav -->
				
            </div>
        </header>
        <!--
        End Fixed Navigation
        ==================================== -->
		
		<main class="site-content" role="main">
		
        <!--
        Home Slider
        ==================================== -->
		
		<section id="home-slider">
            <div id="slider" class="sl-slider-wrapper">

				<div class="sl-slider">
				
					<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">

						<div class="bg-img bg-img-1"></div>

						<div class="slide-caption">
                            <div class="caption-content">
                                <h2 class="animated fadeInDown slider-font">Behala High School</h2>
                                <h3 class="animated fadeInDown slider-font">(Govt-Sponsored)</h3>
                                <h4 class="animated fadeInDown slider-font">(Co-Educational)</h4>
                                <h5 class="animated fadeInDown slider-font">(General & Vocationl Stream)</h5>
                                <a href="#contact" class="btn btn-blue btn-effect">Contact Us</a>
                            </div>
                        </div>
						
					</div>
					
					<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
					
						<div class="bg-img bg-img-2"></div>

						<div class="slide-caption">
                            <div class="caption-content">
                                <h2 class="animated fadeInDown slider-font">Behala High School</h2>
                                <h3 class="animated fadeInDown slider-font">(Govt-Sponsored)</h3>
                                <h4 class="animated fadeInDown slider-font">(Co-Educational)</h4>
                                <h5 class="animated fadeInDown slider-font">(General & Vocationl Stream)</h5>
                                <a href="#contact" class="btn btn-blue btn-effect">Contact Us</a>
                            </div>
                        </div>
						
					</div>
					
					<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
						
						<div class="bg-img bg-img-3"></div>

						<div class="slide-caption">
                            <div class="caption-content">
                               <h2 class="animated fadeInDown slider-font">Behala High School</h2>
                                <h3 class="animated fadeInDown slider-font">(Govt-Sponsored)</h3>
                                <h4 class="animated fadeInDown slider-font">(Co-Educational)</h4>
                                <h5 class="animated fadeInDown slider-font">(General & Vocationl Stream)</h5>
                                <a href="#contact" class="btn btn-blue btn-effect">Contact Us</a>
                            </div>
                        </div>
					</div>

				</div><!-- /sl-slider -->

                <!-- 
                <nav id="nav-arrows" class="nav-arrows">
                    <span class="nav-arrow-prev">Previous</span>
                    <span class="nav-arrow-next">Next</span>
                </nav>
                -->
                
                <nav id="nav-arrows" class="nav-arrows hidden-xs hidden-sm visible-md visible-lg">
                    <a href="javascript:;" class="sl-prev">
                        <i class="fa fa-angle-left fa-3x"></i>
                    </a>
                    <a href="javascript:;" class="sl-next">
                        <i class="fa fa-angle-right fa-3x"></i>
                    </a>
                </nav>
                

				<nav id="nav-dots" class="nav-dots visible-xs visible-sm hidden-md hidden-lg">
					<span class="nav-dot-current"></span>
					<span></span>
					<span></span>
				</nav>

			</div><!-- /slider-wrapper -->
		</section>
		
        <!--
        End Home SliderEnd
        ==================================== -->
			
			<!-- about section -->
			<section id="about" >
				<div class="container">
					<div class="row">
						<div class="col-md-7 wow animated fadeInRight">
							<div class="welcome-block">
								<h3>Welcome To Behala High School</h3>								
						     	 <div class="message-body">
									<img src="img/logo.png" class="pull-left" alt="member">
						       		<p>
										Present educationists are of opinions that to create a strong society, we need to enhance the quality of education. Students must have transparent knowledge of Science, Environment, Modern Technologies and must have an all-round development to face the criteria of survival in this modern ever-changing society.
									</p>
									<p>The chief goal of Behala High School is to impart modern education to all local students of every caste, creed and social status. Teaching is considered to be a noble profession in India from ages. The process of developing and nurturing good citizens is an ongoing process. We are privileged to be one such educational institution vibrating with inherent team efforts of teachers, students and non-teaching staff.</p>
									<p>Behala High School, established on 27th June, 1886 in the courtyard of London Missionary School, has become a brand in itself. From that era of national movement till the present day of political cross-current, the institute stood high upholding its age old values and ethics. Herein lies the difference between a so called sophisticated business oriented Institution and the BEHALA HIGH SCHOOL. From time immemorial various glorious personalities have adorned the posts of the President and the Secretary. Personalities who have dedicated their lives to teaching have glorified the education system of this institution.</p>
						     	 </div>
						       	<!--a href="#" class="btn btn-border btn-effect pull-right">Read More</a-->
						    </div>
						</div>

						<div class="col-md-4 col-md-offset-1 wow animated fadeInLeft">
							<div class="recent-works">
								<h3>At a Glance</h3>
								
								
								<div id="works">
									<div class="work-item">
										<ol>
										<li> A three storey building with 56 rooms.</li>
										<li> An auditorium with 700 seating capacity.</li>
										<li> A hall 'Rabindra Niketan' with 250 seating capacity.</li>
										<li> An air-conditioned computer lab with qualified computer professionals.</li>
										<li> A library with almost 2500 books.</li>
										<li> An air-conditioned conference room with overhead projector facility to facilitate audio-vidual teaching-learning process.</li>
										<li> Provision for co-educational General Stream(Arts, Science, Commerce) and Vocational Stream(Business & Commerce).</li>
										<li> Highly equipped science laboratories.</li>
										<li> Nurturing the spirit of sports and games and other cultural openings.</li>
										<li> Opportunity to join Govt. and Non-Govt. level seminars and workshops.</li>
										</ol>
									</div>
									<div class="work-item">	
										<ol start="11">
										<li> Provision for Business & Commerce and Home Science discipline at X+2 level Vocational Stream to face the employment challenges og globalization.</li>
										<li> Availability of short course vocational training like Toy Making, Wooden Furniture Making, Electrical House Wiring and Motor Winding.</li>
										<li> 24 hours CCTV surveillance for security purpose.</li>
										
										</ol>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- end about section -->
			
			
			
				<!-- Price section -->
			<style>
			    .card {
                  /* Add shadows to create the "card" effect */
                  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                  transition: 0.3s;
                }
                
                /* On mouse-over, add a deeper shadow */
                .card:hover {
                  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
                }
                .vscroll{
                    overflow-x: hidden;
                    overflow-y: scroll;
                    max-height: 400px;
                }
			</style>	
        		<section id="study_materials">
                        <div class="container">
                            <div class="row">
                            
                                <div class="sec-title text-center">
                                    <h2 class="wow animated bounceInLeft">Study Material for Students</h2>
                                    <p class="wow animated bounceInRight text-center" >Be with us</p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.9s">
                                    <a href="gen_smart_class.php" >
                                        <div class="service-item">
                                            <div class="service-icon">
                                                <i class="fa fa-tasks fa-3x"></i>
                                            </div>
                                            
                                            <h3>General Stream</h3>
                                            <!--p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p-->                         
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.9s">
                                    <a href="voc_smart_class.php" >
                                        <div class="service-item">
                                            <div class="service-icon">
                                                <i class="fa fa-tasks fa-3x"></i>
                                            </div>
                                            
                                            <h3>Vocational Stream</h3>
                                            <!--p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p-->                         
                                        </div>
                                    </a>
                                </div>
                               
                            
                                
                                
                            </div>
                        </div>
                    </section>
			<section id="notice">
				<div >
    				<div class="container">
    					<div class="row">
    					<br>
    						<div class="sec-title text-center ">
    							<h3><b>NOTICE BOARD</b></h3>
    							<h5 class="text-center">(Date : <?php echo date('d-m-Y');?>)</h5>
    						</div>
    						<div class="vscroll">
                                    <table id="example1" class="table table-bordered table-striped card">
                    <thead>
                    <tr>
                      <th>Date</th>
                      <th>For</th>
                      <th>Subject</th>
                      
                      <th>VIEW</th>
                    </tr>
                    </thead>
                    <tbody>
    				<?php
    					$i=1;
    					$res = $obj->selectData(TABLE_NOTICE,"","status='active' order by id desc");
    					while($data=mysql_fetch_assoc($res)){
    					
                    ?>
                    <tr >
                      <td width="20%"><?php echo $data['notice_date'];?></td>
                      <td width="20%"><?php echo $data['notice_for'];?></td>
                      <td><?php echo $data['subject'];?></td>
                      <?php if($data['type']=='PDF'){ ?>
                      <td width="10%" ><a class="btn btn-danger" target="_blank" href="master/<?php echo $data['attachment'];?>" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
                      <?php }else{ ?>
                      <td width="10%" data-toggle="modal" data-target="#view<?php echo $i;?>" ><div class="btn btn-danger" ><i class="fa fa-eye" aria-hidden="true"></i></div></td>
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
                            <?php if($data['attachment']!=""){?>
                                <?php if($data['type']=='JPG'){ ?>
                                <img  src="master/notice_img/<?php echo $data['attachment'];?>" width="100%" height="100%">
                                
                                <?php } ?>     
                            <?php } ?>     
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
			<!-- end Price section -->
			<!-- Service section -->
			<section id="service">
				<div class="container">
					<div class="row">
					
						<div class="sec-title text-center">
							<h2 class="wow animated bounceInLeft">Scope available for Students</h2>
							<p class="wow animated bounceInRight text-center" >Be with us</p>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.9s">
							<a href="#SEMS" data-toggle="tab">
    							<div class="service-item">
    								<div class="service-icon">
    									<i class="fa fa-heart fa-3x"></i>
    								</div>
    								
    								<h3>Separate English Medium Section</h3>
    								<!--p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p-->							
    							</div>
							</a>
						</div>
						
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn">
							<a href="#CES" data-toggle="tab">
							<div class="service-item">
								<div class="service-icon">
									<i class="fa fa-home fa-3x"></i>
								</div>
								<h3>Co-Education</h3>
								<!--p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p-->
							</div>
						</div>
					
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.3s">
							<a href="#GVS" data-toggle="tab">
							<div class="service-item">
								<div class="service-icon">
									<i class="fa fa-tasks fa-3x"></i>
								</div>
								<h3>General & Vocational Stream</h3>
								<!--p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p-->
							</div>
							</a>
						</div>
					
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.6s">
							<a href="#SFC" data-toggle="tab">
							<div class="service-item">
								<div class="service-icon">
									<i class="fa fa-clock-o fa-3x"></i>
								</div>
								<h3>Smart Class</h3>
								<!--p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p-->
							</div>
							</a>
						</div>
					
						
						
					</div>
				</div>
			</section>
			<!-- end Service section -->
			<section>
				<div class="container card">
					<div class="tab-content">
						<div id="SEMS" class="tab-pane fade in active">
						  <h3>SEPARATE ENGLISH MEDIUM SECTION</h3>
						  <p>The present Kolkata is changing in a super-fast speed which requires students to be flexible. The vanishing values, the diminishing morality, the increasing mentality of ‘Survival of the fittest’ have taken an epidemic shape. With the celebration of 127th year, the school had taken a vow to impart global education without eroding the socio-cultural values and morality. For the same the school has started a separate branch of English Medium Higher Secondary section (Science & Commerce). Besides that a vocational stream of education has been introduced which will render hand-on trainings to the students and will prepare them for the current job market.We have experienced teaching staff with English medium background, who are equally efficient in imparting lessons in Bengali and English as well. We are running our H.S. English-medium section smoothly to open parallel English medium sections in the lower classes also. We are already running class IX & X in English Medium for last three years. In this way, our esteemed institution is in the process of a unique identity .</p>
						</div>
						<div id="CES" class="tab-pane fade">
						  <h3>Co-Education</h3>
						  <p></p>
						</div>
						<div id="GVS" class="tab-pane fade">
						  <h3>General & Vocational Stream</h3>
						  <p></p>
						</div>
						<div id="SFC" class="tab-pane fade">
						  <h3>Smart Class</h3>
						  <p></p>
						</div>
					</div>
				</div>
			</section>
			<!-- performance section -->
			<section id="performance">
				<div class="container">
					<div class="row">
					
						<div class="sec-title text-center">
							<h2>Academic Performance</h2>							
						</div>
						

						<ul class="project-wrapper wow animated fadeInUp">
							
							<?php					
							$res = $obj->selectData(bhs_performance,"","status='active'");
							while($data=mysql_fetch_assoc($res)){ ?>
									
							<li class="portfolio-item">
								<!--img src="img/portfolio/item.jpg" class="img-responsive" height="100%" alt="">-->
								<?php if($data['attachment']!=""){?><img  class="img-fluid" src="master/performance/<?php echo $data['attachment'];?>" class="img-responsive" height="300" width="400" alt=""><?php } ?>
								<figcaption class="mask">
									<h3><?php echo $data['title'];?></h3>
									<p><?php echo $data['description'];?></p>
								</figcaption>
								<ul class="external">
									<li><a class="fancybox" title="<?php echo $data['title'];?>" data-fancybox-group="works" href="master/performance/<?php echo $data['attachment'];?>"><i class="fa fa-search"></i></a></li>
									<!--li><a href=""><i class="fa fa-link"></i></a></li-->
								</ul>
							</li>
							<?php } ?>
							
							
						</ul>
						
					</div>
				</div>
			</section>
			<!-- end performance section -->
			<!-- portfolio section -->
			<section id="portfolio">
				<div class="container">
					<div class="row">
					
						<div class="sec-title text-center">
							<h2>Gallery</h2>
							<p class="text-center">Our Activities</p>
						</div>
						

						<ul class="project-wrapper wow animated fadeInUp">
							
							<?php					
							$res = $obj->selectData(TABLE_GALARY,"","status='active'");
							while($data=mysql_fetch_assoc($res)){ ?>
									
							<li class="portfolio-item">
								<!--img src="img/portfolio/item.jpg" class="img-responsive" height="100%" alt="">-->
								<?php if($data['attachment']!=""){?><img  class="img-fluid" src="master/galary/<?php echo $data['attachment'];?>" class="img-responsive" height="300" width="400" alt=""><?php } ?>
								<figcaption class="mask">
									<h3><?php echo $data['title'];?></h3>
									<p><?php echo $data['description'];?></p>
								</figcaption>
								<ul class="external">
									<li><a class="fancybox" title="<?php echo $data['title'];?>" data-fancybox-group="works" href="master/galary/<?php echo $data['attachment'];?>"><i class="fa fa-search"></i></a></li>
									<!--li><a href=""><i class="fa fa-link"></i></a></li-->
								</ul>
							</li>
							<?php } ?>
							
							
						</ul>
						
					</div>
				</div>
			</section>
			<!-- end portfolio section -->
			
			<!-- Testimonial section -->
			<section id="testimonials" class="parallax">
				<div class="overlay">
					<div class="container">
						<div class="row">
						
							<div class="sec-title text-center white wow animated fadeInDown">
								<h2>What people say</h2>
							</div>
							
							<div id="testimonial" class="wow animated fadeInUp">
								<div class="testimonial-item text-center">
									<img src="img/hm.jpg" alt="">
									<div class="clearfix">
										<span>Dr. Debasish Bera (Headmaster & Secretary)</span>
										
										<p>It makes me think, when a society is becoming complex day by day, where employability is becoming tough, when challenges are rising by leaps and bounds then what is the right thing an         educational institution can deliver for the community?</p>
										<p> After a long study of success and failure in connection with the employability of students, we have got the pulse of what today’s parents expect from us. It is another arena of learning in a smarter mould. After a lot of infrastructural change, we have now opened a parallel English medium sections in Science and Commerce stream for those who need a sharpened device to fight in their future battles. We are also running parallel co-educational english medium sections in secondary classes. We are planning to introduce this Co-educational and English-based teaching learning system in upper primary level in near future.</p>
										<p>This is the cry of the society and we are ready with the right answers at the right time.</p>
									</div>
									
									<i><div>"If I had 9 hours to chop down a tree, <br>I’d spend the first 6 sharpening my axe."</div>
									<div>Abraham Lincoln</div></i>
								</div>
								<div class="testimonial-item text-center">
									<img src="img/sec.jpg" alt="">
									<div class="clearfix">
										<span>Smt. Sanchita Mitra(President)</span>
										<p> I take pride in associating with an age-old institution like Behala High School. It is going to be my   second consecutive term as a member of the Managing Committee of this institution.</p>
										<p>We have already introduced audio-visual teaching and learning process, we have installed air-conditioners in computer laboratory and conference room to enhance comfort level of our students. But the real success stories lie in our academics. And it is not generated from us, it comes out from our beloved students, from inspiring and motivating classroom activities by teachers, from close monitoring of our learned Headmaster Dr. Debasish Bera. What we did is nothing but to support our students as well as teachers in every spheres allowing complete liberty to them.</p>
										<p>Again we are stretching out our hands for any advice, suggestions from any corner of the society. We are ready to listen to our valued guardians’ opinions to solve any kind of problem. It is our dream to restructure our existing auditorium and renovate it adding latest modern facilities.</p>
										<p>Looking forward to constructive co-operation from all quarters involved with the well-being of our institution.</p>
									</div>
									<i><div>"Life laughs at you when you are unhappy. <br>Life smiles at you when you are happy.<br> But life salutes you when you make others happy. 
                                                                            "</div>
								    <div>Charlie Chaplin</div></i>	
								</div>
								
								
							</div>
						
						</div>
					</div>
				</div>
			</section>
			<!-- end Testimonial section -->
			
		
			<!-- scope section -->
			<!--<section class="parallax">
				<div class="overlay">
					<div class="container">
						<div class="row">
						    
						    <div id="SEMS" class="card col-md-12">
						        <div class="card-body col-md-12">
        							<div class="card-title text-center white wow animated fadeInDown">
        								<h2>SEPARATE ENGLISH MEDIUM SECTION</h2>
        							</div>
        							<div class="card-text wow animated fadeInUp">
        								<div class="text-center">
        										<p> The present Kolkata is changing in a super-fast speed which requires students to be flexible. The vanishing values, the diminishing morality, the increasing mentality of ‘Survival of the fittest’ have taken an epidemic shape. With the celebration of 127th year, the school had taken a vow to impart global education without eroding the socio-cultural values and morality. For the same the school has started a separate branch of English Medium Higher Secondary section (Science & Commerce). Besides that a vocational stream of education has been introduced which will render hand-on trainings to the students and will prepare them for the current job market.We have experienced teaching staff with English medium background, who are equally efficient in imparting lessons in Bengali and English as well. We are running our H.S. English-medium section smoothly to open parallel English medium sections in the lower classes also. We are already running class IX & X in English Medium for last three years. In this way, our esteemed institution is in the process of a unique identity .</p>
        								    <br>
        								</div>
        							</div>
    							</div>
							</div>
							<div id="SFC" class="card col-md-12">
						        <div class="card-body col-md-12">
        							<div class="card-title text-center white wow animated fadeInDown">
        								<h2>SMART CLASS</h2>
        							</div>
        							<div class="card-text wow animated fadeInUp">
        								<div class="text-center">
        										<p></p>
        								    <br>
        								</div>
        							</div>
    							</div>
							</div>
							<div id="GVS" class="card col-md-12">
						        <div class="card-body col-md-12">
        							<div class="card-title text-center white wow animated fadeInDown">
        								<h2>GENERAL & VOCATIONAL STREAM</h2>
        							</div>
        							<div class="card-text wow animated fadeInUp">
        								<div class="text-center">
        										<p></p>
        								    <br>
        								</div>
        							</div>
    							</div>
							</div>
							<div id="CES" class="card col-md-12">
						        <div class="card-body col-md-12">
        							<div class="card-title text-center white wow animated fadeInDown">
        								<h2>CO-EDUCATION</h2>
        							</div>
        							<div class="card-text wow animated fadeInUp">
        								<div class="text-center">
        										<p></p>
        								    <br>
        								</div>
        							</div>
    							</div>
							</div>
						</div>
					</div>
				</div>
			</section>-->
			<!-- end scope section -->
			
			<!-- Social section ->
			<section id="social" class="parallax">
				<div class="overlay">
					<div class="container">
						<div class="row">
						
							<div class="sec-title text-center white wow animated fadeInDown">
								<h2>FOLLOW US</h2>
								<p class="text-center">no other official page</p>
							</div>
							
							<ul class="social-button">
								<li class="wow animated zoomIn"><a href="#"><i class="fa fa-thumbs-up fa-2x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="0.3s"><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="0.6s"><a href="#"><i class="fa fa-dribbble fa-2x"></i></a></li>							
							</ul>
							
						</div>
					</div>
				</div>
			</section>
			<!-- end Social section -->
			
			<!-- Contact section -->
			<section id="contact" >
				<div class="container">
					<div class="row">
						
						<div class="sec-title text-center wow animated fadeInDown">
							<h2>Contact</h2>
							<p>Guardian's Review</p>
						</div>
						
						
						<div class="col-md-7 contact-form wow animated fadeInLeft">
						<?php if($_SESSION['succ_msg']){?>    
						<div class="alert alert-success"><?php echo $_SESSION['succ_msg']; unset($_SESSION['succ_msg']);?></div>
						<?php } ?>
							<form action="#" method="post">
								<div class="input-field">
									<input type="text" name="student_name" class="form-control" placeholder="Student's Name..." required>
								</div>
								<div class="input-field col-md-4">
									<select name="class" class="form-control" required>
									    <option value="" selected disabled>Class</option>   
									    <option value="V">V</option>   
									    <option value="VI">VI</option>    
									    <option value="VII">VII</option>    
									    <option value="VIII">VIII</option>    
									    <option value="IX">IX</option>    
									    <option value="X">X</option>    
									    <option value="XI">XI</option>    
									    <option value="XII">XII</option>    
									</select>
									
								</div>
								<div class="input-field col-md-4">
									<select name="section" class="form-control" required>
									    <option value="" selected disabled>Section</option>
										<option value="A">A</option>   
									    <option value="B">B</option>    
									    <option value="C">C</option>    									    
									    <option value="E">E</option>    									    
									    <option value="A/E">A/E</option>    									    
									    <option value="B/E">B/E</option>    									    
									</select>									
								</div>
								<div class="input-field col-md-4">
									<input type="number" name="roll_no" class="form-control" placeholder="Roll No..." required>
								</div>
								<div class="input-field">
									<input type="number" name="contact_no" class="form-control" placeholder="Contact No..." required>
								</div>
								<div class="input-field">
									<textarea name="message_text" class="form-control" placeholder="Messages..." required></textarea>
								</div>
						       	<button type="submit" id="submit" class="btn btn-blue btn-effect">Send</button>
							</form>
						</div>
						
						<div class="col-md-5 wow animated fadeInRight">
							<address class="contact-details">
								<h3>Contact Us</h3>						
								<p><i class="fa fa-pencil"></i>6, Banamali Naskar Road, Kolkata - 700060</p><br>
								<p><i class="fa fa-phone"></i>Phone: (033) 2396-5466 / 8926315284 </p>
								<p><i class="fa fa-phone"></i>Office Mob No.: 7003628746 (10:30 a.m. to 4:30 p.m.) </p>
								<p><i class="fa fa-envelope"></i>bhs125.2010@gmail.com</p>
							</address>
						</div>
			
					</div>
				</div>
			</section>
			<!-- end Contact section -->
			
			<section id="google-map">
				<!--div id="map-canvas" class="wow animated fadeInUp"></div-->
                <!--<iframe class="wow animated fadeInUp" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3685.9775800844845!2d88.3157061144328!3d22.505024341120368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a027a0f561942b9%3A0x9a75ded70e1c40dd!2sBehala%20High%20School!5e0!3m2!1sen!2sin!4v1570352658018!5m2!1sen!2sin" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>-->
			</section>
		
		</main>
		
		<footer id="footer">
			<div class="container">
				<div class="row text-center">
					<div class="footer-content">
						<!--<div class="wow animated fadeInDown">
							<p>newsletter signup</p>
							<p>Get Cool Stuff! We hate spam!</p>
						</div>
						<form action="#" method="post" class="subscribe-form wow animated fadeInUp">
							<div class="input-field">
								<input type="email" class="subscribe form-control" placeholder="Enter Your Email...">
								<button type="submit" class="submit-icon">
									<i class="fa fa-paper-plane fa-lg"></i>
								</button>
							</div>
						</form>
						<div class="footer-social">
							<ul>
								<li class="wow animated zoomIn"><a href="#"><i class="fa fa-thumbs-up fa-3x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="0.3s"><a href="#"><i class="fa fa-twitter fa-3x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="0.6s"><a href="#"><i class="fa fa-skype fa-3x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="0.9s"><a href="#"><i class="fa fa-dribbble fa-3x"></i></a></li>
								<li class="wow animated zoomIn" data-wow-delay="1.2s"><a href="#"><i class="fa fa-youtube fa-3x"></i></a></li>
							</ul>
						</div>
						-->
						<p>Copyright &copy; 2019 Design and Developed By <a href="#"> Ujjwal Maji</a> </p>
					</div>
				</div>
			</div>
		</footer>
		
		<!-- Essential jQuery Plugins
		================================================== -->
		<!-- Main jQuery -->
        <script src="js/jquery-1.11.1.min.js"></script>
		<!-- Twitter Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
		<!-- Single Page Nav -->
        <script src="js/jquery.singlePageNav.min.js"></script>
		<!-- jquery.fancybox.pack -->
        <script src="js/jquery.fancybox.pack.js"></script>
		<!-- Google Map API -->
		<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<!-- Owl Carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- jquery easing -->
        <script src="js/jquery.easing.min.js"></script>
        <!-- Fullscreen slider -->
        <script src="js/jquery.slitslider.js"></script>
        <script src="js/jquery.ba-cond.min.js"></script>
		<!-- onscroll animation -->
        <script src="js/wow.min.js"></script>
		<!-- Custom Functions -->
        <script src="js/main.js"></script>
    </body>
</html>