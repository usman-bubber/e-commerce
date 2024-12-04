<?= $this->extend('home_template/layout') ?>
<?= $this->section('main_content') ?>
<!-- ======= Signup Section ======= -->
<div class="container d-flex align-items-center justify-content-center py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card shadow border rounded p-4 px-5">
                <div class="text-center">
                    <img src="<?= base_url('assets/img/logo.png') ?>" class="img-fluid mb-3" style="width: 120px;" alt="">
                    <h2 class="fw-bold text-secondary">Create an Account</h2>
                    <p class="text-muted">
                        Create a free account and get full access to all features for 30 days.
                        No credit card needed. Trusted by over 4,000 professionals.
                    </p>
                </div>
                <!-- ********Start form Validation ********* -->
                <?php if (!empty(session()->get('validation')) || !empty(session()->get('errors'))) {
                    $validation = session()->get('validation');
                    $fieldErrors = session()->get('errors');
                } ?>
                <!--Start success and error session -->
                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success text-center mb-4">
                        <?php echo session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->get('fail')) : ?>
                    <div class="alert alert-danger text-center mb-4">
                        <?php echo session()->get('fail') ?>
                    </div>
                <?php endif; ?>
                <!-- Signup Form -->
                <form method='post' action='<?= base_url('signup_submit') ?>'>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" maxlength="15" class="form-control" name='username' value="<?= old('username') ?>">
                        <?php if (!empty($fieldErrors['username'])) : ?>
                            <div class="text-danger mt-1"><?= $fieldErrors['username']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name='email' value="<?= old('email') ?>">
                        <?php if (!empty($fieldErrors['email'])) : ?>
                            <div class="text-danger mt-1"><?= $fieldErrors['email']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mobile No</label>
                        <input type="text" id="mobile_no" pattern="[0-9]+" class="form-control" name='phone_number' value="<?= old('phone_number') ?>">
                        <?php if (!empty($fieldErrors['phone_number'])) : ?>
                            <div class="text-danger mt-1"><?= $fieldErrors['phone_number']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="position-relative">
                            <input id="password-field" type="password" name="password" class="form-control">
                            <div class="position-absolute top-50 end-0 translate-middle-y">
                                <span toggle="#password-field" class="ti ti-eye-off field-icon toggle-password p-2" style="cursor: pointer;">
                                    <img src="<?= base_url('assets/img/svg/eye_off.svg') ?>" class="img-fluid" alt="">
                                </span>
                            </div>
                        </div>
                        <?php if (!empty($fieldErrors['password'])) : ?>
                            <div class="text-danger mt-1"><?= $fieldErrors['password']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <div class="position-relative">
                            <input id="password-field2" type="password" name='confirm_password' class="form-control">
                            <div class="position-absolute top-50 end-0 translate-middle-y">
                                <span toggle="#password-field2" class="ti ti-eye-off field-icon toggle-password p-2" style="cursor: pointer;">
                                    <img src="<?= base_url('assets/img/svg/eye_off.svg') ?>" class="img-fluid" alt="">
                                </span>
                            </div>
                        </div>
                        <?php if (!empty($fieldErrors['confirm_password'])) : ?>
                            <div class="text-danger mt-1"><?= $fieldErrors['confirm_password']; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary w-100">Create Account</button>
                    </div>
                </form>
                <div class="text-center">
                    <p class="text-muted mb-0">Already have an account?
                        <a href="<?= base_url('/login') ?>" class="text-primary fw-bold">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>