<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>LangJobs | Dashboard</title>
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
	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	
	<script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->
		  
	 <script src="<?php echo base_url();?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
	<script>
		var baseurl = "<?php echo base_url();?>";
	</script>
    </head>
    <body class="skin-black">		
        <!-- header logo: style can be found in header.less -->
        <header class="header">			
			<a href="<?php echo base_url();?>" class="logo" target="_blank">LangJobs</a>			
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
				  <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-briefcase"></i>
                                <span>
									<?php 
										if($this->session->userdata('emp_id'))
											echo $this->session->userdata('comp_name');
									?>
									<i class="caret"></i>
								</span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Manage Account</li>
                                <li class="divider"></li>
                                <li>
									<a href="<?php echo base_url();?>ado/Employer/profile">
										<i class="fa fa-cog fa-fw pull-right"></i>Profile
									</a>										
									<a href="<?php echo base_url();?>ado/Employer/changePassword">
										<i class="fa fa-key fa-fw pull-right"></i>Change Password
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo base_url()?>ado/Employer/logout"><i class="fa fa-sign-out fa-fw pull-right"></i> Logout</a>
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
								<img src="<?php if($this->session->userdata('image')){ echo base_url()."assets/uploads/employer/".$this->session->userdata('image'); } else { echo base_url()."assets/generic_company.jpg"; } ?>" class="img-circle" alt="company Image" width='45' height='45'/> 
							</div>
							<div class="pull-left info">
								<p style="margin-top: 10%;"><?php 
									if($this->session->userdata('emp_id'))
										echo $this->session->userdata('comp_name');
									else
										echo "Hello";
								?></p>
							   <!--  <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
							</div>
						</div>
						<!-- sidebar menu: : style can be found in sidebar.less -->
						<ul class="sidebar-menu">
							<li>
								<a href="<?php echo base_url();?>ado/Employer/">
									<i class="fa fa-dashboard"></i><span>Dashboard</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>ado/Employer/resumeHistory">
									<i class="fa fa-file-text"></i><span>Resume View History</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>ado/Employer/searchExperts">
									<i class="fa fa-search"></i><span>Search Language Experts</span>
								</a>
							</li>
						</ul>
					</section>
                        <!-- /.sidebar -->
                    </aside>

                <aside class="right-side">

                <!-- Main content -->
				<?php
				    $iJobs = $this->My_model->getNumRows('jobs','company_id',$this->session->userdata('emp_id'));
                    //$iCVCount = $this->My_model->getNumRows('resume_view_history','company_id',$this->session->userdata('emp_id'));
                    $plan_start = $this->session->userdata('plan_start');
                    $cid = $this->session->userdata('emp_id');
                    $iCVCount = $this->db->from("resume_view_history")->where('DATE(first_view_date) > "'.$plan_start.'" AND company_id = "'.$cid.'" ')->count_all_results();
                    //$this->My_model->printQuery();
                    $iBalance = $this->config->item('rplan_cv')[$this->session->userdata('r_plan')] - $iCVCount;
				?>
				<section class="content">
                    <div class="row" style="margin-bottom:5px;">                                 
						<div class="col-md-3" title="Total jobs posted by you">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-check-square-o"></i></span>
                                <div class="sm-st-info"><span><?php echo $iJobs;?></span>
									<a href="<?php echo base_url();?>ado/Employer/jobs/">
										Total Jobs
									</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" title="Change Your Plan">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-money"></i></span>
                                <div class="sm-st-info"><span><?php echo $this->config->item('rplans')[$this->session->userdata('r_plan')];?></span>
                                    <a href='<?php echo base_url(); ?>ado/Employer/changeplan'>Current Plan</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" title="No. of resumes left to view acc to your plan">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa  fa-file-text-o"></i></span>
                                <div class="sm-st-info"><span><?php echo $iBalance;?></span>
									<a href="<?php echo base_url();?>ado/Employer/resumeHistory">
										Resumes Left
									</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" title="Your Employer Profile's Status">
                            <div class="sm-st clearfix">
                               <?php 
                                    if($this->session->userdata('acc_status') == 0){ ?>
                                    <span class="sm-st-icon st-red"><i class="fa fa-refresh fa-spin"></i></span>
                                    <div class="sm-st-info"><span>Status</span>
                                            Awaiting Approval
                                    </div>
                               <?php
                                    } else if($this->session->userdata('acc_status') == 1) { ?>
                                    <span class="sm-st-icon st-red"><i class="fa fa-check-square"></i></span>
                                    <div class="sm-st-info"><span>Status</span>
                                            Approved
                                    </div>
                               <?php
                                    }
                                ?>
                            </div>
                        </div>	         
					</div>
			</section>