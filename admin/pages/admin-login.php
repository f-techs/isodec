<?php require_once('../../config.php') ?>
<?php
if (isset($_GET['session'])) {
	$session = $_GET['session'];
}
?>
<!DOCTYPE html>
	<head><base href="">
		<meta charset="utf-8" />
		<title><?php echo SITENAME; ?></title>
		<meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="<?php echo URLROOT?>/assets/admin/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="<?php echo URLROOT?>/assets/admin/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo URLROOT?>/assets/admin/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo URLROOT?>/assets/admin/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="<?php echo URLROOT?>/assets/admin/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo URLROOT?>/assets/admin/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo URLROOT?>/assets/admin/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo URLROOT?>/assets/admin/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="<?php echo URLROOT; ?>/favicon.ico" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		
		<!--end::Header Mobile-->
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
	<!--begin::Login-->

	<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
		<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-3.jpg');">
			<div class="login-form text-center p-7 position-relative overflow-hidden">
				<!--begin::Login Header-->
				<div class="d-flex flex-center mb-15">
					<a href="<?php echo URLROOT?>/admin/pages/admin-login">
						<img src="<?php echo URLROOT ?>/assets/public/images/brand_logo.png" class="max-h-75px" alt="" />
					</a>
				</div>
				<!--end::Login Header-->
				<!--begin::Login Sign in form-->
				<div class="login-signin">
					<div class="mb-20">
						<h3>Login To Admin</h3>
						<div class="text-muted font-weight-bold">Enter your details to login to your account:</div>
					</div>
					<div id="alert-msg" class="alert  m-3 text-center" style="display:none;" role="alert">
						<h5 id="alert-text"></h5>
					</div>
					<form class="form" id="frmUserLogin">
						<div class="form-group mb-5">
							<input class="form-control" type="email" id="email" name="email" placeholder="Email" required />
						</div>
						<div class="form-group mb-5">
							<input class="form-control" type="password" id="password" name="password" placeholder="Password" required />
						</div>
						<div class="form-group d-flex flex-wrap justify-content-between align-items-center">
							<a href="<?php echo URLROOT?>/admin/pages/forgot-password" id="kt_login_forgot" class="text-muted text-hover-primary">Forget Password ?</a>
						</div>
						<button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Login</button>
					</form>
				</div>
				<!--end::Login Sign in form-->
			</div>
		</div>
	</div>
	<!--end::Login-->
	<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i aria-hidden="true" class="ki ki-close"></i>
					</button>
				</div>
				<div class="modal-body">
					<div class="d-flex flex-column-fluid">
						<!--begin::Container-->
						<div class="container">
							<div class="row">
								<!--begin::mission col-->
								<div class="col-md-12 my-2">
									<div class="card card-custom">
										<div class="card-header">
											<h3 class="card-title text-center">You are logging as <badge id="username" class="badge badge-success"></badge>
											</h3>
										</div>
										<!--begin::Form-->
										<form id="frmchangePass" method="Post">
											<h3>Change the default Password:</h3>
											<hr>
											<div class="card-body">
												<div class="form-group row" id="service_div">
													<div class="col-lg-12 col-md-12 col-sm-12">
														<label>Enter New Password:</label>
														<input class="form-control" minlength="8" type="password" name="new_password" id="new_password" required />
													</div>
												</div>
												<div class="form-group">
													<label class="cr-styled">
														<input type="checkbox" onclick="showPass()">
														<i class="fa"></i>
														Show Password
													</label>
												</div>
											</div>
											<div class="card-footer">
												<div class="row">
													<div class="col-lg-12 text-right">
														<button type="submit" id="btn_submit" class="btn btn-primary mr-2">Change Password</button>
														<input type="hidden" name="action" id="action" value="" />
														<input type="hidden" name="session" id="session" value="<?php echo $session; ?>" />
														<input type="hidden" name="userID" id="userID" value="" />
														<div id="loader" style="display:none;"><img src='<?php echo URLROOT ?>/assets/admin/media/svg/spinners/spinner.gif' /> Please Wait...</div>
													</div>
												</div>
											</div>
										</form>
										<!--end::Form-->
									</div>
								</div>
								<!--end::mission_col-->
							</div>
							<hr>
							<!--end::stats-->
						</div>
						<!--end::Container-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end::Main-->
<?php include(APPROOT . '/includes/admin/footer.php'); ?>
<script type="text/javascript">
	let session = $('#session').val();
	if (session == 'logged-out') {
		Swal.fire({
			title: "Message",
			text: "Logged out successfully",
			icon: "success",
			confirmButtonText: "OK"
		});
	}else if(session=='expired'){
		Swal.fire({
			title: "Message",
			text: "The system was idle for 30mins. You have been logged out. Login again",
			icon: "info",
			confirmButtonText: "OK"
		});	
	}

	function showPass() {
		var passtoggle = document.getElementById("new_password");
		if (passtoggle.type === "password") {
			passtoggle.type = "text";
		} else {
			passtoggle.type = "password"
		}
	}

	$('#frmUserLogin').on('submit', function(e) {
		e.preventDefault();
		let email = $('#email').val();
		let userpassword = $('#password').val();
		$.post('<?php echo URLROOT ?>/admin/scripts/login-user_script.php', {
			email: email,
			userpassword: userpassword
		}, function(data) {
			//alert(data);
			let response = JSON.parse(data);
			if (response.status == 'default') {
				$('#changePass').modal('show');
				$('#userID').val(response.userID);
				$('#username').html(response.username);
			} else if (response.status == 'changed') {
				window.location.href = "<?php echo URLROOT ?>/admin/pages/dashboard";
			} else if (response.status == 'wrong') {
				Swal.fire({
					title: "Message",
					text: "" + response.message,
					icon: "" + response.class,
					confirmButtonText: "OK"
				});
				$('#password').focus();
			} else if (response.status == 'fail') {
				Swal.fire({
					title: "Message",
					text: "" + response.message,
					icon: "" + response.class,
					confirmButtonText: "OK"
				});
				$('#email').focus();
			}
		});
	});
	$('#frmchangePass').on('submit', function(e) {
		e.preventDefault();
		let userID = $('#userID').val();
		let changePass = $('#new_password').val();
		$.post('<?php echo URLROOT ?>/admin/scripts/change_default_password_script.php', {
			userID: userID,
			changePass: changePass
		}, function(data) {
			let response = JSON.parse(data);
			if (response.status == 'success') {
				$('#changePass').modal('hide');
				$('#alert-msg').show();
				$('#alert-msg').addClass('alert-success');
				$('#alert-text').text('Password Changed. Use new password to login');
				$('#password').focus();
				$('#password').val('');
			} else if (response.status == 'fail') {
				Swal.fire({
					title: "Message",
					text: "Fail to change password. Try again",
					icon: "error",
					confirmButtonText: "OK"
				});
				$('#new_password').focus();
			}
		});
	});
</script>