
<div class="content">
	<!-- Start Content-->
	<div class="container-fluid">

		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-flex align-items-center justify-content-between">
					<h4 class="page-title">About Party</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
							<li class="breadcrumb-item active">Party Elections</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		<!-- end page title -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">
				<h4 class="header-title mt-0">Party Election</h4><hr>
<?php if($this->session->flashdata('alert')) { $alert = $this->session->flashdata('alert');?>

								<div class="<?php echo $alert['class'] ?> alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $alert['text']; ?>
								</div>	
<?php } ?>
					<form action="<?php echo base_url(); ?>party/add_election" method="post" enctype="multipart/form-data" id="add_election" name="add_election" class="form">

						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="col-form-label">Party Leader (Tamil)</label>
								<input type="text" class="form-control" placeholder="Party Leader Tamil" id="leaderTa" name="leaderTa">
							</div>
							<div class="form-group col-md-6">
								<label class="col-form-label">Party Leader (English)</label>
							   <input type="text" class="form-control" placeholder="Party Leader English" id="leaderEn" name="leaderEn">
							</div>
						</div>
						
						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="col-form-label">Election Year</label>
								<select id="eYear" name="eYear" class="form-control">
										<option value="">Select Year</option>
<?php 
$startingYear = '1950';
$endingYear =  date('Y');					

										for ($i = $startingYear;$i <= $endingYear;$i++)
										{
											echo '<option value='.$i.'>'.$i.'</option>';
										}
?>
</select>
							</div>
							<div class="form-group col-md-6">
								<label class="col-form-label">Seats Won</label>
							   <input type="text" class="form-control" placeholder="No. of Seates Won" id="nSeats" name="nSeats" maxlength="4">
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
								<button type="submit" class="btn btn-primary btnSubmit" style="margin-top:38px;">Submit</button>
							</div>
						</div>

					   
					</form>
				</div>
			</div>
		</div>




		
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">	
					<h4 class="page-title">List Elections</h4>	<hr>				
							<table id="datatable" class="table table-bordered  nowrap">
                                        <thead>
                                        <tr>
                                            <th width="5%">#</th>
											<th width="10%">Year</th>
											<th width="60%">Party Leader</th>
											<th width="10%">Seats Won</th>
											<th width="10%">Status</th>
                                            <th width="5%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php $i=1; foreach($result as $rows){ 
										$status = $rows->status;
										?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
											<td><?php echo $rows->election_year; ?></td>
											<td><?php echo $rows->party_leader_en; ?></td>
											<td><?php echo $rows->seats_won; ?></td>
											<td><span <?php if ($status == 'Active') { ?>class="staus_active"<?php } else {?>class="staus_inactive"<?php } ?>><?php echo $rows->status; ?></span></td>
											<td style="text-align:center;"><a data-toggle="tooltip" title="Edit" href="<?php echo base_url(); ?>party/election_details/<?php echo base64_encode($rows->id*98765); ?>/">Edit</a></td>
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
 
$('#menu5').addClass('active');

$('#add_election').validate({ // initialize the plugin
     rules: {
		 leaderTa:{required:true },
		 leaderEn:{required:true },
		 eYear:{required:true },
		 nSeats:{
				required:true, 
				number:true
				}
		 
     },
     messages: {
		  leaderTa: "Enter Party Leader in Tamil",
		  leaderEn: "Enter Party Leader in English",
		  eYear: "Select Election Year",
		  nSeats: {
				required: "Enter No. of Seats",
				number:"Enter Numbers Only"
			}
         },
		 submitHandler: function(form) { // <- pass 'form' argument in
            $(".btnSubmit").attr("disabled", true);
            form.submit(); // <- use 'form' argument here.
        }
 });


</script>
		