<?php require_once('../../config.php') ?>
<?php include(APPROOT . '/includes/admin/header.php'); ?>
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
						<?php include(APPROOT.'/includes/admin/topbar-button.php'); ?>
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

					<div class="row">
						<!--begin::mission col-->
						<div class="col-md-12 my-2">
							<div class="card card-custom">
								<div class="card-header">
									<h3 class="card-title">
										Describe history Page:
									</h3>
								</div>
								<!--begin::Form-->
								<form id="frmhistory" method="Post" enctype="multipart/form-data">
									<div class="card-body">
										<div class="form-group row">
											<label class="col-form-label text-right col-lg-2 col-sm-12">Type Content Here:</label>
											<div class="col-lg-10 col-md-10 col-sm-12">
												<textarea id="history_content" name="history_content" class="form-control" <?php echo (!empty($historyID)) ? '' : 'required'; ?>><?php echo (!empty($historyID)) ? $historyDetails : ''; ?></textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label text-right col-lg-2 col-sm-12">Upload Image Here:</label>
											<div class="col-lg-10 col-md-10 col-sm-12">
												<div class="image-input image-input-outline" id="img" style="background-image: url(<?php echo URLROOT ?>/assets/admin/media/avatars/image.png)">
													<div class="image-input-wrapper" style="background-image: url(<?php echo URLROOT ?>/assets/admin/media/uploadImages/<?php echo (!empty($historyID)) ? $historyImg : ''; ?>)"></div>

													<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change image">
														<i class="fa fa-pen icon-sm text-muted"></i>
														<input type="file" name="img_file" id="img_file" accept=".png, .jpg, .jpeg" <?php echo (!empty($historyID)  && !empty($historyImg)) ? '' : 'required'; ?> />
														<input type="hidden" id="image_remove_name" value="<?php echo (!empty($historyID)) ? $historyImg : ''; ?>" name="profile_avatar_remove" />
													</label>
													<!--
													<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel image">
														<i class="ki ki-bold-close icon-xs text-muted"></i>
													</span>-->
													<span style="display:none;" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" id="img-remove-action" data-action="remove" data-toggle="tooltip" title="Remove image">
														<i class="ki ki-bold-close icon-xs text-muted"></i>
													</span>
												</div>
												<!--remove image-->
												<span style="display:<?php echo (!empty($historyID)  && !empty($historyImg)) ? 'inline-block' : 'none'; ?>;" class="btn btn-xs btn-icon btn-circle btn-danger btn-hover-text-primary btn-shadow" id="img_remove" data-toggle="tooltip" title="Remove image">
													<i class="ki ki-bold-close icon-xs"></i>
												</span>
												<!--view image-->
												<span style="display:<?php echo (!empty($historyImg)  && !empty($historyImg)) ? 'inline-block' : 'none'; ?>;" class="btn btn-xs btn-icon btn-circle btn-success btn-hover-text-primary btn-shadow" id="view_image" data-toggle="tooltip" title="View image">
													<i class="far fa-eye icon-xs"></i>
												</span>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label text-right col-lg-2 col-sm-12">Image Caption:</label>
											<div class="col-lg-10 col-md-10 col-sm-12">
												<textarea id="img_caption" name="img_caption" class="form-control" <?php echo (!empty($historyID)) ? '' : 'required'; ?>><?php echo (!empty($historyID)) ? $historyImgCaption : ''; ?></textarea>
											</div>
										</div>
									</div>
									<div class="card-footer">
										<div class="row">
											<div class="col-lg-12 text-right">
												<button type="submit" id="btn_submit" class="btn btn-primary mr-2">Submit</button>
												<div id="loader" style="display:none;"><img src='<?php echo URLROOT ?>/assets/admin/media/svg/spinners/spinner.gif' /> Please Wait...</div>
											</div>
										</div>
									</div>
								</form>
								<!--end::Form-->

								<!--begin::progress modal-->
								<!-- Modal-->
								<div class="modal fade" id="imgShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">history Image</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<i aria-hidden="true" class="ki ki-close"></i>
												</button>
											</div>
											<div class="modal-body">
												<img src="<?php echo URLROOT ?>/assets/admin/media/uploadImages/<?php echo (!empty($historyID)) ? $historyImg : ''; ?>" style="width:100%;height:100%; display:block;" />
											</div>
										</div>
									</div>
								</div>
								<!--end:: progress modal-->
							</div>
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
	var imgUpload = new KTImageInput('img');


	imgUpload.on('change', function(imageInput) {

	});


	$('#img_remove').on('click', function() {
		var imgname = $('#image_remove_name').val();
		if (imgname !== '') {
			Swal.fire({
				title: "Are you sure?",
				text: "The image will be deleted",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Yes, delete it!",
				cancelButtonText: "No, cancel!",
				reverseButtons: true
			}).then(function(result) {
				if (result.value) {
					$.post('<?php echo URLROOT ?>/admin/scripts/about_image_delete_script.php',{imgname_history:imgname},function(response){
						if(response==='success'){
							$('#img-remove-action').click();
							$('#img_remove').hide();
							$('#view_image').hide();
							$('#img_file').prop('required', true);
							Swal.fire("Note!", "Image deleted", "success");
						}
					})
				} else if (result.dismiss === "cancel") {
					
				}
			});
		}

           });

     //event to remove image from display
	imgUpload.on('remove', function(imageInput){});


	// Text Editor Intialization
	var historyNote = function() {
		// Private functions
		var historyEditor = function() {
			$('#history_content').summernote({
				height: 150
			});
		}

		return {
			// public functions
			init: function() {
				historyEditor();
			}
		};
	}();

	//check summernote content
	$('#btn_submit').on('click', function() {
		// get summernote details and make textarea required
		let history_content = '';
		if ($('#history_content').summernote('isEmpty')) {
			history_content = $('#history_content').val('');
			$('#history_content').prop('require', true);
			Swal.fire("Note!", "Mission Description cannot be empty", "warning");
		} else {
			history_content = $('#history_content').val();
			$('#history_content').prop('require', false);
		}
	})

//view image
$('#view_image').on('click', function() {
		$('#imgShow').modal('show');
	});

	//Submit form
	$('#frmhistory').on('submit', function(e) {
		e.preventDefault();
		//get summernote details befor post
		$.ajax({
			method: 'POST',
			url: '<?php echo URLROOT ?>/admin/scripts/add_history_script.php',
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

	// Initialization
	jQuery(document).ready(function() {
		historyNote.init();
	});
</script>