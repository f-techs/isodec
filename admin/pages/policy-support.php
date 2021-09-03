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
						<div class="topbar-item">
							<?php include(APPROOT . '/includes/admin/topbar-button.php'); ?>
						</div>
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
								<h3 class="card-label">Policy Support</h3>
							</div>
							<div class="card-toolbar">
								<!--begin::Button-->
								<a id="btnadd" data-toggle="modal" data-target="#addeconsprogModal" class="btn btn-primary font-weight-bolder">
									<span class="svg-icon svg-icon-md">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
												<path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>Add</a>
								<!--end::Button-->
							</div>
						</div>
						<div class="card-body">
							<!--begin: Search Form-->
							<!--begin::Search Form-->
							<div class="mb-7">
								<div class="row align-items-center">
									<div class="col-lg-9 col-xl-8">
										<div class="row align-items-center">
											<div class="col-md-4 my-2 my-md-0">
												<div class="input-icon">
													<input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
													<span>
														<i class="flaticon2-search-1 text-muted"></i>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--end::Search Form-->
							<!--end: Search Form-->
							<!--begin: Datatable-->
							<table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
								<thead>
									<tr>
									    <th title="Field #2">Title</th>
										<th title="Field #2">Image</th>
										<th title="Field #3">Image Caption</th>
										<th title="Field #4">Details</th>
										<th title="Field #4">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($policyResults as $data) : ?>
										<?php
										$policySupportID = $data->policy_support_id;
										$policySupportImg = $data->img;
										?>
										<tr>
										    <td><?php echo $data->title; ?></td>
											<td>
												<center><img src="<?php echo URLROOT ?>/assets/admin/media/uploads/policy_support/<?php echo (!empty($data->img)) ? $data->img : ''; ?>" style=" border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 70px; height:70px;"></center>
											</td>
											<td><?php echo $data->img_description; ?></td>
											<td><?php echo txtTruncate($data->details, 100); ?></td>
											<td>
												<div class="btn-group" role="group" aria-label="First group">
													<button type="button" id="<?php echo $data->policy_support_id; ?>" class="btn btn-warning  btn-icon edit"><i class="la la-edit"></i></button>
													<button type="button" id="<?php echo $data->policy_support_id; ?>" class="btn btn-danger btn-icon delete"><i class="la la-trash"></i></button>
												</div>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							<!--end: Datatable-->
						</div>
					</div>
					<!--end::Card-->
				</div>
				<!--end::mission_col-->
			</div>
			<hr>
			<!--end::Content-->
			<div class="modal fade" id="addeconsprogModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Policy Support</h5>
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
													<h3 class="card-title">
														Describe Policy Support Page:
													</h3>
												</div>
												<!--begin::Form-->
												<form id="frm" method="Post" enctype="multipart/form-data">
													<div class="card-body">
														<div class="form-group row">
															<label class="col-form-label text-right col-lg-2 col-sm-12">Title:</label>
															<div class="col-lg-10 col-md-10 col-sm-12">
																<textarea id="title" name="title" class="form-control" required></textarea>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-form-label text-right col-lg-2 col-sm-12">Type Content Here:</label>
															<div class="col-lg-10 col-md-10 col-sm-12">
																<textarea id="details" name="details" class="form-control" <?php echo (!empty($econJusticeID)) ? '' : 'required'; ?>><?php echo (!empty($econJusticeID)) ? $econJusticeDetails : ''; ?></textarea>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-form-label text-right col-lg-2 col-sm-12">Upload Image Here:</label>
															<div class="col-lg-10 col-md-10 col-sm-12">
																<div class="image-input image-input-outline" id="img" style="background-image: url(<?php echo URLROOT ?>/assets/admin/media/avatars/image.png)">
																	<div class="image-input-wrapper" style="background-image: url(<?php echo URLROOT ?>/assets/admin/media/uploads/<?php echo (!empty($econJusticeID)) ? $econJusticeImg : ''; ?>)"></div>

																	<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change image">
																		<i class="fa fa-pen icon-sm text-muted"></i>
																		<div id="file_wrapper">
																			<input type="file" name="img_file" id="img_file" accept=".png, .jpg, .jpeg" />
																		</div>
																		<input type="hidden" id="image_remove_name" value="<?php echo (!empty($policySupportID)) ? $policySupportImg : ''; ?>" name="profile_avatar_remove" />
																	</label>
																	<!--
													<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel image">
														<i class="ki ki-bold-close icon-xs text-muted"></i>
													</span>
