<style>
    .well{
        border: 1px solid blue;
        padding: 1%;
        height: 154px;
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
       bottom: 1px;
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

   @media (min-width: 992px) and (max-width: 1199px){
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
.easyPaginateNav{
    text-align: center;
}
.easyPaginateNav a {
    display:inline-block;
    padding:0.3em 1em;
    margin:0 0.3em 0.3em 0;
    border-radius:0.15em;
    box-sizing: border-box;
    text-decoration:none;
    font-family:'Roboto',sans-serif;
    text-transform:uppercase;
    font-weight:400;
    color:#FFFFFF;
    background-color:#3369ff;
    box-shadow:inset 0 -0.6em 0 -0.35em rgba(0,0,0,0.17);
    text-align:center;
    position:relative;
}
.easyPaginateNav a.current {
    font-weight:bold;
    text-decoration:underline;
    background-color: skyblue;
    color: white;
}
</style>
<section class="content">
<!-- Main row -->
<div class="row">
   <div class="col-md-12">
		<section class="panel">
		  <header class="panel-heading">Found Expert(s): <b>"<?php if(is_array($experts)) {echo sizeof($experts);} ?>"</b> <span class="pull-right small"><a class="btn btn-xs btn-info" href='<?php echo base_url() ?>ado/Employer/searchExperts'><i class="fa fa-search"></i> Search Again</a></span></header>							
            <div id="easyPaginate" class="panel-body">
                <?php
                    if(is_array($experts) && sizeof($experts)>0){
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
                                        <img src="<?php echo $eimg; ?>" class="img1 img-rounded"/>
                                    </div>
                                    <div class="details col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="profile">
                                                <?php if($e->profile_name){echo strip_tags(mb_substr($e->profile_name, 0, 38, 'utf-8'));} else { echo "N.A.";} ?>
                                            </div>
                                            <div class="exp">
                                                <?php echo strip_tags($this->config->config['job_exp'][$e->total_exp]); ?>
                                            </div>
                                            <div class="skill">
                                                <?php if($e->skills){echo strip_tags(mb_substr($e->skills, 0, 34, 'utf-8'));} else {echo "Language Expert";}; ?>
                                            </div>
                                            <?php echo "<a target='_blank' href='".base_url()."ado/Employer/viewProfile/".$e->id."'><button class='vm btn btn-xs'>&nbsp;</button></a>"; ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                            } ?>
                    
                    <?php
                    } else {
                        echo "Sorry! No language experts were found using your search criteria. Try modifying it a bit.";
                    }
                ?>
            </div>
	    </section>
	</div><!--end col-6 -->
</div>	
</section><!-- /.content -->