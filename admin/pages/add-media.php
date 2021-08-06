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
					<!--begin::Card-->
					<div class="card card-custom">
						<div class="card-header flex-wrap border-0 pt-6 pb-0">
							<div class="card-title">
								<h3 class="card-label">Media Uploads</h3>
							</div>
							<div class="card-toolbar">
								<!--begin::Button-->
								<a id="btnadd" data-toggle="modal" data-target="#addMediaModal" class="btn btn-primary font-weight-bolder">
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
										<th title="Field #1">Media Type</th>
										<th title="Field #2">Caption/Title</th>
										<th title="Field #4">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($sqlMediaResults as $data) : ?>
										<?php
										if($data->media_type==1){
											$url=URLROOT.'/assets/admin/media/uploadImages/picture/'.$data->file_name.'?title='.$data->media_title;
										}elseif($data->media_type==2){
										    $url=$data->file_name;
										}elseif($data->media_type==3){
											$url=URLROOT.'/assets/admin/media/uploadImages/document/'.$data->file_name.'?title='.$data->media_title;;
										}
										?>
										<tr>
											<td><?php echo $data->media_name; ?></td>
											<td><?php echo $data->media_title;?></td>
											<td>
												<div class="btn-group" role="group" aria-label="First group">
													<button type="button" id="<?php echo $data->media_id; ?>" class="btn btn-warning  btn-icon edit"><i class="la la-edit"></i></button>
													<a target="_blank" href="<?= $url ?>" ><button type="button" id="<?php echo $data->media_id; ?>" class="btn btn-primary  btn-icon view"><i class="la la-eye"></i></button></a>
													<button type="button" id="<?php echo $data->media_id; ?>" class="btn btn-danger btn-icon delete"><i class="la la-trash"></i></button>
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
			<!--end::stats-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Content-->
	<!--begin::Modal-->
	<div class="modal fade" id="addMediaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Media Uploads</h5>
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
												Upload Media:
											</h3>
										</div>
										<!--begin::Form-->
										<form id="frmMedia" method="Post" enctype="multipart/form-data">
											<div class="card-body">
												<div class="form-group row" id="service_div">
													<label class="col-form-label text-right col-lg-2 col-sm-12">Service Type:</label>
													<div class="col-lg-10 col-md-10 col-sm-12">
														<select class="form-control" name="media_type" id="media_type" required>
															<option value="" selected disabled>SELECT SERVICE TYPE</option>
															<?php foreach ($mediaResults as $option) : ?>
																<option value="<?= $option->media_type_id; ?>"><?= $option->media_name; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label text-right col-lg-2 col-sm-12">Title:</label>
													<div class="col-lg-10 col-md-10 col-sm-12">
														<textarea id="media_title" required name="media_title" class="form-control"></textarea>
													</div>
												</div>
												<div class="form-group row" id="videoUpload" style="display:none;">
													<label class="col-form-label text-right col-lg-2 col-sm-12">Enter Video URL:</label>
													<div class="col-lg-10 col-md-10 col-sm-12">
														<input class="form-control" name="video_url" type="url" value="" id="videoUrl" />
													</div>
												</div>
												<div class="form-group row" id="videoThumbnail" style="display:none;">
													<label class="col-form-label text-right col-lg-2 col-sm-12">Video Thumbnail:</label>
													<div class="col-lg-10 col-md-10 col-sm-12">
													<div class="image-input image-input-outline" id="img-vid" style="background-image: url(<?php echo URLROOT ?>/assets/admin/media/avatars/image.png)">
															<div class="image-input-wrapper"></div>
															<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change image">
																<i class="fa fa-pen icon-sm text-muted"></i>
																<div id="file_wrapper">
																	<input type="file"  name="vid_file" id="vid_file" accept=".png, .jpg, .jpeg" />
																</div>
																<input type="hidden" id="image_remove_name" value=" " />
															</label>
															<span style="display:none;" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" id="img-remove-action" data-action="remove" data-toggle="tooltip" title="Remove image">
																<i class="ki ki-bold-close icon-xs text-muted"></i>
															</span>
														</div>
													</div>
												</div>

												<div class="form-group row" id="picUpload" style="display:none;">
													<label class="col-form-label text-right col-lg-2 col-sm-12">Upload Picture:</label>
													<div class="col-lg-10 col-md-10 col-sm-12">
														<div class="image-input image-input-outline" id="img-pic" style="background-image: url(<?php echo URLROOT ?>/assets/admin/media/avatars/image.png)">
															<div class="image-input-wrapper"></div>
															<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change image">
																<i class="fa fa-pen icon-sm text-muted"></i>
																<div id="file_wrapper">
																	<input type="file" required name="img_file" id="img_file" accept=".png, .jpg, .jpeg" />
																</div>
																<input type="hidden" id="image_remove_name" value=" " />
															</label>
															<span style="display:none;" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" id="img-remove-action" data-action="remove" data-toggle="tooltip" title="Remove image">
																<i class="ki ki-bold-close icon-xs text-muted"></i>
															</span>
														</div>
													</div>
												</div>

												<div class="form-group row" id="documentUpload" style="display:none;">
													<label class="col-form-label text-right col-lg-2 col-sm-12">Upload Document:</label>
													<div class="col-lg-10 col-md-10 col-sm-12">
														<div class="custom-file">
															<input type="file" class="custom-file-input"  name="document_file" id="document-file" />
															<label id="lbl_file" class="custom-file-label" for="customFile">Choose file</label>
														</div>
													</div>
												</div>
											</div>
											<div class="card-footer">
												<div class="row">
													<div class="col-lg-12 text-right">
														<button type="submit" id="btn_submit" class="btn btn-primary mr-2">Submit</button>
														<input type="hidden" name="media_folder" id="media_folder"/>
														<input type="hidden" name="action" id="action"/>
														<input type="hidden" name="media_id" id="media_id"/>
														<input type="hidden" name="file_name" id="file_name"/>
														<input type="hidden" name="video_thumbnail" id="video_thumbnail"/>
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
	<!--end::Modal-->
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
	//# sourceMappingURL=html-table.js.map

	//edit
	$(document).on('click', '.edit', function(event) {
		var ID = $(this).attr('id');
		$('#media_id').val(ID);
		$('#action').val('Update');
		$.get('<?php echo URLROOT ?>/admin/scripts/get_media_upload_script.php', {
			ID: ID
		}, function(data) {
			//alert(data);
			var html = JSON.parse(data);
			if (html.media_type==1) {
				$('#picUpload').show();
				$('#videoUpload').hide();
				$('#videoThumbnail').hide();
		        $('#documentUpload').hide();
				$('#videoUrl').prop('required', false);
		        $('#document_file').prop('required', false);
				$('#videoUrl').val('');
			}else if(html.media_type==2){
				$('#videoUpload').show();
				$('#videoThumbnail').show();
				$('#picUpload').hide();
		        $('#documentUpload').hide();
				$('#videoUrl').val(html.file_name);
				$('#img_file').prop('required', false);
		        $('#document_file').prop('required', false);
			}else if(html.media_type==3){
				$('#documentUpload').show();
				$('#videoUpload').hide();
		        $('#picUpload').hide();
				$('#videoUrl').prop('required', false);
		        $('#img_file').prop('required', false);
				$('#videoUrl').val('');
			}
			var file_name=html.file_name;
			if(file_name!='');{
				$('#img_file').prop('required', false);
			}
		    $('#addMediaModal').modal('show');
			$('#media_title').val(html.media_title);
			$('#lbl_file').text(html.file_name);
			$('#file_name').val(html.file_name);
			$('#video_thumbnail').val(html.video_thumbnail);
			$('#media_type').val(html.media_type);
			$('#media_type option').eq(html.media_type).prop('selected', true);
			//$('#media_type').prop('disabled', true);
			let imgUrl = '<?php echo URLROOT ?>/assets/admin/media/uploadImages/picture/' + html.file_name;
			let thumbnailUrl = '<?php echo URLROOT ?>/assets/admin/media/uploadImages/video/' + html.video_thumbnail;
			//alert(thumbnailUrl);
			$("#img-pic").css("background-image", "url(" + imgUrl + ")");
			$("#img-vid").css("background-image", "url(" + thumbnailUrl + ")");
			//alert(data);
		})
	});
	$(document).on('click', '.delete', function(event) {
		var ID = $(this).attr('id');
		Swal.fire({
			title: "Are you sure?",
			text: "This media will be deleted.",
			icon: "warning",
			showCancelButton: true,
			confirmButtonText: "Yes, delete it!",
			cancelButtonText: "No, cancel!",
			reverseButtons: true
		}).then(function(result) {
			if (result.value) {
				$.post('<?php echo URLROOT ?>/admin/scripts/delete_entry_script.php', {
					docID: ID
				}, function(data) {
					if (data === 'success') {
						location.reload();
					}
				});
			} else if (result.dismiss === "cancel") {

			}
		});
	});

	//display media type
	$('#media_type').on('change', function(){
      let changeState=$(this).val();
	 // alert(changeState);
	  if(changeState == 1){
		 $('#media_folder').val('picture');
		 $('#picUpload').show();
		 $('#videoUpload').hide();
		 $('#videoThumbnail'),hide();
		 $('#documentUpload').hide();
		 $('#img_file').prop('required', true);
		 $('#videoUrl').prop('required', false);
		 $('#document_file').prop('required', false);
	  }else if(changeState == 2){
		//$('#media_folder').val('video');
		$('#videoUpload').show();
		$('#videoThumbnail').show();
		$('#picUpload').hide();
		$('#documentUpload').hide();
		 $('#videoUrl').prop('required', false);
		$('#img_file').prop('required', false);
		$('#document_file').prop('required', false);
	  }else if(changeState == 3){
		$('#media_folder').val('document');
		$('#documentUpload').show();
		$('#videoUpload').hide();
		$('#picUpload').hide();
		$('#document_file').prop('required', true);
		$('#videoUrl').prop('required', false);
		$('#videoThumbnail').hide();
		$('#img_file').prop('required', false);
	  }
	});

	var imgUpload = new KTImageInput('img-pic');
	var vidUpload = new KTImageInput('img-vid');
	imgUpload.on('change', function(imageInput) {});
	vidUpload.on('change', function(imageInput) {});

        $('#btnadd').on('click', function(){
			$('#action').val('Add');
		});
	
	//Form Subnission
	$('#frmMedia').on('submit', function(e) {
		e.preventDefault();
		//get summernote details befor post
		$.ajax({
			method: 'POST',
			url: '<?php echo URLROOT ?>/admin/scripts/media_upload_script.php',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function() {
				$('#btn_submit').prop('disabled', true);
				$('#loader').show();
			},
			success: function(data) {
				alert(data);
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
	</script>