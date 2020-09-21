


<div class="content">

	<!-- Start Content-->
	<div class="container-fluid">

		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-flex align-items-center justify-content-between">
					<h4 class="page-title">Dashboard</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
							<li class="breadcrumb-item active">Dashboard</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		<!-- end page title -->

		<div class="row">

			<div class="col-xl-3 col-md-6">
				<div class="card-box widgets_shadows" style="height:175px;">
					
					<h4 class="header-title mt-0 mb-4">No. of Posts</h4>

					<div class="widget-chart-1">
						<div class="widget-chart-box-1 float-left"><img src="<?php echo base_url(); ?>assets/plugins/images/widget_1.png" alt=""></div>
						<div class="widget-detail-1 text-right" style="position: absolute;bottom:35px;right:30px;">
							<h2 class="font-weight-bold pt-2 mb-1"> <?php echo $widgets_count['post_count']; ?> </h2>
							<p class="text-muted mb-1" style="font-size:16px;">Total Posts</p>
						</div>
					</div>
				</div>

			</div><!-- end col -->

			<div class="col-xl-3 col-md-6">
				<div class="card-box widgets_shadows" style="height:175px;">

					<h4 class="header-title mt-0 mb-4">No. of Events</h4>

					<div class="widget-chart-1">
						<div class="widget-chart-box-1 float-left"><img src="<?php echo base_url(); ?>assets/plugins/images/widget_2.png" alt=""></div>
						<div class="widget-detail-1 text-right" style="position: absolute;bottom:35px;right:30px;">
							<h2 class="font-weight-bold pt-2 mb-1"> <?php echo $widgets_count['event_count']; ?> </h2>
							<p class="text-muted mb-1" style="font-size:16px;">Total Events</p>
						</div>
					</div>
				</div>

			</div><!-- end col -->

			<div class="col-xl-3 col-md-6">
				<div class="card-box widgets_shadows" style="height:175px;">
			
					<h4 class="header-title mt-0 mb-4">No. of Quries</h4>

					<div class="widget-chart-1">
						<div class="widget-chart-box-1 float-left"><img src="<?php echo base_url(); ?>assets/plugins/images/widget_3.png" alt=""></div>

						<div class="widget-detail-1 text-right" style="position: absolute;bottom:35px;right:30px;">
							<h2 class="font-weight-bold pt-2 mb-1"> <?php echo $widgets_count['enquiry_count']; ?> </h2>
							<p class="text-muted mb-1" style="font-size:16px;"><a href="<?php echo base_url(); ?>enquiry/enquiry_latest/">Pending Quries</a></p>
						</div>
					</div>
				</div>

			</div><!-- end col -->

			<div class="col-xl-3 col-md-6">
				<div class="card-box widgets_shadows" style="height:175px;">

					<h4 class="header-title mt-0 mb-4">No. of Users</h4>

					<div class="widget-chart-1">
						<div class="widget-chart-box-1 float-left"><img src="<?php echo base_url(); ?>assets/plugins/images/widget_4.png" alt=""></div>

						<div class="widget-detail-1 text-right" style="position: absolute;bottom:35px;right:30px;">
							<h2 class="font-weight-bold pt-2 mb-1"> <?php echo $widgets_count['user_count']; ?> </h2>
							<p class="text-muted mb-1" style="font-size:16px;"><a href="<?php echo base_url(); ?>users/application/">Total Users</a></p>
						</div>
					</div>
				</div>

			</div><!-- end col -->

		</div>
		<!-- end row -->

		<div class="row">
			

			<div class="col-xl-8">
				<div class="card-box widgets_shadows">
					
					<h4 class="header-title mt-0" style="padding-bottom:10px;">User Statistics</h4>
					<?php if (count($app_user)>0){ ?>
						<div id="user_stat" style="height: 290px;"></div>
					<?php } else {?>
						<div id="default" style="height: 290px;"></div>
					<?php } ?>
				</div>
			</div><!-- end col -->

			<div class="col-xl-4">
				<div class="card-box widgets_shadows">
					<h4 class="header-title mt-0">Photos & Videos</h4>
					<div class="table-responsive" style="height: 300px;">
						<table class="table table-hover mb-0">
							<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Images</th>
								<th>Videos</th>
							</tr>
							</thead>
							<tbody>
							<?php $i=1; foreach($gallery_list as $gallery)	{ 
									$category_name = $gallery->category_name;
									$category_id = $gallery->id;
									
									$sQuery = "SELECT * FROM news_feed WHERE `nf_category_id` = '$category_id' AND nf_profile_type = 'V'";
									$q_result = $this->db->query($sQuery);
									$video_count = $q_result->num_rows();
									
									$sQuery = "SELECT * FROM nf_image_gallery WHERE `nf_category_id` = '$category_id'";
									$q_result = $this->db->query($sQuery);
									$image_count = $q_result->num_rows();
							?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $category_name; ?></td>
									<td><?php echo $image_count; ?></td>
									<td><?php echo $video_count; ?></td>
								</tr>
							<?php $i++;  } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div><!-- end col -->

		</div>
		<!-- end row -->


		<div class="row">
			<div class="col-xl-4 col-md-6">
				<div class="card-box widget-user widgets_shadows">
					<div class="media">
						<div class="avatar-lg mr-3">
							<img src="<?php echo base_url(); ?>assets/plugins/images/namakaaga_logo.jpg" class="img-fluid rounded-circle" alt="Namakaaga Ullatchi">
						</div>
						<div class="media-body overflow-hidden">
							<h5 class="mt-0 mb-1">Namakaaga Ullatchi</h5>
							<p class="text-muted mb-2 font-13 text-truncate">My gratitude to all the Corporation Healthcare workers</p>
							<p><a href="<?php echo base_url(); ?>spv/namakkaga/">View More</a></p>
						</div>
					</div>
				</div>
			</div><!-- end col -->

			<div class="col-xl-4 col-md-6">
				<div class="card-box widget-user widgets_shadows">
					<div class="media">
						<div class="avatar-lg mr-3">
							<img src="<?php echo base_url(); ?>assets/plugins/images/academy_logo.jpg" class="img-fluid rounded-circle" alt="Amma IAS Academy">
						</div>
						<div class="media-body overflow-hidden">
							<h5 class="mt-0 mb-1">Amma IAS Academy</h5>
							<p class="text-muted mb-2 font-13 text-truncate">This initiative is to remind and reiterate our individual</p>
							<p><a href="<?php echo base_url(); ?>spv/ammaias/">View More</a></p>
						</div>
					</div>
				</div>
			</div><!-- end col -->

			<div class="col-xl-4 col-md-6">
				<div class="card-box widget-user widgets_shadows">
					<div class="media">
						<div class="avatar-lg mr-3">
							<img src="<?php echo base_url(); ?>assets/plugins/images/nallaram_logo.jpg" class="img-fluid rounded-circle" alt="Nallaramm Trust">
						</div>
						<div class="media-body overflow-hidden">
							<h5 class="mt-0 mb-1">Nallaramm Trust</h5>
							<p class="text-muted mb-2 font-13 text-truncate">This initiative is to remind and reiterate our individual</p>
							<p><a href="<?php echo base_url(); ?>newsfeed/list_news/">View More</a></p>
						</div>
					</div>
				</div>
			</div><!-- end col -->


		</div>
		<!-- end row -->

		<div class="row">
			<div class="col-xl-4">
				<div class="card-box widgets_shadows">

					<h4 class="header-title mb-3">Admin User List</h4>

					<div class="inbox-widget" style="height:300px;">
						<?php $i=1; foreach($user_list as $admin_users){ 
							$user_status = $admin_users->status;
						?>
						
						<div class="inbox-item">
							<a href="#">
								<div class="inbox-item-img"><img src="<?php echo base_url(); ?>assets/users/<?php echo $admin_users->profile_pic; ?>" class="rounded-circle" alt=""></div>
								<h5 class="inbox-item-author mt-0 mb-1"><?php echo $admin_users->full_name; ?></h5>
								<p class="inbox-item-text"><?php echo $admin_users->email_id; ?></p>
								<p class="inbox-item-date <?php if ($user_status == 'Active') { ?>staus_active<?php } else {?>staus_inactive<?php } ?>"><?php echo $admin_users->status; ?></p>
							</a>
						</div>
						
						<?php $i++; } ?>

					</div>
					<div style="text-align:center;font-weight:bold;"><a href="<?php echo base_url(); ?>/users/admin/">View More</a></div>
				</div>
			</div><!-- end col -->

			<div class="col-xl-8">
				<div class="card-box widgets_shadows">

					<h4 class="header-title mt-0 mb-3">Latest Query List</h4>

					<div class="table-responsive" style="height:300px;">
					
					
						<table class="table table-hover mb-0">
							<thead>
							<tr>
								<th>#</th>
								<th>User Name</th>
								<th>Date</th>
								<th>Query</th>
							</tr>
							</thead>
							<tbody>
							<?php $i=1; foreach($query_list as $quries){ 
							
							// strip tags to avoid breaking any html
											$string = strip_tags($quries->chat_text);
											if (strlen($string) > 50) {

												// truncate string
												$stringCut = substr($string, 0, 50);
												$endPoint = strrpos($stringCut, ' ');

												//if the string doesn't contain any space then it will cut without word basis.
												$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
												$string .= '...';
											}
							?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $quries->full_name; ?></td>
									<td><?php echo date('d-m-Y', strtotime($quries->created_at)); ?></td>
									<td><?php echo $string; ?></td>
								</tr>
							<?php $i++; } ?>
							</tbody>
						</table>
					</div>
					<div style="text-align:center;font-weight:bold;"><a href="<?php echo base_url(); ?>enquiry/enquiry_latest/">View More</a></div>
				</div>
			</div><!-- end col -->

		</div>
		<!-- end row -->       
		
	</div> <!-- container-fluid -->

</div> <!-- content -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

$('#menu1').addClass('active');


google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['Months', 'Users'],
<?php 	

		foreach($app_user as $rows){ 
			echo "['$rows->disp_month', $rows->total_users],";
		}
?>    
      ]);

      var options = {
       
        chartArea: {width: '80%'},
		legend: { position: 'none' },
        hAxis: {
          title: 'Months',
          minValue: 0
        },
        vAxis: {
          title: 'Users'
        }
      };
      var chart = new google.visualization.ColumnChart(document.getElementById('user_stat'));
      chart.draw(data, options);
    }
</script>

