<style>
    input#index_search_box{
        background-color: transparent;
        color: white;
        border: 1px solid;
        border-radius: 5px;
        width: 35%;
        font-size: 16px;
        background-image: url('./assets/images/search_icon_white.png');
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
        color: #fff;
        opacity: 1; /* Firefox */
    }

    input#index_search_box:-ms-input-placeholder { /* Internet Explorer 10-11 */
        color: #fff;
    }

    input#index_search_box::-ms-input-placeholder { /* Microsoft Edge */
        color: #fff;
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
</style>
<section class="home-section home-parallax home-fade home-full-height bg-dark-60 agency-page-header" id="home" data-background="<?php echo base_url() ?>assets/images/LJ2.jpg">
<div class="titan-caption">
  <div class="caption-content">
    <div class="font-alt mb-30 titan-title-size-1" style="display:none;">Build your career in Language</div>
    <div class="font-alt mb-40 titan-title-size-2" style="display:none;"> We Provide <br/><span class="rotate"> Career Services | Translation Services | Transcription Services | Language Specific Services</span>
    </div>
      <form autocomplete="off" action="<?php echo base_url() ?>SearchJob/retrieve_jobs" method="post">
        <input type="hidden" name="language" value="" />
        <input type="hidden" name="sector" value="" />
        <input type="hidden" name="locationCombo" value="" />
        <input type="hidden" name="experience" value="" />
        <input id="index_search_box" type="text" name="keywords" placeholder="Search Language Jobs">
        <input id="index_search_btn" type="submit" class="btn btn-border-w" value="Search"/>
      </form>
  </div>
