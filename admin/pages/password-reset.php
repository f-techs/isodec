<?php
require_once('../../config.php');
if (isset($_GET['email'])) {
    $email = $_GET['email'];
}
if (isset($_GET['token'])) {
    $token = $_GET['token'];
}
if ($email) {
    $sql = DB::getInstance()->select_query("SELECT * FROM tbl_users WHERE user_email='$email' AND token='$token'
    AND token<>'' AND token_expire > NOW() ");
    $c = $sql->count();
    if ($c > 0) {
        $message = 'pass';
    } else {
        $message = 'fail';
    }
}
?>
<?php require_once('../../config.php') ?>
<?php
if (isset($_GET['session'])) {
    $session = $_GET['session'];
}
?>
<!DOCTYPE html>

<head>
    <base href="">
    <meta charset="utf-8" />
    <title><?php echo SITENAME; ?></title>
    <meta name="description" content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="<?php echo URLROOT ?>/assets/admin/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="<?php echo URLROOT ?>/assets/admin/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT ?>/assets/admin/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT ?>/assets/admin/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="<?php echo URLROOT ?>/assets/admin/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT ?>/assets/admin/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT ?>/assets/admin/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT ?>/assets/admin/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/favicon.ico" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
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
                        <a href="<?php echo URLROOT ?>/admin/pages/admin-login">
                            <img src="<?php echo URLROOT ?>/assets/public/images/brand_logo.png" class="max-h-75px" alt="" />
                        </a>
                    </div>
                    <!--end::Login Header-->
                    <!--begin::Login Sign in form-->
                    <?php  if($message=='pass'): ?>
                    <div class="login-signin" style="display:block;">
                        <div class="mb-20">
                            <h3>Create New Password</h3>
                            <div class="font-weight-bold">Enter a new password to reset you password:</div>
                        </div>
                        <div id="alert-msg" class="alert  m-3 text-center" style="display:none;" role="alert">
                            <h5 id="alert-text"></h5>
                        </div>
                        <form class="form" id="frmChange">
                            <div class="form-group row" id="service_div">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <label>Enter New Password:</label>
                                    <input class="form-control" minlength="8" type="password" name="new_password" id="new_password" required />
                                    <input type="hidden" id="email" name="email" value="<?php echo $email; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="cr-styled">
                                    <input type="checkbox" onclick="showPass()">
                                    <i class="fa"></i>
                                    Show Password
                                </label>
                            </div>
                            <button id="btn_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>
                            <div id="wait" style="display:none;">Please Wait...</div>
                        </form>
                    </div>
                    <div><a id="loginPage" style="display:none;" href="<?php echo URLROOT ?>/admin/pages/admin-login" class="btn btn-success">Click Here login with new password.</a></div>
                    <?php elseif($message=='fail'): ?>
                        <div class="mb-20">
                            <h3 class="text-danger">Expired Password Reset Link</h3>
                            <div class="alert alert-info">Sorry. It seems the Password Reset Link we sent to your email has expired.</div>
                            <div><button id="<?php echo $email;?>" class="btn btn-success resend-link">Resend Password Reset link</button></div>
                            <div id="wait" style="display:none;">Please Wait...</div>
                        </div>
                    <?php endif; ?>
                    <!--end::Login Sign in form-->
                </div>
            </div>
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->
    <?php include(APPROOT . '/includes/admin/footer.php'); ?>
    <script type="text/javascript">    
        function showPass() {
            var passtoggle = document.getElementById("new_password");
            if (passtoggle.type === "password") {
                passtoggle.type = "text";
            } else {
                passtoggle.type = "password"
            }
        }

        $('.resend-link').on('click', function(e) {
            e.preventDefault();
            let email = $(this).attr('id');
            $('#wait').show();
            $.post('<?php echo URLROOT ?>/admin/scripts/send_pass_reset_script.php', {
                email: email
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
        $('#frmChange').on('submit', function(e){
         e.preventDefault();
         let email=$('#email').val();
         let newpassword=$('#new_password').val();
         $.post('<?php echo URLROOT ?>/admin/scripts/reset_password_script.php', {
                email: email, newpassword:newpassword,
            }, function(data) {
                alert(data);
               let response=JSON.parse(data);
               Swal.fire({
					title: "Message",
					text: "" + response.message,
					icon: "" + response.class,
					confirmButtonText: "OK"
				});
                $('#wait').hide();
              if(response.status=='success'){
               $('#frmChange')[0].reset();
               $('#loginPage').show();
               $('.login-signin').hide();
              }else{
                $('#loginPage').hide(); 
                $('.login-signin').show();
              }
            });
        });
    </script>