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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title>Recruitment & Placement Services | LangJobs: Language Translators Jobs, Language Experts Recruitment, Language Translation, Interpretation, Localization Service</title>
    <meta name="description" content="we chose to provide solutions to all the bottle-necks in recruiting multilingual resources. At LangJobs we provide world class Recruitment and Placement services for Employers / Recruiters, Language Expert Jobs in India, China, Japan, Korea, Singapore, Turkey, Asia, USA, Europe, Africa, Australia, Americas, Translation, Localization, Interpretation, Interpreter, Translators, Linguist, Biligual, Multilingual"/>
    <meta name="keywords" content="Recruitment, Translation, Multilingual Recruitment Services, langjobs, langjobs.com, foreign language expert, language jobs in india, language translation services, language interpretation, translation agency india, localization"/>
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
    <link href="assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
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
                        <legend>Recruitment & Placement Services</legend>
                        <h2>Recruitment & Placement Services:</h2>
                        <p style="color:red;">"Choose a job you love, and you will never have to work a day in your life." - Confucius</p>
                        <p>And we chose to provide solutions to all the bottle-necks in recruiting multilingual resources. At LangJobs we provide world class Recruitment and Placement services for Employers / Recruiters.</p>
                        <p>We have pioneered the Multiligual recruitment services and proudly claim to have the largest database of bilingual resources in India. Our job portal is pioneer in itself and only job portal in India provides multiligual job opportunity which helps our database grow everyday. This is why within a short span of time many Fortune 500 companies have made us recruitment partner to fulfill their multilingual recruitment needs.</p>
                        <p>Have a look on some case studies to understand bilingual resources requirment and a range of recruitment solutions to fulfill your multiligual recruitment needs:</p>
                        <ul>
                            <li><a href="language-expert-recruitment.php">Case Studies - Language Experts Recruitment</a></li>
                            <li><a href="multilingual-recruitment.php">Multilingual Recruitment Services</a></li>
                            <li><a href="language-resource-outsourcing.php">Language Resource Outsourcing (LRO)</a></li>
                            <li><a href="recruitment-events.php">Recruitment Events</a></li>
                            <li><a href="campus-recruitment.php">Campus Recruitment</a></li>
                        </ul>
                        
                    </fieldset>
                </div>
            </div>
        </div>
    </section>
<?php
    include 'main_footer.php';
?>