<?php foreach($result as $spv_political){} ?>
<div class="content">
	<!-- Start Content-->
	<div class="container-fluid">

		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-flex align-items-center justify-content-between">
					<h4 class="page-title">About SPV</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
							<li class="breadcrumb-item active">Political Career</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		<!-- end page title -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">
				<h4 class="header-title mt-0">Political Career</h4><hr>	
<?php if($this->session->flashdata('alert')) { $alert = $this->session->flashdata('alert');?>

								<div class="<?php echo $alert['class'] ?> alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $alert['text']; ?>
								</div>	
<?php } ?>
					<form action="<?php echo base_url(); ?>spv/update_political" method="post" enctype="multipart/form-data" id="spv_political" name="spv_political" class="form">
					
						
						 <div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputPassword4" class="col-form-label">Details (Tamil)</label>
							   <textarea id="eDeatil" name='tDeatil' class="form-control" rows="15"><?php echo $spv_political->political_career_text_ta; ?></textarea>
							</div>
							<div class="form-group col-md-6">
								<label class="col-form-label">Details (English)</label>
								<textarea id="tDeatil" name='eDeatil' class="form-control" rows="15"><?php echo $spv_political->political_career_text_en; ?></textarea>
							</div>
						</div>
	
					   <div class="form-row">
							<div class="form-group col-md-6"></div>
							 <input type="hidden" name="spv_id" id="spv_id" value="<?php echo base64_encode($spv_political->id*98765); ?>">
							<div class="form-group col-md-6"><button type="submit" class="btn btn-primary">Submit</button></div>
						</div>	
					   
					</form>
				</div>
			</div>
		</div>


	</div> <!-- container-fluid -->
</div> <!-- content -->

 <script type="text/javascript">
 
$('#menu4').addClass('active');

$('#spv_political').validate({ // initialize the plugin
     rules: {
		 tDeatil:{required:true },
		 eDeatil:{required:true }
     },
     messages: {
		  tDeatil: "Enter Tamil Details",
		  eDeatil: "Enter English Details"
         }
 });


</script>
		