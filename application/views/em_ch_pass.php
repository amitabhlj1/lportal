<div class="main">
<hr class="divider-w">
<section class="module" id="contact">
  <div class="container">
	<div class="row">
	  <div class="col-sm-6 col-sm-offset-3">
		<h2 class="module-title font-alt">Change your Password</h2>
		<div class="module-subtitle font-serif"></div>
	  </div>
	</div>
	<div class="row">
      <div class="col-sm-3"></div>
	  <div class="col-sm-6">	  
	  	<form id="loginForm" role="form" method="post" action="<?php echo base_url() ?>langEmployer/changePass">	
		  <div class="form-group">
		    <input value="<?php echo $code; ?>" type="hidden" name="code"/>
			<label class="sr-only" for="name">New password</label>
			<input class="form-control" type="password" id="" name="pwd" placeholder="Your new password. eg: !A^gJ0b$" required="required"/>
		  </div>
		  <div class="form-group">
			<label class="sr-only" for="name">Confirm password</label>
			<input class="form-control" type="password" id="" name="cnf_pwd" placeholder="Confirm your Password" required="required"/>
		  </div>
		  <div class="text-center">
			<button class="btn btn-block btn-round btn-d" id="rpsd" type="submit">Change Password</button>  
		  </div>
			
		</form>
		<div class="ajax-response font-alt" id="loginResponse" style="color:green"></div>
	  </div>
	</div>
  </div>
</section>
