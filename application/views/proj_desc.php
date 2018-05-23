<style>
    .alt-features-item{
        margin: 20px 0px 0px 0px !important;
    }
</style>
<section class="module" id="services">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">PROJECT DESCRIPTION</h2>
                <div class="module-subtitle font-serif">
                    <?php   //random motivation line, reading from a text file and displaying here 
                            $file = base_url("assets/motivation.txt");
                            $lines = explode("\n", file_get_contents($file));
                            echo $line = $lines[mt_rand(0, count($lines) - 1)];
                            $jd = $jobs[0];
                            $comp = $company_details[0];
                    ?>
                </div>
            </div>
        </div>
        <?php 
            //checking if already applied 
            $chk = $this->My_model->selectRecord('job_apply', '*', array('job_id' => $jd->id, 'expert_id' => $this->session->userdata('exp_id')));
            if(is_array($chk)){ ?>
               <div class="row">
                  <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                       <fieldset>
                           <legend>Employer's Message</legend>
                           <div class="chat_div">
                                <div class="messages">
                                    
                                </div>
                               <form class="form" action="" method="post">
                                   <textarea class="form-control"></textarea>
                                   <button class="form-control btn btn-primary" type="submit"><i class="fa fa-send"></i> Send</button>
                               </form>
                           </div>
                       </fieldset>
                   </div>
                   <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                       <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <fieldset>
                                <legend>Employer Details</legend>
                                <div class="alt-features-item">
                                    <div class="alt-features-icon"><span class="icon-briefcase"></span></div>
                                    <h3 class="alt-features-title font-alt">Recruiter</h3> 
                                    <?php
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
                                <legend>Job Details <small style="font-size:9px;padding-left:2em;">[Expires On: <?php  ?>]</small></legend>
                                <div class="alt-features-item">
                                    <div class="alt-features-icon"><span class="icon-pencil"></span></div>
                                    <h3 class="alt-features-title font-alt">Job Title</h3>
                                    <b><?php 
                                            if($jd->title){
                                                echo $jd->title;
                                            } else {
                                                echo "NA";
                                            }
                                        ?></b>
                                </div>
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
                                </fieldset>
                            </div>
                        </div>
                        <div class="row multi-columns-row">
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="features-item">
                                    <div class="features-icon"><span class="icon-target"></span></div>
                                    <h3 class="features-title font-alt">Desired Profile</h3>
                                    <p><?php 
                                            if($jd->skills){
                                                echo "<b>Skills:</b>";
                                                foreach(explode(',', $jd->skills) as $s){
                                                    $sk = $this->My_model->selectRecord('job_skills', '*', array('id' => $s));
                                                    echo $sk[0]->name.", ";
                                                }
                                                echo "<br/>";
                                            }   
                                        ?></p>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="features-item">
                                    <div class="features-icon"><span class="icon-linegraph"></span></div>
                                    <h3 class="features-title font-alt">Experience</h3>
                                    <p><?php if($jd->total_exp){echo $this->config->config['job_exp'][$jd->total_exp];} ?></p>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="features-item">
                                    <div class="features-icon"><i class="fa fa-language"></i></div>
                                    <h3 class="features-title font-alt">Language</h3>
                                    <p style="text-align:center;"><?php 
                                        if($jd->from_language || $jd->to_language){
                                            $lang1 = $this->My_model->selectRecord('language', '*', array('id' => $jd->from_language));
                                            $lang2 = $this->My_model->selectRecord('language', '*', array('id' => $jd->to_language));
                                            echo $lang1[0]->name." to ". $lang2[0]->name;
                                        } else {
                                            echo "Not specified";
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
                                    <div class="features-icon"><span class="fa fa-money"></span></div>
                                    <h3 class="features-title font-alt">Rate</h3>
                                    <p style="text-align:center;"><?php echo "$".$jd->work_rate."/".$this->config->config['job_units'][$jd->unit_name]." for ".$jd->unit_numbers." ".$this->config->config['job_units'][$jd->unit_name]; ?></p>
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
                   </div>
               </div>
        <?php 
            } else { ?>
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <fieldset>
                        <legend>Employer Details</legend>
                        <div class="alt-features-item">
                            <div class="alt-features-icon"><span class="icon-briefcase"></span></div>
                            <h3 class="alt-features-title font-alt">Recruiter</h3> 
                            <?php
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
                        <legend>Job Details <small style="font-size:9px;padding-left:2em;">[Expires On: <?php  ?>]</small></legend>
                        <div class="alt-features-item">
                            <div class="alt-features-icon"><span class="icon-pencil"></span></div>
                            <h3 class="alt-features-title font-alt">Job Title</h3>
                            <b><?php 
                                    if($jd->title){
                                        echo $jd->title;
                                    } else {
                                        echo "NA";
                                    }
                                ?></b>
                        </div>
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
                        </fieldset>
                    </div>
                </div>
                <div class="row multi-columns-row">
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="features-item">
                            <div class="features-icon"><span class="icon-target"></span></div>
                            <h3 class="features-title font-alt">Desired Profile</h3>
                            <p><?php 
                                    if($jd->skills){
                                        echo "<b>Skills:</b>";
                                        foreach(explode(',', $jd->skills) as $s){
                                            $sk = $this->My_model->selectRecord('job_skills', '*', array('id' => $s));
                                            echo $sk[0]->name.", ";
                                        }
                                        echo "<br/>";
                                    }   
                                ?></p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="features-item">
                            <div class="features-icon"><span class="icon-linegraph"></span></div>
                            <h3 class="features-title font-alt">Experience</h3>
                            <p><?php if($jd->total_exp){echo $this->config->config['job_exp'][$jd->total_exp];} ?></p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="features-item">
                            <div class="features-icon"><i class="fa fa-language"></i></div>
                            <h3 class="features-title font-alt">Language</h3>
                            <p style="text-align:center;"><?php 
                                if($jd->from_language || $jd->to_language){
                                    $lang1 = $this->My_model->selectRecord('language', '*', array('id' => $jd->from_language));
                                    $lang2 = $this->My_model->selectRecord('language', '*', array('id' => $jd->to_language));
                                    echo $lang1[0]->name." to ". $lang2[0]->name;
                                } else {
                                    echo "Not specified";
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
                            <div class="features-icon"><span class="fa fa-money"></span></div>
                            <h3 class="features-title font-alt">Rate</h3>
                            <p style="text-align:center;"><?php echo "$".$jd->work_rate."/".$this->config->config['job_units'][$jd->unit_name]." for ".$jd->unit_numbers." ".$this->config->config['job_units'][$jd->unit_name]; ?></p>
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
        <?php    
            }
        ?>
        <div class="row">
           <div class="col-md-12 col-xs-12 col-md-12 col-lg-12">
              <?php
                    if(!$this->session->userdata('exp_id')){
                        echo "<a href='".base_url("langexpert")."' class='btn btn-primary btn-xs form-control'><b>Please login as a language expert to apply to this Job</b></a>";
                    } else {
                        if(is_array($chk)){
                            echo "<button class='btn btn-warning btn-xs form-control disabled'>You have already applied to this job!</button>";
                        } else {
                            //sending parameters jobid then companyid
                            echo "<a href='".base_url()."expert/apply_proj/".$jd->id."/".$comp->id."' class='btn btn-primary btn-xs form-control'>Apply to this job</a>";
                        }
                    }
               ?>
           </div>            
        </div>
    </div>
</section>