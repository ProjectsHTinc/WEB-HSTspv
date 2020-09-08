
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
							<li class="breadcrumb-item active">Social Media</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		<!-- end page title -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">
				<h4 class="header-title mt-0">Social Media Update</h4><hr>
<?php if($this->session->flashdata('alert')) { $alert = $this->session->flashdata('alert');?>

								<div class="<?php echo $alert['class'] ?> alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $alert['text']; ?>
								</div>	
<?php } ?>
					<form action="<?php echo base_url(); ?>spv/update_socialmedia" method="post" enctype="multipart/form-data" id="add_award" name="add_award" class="form">


<?php foreach($result as $rows){ ?>
									<div class="form-group row">
                                            <label class="col-sm-3 col-form-label"><?php echo $rows->sm_title; ?></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="sValues[]" id="sValues" value="<?php echo $rows->sm_url; ?>">
                                            </div>
                                     </div>
<?php } ?>
						 
							<div class="form-group row">
								 <label class="col-sm-3 col-form-label"></label>
                                 <div class="col-sm-9">   
										<button type="submit" class="btn btn-primary">Submit</button>
								</div>
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

</script>
		