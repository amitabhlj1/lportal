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
				
				<p class="help-block"><div id="msg_succ" style="color:#44e028"></div></p>
				<form class="form-horizontal" id="eventfrm" role="form" method="post" action="<?php echo base_url()?>ado/Employer/saveJob">
					
					<div class="form-group">					
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Job Type</label>
					  <div class="col-lg-10">
						  <input type="radio" name="j_type" value="1" onclick="jobType(this.value);"> Full/Part Time &nbsp;&nbsp;&nbsp;
						  <input type="radio" name="j_type" value="2" onclick="jobType(this.value);"> Project/Freelance
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
									//if($cat->id == $batch[0]->center)
										//$strSel = 'selected';
									//else
										$strSel = '';
							?>
								<option value="<?php echo $cat->id; ?>" <?php echo $strSel;?>><?php echo $cat->cat_name; ?></option>
							<?php } ?>							    
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
										$strSel = '';
							?>
								<option value="<?php echo $lang->id; ?>" <?php echo $strSel;?>><?php echo $lang->name; ?></option>
							<?php } ?>							    
                            </select>
						  <p class="help-block"><div id="err_langs" style="color:#F83A18"></div></p>
					  </div>
				    </div>
					<div class="form-group">					
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Title</label>
					  <div class="col-lg-10">
						  <input type="text" required="true" class="form-control" name="title" id="title" placeholder="job title" value="" maxlength="200">
						  <p class="help-block"><div id="err_title" style="color:#F83A18"></div></p>
					  </div>
				    </div>	
					<div class="form-group">
					  <label for="description" class="col-lg-2 col-sm-2 control-label">Skills</label><div class="col-lg-10">
						<select required="true" class="form-control m-b-10 select2" name="skills[]" id="skills" multiple>
							<option value="">Select</option>
							<?php
								foreach($skills as $skill)	
								{
										$strSel = '';
							?>
								<option value="<?php echo $skill->id; ?>" <?php echo $strSel;?>><?php echo $skill->name; ?></option>
							<?php } ?>							    
                          </select>
						  <p class="help-block"><div id="err_skills" style="color:#F83A18"></div></p>
					  </div>
				    </div>					
					<div class="form-group">
						<p class="help-block"><div id="msg_succ" style="margin-left:200px;color:#44e028"></div></p>
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Job Detail</label>
					  <div class="col-lg-10">
						  <textarea id="description" name="description" class="msg-input" placeholder="Job details..." rows="6" cols="90"></textarea>
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
								<option value="<?php echo $key; ?>"><?php echo $exp;?></option>
							<?php } ?>							    
                          </select>
						  <p class="help-block"><div id="err_exp" style="color:#F83A18"></div></p>
					  </div>
				    </div>	

					<div class="form-group">
					  <label for="description" class="col-lg-2 col-sm-2 control-label">Last Date</label><div class="col-lg-10">
						 <input type="date" class="form-control" name="last_date" id="last_date" placeholder="title" value="" maxlength="400">
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
										//if($cat->id == $batch[0]->center)
											//$strSel = 'selected';
										//else
											$strSel = '';
								?>
									<option value="<?php echo $cat->id; ?>" <?php echo $strSel;?>><?php echo $cat->cat_name; ?></option>
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
											$strSel = '';
								?>
									<option value="<?php echo $lang->id; ?>" <?php echo $strSel;?>><?php echo $lang->name; ?></option>
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
											$strSel = '';
								?>
									<option value="<?php echo $lang->id; ?>" <?php echo $strSel;?>><?php echo $lang->name; ?></option>
								<?php } ?>							    
								</select>
							  <p class="help-block"><div id="err_tlang" style="color:#F83A18"></div></p>
						  </div>
						</div>
						<div class="form-group">					
						  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Title</label>
						  <div class="col-lg-10">
							  <input type="text" required="true" class="form-control" name="f_title" id="f_title" placeholder="job title" value="" maxlength="200">
							  <p class="help-block"><div id="err_f_title" style="color:#F83A18"></div></p>
						  </div>
						</div>	
						<div class="form-group">
						  <label for="description" class="col-lg-2 col-sm-2 control-label">Skills</label><div class="col-lg-10">
							<select required="true" class="form-control m-b-10 select2" name="f_skills[]" id="f_skills" multiple>
							<option value="">Select</option>
							<?php
								foreach($skills as $skill)	
								{
										$strSel = '';
							?>
								<option value="<?php echo $skill->id; ?>" <?php echo $strSel;?>><?php echo $skill->name; ?></option>
							<?php } ?>							    
                          	</select>
							  <p class="help-block"><div id="err_f_skills" style="color:#F83A18"></div></p>
						  </div>
						</div>					
						<div class="form-group">
							<p class="help-block"><div id="msg_succ" style="margin-left:200px;color:#44e028"></div></p>
						  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Job Detail</label>
						  <div class="col-lg-10">
							  <textarea id="f_description" name="f_description" class="msg-input" placeholder="Job details..." rows="6" cols="90"></textarea>
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
									<option value="<?php echo $key; ?>"><?php echo $exp;?></option>
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
							 <input type="number" class="form-control" name="unit_numbers" id="unit_numbers" placeholder="number of units" value="" maxlength="5">
							  <p class="help-block"><div id="err_uval" style="color:#F83A18"></div></p>
						  </div>
						</div>	
						<div class="form-group">
						  <label for="description" class="col-lg-2 col-sm-2 control-label">Unit Rate</label><div class="col-lg-10">
							 <input type="text" class="form-control" name="work_rate" id="work_rate" placeholder="unit rate" value="" maxlength="20">
							  <p class="help-block"><div id="err_urate" style="color:#F83A18"></div></p>
						  </div>
						</div>	

						<div class="form-group">
						  <label for="description" class="col-lg-2 col-sm-2 control-label">Last Date</label><div class="col-lg-10">
							 <input type="date" class="form-control" name="last_date" id="last_date" placeholder="title" value="" maxlength="400">
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
	var description = $("#f_description").val();
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
	var description = $("#description").val();
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