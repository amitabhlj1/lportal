<script type="text/javascript" src="<?php echo base_url();?>assets/js/tinymce_3_5/jscripts/tiny_mce/tiny_mce.js"></script>
<section class="content">
<!-- Main row -->
<div class="row">
   <div class="col-md-12">
		<section class="panel">	
		  <header class="panel-heading">Filter Mailing List</header>							
		  <div class="panel-body">
		      <div class="col-lg-12">
		           <form class="form-horizontal">
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="Location">Location:</label>
                        <div class="col-sm-10">
                          <input type="text" name="location" class="form-control" id="location" placeholder="Enter email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="Language">Language:</label>
                        <div class="col-sm-10">
                          <select name="langs[]" class="form-control" multiple>
                              <option></option>
                          </select>
                        </div>
                      </div>
                  </form>
		      </div>
		  </div>
	    </section>
	</div><!--end col-6 -->
</div>	
</section><!-- /.content -->

