<section class="content">
<!-- Main row -->
<div class="row">
   <div class="col-md-12">
		<section class="panel">
					<?php echo $this->session->flashdata('verify_msg'); ?>	
		  <header class="panel-heading">Blogs</header>							
		<div class="panel-body table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
					  <th>#</th>
					  <th>Topic</th>					  				  				  
					  <th>Created</th>
					  <th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$count = 1;
					foreach($blogs as $blog)
					{
					?>
					<tr>
					  <td><?php echo $count;?></td>
					  <td><?php echo $blog->topic;?></td>					  
					  <td><?php echo $blog->created;?></td>
					  <td>	
						  <a href="#" data-toggle="modal" data-target="#blogview" onclick="viewBlog(<?php echo $blog->id;?>);">
								<span class="glyphicon glyphicon-eye-open" title="view details"></span>
						  </a>
						   &nbsp;&nbsp; &nbsp;&nbsp;
						  
						   <a href="<?php echo base_url();?>ado/Admin/editBlog/<?php echo $blog->id;?>">
								<span class="glyphicon glyphicon-pencil" title="Edit"></span>
						  </a>
						  
						   &nbsp;&nbsp; &nbsp;&nbsp;
							<?php 
							if($blog->status == 1)
							{
							?>
								<a href="<?php echo base_url();?>ado/Admin/changeStatus/<?php echo $blog->id;?>/0/blog_articles/Blogs" >
									<span class="label label-success" title="change status (delete this)">&nbsp;</span>
								</a>
							<?php
							}
							else
							{
							?>
								<a href="<?php echo base_url();?>ado/Admin/changeStatus/<?php echo $blog->id;?>/1/blog_articles/Blogs" >
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

<div class="modal fade" id="blogview" role="dialog">
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
// view blog	
function viewBlog(blog_id)
{	
	
	$.ajax({
		type: "POST",
		url: baseurl+ "ado/Admin/viewBlog",
		dataType: 'html',
		data: {blog_id:blog_id},
		success: function(res)
		{
			//console.log(res);
			//alert(res);	return false;		
			$("#exp_dt").html(res);								
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});
}
</script>