<style>
    #search{
        display:block;
        text-align:center;
    }
    .wrapper {
        border:1px solid transparent;
        display:inline-block;
    }
    .wrapper>button{
        padding: 8px 11px !important;
        margin-left: -5px;
    }
    </style>
       <nav id="main_menu" class="navbar navbar-custom navbar-fixed-top navbar-transparent" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="<?php echo $base_url; ?>">Langjobs.com</a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo $base_url; ?>"><i class="fa fa-home"></i>Home</a></li>
              <li class="dropdown"><a class="dropdown-toggle" href="<?php echo $base_url; ?>ProfessionalSolutions" data-toggle="dropdown"><i class="fa fa-th-list"></i>Services</a>
                <ul class="dropdown-menu">
                  <li class="dropdown"><a href="<?php echo $base_url; ?>language-jobs.php">Job Portal</a></li>
                  <li class="dropdown"><a href="<?php echo $base_url; ?>recruitment-services.php">Recruitment</a></li>
                  <li class="dropdown"><a href="<?php echo $base_url; ?>translation-services.php">Translation</a></li>
                  <li class="dropdown"><a href="<?php echo $base_url; ?>interpretation-services.php">Interpretation</a></li>
                  <li class="dropdown"><a href="<?php echo $base_url; ?>localization-services.php">Localization</a></li>
                  <li class="dropdown"><a href="<?php echo $base_url; ?>internationalization-services.php">Internationalization</a></li>
                  <li class="dropdown"><a href="<?php echo $base_url; ?>transcription-services.php">Language Transcription</a></li>
                  <li class="dropdown"><a href="<?php echo $base_url; ?>voiceover-services.php">Voice-over</a></li>
                  <li class="dropdown"><a href="<?php echo $base_url; ?>language-training.php">Language Training</a></li>
                  <li class="dropdown"><a href="<?php echo $base_url; ?>toptenreasons.php">Why chose Langjobs?</a></li>
                </ul>
              </li>
              <li><a href="<?php echo $base_url; ?>Language_experts"><i class="fa fa-users"></i>Language Experts</a></li>
              <li><a href="<?php echo $base_url; ?>Blogs"><i class="fa fa-users"></i>Blogs</a></li>
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-th-list"></i>Login</a>
                <ul class="dropdown-menu">
                  <li class="dropdown"><a href="<?php echo $base_url;?>LangExpert">Language Expert</a></li>
                  <li class="dropdown"><a href="<?php echo $base_url;?>LangEmployer">Language Employer</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form" id="search"s autocomplete="off" action="<?php echo $base_url ?>SearchJob/retrieve_jobs" method="post">
                <div class="wrapper">
                    <input type="hidden" name="language" value="" />
                    <input type="hidden" name="sector" value="" />
                    <input type="hidden" name="locationCombo" value="" />
                    <input type="hidden" name="experience" value="" />
                    <input type="text" name="keywords" class="form-control" placeholder="Search Job"/>
                    <button class="btn btn-xs btn-danger"><i class="fa fa-search"></i></button>
                </div>
            </form>
          </div>
        </div>
      </nav>