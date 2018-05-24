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
    <!-- jQuery Sparklines -->
    <script src="<?php echo base_url();?>assets/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    
    <!-- DateJS -->
    <script src="<?php echo base_url();?>assets/vendors/DateJS/build/date.js"></script>

	<!-- Select2 js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <!-- bootstrap-daterangepicker -->
    <!--<script src="<?php echo base_url();?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script> -->
    		
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>assets/build/js/custom.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/common.js"></script>
  	<script>
		$(document).ready(function (){
			$('.select2').select2({
					width:"100%",
					height:'33px',
					border: "none",
					allowClear: true,
            	});
			});
	</script>
	  </body>
</html>