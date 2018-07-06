<script type="text/javascript" src="<?php echo base_url();?>assets/js/tinymce_3_5/jscripts/tiny_mce/tiny_mce.js"></script>
<link href="<?php echo base_url(); ?>assets/css/addTags.css" rel="stylesheet">
<?php $jd = $job_details[0]; 
    //print_r($jd);
?>
<style>
    .select2-container .select2-selection {
      height: 33px; 
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: inherit !important;
        line-height: 29px;
    }
    .pac-container:after {
    /* Disclaimer: not needed to show 'powered by Google' if also a Google Map is shown */
        background-image: none !important;
        height: 0px;
    }
</style>
<script>
  function initAutocomplete() {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */
      (document.getElementById('autocomplete')), {
        types: ['geocode']
      });
	  
	  autocomplete1 = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */
      (document.getElementById('autocomplete1')), {
        types: ['geocode']
      });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCa0L27dpX-xgwglyvc9jtNZ2_sJt_JNq4&libraries=places&callback=initAutocomplete" async defer></script>
<section class="content">
<!-- Main row -->
<div class="row">
	
    <div class="col-lg-10">
	    <section class="panel">
			<header class="panel-heading">
			  Modify and Create a New Job
				<a href="<?php echo base_url();?>ado/Employer/">
					<button class="btn btn-sm btn-primary pull-right" type="submit">cancel</button>
				</a>		
			</header>
			<div class="panel-body">
				
				<p class="help-block"><div id="msg_succ" style="color:#44e028"></div></p>
				<form class="form-horizontal" id="eventfrm" role="form" method="post" action="<?php echo base_url()?>ado/Employer/saveJob">
					
					<div class="form-group">					
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Job Type</label>
					  <div class="col-lg-10">
						  <input type="radio" name="j_type" value="1" <?php if($jd->j_type == 1) echo "checked"; ?> onclick="jobType(this.value);"> Full/Part Time &nbsp;&nbsp;&nbsp;
						  <input type="radio" name="j_type" value="2" <?php if($jd->j_type == 3) echo "checked"; ?> onclick="jobType(this.value);"> Project/Freelance
					  </div>
				    </div>
					<span id="fulfrm" style="display:none">
					<div class="form-group">					
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Category</label>
					  <div class="col-lg-10">
						<select required="true" class="form-control m-b-10" name="j_category" id="j_category">
							<option value="">Select</option>
							<?php
								foreach($cats as $cat)	
								{
							?>
								<option value="<?php echo $cat->id; ?>" <?php if($jd->j_category == $cat->id) echo "Selected"; ?> ><?php echo $cat->cat_name; ?></option>
								
							<?php 
                                } 
                            ?>							    
                            </select>
						  <p class="help-block"><div id="err_cat" style="color:#F83A18"></div></p>
					  </div>
				    </div>
					<div class="form-group">					
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Languages</label>
					  <div class="col-lg-10">
						<select required="true" class="form-control m-b-10" name="languages[]" id="languages" multiple>
							<option value="">Select</option>
							<?php
								foreach($langs as $lang)	
								{
							?>
								<option value="<?php echo $lang->id; ?>" <?php if($jd->languages){ if(in_array($lang->id, explode(',',$jd->languages))){ echo "selected"; }} ?> ><?php echo $lang->name; ?></option>
							<?php } ?>							    
                            </select>
						  <p class="help-block"><div id="err_langs" style="color:#F83A18"></div></p>
					  </div>
				    </div>
					<div class="form-group">					
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Title</label>
					  <div class="col-lg-10">
						  <input type="text" required="true" class="form-control" name="title" id="title" placeholder="job title" value="<?php echo $jd->title; ?>" maxlength="200">
						  <p class="help-block"><div id="err_title" style="color:#F83A18"></div></p>
					  </div>
				    </div>
					
					<div class="form-group">					
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Keywords</label>
					  <div class="col-lg-10">
						  <input type="text" required="true" class="form-control" name="job_keywords" id="job_key" placeholder="comma separated job keywords/tags" value="<?php echo $jd->job_keywords; ?>" maxlength="450">
						  <p class="help-block"><div id="err_ky" style="color:#F83A18"></div></p>
					  </div>
				    </div>	
	
					<div class="form-group">
					  <label for="description" class="col-lg-2 col-sm-2 control-label">Skills</label><div class="col-lg-10">
						<input type="text" required="true" class="form-control" name="skills" id="skills" placeholder="skills required for this job" value="<?php echo $jd->skills; ?>" maxlength="250">
						  <p class="help-block"><div id="err_skills" style="color:#F83A18"></div></p>
					  </div>
				    </div>
					<div class="form-group">
					  <label for="description" class="col-lg-2 col-sm-2 control-label">Location / City</label><div class="col-lg-10">
						<input type="text" required="true" class="form-control" name="address" id="autocomplete" placeholder="job location/address" value="<?php echo $jd->address; ?>" maxlength="250">
						  <p class="help-block"><div id="err_loc" style="color:#F83A18"></div></p>
					  </div>
				    </div>	

					<div class="form-group">
						<p class="help-block"><div id="msg_succ" style="margin-left:200px;color:#44e028"></div></p>
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Job Detail</label>
					  <div class="col-lg-10">
						  <textarea id="description" name="description" class="msg-input form-control" placeholder="Job details..." rows="6" cols="90"><?php echo $jd->description; ?></textarea>
						  <p class="help-block"><div id="err_det" style="color:#F83A18"></div></p>
					  </div>
				    </div>
		
				    <div class="form-group">
					  <label for="description" class="col-lg-2 col-sm-2 control-label">Experience Required</label><div class="col-lg-10">
						<select required="true" class="form-control m-b-10" name="total_exp" id="total_exp">
							<option value="">Select</option>
							<?php
								foreach( $this->config->item('job_exp') as $key => $exp)	
								{
							?>
								<option value="<?php echo $key; ?>" <?php if($jd->total_exp == $key){echo "selected"; } ?> ><?php echo $exp;?></option>
							<?php } ?>							    
                          </select>
						  <p class="help-block"><div id="err_exp" style="color:#F83A18"></div></p>
					  </div>
				    </div>	

					<div class="form-group">
					  <label for="description" class="col-lg-2 col-sm-2 control-label">Last Date</label><div class="col-lg-10">
						 <input type="date" class="form-control" name="last_date" id="last_date" placeholder="title" value="<?php echo $jd->last_date; ?>" maxlength="400" />
						  <p class="help-block"><div id="err_ldate" style="color:#F83A18"></div></p>
					  </div>
				    </div>
				    <div class="form-group">
					  <div class="col-lg-offset-2 col-lg-10">
						  <button type="button" class="btn btn-danger" onclick="saveJobs()">Save</button>
					  </div>
				    </div>
				</form>
				</span>

				<span id="prjfrm" style="display:none">
					<form class="form-horizontal" id="p_frm" role="form" method="post" action="<?php echo base_url()?>ado/Employer/saveProjectJob">
					
						<div class="form-group">					
						  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Category</label>
						  <div class="col-lg-10">
							<select required="true" class="form-control m-b-10" name="f_j_category" id="f_j_category">
								<option value="">Select</option>
								<?php
									foreach($cats as $cat)	
									{
								?>
									<option value="<?php echo $cat->id; ?>" <?php if($jd->j_category == $cat->id) echo "Selected"; ?> ><?php echo $cat->cat_name; ?></option>
								<?php } ?>							    
								</select>
							  <p class="help-block"><div id="err_f_cat" style="color:#F83A18"></div></p>
						  </div>
						</div>
						<div class="form-group">					
						  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">From Languages</label>
						  <div class="col-lg-10">
							<select required="true" class="form-control m-b-10" name="f_language" id="f_language">
								<option value="">Select</option>
								<?php
									foreach($langs as $lang)	
									{
								?>
									<option value="<?php echo $lang->id; ?>" <?php if($jd->from_language == $lang->id){echo "selected";} ?> ><?php echo $lang->name; ?></option>
								<?php } ?>							    
							  </select>
							  <p class="help-block"><div id="err_flang" style="color:#F83A18"></div></p>
						  </div>
						</div>
						<div class="form-group">					
						  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">To  Languages</label>
						  <div class="col-lg-10">
							<select required="true" class="form-control m-b-10" name="to_language" id="to_language">
								<option value="">Select</option>
								<?php
									foreach($langs as $lang)	
									{
								?>
									<option value="<?php echo $lang->id; ?>" <?php if($jd->to_language == $lang->id){ echo "selected";} ?> ><?php echo $lang->name; ?></option>
								<?php } ?>							    
								</select>
							  <p class="help-block"><div id="err_tlang" style="color:#F83A18"></div></p>
						  </div>
						</div>
						<div class="form-group">					
						  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Title</label>
						  <div class="col-lg-10">
							  <input type="text" required="true" class="form-control" name="f_title" id="f_title" placeholder="job title" value="<?php echo $jd->title; ?>" maxlength="200">
							  <p class="help-block"><div id="err_f_title" style="color:#F83A18"></div></p>
						  </div>
						</div>	

						<div class="form-group">					
						  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Keywords</label>
						  <div class="col-lg-10">
							  <input type="text" required="true" class="form-control" name="f_job_key" id="f_job_key" placeholder="comma separated job keywords" value="<?php echo $jd->job_keywords; ?>" maxlength="450">
							  <p class="help-block"><div id="err_ky" style="color:#F83A18"></div></p>
						  </div>
				    	</div>	

						<div class="form-group">
						  <label for="description" class="col-lg-2 col-sm-2 control-label">Skills</label><div class="col-lg-10">
							<input type="text" required="true" class="form-control" name="f_skills" id="f_skills" placeholder="skills required for this job" value="<?php echo $jd->skills; ?>" maxlength="250">
							  <p class="help-block"><div id="err_f_skills" style="color:#F83A18"></div></p>
						  </div>
						</div>
						<div class="form-group">
						  <label for="description" class="col-lg-2 col-sm-2 control-label">Location / City</label><div class="col-lg-10">
							<input type="text" required="true" class="form-control" name="f_address" id="autocomplete1" placeholder="job location/address" value="<?php echo $jd->address; ?>" maxlength="250">
							  <p class="help-block"><div id="err_f_loc" style="color:#F83A18"></div></p>
						  </div>
						</div>
						<div class="form-group">
							<p class="help-block"><div id="msg_succ" style="margin-left:200px;color:#44e028"></div></p>
						  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Job Detail</label>
						  <div class="col-lg-10">
							  <textarea id="f_description" name="f_description" class="msg-input form-control" placeholder="Job details..." rows="6" cols="90"><?php echo $jd->description; ?></textarea>
							  <p class="help-block"><div id="err_f_det" style="color:#F83A18"></div></p>
						  </div>
						</div>
					
						<div class="form-group">
						  <label for="description" class="col-lg-2 col-sm-2 control-label">Experience Required</label><div class="col-lg-10">
							<select class="form-control m-b-10" name="total_exp" id="f_exp">
								<option value="">Select</option>
								<?php
									foreach( $this->config->item('job_exp') as $key => $exp)	
									{
								?>
									<option value="<?php echo $key; ?>" <?php if($jd->total_exp == $key){echo "Selected";} ?> ><?php echo $exp;?></option>
								<?php } ?>							    
							  </select>
							  <p class="help-block"><div id="err_fexp" style="color:#F83A18"></div></p>
						  </div>
						</div>	

						<div class="form-group">
						  <label for="description" class="col-lg-2 col-sm-2 control-label">Job Unit</label>
						  <div class="col-lg-10">
						  <select required="true" class="form-control m-b-10" name="unit_name" id="unit_name">
								<option value="">Select</option>
								<?php
									foreach($this->config->item('job_units') as $key => $units)	
									{
								?>
									<option value="<?php echo $key;?>" <?php if($jd->unit_name == $key){ echo "selected"; } ?> ><?php echo $units; ?></option>
								<?php } ?>							    
							</select>
							<p class="help-block"><div id="err_unit" style="color:#F83A18"></div></p>
						  </div>	
						</div>	
						<div class="form-group">
						  <label for="description" class="col-lg-2 col-sm-2 control-label">Unit Numbers</label><div class="col-lg-10">
							 <input type="number" class="form-control" name="unit_numbers" id="unit_numbers" placeholder="number of units" value="<?php echo $jd->unit_numbers; ?>" maxlength="5">
							  <p class="help-block"><div id="err_uval" style="color:#F83A18"></div></p>
						  </div>
						</div>	
						<div class="form-group">
						  <label for="description" class="col-lg-2 col-sm-2 control-label">Unit Rate</label><div class="col-lg-10">
							 <input type="text" class="form-control" name="work_rate" id="work_rate" placeholder="unit rate" value="<?php echo $jd->work_rate; ?>" maxlength="20">
							  <p class="help-block"><div id="err_urate" style="color:#F83A18"></div></p>
						  </div>
						</div>	

						<div class="form-group">
						  <label for="description" class="col-lg-2 col-sm-2 control-label">Last Date</label><div class="col-lg-10">
							 <input type="date" class="form-control" name="last_date" id="last_date" placeholder="title" value="<?php echo $jd->last_date; ?>" maxlength="400">
							  <p class="help-block"><div id="err_ldate" style="color:#F83A18"></div></p>
						  </div>
						</div>
						<div class="form-group">
						  <div class="col-lg-offset-2 col-lg-10">
							  <button type="button" class="btn btn-danger" onclick="savePrjJobs()">Save</button>
						  </div>
						</div>
					</form>
				</span>	
		    </div>
	    </section>	  
    </div>   
