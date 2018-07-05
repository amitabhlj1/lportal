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
	 
	  <div class="col-sm-6">
		  
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
			<p class="help-blk">You will receive an email to change your password</p>
		  </div>
		  <div class="text-center">
			<button class="btn btn-block btn-round btn-d" id="rpsd" type="button" onclick="recoverPassword();">Recover Password</button>  
		  </div>
			
		</form>
		<div class="ajax-response font-alt" id="loginResponse" style="color:green"></div>
	  </div>
	</div>
  </div>
</section>
<script>
// view all comments for a job	
function recoverPassword()
{	
	$('#user_id').css('border','1px solid #EAEAEA');
	$('#err_lemail').html('');	
	
	var email = $('#user_id').val();
	if(email == '')
	{
		$('#err_lemail').html('Please enter userid or email id');
		$('#user_id').css('border','solid 1px #FF0000');
		return false;		
	}
	
	$.ajax({
		type: "POST",
		url: baseurl+ "LangExpert/mailRecoverPassword",
		dataType: 'html',
		data: {email:email},
		success: function(res)
		{
			//console.log(res);
			//alert(res);	//return false;		
			//$("#comm_app").html(res);		
            if(res=='2'){
                alert('Recovery mail sent. Please follow the steps in the email to recover your password!');
            }
		},
		error: function (request, status, error) 
		{
            alert("Something went wrong, Try again later!");
			//alert(request.responseText);
		}
	});
}
</script>