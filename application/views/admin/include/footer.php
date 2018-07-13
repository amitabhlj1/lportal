	</div>
</div>
        <!-- /page content -->
		
<!-- footer content -->
        <footer>
          <div class="pull-right">
            copyright @<?php echo date('Y');?> &nbsp;&nbsp;<a href="http://www.langjobs.com">langJobs</a>
			&nbsp;&nbsp;
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>assets/vendors/nprogress/nprogress.js"></script>
    
	<script src="<?php echo base_url();?>assets/admin/js/datetime/moment.min.js"></script>
	<!--
	<script src="<?php echo base_url();?>assets/admin/js/datetime/bootstrap-datetimepicker.min.js"></script>
	-->
    
    <!-- DateJS -->
    <script src="<?php echo base_url();?>assets/vendors/DateJS/build/date.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/Director/app.js" type="text/javascript"></script>
    <!-- Select2 js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/res/Obj.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/AddTags.js"></script>
    <!-- bootstrap-daterangepicker -->
    <!--<script src="<?php echo base_url();?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script> -->
    		
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>assets/js/common.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.1/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.easyPaginate.js"></script>

  	<script>
		$('#easyPaginate').easyPaginate({
            paginateElement: '.well',
            elementsPerPage: 20,
            firstButton:false,
            lastButton:false
        });
        $('.page').click(function(){
            $("html, body").animate({ scrollTop: '120px' }, 500);
        });
		$(document).ready(function (){
			$('.select2').select2({
					width:"100%",
					height:'33px',
					border: "none",
					allowClear: true,
            	});
			});
		
		$("#job_key").addTags();
		$("#f_job_key").addTags();
		
		// data table
		$(document).ready(function() {
            //console.log('awesome');
          
			var table = $('#rc_emp').DataTable({
			     "order": [[ 5, "desc" ]]			   
            });
			
			var table = $('#rc_exp').DataTable({
			     "order": [[ 4, "desc" ]]			   
            });
		
			var table = $('#inner_exp').DataTable({
				"order": [[ 5, "desc" ]]
            });
			
			var t_emp = $('#inner_emp').DataTable({
                "order": [[ 5, "desc" ]]
            });
   
            $('#inner_emp tbody').on( 'click', 'tr', function () {
                $(this).toggleClass('selected');
            });
            
            $('#send_mail').click( function () {
                //retrieves count of rows
                var total_rows = t_emp.rows('.selected').data().length;
                $('#nrows').html('<b>'+total_rows+'</b>');
                
            } );
			$('#send_now').click(function(){
                
                $('#show_err').html('');
                var subject = $('#mail_subject').val();
                if(subject == ""){
                    $('#show_err').css('border','solid 1px #FF0000');
                    $('#show_err').css('color','#FF0000');
                    $('#show_err').html('Can\'t send an email without a subject');
                    return false;
                }
                var message = tinyMCE.activeEditor.getContent();
                var radioValue = $("input[name='mailingto']:checked").val();
                var email_list = [];
                if(radioValue == null){
                    $('#show_err').css('border','solid 1px #FF0000');
                    $('#show_err').css('color','#FF0000');
                    $('#show_err').html('Select either \"All Employers\" or \"Selected Emails\"');
                    return false;
                } else {
                    $('#show_err').css('border','none');
                    $('#show_err').css('color','#000');
                    if(radioValue == '1'){
                        
                        var data = t_emp.rows('.selected').data();
                        //retrieving all the selected mails into email_list array
                        $.each( data, function( key, value ) {
                            if(data[key][2] != ""){
                                email_list.push(data[key][2]);
                            }
                        });
                        
                    } else {
                        
                        var data = t_emp.rows().data();
                        //retrieving all the selected mails into email_list array
                        $.each( data, function( key, value ) {
                          if(data[key][2] != ""){
                                email_list.push(data[key][2]);
                          }
                        });
                        
                    }
                    
                    if(message == ""){
                        $('#show_err').css('border','solid 1px #FF0000');
                        $('#show_err').css('color','#FF0000');
                        $('#show_err').html('Can\'t send an empty email');
                        return false;
                    } else {
                        $('#show_err').css('border','none');
                        $('#show_err').css('color','#000');
                        
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
                    
                }
                
                
            });
			var table = $('#inner_job').DataTable({
                "order": [[ 5, "desc" ]]
            });
            
			var table = $('#res_his').DataTable({
                "order": [[ 2, "desc" ]]
            });
			
			var table = $('#all_enq').DataTable({
						   'aoColumnDefs': [{
								'bSortable': false,
								'aTargets': ['nosort']
							}]
						});
            var table = $('#my_jobs').DataTable({
						   'aoColumnDefs': [{
								'bSortable': false,
								'aTargets': ['nosort']
							}]
						});
			
        } );
	</script>
	  </body>
</html>