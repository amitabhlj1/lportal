<?php $user = $user_data[0]; ?>
<div class="main">
<hr class="divider-w">
<section class="module" id="contact">
  <div class="container">
	<div class="row">
	  <div class="col-sm-6 col-sm-offset-3">
		<h2 class="module-title font-alt">Language Expert - Signup (Step-2)</h2>
		<div class="module-subtitle font-serif"></div>
	  </div>
	</div>
	<div class="row">
      <div class="col-sm-2">
        &nbsp;
      </div>
	  <div class="col-sm-8">
		<form id="registerForm" role="form" method="post" action="<?php echo base_url() ?>LangExpert/savedetails">
			<div class="form-group">
				<div class="alert alert-success">
                  <strong><i class="fa fa-check-circle-o"></i></strong> Registeration Step - 1 Completed successfully.
                </div>
                <div class="alert alert-info">
                  <strong><i class="fa fa-info-circle"></i></strong> Please confirm your email by clicking on the activation link received in your mail.
                </div>
                <div class="alert alert-warning">
                  <strong><i class="fa fa-warning"></i></strong> This page will be valid for 10 minutes only, so please fill up the details fast.
                </div>
		  	</div>
			<div class="form-group">
				<label class="sr-only" for="name">Country</label>
				<input type="hidden" name="email" value="<?php echo $email; ?>">
				<select class="form-control" id="country" disabled="true">
					<option value=''>select country</option>
					<?php
                        foreach($country as $c){ ?>
                            <option value='<?php echo $c->id; ?>' <?php if($c->id == $user->country) echo "selected"; ?> > <?php echo $c->c_name; ?> </option>";
                    <?php
                        }
                    ?>
				</select>
		  	</div>
		  	<div class="form-group">
				<label class="sr-only" for="name">Select State:</label>
				<select name="state" id="state" class="form-control" onchange="change_cities(this.value)">
				    <option value="">Select State</option>
				    <?php 
                        $states = $this->My_model->selectRecord('states', '*', array('c_id' => $user->country), '');
                        foreach($states as $s){
                            echo "<option value='".$s->id."'>".$s->name."</option>";
                        }
                    ?>
				</select>
				<p class="help-block text-danger" id="err_state"></p>
		  	</div>
		  	<div id="cities" class="form-group">
				
		  	</div>
		  	<div class="form-group">
		  	    <label class="sr-only" for="address">Address</label>
				<input class="form-control" type="text" id="address" name="address" placeholder="Your Current Address" />
				<p class="help-block text-danger" id="err_add"></p>
		  	</div>
		  	<div class="form-group">
				<label class="sr-only" for="current_position">Current Position</label>
				<input class="form-control" type="text" id="current_position" name="current_position" placeholder="Your Current Position Eg. Translator, Fresher.." />
				<p class="help-block text-danger" id="err_cp"></p>
		  	</div>
		  	<div class="form-group">
				<label class="sr-only" for="languages">Languages Known</label>
				<select name="languages[]" id="languages" class="form-control" multiple>
				    <?php 
                        foreach($languages as $l){
                            echo "<option value='".$l->id."'>".$l->name."</option>";
                        }
                    ?>
				</select>
				<p class="help-block text-danger" id="err_lang"></p>
		  	</div>
		  	<div class="form-group">
		  	    <select name="total_exp" class="form-control" id="exp">
                    <option value="">Select Your Experience</option>
                    <?php
                        foreach( $this->config->item('job_exp') as $key => $exp)	
                        {
                            if($key < 6){
                    ?>
                            <option value="<?php echo $key; ?>" ><?php echo $exp;?></option>
                    <?php 
                            } else {
                                break;
                            }
                        }?>
                </select>
                <p class="help-block text-danger" id="err_exp"></p>
		  	</div>
		  	<div class="text-center">
				<button class="btn btn-block btn-round btn-d" id="regbtn" type="button" onclick="register();">Register</button>
			</div>
		</form>
			<div class="ajax-response font-alt" id="registerResponse" style="color:green"></div>
	  </div>
	  <div class="col-sm-2">
		&nbsp;
	  </div>
	</div>
  </div>
</section>
<script>
    function change_cities(x){
        var stid = x;
            //alert(cid);
            $.ajax({
                type: "POST",
                url: baseurl+ "expert/return_cities",
                dataType: 'html',
                data: {state: stid},
                success: function(res)
                {
                    $("#cities").html(res+'<p class="help-block text-danger" id="err_cities"></p>');		
                },
                error: function (request, status, error) 
                {
                    console.log(request.responseText);
                    alert(request.responseText);
                }
            });
    }
    function register(){
        $('#state').css('border','1px solid #EAEAEA');
        $('#this_city').css('border','1px solid #EAEAEA');
        $('#address').css('border','1px solid #EAEAEA');
        $('#current_position').css('border','1px solid #EAEAEA');
        $('#languages').css('border','1px solid #EAEAEA');
        $('#exp').css('border','1px solid #EAEAEA');
        
        $('#err_state').html('');
        $('#err_cities').html('');
        $('#err_add').html('');
        $('#err_cp').html('');
        $('#err_lang').html('');
        $('#err_exp').html('');
        
        var state = $('#state').val();
        var this_city = $('#this_city').val();
        var address = $('#address').val();
        var current_position = $('#current_position').val();
        var languages = $('#languages').val();
        var exp = $('#exp').val();
        
        if(state == ""){
            $('#err_state').html('Please select state');
			$('#state').css('border','solid 1px #FF0000');
			return false;
        }
        if(this_city == ""){
            $('#err_cities').html('Please select city');
			$('#this_city').css('border','solid 1px #FF0000');
			return false;
        }
        if(address == "" || address.length>200){
            $('#err_add').html('Please Enter Your Address, in less than 200 Characters. Be Precise.');
			$('#address').css('border','solid 1px #FF0000');
			return false;
        }
        if(current_position == ""){
            $('#err_cp').html('Please Enter your current position, if not employed write Fresher or Actively Looking.');
			$('#current_position').css('border','solid 1px #FF0000');
			return false;
        }
        if(languages == ""){
            $('#err_lang').html('Please Select language(s) in which you expertise');
			$('#languages').css('border','solid 1px #FF0000');
			return false;
        }
        if(exp == ""){
            $('#err_exp').html('Select Your total experience');
			$('#exp').css('border','solid 1px #FF0000');
			return false;
        }
        $('#registerForm').submit();
    }
</script>