<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title><?php echo $title_of_page; ?></title>
    <meta name="description" content="<?php echo $description; ?>"/>
    <meta name="keywords" content="<?php echo $keywords; ?>"/>
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
    <link href="assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <!-- Main stylesheet and color file-->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="<?php echo base_url(); ?>assets/css/colors/default.css" rel="stylesheet">
    <?php
      if(isset($login)){ ?>
          <script type="text/javascript" src="//platform.linkedin.com/in.js">
            api_key: 81vvayxozb8pl5
            authorize: true
            onLoad: onLinkedInLoad
            scope: r_basicprofile r_emailaddress
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
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="index.php">Langjobs.com</a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-th-list"></i>Services</a>
                <ul class="dropdown-menu">
                  <li class="dropdown"><a href="language-jobs.php">Job Portal</a></li>
                  <li class="dropdown"><a href="recruitment-services.php">Recruitment</a></li>
                  <li class="dropdown"><a href="translation-services.php">Translation</a></li>
                  <li class="dropdown"><a href="interpretation-services.php">Interpretation</a></li>
                  <li class="dropdown"><a href="localization-services.php">Localization</a></li>
                  <li class="dropdown"><a href="internationalization-services.php">Internationalization</a></li>
                  <li class="dropdown"><a href="transcription-services.php">Language Transcription</a></li>
                  <li class="dropdown"><a href="voiceover-services.php">Voice-over</a></li>
                  <li class="dropdown"><a href="language-training.php">Language Training</a></li>
                  <li class="dropdown"><a href="toptenreasons.php">Why chose Langjobs?</a></li>
                </ul>
              </li>
              <li><a href="contact.php"><i class="fa fa-phone"></i>Contact Us</a></li>
            </ul>
          </div>
        </div>
      </nav>