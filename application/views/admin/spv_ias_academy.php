<?php foreach($result as $academy){} ?>
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
							<li class="breadcrumb-item active">Amma IAS Academy</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		<!-- end page title -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">		
				<h4 class="header-title mt-0">Amma IAS Academy</h4><hr>
				
<?php if($this->session->flashdata('alert')) { $alert = $this->session->flashdata('alert');?>

								<div class="<?php echo $alert['class'] ?> alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $alert['text']; ?>
								</div>	
<?php } ?>
					<form action="<?php echo base_url(); ?>spv/update_ias_academy" method="post" enctype="multipart/form-data" id="academy" name="academy" class="form">
					
						
						 <div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputPassword4" class="col-form-label">Details (Tamil)</label>
							   <textarea id="eDeatil" name='tDeatil' class="form-control" rows="10"><?php echo $academy->academy_text_ta ; ?></textarea>
							</div>
							<div class="form-group col-md-6">
								<label class="col-form-label">Details (English)</label>
								<textarea id="tDeatil" name='eDeatil' class="form-control" rows="10"><?php echo $academy->academy_text_en 	; ?></textarea>
							</div>
						</div>
	
	
						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="col-form-label">Cover Image <span style="color:#f50303;">(900px * 515px)</span></label>
								<input type="file" class="form-control" id="coverImage" name="coverImage">
							</div>
							 
							<div class="form-group col-md-6">
								 <input type="hidden" name="nfId" id="nfId" value="<?php echo base64_encode($academy->id*98765); ?>">
								<input type="hidden" name="old_banner" id="old_banner" class="form-control" value="<?php echo $academy->academy_banner; ?>">
								 <button type="submit" class="btn btn-primary" style="margin-top:38px;">Submit</button>
							</div>
						</div>
					  
					   <div class="form-row">		   
								<div class="form-group col-md-6">
									<img src="<?php echo base_url(); ?>assets/ias_academy/<?php echo $academy->academy_banner; ?>"  class="thumb-img img-fluid">
								</div>
						</div>  
					</form>
				</div>
			</div>
		</div>

						


		
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">
				<div class="form-row">		   
								<div class="form-group col-md-6">
									<h4 class="page-title">List Courses</h4>	
								</div>
								<div class="form-group col-md-6">
									<a href="<?php echo base_url(); ?>spv/ias_cource/" class="btn btn-success btn-md waves-effect waves-light mb-3" style="float:right; data-animation="fadein" data-overlayspeed="200" data-overlaycolor="#36404a"><i class="mdi mdi-plus-circle-outline"></i> Add Courses</a>
								</div>
								 
						</div> 
							<table id="datatable" class="table table-bordered  nowrap">
                                        <thead>
                                        <tr>
                                            <th width="5%">#</th>
											<th width="80%">Course Name</th>
											<th width="10%">Status</th>
                                            <th width="5%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php $i=1; foreach($cources as $rows){ 
										$status = $rows->status;
										?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
											<td><?php echo $rows->course_title_en ; ?></td>
											<td><span <?php if ($status == 'Active') { ?>class="staus_active"<?php } else {?>class="staus_inactive"<?php } ?>><?php echo $rows->status; ?></span></td>
											<td style="text-align:center;"><a data-toggle="tooltip" title="Edit" href="<?php echo base_url(); ?>spv/edit_cource/<?php echo base64_encode($rows->id*98765); ?>/">Edit</a></td>
                                        </tr>
										<?php $i++; } ?>
                                        </tbody>
                                    </table>

				</div>
			</div>
		</div>

	</div> <!-- container-fluid -->
</div> <!-- content -->

 <script type="text/javascript">
 
$('#menu4').addClass('active');

$.validator.addMethod('filesize', function (value, element, param) {
		return this.optional(element) || (element.files[0].size <= param)
	}, 'Check your file size');
	
$('#academy').validate({ // initialize the plugin
     rules: {
		 tDeatil:{required:true },
		 eDeatil:{required:true },
		 coverImage:{required:false,accept: "jpg,jpeg,png",filesize: 1048576}
     },
     messages: {
		  tDeatil: "Enter Tamil Details",
		  eDeatil: "Enter English Details",
		  coverImage:{
				  required:"",
				  accept:"Please upload .jpg or .png",
				  filesize:"File must be JPG or PNG, less than 1MB"
				}
         }
 });

</script>
		