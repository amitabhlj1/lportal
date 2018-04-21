<script type="text/javascript" src="<?php echo base_url();?>assets/js/tinymce_3_5/jscripts/tiny_mce/tiny_mce.js"></script> 
<div id="wrapper"><!-- PAGE WRAPPER-->
  <div id="page-wrapper"><!-- MAIN CONTENT-->
    <div class="main-content"><!-- CONTENT-->
      <div class="content">        
        <div>
          <div class="container">
            
            <div class="row" style="margin-top:20px;">
              <div class="col-md-9">
                <div id="world-news" class="section-category mbn">
					<div class="section-name sec-space">
						<?php echo $profile[0]->first_name ." ".$profile[0]->last_name; ?>
					</div>
					<div class="section-content">
						<div class="row">
							<table class="table table-hover">							
							<tbody>
								<tr>
									<td>Logo</td> 
									<td>
									<div id='preview'>
									<?php $empPath = 'assets/uploads/employer/'; ?>	
									<img src="<?php echo base_url().$empPath.$profile[0]->company_logo; ?>">	
									</div>	
									</td>
									<td>
									<form id="imageform" action="<?php echo base_url();?>ado/Employer/changeLogo" method="post" enctype="multipart/form-data">
										<label>Upload compony logo:</label><br/>
									<div id='imageloadbutton'>	
										<input id="photoimg" name="photoimg" type="file" class="inputFile" />
									</div>	
									</form>
									<div id="targetLayer" style="color:red"></div>
									</td>	
								</tr>
								<tr>
									<td>Email</td>
									<td><?php echo $profile[0]->email ; ?></td>
									<!--
									<td>
										<input type="text" id="email" name="email" placeholder="new email id" value="" maxlength="50">
										<span onclick="javascript:changeEmail();" style="cursor:pointer;">Change</span>
									    <p id="chngemail" style="color:red"></p>				
									</td>	
									-->
								</tr>
								<tr>
									<td>Company</td>
									<td><?php echo $profile[0]->company_name ; ?></td>
									<td>
										<input type="text" id="company_name" name="company_name" placeholder="new name" value="" maxlength="110">
										<span onclick="javascript:changeCompany();" style="cursor:pointer;">Change</span>
									    <p id="errcomp" style="color:red"></p>			
									</td>
								</tr>
								<tr>
									<td>Address</td>
									<td><?php	echo $profile[0]->address ;?></td>
									<td>
										<input type="text" id="address" name="address" placeholder="change address" value="" maxlength="100">
										<span onclick="javascript:saveAddress();" style="cursor:pointer;">change</span>
									    <p id="erraddress" style="color:red"></p>					
									</td>	
								</tr>
								<tr>
									<td>Company Description</td>
									<td><?php echo $profile[0]->company_description ; ?></td>
									<td>
										<input type="text" id="company_description" name="company_description" placeholder="about company" value="" maxlength="110">
										<span onclick="javascript:changeDesc();" style="cursor:pointer;">Change</span>
									    <p id="chngeDesc" style="color:red"></p>										
									</td>
								</tr>
								<tr>
									<td>Mobile</td>
									<td><?php echo $profile[0]->mobile ;?></td>
									<td>
										<input type="text" id="mobile" name="mobile" placeholder="change mobile" value="" maxlength="20">
										<span onclick="javascript:saveMobile();" style="cursor:pointer;">change</span>
									    <p id="errmob" style="color:red"></p>					
									</td>
								</tr>
								<tr>
									<td>Number of Employee</td>
									<td><?php echo $profile[0]->no_emp; ?></td>
									<td>		
										<select id="no_emp">
											<option value="">select</option>
											<option value="Between 1 to 50">Between 1 to 50</option>
											<option value="Between 51 to 100">Between 51 to 100</option>
											<option value="More than 100">More than 100</option>
										</select>
										<span onclick="javascript:saveEmployee();" style="cursor:pointer;">save</span>
									    <p id="errnumemp" style="color:red"></p>	
									</td>
								</tr>										
							</tbody>
						</table>
						</div>							
					</div>
				</div>
              </div>                              
            </div>
                        
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- TWITTER FEED-->
  <div id="back-top"><a href="#top"><i class="fa fa-angle-double-up"></i></a></div>
</div>
<script src="<?php echo base_url();?>assets/js/common.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.form.js"></script>

<script type="text/javascript" >
 $(document).ready(function() { 
		
            $('#photoimg').off('click').on('change', function()			{ 
			           //$("#preview").html('');
					//alert('INNN');
				$("#imageform").ajaxForm({target: '#preview', 
				     beforeSubmit:function(){ 
				
					$("#imageloadstatus").show();
					 $("#imageloadbutton").hide();
					 }, 
					success:function(){ 
				
					 $("#imageloadstatus").hide();
					 $("#imageloadbutton").show();
					}, 
					error:function(){ 
					
					 $("#imageloadstatus").hide();
					$("#imageloadbutton").show();
					} }).submit();
					
			});
        }); 
</script>

