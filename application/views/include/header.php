<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title><?php echo $title_of_page; ?></title>
    <meta name="description" content="<?php echo $description; ?>"/>
    <meta name="keywords" content="<?php echo $keywords; ?>"/>
    <?php 
        if(isset($keyphrase)){
            echo '<meta name="keyphrase" content="'.$keyphrase.'"/> ';    
        }
    ?>
    <meta name="revisit-after" content="2 days"/>
    <meta name="robots" content="index,follow"/>
    <meta name="copyright" content="LangJobs:2007-20"/>
    <meta name="author" content="Amresh Sharma / Rajnish Kumar"/>
    <meta content="Global" name="distribution" />
    <meta content="FOLLOW, INDEX, ALL" name="robots" />
    <meta content="yes" name="ALLOW-SEARCH" />
    <meta content="all" name="AUDIENCE" />
    <meta content="index, follow" name="YahooSeeker" />
    <meta content="index, follow" name="msnbot" />
    <meta content="index, follow" name="googlebot" />
    <meta content="english" name="language" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Favicons
    =============================================
    -->
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--  
    Stylesheets
    =============================================
    
    -->
    <!-- Default stylesheets-->
    <link href="<?php echo base_url(); ?>assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <!-- Main stylesheet and color file-->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="<?php echo base_url(); ?>assets/css/colors/default.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.1/datatables.min.css"/>
    <style>
    input#search_btn{
        background-image: url(<?php echo base_url(); ?>assets/images/search_icon_white.png);
        background-repeat: no-repeat;
        background-position: 44%;
        background-size: contain; 
    }
    #search{
        display:block;
        text-align:center;
    }
    .wrapper {
        border:1px solid transparent;
        display:inline-block;
    }
    .wrapper>button{
        padding: 8px 11px !important;
        margin-left: -5px;
    }
    </style>	  
	<script src="<?php echo base_url(); ?>assets/js/common.js"></script>
	<script>
		var baseurl = "<?php echo base_url();?>";
	</script>
	<?php
      if(isset($login)){ ?>
        <script type="text/javascript" src="//platform.linkedin.com/in.js">
            api_key: 81vvayxozb8pl5
            authorize: true
            onLoad: onLinkedInLoad
            scope: r_basicprofile r_emailaddress rw_company_admin w_share
        </script>
	 <?php
      	}
	 ?>
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <nav id="main_menu" class="navbar navbar-custom navbar-fixed-top navbar-transparent" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="<?php echo base_url();?>">Langjobs.com</a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
           <?php
              if(!$this->session->userdata('exp_id')){
            ?>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i>Home</a></li>
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-th-list"></i>Services</a>
                <ul class="dropdown-menu">
                  <li class="dropdown"><a href="<?php echo base_url(); ?>language-jobs.php">Job Portal</a></li>
                  <li class="dropdown"><a href="<?php echo base_url(); ?>recruitment-services.php">Recruitment</a></li>
                  <li class="dropdown"><a href="<?php echo base_url(); ?>translation-services.php">Translation</a></li>
                  <li class="dropdown"><a href="<?php echo base_url(); ?>interpretation-services.php">Interpretation</a></li>
                  <li class="dropdown"><a href="<?php echo base_url(); ?>localization-services.php">Localization</a></li>
                  <li class="dropdown"><a href="<?php echo base_url(); ?>internationalization-services.php">Internationalization</a></li>
                  <li class="dropdown"><a href="<?php echo base_url(); ?>transcription-services.php">Language Transcription</a></li>
                  <li class="dropdown"><a href="<?php echo base_url(); ?>voiceover-services.php">Voice-over</a></li>
                  <li class="dropdown"><a href="<?php echo base_url(); ?>language-training.php">Language Training</a></li>
                  <li class="dropdown"><a href="<?php echo base_url(); ?>toptenreasons.php">Why chose Langjobs?</a></li>
                </ul>
              </li>
              <li><a href="<?php echo base_url(); ?>Language_experts"><i class="fa fa-users"></i>Language Experts</a></li>
              <li><a href="<?php echo base_url(); ?>Blogs"><i class="fa fa-users"></i>Blogs</a></li>
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-th-list"></i>Login</a>
                <ul class="dropdown-menu">
                  <li class="dropdown"><a href="<?php echo base_url();?>LangExpert">Language Expert</a></li>
                  <li class="dropdown"><a href="<?php echo base_url();?>LangEmployer">Language Employer</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form" id="search" autocomplete="off" action="<?php echo base_url() ?>SearchJob/retrieve_jobs" method="post">
                <div class="wrapper">
                    <input type="hidden" name="language" value="" />
                    <input type="hidden" name="sector" value="" />
                    <input type="hidden" name="locationCombo" value="" />
                    <input type="hidden" name="experience" value="" />
                    <input type="text" name="keywords" class="form-control" placeholder="Search Job"/>
                    <button class="btn btn-xs btn-danger"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <?php
              } else { ?>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="<?php echo base_url(); ?>SearchJob"><i class="fa fa-search"></i>Search Jobs</a></li>
                  <li><a href="<?php echo base_url(); ?>SearchProject"><i class="fa fa-book"></i>Freelance Projects</a></li>
                  <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-pencil-square-o"></i>Blog</a>
                    <ul class="dropdown-menu">
                      <li class="dropdown"><a href="<?php echo base_url();?>Blogs/write"><i class="fa fa-pencil-square-o"></i> Write Blog</a></li>
                      <li class="dropdown"><a href="<?php echo base_url();?>Blogs/all_blog"><i class="fa fa-pencil-square-o"></i> Your Blogs</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-user-circle"></i><?php echo $this->session->userdata('first_name'); ?></a>
                    <ul class="dropdown-menu">
                      <li class="dropdown"><a href="<?php echo base_url();?>expert"><i class="fa fa-user-circle-o"></i> Profile</a></li>
                      <li class="dropdown"><a href="<?php echo base_url();?>applied_jobs"><i class="fa fa-history"></i> Jobs Applied</a></li>
                      <li class="dropdown"><a href="<?php echo base_url();?>expert/logout"><i class="fa fa-sign-out"></i>Logout</a></li>
                    </ul>
                  </li>
                </ul>
             <?php  
              }
            ?>
          </div>
        </div>
      </nav>
	<script>
		//following function is written just to remove the navbar-transparent class from the navbar.
		//So that it could be stay visible on other pages
		function remove_class_from_menu(){
			var element = document.getElementById("main_menu");
			element.className = element.className.replace(/\bnavbar-transparent\b/g, "");
			//console.log("called");
		}
		remove_class_from_menu();
	</script>