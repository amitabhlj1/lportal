<link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
<style>
    .well{
        font-family: 'Josefin Slab', cursive;
        border: 1px solid;
        padding: 1%;
        height: 185px;
        border-radius: 2px;
        background-color: #f95c39;
        color: #fff;
    }
    .ename{
        font-size: 140%;
    }
</style>
<div class="main">&nbsp;</div><br/><br/>
<section class="module-small bg-dark" data-background="<?php echo base_url(); ?>assets/images/small_sections/blog.jpg">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-8 col-lg-6 col-lg-offset-2">
        <div class="callout-text font-alt">
          <h3 class="callout-title">Langjobs Language Experts</h3>
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
                    <legend>
                        Language Experts at Langjobs
                    </legend>
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
                                                    <?php if($e->profile_name){echo mb_substr($e->profile_name, 0, 38, 'utf-8');} else { echo "N.A.";} ?>
                                                </div>
                                                <div class="exp">
                                                    <?php if($e->total_exp){ echo $this->config->config['job_exp'][$e->total_exp]; } else {echo "N.A.";} ?>
                                                </div>
                                                <div class="skill">
                                                    <?php if($e->skills){echo mb_substr($e->skills, 0, 38, 'utf-8');} else {echo "Language Expert";}; ?>
                                                </div>
                                               <?php echo "<a href='".base_url()."All_experts/profile/".$e->id."'><button class='btn btn-xs btn-primary form-control'>View More</button></a>"; ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</section>