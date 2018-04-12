<div class="main">
<hr class="divider-w">
<section class="module" id="contact">
  <div class="container">
	<div class="row">
	  <div class="col-sm-6 col-sm-offset-3">
		<h2 class="module-title font-alt">Language Expert</h2>
		<div class="module-subtitle font-serif"></div>
	  </div>
	</div>
	<div class="row">
	  <div class="col-sm-8">
		<form id="registerForm" role="form" method="post" action="">
			<div class="form-group">
				<label class="" for="name">Register</label>
		  	</div>
		  	<div class="form-group">
				<label class="sr-only" for="name">First Name</label>
				<input class="form-control" type="text" id="first_name" name="first_name" placeholder="First Name*" required="required" data-validation-required-message="Please enter your first name." maxlength="50" />
				<p class="help-blk text-danger" id="err_fname"></p>
		  	</div>
			<div class="form-group">
				<label class="sr-only" for="name">Last Name</label>
				<input class="form-control" type="text" id="last_name" name="last_name" placeholder="Last Name" maxlength="50"/>
				<p class="help-blk text-danger" id="err_lname"></p>
		  	</div>
		  	<div class="form-group">
				<label class="sr-only" for="email">Email</label>
				<input class="form-control" type="email" id="email" name="email" placeholder="Your Email*" required="required" maxlength="40" data-validation-required-message="Please enter your email address."/>
				<p class="help-blk text-danger" id="err_email"></p>
		  	</div>
			<div class="form-group">
				<label class="sr-only" for="email">Password</label>
				<input class="form-control" type="password" id="password" name="password" placeholder="your password (minimum 6 characters) *" required="required" maxlength="25" data-validation-required-message="Please enter your email address."/>
				<p class="help-blk text-danger" id="err_psw"></p>
		  	</div>
			<div class="form-group">
				<label class="sr-only" for="name">Country</label>
				<select class="form-control" id="country" name="country">
					<option value=''>select country</option>
					<option value='1'>India</option>
				</select>
				<p class="help-block text-danger"></p>
		  	</div>
		  	<div class="text-center">
				<button class="btn btn-block btn-round btn-d" id="regbtn" type="button" onclick="registerExpert();">Register</button>
			</div>
			
			
		</form>
			<div class="ajax-response font-alt" id="registerResponse" style="color:green"></div>
	  </div>
	  <div class="col-sm-4">
		  
	  	<form id="loginForm" role="form" method="post" action="">
		  <div class="form-group">
			<label class="" for="name">Login</label>
		  </div>	
		  <div class="form-group">
			<label class="sr-only" for="name">user id or Email</label>
			<input class="form-control" type="text" id="user_id" name="user_id" placeholder="user id or Email*" required="required" data-validation-required-message="Please enter your user name."/>
			<p class="help-blk text-danger" id="err_lemail"></p>
		  </div>
		  <div class="form-group">
			<label class="sr-only" for="email">Password</label>
			<input class="form-control" type="password" id="l_password" name="l_password" placeholder="Your password*" required="required" data-validation-required-message="Please enter your password"/>
			<p class="help-blk text-danger" id="err_lpsw"></p>
		  </div>
		  <div class="text-center">
			<button class="btn btn-block btn-round btn-d" id="cfsubmit" type="button" onclick="loginExpert();">Login</button>   &nbsp;&nbsp;&nbsp;  
			<a href="<?php echo base_url()?>/langExpert/forgotPassword">  
			<button class="btn btn-block btn-round btn-d" type="button">Forgot Password</button> 
			 </a>  
		  </div>
			
		</form>
		<div class="ajax-response font-alt" id="loginResponse" style="color:green"></div>
	  </div>
	</div>
  </div>
</section>