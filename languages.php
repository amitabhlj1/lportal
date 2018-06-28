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
                        <h2>Languages</h2>
                                 
                        <p>We provide services in all European, Asian, African and American Languages.</p>
                        <p>Here is a list of languages we have worked on:</p>
                        
                        <ul>
                            <li>Indian Languages
                                <ul><li><a href="assamese-translation.php">Assamese</a> | Bihari | <a href="bengali-translation.php">Bengali</a> | <a href="gujarati-translation.php">Gujarati</a> | <a href="hindi-translation.php">Hindi</a> | <a href="kannada-translation.php">Kannada</a> | Kashmiri | <a href="malayalam-translation.php">Malayalam</a> | <a href="marathi-translation.php">Marathi</a> | Manipuri | <a href="oriya-translation.php">Oriya</a> | <a href="punjabi-translation.php">Punjabi</a> | <a href="sindhi-translation.php">Sindhi</a> | <a href="sanskrit-translation.php">Sanskrit</a> | <a href="tamil-translation.php">Tamil</a> | <a href="telugu-translation.php">Telugu</a> | <a href="urdu-translation.php">Urdu</a></li>
                                </ul></li>
                            <li>Asian Languages
                                <ul><li>Burmese | Bangladeshi | <a href="chinese-translation.php">Chinese</a> | Cambodian | Cantonese | Dari | Indonesian | <a href="japanese-translation.php">Japanese</a> | Khmer | <a href="korean-translation.php">Korean</a> | Kurdish | Lao | Malay | Malagasy | Mandarin |  Nepalese | Pushto (Pashto) | Singhalese | Sorani | Sylheti | <a href="taiwaneselanguagetranslation.php">Taiwanese</a> | <a href="thailanguagetranslation.php">Thai</a> | Tibetan | <a href="vietnameselanguagetranslation.php">Vietnamese</a></li>
                                </ul></li>
                            <li>Middle East & Eastern European Languages
                                <ul><li>Albanian | <a href="">Arabic</a> | Bulgarian | Croatian | Czech | Estonian | Farsi (Persian) | Hebrew | Hungarian | Mongolian | Polish | Romanian | Russian | Serbian | Slovenian | Slovak (Slovensky) | Tajik | Turkish | Ukranian | Uzbek</li>
                                </ul></li>
                            <li>European Languages
                                <ul><li>Belgian | Danish | <a href="">Dutch</a> | Finnish | <a href="">French</a> | Flemish | <a href="">German</a> | Greek | Icelandic | <a href="">Italian</a> | Latin |  Maltese | Norwegian | <a href="">Portuguese</a> | <a href="">Spanish</a> | Swedish | Swiss French</li>
                                </ul></li>
                            <li>American Languages
                                <ul><li>American English | <a href="">Brazilian Portuguese</a> | <a href="">Latin Spanish</a></li>
                                </ul></li>
                            <li>African Languages
                            <ul><li>Afrikaans | Amharic | Creole | Lingala | Swahali | Somali | Twi | Zulu</li>
                            </ul></li>
                        </ul>
                         
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