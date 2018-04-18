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
			<table class="table table-hover">
				<thead>
					<tr>
					  <th>#</th>
					  <th>Type</th>
					  <th>Category</th>
					  <th>Title</th>				  
					  <th>Applicants</th>					  
					  <th>Created</th>
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
						$bStatus = ($job->status == 0) ? 'deactivated by admin' : '';
					?>
					<tr>
					  <td><?php echo $count;?></td>
					  <td><?php echo $job->j_type ;?></td>
					  <td><?php echo $job->j_category;?></td>
					  <td><?php echo $job->title;?></td>						  
					  <td><?php echo $job->j_applicants;?></td>
					  <td><?php echo $job->created;?></td>
					  <td><?php echo $bStatus;?></td> 	
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