<?= $this->extend('home_template/layout') ?>
<?= $this->section('main_content') ?>

<!-- //********Start form Validation *********/ -->
<?php
if (!empty(session()->get('validation')) || !empty(session()->get('errors'))) {
    $validation = session()->get('validation');
    $fieldErrors = session()->get('errors');
} ?>
<!-- //********End form Validation *********/ -->

<div class="container-fluid sign_up_bg" style="min-height: 100vh;">
    <div class="row justify-content-end">
        <div class="col-lg-11">
            <a class="navbar-brand brand_color" href="<?= base_url('/') ?>">
                <img src="<?= base_url('assets/images/svg/dubai_safai_logo.svg') ?>" class="img-fluid" alt="">
            </a>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5 mt-5 mob_no_dsp">
                <img src="<?= base_url('assets/img/avatar/4.png') ?>" class="img-fluid mt-5" alt="">
            </div>
            <div class="col-lg-6 mt-5">
                <div class="card forget_password_card p-4 px-5 mt-2">
                    <h4 class="fw-bold my-3 text-center">Email Verification</h4>
                    <!--Start success and fail session -->
                    <?php
                    if (session()->get('success')) : ?>
                        <div class="alert alert-success p-2 w-100 text-center border-0">
                            <p class="mb-0">
                                <?php echo session()->get('success') ?>
                            </p>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->get('fail')) : ?>
                        <div class="alert alert-danger p-2 w-100 text-center border-0">
                            <p class="mb-0">
                                <?php echo session()->get('fail') ?>
                            </p>
                        </div>
                    <?php endif; ?>
                    <!--End success and fail session -->
                    <form class="w-100" method="post" id="myForm" action="<?= base_url('verify_emailform') ?>">
                        <div class="mb-3">
                            <label class="form-label sign_up_label">Email</label>
                            <div class="position-relative">
                                <input type="email" name="email" value="<?= old('email'); ?>" class="form-control sign_up_input email_input">
                            </div>
                            <!-- Email Validation Error -->
                            <?php if (!empty($fieldErrors['email'])) : ?>
                                <p class="text-danger"><?= $fieldErrors['email']; ?></p>
                            <?php endif; ?>
                        </div>
                        <label class="form-label sign_up_label"> Verification Code</label>
                        <div class="position-relative">
                            <input type="text" name="activation_hash" class="form-control sign_up_input">
                        </div>
                        <!-- Code Validation Error -->
                        <?php if (!empty($fieldErrors['activation_hash'])) : ?>
                            <p class="text-danger"><?= $fieldErrors['activation_hash']; ?></p>
                        <?php endif; ?>
                        <div class="bg_light_orange p-2 text-center mt-3 rounded-1 text_orange">
                            <div id="timer"></div>
                        </div>
                        <div class="mt-3 d-flex" style="justify-content: space-between;">
                            <button type="button" class="btn btn primary ms-2 resend_email" style="display: none;">Resend email</button>
                            <div class="justify-content-end">
                                <a href="<?= base_url('/login') ?>" class="btn btn-light">Cancel</a>
                                <button type="submit" class="btn btn-primary ms-2">Verify</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<script>
    // ----Display the message for 5 seconds---
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            var alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(function() {
                    alert.remove();
                }, 500);
            });
        }, 5000);
    });
</script>
<?= $this->endSection() ?>