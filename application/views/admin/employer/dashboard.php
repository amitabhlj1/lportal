<section class="content">

<!-- Main row -->
<div class="row">
   <div class="col-md-12">
		<section class="panel">	
		  <header class="panel-heading">
			  Your current plan&nbsp;&nbsp;:&nbsp;<b><?php echo $this->config->item('rplans')[$this->session->userdata('r_plan')];?></b>

			  <?php
			  // calculate cv balance
			  $iCVCount = $this->My_model->getNumRows('resume_view_history','company_id',$this->session->userdata('emp_id')); 
			  
			  $iBalance = $this->config->item('rplan_cv')[$this->session->userdata('r_plan')] - $iCVCount;
			  echo '&nbsp;&nbsp;&nbsp; Balance Resumes :&nbsp;&nbsp;:&nbsp;'. $iBalance;
			  ?>
			  
			  <span class='pull-right'><a href='<?php echo base_url(); ?>ado/Employer/changeplan'>Change plan</a></span>

		  </header>							
	    </section>	
	</div>
</div>	
<div class="row">
   <div class="col-md-12">
		<section class="panel">
            <?php echo $this->session->flashdata('verify_msg'); ?>	
		  <header class="panel-heading">Recent Jobs
			  <span class="pull-right"><a href="<?php echo base_url();?>ado/Employer/addJob">Add New</a></span>
		  </header>
		</section>
	     
		<div class="panel-body table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
					  <th>#</th>
					  <th>Type</th>
					  <th>Category</th>
					  <th>Title</th>				  
					  <th>Applicants</th>					  
					  <th>Created</th>
					  <th>Last Date</th>	
					  <th>Status</th>
					  <th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php		
				if(is_array($jobs))
				{
					$count = 1;
					foreach($jobs as $job)
					{
						$strType = $job->j_type == 3 ? 'freelance/prj based' : 'full / part time';
						//$tt = <span class="label label-danger" title="change status (undelete this)">&nbsp;</span>
						$bStatus = ($job->status == 0) ? '<span class="label label-danger" title=" deactivated by admin">&nbsp;</span>' : '<span class="label label-success" title="active">&nbsp;</span>';
					?>
					<tr>
					  <td><?php echo $count;?></td>
					  <td><?php echo $strType ;?></td>
					  <td><?php echo $job->j_category;?></td>
					  <td><?php echo $job->title;?></td>						  
					  <td>
						  <a href="#" data-toggle="modal" data-target="#appview" onclick="viewApplicants(<?php echo $job->id;?>);">
							<span title="view all applicants"><?php echo $job->j_applicants;?></span>
						  </a>
					  </td>
					  <td><?php echo date('F  j, Y',strtotime($job->created)); ?> </td>
					  <td><?php echo date('F  j, Y',strtotime($job->last_date));?></td>
					  <td><?php echo $bStatus;?></td>
					  <td>
						  <a href="#" data-toggle="modal" data-target="#jobview" onclick="viewJob(<?php echo $job->id;?>, <?php echo $job->j_type?>);">
							<span class="glyphicon glyphicon-eye-open" title="view this job"></span>
						  </a>
						  &nbsp;&nbsp; &nbsp;&nbsp;
						  <?php 
						  if($job->j_applicants == 0) 
						  {
						  ?>	  
						  <a href="<?php echo base_url();?>ado/Employer/editJob/<?php echo $job->id;?>">
							<span class="glyphicon glyphicon-pencil" title="edit this"></span>
						  </a>
						  <?php
						  }
						  ?>
					  </td>	  
					</tr>
					<?php
					$count++;	
					}
				}
				else
				{
				?>
					<tr><td>No jobs Found</td></tr>	
				<?php	
				}
				?>
				</tbody>
			  </table>
		  </div>
	    </section>
	</div><!--end col-6 -->
</div>	
</section><!-- /.content -->
<div class="modal fade" id="jobview" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Job Details</h4>
        </div>
        <div class="modal-body">
			<table id="job_dt" class="table table-hover"></table>			
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="appview" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="width:500px;height:600px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Applicants</h4>
        </div>
        <div class="modal-body">
			<table id="job_app" class="table table-hover"></table>			
        </div>
      </div>
    </div>
</div>

<script>
// view all comments for a job	
function viewAllComments(job_id,exp_id)
{	
	//alert(job_id + ' == ' + exp_id); return false;
	//$('#job_id').val(job_id);
	//$('#exp_id').val(exp_id);
	$.ajax({
		type: "POST",
		url: baseurl+ "ado/Employer/viewAllComments",
		dataType: 'html',
		data: {job_id:job_id,exp_id:exp_id},
		success: function(res)
		{
			//console.log(res);
			//alert(res);	//return false;		
			$("#comm_app").html(res);								
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});
}	
	
	
function viewApplicants(job_id)
{		
	$.ajax({
		type: "POST",
		url: baseurl+ "ado/Employer/viewApplicants",
		dataType: 'html',
		data: {job_id:job_id},
		success: function(res)
		{
			//console.log(res);
			//alert(res);	//return false;		
			$("#job_app").html(res);								
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});
}

// change resume subsciption plan	
function changePlan(resume_plan)
{
	// redirect to resume plans details page and add payment gateway their
	alert(rplan);  return false;
	$.ajax({
		type: "POST",
		url: baseurl+ "ado/Employer/changePlan",
		dataType: 'html',
		data: {resume_plan:resume_plan},
		success: function(res)
		{
			//console.log(res);
			alert(res);	//return false;		
			//$("#job_app").html(res);								
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});
}
	
</script>
<script>
    var objDiv = document.getElementById("comm_app");
    objDiv.scrollTop = objDiv.scrollHeight;
</script>