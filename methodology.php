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
    <title>LangJobs: Translation Methodolody, Translation Project Management</title>
    <meta name="description" content="Translation Methodolody, Translation Project Management by LangJobs"/>
    <meta name="keywords" content="translation methodolody, translation project management , selection of translators , translators selection , value driven service , quality service , integrity , confidentiality , translation industry in India , best quality , timeliness , customer service , confidential documents translation , legal documents translation"/>
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
                        <legend>Translation & Localization Services</legend>
                        <h2>Translation & Localization Methodology</h2>
                        <h5>Project Management</h5>
                        <p>We adopt Five Steps Project Management to ensure the high quality translation service. We understand that every project had different needs and require special attention as per the requirement. As soon as a Project is undertaken, we assign a dedicated Project Manager for your project, who is also dedicated single point of contact during the translation project. A Project Manager at LangJobs is having good experience in handling a translation project and usually a linguist. </p>
                        <h5>Translators Selection</h5>
                        <p>Best translation can be done with the linguistics skills of translators and their subject matter expertise. We adopt a methodology where we assign the work to a translator having combination of these two skills. For example legal documents are translated by translators having linguistic ability as well as a degree in law or expertise in legal translation, an accounting / financial document is translated by a linguist with expertise in accountancy / finance and similarly technical documents and medical documents are translated by engineers & doctors respectively having equally good linguistics skills. We also adopt a methodology to include Native translators of the target language in a project. We assign proof reading to our well experienced proof-readers holding university masters / Ph.D. degrees.</p>
                        <h5>Value Driven Service</h5>
                        <p>We are a value driven company which keeps us ahead of any other company in translation industry in India. We ensure the best quality, timeliness, integrity and best customer service as per your requirement. We understand your need and partner them to fulfill the same with best customer service and high quality. We ensure the integrity and maintain high confidentiality which makes us preferred vendor of many big MNCs for confidential, legal & financial documents translations.</p>                    
                        
                        <p style="margin-left:1.5in">
			             <a href="translation-services.php">Back to Translation Services</a> | or <a href="contact.php">Contact Us</a> for more information.
                        </p>                        
                        
                    </fieldset>
                </div>
            </div>
        </div>
    </section>
<?php
    include 'main_footer.php';
?>