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
				<span id="mailmessage" style="color:green">
					<?php if(!empty($msgsucc)) {
						echo $msgsucc;
						} ?>
				</span>		
				<form class="form-horizontal" id="eventfrm" role="form" method="post" action="<?php echo base_url()?>talgo/events/saveEvent">					
				
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
						  <p class="help-block"><div id="err_key" style="color:#F83A18"></div></p>
					  </div>
				    </div>
					<div class="form-group">					
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Category</label>
					  <div class="col-lg-10">
						<select required="true" class="form-control m-b-10" name="language" id="language">
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
						  <p class="help-block"><div id="err_key" style="color:#F83A18"></div></p>
					  </div>
				    </div>
					<div class="form-group">					
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Title</label>
					  <div class="col-lg-10">
						  <input type="text" required="true" class="form-control" name="event_title" id="event_title" placeholder="title" value="" maxlength="200">
						  <p class="help-block"><div id="err_title" style="color:#F83A18"></div></p>
					  </div>
				    </div>	
					<div class="form-group">
					  <label for="description" class="col-lg-2 col-sm-2 control-label">Skills</label><div class="col-lg-10">
						 <input type="text" class="form-control" name="skills" id="skills" placeholder="title" value="" maxlength="400">
						  <p class="help-block"><div id="err_desc" style="color:#F83A18"></div></p>
					  </div>
				    </div>					
					<div class="form-group">
						<p class="help-block"><div id="msg_succ" style="margin-left:200px;color:#44e028"></div></p>
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Job Detail</label>
					  <div class="col-lg-10">
						  <textarea id="description" name="description" class="msg-input" placeholder="Job details..." rows="6" cols="90"></textarea>
						  <p class="help-block"><div id="err_desc" style="color:#F83A18"></div></p>
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
	$("#err_key").html('');
	$("#err_title").html('');
	$("#err_desc").html('');
	$("#err_date").html('');
	
	var event_keywords  = $("#event_keywords").val();
	var event_title     = $("#event_title").val();	
	var event_date      = $("#event_date").val();
	
	if(event_keywords == '')
	{
		$("#err_key").html('please write keywords');		
		return false;
	}	
	if(event_title == '')
	{
		$("#err_title").html('please write event title');		
		return false;
	}			
	
	$("#eventfrm").submit();
}
</script>