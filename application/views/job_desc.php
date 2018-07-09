<style>
    .alt-features-item{
        margin: 20px 0px 0px 0px !important;
    }
</style>
<?php
    $jd = $jobs[0];
?>
<section class="module" id="services">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt"><?php 
                            
                            if($jd->title){
                                echo $jd->title;
                            } else {
                                echo "NA";
                            }
                        ?></h2>
                <div class="module-subtitle font-serif" style="display:none;">
                    <?php   //random motivation line, reading from a text file and displaying here 
                            $file = base_url("assets/motivation.txt");
                            $lines = explode("\n", file_get_contents($file));
                            echo $line = $lines[mt_rand(0, count($lines) - 1)];
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <fieldset>
                <legend>Employer Details</legend>
                <div class="alt-features-item">
                    <div class="alt-features-icon"><span class="icon-briefcase"></span></div>
                    <h3 class="alt-features-title font-alt">Recruiter</h3> 
                    <?php
                        $comp = $company_details[0];
                        if($comp->company_name){
                            echo $comp->company_name;
                        } else {
                            echo "N.A.";
                        }
                    ?>
                </div>
                <div class="alt-features-item">
                    <div class="alt-features-icon"><span class="icon-book-open"></span></div>
                    <h3 class="alt-features-title font-alt">Recruiter Profile</h3>
                    <p style="text-align:justify;"><?php 
                        if($comp->company_description){
                            echo $comp->company_description;
                        } else {
                            echo "NA";
                        } 
                    ?>
                    </p>
                </div>
                <div class="alt-features-item" style="padding-bottom:20px;">
                    <div class="alt-features-icon"><span class="icon-global"></span></div>
                    <h3 class="alt-features-title font-alt">Web Address</h3>
                    <?php echo "<a href='".$comp->company_website."' target='_blank'>".$comp->company_website."</a>"; ?>
                </div>
                </fieldset>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <fieldset>
                <legend>Job Details <small style="font-size:9px;padding-left:2em;">[Expires On: <?php echo date("M jS, Y", strtotime($jd->last_date)); ?>]</small></legend>
                <div class="alt-features-item">
                    <div class="alt-features-icon"><span class="icon-clipboard"></span></div>
                    <h3 class="alt-features-title font-alt">Job Description</h3>
                    <p style="text-align:justify;"><?php 
                        if($jd->description){
                            echo $jd->description;
                        } else {
                            echo "NA";
                        }   
                    ?></p>
                </div>
                <div class="alt-features-item">
                    <div class="alt-features-icon"><span class="icon-target"></span></div>
                    <h3 class="alt-features-title font-alt">Desired Profile</h3>
                    <p style="text-align:justify;"><?php 
                            if($jd->skills){
                                echo "<b>Skills:</b> ".$jd->skills."<br/>";
                            }  
                        ?></p>
                </div>
                </fieldset>
            </div>
        </div>
        <div class="row multi-columns-row">
            <div class="col-md-1 col-sm-6 col-xs-12">
                &nbsp;
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="features-item">
                    <div class="features-icon"><span class="icon-linegraph"></span></div>
                    <h3 class="features-title font-alt">Experience</h3>
                    <p><?php if($jd->total_exp){echo $this->config->config['job_exp'][$jd->total_exp];} else { echo "N.A"; } ?></p>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="features-item">
                    <div class="features-icon"><i class="fa fa-language"></i></div>
                    <h3 class="features-title font-alt">Language</h3>
                    <p style="text-align:center;"><?php
                        if($jd->languages){
                            $langs = explode(',', $jd->languages);
                            $list_lang = array();
                            foreach($langs as $l){
                                $lng = $this->My_model->selectRecord('language', '*', array('id' => $l));
                                array_push($list_lang, $lng[0]->name);
                            }
                            echo implode(', ', $list_lang);
                        } else {
                            echo "N.A.";
                        }
                        ?></p>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="features-item">
                    <div class="features-icon"><i class="fa fa-phone-square"></i></div>
                    <h3 class="features-title font-alt">Contact</h3>
                    <p style="text-align:center;"><?php 
                        if($comp->mobile){
                            echo $comp->mobile;
                        } else {
                            echo "NA";
                        }
                    ?></p>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="features-item">
                    <div class="features-icon"><span class="icon-map-pin"></span></div>
                    <h3 class="features-title font-alt">Location</h3>
                    <p style="text-align:center;"><?php 
                        if($jd->address){
                            echo $jd->address;
                        } else {
                            echo "N.A.";
                        }
                    ?></p>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="features-item">
                    <div class="features-icon"><i class="fa fa-th-list"></i></div>
                    <h3 class="features-title font-alt">Job Feild</h3>
                    <p style="text-align:center;"><?php 
                        if($jd->j_category){
                            $ctry = $this->My_model->selectRecord('job_category', '*', array('id' => $jd->j_category));
                            echo $ctry[0]->cat_name;
                        }
                    ?></p>
                </div>
            </div>
        </div>
        <div class="row">
           <div class="col-md-12 col-xs-12 col-md-12 col-lg-12">
              <?php
                    if(!$this->session->userdata('exp_id')){
                        echo "<a href='".base_url("LangExpert")."' class='btn btn-primary btn-xs form-control'><b>Please login as a language expert to apply to this Job</b></a>";
                    } else {
                        //checking if already applied 
                        $chk = $this->My_model->selectRecord('job_apply', '*', array('job_id' => $jd->id, 'expert_id' => $this->session->userdata('exp_id')));
                        if(is_array($chk)){
                            echo "<button class='btn btn-warning btn-xs form-control disabled'>You have already applied to this job!</button>";
                        } else {
                            //sending parameters jobid then companyid
                            echo "<a href='".base_url()."Expert/apply_job/".$jd->id."/".$comp->id."' class='btn btn-primary btn-xs form-control'>Apply to this job</a>";
                        }
                    }
               ?>
           </div>            
        </div>
    </div>
</section>
<!-- AddToAny BEGIN -->
<div id="shr2" class="a2a_kit a2a_kit_size_32  a2a_floating_style a2a_vertical_style" data-a2a-scroll-show="200" style="left:0px; top:150px;">
    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
    <a class="a2a_button_facebook"></a>
    <a class="a2a_button_twitter"></a>
    <a class="a2a_button_linkedin"></a>
    <a class="a2a_button_google_plus"></a>
    <a class="a2a_button_whatsapp"></a>
    <a class="a2a_button_copy_link"></a>
</div>
<script>
    var a2a_config = a2a_config || {};
    a2a_config.linkurl = "<?php echo base_url() ?>SearchJob/jobdesc/<?php echo $jd->id; ?>";
</script>
<script async src="https://static.addtoany.com/menu/page.js"></script>