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
			
        <div class="text-center btn btn-xs btn-primary form-control" style="background-color:#0077b5; margin-top:2em;">
            <script type="in/Login"></script>
        </div>
		</form>
		<div class="ajax-response font-alt" id="loginResponse" style="color:green"></div>
	  </div>
	</div>
  </div>
</section>
<script>
	function registerExpert()
	{
		$('#first_name').css('border','1px solid #EAEAEA');
		$('#email').css('border','1px solid #EAEAEA');
		$('#password').css('border','1px solid #EAEAEA');
		
		$('#err_fname').html('');	
		$('#err_lname').html('');
		$('#err_email').html('');
		$('#err_psw').html('');
		
		
		//alert('KJJ');
		var first_name = $('#first_name').val();
		var last_name  = $('#last_name').val();
		var email      = $('#email').val();
		var password   = $('#password').val();
		var country    = $('#country').val();
		if(first_name == '')
		{
			$('#err_fname').html('Please enter first name');
			$('#first_name').css('border','solid 1px #FF0000');
			return false;
		}
		
		// email validation
		if( !isEmail(email))
		{
			$("#err_email").html('please enter correct email');
			$('#email').css('border','solid 1px #FF0000');
			return false;
		}
		
		if(password == '' || password.length < 6)
		{
			$('#err_psw').html('Please enter password');
			$('#password').css('border','solid 1px #FF0000');
			return false;
		}
		
		$.ajax({
			type: "POST",
			url: baseurl+ "LangExpert/registerExpert",
			dataType: 'html',
			data: {first_name:first_name,last_name:last_name,email:email,password:password,country:country},
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
	
	function loginExpert()
	{
		//alert('login');
		$('#user_id').css('border','solid 1px #EAEAEA');
		$('#user_id').css('border','solid 1px #EAEAEA');
		
		$('#err_lemail').html('');
		$('#err_lpsw').html('');
		
		var email      = $('#user_id').val();
		var password   = $('#l_password').val();
		
		if(email == '')
		{
			$('#err_lemail').html('Please enter user id or email id');
			$('#user_id').css('border','solid 1px #FF0000');
			return false;
		}
		
		if(password == '')
		{
			$('#err_lpsw').html('Please enter password');
			$('#l_password').css('border','solid 1px #FF0000');
			return false;
		}
		
		$.ajax({
			type: "POST",
			url: baseurl+ "LangExpert/login",
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
					window.location.href = baseurl+'ado/Expert/';	
			},
			error: function (request, status, error) 
			{
				alert(request.responseText);
			}
		});
	}
    // Setup an event listener to make an API call once auth is complete
    function onLinkedInLoad() {
        IN.Event.on(IN, "auth", getProfileData);
    }
    
    // Use the API call wrapper to request the member's profile data
    function getProfileData() {
        IN.API.Profile("me").fields("id", "first-name", "last-name", "headline", "location", "picture-url", "public-profile-url", "email-address").result(displayProfileData).error(onError);
    }

    // Handle the successful return from the API call
    function displayProfileData(data){
        var user = data.values[0];
        //console.log(user);
        $.ajax({
			type: "POST",
			url: baseurl+ "LangExpert/linkedinlogin",
			dataType: 'html',
			data: {first_name:user.firstName,last_name:user.lastName,email:user.emailAddress,country:user.location.country.code,image:user.pictureUrl,	social_id_no:user.id,social_name:'l'},
			success: function(res)
			{
				if(res == '-1')
					$("#loginResponse").html('Something went wrong,Please try again later');
				else 
					window.location.href = baseurl+'expert';
                    //$("#loginResponse").html(res);
			},
			error: function (request, status, error) 
			{
				alert(request.responseText);
			}
		});       
    }

    // Handle an error response from the API call
    function onError(error) {
        console.log(error);
    }
    
    // Destroy the session of linkedin
    function logout(){
        IN.User.logout(removeProfileData);
    }
    
    // Remove profile data from page
    function removeProfileData(){
        document.getElementById('profileData').remove();
    }
</script>