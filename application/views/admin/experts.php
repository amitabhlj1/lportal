<script type="text/javascript" src="<?php echo base_url();?>assets/js/tinymce_3_5/jscripts/tiny_mce/tiny_mce.js"></script>
<section class="content">
<!-- Main row -->
<div class="row">
   <div class="col-md-12">
		<section class="panel">
        <?php echo $this->session->flashdata('verify_msg'); ?>	
		  <header class="panel-heading">Experts <span class="small pull-right">**(Click on the rows to select experts)**&nbsp;<button id="send_mail_exp" class="btn btn-xs btn-success" data-toggle="modal" data-target="#mailer"><i class="glyphicon glyphicon-envelope"></i> Send Mail</button></span></header>							
		<div class="panel-body table-responsive">
			<table class="table table-hover" id='inner_exp'>
				<thead>
					<tr>
					  <th>Name</th>					  
					  <th>Gender</th>					  
					  <th>Email</th>				  
					  <th>Mobile</th>
					  <th class="nosort">Social</th>
					  <th>Created</th>
					  <th class="nosort">Action</th>	
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($experts as $expert)
					{
						$isSocial = ($expert->social_login == 1) ? 'yes' : '';
					?>
					<tr>
					  <td><?php echo $expert->first_name .' '. $expert->last_name;?></td>
					  <td><?php echo $expert->gender;?></td>
					  <td><?php echo $expert->email;?></td>						  
					  <td><?php echo $expert->mobile;?></td>
					  <td><?php echo $isSocial;?></td>
					  <td><?php if($expert->created=="0000-00-00"){echo "2017-01-01";} else {echo $expert->created;} ?></td>
					  <td>	
						  <a href="#" data-toggle="modal" data-target="#expview" onclick="expertDetails(<?php echo $expert->id;?>);">
								<span class="glyphicon glyphicon-eye-open" title="view details"></span>
						  </a>
						   &nbsp;&nbsp; &nbsp;&nbsp;
							<?php 
							if($expert->status == 1)
							{
							?>
								<a href="<?php echo base_url();?>ado/Admin/changeStatus/<?php echo $expert->id;?>/0/lang_expert/experts" >
									<span class="label label-success" title="change status (delete this)">&nbsp;</span>
								</a>
							<?php
							}
							else
							{
							?>
								<a href="<?php echo base_url();?>ado/Admin/changeStatus/<?php echo $expert->id;?>/1/lang_expert/experts" >
									<span class="label label-danger" title="change status (undelete this)">&nbsp;</span>
								</a>
							<?php
							}
						?>								
					  </td>
					</tr>
					<?php
					}
					?>
				</tbody>
			  </table>
			  <div style="float:right;">
                <?php 
                    if($page==1){ ?>
                        <a rel="canonical" style="color:white;" href="<?php echo base_url(); ?>ado/Admin/experts/<?php echo $page+1; ?>"> <button class="btn btn-xs btn-primary"> Next 1000 Experts </button> </a>
                    <?php
                    } else { ?>
                        <a rel="canonical" style="color:white;" href="<?php echo base_url(); ?>ado/Admin/experts/<?php echo $page-1; ?>"><button class="btn btn-xs btn-warning"> Last 1000 Experts </button></a> 
                        &nbsp; 
                        <a rel="canonical" style="color:white;" href="<?php echo base_url(); ?>ado/Admin/experts/<?php echo $page+1; ?>" <button class="btn btn-xs btn-primary"> Next 1000 Experts </button> </a>
                    <?php
                    }
                ?>
            </div>
		  </div>
	    </section>
	</div><!--end col-6 -->
</div>	
</section><!-- /.content -->

<div class="modal fade" id="expview" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Expert Details</h4>
        </div>
        <div class="modal-body">
			<table id="exp_dt" class="table table-hover"></table>			
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
			    <div class="col-md-9"><input type="radio" value="1" name="mailingto" />Selected Emails <input type="radio" value="2" name="mailingto" /> 1000 Experts in this table</div>
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
                <div class="col-md-6"><button type="button" id="send_now_ex" class="btn btn-xs btn-primary form-control">Send</button></div>
            </div>		
        </div>
      </div>
    </div>
</div>
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