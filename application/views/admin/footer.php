	<!-- Footer Start -->
	<footer class="footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
				   Developed by <a href="https://www.happysanztech.com/" target="_blank">Happy Sanz Tech</a>
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
        <script src="<?php echo base_url(); ?>assets/plugins/js/vendor.min.js"></script>

		<!-- Plugins Js -->
        <script src="<?php echo base_url(); ?>assets/plugins/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		  
        <script src="<?php echo base_url(); ?>assets/plugins/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/libs/datatables/dataTables.bootstrap4.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/libs/datatables/dataTables.responsive.min.js"></script>
		
		<script src="<?php echo base_url(); ?>assets/plugins/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
		
		<script src="<?php echo base_url(); ?>assets/plugins/libs/toastr/toastr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/js/pages/toastr.init.js"></script>

		<script>
			$("input").on("keypress", function(e) {
				if (e.which === 32 && !this.value.length)
					e.preventDefault();
			});

			$("textarea").on("keypress", function(e) {
				if (e.which === 32 && !this.value.length)
					e.preventDefault();
			});

			jQuery("#nfDate").datepicker({
				format: "dd-mm-yyyy",
				autoclose: !0,
				todayHighlight: !0,
			})
			
			$(document).ready(function() {
				
				$('#datatable').DataTable({
					"autoWidth": false,
					"lengthChange": false,
					"pageLength": 100
				});
		
				
			});
			
		</script>
		
  <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/plugins/js/app.min.js"></script>
    </body>
</html>