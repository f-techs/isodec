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
								<h3 class="card-label">News Articles</h3>
							</div>
							<div class="card-toolbar">
								<!--begin::Button-->
								<a href="<?php echo URLROOT ?>/admin/pages/add-news" class="btn btn-primary font-weight-bolder">
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
									</span>New Article</a>
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
										<th title="Field #1">News Title</th>
										<th title="Field #2">News Image</th>
										<th title="Field #3">News Details</th>
										<th title="Field #3">News Source</th>
										<th title="Field #4">Post Date</th>
										<th title="Field #4">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($newsListResults as $data) : ?>
										<tr>
											<td><?php echo $data->news_title; ?></td>
											<td><center><img src="<?php echo URLROOT ?>/assets/admin/media/uploads/news/<?php echo (!empty($data->news_img)) ? $data->news_img : ''; ?>" style=" border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 70px; height:70px;"></center> </td>
											<td><?php echo txtTruncate($data->news_details, 100); ?></td>
											<td><?php echo $data->news_source; ?></td>
											<td><?php echo date('d-M-Y', strtotime($data->created_date)); ?></td>
											<td>
												<div class="btn-group" role="group" aria-label="First group">
													<button type="button" id="<?php echo $data->news_id;?>" class="btn btn-warning  btn-icon edit"><i class="la la-edit"></i></button>
													<button type="button"  id="<?php echo $data->news_id;?>" class="btn btn-danger btn-icon delete"><i class="la la-trash"></i></button>
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
	/******/
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
	$(document).on('click', '.edit', function (event) {
         var newsID = $(this).attr('id');
		$.post('<?php echo URLROOT ?>/admin/scripts/set_sessions_script.php',{newsID:newsID},function(data){
			//alert(data);
			window.location.href="<?php echo URLROOT ?>/admin/pages/view-edit-news";
		})
	});
	$(document).on('click', '.delete', function (event) {
         var newsID = $(this).attr('id');
		 Swal.fire({
                title: "Are you sure?",
                text: "This Blog post will be deleted.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
					$.post('<?php echo URLROOT ?>/admin/scripts/delete_entry_script.php',{newsID:newsID},function(data){
			         if(data === 'success'){
						 location.reload();
					 }
		             });
                } else if (result.dismiss === "cancel") {

                }
            });
		
	})
</script>