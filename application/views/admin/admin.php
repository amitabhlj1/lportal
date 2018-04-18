<section class="content">
<!-- Main row -->
<div class="row">
   <div class="col-md-12">
		<section class="panel">
					<?php echo $this->session->flashdata('verify_msg'); ?>	
		  <header class="panel-heading">Recent Employers</header>							
		<div class="panel-body table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
					  <th>#</th>
					  <th>Name</th>					  
					  <th>Company</th>					  
					  <th>Email</th>				  
					  <th>Mobile</th>
					  <th>Social</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$count = 1;
					foreach($employers as $employer)
					{
						$isSocial = ($employer->social_login == 1) ? 'yes' : '';
					?>
					<tr>
					  <td><?php echo $count;?></td>
					  <td><?php echo $employer->first_name .' '. $employer->last_name;?></td>
					  <td><?php echo $employer->company_name;?></td>
					  <td><?php echo $employer->email;?></td>						  
					  <td><?php echo $employer->mobile;?></td>
					  <td><?php echo $isSocial;?></td>
					  <td>							
						<?php 
							if($employer->status == 1)
							{
							?>
								<a href="<?php echo base_url();?>ado/Admin/changeStatus/<?php echo $employer->id;?>/0/lang_company" >
									<span class="label label-success" title="change status (delete this)">&nbsp;</span>
								</a>
							<?php
							}
							else
							{
							?>
								<a href="<?php echo base_url();?>ado/Admin/changeStatus/<?php echo $employer->id;?>/1/lang_company" >
									<span class="label label-danger" title="change status (undelete this)">&nbsp;</span>
								</a>
							<?php
							}
						?>								
					  </td>
					  <td>	<!--							
							<a href="<?php echo base_url();?>ado/Admin/edit/<?php echo $employer->id;?>" title='edit this'>		
								<button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
							</a> 
							-->
					  </td>
					</tr>
					<?php
					}
					?>
				</tbody>
			  </table>
		  </div>
	    </section>
	</div><!--end col-6 -->
</div>	
<div class="row">
   <div class="col-md-12">
		<section class="panel">
					<?php echo $this->session->flashdata('verify_msg'); ?>	
		  <header class="panel-heading">Recent Experts</header>							
		<div class="panel-body table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
					  <th>#</th>
					  <th>Name</th>					  			  
					  <th>Email</th>				  
					  <th>Mobile</th>
					  <th>Social</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$count = 1;
					foreach($experts as $expert)
					{
						$isSocial = ($expert->social_login == 1) ? 'yes' : '';
					?>
					<tr>
					  <td><?php echo $count;?></td>
					  <td><?php echo $expert->first_name .' '. $expert->last_name;?></td>
					  <td><?php echo $expert->email;?></td>						  
					  <td><?php echo $expert->mobile;?></td>
					  <td><?php echo $isSocial;?></td>
					  <td>							
						<?php 
							if($expert->status == 1)
							{
							?>
								<a href="<?php echo base_url();?>ado/Admin/changeStatus/<?php echo $expert->id;?>/0/lang_expert" >
									<span class="label label-success" title="change status (delete this)">&nbsp;</span>
								</a>
							<?php
							}
							else
							{
							?>
								<a href="<?php echo base_url();?>ado/Admin/changeStatus/<?php echo $expert->id;?>/1/lang_expert" >
									<span class="label label-danger" title="change status (undelete this)">&nbsp;</span>
								</a>
							<?php
							}
						?>								
					  </td>
					  <td>	
						  	<!--							
							<a href="<?php echo base_url();?>talgo/batch/edit/<?php echo $expert->id;?>" title='edit this'>		
							<button class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></button>
							</a> 
						  -->		
					  </td>
					</tr>
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