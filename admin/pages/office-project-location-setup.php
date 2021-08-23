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

                    <div class="row">
                        <!--begin::mission col-->
                        <div class="col-md-12 my-2">
                            <div class="card card-custom">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Describe Office/Project Location:
                                    </h3>
                                    <div class="card-toolbar">
                                        <!--begin::Button-->
                                        <a href="<?php echo URLROOT ?>/admin/pages/locations-list" class="btn btn-primary font-weight-bolder">
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
                                            </span>Locations List</a>
                                        <!--end::Button-->
                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form id="frmLocation" method="Post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group row" id="service_div">
                                            <label class="col-form-label text-right col-lg-2 col-sm-12">OFFICE/PROJECT:</label>
                                            <div class="col-lg-10 col-md-10 col-sm-12">
                                                <select class="form-control" name="location_type" id="location_type" required>
                                                    <option value="" selected disabled>SELECT</option>
                                                    <?php foreach ($locationTypeResults as $option) : ?>
                                                        <option value="<?= $option->location_type_id; ?>"><?= $option->location_type_name; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-2 col-sm-12">Describe location and Address:</label>
                                            <div class="col-lg-10 col-md-10 col-sm-12">
                                                <textarea id="address" rows="4" required name="address" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-2 col-sm-12"> Latitude:</label>
                                            <div class="col-lg-10 col-md-10 col-sm-12">
                                                <input id="latitude" type="text" required name="latitude" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-2 col-sm-12">Longitude:</label>
                                            <div class="col-lg-10 col-md-10 col-sm-12">
                                                <input id="longitude" type="text" required name="longitude" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-2 col-sm-12">Set location GPS:</label>
                                            <div class="col-lg-10 col-md-10 col-sm-12">
                                                <!-- Google map -->
                                                <div class="pac-card" id="pac-card">
                                                    <div>
                                                        <div id="label">
                                                            Location search
                                                        </div>
                                                    </div>
                                                    <div id="pac-container">
                                                        <input id="pac-input" type="text" placeholder="Enter a location">
                                                        <div id="location-error"></div>
                                                    </div>
                                                </div>
                                                <div id="map"></div>
                                                <div id="infowindow-content">
                                                   <!-- <img src="" width="16" height="16" id="place-icon">-->
                                                    <span id="place-name" class="title"></span><br>
                                                    <span id="place-address"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-12 text-right">
                                                <button type="submit" id="btn_submit" class="btn btn-primary mr-2">Submit</button>
                                                <input type="hidden" name="action" value="Add" />
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
  


   




    //Submit form
    $('#frmLocation').on('submit', function(e) {
        e.preventDefault();
        //get summernote details befor post
        $.ajax({
            method: 'POST',
            url: '<?php echo URLROOT ?>/admin/scripts/add_office_location_script.php',
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
<script src="<?php echo URLROOT?>/assets/admin/js/googleMaps.js"></script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK7RbtNChw3hQZb3o5bpl5oB08DpNGubE&libraries=places&callback=initMap" async defer></script>