-->
																	<span style="display:none;" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" id="img-remove-action" data-action="remove" data-toggle="tooltip" title="Remove image">
																		<i class="ki ki-bold-close icon-xs text-muted"></i>
																	</span>
																</div>
																<!--remove image -->
																<span style="display:none;" class="btn btn-xs btn-icon btn-circle btn-danger btn-hover-text-primary btn-shadow" id="img_remove" data-toggle="tooltip" title="Remove image">
																	<i class="ki ki-bold-close icon-xs"></i>
																</span>
																<!--view image-->
																<span style="display:none;" class="btn btn-xs btn-icon btn-circle btn-success btn-hover-text-primary btn-shadow" id="view_image" data-toggle="tooltip" title="View image">
																	<i class="far fa-eye icon-xs"></i>
																</span>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-form-label text-right col-lg-2 col-sm-12">Image Caption:</label>
															<div class="col-lg-10 col-md-10 col-sm-12">
																<textarea id="img_caption" name="img_caption" class="form-control" <?php echo (!empty($policySupportID)) ? '' : 'required'; ?>><?php echo (!empty($econJusticeID)) ? $econJusticeImgCaption : ''; ?></textarea>
															</div>
														</div>
													</div>
													<div class="card-footer">
														<div class="row">
															<div class="col-lg-12 text-right">
																<button type="submit" id="btn_submit" class="btn btn-primary mr-2">Submit</button>
																<input type="hidden" id="action" value="" name="action" />
																<input type="hidden" id="imgCheck" value="" name="imgName" />
																<input type="hidden" id="ID" value="" name="ID" />
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

			<div class="modal fade" id="imgShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Policy Support Image</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<i aria-hidden="true" class="ki ki-close"></i>
							</button>
						</div>
						<div class="modal-body">
							<img id="modal-img" style="width:100%;height:100%; display:block;" />
						</div>
					</div>
				</div>
			</div>
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
	(() => {
		var KTDatatableHtmlTableDemo = function() {
			// Private functions

			// demo initializer
			var demo = function() {

				var datatable = $('#kt_datatable').KTDatatable({
					data: {
						saveState: {
							cookie: false
						},
					},
					search: {
						input: $('#kt_datatable_search_query'),
						key: 'generalSearch',
					},
					layout: {
						class: 'datatable-bordered',
					}
				});

				$('.edit').on('click', function() {
					alert('good');
				});

				$('#kt_datatable_search_type').on('change', function() {
					datatable.search($(this).val().toLowerCase(), 'Type');
				});

				$('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();

			};

			return {
				// Public functions
				init: function() {
					// init dmeo
					demo();
				},
			};
		}();

		jQuery(document).ready(function() {
			KTDatatableHtmlTableDemo.init();
		});

		/******/
	})();
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
					$.post('<?php echo URLROOT ?>/admin/scripts/programme_image_delete_script.php', {
						imgname_econs: imgname
					}, function(response) {
						if (response === 'success') {
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
	imgUpload.on('remove', function(imageInput) {});


	// Text Editor Intialization
	var DetailsNote = function() {
		// Private functions
		var detailsEditor = function() {
			$('#details').summernote({
				height: 150
			});
		}

		return {
			// public functions
			init: function() {
				detailsEditor();
			}
		};
	}();

	//check summernote content
	$('#btn_submit').on('click', function() {
		// get summernote details and make textarea required
		let details = '';
		if ($('#details').summernote('isEmpty')) {
			details = $('#details').val('');
			$('#details').prop('require', true);
			Swal.fire("Note!", "details cannot be empty", "warning");
		} else {
			details = $('#details').val();
			$('#details').prop('require', false);
		}
	})

	//view image
	$('#view_image').on('click', function() {
		$('#imgShow').modal('show');
	});

	//form action state
	$('#btnadd').on('click', function() {
		$('#action').val('Add');
		//alert($('#action').val())
	})

	//Submit form
	$('#frm').on('submit', function(e) {
		e.preventDefault();
		//get summernote details befor post
		$.ajax({
			method: 'POST',
			url: '<?php echo URLROOT ?>/admin/scripts/add_policy_support_script.php',
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

	$('#addeconsprogModal').on('hidden.bs.modal', function() {
		location.reload();
	});

	$(document).on('click', '.edit', function(event) {
		$('#action').val('Update');
		//alert($('#action').val());
		var ID = $(this).attr('id');
		$.get('<?php echo URLROOT ?>/admin/scripts/get_policy_support.php', {
			ID: ID
		}, function(data) {
			var htmlData = JSON.parse(data);
			$('#image_remove_name').val(htmlData.img);
			$('#imgCheck').val(htmlData.img);
			$('#ID').val(htmlData.policy_support_id);
			$('#title').val(htmlData.title);
			$("#details").summernote("code", htmlData.details);
			$('#addeconsprogModal').modal('show');
			var imgUrl = '<?php echo URLROOT ?>/assets/admin/media/uploads/policy_support/' + htmlData.img;
			$("#img").css("background-image", "url(" + imgUrl + ")");
			$('#img_caption').val(htmlData.img_description);
			$("#modal-img").attr("src", imgUrl);
			if (htmlData.img !== '') {
				$('#img_remove').show();
				$('#view_image').show();
			}
			//alert(data);
		})
	});
	$(document).on('click', '.delete', function(event) {
		var policyID = $(this).attr('id');
		Swal.fire({
			title: "Are you sure?",
			text: "This post will be deleted.",
			icon: "warning",
			showCancelButton: true,
			confirmButtonText: "Yes, delete it!",
			cancelButtonText: "No, cancel!",
			reverseButtons: true
		}).then(function(result) {
			if (result.value) {
				$.post('<?php echo URLROOT ?>/admin/scripts/delete_entry_script.php', {
					policyID: policyID
				}, function(data) {
					if (data === 'success') {
						location.reload();
					}
				});
			} else if (result.dismiss === "cancel") {

			}
		});

	})

	// Initialization
	jQuery(document).ready(function() {
		DetailsNote.init();
	});
</script>