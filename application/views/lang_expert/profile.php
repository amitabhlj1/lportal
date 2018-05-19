<style>
    
body { background:#ffffff;}
.module{padding: 80px 0; !important}
.page-header {background:#ccc;margin:0;}
.profile-head { width:100%;background-color: rgb(40, 47, 70);float: left;padding: 15px 5px;}
.profile-head img { height:220px; width:220px; margin:0 auto; border-radius:50%;}
.profile-head h5 {width: 100%;padding:5px 5px 0px 5px;text-align:justify;font-weight: bold;color: #fff;font-size: 25px;text-transform:capitalize;
margin-bottom: 0;}
.profile-head p {width: 100%;text-align: justify;padding:0px 5px 5px 5px;color: #fff;font-size:17px;text-transform:capitalize;margin:0;}
.profile-head a {width: 100%;text-align: center;padding: 10px 5px;color: #fff;font-size: 15px;text-transform: capitalize;}

.profile-head ul { list-style:none;padding: 0;}
.profile-head ul li { display:block; color:#ffffff;padding:5px;font-weight: 400;font-size: 15px;}
.profile-head ul li:hover span { color:rgb(0, 4, 51);}
.profile-head ul li span { color:#ffffff;padding-right: 10px;}
.profile-head ul li a { color:#ffffff;}
.profile-head h6 {width: 100%;text-align: center;font-weight: 100;color: #fff;font-size: 15px;text-transform: uppercase;margin-bottom: 0;}

fieldset.well{display:block; width:90%;overflow:auto;margin-left:4%;background-color:#fff;}
fieldset.well legend{color:#282f46;text-transform:uppercase;font-weight:bold;width:max-content;font-size: 100%;} 
.nav-tabs {margin: 0;padding: 5px 0 0 0;border: 0;}

.tab-pane {background: #ffffff;box-shadow: 0 0 4px rgba(0,0,0,.4);border-radius: 0;text-align: center;padding: 10px;}
.tab-content>.active {margin-top:10px;/*width:100% !important;*/} 

/* edit profile css*/
.rlabel{text-align:left;margin-left:-15px;width:max-content; background:rgb(40, 47, 70); padding: 0.5% 0.5% 0.5% 2.5%; color: white; border-left: 4px solid gold;}
    .smblock{
        border: 0.5px solid #eee;
        padding: 8px;
    }
.uppic{position: absolute;left: 42.5%;bottom: -4%;}
.loader2 {
  border: 8px solid #f3f3f3;
  border-radius: 50%;
  border-top: 8px solid #3498db;
  width: 20px;
  height: 20px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}
/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
   
h2.register { padding:10px 25px; text-transform:capitalize;font-size: 25px;color: rgb(255, 102, 0);}
.fom-main { overflow:hidden;}
p{margin-bottom: 0px;}
legend {color:#ff3200;border-bottom:0px solid;}
.main_form {background-color: #;}
label.control-label {font-weight: 100; margin-bottom:5px !important; 
text-align:left !important; text-transform:uppercase; color:#798288;}
.submit-button {color: #fff;background-color:rgb(255, 102, 0);width:190px;border: 0px solid;border-radius: 0px; transition:all ease 0.3s;margin: 5px;float:left;}
.submit-button:hover, .submit-button:focus {color: #fff;background-color:rgb(0, 4, 51);}
.hint_icon {color:#ff3200;}
.form-control:focus {border-color: #ff3200;}
select.selectpicker { color:#99999c;}
select.selectpicker option { color:#000 !important;}
select.selectpicker option:first-child { color:#99999c;}
.input-group { width:100%;}
.nav-menu div.active a {background-color: rgb(255, 102, 0) !important;}
.nav-menu div a{padding: 8px 0px;}
table{ width: 80% !important;}
table>tbody>tr>td{text-align: left;margin-left: 2%; border-top: none !important;}
table>thead>tr>th{font-size: 150%; border-bottom: 1px dotted; }
    .social_links{padding: 5px; font-size: 12px;}
@media all and (max-width:430px){
.profile-head ul li {font-size: 12px !important;}
.nav-menu li { width:50%;}
}
</style>
<section class="module">
<div class="container" >
    <div class="profile-head">
        <div class="col-md- col-sm-4 col-xs-12" id="preview">
            <?php
                if(!$usr[0]->social_login == 1){
                    $empPath = 'assets/uploads/experts/';
            ?>
             <img src="<?php if(!empty($usr[0]->image)){echo base_url().$empPath.$usr[0]->image;} else {echo base_url()."assets/1.png";} ?>" class="img-responsive" />
              <form id="imageform" action="<?php echo base_url(); ?>expert/upload_profile_image" method="post" enctype="multipart/form-data">
               <label class="btn btn-xs btn-primary uppic" id="imageloadbutton" title="Change Profile Image">
                <i class="fa fa-camera"></i> <input type="file" id="photoimg" name="photoimg" style="display: none;">
               </label>
               <div class="uppic loader2" id="imageloadstatus" style="display:none;"></div>
              </form>
            <?php
                } else { ?>
                <img src="<?php if(!empty($usr[0]->image)){echo $usr[0]->image;} else {echo base_url()."assets/1.png";} ?>" class="img-responsive" />
            <?php     
                }
            ?>
        </div>
        <!--col-md-4 col-sm-4 col-xs-12 close-->

        <div class="col-md-5 col-sm-5 col-xs-12">
            <h5><?php echo $usr[0]->first_name." ".$usr[0]->last_name; ?></h5>
            <p><span class="fa fa-bolt"></span> <?php if(!empty($usr[0]->profile_name)){ echo $usr[0]->profile_name; } else {echo "N.A.";}?></p>
            <ul>
                <li><span class="fa fa-calendar"></span> <?php if(!empty($usr[0]->dob)){ //echo date('F j, Y',strtotime($usr[0]->dob));
                                            $diff = (date('Y') - date('Y',strtotime($usr[0]->dob)));
                                            echo $diff." Years Old";
                                                                                       } else {echo "N.A.";}?></li>
                <li><span class="glyphicon glyphicon-briefcase"></span> <?php  echo $this->config->config['job_exp'][$usr[0]->total_exp]; ?> </li>
                <li><span class="glyphicon glyphicon-map-marker"></span> <?php if(!empty($country[0]->c_name)){ echo $country[0]->c_name;} else {echo "N.A.";} ?> </li>
                <li><span class="glyphicon glyphicon-home"></span> <?php if(!empty($city || $state)){ echo $city[0]->name.", ".$state[0]->name;} else {echo "N.A.";} ?></li>
            </ul>
        </div>
        <!--col-md-8 col-sm-8 col-xs-12 close-->

    </div>
    <!--profile-head close-->
</div>
<!--container close-->


<div id="sticky" class="container">
    <div class="row nav nav-tabs nav-menu" role="tablist">
        <div class="active col-md-2 col-lg-2 col-sm-6 col-xs-12">
            <a href="#profile" class="btn btn-primary form-control" role="tab" data-toggle="tab">
                <i class="fa fa-user-o"></i> Profile
            </a>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12">
            <a href="#change" class="btn btn-primary form-control" role="tab" data-toggle="tab">
              <i class="fa fa-pencil"></i> Edit Profile
            </a>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12">
            <a href="#work_history" class="btn btn-primary form-control" role="tab" data-toggle="tab">
              <i class="fa fa-briefcase"></i> Edit Work
            </a>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12">
            <a href="#edu_history" class="btn btn-primary form-control" role="tab" data-toggle="tab">
              <i class="fa fa-mortar-board"></i> Edit Education
            </a>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12">
            <a href="#sample_history" class="btn btn-primary form-control" role="tab" data-toggle="tab" title="Upload Samples of your work">
              <i class="fa fa-cloud-upload"></i> Upload Samples
            </a>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-6 col-xs-12">
            <a href="#resume_upload" class="btn btn-primary form-control" role="tab" data-toggle="tab" title="Upload Resume">
              <i class="fa fa-file-pdf-o"></i> Resume
            </a>
        </div>
    </div>
    <!--nav-tabs close-->

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade active in" id="profile">
            <div class="container">
                <div class="col-sm-11" style="float:left;">
                   <h4 class="rlabel" style="margin-left:-30px; margin-top:0px;"><i class="fa fa-file-text-o"></i> Mini Resume</h4>
                    <div class="module-subtitle font-serif" style="margin-bottom:0px; text-align:center;">
                        <p><?php if(!empty($usr[0]->about_me)) {echo $usr[0]->about_me;} else {echo "Please update your profile for better visibility / Click on Edit Profile Button";} ?></p>
                    </div>
                </div>
                <!--col-sm-12 close-->
                <br clear="all" />
                <div class="row">
                   <div class="col-md-11 table-responsive">
                        <h4 class="rlabel"><i class="fa fa-columns"></i> Basic Details</h4>
                        <div class="row" style="margin-left:12px;text-align:left;">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 smblock">
                                <i class="fa fa-envelope"></i> <?php if($usr[0]->email == ''){echo "<span style='color:red;'>Not Available</span>";} else {echo $usr[0]->email;}; ?>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 smblock">
                                <i class="fa fa-phone"></i> <?php if($usr[0]->mobile == ""){echo "<span style='color:red;'>Not Available</span>"; }else{echo $usr[0]->mobile;}; ?>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 smblock">
                               <?php
                                    if(!empty($usr[0]->fid)){
                                        echo "<i class='fa fa-facebook-square'></i> <a href='".$usr[0]->fid."'>Facebook <i class='fa fa-external-link-square'></i></a>";
                                    } else {
                                        echo "<i class='fa fa-facebook-square'></i> Not Updated Yet";
                                    }
                                ?>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 smblock">
                               <?php
                                    if(!empty($usr[0]->tid)){
                                        echo "<i class='fa fa-twitter-square'></i> <a href='".$usr[0]->tid."'>Twitter <i class='fa fa-external-link-square'></i></a>";
                                    } else {
                                        echo "<i class='fa fa-twitter-square'></i> Not Updated Yet";
                                    }
                                ?>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 smblock">
                               <?php
                                if(!empty($usr[0]->qid)){
                                        echo "<i class='fa fa-quora'></i> <a href='".$usr[0]->qid."'>Quora <i class='fa fa-external-link-square'></i></a>";
                                    } else {
                                        echo "<i class='fa fa-quora'></i> Not Updated Yet";
                                    }
                               ?>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 smblock">
                               <?php
                                if(!empty($usr[0]->lid)){
                                        echo "<i class='fa fa-linkedin-square'></i> <a href='".$usr[0]->lid."'>Linkedin <i class='fa fa-external-link-square'></i></a>";
                                    } else {
                                    echo "<i class='fa fa-linkedin-square'></i> Not Updated Yet";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div>
                    <div class="col-md-6 table-responsive">
                        <h4 class="rlabel" style="width:100%;border-right:4px solid gold;"><i class="fa fa-graduation-cap"></i> Education</h4>
                        <?php 
                            if($education){ 
                                foreach($education as $edu){
                        ?>
                                <table class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo $edu->exam_name ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $edu->college_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Passing Year: <?php echo $edu->p_year; ?> | Scored: <?php echo $edu->marks ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>My view: </b><?php echo $edu->remarks; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                        <?php    
                                }
                            } else {
                                echo "<div class='text-center'>Education Details have not been updated yet! Please update your profile soon, to achieve better visibility</div>";
                            }
                        ?>
                    </div>
                    <div class="col-md-6 table-responsive">
                        <h4 class="rlabel" style="width:100%;border-right:4px solid gold;text-align:right;"><i class="fa fa-suitcase"></i> Work Experience</h4>
                        <?php 
                            if($work_history){ 
                                foreach($work_history as $wh){
                        ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><?php echo $wh->company_name ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $wh->designation ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $wh->work_description ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo $wh->y_from." to ".$wh->y_to; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                        <?php    
                                }
                            } else{
                                echo "<div class='text-center'>Work history not found! Please update your profile soon, to achieve better visibility</div>";
                            }
                        ?>
                    </div>
                    </div>
                    <!--col-md-11 close-->
                </div>
                <!--row close-->




            </div>
            <!--container close-->
        </div>
        <!--tab-pane close-->


        <div class="tab-pane fade" id="change">
            <div class="container fom-main">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="register">Edit Your Profile</h2>
                    </div>
                    <!--col-sm-12 close-->

                </div>
                <!--row close-->
                <br />
                <div class="row">

                    <form class="form-horizontal main_form text-left" action="<?php echo base_url(); ?>expert/edit_basic_detail" method="post" id="contact_form">
                        <fieldset>
                            <div class="form-group col-md-12">
                                <label class="col-md-10 control-label">First Name</label>
                                <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group">
                                        <input name="first_name" placeholder="First Name" class="form-control" type="text" value="<?php if(!empty($usr[0]->first_name)){echo $usr[0]->first_name;} ?>" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Text input-->

                            <div class="form-group col-md-12">
                                <label class="col-md-10 control-label">Last Name</label>
                                <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group">
                                        <input name="last_name" placeholder="Last Name" class="form-control" type="text" value="<?php if(!empty($usr[0]->last_name)){echo $usr[0]->last_name;} ?>" required>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Text input-->

                            <div class="form-group col-md-12">
                                <label class="col-md-10 control-label">Current Designation/Profile</label>
                                <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group">
                                        <input name="profile_name" placeholder="Translator, Analyst.." class="form-control" type="text" value="<?php if(!empty($usr[0]->profile_name)){echo $usr[0]->profile_name;} ?>" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label class="col-md-10 control-label">Gender</label>
                                <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group">
                                        <select name="gender" class="form-control">
                                            <option value="male" <?php if($usr[0]->gender == "male") {echo "selected";} ?>>Male</option>
                                            <option value="female" <?php if($usr[0]->gender == "female") {echo "selected";} ?>>Female</option>
                                            <option value="other" <?php if($usr[0]->gender == "other") {echo "selected";} ?>>Do not want to disclose</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Text input-->
                            
                            <div class="form-group col-md-12">
                                <label class="col-md-10 control-label">Date of Birth</label>
                                <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group">
                                        <input name="dob" class="form-control" type="date" value="<?php if(!empty($usr[0]->dob)){echo $usr[0]->dob;} ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="col-md-10 control-label">Mobile #</label>
                                <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group">
                                        <input name="mobile" placeholder="+91-9835101010" class="form-control" type="text" value="<?php if(!empty($usr[0]->mobile)){echo $usr[0]->mobile;} ?>" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label class="col-md-10 control-label">Mini Resume / About Me</label>
                                <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group">
                                        <textarea class="form-control" name="about_me" placeholder="I am an experienced translator working for a great MNC from last 2 years......" required><?php if(!empty($usr[0]->about_me)){echo $usr[0]->about_me;}?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="col-md-10 control-label">Whereabouts</label>
                                <div class="col-md-12 inputGroupContainer">
                                    <div class="input-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <select class="form-control" name="country" onchange="show_state(this.value)">
                                                   <option>Select Country</option>
                                                    <?php 
                                                        $countries = $this->My_model->selectRecord('country', '*', '', '');
                                                        foreach($countries as $c){ ?>
                                                            <option value="<?php echo $c->id; ?>" <?php if($usr[0]->country == $c->id){echo "selected";} ?> ><?php echo $c->c_name; ?></option>
                                                    <?php                                                            
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id="states">
                                                <?php
                                                    if(!empty($state)){
                                                ?>
                                                   <select class="form-control" name="state">
                                                        <option value="<?php echo $usr[0]->state ?>"><?php echo $state[0]->name; ?></option>
                                                    </select>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id="cities">
                                                <?php if(!empty($city)){ ?>
                                                    <select class="form-control" name="city">
                                                        <option value="<?php echo $usr[0]->city ?>"><?php echo $city[0]->name; ?></option>
                                                    </select>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="col-md-10 control-label">Total Experience</label>
                                <div class="col-md-12 selectContainer">
                                    <div class="input-group">
                                        <!--input name="total_exp" placeholder="4 years 4 month" class="form-control" type="text" value="<?php if(!empty($usr[0]->total_exp)){echo $usr[0]->total_exp;}?>" required -->
                                        <select name="total_exp" class="form-control">
                                            <option value="">Select Your Experience</option>
                                            <?php
                                                foreach( $this->config->item('job_exp') as $key => $exp)	
                                                {
                                            ?>
                                                <option value="<?php echo $key; ?>" <?php if($key == $usr[0]->total_exp){echo "selected";}?> ><?php echo $exp;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="col-md-10 control-label">Facebook profile link</label>
                                <div class="col-md-12 selectContainer">
                                    <div class="input-group">
                                        <input name="fid" placeholder="https://www.facebook.com/someusername" class="form-control" type="url" value="<?php if(!empty($usr[0]->fid)){echo $usr[0]->fid;}?>" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label class="col-md-10 control-label">Twitter profile link</label>
                                <div class="col-md-12 selectContainer">
                                    <div class="input-group">
                                        <input name="tid" placeholder="https://twitter.com/your_twitter" class="form-control" type="url" value="<?php if(!empty($usr[0]->tid)){echo $usr[0]->tid;}?>" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label class="col-md-10 control-label">Quora profile link</label>
                                <div class="col-md-12 selectContainer">
                                    <div class="input-group">
                                        <input name="qid" placeholder="https://www.quora.com/profile/smartusername" class="form-control" type="url" value="<?php if(!empty($usr[0]->qid)){echo $usr[0]->qid;}?>" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label class="col-md-10 control-label">Linkedin profile link</label>
                                <div class="col-md-12 selectContainer">
                                    <div class="input-group">
                                        <input name="lid" placeholder="https://www.linkedin.com/countrycode/profilename" class="form-control" type="url" value="<?php if(!empty($usr[0]->lid)){echo $usr[0]->lid;}?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="col-md-10 control-label">Your skills/Expertise</label>
                                <div class="col-md-12 selectContainer">
                                    <div class="input-group">
                                       <input name="skills" placeholder="comma seperated skills. eg: translation, transliteration..." class="form-control" type="text" value="<?php if(!empty($usr[0]->skills)){echo $usr[0]->skills;}?>" required> 
                                    </div>
                                </div>
                            </div>
                            <!--col-md-12 close-->
                            <!-- Button -->
                            <div class="form-group col-md-10">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-info submit-button">Save</button>
                                    <button type="reset" class="btn btn-warning submit-button">Clear</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <!--row close-->
            </div>
            <!--container close -->
        </div>
        <!--tab-pane close-->
        <div class="tab-pane fade" id="work_history">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="register">Add / Remove Work History <button id="add_wh" class="btn btn-xs btn-primary" onclick="add_new_wh_form()" title="Add another work history"><i class="fa fa-plus"></i></button></h2>
                    </div>
                </div>
                <br/>
                <div class="row">
                   <div id="response_wh" style="color:red;font:10px;display:none;">Work History Deleted!</div>
                        <fieldset id="whistory">
                        <?php 
                            if($work_history){ 
                                $count=1;
                                foreach($work_history as $w){ ?>
                                   <form class="form-horizontal main_form text-left" action="<?php echo base_url() ?>expert/update_wh" method="post" id="wh<?php echo $w->id; ?>">
                                    <fieldset class="well" style="">
                                        <legend style="">Work History <?php echo $count; ?> | <button type="button" class="btn btn-danger btn-xs" title="Delete work history" onclick="delete_wh(<?php echo $w->id; ?>)"><i class="fa fa-trash"></i></button></legend>
                                         <div class="form-group col-md-12">
                                            <label class="col-md-10 control-label">Designation/Profile Name</label>
                                            <div class="col-md-12 inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="hidden" name="id" value="<?php echo $w->id ?>" />
                                                    <input name="designation" placeholder="Language translator" class="form-control" type="text" value="<?php if(!empty($w->designation)){echo $w->designation;} ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-md-10 control-label">Company/Organisation Name</label>
                                            <div class="col-md-12 inputGroupContainer">
                                                <div class="input-group">
                                                    <input name="company_name" placeholder="Name of the organisation you worked for" class="form-control" type="text" value="<?php if(!empty($w->company_name)){echo $w->company_name;} ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-md-10 control-label">From - To</label>
                                            <div class="col-md-6 inputGroupContainer">
                                                <div class="input-group">
                                                    <input name="y_from" class="form-control" type="date" value="<?php if(!empty($w->y_from)){echo $w->y_from;} ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 inputGroupContainer">
                                                <div class="input-group">
                                                    <input name="y_to" class="form-control" type="date" value="<?php if(!empty($w->y_to)){echo $w->y_to;} ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-md-10 control-label">Work description / Your responsibilities</label>
                                            <div class="col-md-12 inputGroupContainer">
                                                <div class="input-group">
                                                    <textarea class="form-control" name="work_description"><?php if(!empty($w->work_description)){echo $w->work_description;} ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="col-md-12 inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="submit" class="btn btn-success" value="Save" />
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                 </form>
                        <?php
                                    $count++;
                                }
                            } else {
                                echo "Work Details have not been updated yet! Please click on Add (+) button";
                            }
                        ?>
                        </fieldset>
                </div>
            </div>
        </div>
        <!--tab---for--education---history-->
        
        <div class="tab-pane fade" id="edu_history">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="register">Add / Remove Education History <button id="" class="btn btn-xs btn-primary" onclick="add_new_edu_form()" title="Add another work history"><i class="fa fa-plus"></i></button></h2>
                    </div>
                </div>
                <br/>
                <div class="row">
                   <div id="response_ed" style="color:red;font:10px;display:none;">Education History Deleted!</div>
                        <fieldset id="edu_his">
                           <?php
                                if($education){
                                    $cnt = 1;
                                    foreach($education as $ed){ ?>
                                        <form class="form-horizontal main_form text-left" action="<?php echo base_url() ?>expert/update_edu" method="post" id="ed<?php echo $ed->id ?>">
                                        <fieldset class="well">
                                            <legend>
                                                 Education History <?php echo $cnt; ?> | <button type="button" class="btn btn-danger btn-xs" title="Delete Education History" onclick="del_edu(<?php echo $ed->id ?>)"><i class="fa fa-trash"></i></button>
                                            </legend>
                                            <div class="form-group col-md-12">
                                                <label class="col-md-10 control-label">Exam name</label>
                                                <div class="col-md-12 inputGroupContainer">
                                                    <div class="input-group">
                                                        <input type="hidden" name="id" value="<?php echo $ed->id ?>" />
                                                        <input name="exam_name" placeholder="Higher Secondary / Graduation / Bachelors / Masters" class="form-control" type="text" value="<?php if(!empty($ed->exam_name)){echo $ed->exam_name;} ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="col-md-10 control-label">College / University name</label>
                                                <div class="col-md-12 inputGroupContainer">
                                                    <div class="input-group">
                                                        <input name="college_name" placeholder="Name of your university / college" class="form-control" type="text" value="<?php if(!empty($ed->college_name)){echo $ed->college_name;} ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="col-md-10 control-label">Passing Year</label>
                                                <div class="col-md-12 inputGroupContainer">
                                                    <div class="input-group">
                                                        <input name="p_year" placeholder="year" class="form-control" type="text" value="<?php if(!empty($ed->p_year)){echo $ed->p_year;} ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="col-md-10 control-label">Score / Mark</label>
                                                <div class="col-md-12 inputGroupContainer">
                                                    <div class="input-group">
                                                        <input name="marks" placeholder="Scored %age or CGPA" class="form-control" type="text" value="<?php if(!empty($ed->marks)){echo $ed->marks;} ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="col-md-10 control-label">Remarks / Some Words</label>
                                                <div class="col-md-12 inputGroupContainer">
                                                    <div class="input-group">
                                                        <textarea class="form-control" name="remarks"><?php if(!empty($ed->remarks)){echo $ed->remarks;} ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="col-md-12 inputGroupContainer">
                                                    <div class="input-group">
                                                        <input type="submit" class="btn btn-success" value="Save" />
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        </form>
                            <?php    
                                    $cnt++;
                                    }
                                } else {
                                   echo "Education Details have not been updated yet! Please click on Add (+) button"; 
                                }
                            ?>
                        </fieldset>
                </div>
            </div>
        </div>
        
        <div class="tab-pane fade" id="sample_history">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="register">Add / Remove Work Samples <button class="btn btn-xs btn-primary" onclick="add_new_ws_form()" title="Add new work sample"><i class="fa fa-plus"></i></button></h2>
                    </div>
                </div>
                <br/>
                <div class="row">
                   <div id="response_ws" style="color:red;font:10px;display:none;">Work sample Deleted!</div>
                        <fieldset id="wshistory">
                        <?php 
                            if($work_sample){ 
                                $count=1;
                                foreach($work_sample as $ws){ ?>
                                   <form class="form-horizontal main_form text-left" action="<?php echo base_url() ?>expert/update_ws" method="post" id="ws<?php echo $ws->id; ?>" enctype="multipart/form-data">
                                    <fieldset class="well">
                                        <legend>Work Sample <?php echo $count; ?> | <button type="button" class="btn btn-danger btn-xs" title="Delete work sample" onclick="delete_ws(<?php echo $ws->id; ?>)"><i class="fa fa-trash"></i></button></legend>
                                         <div class="form-group col-md-12">
                                            <label class="col-md-10 control-label">Work Sample Name</label>
                                            <div class="col-md-12 inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="hidden" name="id" value="<?php echo $ws->id ?>" />
                                                    <input name="sample_name" placeholder="Eg: English-Spanish Document..." class="form-control" type="text" value="<?php if(!empty($ws->sample_name)){echo $ws->sample_name;} ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-md-10 control-label">Description of Sample</label>
                                            <div class="col-md-12 inputGroupContainer">
                                                <div class="input-group">
                                                    <textarea name="description" placeholder="Eg: Did a translation work for a MNC in 2017... or a link or something.." class="form-control"><?php if(!empty($ws->description)){echo $ws->description;} ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="col-md-10 control-label">Uploaded Document</label>
                                            <div class="col-md-12 inputGroupContainer">
                                                <div class="input-group">
                                                    <label class="btn btn-xs btn-primary" id="" title="Change document">
                                                        <?php 
                                                            if(!empty($ws->document)){
                                                                $ext = explode('.', $ws->document)[1];
                                                                $ico="";
                                                                switch($ext) {
                                                                    case "pdf": 
                                                                        $ico = "<i class='fa fa-file-pdf-o'></i>"; break;
                                                                    case "doc":
                                                                    case "docx":
                                                                        $ico = "<i class='fa fa-doc'></i>"; break;
                                                                    case "jpg":
                                                                    case "gif":
                                                                    case "jpeg":
                                                                        $ico = "<i class='fa fa-file-image-o'></i>";break;
                                                                    case "mp4":
                                                                    case "mkv":
                                                                    case "3gp":
                                                                    case "avi":
                                                                    case "webm":
                                                                        $ico = "<i class='fa fa-file-video-o'></i>"; break;
                                                                    case "txt":
                                                                        $ico = "<i class='fa fa-file-text-o'></i>"; break;
                                                                    default:
                                                                        $ico = "<i class='fa fa-file-o'></i>"; break;
                                                                }
                                                            }
                                                             echo "Click here to replace the sample <span class='small'>(Use file < 500kb)</span>";
                                                        ?>
                                                        <input type="file" id="document" name="document" style="display: none;">
                                                   </label> &nbsp; &nbsp; <label><?php echo " Current Document is : &nbsp;&nbsp;"; ?><a href="<?php echo base_url()."assets/uploads/sample_docs/".$ws->document?>" target="_blank" download><?php echo $ico." ".$ws->document; ?></a></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="col-md-12 inputGroupContainer">
                                                <div class="input-group">
                                                    <input type="submit" class="btn btn-success" value="Save" />
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                 </form>
                        <?php
                                    $count++;
                                }
                            } else {
                                echo "Work sample have not been added yet! Please click on Add (+) button to upload new samples";
                            }
                        ?>
                        </fieldset>
                </div>
            </div>
        </div>
        
        <div class="tab-pane fade" id="resume_upload">
            <div class="container">
                <div class="row">
                    <?php 
                        if(!empty($usr[0]->resume)){
                            $ext = explode('.', $usr[0]->resume)[1];
                            $ico="";
                            switch($ext) {
                                case "pdf": 
                                    $ico = "<i class='fa fa-file-pdf-o'></i>"; break;
                                case "doc":
                                case "docx":
                                    $ico = "<i class='fa fa-doc'></i>"; break;
                                case "jpg":
                                case "gif":
                                case "jpeg":
                                    $ico = "<i class='fa fa-file-image-o'></i>";break;
                                case "mp4":
                                case "mkv":
                                case "3gp":
                                case "avi":
                                case "webm":
                                    $ico = "<i class='fa fa-file-video-o'></i>"; break;
                                case "txt":
                                    $ico = "<i class='fa fa-file-text-o'></i>"; break;
                                default:
                                    $ico = "<i class='fa fa-file-o'></i>"; break;
                            }
                            echo "Your current Resume is: <a class='btn btn-danger btn-xs' href='".base_url()."assets/uploads/expert_resumes/".$usr[0]->resume."' download>".$ico." ".$usr[0]->resume."</a>";
                        } else {
                            echo "You have not uploaded any Resume/CV Yet. Please Upload it soon. Profiles with resumes get 2x more Views.";
                        }
                    ?>
                </div>
                <br/>
                <fieldset class="well">
                    <legend>Upload Resume</legend>
                    <form class="form-horizontal main_form text-left" action="<?php echo base_url() ?>expert/update_resume" method="post" enctype="multipart/form-data">
                    <div class="col-md-1"></div>
                    <div class="form-group col-md-6">
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <input type="file" class="form-control" name="document"/> <br/>
                                <span class="small">Please upload only doc, docx, rtf, odt or pdf file only. max file size: 1000kb. </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </fieldset>
            </div>
        </div>
        
    </div>
    <!--tab-content close-->
</div>
<!--container close-->
</section>