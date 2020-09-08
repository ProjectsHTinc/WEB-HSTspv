	<!-- Footer Start -->
	<footer class="footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
				   Developed by Happysanz Tech
				</div>
				<div class="col-md-6"></div>
			</div>
		</div>
	</footer>
	<!-- end Footer -->

	</div>
	</div>
	<!-- END wrapper -->


 <!-- Vendor js -->
        <script src="<?php echo base_url(); ?>assets/admin/js/vendor.min.js"></script>

		<!-- Plugins Js -->
        <script src="<?php echo base_url(); ?>assets/admin/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		  
        <script src="<?php echo base_url(); ?>assets/admin/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/libs/datatables/dataTables.bootstrap4.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/libs/datatables/dataTables.responsive.min.js"></script>
		
		<script src="<?php echo base_url(); ?>assets/admin/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
		
		<script src="<?php echo base_url(); ?>assets/admin/libs/toastr/toastr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/pages/toastr.init.js"></script>

		<script>
			jQuery("#nfDate").datepicker({
				format: "dd-mm-yyyy",
				autoclose: !0,
				todayHighlight: !0,
			})
			
			$(document).ready(function() {
				$("#datatable").DataTable();
			});
			
		</script>
		
  <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/admin/js/app.min.js"></script>
    </body>
</html>