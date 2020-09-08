<div class="content">
	<!-- Start Content-->
	<div class="container-fluid">

		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-flex align-items-center justify-content-between">
					<h4 class="page-title">Enquiry Details</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
							<li class="breadcrumb-item active">Enquiry Details</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		<!-- end page title -->

<?php if($this->session->flashdata('alert')) { $alert = $this->session->flashdata('alert');?>
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">		
						
								<div class="<?php echo $alert['class'] ?> alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $alert['text']; ?>
								</div>	
						
				</div>
			</div>
		</div>
<?php } ?>
<?php
				if(empty($list_enquiry)){
?>
					<div class="row">
						<div class="col-md-12">
							<div class="card-box"><p>Sorry!.. No Records Found..</p>
						</div>
					</div>
					</div>
<?php
				}else{
					foreach($list_enquiry as $rows){ 
						$chat_id = $rows->id;
						$chat_by = $rows->chat_by;
						$chat_for = $rows->chat_for;
						$attachment_flag = $rows->attachment_flag;	
?>
					<div class="row">
						<div class="col-md-12">
							<div class="card-box" <?php if ($chat_by =='Admin') { ?> style="background-color:#dfe2e5;" <?php } ?>>
								<p <?php if ($chat_by =='Admin') { ?> style="text-align:right;" <?php } ?>><?php echo date('d-m-Y', strtotime($rows->created_at)); ?></p>
								<p <?php if ($chat_by =='Admin') { ?> style="text-align:right;" <?php } ?>><?php echo $rows->chat_text; ?></p>
<?php 							
									if ($attachment_flag =='1'){
										$sql ="SELECT * FROM spv_chat_document WHERE chat_id = '$chat_id'";
										$query = $this->db->query($sql);
										$count_rec = $query->num_rows();
										if ($query->num_rows() > 0) {
											echo '<p style="text-align:right;">';
											$i =1;
												foreach ($query->result() as $row) {
													echo "<a href='#' target='_blank'>$row->file_name</a>";
													if ($i< $count_rec ) {
														echo ", ";
													}
														
												$i++; }
											echo '<p>';
										}
									}
?>
			
								
							</div>
						</div>
					</div>

<?php			}  ?>

<div class="row">
						<div class="col-md-12">
							<div class="card-box">
							<form action="<?php echo base_url(); ?>enquiry/enquiry_update/" method="post" enctype="multipart/form-data" id="enquiry_update" name="enquiry_update" class="form">
							<div class="form-row">
							
								<div class="form-group col-md-6">
									<label class="col-form-label">Admin Reply</label>
								   <textarea id="enqReply" name='enqReply' class="form-control" rows="5"></textarea>
								</div>
								<div class="form-group col-md-6"></div>
								 <div class="form-row">
									<div class="form-group col-md-6">
									 <input type="hidden" name="chat_for" id="chat_for" value="<?php echo $chat_for; ?>">
									<button type="submit" class="btn btn-primary">Submit</button></div>
									<div class="form-group col-md-6"></div>
								</div>	
						</div>
						</form>
						</div>
					</div>
</div>

<?php 			} ?>

	</div> <!-- container-fluid -->
</div> <!-- content -->

<script type="text/javascript">
	$('#menu3').addClass('active');

	$('#enquiry_update').validate({ // initialize the plugin
		 rules: {
			 enqReply:{required:true}
		 },
		 messages: {
			  enqReply: "Please Enter Replay Message",
			 }
	 });
</script>
		