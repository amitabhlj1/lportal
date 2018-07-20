<script type="text/javascript" src="<?php echo base_url();?>assets/js/tinymce_3_5/jscripts/tiny_mce/tiny_mce.js"></script>
<style>
    #result_exp{
        height: 249px;
        overflow:auto;
    }
    #show_err{
        font-size: 10px;
        color: red;
    }
    #snd_mail{
        display: none;
    }
</style>
 <script>
  function initAutocomplete() {
    autocomplete = new google.maps.places.Autocomplete(
      (document.getElementById('location')), {
        types: ['geocode']
      });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCa0L27dpX-xgwglyvc9jtNZ2_sJt_JNq4&libraries=places&callback=initAutocomplete" async defer></script>
<section class="content">
<!-- Main row -->
<div class="row">
   <div class="col-md-6">
		<section class="panel">	
		  <header class="panel-heading">Filter Mailing List</header>							
		  <div class="panel-body">
		      <div class="col-lg-12">
		           <form class="form-horizontal">
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="Location">Location:</label>
                        <div class="col-sm-10">
                          <input type="text" name="location" class="form-control" id="location" placeholder="Enter location">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="Language">Language:</label>
                        <div class="col-sm-10">
                          <select id="langs" name="langs[]" class="form-control" multiple>
                              <?php foreach($languages as $l){
                                    echo "<option value='".$l->id."'>".$l->name."</option>";
                              } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="limit">Limit of experts:</label>
                        <div class="col-sm-10">
                          <input type="text" name="limit" class="form-control" id="limit" placeholder="Enter limit, default is 100 experts">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-sm-2" for="limit"></label>
                        <div class="col-sm-10">
                          <button class="btn btn-primary" type="button" id="ret_exp">Get the list of Experts</button>
                        </div>
                      </div>
                  </form>
		      </div>
		  </div>
		  <div class="panel-footer" id="show_err"></div>
	    </section>
	</div><!--end col-6 -->
	<div class="col-md-6">
		<section class="panel">	
		  <header class="panel-heading">Experts Retrieved: (<span id="nm_ex"></span>) 
		  <span class="pull-right">
		      <button id="snd_mail" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#mailer">Send Mail</button>
		  </span>
		  </header>							
		  <div class="panel-body table-responsive" id="result_exp">
		      <div style="text-align:center;">Search first!!!</div>
		  </div>
	    </section>
	</div><!--end col-6 -->
</div>	
</section><!-- /.content -->

<div class="modal fade" id="mailer" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Send Mail</h4>
        </div>
        <div class="modal-body">
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
                <div class="col-md-6"><span class="small" id="show_err2">&nbsp;</span></div>
                <div class="col-md-6"><button type="button" id="send_adv_now" class="btn btn-xs btn-primary form-control">Send</button></div>
            </div>		
        </div>
      </div>
    </div>
</div>

<script>
    var save_data;
    $('#ret_exp').click(function(){
        
        $('#show_err').html('');
        
        var loc = $('#location').val();
        var langs = $('#langs').val();
        var limit = $('#limit').val();
        
        if(limit == NaN){
            $('#show_err').html('Limit Should be in numbers');
            return false;
        }
        
        var htm = '';
        $.ajax({
            type: "POST",
            url: baseurl+"ado/Admin/adv_mail_experts",
            data:{ langs : JSON.stringify(langs), loc: loc, limit: limit },
            dataType: "json",
            beforeSend: function() {
                $('#show_err').html('');
                $('#show_err').addClass('loader');
            },
            success: function(data) {
                //console.log(data);
                $('#nm_ex').html(data.length);
                $('#show_err').removeClass('loader');
                $('#show_err').html('<i class="glyphicon glyphicon-ok-sign"></i> Query Processed!');
                if(data.length>0 && data[0]!=""){
                    htm = "<table class='table'>";
                    htm += "<thead><tr><th>Name</th><th>Email</th></tr></thead><tbody>";
                    $.each( data, function( key, value ) {
                        htm +="<tr>";
                        htm +="<td>"+data[key]['first_name']+" "+data[key]['last_name']+"</td>";
                        htm +="<td>"+data[key]['email']+"</td>";
                        htm +="</tr>";
                     });
                    htm += "</tbody></table>";
                    
                } else {
                    htm +="<b>Sorry! Nothing Found</b>";       
                }
                $('#result_exp').html(htm);
                save_data = data;
                $("#snd_mail").fadeIn();
            },
            error: function (request, status, error) {
                $('#show_err').html('<i class="glyphicon glyphicon-remove-sign"></i> Something went wrong!');
                console.log(request.responseText);
            }
        });
    });
    
    $('#send_adv_now').click(function(){
        $('#show_err2').html('');
        var subject = $('#mail_subject').val();
        if(subject == ""){
            $('#show_err2').css('border','solid 1px #FF0000');
            $('#show_err2').css('color','#FF0000');
            $('#show_err2').html('Can\'t send an email without a subject');
            return false;
        }
        var message = tinyMCE.activeEditor.getContent();
        if(message == ""){
            $('#show_err2').css('border','solid 1px #FF0000');
            $('#show_err2').css('color','#FF0000');
            $('#show_err2').html('Can\'t send an empty email');
            return false;
        }
        var email_list = [];
        $.each( save_data, function( key, value ) {
          if(save_data[key][2] != ""){
              //save_data is an object 
                email_list.push(save_data[key].email);
          }
        });
        
        $.ajax({
            type: "POST",
            url: baseurl+"ado/Admin/send_mail_emp",
            data:{ emails : JSON.stringify(email_list), subject: subject, message: message },
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