</div>
</section>
      <div class="main">
        <section class="module">
          <div class="container">
            <div class="row multi-columns-row">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="features-item">
                  <div class="features-icon"><span class="icon-search"></span></div>
                  <h3 class="features-title font-alt">Job and Employee Search</h3>We help both, 1. Language Experts to search for job & 2. Employers to find perfect candidate 
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="features-item">
                  <div class="features-icon"><span class="fa fa-language"></span></div>
                  <h3 class="features-title font-alt">Translation Services</h3>We carefully listen to your requests and help you in receiving best translation work you can ever find.
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="features-item">
                  <div class="features-icon"><span class="icon-briefcase"></span></div>
                  <h3 class="features-title font-alt">Recruitment Services</h3>We not only help you in finding candidates online but we can help you in recruiting services too.
                </div>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="features-item">
                  <div class="features-icon"><span class="fa fa-comments-o"></span></div>
                  <h3 class="features-title font-alt">Interpretation</h3>Just 4 words, "Our interpretors are best". We make sure that you always get value for money interpretation.
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
                <div class="col-sm-12">
                  <h2 class="module-title font-alt align-left">About Us</h2>
                  <div class="module-subtitle font-serif align-left">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</div>
                  <p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>
                  <p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.</p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="module pb-0" id="works">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Our Works</h2>
                <div class="module-subtitle font-serif"></div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <ul class="filter font-alt" id="filters">
                  <li><a class="current wow fadeInUp" href="#" data-filter="*">All</a></li>
                  <li><a class="wow fadeInUp" href="#" data-filter=".training" data-wow-delay="0.2s">Training</a></li>
                  <li><a class="wow fadeInUp" href="#" data-filter=".interpretation" data-wow-delay="0.4s">Interpretation</a></li>
                  <li><a class="wow fadeInUp" href="#" data-filter=".recruitment" data-wow-delay="0.6s">Recruitment</a></li>
                </ul>
              </div>
            </div>
            <ul class="works-grid works-grid-gut works-grid-3 works-hover-d" id="works-grid">
              <li class="work-item interpretation webdesign"><a href="#">
                  <div class="work-image"><img src="<?php echo base_url(); ?>assets/img/front_album/interprete1.JPG" alt="Portfolio Item"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">Langjobs</h3>
                    <div class="work-descr">Corporate and Personal Language Training</div>
                  </div></a></li>
              <li class="work-item recruitment"><a href="#">
                  <div class="work-image"><img src="<?php echo base_url(); ?>assets/img/front_album/recruitment.jpg" alt="Portfolio Item"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">Corporate Training</h3>
                    <div class="work-descr">In the midst of Client's Office Training</div>
                  </div></a></li>
              <li class="work-item training"><a href="#">
                  <div class="work-image"><img src="<?php echo base_url(); ?>assets/img/front_album/training.JPG" alt="Portfolio Item"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">Langjobs</h3>
                    <div class="work-descr">Corporate and Personal Language Training</div>
                  </div></a></li>
              <li class="work-item recruitment training"><a href="#">
                  <div class="work-image"><img src="<?php echo base_url(); ?>assets/img/front_album/recruitment_2.jpg" alt="Portfolio Item"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">Langjobs</h3>
                    <div class="work-descr">Corporate and Personal Language Training</div>
                  </div></a></li>
              <li class="work-item training"><a href="#">
                  <div class="work-image"><img src="<?php echo base_url(); ?>assets/img/front_album/training2.JPG" alt="Portfolio Item"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">Langjobs</h3>
                    <div class="work-descr">Corporate and Personal Language Training</div>
                  </div></a></li>
              <li class="work-item training recruitment"><a href="#">
                  <div class="work-image"><img src="<?php echo base_url(); ?>assets/img/front_album/training3.JPG" alt="Portfolio Item"/></div>
                  <div class="work-caption font-alt">
                    <h3 class="work-title">Langjobs</h3>
                    <div class="work-descr">Corporate and Personal Language Training</div>
                  </div></a></li>
            </ul>
          </div>
        </section>
        <section class="module-small bg-dark" data-background="<?php echo base_url(); ?>assets/images/small_sections/contact.png">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-md-8 col-lg-6 col-lg-offset-2">
                <div class="callout-text font-alt">
                  <h3 class="callout-title">Want to contact us?</h3>
                  <p>We are always open to interesting conversations.</p>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="callout-btn-box"><a class="btn btn-w btn-round" href="">Drop us a line or two</a></div>
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
                      <div class="panel-body">You can search job by either using search tool on our home page, or you can go to <a href="">Advance Search Section</a>. 
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title font-alt"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#support2">How do I apply on any job?</a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="support2">
                      <div class="panel-body">We give you the ability to search your favourite job and read the details about it. To apply on them you'll have to Register / Login as a jobseeker first.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title font-alt"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#support3">I want to recruit, how should I go about that?</a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="support3">
                      <div class="panel-body">Since you want to recruit, you'll have to <a href="login.php">Register</a> with us, as a recruiter, then just post your job description.
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title font-alt"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#support4">I want to download CV's of some candidates.</a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="support4">
                      <div class="panel-body">To be able to download the CV's of aspiring Job seekers, you'll have be to authorised as our premium recruiter. To gain the same, just give us a call or <a href="">contact us</a>.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <h4 class="font-alt mb-30">Our Expertises</h4>
                <h6 class="font-alt"><span class="icon-tools-2"></span> Language Training
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="100" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-strategy"></span> Language Transcription
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="95" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-target"></span> Localization
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="93" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-camera"></span> Voice Over
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="88" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-pencil"></span> Internationalization
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="91" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
                <h6 class="font-alt"><span class="icon-lifesaver"></span> Dedication
                </h6>
                <div class="progress">
                  <div class="progress-bar pb-dark" aria-valuenow="100" role="progressbar" aria-valuemin="0" aria-valuemax="100"><span class="font-alt"></span></div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="module bg-dark-60 pt-0 pb-0 parallax-bg testimonial" data-background="<?php echo base_url() ?>assets/img/testimonial.jpg">
          <div class="testimonials-slider pt-140 pb-140">
            <ul class="slides">
             <?php foreach($grubs as $g){ ?>
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