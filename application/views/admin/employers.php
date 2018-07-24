<script type="text/javascript" src="<?php echo base_url();?>assets/js/tinymce_3_5/jscripts/tiny_mce/tiny_mce.js"></script>
<section class="content">
<!-- Main row -->
<div class="row">
   <div class="col-md-12">
		<section class="panel">
					<?php echo $this->session->flashdata('verify_msg'); ?>	
		  <header class="panel-heading">Employers <span class="small pull-right">**(Click on the rows to select employers)**&nbsp;<button id="send_mail" class="btn btn-xs btn-success" data-toggle="modal" data-target="#mailer"><i class="glyphicon glyphicon-envelope"></i> Send Mail</button></span></header>							
		<div class="panel-body table-responsive">
			<table class="table table-hover" id='inner_emp'>
				<thead>
					<tr>
					  <th>Name</th>					  
					  <th>Company</th>					  
					  <th>Email</th>				  
					  <th>Mobile</th>
					  <th class="nosort">Social</th>
					  <th>Created</th>
					  <th class="nosort">Action</th>	
					</tr>
				</thead>
				<tbody>
					<?php
					$count = 1;
					foreach($employers as $employer)
					{
						$isSocial = ($employer->social_login == 1) ? 'yes' : '';
					?>
					<tr>
					  <td><?php echo $employer->first_name .' '. $employer->last_name;?></td>
					  <td><?php echo $employer->company_name;?></td>
					  <td><?php echo $employer->email;?></td>						  
					  <td><?php echo $employer->mobile;?></td>
					  <td><?php echo $isSocial;?></td>
					  <td><?php if($employer->created=="0000-00-00"){echo "2017-01-01";} else {echo $employer->created;} ?></td>
					  <td>	
						  <a href="#" data-toggle="modal" data-target="#empview" onclick="employerDetails(<?php echo $employer->id;?>);">
								<span class="glyphicon glyphicon-eye-open" title="view details"></span>
						  </a>
						   &nbsp;
							<?php 
							if($employer->status == 1)
							{
							?>
								<a href="<?php echo base_url();?>ado/Admin/changeStatus/<?php echo $employer->id;?>/0/lang_company/employers" >
									<span class="label label-success" title="change status (delete this)">&nbsp;</span>
								</a>
							<?php
							}
							else
							{
							?>
								<a href="<?php echo base_url();?>ado/Admin/changeStatus/<?php echo $employer->id;?>/1/lang_company/employers" >
									<span class="label label-danger" title="change status (undelete this)">&nbsp;</span>
								</a>
							<?php
							}
						?>
						<a class="btn btn-xs btn-success" data-toggle="modal" data-target="#empplan" title="Change Plan For this Employee" onclick="seeplan(<?php echo $employer->id;?>)"><i class="fa fa-money"></i></a>								
					  </td>
					</tr>
					<?php
					}
					?>
				</tbody>
			  </table>
		  </div>
	    </section>
	</div><!--end col-6 -->
</div>	
</section><!-- /.content -->

<div class="modal fade" id="empview" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Employer Details</h4>
        </div>
        <div class="modal-body">
			<table id="emp_dt" class="table table-hover"></table>			
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="empplan" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Employer's Active Plan</h4>
        </div>
        <div class="modal-body" id="plan_body">
						
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="mailer" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Send Mail</h4>
        </div>
        <div class="modal-body">
			<div class="row">
			    <div class="col-md-12 form-control" style="text-align:center; background: skyblue; color: white; ">
			        Number of rows selected: <span id="nrows" style="font-weight:bold;"></span>
			    </div>
			    <div class="col-md-3">
			        Send Mail To: 
			    </div>
			    <div class="col-md-9"><input type="radio" value="1" name="mailingto" />Selected Emails <input type="radio" value="2" name="mailingto" /> All Employers</div>
			</div>
            <hr/>
            <div class="row" id="main_div">
                <div class="col-md-3"><label>Subject</label></div>
                <div class="col-md-9"><input type="text" name="mail_subject" id="mail_subject" class="form-control" /></div>
                <hr>
                <div class="col-md-12">
                    <textarea id="mail_message" class="form-control" cols="8"></textarea>
                </div>
            </div>	
            <br/>
            <div class="row">
                <div class="col-md-6"><span class="small" id="show_err">&nbsp;</span></div>
                <div class="col-md-6"><button type="button" id="send_now" class="btn btn-xs btn-primary form-control">Send</button></div>
            </div>		
        </div>
      </div>
    </div>
</div>
<script>
    function seeplan(x){
        //alert(x);
        $.ajax({
            type: "POST",
            url: baseurl+ "ado/Admin/changeplan",
            dataType: 'html',
            data: {id: x},
            success: function(res)
            {
                $('#plan_body').html(res);
                console.log(res);
            },
            error: function (request, status, error) 
            {
                alert(request.responseText);
            }
        });
    }
function emp_plan_change(x){
        $("#err_select").html('');
        var plan = $("#rplan").val();
        if(plan == ''){
            $("#err_select").html('Select the plan first!!');
        } else{
            $.ajax({
                type: "POST",
                url: baseurl+ "ado/Admin/emp_plan_change",
                dataType: 'html',
                data: {id: x, resume_plan: plan},
                success: function(res)
                {
                    if(res == 1) {
                        $('#err_select').css('color', 'blue');
                        $('#err_select').html('Awesome, Plan Changed for this employee');
                    } else {
                        $('#err_select').css('color', 'red');
                        $('#err_select').html('something went wrong, try again later');
                    }
                },
                error: function (request, status, error) 
                {
                    alert('Something went wrong!');
                    console.log(request.responseText);
                }
            });   
        }
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