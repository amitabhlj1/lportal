<style>
    .alt-features-item{
        margin: 20px 0px 0px 0px !important;
    }
    .messages{
        height: 30em;
        max-height: 50em;
        border: 1px solid;
        overflow-y: auto;
        overflow-x: hidden;
    }
    .chat_div form{
        margin-top: 5px;
        border: 1px solid;
    }
    #msg>span
    {
        display: inline-block;
        max-width: 80%;
        background-color: #7872a5;
        padding: 5px;
        border-radius: 4px;
        position: relative;
        border-width: 1px;
        border-style: solid;
        border-color: grey;
        margin: 2%;
        color: #fff;
    }

    #msg>.left
    {
        float: left;
    }

    #msg>span.left:after
    {
        content: "";
        display: inline-block;
        position: absolute;
        left: -8.5px;
        top: 7px;
        height: 0px;
        width: 0px;
        border-top: 8px solid transparent;
        border-bottom: 8px solid transparent;
        border-right: 8px solid #7872a5;
    }

    #msg>span.left:before
    {
        content: "";
        display: inline-block;
        position: absolute;
        left: -9px;
        top: 7px;
        height: 0px;
        width: 0px;
        border-top: 8px solid transparent;
        border-bottom: 8px solid transparent;
        border-right: 8px solid black;
    }

    #msg>span.right:after
    {
        content: "";
        display: inline-block;
        position: absolute;
        right: -8px;
        top: 6px;
        height: 0px;
        width: 0px;
        border-top: 8px solid transparent;
        border-bottom: 8px solid transparent;
        border-left: 8px solid #d49626;
    }

    #msg>span.right:before
    {
        content: "";
        display: inline-block;
        position: absolute;
        right: -9px;
        top: 6px;
        height: 0px;
        width: 0px;
        border-top: 8px solid transparent;
        border-bottom: 8px solid transparent;
        border-left: 8px solid black;
    }

    #msg>span.right
    {
        float: right;
        background-color: #d49626;
    }

    #msg>.clear
    {
        clear: both;
    }
    #msg::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
        border-radius: 10px;
    }

    #msg::-webkit-scrollbar
    {
        width: 5px;
        background-color: #F5F5F5;
    }

    #msg::-webkit-scrollbar-thumb
    {
        background-color: #000000;
    }
</style>
<?php
    $jd = $jobs[0];
    $comp = $company_details[0];
?>
<section class="module" id="services">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">
                   <?php 
                        if($jd->title){
                            echo $jd->title;
                        } else {
                            echo "NA";
                        }
                    ?>
                </h2>
                <div class="module-subtitle font-serif" style="display:none;"></div>
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
                                <div class="messages" id="msg">
                                    <?php
                                        if($comments){
                                        foreach($comments as $c){ 
                                            if($c->sender == 1){ ?>
                                                <span class="left"><?php echo "<img width='30' height='30' class='img img-circle' src='".base_url()."assets/uploads/employer/".$comp->company_logo."'> &nbsp;$c->comment"; ?>
                                                <br/>
                                                <small><i class="fa fa-clock-o"></i> <?php echo date('d F Y', strtotime($c->created)); ?></small>
                                                </span>
                                                <div class="clear"></div>
                                            <?php
                                            } else {
                                                if($this->session->userdata('social_login') == 1){
                                                    $eimg = $this->session->userdata('image');
                                                } else {
                                                    if(!$this->session->userdata('image')){
                                                        $eimg = base_url()."assets/1.png"; 
                                                    } else {
                                                        $eimg = base_url()."assets/uploads/experts/".$this->session->userdata('image');
                                                    }
                                                } ?>
                                                <span class="right"><?php echo "$c->comment &nbsp; <img class='img img-circle' width='30' height='30' src='$eimg'/>"; ?>
                                                <br/>
                                                <small><i class="fa fa-clock-o"></i> <?php echo date('d F Y', strtotime($c->created)); ?></small>
                                                </span>
                                                <div class="clear"></div>
                                            <?php
                                            }
                                        }
                                        } else {
                                            echo "<span>Hello from langecole, Your application has been sent to the employer. Please, Wait for the employer's message......</span>";
                                        }
                                    ?>
                                </div>
                               <form class="form" action="<?php echo base_url(); ?>searchproject/addcomment" method="post">
                                   <textarea class="form-control" name="comment" placeholder="Your text here.. (use less than 300 characters)" maxlength="300"></textarea>
                                   <input type="hidden" value="<?php echo $jd->id; ?>" name="job_id" />
                                   <input type="hidden" value="<?php echo $comp->id; ?>" name="company_id" />
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
                                        echo $jd->skills;
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
                    a2a_config.linkurl = "<?php echo base_url() ?>SearchProject/jobdesc/<?php echo $jd->id; ?>";
                </script>
                <script async src="https://static.addtoany.com/menu/page.js"></script>      
        <?php    
            }
        ?>
        <div class="row">
           <div class="col-md-12 col-xs-12 col-md-12 col-lg-12">
              <?php
                    if(!$this->session->userdata('exp_id')){
                        echo "<a href='".base_url("LangExpert")."' class='btn btn-primary btn-xs form-control'><b>Please login as a language expert to apply to this Job</b></a>";
                    } else {
                        if(is_array($chk)){
                            echo "<button class='btn btn-warning btn-xs form-control disabled'>You have already applied to this job!</button>";
                        } else {
                            //sending parameters jobid then companyid
                            echo "<a href='".base_url()."Expert/apply_proj/".$jd->id."/".$comp->id."' class='btn btn-primary btn-xs form-control'>Apply to this job</a>";
                        }
                    }
               ?>
           </div>            
        </div>
    </div>
</section>
<script>
    var objDiv = document.getElementById("msg");
    objDiv.scrollTop = objDiv.scrollHeight;
</script>