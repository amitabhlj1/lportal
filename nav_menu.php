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
              <li><a href="<?php echo $base_url; ?>ProfessionalSolutions"><i class="fa fa-th-list"></i>Services</a></li>
              <li><a href="<?php echo $base_url; ?>Language_experts"><i class="fa fa-users"></i>Language Experts</a></li>
              <li><a href="<?php echo $base_url; ?>Translation"><i class="fa fa-language"></i>Free Translation</a></li>	
              <li><a rel="canonical" href="<?php echo $base_url; ?>Blogs"><i class="fa fa-book"></i>Blogs</a></li>
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-sign-in"></i>Login</a>
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