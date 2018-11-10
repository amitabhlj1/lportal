<div class="main">
<hr class="divider-w">
<section class="module" id="contact">
  <div class="container">
	<div class="row">
	  <div class="col-sm-6 col-sm-offset-3">
		<h2 class="module-title font-alt">Language Employer</h2>
		<div class="module-subtitle font-serif"></div>
	  </div>
	</div>
	<div class="row">
	  <div class="col-sm-8">
		<form id="contactForm" role="form" method="post" action="php/contact.php">
			<div class="form-group">
				<label class="" for="name">Register</label>
		  	</div>
		  	<div class="form-group">
				<label class="sr-only" for="name">First Name</label>
				<input class="form-control" type="text" id="first_name" name="first_name" placeholder="First Name*" required="required" data-validation-required-message="Please enter your name." maxlength="50" />
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
				<label class="sr-only" for="mobile">mobile</label>
				<input class="form-control" type="text" id="mobile" name="mobile" placeholder="Your contact: +country-code-xxxxx..." required="required" maxlength="40" data-validation-required-message="Please enter your contact/mobile number."/>
				<p class="help-blk text-danger" id="err_mobile"></p>
		  	</div>
			<div class="form-group">
				<label class="sr-only" for="email">Password</label>
				<input class="form-control" type="password" id="password" name="password" placeholder="your password (minimum 6 characters) *" required="required" maxlength="25" data-validation-required-message="Please enter your email address."/>
				<p class="help-blk text-danger" id="err_psw"></p>
		  	</div>
			<div class="form-group">
				<label class="sr-only" for="email">Company Name</label>
				<input class="form-control" type="text" id="company_name" name="company_name" placeholder="your company name" required="required" maxlength="80" data-validation-required-message="Please enter your company name."/>
				<p class="help-blk text-danger" id="err_cmp"></p>
		  	</div>
			<div class="form-group">
				<label class="sr-only" for="name">Country</label>
				<select class="form-control" id="country" name="country">
					<option value=''>select country</option>
					<?php
                        foreach($country as $c){
                            echo "<option value='".$c->id."'>".$c->c_name."</option>";
                        }
                    ?>
				</select>
				<p class="help-block text-danger" id="err_country"></p>
		  	</div>
		  	<div class="text-center">
				<button class="btn btn-block btn-round btn-d" id="regbtn" type="button" onclick="registerEmployer();">Register</button>
			</div>
		</form>
			<div class="ajax-response font-alt" id="registerResponse" style="color:green"></div>
	  </div>
	  <div class="col-sm-4">
		  
	  	<form id="contactForm" role="form" method="post" action="php/contact.php">
		  <div class="form-group">
			<label class="" for="name">Login</label>
		  </div>	
		  <div class="form-group">
			<label class="sr-only" for="name">user id or Email</label>
			<input class="form-control" type="text" id="user_id" name="user_id" placeholder="user id or Email*" required="required" data-validation-required-message="Please enter your user name."/>
			<p class="help-block text-danger"></p>
		  </div>
		  <div class="form-group">
			<label class="sr-only" for="email">Password</label>
			<input class="form-control" type="password" id="l_password" name="l_password" placeholder="Your password*" required="required" data-validation-required-message="Please enter your password"/>
			<p class="help-block text-danger"></p>
		  </div>
		  <div class="text-center">
			<button class="btn btn-block btn-round btn-d" id="cfsubmit" type="button" onclick="loginEmployer();">Login</button> &nbsp;&nbsp;&nbsp;
			<a href="<?php echo base_url()?>LangEmployer/forgotPassword">  
			<button class="btn btn-block btn-round btn-d" type="button">Forgot Password</button> 
			 </a>  
		  </div>
			
			<div class="text-center" style="display:none;">
				<br />
				<script type="in/Login"></script>
			</div>
			
		</form>
		<div class="ajax-response font-alt" id="loginResponse" style="color:green"></div>
	  </div>
	</div>
  </div>
</section>
<script>
	function registerEmployer()
	{
		$('#first_name').removeClass('error_red').addClass('error_green');
		$('#last_name').removeClass('error_red').addClass('error_green');
		$('#email').removeClass('error_red').addClass('error_green');
		$('#password').removeClass('error_red').addClass('error_green');
        $('#mobile').removeClass('error_red').addClass('error_green');
		
		$('#err_fname').html('');	
		$('#err_lname').html('');
		$('#err_email').html('');
		$('#err_psw').html('');
		$('#err_mobile').html('');
		
		
		//alert('KJJ');
		var first_name = $('#first_name').val();
		var last_name  = $('#last_name').val();
		var email      = $('#email').val();
		var password   = $('#password').val();
		var company_name = $('#company_name').val();
		var country    = $('#country').val();
        var mobile     = $('#mobile').val();
		if(first_name == '')
		{
			$('#err_fname').html('Please enter first name');
			$('#first_name').removeClass('error_green').addClass('error_red');
			return false;
		}
		
		// email validation
		if( !isEmail(email))
		{
			$("#err_email").html('please enter correct email');
			$('#email').removeClass('error_green').addClass('error_red');
			return false;
		}
		
        if(mobile == '' || mobile.length < 8 || isNaN(mobile))
		{
			$('#err_mobile').html('Please enter contact/mobile number');
			$('#mobile').removeClass('error_green').addClass('error_red');
			return false;
		}
        
		if(password == '' || password.length < 6)
		{
			$('#err_psw').html('Please enter password');
			$('#password').removeClass('error_green').addClass('error_red');
			return false;
		}
        
		if(country == '')
		{
			$('#err_country').html('Please select your country');
			$('#country').removeClass('error_green').addClass('error_red');
			return false;
		}
        
		$.ajax({
			type: "POST",
			url: baseurl+ "LangEmployer/registerEmployer",
			dataType: 'html',
			data: {first_name:first_name,last_name:last_name,email:email,password:password,company_name:company_name,country:country, mobile:mobile},
			success: function(res)
			{
				//alert(res);	return false;
				if(res == '-1')
					$("#registerResponse").html('This email id is already registerd with us, if this is your email id please login.');
				else
					$("#registerResponse").html('Thank you,We have send a verification email to verify your email id.');
			},
			error: function (request, status, error) 
			{
				alert(request.responseText);
			}
		});
			
	}
	
	function loginEmployer()
	{
		//alert('login');
		$('#user_id').removeClass('error_red').addClass('error_green');
		$('#l_password').removeClass('error_red').addClass('error_green');
		
		$('#err_lemail').html('');
		$('#err_lpsw').html('');
		
		var email      = $('#user_id').val();
		var password   = $('#l_password').val();
		
		if(email == '')
		{
			$('#err_lemail').html('Please enter user id or email id');
			$('#user_id').removeClass('error_green').addClass('error_red');
			return false;
		}
		
		if(password == '')
		{
			$('#err_lpsw').html('Please enter password');
			$('#l_password').removeClass('error_green').addClass('error_red');
			return false;
		}
		
		$.ajax({
			type: "POST",
			url: baseurl+ "LangEmployer/login",
			dataType: 'html',
			data: {email:email,password:password},
			success: function(res)
			{
				//alert(res);	return false;
				if(res == '-1')
					$("#loginResponse").html('Your registration pending,Please wait');
				else if(res == '0')
					$("#loginResponse").html('Please verify your emai id');
				else if(res == '2')
					$("#loginResponse").html('Wrong email id or password');
				else 
					window.location.href = baseurl+'ado/Employer/';	
			},
			error: function (request, status, error) 
			{
				alert(request.responseText);
			}
		});
	}
</script>