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
								<h3 class="card-label">Board Members</h3>
							</div>
							<div class="card-toolbar">
								<!--begin::Button-->
								<a id="btnadd" data-toggle="modal" data-target="#addboard" class="btn btn-primary font-weight-bolder">
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
									    <th title="Field #1">Title</th>
										<th title="Field #1">Firstnames</th>
										<th title="Field #2">Other Names</th>
										<th title="Field #2">Position</th>
										<th title="Field #1">Email</th>
										<th title="Field #2">Profile/Status</th>
										<th title="Field #4">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($boardResults as $data) : ?>
										<tr>
										    <td><?php echo $data->title_name; ?></td>
											<td><?php echo $data->firstname; ?></td>
											<td><?php echo $data->othernames; ?></td>
											<td><?php echo $data->position_name; ?></td>
											<td><?php echo $data->email; ?></td>
											<td><?php echo $data->profile; ?></td>
											<td>
												<div class="btn-group" role="group" aria-label="First group">
													<button type="button" id="<?php echo $data->board_member_ID; ?>" class="btn btn-warning  btn-icon edit"><i class="la la-edit"></i></button>
													<button type="button" id="<?php echo $data->board_member_ID; ?>" class="btn btn-danger btn-icon delete"><i class="la la-trash"></i></button>
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
	<div class="modal fade" id="addboard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Board Members</h5>
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
												Add Board Member:
											</h3>
										</div>
										<!--begin::Form-->
										<form id="frmBoard" method="Post">
											<div class="card-body">
												<div class="form-group row" id="service_div">
													<div class="col-lg-6 col-md-6 col-sm-12">
														<label>Title:</label>
														<select class="form-control" name="title" id="title" required>
														<option value="" selected disabled>SELECT..</option>
														<?php foreach ($sqlTitleResults as $option) : ?>
																<option value="<?= $option->title_id; ?>"><?= $option->title_name; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-12">
														<label>Position:</label>
														<select class="form-control" name="position" id="position" required>
															<option value="" selected disabled>SELECT..</option>
															<?php foreach ($sqlPositionResults as $option) : ?>
																<option value="<?= $option->position_id; ?>"><?= $option->position_name; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>
												<div class="form-group row" id="service_div">
													<div class="col-lg-6 col-md-6 col-sm-12">
														<label>First Name:</label>
														<input class="form-control" type="text" name="first_name" id="first_name" required />
													</div>
													<div class="col-lg-6 col-md-6 col-sm-12">
														<label>Other Names:</label>
														<input class="form-control" type="text" name="other_names" id="other_names" required />
													</div>
												</div>
												<div class="form-group row" id="service_div">
													<div class="col-lg-6 col-md-6 col-sm-12">
														<label>Email:</label>
														<input class="form-control" type="email" name="email" id="email" required />
													</div>
													<div class="col-lg-6 col-md-6 col-sm-12">
														<label>Profile:</label>
														<textarea class="form-control" name="profile" id="profile"></textarea>
													</div>
												</div>
											</div>
											<div class="card-footer">
												<div class="row">
													<div class="col-lg-12 text-right">
														<button type="submit" id="btn_submit" class="btn btn-primary mr-2">Submit</button>
														<input type="hidden" name="action" id="action" value="" />
														<input type="hidden" name="id" id="id" value="" />
														<input type="hidden" name="usersCount" id="usersCount" value="<?php echo $countUsers; ?>" />
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
		$('#id').val(ID);
		$('#action').val('Update');
		$.get('<?php echo URLROOT ?>/admin/scripts/get_board_details_script.php', {
			ID: ID
		}, function(data) {
			//alert(data);
			var html = JSON.parse(data);
			$('#addboard').modal('show');
			$('#first_name').val(html.firstname);
			$('#other_names').val(html.othernames);
			$('#profile').val(html.profile);
			$('#email').val(html.email);
			$('#title option').eq(1).prop('selected', true);
			$('#position option').eq(html.position).prop('selected', true);
			$('#btn_submit').text('Update');
		})
	});

	//check users before delete
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
					boardID: ID
				}, function(data) {
					if (data === 'success') {
						location.reload();
					}
				});
			} else if (result.dismiss === "cancel") {

			}
		});
	});

	$('#btnadd').on('click', function() {
		$('#action').val('Add');
	});

	//Form Subnission
	$('#frmBoard').on('submit', function(e) {
		e.preventDefault();
		//get summernote details befor post
		$.ajax({
			method: 'POST',
			url: '<?php echo URLROOT ?>/admin/scripts/add_board_members_script.php',
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
</script>