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
		<title>Báo cáo giữa các ngày | Quản trị viên</title>
		
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
									<h1 class="mainTitle">Báo cáo giữa các ngày</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Giữa các ngày</span>
									</li>
									<li class="active">
										<span>Báo cáo</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: TIÊU ĐỀ TRANG -->
						<!-- start: VÍ DỤ CƠ BẢN -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Báo cáo giữa các ngày</h5>
												</div>
												<div class="panel-body">
									
													<form role="form" method="post" action="betweendates-detailsreports.php">
														<div class="form-group">
															<label for="exampleInputPassword1">
																 Từ ngày:
															</label>
					<input type="date" class="form-control" name="fromdate" id="fromdate" value="" required='true'>
														</div>
		
													<div class="form-group">
															<label for="exampleInputPassword1">
																 Đến ngày:
															</label>
					 <input type="date" class="form-control" name="todate" id="todate" value="" required='true'>

														</div>	
														
														
														<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
															Gửi
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">
												
												
											</div>
										</div>
									</div>
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
