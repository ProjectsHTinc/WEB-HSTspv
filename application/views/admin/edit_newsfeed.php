<?php foreach($news_details as $nf_details){} ?>
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
							<li class="breadcrumb-item active">Edit News Feeder</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		<!-- end page title -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">
				<h4 class="header-title mt-0">Update News Feeder</h4><hr>	
<?php if($this->session->flashdata('alert')) { $alert = $this->session->flashdata('alert');?>

								<div class="<?php echo $alert['class'] ?> alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $alert['text']; ?>
								</div>	
<?php } ?>
					<form action="<?php echo base_url(); ?>newsfeed/update_news" method="post" enctype="multipart/form-data" id="add_newsfeed" name="add_newsfeed" class="form">
					
					<div class="form-row">
							<div class="form-group col-md-6">
								<label class="col-form-label">Select Category</label>
								<select id="nfCategory" name="nfCategory" class="form-control">
										<option value="">Select Category</option>
										<?php foreach($categories as $rows){ ?>
										<option value="<?php echo $rows->id;?>"><?php echo $rows->category_name;?></option>
										<?php } ?>
								</select><script>$('#nfCategory').val('<?php echo $nf_details->nf_category_id; ?>');</script>
							</div>
							<div class="form-group col-md-6">
								<label for="inputCity" class="col-form-label">Select Date</label>
								<input type="text" class="form-control" placeholder="DD-MM-YYYY" id="nfDate" name="nfDate" value="<?php $news_date = $nf_details->news_date; echo date('d-m-Y', strtotime($news_date)); ?>">
							</div>
							
					</div>
					

						<div class="form-row">
								<div class="form-group col-md-6">
								<label class="col-form-label">Profile Type</label>
								<select id="nfProfile" name="nfProfile" class="form-control" onchange = "EnableDisableTextBox(this)">
										<option value="I">Image</option>
										<option value="V">Video</option>
								</select><script>$('#nfProfile').val('<?php echo $nf_details->nf_profile_type; ?>');</script>
							</div>
							<?php $pType = $nf_details->nf_profile_type; ?>
							<div class="form-group col-md-6">
								<label class="col-form-label">Video Token</label>
								<?php  if ($pType == 'V'){ ?>
									<input type="text" class="form-control" id="vToken" name="vToken" placeholder="Video Token"  value ="<?php echo $nf_details->nf_video_token_id; ?>">
								<?php } else { ?>
									<input type="text" class="form-control" id="vToken" name="vToken" placeholder="Video Token" maxlength="50" disabled>
								<?php } ?>
							</div>
						</div>	

						<div class="form-row">
						<div class="form-group col-md-6">
								<label class="col-form-label">Title (Tamil)</label>
								<input type="text" class="form-control" id="tTitle" name="tTitle" placeholder="Title (Tamil)" value="<?php echo html_escape($nf_details->title_ta);?>" maxlength="80">
							</div>
							<div class="form-group col-md-6">
								<label class="col-form-label">Title (English)</label>
								<input type="text" class="form-control" id="eTitle" name="eTitle" placeholder="Title (English)" value="<?php echo html_escape($nf_details->title_en);?>" maxlength="80">
							</div>
							
						</div>
						
						 <div class="form-row">
							
							<div class="form-group col-md-6">
								<label class="col-form-label">Details (Tamil)</label>
								<textarea id="tDeatil" name='tDeatil' class="form-control" rows="7"><?php echo $nf_details->description_ta; ?></textarea>
							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4" class="col-form-label">Details (English)</label>
							   <textarea id="eDeatil" name='eDeatil' class="form-control" rows="7"><?php echo $nf_details->description_en; ?></textarea>
							</div>
						</div>
						
						 <div class="form-row">
							<div class="form-group col-md-6">
								<label class="col-form-label">Cover Image <span style="color:#f50303;">(900px * 515px)</span></label>
								<input type="file" class="form-control" id="coverImage" name="coverImage">
							</div>
							 
							<div class="form-group col-md-6">
								<label class="col-form-label">Status</label>
							   <select id="nStatus" name="nStatus" class="form-control">
										<option value="Active">Active</option>
										<option value="Inactive">Inactive</option>
								</select><script>$('#nStatus').val('<?php echo $nf_details->status; ?>');</script>
							</div>
						</div>

						
					   <div class="form-row">
							<div class="form-group col-md-6"><img src="<?php echo base_url(); ?>assets/news_feed/<?php echo $nf_details->nf_cover_image; ?>"  class="thumb-img img-fluid"></div>
							 <input type="hidden" name="news_id" id="news_id" value="<?php echo base64_encode($nf_details->id*98765); ?>">
							 <input type="hidden" name="old_profile_type" id="old_profile_type" value="<?php echo $nf_details->nf_profile_type; ?>">
							 <input type="hidden" name="old_news_pic" id="old_news_pic" class="form-control" value="<?php echo $nf_details->nf_cover_image; ?>">
							 <input type="hidden" name="old_cat_id" id="old_cat_id" class="form-control" value="<?php echo $nf_details->nf_category_id; ?>">
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
		 coverImage:{required:false,accept: "jpg,jpeg,png",filesize: 1048576}
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
		var old_profile_type=document.getElementById("old_profile_type").value;
		var new_profile_type=document.getElementById("nfProfile").value;
		
        var selectedValue = nfProfile.options[nfProfile.selectedIndex].value;
        var vToken = document.getElementById("vToken");
        vToken.disabled = selectedValue == 'V' ? false : true;
        if (!vToken.disabled) {
            vToken.focus();
        }
		if (old_profile_type =='I' && new_profile_type == 'V'){
			alert ("This post related pictures will be permanently deleted!..");
		}
		
    }
</script>
		