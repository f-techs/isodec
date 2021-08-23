<?php require_once('../config.php') ?>
<?php include(APPROOT . '/includes/public/header.php'); ?>
<?php

?>
<main role="main">
    <!-- Showcase -->
    <section id="page-title-section" class="bg-info text-light p-5 p-lg-0 pt-lg-5  text-center text-sm-start">
        <div class="container page-heading">
            <div class="row">
                <div class="col-md-12 text-left">
                    <h2 style="font-weight:bold;">REGISTRATION</h2>
                </div>
            </div>
        </div>
    </section>

    <!--mission vision-->
    <section id="page-content">
        <?php if (!empty($eventRegID)) : ?>
            <div class="container">
                <div class="row mt-5">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card" style="width:100%;">
                            <form id="frmReg" method="POST">
                                <div class="card-header bg-transparent" style="border-color:#E19822"><?= $eventRegTitle; ?></div>
                                <div id="alert-msg" class="alert  m-3 text-center" style="display:none;" role="alert">
                                    <h5 id="alert-text"></h5>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>First Name:</label>
                                                    <input type="text" name="firstname" required class="form-control">
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <label>Other Names:</label>
                                                <input type="text" name="other_names" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email:</label>
                                                    <input type="email" id="email" name="email" required class="form-control">
                                                    <span id="email-error" class="text-danger" style="font-size:smaller; display:none;">Wrong email format. Please check again.</span>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <label>Phone:</label>
                                                <input type="text" minlength="10" maxlength="10" name="phone" id="phone" required class="form-control inputForm  has-warning">
                                                <span id="phone-error" class="text-danger" style="font-size:smaller; display:none;">Phone Number should only be numbers.</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Organisation:</label>
                                                    <input type="text" name="organisation" required class="form-control">
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <label>Location:</label>
                                                <input type="text" name="location" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent" style="border-color:#E19822">
                                    <div class="row">
                                        <div class="col-lg-12 text-right">
                                            <button type="submit" id="btn_submit" class="btn mr-2" style="background-color:#E19822; color:#fff;">REGISTER</button>
                                            <input type="hidden" name="eventID" value="<?= $eventRegID; ?>" />
                                            <div id="loader" style="display:none;"><img src='<?php echo URLROOT ?>/assets/admin/media/svg/spinners/spinner.gif' /> Please Wait...</div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        <?php else : ?>
            <div>
                <h5 class="text-center"><?php die('Sorry No Details to display.'); ?> </h5>
            </div>
        <?php endif; ?>
    </section>

    <section class="footer">

    </section>
    <!-- FOOTER -->
</main>
<?php include(APPROOT . '/includes/public/footer.php'); ?>
<script type="text/javascript">


    $('#phone').on('input propertychange paste', function() {
        let phone = $(this).val();
        $.post('<?php echo URLROOT ?>/admin/scripts/event_registration_error_check.php', {
            phone: phone
        }, function(error) {
           if(error=='error'){
               $('#phone-error').show();
               $('#btn_submit').prop('disabled', true);
           }else{
            $('#btn_submit').prop('disabled', false);  
            $('#phone-error').hide();
           }
        });
    });


    $('#frmReg').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: '<?php echo URLROOT ?>/admin/scripts/event_registration_script.php',
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
                alert(response.alert);
                $('#alert-msg').show();
                $('#alert-msg').addClass(response.alert);
                $('#alert-text').text(response.message);
            },
            complete: function() {
                $('#frmReg')[0].reset();
                $('#loader').hide();
                $('#btn_submit').prop('disabled', false);
            }
        });
    });
</script>