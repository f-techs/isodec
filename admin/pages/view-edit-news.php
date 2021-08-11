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
                        <?php include(APPROOT.'/includes/admin/topbar-button.php'); ?>
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
                                        Describe News:
                                    </h3>
                                    <div class="card-toolbar">
                                        <!--begin::Button-->
                                        <a href="<?php echo URLROOT ?>/admin/pages/news-list" class="btn btn-primary font-weight-bolder">
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
                                            </span>News Articles</a>
                                        <!--end::Button-->
                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form id="frmNews" method="Post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-2 col-sm-12">News Title:</label>
                                            <div class="col-lg-10 col-md-10 col-sm-12">
                                                <textarea required id="news_title" name="news_title" class="form-control"><?php echo (!empty($newsTitle)) ? $newsTitle : ''; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-2 col-sm-12">Type Content Here:</label>
                                            <div class="col-lg-10 col-md-10 col-sm-12">
                                                <textarea id="news_content" name="news_content" class="form-control"><?php echo (!empty($newsDetails)) ? $newsDetails : ''; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-2 col-sm-12">Upload Image Here:</label>
                                            <div class="col-lg-10 col-md-10 col-sm-12">
                                                <div class="image-input image-input-outline" id="img" style="background-image: url(<?php echo URLROOT ?>/assets/admin/media/avatars/image.png)">
                                                    <div class="image-input-wrapper" style="background-image: url(<?php echo URLROOT ?>/assets/admin/media/uploads/news/<?php echo (!empty($newsImg)) ? $newsImg : ''; ?>)"></div>
                                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change image">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <div id="file_wrapper">
                                                            <input type="file" name="img_file" id="img_file" accept=".png, .jpg, .jpeg" <?php echo (!empty($newsImg)) ? '' : 'required'; ?> />
                                                        </div>
                                                        <input type="hidden" id="image_remove_name" value="<?php echo (!empty($newsImg)) ? $newsImg : ''; ?>" name="profile_avatar_remove" />
                                                        <input type="hidden" name="news_code" id="news_code" value="<?php echo (!empty($newsCode)) ? $newsCode : ''; ?>" name="profile_avatar_remove" />
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
                                                <span style="display:<?php echo (!empty($newsImg)) ? 'inline-block' : 'none'; ?>;" class="btn btn-xs btn-icon btn-circle btn-danger btn-hover-text-primary btn-shadow" id="img_remove" data-toggle="tooltip" title="Remove image">
                                                    <i class="ki ki-bold-close icon-xs"></i>
                                                </span>
                                                <!--view image-->
                                                <span style="display:<?php echo (!empty($newsImg)) ? 'inline-block' : 'none'; ?>;" class="btn btn-xs btn-icon btn-circle btn-success btn-hover-text-primary btn-shadow" id="view_image" data-toggle="tooltip" title="View image">
                                                    <i class="far fa-eye icon-xs"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-2 col-sm-12">Image Caption:</label>
                                            <div class="col-lg-10 col-md-10 col-sm-12">
                                                <textarea id="img_caption" name="img_caption" class="form-control"><?php echo (!empty($newsImgCaption)) ? $newsImgCaption : ''; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-lg-12 text-right">
                                                    <button type="submit" id="btn_submit" class="btn btn-primary mr-2">Update</button>
                                                    <input type="hidden" name="action" id="action" value="update"/>
                                                    <input type="hidden" name="news_id" id="news_id" value="<?php echo (!empty($newsID)) ? $newsID : ''; ?>"/>
                                                    <div id="loader" style="display:none;"><img src='<?php echo URLROOT ?>/assets/admin/media/svg/spinners/spinner.gif' /> Please Wait...</div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                </form>
                                <!--end::Form-->
                                <!-- Modal-->
                                <div class="modal fade" id="imgShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Article Image</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="<?php echo URLROOT ?>/assets/admin/media/uploads/news/<?php echo (!empty($newsImg)) ? $newsImg : ''; ?>" style="width:100%;height:100%; display:block;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end:: progress modal-->

                            </div>
                        </div>
                        <!--end::mission_col-->
                    </div><hr>
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
            var newsCode = $('#news_code').val();
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
                    $.post('<?php echo URLROOT ?>/admin/scripts/blog_news_image_delete_script.php', {
                        news_image: imgname,
                        newsCode: newsCode
                    }, function(response) {
                        alert(response);
                        //if (response === 'success') {
                        $('#img-remove-action').click();
                        $('#img_remove').hide();
                        $('#view_image').hide();
                        $('#img_file').prop('required', true);
                        Swal.fire("Note!", "Image deleted", "success");
                        //}
                    })
                } else if (result.dismiss === "cancel") {
                         
                }
            });
        }

    });





    // Text Editor Intialization
    var NewsNote = function() {
        // Private functions
        var newsEditor = function() {
            $('#news_content').summernote({
                height: 150
            });
        }

        return {
            // public functions
            init: function() {
                newsEditor();
            }
        };
    }();

    //check summernote content
    $('#btn_submit').on('click', function() {
        // get summernote details and make textarea required
        let news_content = '';
        if ($('#news_content').summernote('isEmpty')) {
            news_content = $('#news_content').val('');
            $('#news_content').prop('require', true);
            Swal.fire("Note!", "Description cannot be empty", "warning");
        } else {
            news_content = $('#news_content').val();
            $('#news_content').prop('require', false);
        }
    })

    //view image
    $('#view_image').on('click', function() {
        $('#imgShow').modal('show');
    });

    //Submit form
    $('#frmNews').on('submit', function(e) {
        e.preventDefault();
        //get summernote details befor post
        $.ajax({
            method: 'POST',
            url: '<?php echo URLROOT ?>/admin/scripts/add_news_script.php',
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

    // Initialization
    jQuery(document).ready(function() {
        NewsNote.init();
    });
</script>