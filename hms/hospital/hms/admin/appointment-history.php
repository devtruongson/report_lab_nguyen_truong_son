<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html lang="vi">
	<head>
		<title>Bệnh nhân | Lịch sử Hẹn khám</title>
		
	
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				

					<?php include('include/header.php');?>
				<!-- end: THANH ĐIỀU HƯỚNG TRÊN CÙNG -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: TIÊU ĐỀ TRANG -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Bệnh nhân | Lịch sử Hẹn khám</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Bệnh nhân</span>
									</li>
									<li class="active">
										<span>Lịch sử Hẹn khám</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: TIÊU ĐỀ TRANG -->
						<!-- start: VÍ DỤ CƠ BẢN -->
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-12">
									
									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">#</th>
												<th class="hidden-xs">Tên Bác sĩ</th>
												<th>Tên Bệnh nhân</th>
												<th>Chuyên môn</th>
												<th>Phí Tư vấn</th>
												<th>Ngày / Giờ Hẹn khám</th>
												<th>Ngày Tạo Hẹn khám</th>
												<th>Tình trạng Hiện tại</th>
												<th>Hành động</th>
												
											</tr>
										</thead>
										<tbody>
<?php
$sql=mysqli_query($con,"select doctors.doctorName as docname,users.fullName as pname,appointment.*  from appointment join doctors on doctors.id=appointment.doctorId join users on users.id=appointment.userId ");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['docname'];?></td>
												<td class="hidden-xs"><?php echo $row['pname'];?></td>
												<td><?php echo $row['doctorSpecialization'];?></td>
												<td><?php echo $row['consultancyFees'];?></td>
												<td><?php echo $row['appointmentDate'];?> / <?php echo
												 $row['appointmentTime'];?>
												</td>
												<td><?php echo $row['postingDate'];?></td>
												<td>
<?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
{
	echo "Hoạt động";
}
if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
{
	echo "Hủy bởi Bệnh nhân";
}

if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
{
	echo "Hủy bởi Bác sĩ";
}



												?></td>
												<td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
							<?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
{ 

													
echo "Chưa có Hành động";
	 } else {

		echo "Đã Hủy";
		} ?>
												</div>
												<div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group" dropdown is-open="status.isopen">
														<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
															<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
														</button>
														<ul class="dropdown-menu pull-right dropdown-light" role="menu">
															<li>
																<a href="#">
																	Chỉnh sửa
																</a>
															</li>
															<li>
																<a href="#">
																	Chia sẻ
																</a>
															</li>
															<li>
																<a href="#">
																	Xóa bỏ
																</a>
															</li>
														</ul>
													</div>
												</div></td>
											</tr>
											
											<?php 
$cnt=$cnt+1;
											 }?>
											
											
										</tbody>
									</table>
								</div>
							</div>
								</div>
						
						<!-- end: VÍ DỤ CƠ BẢN -->
						<!-- end: HỘP CHỌN -->
						
					</div>
				</div>
			</div>
			<!-- start: CHÂN TRANG -->
	<?php include('include/footer.php');?>
			<!-- end: CHÂN TRANG -->
		
			<!-- start: CÀI ĐẶT -->
	<?php include('include/setting.php');?>
			
			<!-- end: CÀI ĐẶT -->
		</div>
		<!-- start: JAVASCRIPTS CHÍNH -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: JAVASCRIPTS CHÍNH -->
		<!-- start: JAVASCRIPTS CẦN THIẾT CHO TRANG NÀY CHỈ -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS CẦN THIẾT CHO TRANG NÀY CHỈ -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: Bộ Xử lý Sự kiện JavaScript cho trang này -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
