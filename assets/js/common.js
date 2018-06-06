function employerDetails(emp_id)
{
	//alert('555 INNNN');
	$.ajax({
		type: "POST",
		url: baseurl+ "ado/Admin/employerDetails",
		dataType: 'html',
		data: {emp_id:emp_id},
		success: function(res)
		{
			//alert(res);	//return false;		
			$("#emp_dt").html(res);								
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});

}

function expertDetails(id)
{
	$.ajax({
		type: "POST",
		url: baseurl+ "ado/Admin/expertDetails",
		dataType: 'html',
		data: {id:id},
		success: function(res)
		{
			//alert(res);	//return false;		
			$("#exp_dt").html(res);								
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});

}

function viewJob(job_id,job_type)
{
	$.ajax({
		type: "POST",
		url: baseurl+ "ado/Employer/viewJob",
		dataType: 'html',
		data: {job_id:job_id,job_type:job_type},
		success: function(res)
		{
			//console.log(res);
			//alert('OPPS'); return false;
			//alert(res);	//return false;		
			$("#job_dt").html(res);								
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});
}

function getLangLevels()
{	
	//alert(baseurl);	//return false;
	var lang_id = $("#language").val();
	//alert(lang_id);
	$.ajax({
		type: "POST",
		url: baseurl+ "talgo/batch/getLangLevels",
		dataType: 'html',
		data: {language: lang_id},
		success: function(res)
		{
			//alert(res);	return false;		
			$("#lang_lavel").css('visibility', 'visible');
			$("#lang_lavel").html(res);								
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});
}

function importStudent()
{			
	var mclass = $("#class").val();
	var section = $("#topic").val();
		
	if(mclass == '')
	{
		$("#err_clas").html('please select class');
		return false;
	}
	else	
		$("#err_clas").html('');
		
    if($("#imptype").is(":not(:checked)"))
	{
        var parent_name = $("#parent_name").val();
		var first_name = $("#first_name").val();
		var email = $("#email").val();
		var mobile = $("#mobile").val();
		var language = $("#language").val();		
		
		if(parent_name == '')
		{
			$("#err_parent").html('please enter parent name');
			return false;
		}
		else	
			$("#err_parent").html('');
		
		if(first_name == '')
		{
			$("#err_fname").html('please enter first name');
			return false;
		}
		else	
			$("#err_fname").html('');
		
		// email validation
		if( !isEmail(email))
		{
			$("#err_email").html('please enter correct email');
			return false;
		}
		else		
			$("#err_email").html('');	
		
		if(mobile == '')
		{
			$("#err_mob").html('please enter Mobile no.');
			return false;
		}
		else	
			$("#err_mob").html('');	
			
		if(!language)
		{
			$("#err_lang").html('please select language');
			return false;
		}
		else	
		{			
			$("#err_lang").html('');		
		}
    }				
	//return false;
	
	$('form#frmStudent').submit();
}

// students practice
function savePractice()
{	
	//alert('kk'); //return false;		
	var ids	 =  $('#ansids').val();
	var aIds = ids.split(',');
	var iTotalAns = 0;
	for(var i = 0; i < aIds.length; i++)
	{
		//alert(aIds[0]);
		var myAns   = $('#ans_'+aIds[i]).val();
		var corrAns = $('#corr_'+aIds[i]).val();
		if(!isInt(myAns))
		{
			$('#err_'+aIds[i]).html('write your answer(only numbers between 1 and 4)');
			return false;
		}
		else
			$('#err_'+aIds[i]).html('');
		if(myAns < 1 || myAns > 4)
		{
			$('#err_'+aIds[i]).html('only numbers between 1 and 4');
			return false;
		}
		else
			$('#err_'+aIds[i]).html('');
		
		
		// show correct answer (29th Jan)
		$('#err_'+aIds[i]).html('Answer: '+corrAns);
		
		if(myAns == corrAns)	
			iTotalAns++; 
		
	} 
	$('#totalcorrect').html(iTotalAns);
	
	// save practice data
	// save Practice Data   aIds.length
	var lang = $('#lang').val();
	var total_qst = aIds.length;
	//alert(lang + ' == ' + total_qst);
	$.ajax({
		type: "POST",
		url: baseurl+ "Student/savePractice",
		dataType: 'html',
		data: {lang: lang,total_qst:total_qst,total_correct_ans:iTotalAns},
		success: function(res)
		{
			//alert(res);	return false;
			//if(res > 0)
			$('#svbtn').prop( "disabled", true )
			//window.location.href = baseurl+'ado/Teacher';	
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});		
	
	//alert('My Marks ; '+iTotalAns);	
	return false;				
}

// function to check for integer
function isInt(value)
{
  return !isNaN(value) && parseInt(Number(value)) == value && !isNaN(parseInt(value, 10));
}

// function to check for only integer or decimal
function isIntDecimal(value)
{
    //var res = value.match(/^\d+(\.\d+)?$/);
    if(!value.match(/^\d+(\.\d+)?$/))
		return false;
    else	
		return true;
}

function closewindow()
{	
	window.close();
}


function studentRegistration()
{		
	//alert('KJJ'); return false; 
	$("#r_parentname").html('');
	$("#r_fname").html('');
	$("#r_email").html('');
	$("#r_psw").html('');
	$("#r_mob").html('');
	$("#r_board").html('');
	$("#r_class").html('');
	$("#r_lang").html('');
	
	$("#r_capt").html('');
	
	var parent_name = $("#parent_name").val();	
	var first_name  = $("#first_name").val();
	var last_name   = $("#last_name").val();	
	var email      = $("#remail").val();
	var password   = $("#rpassword").val(); 
	var mobile     = $("#mobile").val();
	var board      = $("#board").val();
	var class_id     = $("#class").val();
	var language     = $("#language").val();
	
	var captch     = $("#r_captcha").val();
	//alert(language); return false; 
	if(parent_name == '')
	{
		$("#r_parentname").html('please enter parent full name');
		return false;
	}	
	
	if(first_name == '')
	{
		$("#r_fname").html('please enter student first name');
		return false;
	}	
	
	// email validation
	if( !isEmail(email))
	{
		$("#r_email").html('please enter correct email');
		return false;
	}
	
	if(password.length < 5)
	{
		$("#r_psw").html('password must be minimum 5 characters');
		return false;
	}	
	
	// only integers for mobile
	if( !isInt(mobile) )
	{
		$("#r_mob").html('for mobile Only numbers (0,1,2,3 ... 9) allowed.');
			return false;
	}
	if(mobile.length < 10)
	{
		$("#r_mob").html('please enter correct mobile no.');
		return false;
	}
	
	if(board == '')
	{
		$("#r_board").html('please select your board');
		return false;
	}	
	if(class_id == '')
	{
		$("#r_class").html('please select your class');
		return false;
	}	
	
	if(!language)
	{
		$("#r_lang").html('please select language');
		return false;
	}	
	
	//alert(captch); return false;
	
	if(captch != '8')
	{
		$("#r_capt").html('please enter correct value');
		return false;
	}	
	   				
	//alert(strurl); return false;
	$.ajax({
		type: "POST",
		url: baseurl+ "Student/studentRegistration",
		dataType: 'html',
		data: {parent_name:parent_name,first_name:first_name,last_name:last_name,email:email,password:password,mobile:mobile,board:board,class_id:class_id,language:language},
		beforeSend: function()
		{
			$("#loadmessage").show(); 
		},
		success: function(res)
		{
			$("#parent_name").val('');
			$("#first_name").val('');
			$("#remail").val('');
			$("#rpassword").val('');  			
			
			$("#loadmessage").hide(); 
			//alert(batchid +'=='+centerid);
			//alert(res);	return false;
			
			if(res == 1)			
				$("#verify_msg").html('Thank you, Your registration successfull,Please check your mail and veryfy email id!');
			else	
				$("#verify_msg").html('This email id alredy exist,you maybe already register please check your mail!');
			
			//$("#verify_msg").fadeOut(12000);	
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});
}

function schoolLogin()
{	
	$("#r_email").html('');
	$("#r_spass").html('');
		
	var s_email         = $("#email").val();
	var password    = $("#password").val();
	
	if( !isEmail(s_email))
	{
		$("#r_email").html('please enter correct email id');
		return false;
	}
	
	if(password == '')
	{
		$("#r_spass").html('please enter password');
		return false;
	}	
	
	$.ajax({
		type: "POST",
		url: baseurl+ "School/schoolLogin",
		dataType: 'html',
		data: {s_email:s_email,password: password},
		beforeSend: function()
		{
			$("#loadenq").show(); 
		},
		success: function(res)
		{
			$("#email").val('');
			
			$("#loadenq").hide(); 
			//alert(res);	return false;
			if(res == -1)			
				$("#loginMessage").html('Your school registration is not active');
			else if(res == 0)	
				$("#loginMessage").html('Your email id not verified');
			else if(res == 2)	
				$("#loginMessage").html("This email id or password incorrect");
			else	
				window.location.href = baseurl+'ado/School';
			
			//$("#loginMessage").fadeOut(11000);	
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});
}

// email validation
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

// check all check boxes
function checkAll(chkbox,classids)
{		
	//alert(classids); return false;
	if ($("#"+chkbox).is(':checked'))
	{
        $("."+classids).prop("checked", true);
    }
	else
	{
        $("."+classids).prop("checked", false);
    }		
}