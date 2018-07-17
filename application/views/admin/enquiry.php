<script type="text/javascript" src="<?php echo base_url();?>assets/js/tinymce_3_5/jscripts/tiny_mce/tiny_mce.js"></script>
<style>
    .details{
        display: none;
    }
</style>
<section class="content">
<!-- Main row -->

<div class="row">

   <div class="col-md-12">
		<section class="panel">
					<?php echo $this->session->flashdata('verify_msg'); ?>					
		  <header class="panel-heading">Enquiry</header>	
	    </section>
	</div><!--end col-6 -->
</div>

<div class="row">

   <div class="col-md-12">
		<section class="panel">
					<?php echo $this->session->flashdata('verify_msg'); ?>					
			<div class="panel-body table-responsive">
				<table id="all_enq" class="table table-hover">
					<thead>
						<tr>
						  <th class="nosort">#</th>
						  <th>Name</th>
						  <th>Mobile</th>
						  <th>Email</th>
						  <th>Webite</th>
						  <th>Subject</th>
						  <th>Message</th>	
						</tr>
					</thead>
					<tbody>
					<?php	
						//echo "<pre />"; print_r($students);
						if(is_array($enquiries) )
						{
							$count = 1;						
							foreach($enquiries as $enq)
							{
							?>
							<tr>
								<td><?php echo $count;?></td>
								<td><?php echo $enq->name;?></td>
								<td><?php echo $enq->mobile;?></td>
								<td><?php echo $enq->email;?></td>
								<td><?php echo $enq->website;?></td>
								<td><?php echo $enq->subject;?></td>
								<td><a class="btn btn-xs btn-info mbtn" value="<?php echo $enq->id ?>"><i class="fa fa-eye"></i></a> <a class="btn btn-danger btn-xs delbtn" value="<?php echo $enq->id ?>"><i class="fa fa-trash-o"></i></a> <a href="#" value='<?php echo json_encode($enq); ?>' data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-xs reply_mail"><i class="fa fa-envelope"></i></a>
								</td>
							</tr>
							<tr id="<?php echo $enq->id ?>" class="details"><td colspan='7' style="text-align:justify;"><?php echo $enq->message;?></td></tr>	
							<?php
							$count++;	
							}
						}
					?>	
					</tbody>
				</table>
		  </div>
	    </section>
	</div><!--end col-6 -->
</div>
		
</section><!-- /.content -->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <div class="row" id="main_div">
                <div class="col-md-3"><label>Replying To</label></div>
                <div class="col-md-9"><input type="text" name="mail_to" id="mail_to" class="form-control"/></div>
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
                <div class="col-md-6"><button type="button" class="btn btn-xs btn-primary form-control" id="reply_now">Send</button></div>
            </div>	
      </div>
    </div>

  </div>
</div>

<script>
    $(document).ready(function() {
        $('.mbtn').click(function() {
            $('#'+$(this).attr("value")).toggle("slow", "swing");
        });
        $('.delbtn').click(function() {
            if(confirm('Are you sure? This enquiry will be deleted permanently.')){
               window.location.href = baseurl+"ado/Admin/deleteEnquiry/"+$(this).attr("value");
            }
        });
        $('.reply_mail').click(function () {
            var row = jQuery.parseJSON($(this).attr('value'));
            var email = ""+row['email'];
            $('#mail_to').val(email.toLowerCase());
            var subject = "Re: "+row['subject'];
            $('#mail_subject').val(subject);
        });
        $('#reply_now').click(function (){
            var message = tinyMCE.activeEditor.getContent();
            var email = $('#mail_to').val();
            var subject = $('#mail_subject').val();
            if(message == ''){
                $('#show_err').css('border','solid 1px #FF0000');
                $('#show_err').css('color','#FF0000');
                $('#show_err').html('Can\'t send an email without a Mail Body');
            } else {
                $.ajax({
                    type: "POST",
                    url: baseurl+"ado/Admin/reply_enquiry",
                    data:{ email : email, subject: subject, message: message },
                    dataType: "json",
                    beforeSend: function() {
                        $('#main_div').html('');
                        $('#main_div').addClass('loader');
                    },
                    success: function(data) {
                        console.log(data);
                        $('#main_div').addClass('');
                        $('#show_err').html('<i class="glyphicon glyphicon-ok-sign"></i> '+data.gone+' Mail(s) Sent');
                         window.setTimeout(function(){location.reload()},3000);
                    },
                    error: function (request, status, error) {
                        $('#show_err').css('color','#FF0000');
                        $('#show_err').html('<i class="glyphicon glyphicon-remove-sign"></i> Something went wrong!');
                        console.log(request.responseText);
                    }
                });
            }
        });
    });
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