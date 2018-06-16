<style>
    input#index_search_box{
        background-color: transparent;
        color: #e4ff00;
        border: 1px solid;
        border-radius: 5px;
        width: 35%;
        font-size: 16px;
        background-image: url('./assets/images/search_icon_yellow.png');
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
    input#index_search_box::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: #e4ff00;
        opacity: 1; /* Firefox */
    }

    input#index_search_box:-ms-input-placeholder { /* Internet Explorer 10-11 */
        color: ##e4ff00;
    }

    input#index_search_box::-ms-input-placeholder { /* Microsoft Edge */
        color: ##e4ff00;
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
    .titan-title-size-1, .titan-title-size-2{
        text-shadow: 0 0 25px #FFF; 
        font-size: 25px;
    }
    .main_title{
        font-size:4em;   
    }
    @media screen and (max-width: 480px) {
        .main_title {
            font-size: 3em;
        }
    }
</style>
<section class="home-section home-parallax home-fade home-full-height bg-dark-60 agency-page-header" id="home" data-background="<?php echo base_url() ?>assets/images/LJ2.jpg">
<div class="titan-caption">
  <div class="caption-content">
    <div class="font-alt mb-30 titan-title-size-1 main_title"> World's No 1. Language Specific Job Portal </div>
    <div class="font-alt mb-40 titan-title-size-2" style="display:none;"> We Provide <br/><span class="rotate"> Career Services | Translation Services | Transcription Services | Language Specific Services</span>
    </div>
      <form autocomplete="off" action="<?php echo base_url() ?>SearchJob/retrieve_jobs" method="post">
        <input type="hidden" name="language" value="" />
        <input type="hidden" name="sector" value="" />
        <input type="hidden" name="locationCombo" value="" />
        <input type="hidden" name="experience" value="" />
        <input id="index_search_box" type="text" name="keywords" placeholder="Search Language Jobs / Freelance Language Projects">
        <input id="index_search_btn" type="submit" class="btn btn-border-w" value="Search"/>
      </form>
  </div>
