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
							<div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
								<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
								<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">Sean</span>
								<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
									<span class="symbol-label font-size-h5 font-weight-bold">S</span>
								</span>
							</div>
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

					<div class="row">
						<!--begin::mission col-->
						<div class="col-md-12 my-2">
							<div class="card card-custom">
								<div class="card-header">
									<h3 class="card-title">
										Describe Mission Page:
									</h3>
								</div>
								

								<!--begin::progress modal-->
								<!-- Modal-->
								<div class="modal fade" id="imgShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Mission Image</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<i aria-hidden="true" class="ki ki-close"></i>
												</button>
											</div>
											<div class="modal-body">
												<img src="<?php echo URLROOT ?>/assets/admin/media/uploadImages/<?php echo (!empty($missionID)) ? $missionImg : ''; ?>" style="width:100%;height:100%; display:block;" />
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
	
</script>