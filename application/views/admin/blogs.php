<section class="content">
<!-- Main row -->
<div class="row">
   <div class="col-md-7">
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
	</div>
	<div class="col-md-5">
        <section class="panel">
            <header class="panel-heading">
                Blog Types <a style="margin-left:10px;" href="" data-toggle="modal" data-target="#newType">
                    <button class="btn btn-primary btn-addon btn-sm"><i class="fa fa-plus"></i> Add Type</button>
                </a>
                <?php 
                    if(isset($_GET['bt'])){
                       if($_GET['bt'] == 1){
                           echo "<span class='small' style='color:red;'>New Blog Type added Successfully!</span>";
                       } else if($_GET['bt'] == 0) {
                           echo "<span class='small' style='color:red;'>Something went wrong!</span>";
                       }
                    } 
                    if(isset($_GET['but'])){
                       if($_GET['but'] == 1){
                           echo "<span class='small' style='color:red;'>Blog Type updated Successfully!</span>";
                       } else if($_GET['but'] == 0) {
                           echo "<span class='small' style='color:red;'>Nothing Happened!</span>";
                       }
                    }
                ?>
            </header>
            <div class="panel-body table-responsive" style="height:250px; overflow-y:auto;">
               <table class="table table-hover">
                   <thead>
                       <tr>
                           <th>#</th>
                           <th>Blog Type</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                   <tbody>
                       <?php 
                        if(is_array($article_types)){
                            $count = 1;
                            foreach($article_types as $tp){ ?>
                            <tr>
                                <td>
                                    <?php echo $count; ?>
                                </td>
                                <td>
                                    <?php echo $tp->name; ?>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#editType" onclick="sendValue(<?php echo $tp->id.", '".$tp->name."'"; ?>);"><button class="btn btn-success btn-xs">
                                        <i class="fa fa-pencil"></i>
                                    </button></a>
                                </td>
                            </tr>
                        <?php 
                                $count++;
                            }
                        } else {
                            echo "<tr><td colspan='3'>Nothing to show, something happened!</td></tr>";
                        }
                       ?>
                   </tbody>
               </table> 
            </div>
        </section>
    </div>
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
<!--==================Article modification Modals=======================-->
<div class="modal fade" id="newType" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Article Type</h4>
        </div>
        <div class="modal-body">
        <form action="<?php echo base_url("ado/Admin/insert_bt") ?>" method="post">
          <label>New article name:</label> <br/> 
          <input name="a_type1" type="text" class="form-control"/><br/>
          <button type="submit" class="btn btn-sm btn-info form-control">Save</button>
        </form>
        </div>
      </div>
    </div>
  </div>
 <!--Article Type Update Modal -->
  <div class="modal fade" id="editType" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Article Type</h4>
        </div>
        <div class="modal-body">
        <form action="<?php echo base_url("ado/Admin/update_bt") ?>" method="post">
          <label>Change article name:</label> <br/> 
          <input id="a_type" name="a_type" type="text" class="form-control"/><br/>
          <input type="hidden" id="a_id" name="a_id" />
          <button type="submit" class="btn btn-sm btn-info form-control">Update</button>
        </form>
        </div>
      </div>
    </div>
  </div>
<!--=================Modals End Here=================-->
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
function sendValue(id, name){
    //alert(id+" "+name);
    document.getElementById('a_type').value = name;
    document.getElementById('a_id').value = id;
}
</script>