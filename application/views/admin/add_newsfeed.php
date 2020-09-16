<div class="content">
	<!-- Start Content-->
	<div class="container-fluid">

		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-flex align-items-center justify-content-between">
					<h4 class="page-title">News Feeder</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
							<li class="breadcrumb-item active">Add News Feeder</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		<!-- end page title -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">	
<h4 class="header-title mt-0">Add News Feeder</h4><hr>					
<?php if($this->session->flashdata('alert')) { $alert = $this->session->flashdata('alert');?>
								<div class="<?php echo $alert['class'] ?> alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $alert['text']; ?>
								</div>	
<?php } ?>
					<form action="<?php echo base_url(); ?>newsfeed/add_news" method="post" enctype="multipart/form-data" id="add_newsfeed" name="add_newsfeed" class="form">
					
					<div class="form-row">
							<div class="form-group col-md-6">
								<label class="col-form-label">Select Category</label>
								<select id="nfCategory" name="nfCategory" class="form-control">
										<option value="">Select Category</option>
										<?php foreach($categories as $rows){ ?>
										<option value="<?php echo $rows->id;?>"><?php echo $rows->category_name;?></option>
										<?php } ?>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label for="inputCity" class="col-form-label">Select Date</label>
								<input type="text" class="form-control" placeholder="DD-MM-YYYY" id="nfDate" name="nfDate">
							</div>
							
					</div>

						<div class="form-row">
								<div class="form-group col-md-6">
								<label class="col-form-label">Profile Type</label>
								<select id="nfProfile" name="nfProfile" class="form-control" onchange = "EnableDisableTextBox(this)">
										<option value="I">Image</option>
										<option value="V">Video</option>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label class="col-form-label">Video Token</label>
								 <input type="text" class="form-control" id="vToken" name="vToken" placeholder="Video Token" disabled>
							</div>
						</div>	

						<div class="form-row">
						<div class="form-group col-md-6">
								<label class="col-form-label">Title (Tamil)</label>
								<input type="text" class="form-control" id="tTitle" name="tTitle" placeholder="Title (Tamil)">
							</div>
							<div class="form-group col-md-6">
								<label class="col-form-label">Title (English)</label>
								<input type="text" class="form-control" id="eTitle" name="eTitle" placeholder="Title (English)">
							</div>
							
							
						</div>
						
						 <div class="form-row">
						 <div class="form-group col-md-6">
								<label class="col-form-label">Details (Tamil)</label>
								<textarea id="tDeatil" name='tDeatil' class="form-control" rows="7"></textarea>
							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4" class="col-form-label">Details (English)</label>
							   <textarea id="eDeatil" name='eDeatil' class="form-control" rows="7"></textarea>
							</div>
							
						</div>
						
						 <div class="form-row">
							<div class="form-group col-md-6">
								<label class="col-form-label">Cover Image <span style="color:#f50303;">(900px * 515px)</span></label>
								<input type="file" class="form-control" id="coverImage" name="coverImage">
							</div>
							 
							<div class="form-group col-md-3">
								<label class="col-form-label">Status</label>
							   <select id="nStatus" name="nStatus" class="form-control">
										<option value="Active">Active</option>
										<option value="Inactive">Inactive</option>
								</select>
							</div>
							<div class="form-group col-md-3">
								<label class="col-form-label">Send Notification</label><br>
							   <input type="radio" name="notification" value="Y" style="margin-top:10px;"> Yes &nbsp;&nbsp;<input type="radio" name="notification" value="N" checked> No
							</div>
						</div>
					   <div class="form-row">
							<div class="form-group col-md-6"></div>
							<div class="form-group col-md-6"><button type="submit" class="btn btn-primary">Submit</button></div>
						</div>	
					   
					</form>
				</div>
			</div>
		</div>


	</div> <!-- container-fluid -->
</div> <!-- content -->

 <script type="text/javascript">
 
$('#menu2').addClass('active');

$.validator.addMethod('filesize', function (value, element, param) {
		return this.optional(element) || (element.files[0].size <= param)
	}, 'Check your file size');

$('#add_newsfeed').validate({ // initialize the plugin
     rules: {
         nfCategory:{required:true},
         nfDate:{required:true },
		 vToken:{required:true },
		 tTitle:{required:true },
		 eTitle:{required:true },
		 tDeatil:{required:true },
		 eDeatil:{required:true },
		 coverImage:{required:true,accept: "jpg,jpeg,png",filesize: 1048576}
     },
     messages: {
          nfCategory: "Select Category",
          nfDate: "Select Date",
		  vToken : "Enter Youtube Video Token ID",
		  tTitle: "Enter Tamil Title",
		  eTitle: "Enter English Title",
		  tDeatil: "Enter Tamil Details",
		  eDeatil: "Enter English Details",
		  coverImage:{
				  required:"Select Cover Image",
				  accept:"Please upload .jpg or .png",
				   filesize:"File must be JPG or PNG, less than 1MB"
				}
         }
 });
 
    function EnableDisableTextBox(nfProfile) {
        var selectedValue = nfProfile.options[nfProfile.selectedIndex].value;
        var vToken = document.getElementById("vToken");
        vToken.disabled = selectedValue == 'V' ? false : true;
        if (!vToken.disabled) {
            vToken.focus();
        }
    }
	

</script>
		