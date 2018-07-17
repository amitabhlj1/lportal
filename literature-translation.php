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
    <title>LangJobs: Literature,  E-Learning, Tourism and Other Documents Translation</title>
    <meta name="description" content="Literature,  E-Learning, Tourism and Other Documents Translation by LangJobs - Delhi, Bangalore, Chennai, Pune, India"/>
    <meta name="keywords" content="e-learning Materials , Training Materials , Tourism Related Documents , Tour Description , Itinerary , Literature,  E-Learning, Tourism and Other Documents Translation"/>
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
                        <legend>Translation & Localization Services</legend>
                        <h2>Literature, E-Learning, Tourism and Other Documents Translation</h2>
                        <ul>
                            <li>Books</li>
                            <li>E-learning Materials</li>
                            <li>Training Materials</li>
                            <li>Tourism Related Documents</li>
                            <li>Tour Description</li>
                            <li>Itinerary</li>
                            <li>Any other documents</li>
                        </ul>
                        <h4 class="advert">To book any of our Professional Services, Please call us on <a href="tel:+91-93114-88060">+91-93114-88060</a> or <a href="mailto:info@langjobs.com">Email us</a>. Our team will be happy to answer any query you may have.</h4>
                        <p>We adopt a Translation methodology to translate all the documents which makes us enable to provide a process driven and quality service : -</p>
                        <h5 style="color:red;"><a href="methodology.php">Translation Methodology</a></h5>
                        <h5 style="color:red;"><a href="languages.php">Languages</a></h5>
                        
                        <p style="color:red;">You can get an instant quote, submit your query or request for more information by contacting us. Alternatively you can call us or email as below: </p>
                        <p style="color:red;">Email: <a href="mailto:info@langjobs.com">info@langjobs.com</a><br/>Phone: +91-99585-92758, +91-11-46013636
                        <br/> Bangalore - Call: +91-96867-33757
                        </p>
                        <p style="margin-left:.5in">
                             <a href="translation-services.php">Back to Translation Services</a></p>
                        </p>
                        
                    </fieldset>
                </div>
            </div>
        </div>
    </section>
<?php
    include 'main_footer.php';
?>