<script type="text/javascript" src="<?php echo base_url();?>assets/js/tinymce_3_5/jscripts/tiny_mce/tiny_mce.js"></script>
<link href="<?php echo base_url(); ?>assets/css/addTags.css" rel="stylesheet">
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
	  
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCa0L27dpX-xgwglyvc9jtNZ2_sJt_JNq4&libraries=places&callback=initAutocomplete" async defer></script>
<section class="content">
<!-- Main row -->
<div class="row">
	
    <div class="col-lg-10">
	    <section class="panel">
			<header class="panel-heading">
			  Add New Job
				<a href="<?php echo base_url();?>ado/Employer/">
						<button class="btn btn-sm btn-primary pull-right" type="submit">cancel</button>
				</a>		
			</header>
			<div class="panel-body">
			<?php
			if($jobs[0]->j_type == 3)	 // freelance project based
			{
			?>
				<form class="form-horizontal" id="eventfrm" role="form" method="post" action="<?php echo base_url()?>ado/Employer/saveProjectJob">	
			<?php	
			}
			else
			{	
			?>	
				<form class="form-horizontal" id="eventfrm" role="form" method="post" action="<?php echo base_url()?>ado/Employer/saveJob">
			<?php
			}
			?>		
				<p class="help-block"><div id="msg_succ" style="margin-left:200px;color:#44e028"></div></p>
				<input type="hidden" name="j_id" id="j_id" value="<?php echo $jobs[0]->id;?>">
				<input type="hidden" name="j_type" id="j_type" value="<?php echo $jobs[0]->j_type;?>">
				<!--
					<div class="form-group">					
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Job Type</label>
					  <div class="col-lg-10">
						<select required="true" class="form-control m-b-10" name="j_type" id="j_type">
							<option value="">Select</option>
							<?php
								if($center->id == jobs[0]->j_type)
									$strSel = 'selected';
								else
									$strSel = '';
					  			//jobs[0]->j_type == 'full time' ? 'selected' : '';
							?>
							<option value="full time" <?php echo $jobs[0]->j_type == 'full time' ? 'selected' :'';?>>Full Time</option>
							<option value="part time" <?php echo $jobs[0]->j_type == 'part time' ? 'selected' : '';?>>Part Time</option>
							<option value="Project based" <?php echo $jobs[0]->j_type == 'Project based' ? 'selected' : '';?>>Project Based</option>
						  </select>
						  <p class="help-block"><div id="err_type" style="color:#F83A18"></div></p>
					  </div>
				    </div>
					-->
					<div class="form-group">					
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Category</label>
					  <div class="col-lg-10">
						<select required="true" class="form-control m-b-10" name="j_category" id="j_category">
							<option value="">Select</option>
							<?php
								foreach($cats as $cat)	
								{
									if($cat->id == $jobs[0]->j_category)
										$strSel = 'selected';
									else
										$strSel = '';
							?>
								<option value="<?php echo $cat->id; ?>" <?php echo $strSel;?>><?php echo $cat->cat_name; ?></option>
							<?php } ?>							    
                            </select>
						  <p class="help-block"><div id="err_cat" style="color:#F83A18"></div></p>
					  </div>
				    </div>
					<?php
					if($jobs[0]->j_type == 1)   // full time part time	
					{
					?>
						<div class="form-group">					
						  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Languages</label>
						  <div class="col-lg-10">
							<select required="true" class="form-control m-b-10" name="languages[]" id="languages" multiple>
								<option value="">Select</option>
								<?php
									$aLangs = explode(',',$jobs[0]->languages);
									foreach($langs as $lang)	
									{
										if( in_array($lang->id, $aLangs) )
											$strSel = 'selected';
										else
											$strSel = '';
								?>
									<option value="<?php echo $lang->id; ?>" <?php echo $strSel;?>><?php echo $lang->name; ?></option>
								<?php } ?>							    
								</select>
							  <p class="help-block"><div id="err_langs" style="color:#F83A18"></div></p>
						  </div>
						</div>
					<?php
					}
					?>
					
					<?php
					if($jobs[0]->j_type == 3)   // project based / freelance	
					{
					?>
						<div class="form-group">					
						  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">From Language</label>
						  <div class="col-lg-10">
							<select required="true" class="form-control m-b-10" name="from_language" id="from_language">
								<option value="">Select</option>
								<?php
									foreach($langs as $lang)	
									{
										if($lang->id == $jobs[0]->from_language)
											$strSel = 'selected';
										else
											$strSel = '';
								?>
									<option value="<?php echo $lang->id; ?>" <?php echo $strSel;?>><?php echo $lang->name; ?></option>
								<?php } ?>							    
								</select>
							  <p class="help-block"><div id="err_flang" style="color:#F83A18"></div></p>
						  </div>
						</div>
						<div class="form-group">					
						  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">To Language</label>
						  <div class="col-lg-10">
							<select required="true" class="form-control m-b-10" name="to_language" id="to_language">
								<option value="">Select</option>
								<?php
									foreach($langs as $lang)	
									{
										if($lang->id == $jobs[0]->to_language)
											$strSel = 'selected';
										else
											$strSel = '';
								?>
									<option value="<?php echo $lang->id; ?>" <?php echo $strSel;?>><?php echo $lang->name; ?></option>
								<?php } ?>							    
								</select>
							  <p class="help-block"><div id="err_tlang" style="color:#F83A18"></div></p>
						  </div>
						</div>
					<?php
					}
					?>
					<div class="form-group">					
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Title</label>
					  <div class="col-lg-10">
						  <input type="text" required="true" class="form-control" name="title" id="title" placeholder="job title" value="<?php echo $jobs[0]->title;?>" maxlength="200">
						  <p class="help-block"><div id="err_title" style="color:#F83A18"></div></p>
					  </div>
				    </div>
			
					<div class="form-group">					
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Keywords</label>
					  <div class="col-lg-10">
						  <input type="text" required="true" class="form-control" name="job_keywords" id="job_key" placeholder="comma separated job keywords" value="<?php echo $jobs[0]->job_keywords;?>" maxlength="450">
						  <p class="help-block"><div id="err_ky" style="color:#F83A18"></div></p>
					  </div>
				    </div>	

					<div class="form-group">
					  <label for="description" class="col-lg-2 col-sm-2 control-label">Skills</label><div class="col-lg-10">
						<input type="text" required="true" class="form-control" name="skills" id="skills" placeholder="skills required for this job" value="<?php echo $jobs[0]->skills;?>" maxlength="250">
						  <p class="help-block"><div id="err_skills" style="color:#F83A18"></div></p>
					  </div>
				    </div>

					<div class="form-group">
					  <label for="description" class="col-lg-2 col-sm-2 control-label">Location / City</label><div class="col-lg-10">
						<input type="text" required="true" class="form-control" name="address" id="autocomplete" placeholder="job location/address" value="<?php echo $jobs[0]->address;?>" maxlength="250">
						  <p class="help-block"><div id="err_loc" style="color:#F83A18"></div></p>
					  </div>
				    </div>

					<div class="form-group">
						<p class="help-block"><div id="msg_succ" style="margin-left:200px;color:#44e028"></div></p>
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Job Detail</label>
					  <div class="col-lg-10">
						  <textarea id="description" name="description" class="msg-input" placeholder="Job details..." rows="6" cols="90"><?php echo $jobs[0]->description;?></textarea>
						  <p class="help-block"><div id="err_det" style="color:#F83A18"></div></p>
					  </div>
				    </div>
					<div class="form-group">
						  <label for="description" class="col-lg-2 col-sm-2 control-label">Experience Required</label><div class="col-lg-10">
							<select class="form-control m-b-10" name="total_exp" id="f_exp">
								<option value="">Select</option>
								<?php
									foreach( $this->config->item('job_exp') as $key => $exp)	
									{
										if($key == $jobs[0]->total_exp)
											$strSel = 'selected';
										else
											$strSel = '';
								?>
									<option value="<?php echo $key; ?>" <?php echo $strSel;?>><?php echo $exp;?></option>
								<?php } ?>							    
							  </select>
							  <p class="help-block"><div id="err_fexp" style="color:#F83A18"></div></p>
						  </div>
						</div>

					<?php
					if($jobs[0]->j_type == 3)   // project based / freelance	
					{
					?>
						<div class="form-group">
						  <label for="description" class="col-lg-2 col-sm-2 control-label">Job Unit</label>
						  <div class="col-lg-10">
						  <select required="true" class="form-control m-b-10" name="unit_name" id="unit_name">
								<option value="">Select</option>
								<?php
									foreach($this->config->item('job_units') as $key => $units)	
									{
										if($key == $jobs[0]->unit_name)
											$strSel = 'selected';
										else
											$strSel = '';
								?>
									<option value="<?php echo $key;?>" <?php echo $strSel;?>><?php echo $units; ?></option>
								<?php } ?>							    
							</select>
							<p class="help-block"><div id="err_unit" style="color:#F83A18"></div></p>
						  </div>	
						</div>	
						<div class="form-group">
						  <label for="description" class="col-lg-2 col-sm-2 control-label">Unit Numbers</label><div class="col-lg-10">
							 <input type="number" class="form-control" name="unit_numbers" id="unit_numbers" placeholder="number of units" value="<?php echo $jobs[0]->unit_numbers;?>" maxlength="5">
							  <p class="help-block"><div id="err_uval" style="color:#F83A18"></div></p>
						  </div>
						</div>	
						<div class="form-group">
						  <label for="description" class="col-lg-2 col-sm-2 control-label">Unit Rate</label><div class="col-lg-10">
							 <input type="text" class="form-control" name="work_rate" id="work_rate" placeholder="unit rate" value="<?php echo $jobs[0]->work_rate;?>"  maxlength="20">
							  <p class="help-block"><div id="err_urate" style="color:#F83A18"></div></p>
						  </div>
						</div>	
					<?php
					}
					?>
					<div class="form-group">
					  <label for="description" class="col-lg-2 col-sm-2 control-label">Last Date</label><div class="col-lg-10">
						 <input type="date" class="form-control" name="last_date" id="last_date" placeholder="title" value="<?php echo $jobs[0]->last_date;?>" >
						  <p class="help-block"><div id="err_ldate" style="color:#F83A18"></div></p>
					  </div>
				    </div>
				    <div class="form-group">
					  <div class="col-lg-offset-2 col-lg-10">
						  <button type="button" class="btn btn-danger" onclick="saveJobs()">Save</button>
					  </div>
				    </div>
				</form>
		    </div>
	    </section>	  
    </div>   
</div>					
</section><!-- /.content -->
<script type="text/javascript">
  var baseurl = "<?php print base_url(); ?>";
</script>
<script>
function saveJobs()
{		
	$("#err_type").html('');
	//$("#err_cat").html('');
	$("#err_title").html('');
	$("#err_skills").html('');
	$("#err_det").html('');
	$("#err_langs").html('');
	
	//var j_id     = $("#j_id").val();
	
	var j_type     = $("#j_type").val();
	var j_category = $("#j_category").val();
	var title      = $("#title").val();
	var skills     = $("#skills").val();
	var description = $("#description").val();
	if(j_type = 1)        // full/part time job
	{
		var languages  = $("#languages").val();
		if(languages == '')
		{
			$("#err_langs").html('please select languages');		
			return false;
		}
	}
	if(j_type == 3)          // freelance/project based job
	{
		var unit_name     = $("#unit_name").val();
		if(unit_name == '')
		{
			$("#err_unit").html('please select unit name');		
			return false;
		}
		//var unit_numbers = $("#j_category").val();
		//var work_rate      = $("#title").val();
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