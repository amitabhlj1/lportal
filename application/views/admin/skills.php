<section class="content">
<!-- Main row -->

<div class="row">

   <div class="col-md-12">
		<section class="panel">
					<?php echo $this->session->flashdata('verify_msg'); ?>					
		  <header class="panel-heading">
			  Skills
			</header>	
			<div class="panel-body table-responsive">
				<div class="panel-body">
				  <form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>ado/Admin/saveSkill">
						<input type="hidden"  name="classId" value="<?php echo isset($skills[0]->id) ? $skills[0]->id : ""; ?>">
						<div class="form-group">
						  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Name</label>
						  <div class="col-lg-6">
								<input type='text' class="form-control m-b-6" id="name" name="name" required="true" placeholder="skill name" maxlength="90">
							  <p class="help-block" style="color:#F83A18"><span id="err_clas"></span></p>
						  </div>
						</div>
						<div class="form-group">
						  <div class="col-lg-offset-2 col-lg-10">
							  <button type="submit" class="btn btn-danger">Save</button>
						  </div>
						</div>
				  </form>
				</div>
			</div>
	    </section>
	</div><!--end col-6 -->
</div>

<div class="row">

   <div class="col-md-12">
		<section class="panel">
					<?php echo $this->session->flashdata('verify_msg'); ?>					
			<div class="panel-body table-responsive">
				<table id="all_std" class="table table-hover">
					<thead>
						<tr>
						  <th class="nosort">#</th>
						  <th>Name</th>
						  <th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php	
						if(is_array($skills) )
						{
							$count = 1;						
							foreach($skills as $skill)
							{
							?>
							<tr>
								<td><?php echo $count;?></td>
								<td><?php echo $skill->name ;?></td>
								<td>							
								<?php 
								if($skill->status == 1)
								{
								?>
									<a href="<?php echo base_url();?>ado/Admin/changeStatus/<?php echo $skill->id;?>/0/job_skills/Skills" >
										<span title="change status (delete this)"><i style="color:green" class="fa fa-times-circle-o"></i></span>
									</a>	
								<?php
								}
								else
								{
								?>
									<a href="<?php echo base_url();?>ado/Admin/changeStatus/<?php echo $skill->id;?>/1/job_skills/Skills" >
										<span class="glyphicon glyphicon-ok-circle" title="change status (undelete this)" style="color:red">&nbsp;</span>
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
					?>	
					</tbody>
				</table>
		  </div>
	    </section>
	</div><!--end col-6 -->
</div>
			
</section><!-- /.content -->