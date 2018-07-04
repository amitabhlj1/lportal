<section class="content">
<!-- Main row -->
<div class="row">
   <div class="col-md-12">
		<section class="panel">
					<?php echo $this->session->flashdata('verify_msg'); ?>	
		  <header class="panel-heading">Jobs</header>							
		<div class="panel-body table-responsive">
			<table class="table table-hover" id='inner_job'>
				<thead>
					<tr>
                      <th>Posted By</th>
					  <th>Type</th>
					  <th>Title</th>				  
					  <th>Applicants</th>					  
					  <th>Created</th>
					  <th>Last Date</th>	
					  <th class="nosort">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php		
				if(is_array($jobs))
				{
					foreach($jobs as $job)
					{
						$strType = $job->j_type == 3 ? '<i class="fa fa-trophy" title="Project/Freelancing"></i>' : '<i class="fa fa-briefcase" title="Full/Part Time"></i>';
						//$tt = <span class="label label-danger" title="change status (undelete this)">&nbsp;</span>
						$bStatus = ($job->status == 0) ? '<span class="label label-danger" title=" deactivated by admin">&nbsp;</span>' : '<span class="label label-success" title="active">&nbsp;</span>';
					?>
					<tr>
                      <td><?php echo $job->company_name; ?></td>
					  <td><?php echo $strType ;?></td>
					  <td><?php echo $job->title;?></td>						  
					  <td>
						  <a href="#" data-toggle="modal" data-target="#appview" onclick="viewApplicants(<?php echo $job->id;?>);">
							<span title="view all applicants"><?php echo $job->j_applicants;?></span>
						  </a>
					  </td>
					  <td><?php echo $job->created;?></td>
					  <td><?php echo $job->last_date;?></td>
					  <td>
						  <a href="#" data-toggle="modal" data-target="#jobview" onclick="viewJob(<?php echo $job->id;?>, <?php echo $job->j_type?>);">
							<span class="glyphicon glyphicon-eye-open" title="view this job"></span>
						  </a>
						   &nbsp;&nbsp; &nbsp;&nbsp;
						  <?php 
						 
							if($job->status == 1)
							{
							?>
								<a href="<?php echo base_url();?>ado/Admin/changeStatus/<?php echo $job->id;?>/0/jobs/jobs" >
									<span class="label label-success" title="change status (delete this)">&nbsp;</span>
								</a>
							<?php
							}
							else
							{
								if( $job->sts == 1 )  // chech employer is approved
						  		{	
							?>
								<a href="<?php echo base_url();?>ado/Admin/changeStatus/<?php echo $job->id;?>/1/jobs/jobs" >
									<span class="label label-danger" title="change status (undelete this)">&nbsp;</span>
								</a>
							<?php
								} else {
                                    echo "<i class='fa fa-ban' title='This Employer has not been approved yet'></i>";
                                }
							}
							?>
					  </td>	  
					</tr>
					<?php
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
      <div class="modal-content">
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
</script>