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
				<form class="form-horizontal" id="eventfrm" role="form" method="post" action="<?php echo base_url()?>ado/Employer/saveJob">
					<p class="help-block"><div id="msg_succ" style="margin-left:200px;color:#44e028"></div></p>
					<div class="form-group">					
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Job Type</label>
					  <div class="col-lg-10">
						<select required="true" class="form-control m-b-10" name="j_type" id="j_type">
							<option value="">Select</option>
							<?php
								//if($center->id == $batch[0]->center)
									//$strSel = 'selected';
								//else
									$strSel = '';
							?>
							<option value="full time" <?php echo $strSel;?>>Full Time</option>
							<option value="part time" <?php echo $strSel;?>>Part Time</option>
							<option value="Project based" <?php echo $strSel;?>>Project Based</option>
						  </select>
						  <p class="help-block"><div id="err_type" style="color:#F83A18"></div></p>
					  </div>
				    </div>
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
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Title</label>
					  <div class="col-lg-10">
						  <input type="text" required="true" class="form-control" name="title" id="title" placeholder="job title" value="" maxlength="200">
						  <p class="help-block"><div id="err_title" style="color:#F83A18"></div></p>
					  </div>
				    </div>	
					<div class="form-group">
					  <label for="description" class="col-lg-2 col-sm-2 control-label">Skills</label><div class="col-lg-10">
						 <input type="text" class="form-control" name="skills" id="skills" placeholder="title" value="" maxlength="400">
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
	
	var j_type     = $("#j_type").val();
	var j_category = $("#j_category").val();
	var title      = $("#title").val();
	var skills     = $("#skills").val();
	var description = $("#description").val();
	
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
	// submit form
	$("#eventfrm").submit();
}
</script>