</div>
</section>
      <div class="main">
        <section class="module">
          <div class="container">
            <div class="row multi-columns-row">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="features-item">
                  <div class="features-icon"><span class="icon-search"></span></div>
                  <h3 class="features-title font-alt">For language professionals</h3>
                  <span style="text-align:center;">
                     <a rel="canonical" href="<?php echo base_url() ?>SearchJob"><i class='fa fa-hand-o-right'></i> Search job/Language projects</a></br>
                     <a rel="canonical" href="<?php echo base_url() ?>LangExpert"><i class='fa fa-hand-o-right'></i> Register Profile</a></br>
                     <a rel="canonical" href="<?php echo base_url() ?>Blogs"><i class='fa fa-hand-o-right'></i> Explore other resources</a>
                  </span>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="features-item">
                  <div class="features-icon"><span class="icon-briefcase"></span></div>
                  <h3 class="features-title font-alt">For Language Recruiters</h3>
                  <span style="text-align:center;">
                     <a rel="canonical" href="<?php echo base_url() ?>LangEmployer"><i class='fa fa-hand-o-right'></i> Register Company Profile</a></br>
                     <a rel="canonical" href="<?php echo base_url() ?>LangEmployer"><i class='fa fa-hand-o-right'></i> Post Jobs/Language Projects</a></br>
                     <a rel="canonical" href="<?php echo base_url() ?>LangEmployer"><i class='fa fa-hand-o-right'></i> Hire Best Linguists </a>
                  </span>
                </div>
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="features-item">
                  <div class="features-icon"><span class="fa fa-language"></span></div>
                  <h3 class="features-title font-alt">Free Translation</h3>
                  <span style="text-align:center;">
                     <a rel="canonical" href="<?php echo base_url() ?>Translation"><i class='fa fa-hand-o-right'></i> Free machine translations</a></br>
                     <a rel="canonical" href="<?php echo base_url() ?>Translation"><i class='fa fa-hand-o-right'></i> Compare Translations</a></br>
                     <a rel="canonical" href="<?php echo base_url() ?>Translation"><i class='fa fa-hand-o-right'></i> Text to Speech </a>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="module pt-0 pb-0" id="about">
          <div class="row position-relative m-0">
            <div class="col-xs-12 col-md-6 side-image" data-background="<?php echo base_url(); ?>assets/img/about.jpg"></div>
            <div class="col-xs-12 col-md-6 col-md-offset-6 side-image-text">
              <div class="row">
                <div class="col-sm-12" style="text-align:justify;">
                  <h2 class="module-title font-alt align-left" style="margin:-130px 0 35px;">About Us</h2>
                  <div class="module-subtitle font-serif align-left" style="margin-bottom:0px;">We are Language Yogis ! Our mission is to connect the world through languages.</div>
                <p style="margin: 0 0 -110px;">
                    Started in 2007, <a href="<?php echo base_url(); ?>">LangJobs.com</a> is a leading global language community portal to connect linguists, language jobs seekers, freelance language experts, translators, language teachers, professionals with probable employers and project managers. We have <a rel="canonical" href="<?php echo base_url(); ?>Language_experts/cards">100,000+ language professionals</a> connected through this portal. <br/> 
                    
                    A Language professional can search jobs or translation projects or interpretation assignments etc and apply after <a href="<?php echo base_url(); ?>LangExpert">registering</a> and making their profile on this portal - and its free. <br>
                    
                    An employer, recruiter or language project manager can post unlimited free language jobs or language projects after <a href="<?php echo base_url(); ?>LangEmployer">registering on the portal as Recruiter</a>. They can also view the profiles of limited applied linguist for free. Please <a href="<?php echo base_url() ?>contact.php">contact us</a> if you require any help or want a demo. <br>
                    
                    <a href="<?php echo base_url(); ?>">LangJobs.com</a> believes in knowledge sharing and growing together and recently added Language Blogs sections open for global language community to contribute and publish their articles and blogs related to various languages and culture. <br>Our sister concern <a href="http://langecole.com">LangÉcole®</a> is a leading brand in Language Training. <br>
                    
                    As AI and cloud technologies is playing roles, together with <a href="http://langecole.com">LangÉcole®</a> we are aiming to encourage and come up with various research areas knowledge sharing through our portals.  <br> 
                    
                    We have also added a new section, <a href="<?php echo base_url() ?>Translation">Free Translation</a> on this portal for the larger benefit of language professional and language translators in particular. In this section, we brought together the results of three difference cloud based machine translation tools to compare the translation. This can be very useful for a freelance translator while working on translation projects.<br>
                    
                    <a href="<?php echo base_url() ?>Translation">Free Machine Translation Compare tool</a> can be also useful for a short text translation users, who has quick need to get a vague idea about the topic.
                </p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="module pb-0" id="works">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Professional Services</h2>
                <div class="module-subtitle font-serif"></div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-sm-12" style="display:none;">
                <ul class="filter font-alt" id="filters">
                  <li><a class="current wow fadeInUp" href="#" data-filter="*">All</a></li>
                  <li><a class="wow fadeInUp" href="#" data-filter=".portal" data-wow-delay="0.2s">Job Portal</a></li>
                  <li><a class="wow fadeInUp" href="#" data-filter=".interpretation" data-wow-delay="0.4s">Interpretation</a></li>
                  <li><a class="wow fadeInUp" href="#" data-filter=".recruitment" data-wow-delay="0.6s">Recruitment</a></li>
                  <li><a class="wow fadeInUp" href="#" data-filter=".training" data-wow-delay="0.2s">Language Training</a></li>
                  <li><a class="wow fadeInUp" href="#" data-filter=".translation" data-wow-delay="0.4s">Translation</a></li>
                  <li><a class="wow fadeInUp" href="#" data-filter=".localization" data-wow-delay="0.6s">Localization</a></li>
                  <li><a class="wow fadeInUp" href="#" data-filter=".internationalization" data-wow-delay="0.2s">Internationalization</a></li>
                  <li><a class="wow fadeInUp" href="#" data-filter=".transcription" data-wow-delay="0.4s">Transcription</a></li>
                  <li><a class="wow fadeInUp" href="#" data-filter=".voiceover" data-wow-delay="0.6s">Voiceover</a></li>
                </ul>
              </div>
            </div>
            <ul class="works-grid works-grid-gut works-grid-3 works-hover-d" id="works-grid">
              <li class="work-item "><a href="<?php echo base_url() ?>language-jobs.php">
                  <div class="work-image portal"><img src="<?php echo base_url(); ?>assets/images/services/portal.png" alt="Job Portal"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">LangJobs Job Portal</h3>
                    <div class="work-descr"></div>
                  </div></a></li>
              <li class="work-item "><a href="<?php echo base_url() ?>interpretation-services.php">
                  <div class="work-image interpretation"><img src="<?php echo base_url(); ?>assets/images/services/interpretation.jpg" alt="interpretation services"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">Interpretation Services</h3>
                    <div class="work-descr"></div>
                  </div></a></li>
              <li class="work-item "><a href="<?php echo base_url() ?>recruitment-services.php">
                  <div class="work-image recruitment"><img src="<?php echo base_url(); ?>assets/images/services/recruit.jpg" alt="recruitment-services"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">Recruitment Services</h3>
                    <div class="work-descr"></div>
                  </div></a></li>
              <li class="work-item "><a href="<?php echo base_url() ?>language-training.php">
                  <div class="work-image training"><img src="<?php echo base_url(); ?>assets/images/services/lang_training.jpg" alt="language-training"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">Language Training</h3>
                    <div class="work-descr"></div>
                  </div></a></li>
              <li class="work-item "><a href="<?php echo base_url() ?>translation-services.php">
                  <div class="work-image translation"><img src="<?php echo base_url(); ?>assets/images/services/translation.jpg" alt="translation-services"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">Translation Services</h3>
                    <div class="work-descr"></div>
                  </div></a></li>
              <li class="work-item "><a href="<?php echo base_url() ?>localization-services.php">
                  <div class="work-image localization"><img src="<?php echo base_url(); ?>assets/images/services/localization.jpg" alt="localization-service"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">Localization Services</h3>
                    <div class="work-descr"></div>
                  </div></a>
              </li>
              <li class="work-item "><a href="<?php echo base_url() ?>internationalization-services.php">
                  <div class="work-image internationalization"><img src="<?php echo base_url(); ?>assets/images/services/international.jpg" alt="internationalization services"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">Internationalization Services</h3>
                    <div class="work-descr"></div>
                  </div></a>
              </li>
              <li class="work-item "><a href="<?php echo base_url() ?>voiceover-services.php">
                  <div class="work-image voiceover"><img src="<?php echo base_url(); ?>assets/images/services/voice.jpg" alt="voiceover-services"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">Voice Over Services</h3>
                    <div class="work-descr"></div>
                  </div></a>
              </li>
              <li class="work-item "><a href="<?php echo base_url() ?>transcription-services.php">
                  <div class="work-image transcription"><img src="<?php echo base_url(); ?>assets/images/services/transcription.jpg" alt="transcription services"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">Transcription Services</h3>
                    <div class="work-descr"></div>
                  </div></a>
              </li>
            </ul>
          </div>
        </section>
        <section class="module-small bg-dark" data-background="<?php echo base_url(); ?>assets/images/small_sections/contact.png">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-md-8 col-lg-6">
                <div class="callout-text font-alt">
                  <h3 class="callout-title">We would like to hear you</h3>
                  <p>We are always open to interesting conversations.</p>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-5">
                <div class="callout-btn-box"><a style="background-color:white;" class="btn btn-w btn-round" href="<?php echo base_url() ?>contact.php">Drop us a line or two</a></div>
              </div>
            </div>
          </div>
        </section>
        <hr class="divider-w">
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <h4 class="font-alt mb-30">Frequently Asked Questions</h4>
                <div class="panel-group" id="accordion">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title font-alt"><a data-toggle="collapse" data-parent="#accordion" href="#support1">How to search job on langjobs.com</a></h4>
                    </div>
                    <div class="panel-collapse collapse in" id="support1">
                      <div class="panel-body">You can search job by either using search tool on our home page, or you can go to <a href="<?php echo base_url() ?>SearchJob">Advance Search Section</a>. 
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title font-alt"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#support2">How do I apply on any job?</a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="support2">
                      <div class="panel-body">We give you the ability to search your favourite job and read the details about it. To apply on them you'll have to <a href="<?php echo base_url() ?>LangExpert">Register / Login</a> as a jobseeker first.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title font-alt"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#support3">I want to recruit, how should I go about that?</a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="support3">
                      <div class="panel-body">Since you want to recruit, you'll have to <a href="<?php echo base_url() ?>LangEmployer">Register</a> with us, as a recruiter, then just post your job description.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title font-alt"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#support4">I want to download CV's of some candidates.</a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="support4">
                      <div class="panel-body">To be able to download the CV's of aspiring Job seekers, you'll have be to authorised as our premium recruiter. To gain the same, just give us a call or <a href="<?php echo base_url() ?>contact.php">contact us</a>.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <h4 class="font-alt mb-30">Our Expertises</h4>
                <h6 class="font-alt"><span class="icon-tools-2"></span> Language Recruitment
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="100" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-strategy"></span> Language Translation
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="100" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-target"></span> Language Training
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="100" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-camera"></span> Interpretation
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="100" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-pencil"></span> Internationalization
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="100" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-lifesaver"></span> Voice Over
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="100" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php if($grubs){ ?>
        <section class="module bg-dark-60 pt-0 pb-0 parallax-bg testimonial" data-background="<?php echo base_url() ?>assets/img/testimonial.jpg">
          <div class="testimonials-slider pt-140 pb-140">
            <ul class="slides">
             <?php
            foreach($grubs as $g){ ?>
              <li>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="module-icon"><span class="icon-quote"></span></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                      <blockquote class="testimonial-text font-alt"><?php echo str_replace('\n', '', strip_tags($g->gb_text)); ?></blockquote>
                    </div>
                  </div>
                </div>
              </li>
              <?php } ?>
            </ul>
          </div>
        </section>
        <?php } ?>