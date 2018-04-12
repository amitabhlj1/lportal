<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>LangJobs | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
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



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

          <style type="text/css">

          </style>
    </head>
    <body class="skin-black">		
        <!-- header logo: style can be found in header.less -->
        <header class="header">			
			<a href="<?php echo base_url();?>" class="logo" target="_blank">LangSchool</a>			
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">				
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
					<?php 
					if($this->session->userdata('admin_id')) 
					{
					?>
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <!-- <li class="dropdown messages-menu">
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
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php //echo base_url();?>assets/admin/img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Reviewers
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                                <small class="pull-right"><i class="fa fa-clock-o"></i> 2 days</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>  -->                       
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span>
									<?php 
										if($this->session->userdata('admin_name'))
											echo $this->session->userdata('admin_name');
										else
											echo "jane";
									?>
									<i class="caret">
								</i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>
								<!--
                                <li>
                                    <a href="#">
                                    <i class="fa fa-clock-o fa-fw pull-right"></i>
                                        <span class="badge badge-success pull-right">10</span> Updates</a>
                                    <a href="#">
                                    <i class="fa fa-envelope-o fa-fw pull-right"></i>
                                        <span class="badge badge-danger pull-right">5</span> Messages</a>
                                    <a href="#"><i class="fa fa-magnet fa-fw pull-right"></i>
                                        <span class="badge badge-info pull-right">3</span> Subscriptions</a>
                                    <a href="#"><i class="fa fa-question fa-fw pull-right"></i> <span class=
                                        "badge pull-right">11</span> FAQ</a>
                                </li> -->

                                <li class="divider"></li>
                                    <li>
										<?php if($this->session->userdata('user_type') == 3)
										{
										?>
                                        <a href="<?php echo base_url();?>ado/Admin/profile">
											<i class="fa fa-user fa-fw pull-right"></i>Profile
                                        </a>										
                                        <a href="<?php echo base_url();?>ado/Admin/changePassword">
											<i class="fa fa-cog fa-fw pull-right"></i>Change Password
                                        </a>
										<?php } ?>
                                        </li>

                                        <li class="divider"></li>
                                        <li>
                                            <a href="<?php echo base_url()?>ado/Admin/logout"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
						<?php } ?>	
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
								<p>Hello, <?php 
									if($this->session->userdata('admin_name'))
										echo $this->session->userdata('admin_name');
									else
										echo "jane";
								?></p>

							   <!--  <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
							</div>
						</div>
						<!-- search form -->
						<!--
						<form action="#" method="get" class="sidebar-form">
							<div class="input-group">
								<input type="text" name="q" class="form-control" placeholder="Search..."/>
								<span class="input-group-btn">
									<button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</form> -->
						<!-- /.search form -->
						<!-- sidebar menu: : style can be found in sidebar.less -->
						<ul class="sidebar-menu">
							<li class="active">						
							<a href="<?php echo base_url();?>ado/Admin/" class="logo">
								<i class="fa fa-dashboard"></i> <span>Dashboard</span>
							</a>			
							</li>
							<li>
								<a href="<?php echo base_url();?>ado/Admin/Country">
									<i class="fa fa-gavel"></i><span>Country</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>ado/Admin/Language">
									<i class="fa fa-gavel"></i><span>Language</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>ado/Admin/Category">
									<i class="fa fa-gavel"></i><span>Category</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>ado/Section">
									<i class="fa fa-gavel"></i><span>Sections</span>
								</a>
							</li>
						</ul>
					</section>
                        <!-- /.sidebar -->
                    </aside>

                    <aside class="right-side">

                <!-- Main content -->
				<section class="content">
                    <div class="row" style="margin-bottom:5px;">
				<?php
				if( $this->session->userdata('user_type') != 3 && $this->session->userdata('user_type') != 4)
				{ 					
				?>                                        
						<div class="col-md-2">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-check-square-o"></i></span>
                                <div class="sm-st-info">
									<a href="<?php echo base_url();?>ado/mstudent/">
										<span>&nbsp;</span>Language Experts
									</a>
                                </div>
                            </div>
                        </div>
					<?php
				} 
					
				if($this->session->userdata('user_type') == 1 || $this->session->userdata('user_type') == 4) 
				{
				?>
					<div class="col-md-2">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-blue"><i class="fa fa-user"></i></span>
                        <div class="sm-st-info">
							<a href="<?php echo base_url();?>ado/Studycontent">
								<span>&nbsp;</span>Content 
							</a>
                        </div>
						</div>
                    </div>
					<div class="col-md-2">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-blue"><i class="fa fa-user"></i></span>
                        <div class="sm-st-info">
							<a href="<?php echo base_url();?>ado/Enquiry">
								<span>&nbsp;</span>Enquiry
							</a>
                        </div>
						</div>
                    </div>
				<?php } ?>
				</div>
			</section>