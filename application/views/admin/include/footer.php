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
			
			var table = $('#inner_emp').DataTable({
				"order": [[ 5, "desc" ]]
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