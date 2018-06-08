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
    <title>LangJobs: One Stop Language Solution Services</title>
    <meta name="description" content="Top 10 Reasons to Choose LangJobs for Translation, Interpretation & Multiligual Recruitment Services - Dutch, German, French, Spanish, Portuguese, Italian, Chinese, Korean and Japanese by LangJobs"/>
    <meta name="keywords" content="top 10 reasons to choose LangJobs , reliable translation services , integrity , partenering your need , customer centricity , quality , flexibility , expertise , result-driven , result driven , proactive ,  quality translation services , quality translation service ,  quality interpretation service , quality interpretation services , quality voice over , reliable interpretation services , best translation service in delhi , best translation services in india , customet centric interpretation service , quality conference service , best conference services , reasons to choose langjobs , quality french translation , quality spanish translation , quality german translation , quality japanese translation , quality chinese translation"/>
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
                        <legend>Why Choose LangJobs</legend>
                        <h2>Top 10 Reasons to Choose LangJobs?</h2>
                        
                        <h5>Reliability</h5>
                        <p>We have been retained by many Fortune 500, leading Software MNCs, BPOs, KPOs, Manufacturing companies. We have always delivered on time. No other vendor makes this claim.</p>
                        <h5>Integrity</h5>
                        <p>LangJobs is committed to honesty and fairness in all aspects of our relationship with you. We follow our value chain to ensure the Integrity.</p>
                        <h5>Partnering your need</h5>
                        <p>We believe in partnering your need to deliver the best.</p>
                        <h5>Customer centricity</h5>
                        <p>We make it our business to understand our clients business, processes, systems and culture and ensure full alignment.</p>
                        <h5>Substance</h5>
                        <p>Having India's 1st Language Jobs Portal and being the first specialized language consultancy of India we are leading service provider. With our large database, we can easily and expertly handle projects of any size.</p>
                        <h5>Quality</h5>
                        <p>Follow our value chain and to ensure the best quality, we always use the best resources in the market. We follow methodology of improving our quality on everyday basis. We also encourage the innovative ideas at our team to bring better quality systems in place.</p>
                        <h5>Flexibility</h5>
                        <p>We understand that markets, regulatory and competitive environments are dynamic and will affect organization, so our engagements and commitment will change accordingly.</p>
                        <h5>Expertise</h5>
                        <p>Having specialized Job Portal and being the landmark in India market place for providing one stop language consultancy services, we are widely recognized as the definitive source of information for companies considering language resources recruitment, setting up a process with language experts, localization, translation etc.</p>
                        <h5>Results-driven</h5>
                        <p>Very professional and performance management culture, based on real-time tracking of metrics, agency tracker, and project management keeps us ahead of any other service provider in market.</p>
                        <h5>Pro-activeness</h5>
                        <p>We adopt the method of going beyond what we commit to deliver, drive to improve & deliver the best.</p>
                        
                        <p>If you are a recruiter / company, <a href="login.php">register</a> and create you profile for free. You may also post your first job for free. <a href="contact.php">Contact us</a> now for more services. Call us now on: +91-9958592758 or +91-11-46028990.</p>
                    </fieldset>
                </div>
            </div>
        </div>
    </section>
<?php
    include 'main_footer.php';
?>