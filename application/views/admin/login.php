<section class="content">
<!-- Main row -->
<div class="row">
	
    <div class="col-lg-9">
	    <section class="panel">
		  <header class="panel-heading">Login</header>
		  <div class="panel-body">					
			  <form class="form-horizontal" role="form" method="post" action="<?php echo base_url()?>ado/Admin/loginValidate">					
					<?php if(!empty($error)) { ?>	
					<div class="form-group">					  
					  <div class="col-lg-10">
					    <p class="help-block"><p style="color:#F83A18"><?php echo $error;?></p></p>
					  </div>
				    </div>					
					<?php } ?>
					
					<div class="form-group">
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">User Name</label>
					  <div class="col-lg-10">
						  <input type="text" required="true" class="form-control" name="email" id="email" placeholder="email" value="<?php echo set_value("email"); ?>" maxlength="35">
						  <p class="help-block"><?php echo form_error('email','<p style="color:#F83A18">','</p>'); ?></p>
					  </div>
				    </div>					
					<div class="form-group">
					  <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Password</label>
					  <div class="col-lg-10">
						  <input type="password" required="true" class="form-control" name="password" id="password" placeholder="password" value="" maxlength="25">
						  <p class="help-block"><?php echo form_error('password','<p style="color:#F83A18">','</p>'); ?></p>
					  </div>
				    </div>					
										
				    <div class="form-group">
					  <div class="col-lg-offset-2 col-lg-10">
						  <button type="submit" class="btn btn-danger">Login</button>
						  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						  <a href="<?php echo base_url();?>talgo/interns/forgotPassword">forgot password?</a>
					  </div>
				    </div>
			  </form>
		    </div>
	    </section>	  
    </div>   
</div>
					
</section><!-- /.content -->