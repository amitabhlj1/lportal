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

function getClassTopics(id)
{	
	//alert(id);	return false;
	var board = $("#board").val();
	var language = $("#language").val();
	$.ajax({
		type: "POST",
		url: baseurl+ "ado/material/getClassTopics",
		dataType: 'html',
		data: {classid:id,language:language,board:board},
		success: function(res)
		{
			//alert(res);	return false;					
			$("#clstop").html(res);								
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});
}

function makeMaterial(mattype)
{	
	//alert(mattype);	return false;
	if(mattype == 1)	 // text type
	{
		$("#tptext").css('display', 'block');
		$("#tpfile").css('display', 'none');
		$("#tppdf").css('display', 'none');
	}
	else if(mattype == 2 )	 // pdf file type
	{
		$("#tptext").css('display', 'none');
		$("#tpfile").css('display', 'none');
		$("#tppdf").css('display', 'block');
	}
	else if(mattype == 3)	 // picture file type
	{
		$("#tptext").css('display', 'none');
		$("#tppdf").css('display', 'none');
		$("#tppic").css('display', 'block');
	}	
}

function makeQuestion(mattype)
{	
	//alert(mattype);	return false;
	if(mattype == 1)	 // text type
	{
		$("#tptext").css('display', 'block');
		$("#tppdf").css('display', 'block');
	}
	else if(mattype == 2 )	 // pdf file type
	{
		$("#tppdf").css('display', 'none');
		$("#tptext").css('display', 'block');		
	}	
}

function saveMaterial()
{	
	var board = $("#board").val();
	var language = $("#language").val();
	var mclass = $("#class").val();
	var topic = $("#topic").val();
	
	if(board == '')
	{
		$("#err_brd").html('please select board');
		return false;
	}
	else	
		$("#err_brd").html('');
	
	if(language == '')
	{
		$("#err_lang").html('please select language');
		return false;
	}
	else	
		$("#err_lang").html('');
		
	if(mclass == '')
	{
		$("#err_clas").html('please select class');
		return false;
	}
	else	
		$("#err_clas").html('');
	
	if(topic == '')
	{
		$("#err_top").html('please select topic');
		return false;
	}
	else	
		$("#err_top").html('');
		
	var type = $("#type").val();
	if(type == '')
	{
		$("#err_type").html('please select type');
		return false;
	}
	else	
		$("#err_type").html('');
	
	/*	
	if(type == 1)
	{
		var content = $("#content").val();
		alert(content);
		if(content == '')
		{
			$("#err_content").html('please enter content material');
			return false;
		}
		else	
			$("#err_content").html('');
	}
	*/
	$('form#frmMaterial').submit();
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

function questionLangLevels()
{	
	//alert(baseurl);	return false;
	var lang_id = $("#language").val();
	//alert(lang_id);
	$.ajax({
		type: "POST",
		url: baseurl+ "ado/language/getLangLevels",
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
/*
** chapters for a class
*/
function getClassChapters(class_id)
{		
	//alert(baseurl);	return false;
	var board = $("#board").val();
	var lang_id = $("#language").val();
	//alert(board+' = '+ lang_id + ' ==' +class_id);
	$.ajax({
		type: "POST",
		url: baseurl+ "ado/Teacher/getClassChapters",
		dataType: 'html',
		data: {board:board,lang_id:lang_id,class_id:class_id},
		success: function(res)
		{
			//console.log(res);
			//alert(res);	return false;		
			$("#chap_clas").css('visibility', 'visible');
			$("#chap_clas").html(res);								
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});
}
function makeQuestions()
{	
	//alert(baseurl);	//return false;
	var type_id = $("#type").val();
	//alert(type_id); return false;
	$.ajax({
		type: "POST",
		url: baseurl+ "ado/Teacher/makeQuestions",
		dataType: 'html',
		data: {type_id: type_id},
		success: function(res)
		{
			//alert(res);	return false;		
			$("#qsttype").css('visibility', 'visible');
			$("#qsttype").html(res);								
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});
}

function makeMisQst()
{		
	var sub_type = $("#sub_type").val();	
	$.ajax({
		type: "POST",
		url: baseurl+ "talgo/admin/makeMisQst",
		dataType: 'html',
		data: {sub_type: sub_type},
		success: function(res)
		{
			//alert(res);	return false;		
			//$("#comptype").css('visibility', 'visible');
			$("#comptype").html(res);								
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});
}

function saveQuestions()
{	
	//alert('jjj'); return false;
	$("#err_brd").html('');
	$("#err_lang").html('');
	$("#err_cls").html('');
	$("#err_chap").html('');
	//$("#err_lang").html('');
	
	var type_id     = $("#type").val();
	var board    = $("#board").val();
	var language    = $("#language").val();
	var question_class =  $("#question_class").val();
	var question_chapter  = $("#question_chapter").val();  
	var book_name = $("#book_name").val();  
	var question    = $("#question").val();
	
	if(board == '')
	{
		$("#err_brd").html('please select board');
		return false;
	}
	if(language == '')
	{
		$("#err_lang").html('please select language');
		return false;
	}
	
	if(question_class == '')
	{
		$("#err_cls").html('please select class');
		return false;
	}
	
	if(question_chapter == '')
	{
		$("#err_chap").html('please select a chapter');
		return false;
	}
		
	if(type_id == '1')    // validate objective type questions
	{
		if(question == '')
		{
			$("#err_qst").html('please enter your question');
			return false;
		}
		else
			$("#err_qst").html('');
				
		var main_type = $("#main_type").val();;
		//alert(main_type) ; return false;
		var option_1    = $("#option_1").val();
		var option_2    = $("#option_2").val();
		var option_3    = $("#option_3").val();
		var option_4    = $("#option_4").val();
		var cor_ans     = $("#correct_answer").val();
		
		if(option_1 == '')
		{
			$("#err_option_1").html('please enter option 1');
			return false;
		}	
		else
			$("#err_option_1").html('');
			
		if(option_2 == '')
		{
			$("#err_option_2").html('please enter option 2');
			return false;
		}	
		else
			$("#err_option_2").html('');

		if(option_3 == '')
		{
			$("#err_option_3").html('please enter option 3');
			return false;
		}	
		else
			$("#err_option_3").html('');

		if(option_4 == '')
		{
			$("#err_option_4").html('please enter option 4');
			return false;
		}	
		else
			$("#err_option_4").html('');
			
		if(cor_ans == '')
		{
			$("#err_correct_answer").html('please enter answer( only 1,2,3 or 4)');
			return false;
		}	
		else
			$("#err_correct_answer").html('');		

		if( !isInt(cor_ans) )
		{
			$("#err_correct_answer").html('please enter answer( only 1,2,3 or 4)');
			return false;
		}
		else		
			$("#err_correct_answer").html('');			
			
		if( cor_ans < 1 || cor_ans > 4)
		{			
			$("#err_correct_answer").html(' only 1,2,3 or 4 allowed');
			return false;
		}
		//alert(cor_ans);
			
		$.ajax({
		type: "POST",
		url: baseurl+ "ado/Teacher/saveQuestions",
		dataType: 'html',
		data: {main_type: main_type,type_id: type_id,board:board,language:language,question_class:question_class,question_chapter:question_chapter,book_name:book_name,question:question,option_1:option_1,option_2:option_2,option_3:option_3,option_4:option_4,cor_ans:cor_ans},
		success: function(res)
		{			
			//alert(res);	return false;
			if(res > 0)
				window.location.href = baseurl+'ado/Teacher';	
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
		});	
				
	}
	if(type_id == '2')    // subjective type questions
	{
		if(question == '')
		{
			$("#err_qst").html('please enter your question');
			return false;
		}
		else
			$("#err_qst").html('');
		
		$.ajax({
			type: "POST",
			url: baseurl+ "ado/Teacher/saveQuestions",
			dataType: 'html',
			data: {type_id: type_id,board:board,language:language,question_class:question_class,question_chapter:question_chapter,book_name:book_name,question:question},
			success: function(res)
			{
				//alert(res);	//return false;
				if(res > 0)
					window.location.href = baseurl+'ado/Teacher';	
			},
			error: function (request, status, error) 
			{
				alert(request.responseText);
			}
		});	
	}
	
	if(type_id == '3')    // video
	{	
		
		var question    = $("#question").val();
		if(question == '')
		{
			$("#err_comp").html('please enter you tube video link URL');
			return false;
		}	
		else
			$("#err_comp").html('');
		
		// validate url
		/*
		var re = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
		if (!re.test(question)) { 
			$("#err_comp").html('wrong video URL link');
			return false;
		}
		else
			$("#err_comp").html('');
		*/
		var qst_1    = $("#compqst_1").val();
		if(qst_1 == '')
		{
			$("#err_cmqst1").html('please enter question 1');
			return false;
		}	
		else
			$("#err_cmqst1").html('');
		
		var qst_2  = $("#compqst_2").val();
		if(qst_2 == '')
		{
			$("#err_cmqst2").html('please enter question 2');
			return false;
		}	
		else
			$("#err_cmqst2").html('');	
		
		var qst_3  = $("#compqst_3").val();
		if(qst_3 == '')
		{
			$("#err_cmqst3").html('please enter question 3');
			return false;
		}	
		else
			$("#err_cmqst3").html('');
			
		var qst_4  = $("#compqst_4").val();
		if(qst_4 == '')
		{
			$("#err_cmqst4").html('please enter question 4');
			return false;
		}	
		else
			$("#err_cmqst4").html('');

	
		$.ajax({
			type: "POST",
			url: baseurl+ "ado/Teacher/saveQuestions",
			dataType: 'html',
			data: {type_id: type_id,board:board,language:language,question_class:question_class,question_chapter:question_chapter,book_name:book_name,question:question,qst_1:qst_1,qst_2:qst_2,qst_3:qst_3,qst_4:qst_4},
			success: function(res)
			{
				//alert(res);	//return false;
				if(res > 0)
					window.location.href = baseurl+'ado/Teacher';	
			},
			error: function (request, status, error) 
			{
				alert(request.responseText);
			}
		});		
	}
	//alert(type_id +' KKKK');	return false;
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

function schoolEnquiry()
{	
	//alert('kk'); return false;   
	$("#r_name").html('');
	$("#r_telephone").html('');
	$("#r_mobile").html('');
	$("#r_semail").html('');
	$("#r_psw").html('');
	$("#r_contact").html('');
	$("#r_capt").html('');
	
	var board         = $("#board").val();
	var school_name   = $("#school_name").val();	
	var telephone     = $("#telephone").val();	
	var mobile        = $("#mobile").val();	
	var s_email       = $("#s_email").val();
	var password       = $("#r_password").val();
	var contact_name  = $("#contact_name").val();
	var captch        = $("#s_captcha").val();
	//alert(baseurl); return false; 
	
	if(school_name == '')
	{
		$("#r_name").html('please enter school name');
		return false;
	}	
	
	if( !isInt(telephone) )
	{
		$("#r_telephone").html('for telephone no Only numbers (0,1,2,3 ... 9) allowed.');
			return false;
	}
	if(telephone.length < 5)
	{
		$("#r_telephone").html('telephone no must be minimum 5 digits');
		return false;
	}	
	// only integers for mobile
	if( !isInt(mobile) )
	{
		$("#r_mobile").html('for mobile Only numbers (0,1,2,3 ... 9) allowed.');
			return false;
	}
	if(mobile.length < 10)
	{
		$("#r_mobile").html('please enter correct mobile no');
		return false;
	}
	
	// email validation
	if( !isEmail(s_email))
	{
		$("#r_semail").html('please enter correct email');
		return false;
	}
	
	if(password.length < 5)
	{
		$("#r_psw").html('password must be minimum 5 characters');
		return false;
	}		
	if(contact_name == '')
	{
		$("#r_contact").html('please enter contact person name.');
		return false;
	}
	if(captch != '11')
	{
		$("#r_capt").html('please enter correct value');
		return false;
	}	
	   				
	//alert(strurl); return false;
	$.ajax({
		type: "POST",
		url: baseurl+ "School/enquirySchool",
		dataType: 'html',
		 data: {board:board,school_name:school_name,telephone:telephone,mobile:mobile,s_email:s_email,password:password,contact_name:contact_name},
		beforeSend: function()
		{
			$("#loadmessage_r").show(); 
		},
		success: function(res)
		{
			$("#s_captcha").val('');			
			$("#s_email").val('');			
			
			$("#loadmessage_r").hide(); 
			//alert(res); return false;
			if(res == 1)			
				$("#sch_msg").html('Thank you, Your registration successfull,Please check your mail and veryfy email id!');
			else	
				$("#sch_msg").html('This email id alredy exist,you maybe already register please check your mail!');
			
			$("#sch_msg").fadeOut(12000);	
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