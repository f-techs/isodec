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
										Describe Mission, Vision & Values Page:
									</h3>
								</div>
								<!--begin::Form-->
								<form id="frmMission" method="Post" enctype="multipart/form-data">
									<div class="card-body">
										<div class="form-group row">
											<label class="col-form-label text-right col-lg-2 col-sm-12">Type Mission Content:</label>
											<div class="col-lg-10 col-md-10 col-sm-12">
												<textarea id="mission_content" name="mission_content" class="form-control" ><?php echo (!empty($messageID)) ? $missionMessage : ''; ?></textarea>
											</div>
										</div>
									</div>
                                    <div class="card-body">
										<div class="form-group row">
											<label class="col-form-label text-right col-lg-2 col-sm-12">Type Vision Content Here:</label>
											<div class="col-lg-10 col-md-10 col-sm-12">
												<textarea id="vision_content" name="vision_content" class="form-control" ><?php echo (!empty($messageID)) ? $visionMessage : ''; ?></textarea>
											</div>
										</div>
									</div>
                                    <div class="card-body">
										<div class="form-group row">
											<label class="col-form-label text-right col-lg-2 col-sm-12">Type Values Content Here:</label>
											<div class="col-lg-10 col-md-10 col-sm-12">
												<textarea id="values_content" name="values_content" class="form-control"><?php echo (!empty($messageID)) ? $isodecValues : ''; ?></textarea>
											</div>
										</div>
									</div>
									<div class="card-footer">
										<div class="row">
											<div class="col-lg-12 text-right">
												<button type="submit" id="btn_submit" class="btn btn-primary mr-2">Submit</button>
												<input type="hidden" name="action" value="<?php echo (!empty($messageID)) ? 'Update' : 'Add'; ?>"/>
                                                <input type="hidden" name="id" value="<?php echo (!empty($messageID)) ? $messageID : ''; ?>"/>
												<div id="loader" style="display:none;"><img src='<?php echo URLROOT ?>/assets/admin/media/svg/spinners/spinner.gif' /> Please Wait...</div>
											</div>
										</div>
									</div>
								</form>
								<!--end::Form-->

								<!--begin::progress modal-->
								<!-- Modal-->
								
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
	// Text Editor Intialization
	var MissionNote = function() {
		// Private functions
		var missionEditor = function() {
			$('#mission_content').summernote({
				height: 150
			});
		}

		return {
			// public functions
			init: function() {
				missionEditor();
			}
		};
	}();
    var VisionNote = function() {
		// Private functions
		var visionEditor = function() {
			$('#vision_content').summernote({
				height: 150
			});
		}

		return {
			// public functions
			init: function() {
				visionEditor();
			}
		};
	}();
    var ValueNote = function() {
		// Private functions
		var valueEditor = function() {
			$('#values_content').summernote({
				height: 150
			});
		}

		return {
			// public functions
			init: function() {
				valueEditor();
			}
		};
	}();

	//check summernote content
	$('#btn_submit').on('click', function(e) {
		// get summernote details and make textarea required
		let mission_content = '';
		if ($('#mission_content').summernote('isEmpty')) {
			mission_content = $('#mission_content').val('');
			$('#mission_content').prop('require', true);
			e.preventDefault();
			Swal.fire("Note!", "Mission Description cannot be empty", "warning");
		} else {
			mission_content = $('#mission_content').val();
			$('#mission_content').prop('require', false);
		}
	})

	//view image
	$('#view_image').on('click', function() {
		$('#imgShow').modal('show');
	});

	//Submit form
	$('#frmMission').on('submit', function(e) {
		e.preventDefault();
		//get summernote details befor post
		$.ajax({
			method: 'POST',
			url: '<?php echo URLROOT ?>/admin/scripts/mission-vision_script.php',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function() {
				$('#btn_submit').prop('disabled', true);
				$('#loader').show();
			},
			success: function(data) {
				// alert(data);
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
		MissionNote.init();
        VisionNote.init();
        ValueNote.init();
	});
</script>