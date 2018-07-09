<section class="content">

<!-- Main row -->
<div class="row">
   <div class="col-md-12">
		<section class="panel">
		  <header class="panel-heading">Resume View History</header>	     
		<div class="panel-body table-responsive">
			<table id="res_his" class="table table-hover">
				<thead>
					<tr>
					  <th>#</th>
					  <th>Name</th>	  
					  <th>View date</th>
					  <th>Action</th>
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
					  <td><?php echo date('m-d-Y',strtotime($hist->first_view_date)); ?> </td>
					  <td><?php echo "<a target='_blank' class='btn btn-xs btn-info' href='".base_url()."ado/Employer/viewProfile/".$hist->expert_id."'><i class='fa fa-eye'></i></a>" ?> </td>
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