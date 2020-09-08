
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
				<h4 class="header-title mt-0">SPV Awards</h4><hr>
<?php if($this->session->flashdata('alert')) { $alert = $this->session->flashdata('alert');?>

								<div class="<?php echo $alert['class'] ?> alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $alert['text']; ?>
								</div>	
<?php } ?>
					<form action="<?php echo base_url(); ?>spv/add_award" method="post" enctype="multipart/form-data" id="add_award" name="add_award" class="form">

						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="col-form-label">Award Date</label>
								<input type="text" class="form-control" placeholder="DD-MM-YYYY" id="nfDate" name="nfDate">
							</div>
							<div class="form-group col-md-6">
								
							</div>						
						</div>
						
						 <div class="form-row">
							<div class="form-group col-md-6">
								<label class="col-form-label">Award Details (Tamil)</label>
								<textarea id="tDeatil" name='tDeatil' class="form-control" rows="3"></textarea>
							</div>
							<div class="form-group col-md-6">
								<label class="col-form-label">Award Details (English)</label>
							   <textarea id="eDeatil" name='eDeatil' class="form-control" rows="3"></textarea>
							</div>
						</div>
						
						 <div class="form-row">
							 
							<div class="form-group col-md-6">
								<label class="col-form-label">Status</label>
							   <select id="nStatus" name="nStatus" class="form-control">
										<option value="Active">Active</option>
										<option value="Inactive">Inactive</option>
								</select>
							</div>
							<div class="form-group col-md-6">
								<button type="submit" class="btn btn-primary" style="margin-top:38px;">Submit</button>
							</div>
						</div>

					   
					</form>
				</div>
			</div>
		</div>




		
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">	
<h4 class="page-title">List Awards</h4>	<hr>				
							<table id="datatable" class="table table-bordered  nowrap">
                                        <thead>
                                        <tr>
                                            <th width="5%">#</th>
											<th width="10%">Date</th>
											<th width="70%">Awards</th>
											<th width="10%">Status</th>
                                            <th width="5%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php $i=1; foreach($result as $rows){ ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
											 <td><?php echo date('d-m-Y', strtotime($rows->awards_date)); ?></td>
											<td><?php echo substr_replace($rows->awards_text_en, "...", 100); ?></td>
											<td><?php echo $rows->status; ?></td>
											<td style="text-align:center;"><a data-toggle="tooltip" title="View" href="<?php echo base_url(); ?>spv/award_details/<?php echo base64_encode($rows->id*98765); ?>/">Edit</a></td>
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

$('#add_award').validate({ // initialize the plugin
     rules: {
		 nfDate:{required:true },
		 tDeatil:{required:true },
		 eDeatil:{required:true }
     },
     messages: {
		  nfDate: "Select Award Date",
		  tDeatil: "Enter Tamil Details",
		  eDeatil: "Enter English Details"
         }
 });


</script>
		