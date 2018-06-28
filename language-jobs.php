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
    <title>Online Job Portal Services | LangJobs: Language Translators Jobs, Language Experts Recruitment, Language Translation, Interpretation, Localization Service</title>
    <meta name="description" content="LangJobs.com, is India's 1st Language Jobs Portal and no 1 in niche job portal specializes in languages.  It has been also chosen as India's most innovative portal by Winning Edge Magazine. With ever growing Alexa.com ranking and Google PageRank it shows great success. Its database of language experts is continuously growing and it has been accepted as the most popular job portal among the language jobs seek, Language Expert Jobs in India, China, Japan, Korea, Singapore, Turkey, Asia, USA, Europe, Africa, Australia, Americas, Translation, Localization, Interpretation, Interpreter, Translators, Linguist, Biligual, Multilingual"/>
    <meta name="keywords" content="India's 1st Language Jobs Portal, langjobs, langjobs.com, foreign language expert, language jobs in india, language translation services, language interpretation, translation agency india, localization"/>
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
                        <legend>Online Job Portal Services</legend>
                        <h2>Online Job Portal Services:</h2>
                        <p>www.LangJobs.com, is India's 1st Language Jobs Portal and no 1 in niche job portal specializes in languages.  It has been also chosen as India's most innovative portal by Winning Edge Magazine. With ever growing Alexa.com ranking and Google PageRank it shows great success. Its database of language experts is continuously growing and it has been accepted as the most popular job portal among the language jobs seekers.</p>
                        <h4>Unique Features:</h4>
                        <ul>
                            <li>India's 1st Language Jobs Portal.</li>
                            <li>Only specialized Language Jobs Portal in India.</li>
                            <li>Global Reach (Visitors from more than 100 Countries).</li>
                            <li>Saves recruiters money and time for sourcing, short-listing and find the right language experts.</li>
                            <li>Saves time for job seekers to find a suitable specialized job.</li>
                        </ul>
                        <h4>Services For Job Seekers: </h4>
                        <ul>
                            <li>Register, Add Profile & Post Resume/CV</li>
                            <li>Maintain / Edit / Update Profile</li>
                            <li>Get Job Alert</li>
                            <li>Babble Out Loud</li>
                            <li>Participate in Contest</li>
                            <li>Career Counseling</li>
                            <li>Participate in Events</li>
                            <li>Access Resources</li>
                            <li>Participate in Poll</li>
                            <li>Many more services. Currently all the above services are free.</li>
                        </ul>
                        <p>If you are a language expert, <a href="login.php">register now</a> to avail all the above services for free.</p>
                        <h4>Services For Recruiters: </h4>
                        <ul>
                            <li>Register & Create your Profile</li>
                            <li>Post your Jobs & View Candidates Applied for the Jobs</li>
                            <li>Database Access</li>
                            <li>Advertise Your Profile & Jobs</li>
                            <li>Babble Out Loud</li>
                            <li>And many more customized Services.</li>
                        </ul>
                        
                    </fieldset>
                </div>
            </div>
        </div>
    </section>
<?php
    include 'main_footer.php';
?>