<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>99School | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By Amresh">
    <meta name="keywords" content="School, online School, School Fee, Teacher Payroll, Student Reports">
    <!-- bootstrap 3.0.2 -->
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="<?php echo base_url();?>assets/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?php echo base_url();?>assets/admin/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?php echo base_url();?>assets/admin/css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?php echo base_url();?>assets/admin/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="<?php echo base_url();?>assets/admin/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <link href="<?php echo base_url();?>assets/admin/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="<?php echo base_url();?>assets/admin/css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="<?php echo base_url();?>assets/admin/css/style.css" rel="stylesheet" type="text/css" />
	<link href='https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
	
	<script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->
		  
	 <script src="<?php echo base_url();?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
    </head>
    <body class="skin-black">		
        <!-- header logo: style can be found in header.less -->
        <header class="header">			
			<a href="<?php echo base_url();?>" class="logo" target="_blank">99Schools</a>			
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">				
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
				<a style="margin-top:15px;margin-left:30px;"> <?php echo $this->session->userdata('school_name'); ?> </a>
                <div class="navbar-right">
					
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
						<!--	
						<li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">3</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 3 messages</li>
                                <li>                                    
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php //echo base_url();?>assets/admin/img/26115.jpg" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Support Team
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                                <small class="pull-right"><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php //echo base_url();?>assets/admin/img/26115.jpg" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Director Design Team
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                                <small class="pull-right"><i class="fa fa-clock-o"></i> 2 hours</small>
                                            </a>
                                        </li>                                                                                
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>   -->                     
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span>
									<?php 
										if($this->session->userdata('s_email'))
											echo $this->session->userdata('s_email');
									?>
									<i class="caret">
								</i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>
                                <li class="divider"></li>
                                <li>
									<a href="<?php echo base_url();?>ado/Teacher">
										<i class="fa fa-user fa-fw pull-right"></i>Profile
									</a>										
									<a href="<?php echo base_url();?>ado/Teacher/changePassword">
										<i class="fa fa-cog fa-fw pull-right"></i>Change Password
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo base_url()?>ado/Teacher/logout"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
								</li>
                            </ul>
                        </li>
                    </ul>
						
                        </div>
                    </nav>
                </header>
                <div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="left-side sidebar-offcanvas">
                        <!-- sidebar: style can be found in sidebar.less -->
                    <section class="sidebar">
                        <!-- Sidebar user panel -->
						<div class="user-panel">
							<div class="pull-left image">
								<img src="<?php echo base_url();?>assets/admin/img/26115.jpg" class="img-circle" alt="User Image" />
							</div>
							<div class="pull-left info">
								<p><?php 
									if($this->session->userdata('tch_id'))
										echo $this->session->userdata('first_name');
									else
										echo "Hello";
								?></p>

							   <!--  <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
							</div>
						</div>
						<!-- sidebar menu: : style can be found in sidebar.less -->
						<ul class="sidebar-menu">
							<li>
								<a href="<?php echo base_url();?>ado/School">
									<i class="fa fa-gavel"></i><span>Dashboard</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>ado/Leave">
									<i class="fa fa-gavel"></i><span>Leave Management</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>ado/Timetable">
									<i class="fa fa-gavel"></i><span>Time Table</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>ado/question">
									<i class="fa fa-globe"></i> <span>Questions</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>ado/Holidays">
									<i class="fa fa-globe"></i> <span>Holidays</span>
								</a>
							</li>
						</ul>
					</section>
                        <!-- /.sidebar -->
                    </aside>

                <aside class="right-side">

                <!-- Main content -->
				<?php
				$iTeachers = $this->My_model->getNumRows('employee','school_id',$this->session->userdata('school_id'));
				$iStudents = $this->My_model->getNumRows('student','school_id',$this->session->userdata('school_id'));
				?>
				<section class="content">
                    <div class="row" style="margin-bottom:5px;">
				                                     
						<div class="col-md-2">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-check-square-o"></i></span>
                                <div class="sm-st-info">
									<a href="<?php echo base_url();?>ado/School/Students/">
										<span><?php echo $iStudents;?></span>Students
									</a>
                                </div>
                            </div>
                        </div>	         
                       	<div class="col-md-2">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-user"></i></span>
                                <div class="sm-st-info">
									<a href="<?php echo base_url();?>ado/School/Teachers">
										<span><?php echo $iTeachers;?></span>Teacher
									</a>
                                </div>
							</div>
                        </div>
						<div class="col-md-2">
							<div class="sm-st clearfix">
								<span class="sm-st-icon st-blue"><i class="fa fa-user"></i></span>
								<div class="sm-st-info">
									<a href="<?php echo base_url();?>ado/material">
										<span>&nbsp;</span>Content 
									</a>
								</div>
							</div>
						</div>
					</div>
			</section>