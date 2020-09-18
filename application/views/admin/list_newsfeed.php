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
							<li class="breadcrumb-item active">List News Feeder</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		<!-- end page title -->
		
		 <div class="row">
                            <div class="col-12">
                                <div class="card-box">
								<h4 class="header-title mt-0">List News Feeder</h4><hr>	
<?php if($this->session->flashdata('alert')) { $alert = $this->session->flashdata('alert');?>

								<div class="<?php echo $alert['class'] ?> alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $alert['text']; ?>
								</div>	
<?php } ?>

                                    <table id="datatable" class="table table-bordered  nowrap">
                                        <thead>
                                        <tr>
                                            <th width="5%">#</th>
											<th width="25%">News Category</th>
                                            <th width="50%">News Title</th>
                                            <th width="10%">News Date</th>
                                            <th width="5%">Status</th>
                                            <th width="5%">Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
										<?php $i=1; foreach($list_news as $rows){ 
											$status = $rows->status;
											$nf_profile_type = $rows->nf_profile_type;
										?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
											<td><?php echo $rows->category_name; ?></td>
                                            <td><?php echo $rows->title_ta; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($rows->news_date)); ?></td>
                                            <td><span <?php if ($status == 'Active') { ?>class="staus_active"<?php } else {?>class="staus_inactive"<?php } ?>><?php echo $rows->status; ?></span></td>
											<!--<td style="text-align:center;font-size:22px;"><a data-toggle="tooltip" title="Edit" href="<?php echo base_url(); ?>newsfeed/edit_news/<?php echo base64_encode($rows->id*98765); ?>/"> <i class="mdi mdi-file-document-edit-outline"></i></a> &nbsp;<a data-toggle="tooltip" title="Gallery"  href="<?php echo base_url(); ?>newsfeed/news_gallery/<?php echo base64_encode($rows->id*98765); ?>/"> <i class="mdi mdi-file-image"></i></a></td>-->
											<td>
												<a data-toggle="tooltip" title="Edit" href="<?php echo base_url(); ?>newsfeed/edit_news/<?php echo base64_encode($rows->id*98765); ?>/">Edit</a> &nbsp;
											<?php if ($nf_profile_type == 'I') {?>
												<a data-toggle="tooltip" title="Gallery"  href="<?php echo base_url(); ?>newsfeed/news_gallery/<?php echo base64_encode($rows->id*98765); ?>/">Gallery</a>
											<?php } ?>
												</td>
											</tr>
										<?php $i++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end row -->


	</div> <!-- container-fluid -->
</div> <!-- content -->

<script type="text/javascript">
  	$('#menu2').addClass('active');
</script>
		