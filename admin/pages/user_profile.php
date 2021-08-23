<?php require_once('../../config.php') ?>
<?php include(APPROOT . '/includes/admin/header.php'); ?>
<?php
//fetch user-profile
if(isset($_SESSION['userID'])){
    $userID=$_SESSION['userID'];
}
$sqlUser=DB::getInstance()->select_query("SELECT * FROM tbl_users WHERE user_id='$userID' ");
$sqlUserResults=$sqlUser->results();
foreach($sqlUserResults as $data){
    $firstname=$data->firstname;
    $othernames=$data->othernames;
    $email=$data->user_email;
    $phone=$data->phone;
}
?>
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <?php include(APPROOT . '/includes/admin/side-menu.php'); ?>
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header header-fixed">
                <!--begin::Container-->
                <div class="container-fluid d-flex align-items-stretch justify-content-between">
                    <!--begin::Header Menu Wrapper-->
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                        <!--begin::Header Menu-->
                        <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                            <!--begin::Header Nav-->
                            <!--end::Header Nav-->
                        </div>
                        <!--end::Header Menu-->
                    </div>
                    <!--end::Header Menu Wrapper-->
                    <!--begin::Topbar-->
                    <div class="topbar">
                        <!--begin::User-->
                        <?php include(APPROOT . '/includes/admin/topbar-button.php'); ?>
                        <!--end::User-->
                    </div>
                    <!--end::Topbar-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::Content-->
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title">
                                <h3 class="card-label"> Your Profile</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12 my-2">
                                <div class="card card-custom">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            You can update the information below:
                                        </h3>
                                        <div class="card-toolbar">
                                            <!--begin::Button-->
                                            <a id="btnPassChange" data-toggle="modal" data-target="#changePass" class="btn btn-primary font-weight-bolder">
                                                <span class="svg-icon svg-icon-md">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                                            <path d="M14.5,11 C15.0522847,11 15.5,11.4477153 15.5,12 L15.5,15 C15.5,15.5522847 15.0522847,16 14.5,16 L9.5,16 C8.94771525,16 8.5,15.5522847 8.5,15 L8.5,12 C8.5,11.4477153 8.94771525,11 9.5,11 L9.5,10.5 C9.5,9.11928813 10.6192881,8 12,8 C13.3807119,8 14.5,9.11928813 14.5,10.5 L14.5,11 Z M12,9 C11.1715729,9 10.5,9.67157288 10.5,10.5 L10.5,11 L13.5,11 L13.5,10.5 C13.5,9.67157288 12.8284271,9 12,9 Z" fill="#000000" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>Change Password</a>
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                    <!--begin::Form-->
                                    <form id="frmUsers" method="Post">
                                        <div class="card-body">
                                            <div class="form-group row" id="service_div">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>First Name:</label>
                                                    <input class="form-control" type="text" value="<?php echo ucwords($firstname); ?>" name="first_name" id="first_name" required />
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>Other Names:</label>
                                                    <input class="form-control" type="text" value="<?php echo ucwords($othernames); ?>" name="other_names" id="other_names" required />
                                                </div>
                                            </div>
                                            <div class="form-group row" id="service_div">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>Email:</label>
                                                    <input class="form-control" type="email" value="<?php echo $email; ?>" name="email" id="email" required />
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <label>Phone:</label>
                                                    <input class="form-control" maxlength="10" value="<?php echo $phone; ?>" minlength="10" type="text" name="phone" id="phone" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-lg-12 text-right">
                                                    <button type="submit" id="btn_submit" class="btn btn-primary mr-2">Update</button>
                                                    <input type="hidden" name="action" id="action" value="" />
                                                    <div id="loader" style="display:none;"><img src='<?php echo URLROOT ?>/assets/admin/media/svg/spinners/spinner.gif' /> Please Wait...</div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

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
                                                                        <!--begin::Form-->
                                                                        <form id="frmchangePass" method="Post">
                                                                            <div class="card-body">
                                                                            <div class="form-group row" id="service_div">
                                                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                                                        <label>Enter Old Password:</label>
                                                                                        <input class="form-control" minlength="8" type="password" name="old_password" id="old_password" required />
                                                                                    </div>
                                                                                </div>
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
                                    <!--end::Form-->
                                </div>
                            </div>
                            <!--end::mission_col-->
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::mission_col-->
            </div>
            <hr>
            <!--end::stats-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->

    <!--begin::Footer-->
    <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
        <!--begin::Container-->
        <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted font-weight-bold mr-2">2021©</span>
                <a href="#" target="_blank" class="text-dark-75 text-hover-primary">ISODEC</a>
            </div>
            <!--end::Copyright-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Footer-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Main-->
<?php include(APPROOT . '/includes/admin/footer.php'); ?>
<script type="text/javascript">
//toggle
function showPass() {
		var passtoggle = document.getElementById("new_password");
		if (passtoggle.type === "password") {
			passtoggle.type = "text";
		} else {
			passtoggle.type = "password"
		}
	}

    //Form Subnission
    $('#btn_submit').on('clikc', function() {
        $('#action').val('Update');
    })
    $('#frmUsers').on('submit', function(e) {
        e.preventDefault();
        //get summernote details befor post
        $.ajax({
            method: 'POST',
            url: '<?php echo URLROOT ?>/admin/scripts/update_user_profile_script.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#btn_submit').prop('disabled', true);
                $('#loader').show();
            },
            success: function(data) {
                //alert(data);
                var response = JSON.parse(data);
                Swal.fire({
                    title: "Message",
                    text: "" + response.message,
                    icon: "" + response.status,
                    confirmButtonText: "OK"
                }).then(function(result) {
                    if (result.value) {
                        location.reload();
                    }
                });
            },
            complete: function() {
                $('#loader').hide();
                $('#btn_submit').prop('disabled', false);
            }
        });
    });

    $('#frmchangePass').on('submit', function(e) {
		e.preventDefault();
		let oldPass = $('#old_password').val();
		let newPass = $('#new_password').val();
		$.post('<?php echo URLROOT ?>/admin/scripts/change_user_password.php', {
			oldPass: oldPass,
			newPass: newPass
		}, function(data) {
            alert(data);
			let response = JSON.parse(data);
			if (response.status == 'success') {
				$('#changePass').modal('hide');
                $('#frmchangePass')[0].reset();
                Swal.fire({
					title: "Message",
					text: "Password Changed Successfully",
					icon: "success",
					confirmButtonText: "OK"
				});
			} else if (response.status == 'fail') {
				Swal.fire({
					title: "Message",
					text: "Fail to change password. Wrong Old Password",
					icon: "error",
					confirmButtonText: "OK"
				});
				$('#old_password').focus();
			}
		});
	});


</script>