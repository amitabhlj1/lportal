<!--<link href="https://fonts.googleapis.com/css?family=Comfortaa|Crete+Round|Montserrat|Raleway|Baloo+Tamma|NTR" rel="stylesheet">-->
   <style>
    .well{
        border: 1px solid blue;
        padding: 1%;
        height: 167px;
        border-radius: 2px;
        background-color: #fff;
        color: #000;
    }
    .ename{
        font-size: 140%;
    }
   .name{
        font-family: 'Montserrat', sans-serif;
        font-weight: bold;
   }
/*
    .callout-title{
        font-size: 30px;
        font-family: 'Raleway', sans-serif;
    }
   .callout-text > p{
        font-family: 'Baloo Tamma', 'Roboto';
        font-size: 15px;
        color: #e4ff00;
   }
*/
   .vm{
       float: right;
       background: transparent;
       position: relative;
       color: #000;
   }
   .vm:after{
       content: "View Details";
       width: 100px;
       height: 0;
       position: absolute;
       bottom: -1px;
       right: -12px;
       color: #fff;
       font-size: bold;
       border-bottom: 22px solid #245194;
       border-left: 22px solid #ffffff;
   }
</style>
<div class="main">&nbsp;</div><br/><br/>
<section class="module-small bg-dark" data-background="<?php echo base_url(); ?>assets/images/small_sections/blog.jpg">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-8 col-lg-6">
        <div class="callout-text font-alt">
          <h3 class="callout-title">LangJobs Language Experts</h3>
          <p>End of your search for language experts</p>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-2">
        &nbsp;
      </div>
    </div>
  </div>
</section>

<section class="module" style="padding:40px 0px;">
    <div class="container">
        <div class="row">
            <div class="mb-sm-20 wow fadeInUp col-md-12 col-sm-12 col-xs-12 table-responsive">
                <fieldset>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                        <?php
                            foreach($experts as $e){ ?>
                                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 well">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8 ename">
                                            <div class="name">
                                                <?php echo strtoupper(mb_substr($e->last_name." ".$e->first_name, 0, 11, 'utf-8')); ?>
                                            </div>
                                        </div>
                                        <div class="eimg col-lg-4 col-sm-4 col-md-4 col-xs-4">
                                            <?php
                                                if($e->social_login == 1){
                                                    $eimg = $e->image;
                                                } else {
                                                    if(!$e->image){
                                                        $eimg = base_url()."assets/1.png"; 
                                                    } else {
                                                        $eimg = base_url()."assets/uploads/experts/".$e->image;
                                                    }
                                                }              
                                            ?>
                                            <img src="<?php echo $eimg; ?>" class="img-rounded"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                              <div class="profile">
                                                    <?php if($e->profile_name){echo strip_tags(mb_substr($e->profile_name, 0, 38, 'utf-8'));} else { echo "N.A.";} ?>
                                                </div>
                                                <div class="exp">
                                                    <?php if($e->total_exp){ echo strip_tags($this->config->config['job_exp'][$e->total_exp]); } else {echo "N.A.";} ?>
                                                </div>
                                                <div class="skill">
                                                    <?php if($e->skills){echo strip_tags(mb_substr($e->skills, 0, 38, 'utf-8'));} else {echo "Language Expert";}; ?>
                                                </div>
                                               <?php echo "<a href='".base_url()."Language_experts/profile/".$e->id."'><button class='vm btn btn-xs'>View More</button></a>"; ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                    <div style="float:right;">
                        <a rel="canonical" style="color:white;" href="<?php echo base_url(); ?>Language_experts/cards/<?php if($page==1){echo "";} else{ echo $page-1;} ?>"><button <?php if($page==1) {echo "disabled";} ?> class="btn btn-xs btn-warning"> < </button></a> 
                        &nbsp; 
                        <a rel="canonical" style="color:white;" href="<?php echo base_url(); ?>Language_experts/cards/<?php echo $page+1; ?>" <button class="btn btn-xs btn-primary"> > </button> </a>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</section>