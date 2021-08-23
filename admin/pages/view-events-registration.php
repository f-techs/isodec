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
								<h3 class="card-label"><?php echo $eventRegListTitle; ?> : Registered List</h3>
							</div>
							<div class="card-toolbar">
								<a target="_blank" data-toggle="modal" data-target="#modalMessage" class="btn btn-success font-weight-bolder m-3">
									<span class="svg-icon svg-icon-md">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M3,13.5 L19,12 L3,10.5 L3,3.7732928 C3,3.70255344 3.01501031,3.63261921 3.04403925,3.56811047 C3.15735832,3.3162903 3.45336217,3.20401298 3.70518234,3.31733205 L21.9867539,11.5440392 C22.098181,11.5941815 22.1873901,11.6833905 22.2375323,11.7948177 C22.3508514,12.0466378 22.2385741,12.3426417 21.9867539,12.4559608 L3.70518234,20.6826679 C3.64067359,20.7116969 3.57073936,20.7267072 3.5,20.7267072 C3.22385763,20.7267072 3,20.5028496 3,20.2267072 L3,13.5 Z" fill="#000000" />
												<rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1" />
												<rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>Message</a>
								<!--begin::Button-->
								<a target="_blank" href="<?php echo URLROOT ?>/admin/reports/rpt-event-registration" class="btn btn-primary font-weight-bolder">
									<span class="svg-icon svg-icon-md">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3" />
												<path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000" />
												<rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1" />
												<rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>Print List</a>
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
										<th title="Field #1">First Name</th>
										<th title="Field #2">Othernames Name</th>
										<th title="Field #3">Phone</th>
										<th title="Field #4">Email</th>
										<th title="Field #4">Organisation</th>
										<th title="Field #4">Location</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($sqlRegListResults as $data) : ?>
										<tr>
											<td><?php echo $data->firstname; ?></td>
											<td><?php echo $data->othernames; ?></td>
											<td><?php echo $data->phone; ?></td>
											<td><?php echo $data->email; ?></td>
											<td><?php echo $data->organisation; ?></td>
											<td><?php echo $data->location; ?></td>
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
	<div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Message</h5>
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
												Send information about this Event:
											</h3>
										</div>
										<!--begin::Form-->
										<form id="frmMessage" method="Post" enctype="multipart/form-data">
											<div class="card-body">
												<div class="form-group row" id="service_div">
													<div class="col-lg-12 col-md-12 col-sm-12 m-5">
														<label>Message Type:</label>
														<select required id="messageType" name="messageType" class="form-control">
															<option value="" selected disabled>Select Message Type</option>
															<option value="1">SMS</option>
															<option value="2">EMAIL</option>
														</select>
													</div>
													<div class="col-lg-12 col-md-12 col-sm-12 m-5 emailArea" id="" style="display:none;">
														<label>Subject:</label>
														<textarea name="subject" id="subject" rows="2" class="form-control" placeholder="Type  subject here"></textarea>
													</div>
													<div class="col-lg-12 col-md-12 col-sm-12 m-5">
														<label>Message Content:</label>
														<textarea required name="messageContent" id="messageContent" rows="4" class="form-control" placeholder="Type message content here"></textarea>
													</div>
													<div class="col-lg-12 col-md-12 col-sm-12 m-5 emailArea" id="" style="display:none;">
														<label>Attach a file:</label>
														<div class="col-lg-10 col-md-10 col-sm-12">
														<div class="custom-file">
															<input type="file" class="custom-file-input" name="attach-file" id="attach-file" />
															<label id="lbl_file" class="custom-file-label" for="customFile">all file types</label>
														</div>
													</div>
													</div>
												</div>
											</div>
											<div class="card-footer">
												<div class="row">
													<div class="col-lg-12 text-right">
														<button type="submit" id="btn_submit" class="btn btn-primary mr-2">Submit</button>
														<input type="hidden" name="action" id="action" value="" />
														<input type="hidden" name="eventID" id="eventID" value="" />
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
	var MessageNote = function() {
		// Private functions
		var messageEditor = function() {
			$('#messageContent').summernote({
				height: 150
			});
		}

		return {
			// public functions
			init: function() {
				messageEditor();
			}
		};
	}();
  // Initialization
	jQuery(document).ready(function() {
		MessageNote.init();   
	});

	//check summernote content
	$('#btn_submit').on('click', function(e) {
		// get summernote details and make textarea required
		let messagecontent = '';
		if ($('#messageContent').summernote('isEmpty')) {
			mission_content = $('#messageContent').val('');
			$('#messageContent').prop('require', true);
			e.preventDefault();
			Swal.fire("Note!", "Message Content cannot be empty", "warning");
		} else {
			messagecontent = $('#mission_content').val();
			$('#messageContent').prop('require', false);
		}
	})

	//toggle sms and email
	$('#messageType').on('change', function() {
		let msgType = $(this).val();
		//alert(msgType);
		if (msgType == 2) {
			$('.emailArea').show();
			$('#subject').prop('required', true);
		} else {
			$('.emailArea').hide();
			$('#subject').prop('required', false);
		}
	})

	//send message form
	$('#frmMessage').on('submit', function(e) {
		e.preventDefault();
		//let messageType=$('#messageType').val();
		$.ajax({
			method: 'POST',
			url: '<?php echo URLROOT ?>/admin/scripts/message_data_script.php',
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				console.log(data);
				let response = JSON.parse(data);
				if (response.status == 'success') {
					//alert(response.contacts.length);
					$('#btn_submit').text('Sending Message. Will take some time...');
					$('#btn_submit').addClass('spinner spinner-white spinner-right');
					$('#btn_submit').prop('disabled', true);
					var file= $('#attach-file').prop('files')[0]; 
					if (response.type == 1) {
						send_sms(response.contacts, response.msg, response.contacts.length);
					} else if (response.type == 2) {
						send_email(response.email, response.subject, response.file, response.msg, response.email.length);
					}

				} else if (response.status == 'fail') {

				}
			}
		});

	})



	function send_sms(contacts, message, total) {
		let postdata = {
			'send': true,
			'contacts': contacts,
			message: message
		}
		$.post('<?php echo URLROOT ?>/admin/scripts/send_sms_script', postdata, function(results) {
			console.log(results);
			let msg = JSON.parse(results);
			if (msg.status == 'success') {
				$('#btn_submit').text('Submit');
				$('#btn_submit').removeClass('spinner spinner-white spinner-right');
				//$('#btn_submit').addClass('');
				$('#btn_submit').prop('disabled', false);
				Swal.fire({
					title: "SMS Sent Successfully",
					text: "Total SMS sent: " + total,
					icon: "success",
					confirmButtonText: "OK"
				});
			} else {
				$('#btn_submit').text('Submit');
				$('#btn_submit').removeClass('spinner spinner-white spinner-right');
				//$('#btn_submit').addClass('');
				$('#btn_submit').prop('disabled', false);
				Swal.fire({
					title: "Oops!",
					text: "Sorry something went wrong. Can be connection problem. Try again",
					icon: "error",
					confirmButtonText: "OK"
				});
			}
		})
	}

	function send_email(email, subject, file, message, total) {
		let postdata = {
			'send': true,
			'email': email,
			message: message,
			subject: subject,
			file:file
		}
		$.post('<?php echo URLROOT ?>/admin/scripts/send_email_script.php', postdata, function(results) {
			//console.log(results);
			//alert(results);
			//let msg = JSON.parse(results);
			if (results == 'success') {
				$('#btn_submit').text('Submit');
				$('#btn_submit').removeClass('spinner spinner-white spinner-right');
				$('#btn_submit').prop('disabled', false);
				Swal.fire({
					title: "Email Sent Successfully",
					text: "Total email sent: " + total,
					icon: "success",
					confirmButtonText: "OK"
				});
			} else {
				$('#btn_submit').text('Submit');
				$('#btn_submit').removeClass('spinner spinner-white spinner-right');
				//$('#btn_submit').addClass('');
				$('#btn_submit').prop('disabled', false);
				Swal.fire({
					title: "Oops!",
					text: "Sorry something went wrong",
					icon: "error",
					confirmButtonText: "OK"
				});
			}
		})
	}

	$('#attach-file').bind('change', function() {
    var file_ext=$('#attach-file').val().split('.').pop().toLowerCase();
    var file_size=(this.files[0].size);
    if(file_size > 2000000){
     swal.fire({
         title:"Large file size",
         icon:"info",
         text:"Please file size should not be more than 2MB",
         confirmButtonClass:"btn-danger"
     });
      $('#attach-file').val('');
    }else if($.inArray(file_ext, ['docx', 'doc', 'xlsx', 'pdf', 'mp3', 'jpeg', 'jpg', 'mp4']) === -1) {
    swal.fire({
         title:"Invalid File Type",
         icon:"info",
         text:"Please file file type should be jpeg, jpg, png",
         confirmButtonClass:"btn-danger"
     });
    $('#attach-file').val('');
}
  });
</script>