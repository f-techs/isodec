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
	<body  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
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
						<h3>Confirm Email</h3>
						<div class="font-weight-bold">Enter your email to receive password reset link:</div>
					</div>
					<div id="alert-msg" class="alert  m-3 text-center" style="display:none;" role="alert">
						<h5 id="alert-text"></h5>
					</div>
					<form class="form" id="frmPassReset">
						<div class="form-group mb-5">
							<input class="form-control" type="email" id="email" name="email" placeholder="Email" required />
						</div>
						<button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>
					</form>
					<div id="wait" class="text-success" style="display:none;">Trying to send reset link to your email. Please wait...</div>
				</div>
				<!--end::Login Sign in form-->
			</div>
		</div>
	</div>
	<!--end::Login-->
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

	$('#frmPassReset').on('submit', function(e) {
		e.preventDefault();
		let email = $('#email').val();
		$('#wait').show();
		$.post('<?php echo URLROOT ?>/admin/scripts/send_pass_reset_script', {
			email: email,
		}, function(data) {
			let response=JSON.parse(data);
			Swal.fire({
					title: "Message",
					text: "" + response.message,
					icon: "" + response.class,
					confirmButtonText: "OK"
				});
				$('#wait').hide();
			
		});
	});
</script>