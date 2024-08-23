<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if (isset($_POST['submit'])) {
	$docid = $_SESSION['id'];
	$patname = $_POST['patname'] ? $_POST['patname'] : "Đang Cập Nhật";
	$patcontact = $_POST['patcontact'] ? $_POST['patcontact'] : "Đang Cập Nhật";
	$patemail = $_POST['patemail'] ? $_POST['patemail'] : "Đang Cập Nhật";
	$gender = $_POST['gender'] ? $_POST['gender'] : "Đang Cập Nhật";
	$pataddress = $_POST['pataddress'] ? $_POST['pataddress'] : "Đang Cập Nhật";
	$patage = $_POST['patage'] ? $_POST['patage'] : 0;
	$medhis = $_POST['medhis'] ? $_POST['medhis'] : "Đang Cập Nhật";
	$file = $_POST['file'] ? $_POST['file'] : "";
	$thumbnail = $_POST['thumbnail'] ?  $_POST['thumbnail'] : "";

	$query_string = "insert into tblpatient(Docid,PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,PatientAge,PatientMedhis, file, thumbnail) values('$docid','$patname','$patcontact','$patemail','$gender','$pataddress','$patage','$medhis', '$file', '$thumbnail')";

	$sql = mysqli_query($con, $query_string);
	if ($sql) {
		echo "<script>alert('Thông tin bệnh nhân được thêm thành công');</script>";
		header('location:add-patient.php');
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Bác sĩ | Thêm bệnh nhân</title>

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

	<script>
		function userAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'email=' + $("#patemail").val(),
				type: "POST",
				success: function(data) {
					$("#user-availability-status1").html(data);
					$("#loaderIcon").hide();
				},
				error: function() {}
			});
		}
	</script>
</head>

<body>
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">
			<?php include('include/header.php'); ?>

			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle">Bệnh nhân | Thêm bệnh nhân</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Bệnh nhân</span>
								</li>
								<li class="active">
									<span>Thêm bệnh nhân</span>
								</li>
							</ol>
						</div>
					</section>
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title">Thêm bệnh nhân</h5>
											</div>
											<div class="panel-body">
												<form role="form" name="" method="post">
													<div class="form-group">
														<label for="doctorname">
															Tên bệnh nhân
														</label>
														<input type="text" name="patname" class="form-control" placeholder="Enter Patient Name" required>
													</div>
													<div class="form-group">
														<label for="fess">
															Số liên hệ bệnh nhân
														</label>
														<input type="text" name="patcontact" class="form-control" placeholder="Enter Patient Contact no" maxlength="10" pattern="[0-9]+">
													</div>
													<div class="form-group">
														<label for="fess">
															Email bệnh nhân
														</label>
														<input required type="email" id="patemail" name="patemail" class="form-control" placeholder="Enter Patient Email id" onBlur="userAvailability()">
														<span id="user-availability-status1" style="font-size:12px;"></span>
													</div>
													<div class="form-group">
														<label class="block">
															Giới tính
														</label>
														<div class="clip-radio radio-primary">
															<input type="radio" id="rg-female" name="gender" value="female">
															<label for="rg-female">
																Nữ
															</label>
															<input type="radio" id="rg-male" name="gender" value="male">
															<label for="rg-male">
																Nam
															</label>
														</div>
													</div>
													<div class="form-group">
														<label for="address">
															Địa chỉ bệnh nhân
														</label>
														<textarea name="pataddress" class="form-control" placeholder="Enter Patient Address"></textarea>
													</div>
													<div class="form-group">
														<label for="fess">
															Tuổi bệnh nhân
														</label>
														<input type="text" name="patage" class="form-control" placeholder="Enter Patient Age">
													</div>
													<div class="form-group">
														<label for="fess">
															Lịch sử y tế
														</label>
														<textarea type="text" name="medhis" class="form-control" placeholder="Enter Patient Medical History(if any)"></textarea>
													</div>
													<input type="text" hidden value="" id="thumbnail_input_id" name="thumbnail">
													<input type="text" hidden value="" id="file_input_id" name="file">
													<div class="form-group">
														<label for="doctorname">
															Avatar
														</label>
														<input class="form-control" type="file" id="avatar_input" name="fileToUpload" accept="image/png, image/gif, image/jpeg">
													</div>
													<div class="form-group">
														<label for="doctorname">
															File (Docx, Excel...)
														</label>
														<input class="form-control" type="file" id="file_input" name="fileToUpload">
													</div>
													<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
														Thêm
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
		</div>
	</div>
	</div>
	<!-- start: FOOTER -->
	<?php include('include/footer.php'); ?>
	<!-- end: FOOTER -->

	<!-- start: SETTINGS -->
	<?php include('include/setting.php'); ?>

	<!-- end: SETTINGS -->
	</div>
	<!-- start: MAIN JAVASCRIPTS -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/modernizr/modernizr.js"></script>
	<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/switchery/switchery.min.js"></script>
	<!-- end: MAIN JAVASCRIPTS -->
	<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
	<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script src="vendor/autosize/autosize.min.js"></script>
	<script src="vendor/selectFx/classie.js"></script>
	<script src="vendor/selectFx/selectFx.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<!-- start: CLIP-TWO JAVASCRIPTS -->
	<script src="assets/js/main.js"></script>
	<!-- start: JavaScript Event Handlers for this page -->
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

<script>
	const inputAvatar = document.querySelector("#avatar_input");
	const thumbnailInput = document.querySelector("#thumbnail_input_id");
	const fileInput = document.querySelector("#file_input_id");
	const fileInputChoose = document.querySelector("#file_input");

	if (inputAvatar) {
		inputAvatar.addEventListener("change", async function(e) {
			const file = e.target.files[0];
			if (file) {
				const formData = new FormData();
				formData.append('fileToUpload', file);
				try {
					const res = await fetch("upload.php", {
						body: formData,
						method: "post",
					}).then(res => res.text());
					thumbnailInput.setAttribute('value', res);
				} catch (error) {
					console.log(error);
				}
			}
		});
	}

	if (fileInputChoose) {
		fileInputChoose.addEventListener("change", async function(e) {
			const file = e.target.files[0];
			if (file) {
				const formData = new FormData();
				formData.append('fileToUpload', file);
				try {
					const res = await fetch("upload.php", {
						body: formData,
						method: "post",
					}).then(res => res.text());
					fileInput.setAttribute('value', res);
				} catch (error) {
					console.log(error);
				}
			}
		});
	}
</script>