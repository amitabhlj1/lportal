<section class="content">
<!-- Main row -->
<div class="row">
   <div class="col-md-12">
		<section class="panel">
					<?php echo $this->session->flashdata('verify_msg'); ?>	
		  <header class="panel-heading">Recent Jobs
			  <span class="pull-right"><a href="<?php echo base_url();?>ado/Employer/addJob">Add New</a></span>
		  </header>							
		<div class="panel-body table-responsive">
			<table id="my_jobs" class="table table-hover">
				<thead>
					<tr>
					  <th>#</th>
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
						$bStatus = ($job->status == 0) ? 'Awaiting Approval' : 'Approved';
					?>
					<tr>
					  <td><?php echo $count;?></td>
					  <td><?php echo $job->title;?></td>						  
					  <td>
						  <a href="<?php echo base_url();?>Employer/viewApplicants/<?php echo $job->id;?>"><?php echo $job->j_applicants;?>
						  </a>	  
					  </td>
					  <td><?php echo $job->created;?></td>
					  <td><?php echo $job->last_date;?></td>
					  <td><?php echo $bStatus;?></td>
					  <td>
						  <a href="#" data-toggle="modal" data-target="#jobview" onclick="viewJob(<?php echo $job->id;?>);">
							<span class="glyphicon glyphicon-eye-open" title="view this job"></span>
						  </a>
						  &nbsp;&nbsp; &nbsp;&nbsp;
						  <a href="#" data-toggle="modal" data-target="#expview" onclick="editJob(<?php echo $job->id;?>);">
							<span class="glyphicon glyphicon-pencil" title="edit this"></span>
						  </a>
					  </td> 		
					</tr>
					<?php
                        $count++;
					}
				}
				else
				{
				?>
					<tr><td>You have not posted any jobs yet!</td></tr>	
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