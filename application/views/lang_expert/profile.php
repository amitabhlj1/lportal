<style>
    
body { background:#ffffff;}
.module{padding: 80px 0; !important}
.page-header {background:#ccc;margin:0;}
.profile-head { width:100%;background-color: rgb(40, 47, 70);float: left;padding: 15px 5px;}
.profile-head img { height:200px; width:200px; margin:0 auto; border-radius:50%;}
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


.nav-tabs {margin: 0;padding: 5px 0 0 0;border: 0;}
.nav-tabs > li > a {background: #DADADA;border-radius: 0;
    box-shadow: inset 0 -8px 7px -9px rgba(0,0,0,.4),-2px -2px 5px -2px rgba(0,0,0,.4);}
.nav-tabs > li.active > a,
.nav-tabs > li.active > a:hover {background: #F5F5F5;
    box-shadow: inset 0 0 0 0 rgba(0,0,0,.4),-2px -3px 5px -2px rgba(0,0,0,.4);}
.tab-pane {background: #ffffff;box-shadow: 0 0 4px rgba(0,0,0,.4);border-radius: 0;text-align: center;padding: 10px;}
.tab-content>.active {margin-top:10px;/*width:100% !important;*/} 

/* edit profile css*/
#uppic{position: absolute;left: 42.5%;bottom: -4%;}
.hve-pro {background-image: linear-gradient(to right top, #ff6600, #de284e, #9a1f68, #ea3f31, #fa5c0c);padding: 5px; width:100%; height:auto;float:left;}
.hve-pro p {float: left;color:#fff;font-size: 15px;text-transform: capitalize;padding: 5px 20px;text-shadow: 2px 2px black;text-align: left;}
h2.register { padding:10px 25px; text-transform:capitalize;font-size: 25px;color: rgb(255, 102, 0);}
.fom-main { overflow:hidden;}

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
.nav-menu li a {margin: 5px 5px 5px 5px;position: relative;display: block;padding: 10px 50px;border: 0px solid !important;box-shadow: none !important;
background-color: rgb(0, 4, 51) !important;color: #fff !important;    white-space: nowrap;}
.nav-menu li.active a {background-color: rgb(255, 102, 0) !important;}
table{margin-left: 5%; width: 80% !important;}
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
        <div class="col-md- col-sm-4 col-xs-12">
            <img src="<?php if(!empty($usr[0]->image)){echo $usr[0]->image;} else {echo base_url()."assets/1.png";} ?>" class="img-responsive" />
            <label class="btn btn-xs btn-primary" id="uppic" title="Change Profile Image">
                <i class="fa fa-camera"></i> <input type="file" style="display: none;">
            </label>
        </div>
        <!--col-md-4 col-sm-4 col-xs-12 close-->

        <div class="col-md-5 col-sm-5 col-xs-12">
            <h5><?php echo $usr[0]->first_name." ".$usr[0]->last_name; ?></h5>
            <p><?php echo $usr[0]->profile_name; ?></p>
            <ul>
                <li><span class="fa fa-bolt"></span> <?php if(!empty($usr[0]->profile_name)){ echo $usr[0]->profile_name; } else {echo "N.A.";}?></li>
                <li><span class="glyphicon glyphicon-briefcase"></span> <?php if(!empty($usr[0]->total_exp)){ echo $usr[0]->total_exp; } else {echo "N.A.";}?> </li>
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

    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-menu" role="tablist">
        <li class="active">
            <a href="#profile" role="tab" data-toggle="tab">
                  <i class="fa fa-user-o"></i> Profile
              </a>
        </li>
        <li><a href="#change" role="tab" data-toggle="tab">
              <i class="fa fa-pencil"></i> Edit Profile
              </a>
        </li>
        <li><a href="#work_history" role="tab" data-toggle="tab">
              <i class="fa fa-briefcase"></i> Edit Work
              </a>
        </li>
        <li><a href="#edu_history" role="tab" data-toggle="tab">
              <i class="fa fa-mortar-board"></i> Edit Education
              </a>
        </li>
    </ul>
    <!--nav-tabs close-->

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade active in" id="profile">
            <div class="container">
                <div class="col-sm-11" style="float:left;">
                   <h2 style="text-align:left;">Resume</h2>
                    <div class="hve-pro">
                        <p><?php if(!empty($usr[0]->about_me)) {echo $usr[0]->about_me;} else {echo "Please update your profile for better visibility / Click on Edit Profile Button";} ?></p>
                    </div>
                    <!--hve-pro close-->
                </div>
                <!--col-sm-12 close-->
                <br clear="all" />
                <div class="row">
                   <div class="col-md-11 table-responsive">
                        <hr style="width:100%; margin-left:1%;border-color:rgb(40, 47, 70);"/>
                        <h4 style="text-align:left;margin-left:12px;">Basic Details</h4>
                        <table class="table" style="width:100%;">
                            <tbody>
                                <tr>
                                    <td><i class="fa fa-envelope"></i> Email: <?php if($usr[0]->email == ''){echo "<span style='color:red;'>Not Available</span>";} else {echo $usr[0]->email;}; ?></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-phone"></i> Mobile: <?php if($usr[0]->mobile == ""){echo "<span style='color:red;'>Not Available</span>"; }else{echo $usr[0]->mobile;}; ?></td>
                                </tr>
                                <tr>
                                    <td><?php
                                            if(!empty($usr[0]->fid)){
                                                echo "<i class='fa fa-facebook-square'></i> Facebook: <a href='".$usr[0]->fid."'>".$usr[0]->fid."</a>";
                                            } 
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php
                                            if(!empty($usr[0]->tid)){
                                                echo "<i class='fa fa-twitter-square'></i> Twitter: <a href='".$usr[0]->tid."'>".$usr[0]->tid."</a>";
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                   <td><?php
                                        if(!empty($usr[0]->qid)){
                                                echo "<i class='fa fa-quora'></i> Quora: <a href='".$usr[0]->lid."'>".$usr[0]->lid."</a>";
                                            }
                                       ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php
                                        if(!empty($usr[0]->lid)){
                                                echo "<i class='fa fa-linkedin-square'></i> Linkedin: <a href='".$usr[0]->lid."'>".$usr[0]->lid."</a>";
                                            }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-11 table-responsive">
                        <hr style="width:100%; margin-left:1%;border-color:rgb(40, 47, 70);"/>
                        <h4 style="text-align:left;margin-left:12px;">Education</h4>
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
                    <div class="col-md-11 table-responsive">
                        <hr style="width:100%; margin-left:1%;border-color:rgb(40, 47, 70);"/>
                        <h4 style="text-align:left;margin-left:12px;">Experience</h4>
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
                        <h2 class="register">Edit Your Profile/ Resume</h2>
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
                                        <input name="total_exp" placeholder="4 years 4 month" class="form-control" type="text" value="<?php if(!empty($usr[0]->total_exp)){echo $usr[0]->total_exp;}?>" required>
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
                                    <fieldset class="well" style="display:block; width:90%;overflow:auto;margin-left:4%;background-color:#fff;">
                                        <legend style="color:#282f46;text-transform:uppercase;font-weight:bold;width:max-content;">Work History <?php echo $count; ?> | <button type="button" class="btn btn-danger btn-xs" title="Delete work history" onclick="delete_wh(<?php echo $w->id; ?>)"><i class="fa fa-trash"></i></button></legend>
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
                        <h2 class="register">Add / Remove Education History <button id="add_wh" class="btn btn-xs btn-primary" onclick="add_new_edu_form()" title="Add another work history"><i class="fa fa-plus"></i></button></h2>
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
                                        <fieldset class="well" style="display:block; width:90%;overflow:auto;margin-left:4%;background-color:#fff;">
                                            <legend style="color:#282f46;text-transform:uppercase;font-weight:bold;width:max-content;">
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
        
    </div>
    <!--tab-content close-->
</div>
<!--container close-->
</section>