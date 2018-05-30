<section class="content">

<!-- Main row -->
<div class="row">
   <div class="col-md-12">
		<section class="panel">
					<?php echo $this->session->flashdata('verify_msg'); ?>	
		  <header class="panel-heading">Resume View History</header>
		</section>
	     
		<div class="panel-body table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
					  <th>#</th>
					  <th>Name</th>	  
					  <th>View/Download</th>
					</tr>
				</thead>
				<tbody>
				<?php		
				if(is_array($history))
				{
					$count = 1;
					foreach($history as $hist)
					{
				?>
					<tr>
					  <td><?php echo $count;?></td>
					  <td><?php echo $hist->first_name . '&nbsp;&nbsp;' .$hist->last_name;?></td>
					  <td><?php echo date('F  j, Y',strtotime($hist->first_view_date)); ?> </td>
					</tr>
					<?php
					$count++;	
					}
				}
				else
				{
				?>
					<tr><td>No records found</td></tr>	
				<?php	
				}
				?>
				</tbody>
			  </table>
		  </div>
	</div><!--end col-6 -->
</div>	
</section><!-- /.content -->