</div>					
</section><!-- /.content -->
<script type="text/javascript">
  var baseurl = "<?php print base_url(); ?>";
  $("#tags_1").addTags();	
</script>
<script>
    <?php 
        if($jd->j_type == 1){ ?>
            window.onload = function() { 
              jobType(1);
            };
    <?php
        } else { ?>
            window.onload = function() {
              jobType(2);
            };
    <?php 
        }
    ?>
</script>
<script>
function jobType(j_type)
{
	//alert(j_type);
	if(j_type == 1)
	{
		$('#fulfrm').css("display", "block");
		$('#prjfrm').css("display", "none");
	}
	else
	{
		$('#fulfrm').css("display", "none");
		$('#prjfrm').css("display", "block");
	}
}

function savePrjJobs()
{		
	//alert('POO'); return false;  
	$("#err_f_cat").html('');
	$("#err_flang").html('');
	$("#err_tlang").html('');
	
	$("#err_f_title").html('');  
	$("#err_f_skills").html('');
	$("#err_f_det").html('');
	$("#err_unit").html('');   
	$("#err_uval").html('');  
	$("#err_urate").html(''); 
	$("#err_fexp").html(''); 
	
	var f_lang = $("#f_language").val();
	var t_lang = $("#to_language").val();
	var title      = $("#f_title").val();
	var skills     = $("#f_skills").val();
	var description = tinyMCE.activeEditor.getContent();
	var total_exp = $("#f_exp").val();
	var j_unit   = $("#unit_name").val();
	var unit_numbers   = $("#unit_numbers").val();
	var work_rate   = $("#work_rate").val();
	
	if(f_lang == '')
	{
		$("#err_flang").html('please select from language');		
		return false;
	}
	if(t_lang == '')
	{
		$("#err_tlang").html('please select to language');		
		return false;
	}
	if(t_lang == f_lang)
	{
		$("#err_tlang").html('both languages can\'t be same');		
		return false;
	}
	
	if(title == '')
	{
		$("#err_f_title").html('please enter job title');		
		return false;
	}
	
	if(skills == '')
	{
		$("#err_f_skills").html('please enter job skills');		
		return false;
	}
	
	if(description == '')
	{
		$("#err_f_det").html('please enter job description');		
		return false;
	}
	
	if(total_exp == '')
	{
		$("#err_fexp").html('please select experience');		
		return false;
	}
	
	if(j_unit == '')
	{
		$("#err_unit").html('please select unit name');		
		return false;
	}
	if(unit_numbers == '')
	{
		$("#err_uval").html('please enter number of units (only numbers allowed)');		
		return false;
	}
	
	if(work_rate == '')
	{
		$("#err_urate").html('please enter work rate per unit');		
		return false;
	}
	
	// submit form
	$("#p_frm").submit();
}
	
function saveJobs()
{		
	$("#err_type").html('');
	//$("#err_cat").html('');
	$("#err_title").html('');
	$("#err_skills").html('');
	$("#err_det").html(''); 
	$("#err_exp").html('');
	
	var j_type     = $("#j_type").val();
	var j_category = $("#j_category").val();
	var title      = $("#title").val();
	var skills     = $("#skills").val();
	var description = tinyMCE.activeEditor.getContent();;
	var total_exp = $("#total_exp").val();
	
	if(j_type == '')
	{
		$("#err_type").html('please select job type');		
		return false;
	}	
	/*
	if(j_category == '')
	{
		$("#err_cat").html('please select job category');		
		return false;
	}
	*/
	if(title == '')
	{
		$("#err_title").html('please enter job title');		
		return false;
	}
	
	if(description == '')
	{
		$("#err_det").html('please enter job description');		
		return false;
	}
	
	if(total_exp == '')
	{
		$("#err_det").html('please enter experience');		
		return false;
	}
	
	// submit form
	$("#eventfrm").submit();
}
</script>
<script>
  tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks,Jsvk",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,ltr,rtl",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks,|,Jsvk",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		//content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>