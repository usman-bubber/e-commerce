<?= $this->extend('home_template/layout') ?>
<?= $this->section('main_content') ?>
<!-- /********Start form Validation *********/ -->
<?php
if (!empty(session()->get('validation')) || !empty(session()->get('errors'))) {
    $validation = session()->get('validation');
    $fieldErrors = session()->get('errors');
}
?>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow" style="width: 100%; max-width: 400px;">
        <div class="card-body text-center">
            <h3><i class="fa fa-lock fa-4x"></i></h3>
            <h2 class="card-title">Forgot Password?</h2>
            <p class="card-text">You can reset your password here.</p>
            <!--Start success and error session -->
            <?php if (session()->get('success')) : ?>
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
            <form id="register-form" role="form" action='<?= base_url('forget_form') ?>' class="form" method="post">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        <input id="email" name="email" required placeholder="Email address" class="form-control" type="email">
                    </div>
                </div>
                <div class="form-group">
                    <input name="recover-submit" class="btn btn-primary btn-lg w-100" value="Reset Password" type="submit">
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>