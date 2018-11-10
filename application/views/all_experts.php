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

   .vm{
       float: right;
       background: transparent;
       color: #000;
       /*border-bottom:  solid #245194;
       border-left:  solid #ffffff;*/
    }

   .vm:after{
       content: "View Details";
       width: 100px;
       height: 0;
       position: absolute;
       bottom: 7px;
       right: 5px;
       color: #fff;
       font-size: bold;
       border-bottom: 22px solid #245194;
       border-left: 22px solid #ffffff;
   }

   .details, .name{
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
   }
       
   .eimg > img.img1.img-rounded{
        height: 66px;
        overflow-y: hidden;
   }

   @media (min-width: 992px) and (max-width: 1199px){
       .eimg > img.img1.img-rounded{
          height: 50px;
      }
       .well{
         height: 150px;   
       }
   }
  @media screen and (max-width: 450px) {
      .well{
          height: 150px;
      }

      .img1{
          height: 54px !important;
      }

      .vm:after{
          bottom: 4px !important;
        }
  }

  @media screen and (max-width: 767px) {

      .img1{
          height: 74px;
      }

      .vm:after{
          bottom: 10px;
          right: 13px;
        }
  }

  @media (min-width: 768px) and (max-width: 991px) {

      .vm:after{
          bottom: 29px;
          right: 9px;
        }
  }
    
 /* *
      *
      *
      TEMPORARY
      *
      *
      *
      */


</style>

<div class="main">&nbsp;</div><br/><br/>
<section class="module-small bg-dark" data-background="<?php echo base_url(); ?>assets/images/small_sections/blog.jpg">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-8 col-lg-6">
        <div class="callout-text font-alt">
          <h3 class="callout-title">Registered Language Experts</h3>
          <p>End of your search for linguists, translators, interpreters or language professionals.</p>
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
                            $lang_known = "";
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
                                                    $eimg_path = $e->image;
                                                } else {
                                                    if(!$e->image){
                                                        $eimg_path = base_url()."assets/1.png"; 
                                                    } else {
                                                        $eimg_path = base_url()."assets/uploads/experts/".$e->image;
                                                    }
                                                }
                                                //check if image is available on this path or not.
                                                if(@file_get_contents($eimg_path, 0, NULL, 0, 1)){
                                                    $eimg = $eimg_path;
                                                } else {
                                                    $eimg = base_url()."assets/1.png";
                                                }
                                            ?>
                                            <img src="<?php echo $eimg; ?>" class="img1 img-rounded" alt="<?php echo strtoupper(mb_substr($e->last_name, 0, 11, 'utf-8')); ?> - Language Expert at Langjobs.com " />
                                        </div>
                                        <div class="details col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <?php 
                                                if($e->expert_in){
                                                    $break_lang = explode(',',$e->expert_in);
                                                    foreach($break_lang as $b){
                                                        //corrected the search in array.
                                                        $key = array_search($b, array_column($languages, 'id'));
                                                        $lang_known .= $languages[$key]->name.", ";
                                                    }   
                                                }
                                            ?>
                                              <div class="profile">
                                                    <?php if($lang_known == "") $lang_known = "English,"; ?>
                                                    Languages: <?php echo $lang_known; ?>
                                                </div>
                                                <div class="exp">
                                                    Experience: <?php
                                                        if($e->total_exp){ 
                                                            echo strip_tags($this->config->config['job_exp'][$e->total_exp]); 
                                                        } else {
                                                            echo "Any";
                                                        }
                                                    ?>
                                                </div>
                                                <div class="skill">
                                                    Country: <?php 
                                                        if($e->country){ 
                                                            $key = array_search($e->country, array_column($countries, 'id'));
                                                            echo $countries[$key]->c_name;
                                                        }
                                                    ?>
                                                </div>
                                                <?php echo "<a href='".base_url()."Language_experts/profile/".$e->id."'><button class='vm btn btn-xs'>&nbsp;</button></a>"; ?>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                      <div class="col-md-8">&nbsp;</div>
                                      <div class="col-md-4"></div>
                                    </div> -->
                                </div>
                        <?php
                                                    $lang_known = "";
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