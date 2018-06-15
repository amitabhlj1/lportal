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
    <title>LangJobs: Language Training, Corporate Language Training, Corporate Trainer in India</title>
    <meta name="description" content="Corporate Language Training, Corporate Trainer, Language Training Camp, Training for French, German, Spanish, Japanese, Chinese by LangJobs"/>
    <meta name="keywords" content="Corporate Trainer, Language Training Camp, Training for French, Corporate Language Training, Cross Cultural Training,  Language Training Camp,Special Intensive Course"/>
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
                        <legend>Training & Education Services</legend>
                        <h2>Training & Education Services:</h2>
                        <h5>Corporate Language Training</h5>
                        <ul>
                            <li>Having deep understanding of business culture and specialized requirements of companies and organizations, we offer corporate language training for executives and employees.</li>
                            <li>We offer training for various foreign languages like - French, German, Spanish, Portuguese, Italian, Japanese, Chinese, Korean etc.</li>
                            <li>Our language experts teach the business communication, corporate jargon's as well as various presentation techniques to the professionals.</li>
                        </ul>
                        <h5>Cross Cultural Training</h5>
                        <ul>
                            <li>Our Experienced trainers have designed and delivered the Cross Cultural Trainings.</li>
                            <li>Customized training as per company's culture and specific project.</li>
                            <li>We try to sensitize the attendees to cross-cultural situations through various role-plays, games and other methods.</li>
                        </ul>
                        <h5>Language Training Camp</h5>
                        <ul>
                            <li>We take the group of people to a destination and organize a camp for Language Training.</li>
                            <li>Most suitable for Foreigners on Indian Visit, Theme Tourists, Students on Study Tour, Summer Camps, Vacation Camp, Bonus Tours etc.</li>
                        </ul>
                        <h5>Special Intensive Course</h5>
                        <ul>
                            <li> Visitors going to foreign tour for the business trip</li>
                            <li> Preparation for an Examination</li>
                            <li> For some short term specific courses</li>
                        </ul>
                                        
                        <h5>Order your Language Training service online now:</h5> 

                        <p>You can get an instant quote, submit your query or request for more information by <a href="contact.php">contacting us</a>. Alternatively you can call us or email as below: <br/><br/>

                        Email: <a href="mailto:info@langjobs.com">info@langjobs.com</a> <br/>
                        Phone: +91-99585-92758, +91-11-46028990</p>
                        
                        
                    </fieldset>
                </div>
            </div>
        </div>
    </section>
<?php
    include 'main_footer.php';
?>