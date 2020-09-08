<?php foreach($res as $res_news){} ?>
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
							<li class="breadcrumb-item active">News Gallery</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		<!-- end page title -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">		
				<h4 class="header-title mt-0">News Feeder Gallery</h4><hr>	
<?php if($this->session->flashdata('alert')) { $alert = $this->session->flashdata('alert');?>

								<div class="<?php echo $alert['class'] ?> alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $alert['text']; ?>
								</div>	
<?php } ?>
										<form action="<?php echo base_url(); ?>newsfeed/add_update_gallery" method="post" enctype="multipart/form-data" id="add_gallery" name="add_gallery" class="form">

						 <div class="form-row">
							<div class="form-group col-md-6">
								<label class="col-form-label">Image Gallery <span style="color:#f50303;">(900px * 515px)</span></label>
								<input type="file" name="news_photos[]" id="news_photos" class="form-control" accept="image/*" multiple required>
							</div>
							<div class="form-group col-md-6">
								<input type="hidden" name="news_id" value=<?php echo $res_news->id;  ?>>
								<button type="submit" id="news_gallery" class="btn btn-primary" style="margin-top:37px;">Submit</button>
							</div>
						</div>

					   
					</form>
				</div>
			</div>
		</div>


<div class="row" >
<?php
				if(empty($res_img)){
					echo "No Gallery Found";
				}else{
					foreach($res_img as $rows){ 
?>
			<div class="col-xl-3 col-md-6" style="padding-bottom:30px;padding-top:12px;">
				<a href="<?php echo base_url(); ?>assets/news_feed/<?php echo $rows->nf_image; ?>" class="image-popup" title="">
					<img src="<?php echo base_url(); ?>assets/news_feed/<?php echo $rows->nf_image; ?>" class="thumb-img img-fluid" alt="">
				</a>
				<div style="margin:10px;">
					<span class="font-13 text-muted" style="float:right;">
						<a id="close" onclick="return confirm('Are you sure want to delete?')? delgal(<?php echo $rows->id; ?>):'';" data-toggle="tooltip" title="Delete" style="cursor:pointer;color:#e60404;">Delete</a>
					</span>
				</div>
			</div><!-- end col -->

					<?php } } ?>

</div>

	</div> <!-- container-fluid -->
</div> <!-- content -->

<script type="text/javascript">
	$('#menu2').addClass('active');

		$(document).ready(function() {
				$(".image-popup").magnificPopup({
					type: "image",
					closeOnContentClick: !0,
					mainClass: "mfp-fade",
					gallery: {
						enabled: !0,
						navigateByImgClick: !0,
						preload: [0, 1]
					}
				})
			});
		
		
	$("#news_gallery").click(function() {
        for (var i = 0; i < $("#news_photos").get(0).files.length; ++i) {
            var file1 = $("#news_photos").get(0).files[i].name;

            if (file1) {
                var file_size = $("#news_photos").get(0).files[i].size;
                if (file_size < 1000000) {
                    var ext = file1.split('.').pop().toLowerCase();
                    if ($.inArray(ext, ['jpg', 'jpeg', 'png']) === -1) {
                        alert("Invalid file extension");
                        return false;
                    }

                } else {
                    alert("Images size should be less than 1 MB.");
                    return false;
                }
            } else {
                alert("Select Gallery image..");
                return false;
            }
        }
    });
	
	function delgal(news_gal_id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>newsfeed/delete_nfgallery",
            data: {
                news_gal_id: news_gal_id
            },
            success: function(response) {
                if (response == 'success') {
                    toastr.options = {
						  "closeButton": false,
						  "debug": false,
						  "newestOnTop": false,
						  "progressBar": false,
						  "positionClass": "toast-top-right",
						  "preventDuplicates": false,
						  "onclick": null,
						  "showDuration": "300",
						  "hideDuration": "1000",
						  "timeOut": "5000",
						  "extendedTimeOut": "1000",
						  "showEasing": "swing",
						  "hideEasing": "linear",
						  "showMethod": "fadeIn",
						  "hideMethod": "fadeOut"
						};
						toastr.success("Picture Deleted Sucessfully");
						window.setTimeout(function() { location.reload() }, 2000);
                } else {
                  toastr.options = {
					  "closeButton": false,
					  "debug": false,
					  "newestOnTop": false,
					  "progressBar": false,
					  "positionClass": "toast-bottom-right",
					  "preventDuplicates": false,
					  "onclick": null,
					  "showDuration": "300",
					  "hideDuration": "1000",
					  "timeOut": "5000",
					  "extendedTimeOut": "1000",
					  "showEasing": "swing",
					  "hideEasing": "linear",
					  "showMethod": "fadeIn",
					  "hideMethod": "fadeOut"
					};
					toastr.error("Something Wrong");
					window.setTimeout(function() { location.reload() }, 2000);
                }
            }
        });
    }
</script>
		