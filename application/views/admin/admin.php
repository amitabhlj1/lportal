<section class="content">
<!-- Main row -->
<div class="row">
   <div class="col-md-12">
		<section class="panel">
					<?php echo $this->session->flashdata('verify_msg'); ?>	
		  <header class="panel-heading">Recent Employers</header>							
		<div class="panel-body table-responsive">
			<table class="table table-hover" id='rc_emp'>
				<thead>
					<tr>
					  <th>Name</th>					  
					  <th>Company</th>					  
					  <th>Email</th>				  
					  <th>Mobile</th>
					  <th class="nosort">Social</th>
					  <th>Created</th>
					  <th class="nosort">Action</th>
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
					  <td><?php echo $employer->first_name .' '. $employer->last_name;?></td>
					  <td><?php echo $employer->company_name;?></td>
					  <td><?php echo $employer->email;?></td>						  
					  <td><?php echo $employer->mobile;?></td>
					  <td><?php echo $isSocial;?></td>
					  <td><?php if($employer->created == "0000-00-00"){echo "2017-01-01";} else {echo $employer->created;} ?></td>
					  <td>		
						  <a href="#" data-toggle="modal" data-target="#empview" onclick="employerDetails(<?php echo $employer->id;?>);">
								<span class="glyphicon glyphicon-eye-open" title="view details"></span>
						  </a>
						  &nbsp;&nbsp;
						<?php 
							if($employer->status == 1)
							{
							?>
								<a href="<?php echo base_url();?>ado/Admin/changeStatus/<?php echo $employer->id;?>/0/lang_company/Dashboard" >
									<span class="label label-success" title="change status (delete this)">&nbsp;</span>
								</a>
							<?php
							}
							else
							{
							?>
								<a href="<?php echo base_url();?>ado/Admin/changeStatus/<?php echo $employer->id;?>/1/lang_company/Dashboard" >
									<span class="label label-danger" title="change status (undelete this)">&nbsp;</span>
								</a>
							<?php
							}
						?> &nbsp;&nbsp;
						<a class="btn btn-xs btn-success" data-toggle="modal" data-target="#empplan" title="Change Plan For this Employee" onclick="seeplan(<?php echo $employer->id;?>)"><i class="fa fa-money"></i></a>								
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

<div class="modal fade" id="empview" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Employer Details</h4>
        </div>
        <div class="modal-body">
			<table id="emp_dt" class="table table-hover"></table>			
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="empplan" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Employer's Active Plan</h4>
        </div>
        <div class="modal-body" id="plan_body">
						
        </div>
      </div>
    </div>
</div>
	
<div class="row">
   <div class="col-md-12">
		<section class="panel">
					<?php echo $this->session->flashdata('verify_msg'); ?>	
		  <header class="panel-heading">Recent Experts</header>							
		<div class="panel-body table-responsive">
			<table class="table table-hover" id='rc_exp'>
				<thead>
					<tr>
					  <th>Name</th>					  			  
					  <th>Email</th>				  
					  <th>Mobile</th>
					  <th class="nosort">Social</th>
					  <th>Created</th>
					  <th class="nosort">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($experts as $expert)
					{
						$isSocial = ($expert->social_login == 1) ? 'yes' : '';
					?>
					<tr>
					  <td><?php echo $expert->first_name .' '. $expert->last_name;?></td>
					  <td><?php echo $expert->email;?></td>						  
					  <td><?php echo $expert->mobile;?></td>
					  <td><?php echo $isSocial;?></td>
					  <td><?php if($expert->created == "0000-00-00"){echo "2017-01-01";} else {echo $expert->created;} ?></td>
					  <td>	
						  <a href="#" data-toggle="modal" data-target="#expview" onclick="expertDetails(<?php echo $expert->id;?>);">
								<span class="glyphicon glyphicon-eye-open" title="view details"></span>
						  </a>
						  &nbsp;&nbsp; &nbsp;&nbsp;
						<?php 
							if($expert->status == 1)
							{
							?>
								<a href="<?php echo base_url();?>ado/Admin/changeStatus/<?php echo $expert->id;?>/0/lang_expert/Dashboard" >
									<span class="label label-success" title="change status (delete this)">&nbsp;</span>
								</a>
							<?php
							}
							else
							{
							?>
								<a href="<?php echo base_url();?>ado/Admin/changeStatus/<?php echo $expert->id;?>/1/lang_expert/Dashboard" >
									<span class="label label-danger" title="change status (undelete this)">&nbsp;</span>
								</a>
							<?php
							}
						?>								
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

<div class="modal fade" id="expview" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Expert Details</h4>
        </div>
        <div class="modal-body">
			<table id="exp_dt" class="table table-hover"></table>			
        </div>
      </div>
    </div>
</div>

<script>
    function seeplan(x){
        //alert(x);
        $.ajax({
            type: "POST",
            url: baseurl+ "ado/Admin/changeplan",
            dataType: 'html',
            data: {id: x},
            success: function(res)
            {
                $('#plan_body').html(res);
                console.log(res);
            },
            error: function (request, status, error) 
            {
                alert(request.responseText);
            }
        });
    }
    function emp_plan_change(x){
        $("#err_select").html('');
        var plan = $("#rplan").val();
        if(plan == ''){
            $("#err_select").html('Select the plan first!!');
        } else{
            $.ajax({
                type: "POST",
                url: baseurl+ "ado/Admin/emp_plan_change",
                dataType: 'html',
                data: {id: x, resume_plan: plan},
                success: function(res)
                {
                    if(res == 1) {
                        $('#err_select').css('color', 'blue');
                        $('#err_select').html('Awesome, Plan Changed for this employee');
                    } else {
                        $('#err_select').css('color', 'red');
                        $('#err_select').html('something went wrong, try again later');
                    }
                },
                error: function (request, status, error) 
                {
                    alert('Something went wrong!');
                    console.log(request.responseText);
                }
            });   
        }
    }
</script>