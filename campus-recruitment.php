<?php include 'db.php'; ?>
<?php 
    include 'utils.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">     <link rel="icon" type="image/png" href="assets/site_logo.png">
    <!--  
    Document Title
    =============================================
    -->
    <title>Recruitment & Placement Services - Campus Recruitment| LangJobs: Language Translators Jobs, Language Experts Recruitment, Language Translation, Interpretation, Localization Service</title>
    <meta name="description" content="Campus Recruitment, In campus recruitment, companies visit colleges and universities. We will perform all of the on-campus recruiting work for select clients.High recruiting success rates, Language Expert Jobs in India, China, Japan, Korea, Singapore, Turkey, Asia, USA, Europe, Africa, Australia, Americas, Translation, Localization, Interpretation, Interpreter, Translators, Linguist, Biligual, Multilingual"/>
    <meta name="keywords" content="In campus recruitment, colleges and universities, on-campus recruiting work, High recruiting success rates Recruitment, Translation, Multilingual Recruitment Services, langjobs, langjobs.com, foreign language expert, language jobs in india, language translation services, language interpretation, translation agency india, localization"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="revisit-after" content="1 days"/>
    <meta name="robots" content="index,follow"/>
    <meta name="copyright" content="LangJobs:2007-2020"/>
    <meta name="author" content="Design: Rajnish Kumar / Author: Rajnish Kumar / website: rajnishcv.com"/>
    
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
    <link href="assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Crete+Round|Montserrat|Raleway|Baloo+Tamma|NTR" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">
    <style>
        input#index_search_box{
            background-color: transparent;
            color: white;
            border: 1px solid;
            border-radius: 5px;
            width: 15%;
            font-size: 16px;
            background-image: url('./assets/images/search_icon.png');
            background-repeat: no-repeat;
            background-position: -5px;
            background-size: contain;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        } 
        input#index_search_box:focus{
            width: 45%;
        }
        input#index_search_btn{
            padding: 15px 2px;
            font-size: 14px;
            margin-bottom: 5px;
            border-radius:5px;
        }
        input#search_btn{
            background-image: url('./assets/images/search_icon_white.png');
            background-repeat: no-repeat;
            background-position: 44%;
            background-size: contain; 
        }
        .breadcrumb {
            background-color: transparent !important;
            font-weight: bold;
        }
    </style>
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <?php include 'nav_menu.php'; ?>
<?php
    //include 'main_header.php';
    include 'make_menu_visible.php';
?>
<style>
    p {
        text-align: justify;
    }
</style>
    <section class="module" style="padding:60px 0px;">
        <div class="container">
            <div class="row">
                <div class="mb-sm-20 wow fadeInUp col-md-12 col-sm-12 col-xs-12"> 
                    <fieldset>
                        <legend>Campus Recruitment</legend>
                        <h2>Campus Recruitment:</h2>
                        <ul>
                            <li>In campus recruitment, companies visit colleges and universities.</li>
                            <li>We will perform all of the on-campus recruiting work for select clients.</li>
                            <li>High recruiting success rates</li>
                        </ul>
                        <p style="margin-left:.5in">
                             <a href="recruitment-services.php">Back to Recruitment & Placement Services</a></p>
                        </p>
                        
                    </fieldset>
                </div>
            </div>
        </div>
    </section>
<?php
    include 'main_footer.php';
?>