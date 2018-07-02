<style>
    .details{
        display: none;
    }
</style>
<section class="content">
<!-- Main row -->

<div class="row">

   <div class="col-md-12">
		<section class="panel">
					<?php echo $this->session->flashdata('verify_msg'); ?>					
		  <header class="panel-heading">Enquiry</header>	
	    </section>
	</div><!--end col-6 -->
</div>

<div class="row">

   <div class="col-md-12">
		<section class="panel">
					<?php echo $this->session->flashdata('verify_msg'); ?>					
			<div class="panel-body table-responsive">
				<table id="all_enq" class="table table-hover">
					<thead>
						<tr>
						  <th class="nosort">#</th>
						  <th>Name</th>
						  <th>Mobile</th>
						  <th>Email</th>
						  <th>Webite</th>
						  <th>Subject</th>
						  <th>Message</th>	
						</tr>
					</thead>
					<tbody>
					<?php	
						//echo "<pre />"; print_r($students);
						if(is_array($enquiries) )
						{
							$count = 1;						
							foreach($enquiries as $enq)
							{
							?>
							<tr>
								<td><?php echo $count;?></td>
								<td><?php echo $enq->name;?></td>
								<td><?php echo $enq->mobile;?></td>
								<td><?php echo $enq->email;?></td>
								<td><?php echo $enq->website;?></td>
								<td><?php echo $enq->subject;?></td>
								<td><a class="btn btn-xs btn-info mbtn" value="<?php echo $enq->id ?>"><i class="fa fa-eye"></i></a> <a class="btn btn-danger btn-xs delbtn" value="<?php echo $enq->id ?>"><i class="fa fa-trash-o"></i></a></td>
							</tr>
							<tr id="<?php echo $enq->id ?>" class="details"><td colspan='7' style="text-align:justify;"><?php echo $enq->message;?></td></tr>	
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
<script>
    $(document).ready(function() {
        $('.mbtn').click(function() {
            $('#'+$(this).attr("value")).toggle("slow", "swing");
        });
        $('.delbtn').click(function() {
            if(confirm('Are you sure? This enquiry will be deleted permanently.')){
               window.location.href = baseurl+"ado/Admin/deleteEnquiry/"+$(this).attr("value");
            }
        });
    });
</script>