<script>	
	function changeEmail()
	{
		//alert('kk'); return false;
		$("#chngemail").html('');	
		var email = $("#email").val();
		
		if( !isEmail(email))
		{
			$("#chngemail").html('please enter correct email');
			return false;
		}
	
		$.ajax({
		type: "POST",
		url: baseurl+ "student/changeEmail",
		dataType: 'html',
		data: {email: email},
		success: function(res)
		{
			//alert(res);	return false;		
			if(res > 0)	
			{		
				$("#chngemail").html('your email id changed, please login with your new email id.');
				
				setTimeout(function() {
				  window.location.href = baseurl+'student/logout';	
				}, 6000);
			}				
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

	function saveAddress()
	{
		//alert('kk');
		$("#erraddress").html('');	
		var address = $("#address").val();
		if(address == '')
		{
			$("#address").focus();
			$("#erraddress").html('please enter address.');		
			return false;
		}
		
		$.ajax({
			type: "POST",
			url: baseurl+ "ado/Employer/saveAddress",
			dataType: 'html',
			data: {address: address},
			success: function(res)
			{
				//alert(res);	return false;		
				if(res > 0)			
					location.reload();			
			},
			error: function (request, status, error) 
			{
				alert(request.responseText);
			}
		});	
	}
	
	function saveMobile()
	{
		//alert('kk');
		$("#errmob").html('');	
		var mobile = $("#mobile").val();
		if(mobile == '')
		{
			$("#mobile").focus();
			$("#errmob").html('please enter mobile number.');		
			return false;
		}
		
		$.ajax({
			type: "POST",
			url: baseurl+ "ado/Employer/saveMobile",
			dataType: 'html',
			data: {mobile: mobile},
			success: function(res)
			{
				//alert(res);	return false;		
				if(res > 0)			
					location.reload();			
			},
			error: function (request, status, error) 
			{
				alert(request.responseText);
			}
		});	
	}
	
	function changeCompany()
	{
		//alert('kk');
		$("#errcomp").html('');	
		var company_name = $("#company_name").val();
		if(company_name == '')
		{
			$("#company_name").focus();
			$("#errcomp").html('please enter company name.');		
			return false;
		}
		
		$.ajax({
			type: "POST",
			url: baseurl+ "ado/Employer/changeCompany",
			dataType: 'html',
			data: {company_name: company_name},
			success: function(res)
			{
				//alert(res);	return false;		
				if(res > 0)			
					location.reload();			
			},
			error: function (request, status, error) 
			{
				alert(request.responseText);
			}
		});	
	}
	function saveAbout()
	{
		//alert('kk');
		$("#errabout").html('');	
		
		var about_me = tinyMCE.activeEditor.getContent();	 // get content from tinimce
	
		var strwords = about_me.replace(/(<([^>]+)>)/ig,"") ;  // Article remove html
		var words = strwords.trim().split(/\s+/).length;       // Article word limit
	
		if(about_me == '')
		{
			$("#errabout").html('please write about youself');		
			return false;
		}		
		if( (words < 20) || (words > 200) )
		{
			$("#errabout").html('Number of words should be between 20 and 200');		
			return false;
		}	
			
		$.ajax({
			type: "POST",
			url: baseurl+ "student/saveAbout",
			dataType: 'html',
			data: {about_me: about_me},
			success: function(res)
			{
				//alert(res);	return false;		
				if(res > 0)			
					$("#errabout").html('Data saved successffuly.');		
			},
			error: function (request, status, error) 
			{
				alert(request.responseText);
			}
		});	
	}
	
	function saveMobile2()
	{
		//alert('kk');
		$("#errmobile2").html('');	
		var mobile2 = $("#mobile2").val();
		if(mobile2 == '')
		{
			$("#mobile2").focus();
			$("#errmobile2").html('please enter other mobile no');		
			return false;
		}
		
		if(mobile2.length != 10)
		{
			$("#mobile2").focus();
			$("#errmobile2").html('only 10 digits allowed');		
			return false;
		}
		// only integers 
		if( !isInt(mobile2) )
		{
			$("#errmobile2").html('Only numbers like (0,1,2,3 ... 9)');
				return false;
		}
	
		$.ajax({
		type: "POST",
		url: baseurl+ "student/saveMobile2",
		dataType: 'html',
		data: {mobile2: mobile2},
		success: function(res)
		{
			//alert(res);	return false;		
			if(res > 0)						
				location.reload();			
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});	
	}
	
	function saveEmployee()
	{
		//alert('kk');
		$("#errnumemp").html('');	
		var no_emp = $("#no_emp").val();
		if(no_emp == '')
		{
			$("#no_emp").focus();
			$("#errnumemp").html('please select.');		
			return false;
		}
		
		$.ajax({
		type: "POST",
		url: baseurl+ "ado/Employer/saveEmployee",
		dataType: 'html',
		data: {no_emp: no_emp},
		success: function(res)
		{
			//alert(res);	return false;		
			if(res > 0)				
				location.reload();
		},
		error: function (request, status, error) 
		{
			alert(request.responseText);
		}
	});	
	}	
</script>
<script>
  tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks,Jsvk",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,ltr,rtl",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks,|,Jsvk",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		//content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>   