<style>  
body { background:#ffffff;}
.module{padding: 25px 0; !important}
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
<?php
	// if viwed by a lang employer hide header and footer
	if($this->session->userdata('emp_id'))
	{ ?>
		#main_menu{
			display: none;
		}
		
		#ftr{
			display: none;
		}
<?php		
	}
?>
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
            <?php
                } else { ?>
                <img src="<?php if(!empty($usr[0]->image)){echo $usr[0]->image;} else {echo base_url()."assets/1.png";} ?>" class="img-responsive" />
            <?php     
                }
            ?>
        </div>
        <!--col-md-4 col-sm-4 col-xs-12 close-->

        <div class="col-md-5 col-sm-5 col-xs-12">
            <h5>
                <?php
                    //If Recruiter is seeing this profile then show full name and details
                    //echo $usr[0]->first_name." ".$usr[0]->last_name; 
                    echo strtoupper($usr[0]->last_name." ".mb_substr($usr[0]->first_name, 0, 1, 'utf-8'));
                ?>
            </h5>
            <p><span class="fa fa-bolt"></span> <?php if(!empty($usr[0]->profile_name)){ echo $usr[0]->profile_name; } else {echo "N.A.";}?></p>
            <ul>
                <li>
					<span class="fa fa-calendar"></span> 
					<?php 
						if(!empty($usr[0]->expert_in))
						{ 		
							$strLangs = $this->Employer_model->getLangList($usr[0]->expert_in);
	                     	echo "Expert In : &nbsp;&nbsp;" .$strLangs;
                        }
						else {
							echo "N.A.";
						}
					?>
				</li>
                <li><span class="glyphicon glyphicon-briefcase"></span> <?php  echo $this->config->config['job_exp'][$usr[0]->total_exp]; ?> </li>
                <li><span class="glyphicon glyphicon-map-marker"></span> <?php if(!empty($country[0]->c_name)){ echo $country[0]->c_name;} else {echo "N.A.";} ?> </li>
                <li style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><span class="glyphicon glyphicon-home"></span> <?php if(!empty($usr[0]->address)){ echo $usr[0]->address;} else {echo "N.A.";} ?></li>
            </ul>
        </div>
        <!--col-md-8 col-sm-8 col-xs-12 close-->

    </div>
    <!--profile-head close-->
</div>
<!--container close-->

<?php
if($this->session->userdata('emp_id'))
{
	if( isset($balance) && $balance > 0 )
	{	
        if($this->session->userdata('acc_status') == "1"){
?>
<div id="sticky" class="container">
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade active in" id="profile">
            <div class="container">
                <div class="col-sm-11" style="float:left;">
                   <h4 class="rlabel" style="margin-left:-30px; margin-top:0px;"><i class="fa fa-file-text-o"></i> Mini Resume</h4>
                    <div class="module-subtitle font-serif" style="margin-bottom:0px; text-align:center;">
                        <p><?php if(!empty($usr[0]->about_me)) {echo $usr[0]->about_me;} else {echo "This user has not included his summary yet!";} ?></p>
                    </div>
                </div>
                <!--col-sm-12 close-->
                <br clear="all" />
                <div class="row">
                   <div class="col-md-11 table-responsive">
                        <h4 class="rlabel"><i class="fa fa-columns"></i> Basic Details</h4>
                        <div class="row" style="margin-left:12px;text-align:left;">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 smblock">
                                <i class="fa fa-envelope"></i> <?php 
                                    if($usr[0]->email == ''){
                                        echo "<span style='color:red;'>Not Available</span>";
                                    } else {
                                        echo $usr[0]->email;
                                    } ?>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 smblock">
                                <i class="fa fa-phone"></i> <?php 
                                    if($usr[0]->mobile == ""){
                                        echo "<span style='color:red;'>Not Available</span>"; 
                                    } else {
                                        echo $usr[0]->mobile;
                                    } ?>
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
                                echo "<div class='text-center'>Education Details not found!  Language Expert has not updated this section yet</div>";
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
                                echo "<div class='text-center'>Work history not found! Language Expert has not updated this section yet</div>";
                            }
                        ?>
                    </div>
                    <div class="col-md-6 table-responsive">
                        <h4 class="rlabel" style="width:100%;border-right:4px solid gold;"><i class="fa fa-file"></i> Resume </h4>
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
                                echo "Download: <a class='btn btn-primary btn-xs' href='".base_url()."assets/uploads/expert_resumes/".$usr[0]->resume."' download>".$ico." ".$usr[0]->resume."</a>";
                            } else {
                                echo "<div class='text-center'>Resume not found! Language Expert has not uploaded his Resume yet</div>";
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
        <!--tab---for--education---history-->        
    </div>
    <!--tab-content close-->
</div>
<?php
        } else { ?>
            <div class="row">
                <div class="col-md-11 table-responsive" style="text-align:center;">
                    <h4> You account is awaiting approval, Please wait or <a rel="canonical" href="<?php echo base_url(); ?>contact.php">contact us</a></h4>
                </div>
            </div>
            <br/><br/><br/><br/><br/><br/><br/><br/>
<?php
        }
	}
	else
	{
	?>
	<div class="row">
        <div class="col-md-11 table-responsive" style="text-align:center;">
			<h4> To View complete profile please Change/Upgrade your <a href="<?php echo base_url() ?>ado/Employer/changeplan">Plan</a></h4>
		</div>
	</div>	
	<?php	
	}
} else { ?>
    <div class="row">
        <div class="col-md-11 table-responsive" style="text-align:center;">
			<h4> Please login to view complete profile and download Language Expert's resume </h4>
		</div>
	</div>
<?php
}
?>	
<!--container close-->
</section>
<!-- AddToAny BEGIN -->
<div id="shr2" class="a2a_kit a2a_kit_size_32  a2a_floating_style a2a_vertical_style" data-a2a-scroll-show="100" style="left:0px; top:150px;">
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
    a2a_config.linkurl = "<?php echo base_url() ?>Language_experts/profile/<?php echo $usr[0]->id; ?>";
</script>
<script async src="https://static.addtoany.com/menu/page.js"></script>