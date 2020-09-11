<?php foreach($result as $rows){} ?>
<?php foreach($desc_result as $desc){ } ?>
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
							<li class="breadcrumb-item active">Awards</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		<!-- end page title -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">
				<h4 class="header-title mt-0">Update Awards</h4><hr>
<?php if($this->session->flashdata('alert')) { $alert = $this->session->flashdata('alert');?>

								<div class="<?php echo $alert['class'] ?> alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $alert['text']; ?>
								</div>	
<?php } ?>
					<form action="<?php echo base_url(); ?>spv/update_award" method="post" enctype="multipart/form-data" id="add_award" name="add_award" class="form">

						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="col-form-label">Award Description (Tamil)</label>
								<textarea id="tDesc" name='tDesc' class="form-control" rows="3"><?php echo $desc->awards_text_ta; ?></textarea>
							</div>
							<div class="form-group col-md-6">
								<label class="col-form-label">Award Description (English)</label>
							   <textarea id="eDesc" name='eDesc' class="form-control" rows="3"><?php echo $desc->awards_text_en; ?></textarea>
							</div>
						</div>
						<hr>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="col-form-label">Award Date</label>
								<input type="text" class="form-control" placeholder="DD-MM-YYYY" id="nfDate" name="nfDate" value="<?php $award_date = $rows->awards_date; echo date('d-m-Y', strtotime($award_date)); ?>">
							</div>
							<div class="form-group col-md-6">
								
							</div>						
						</div>
						
						 <div class="form-row">
							<div class="form-group col-md-6">
								<label class="col-form-label">Award Details (Tamil)</label>
								<textarea id="tDeatil" name='tDeatil' class="form-control" rows="3"><?php echo $rows->awards_text_ta; ?></textarea>
							</div>
							<div class="form-group col-md-6">
								<label class="col-form-label">Award Details (English)</label>
							   <textarea id="eDeatil" name='eDeatil' class="form-control" rows="3"><?php echo $rows->awards_text_en; ?></textarea>
							</div>
						</div>
						
						 <div class="form-row">
							 
							<div class="form-group col-md-6">
								<label class="col-form-label">Status</label>
							   <select id="nStatus" name="nStatus" class="form-control">
										<option value="Active">Active</option>
										<option value="Inactive">Inactive</option>
								</select><script>$('#nStatus').val('<?php echo $rows->status; ?>');</script>
							</div>
							<div class="form-group col-md-6">
								<input type="hidden" name="award_id" id="award_id" value="<?php echo base64_encode($rows->id*98765); ?>">
								<button type="submit" class="btn btn-primary" style="margin-top:38px;">Submit</button>
							</div>
						</div>

					   
					</form>
				</div>
			</div>
		</div>


	</div> <!-- container-fluid -->
</div> <!-- content -->

 <script type="text/javascript">
 
$('#menu4').addClass('active');

$('#add_award').validate({ // initialize the plugin
     rules: {
		 tDesc:{required:true },
		 eDesc:{required:true },
		 nfDate:{required:true },
		 tDeatil:{required:true },
		 eDeatil:{required:true }
     },
     messages: {
		  tDesc: "Enter Tamil Description",
		  eDesc: "Enter English  Description",
		  nfDate: "Select Award Date",
		  tDeatil: "Enter Tamil Details",
		  eDeatil: "Enter English Details"
         }
 });


</script>
		