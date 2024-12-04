<?= $this->extend('home_template/layout') ?>
<?= $this->section('main_content') ?>
<div class="container-xxl h-100 mt-5">
    <div class="d-flex flex-column h-100 p-3">
        <div class="d-flex flex-column flex-grow-1">
            <div class="row h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-lg-6 py-lg-5 mt-5">
                        <div class="d-flex flex-column h-100 justify-content-center">
                            <h2 class="fw-bold fs-24">Login Section</h2>
                            <p class="text-muted mt-1 mb-4">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                            <div>
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
                                <!--login Form -->
                                <form action='<?= base_url('admin-login') ?>' method='post'>
                                    <div class="mb-3">
                                        <label class="form-label" for="example-email">Email</label>
                                        <input type="email" required id="example-email" class="form-control" placeholder="e-mail" name='email' value="<?= old('email') ?>">
                                        <?php if (!empty($fieldErrors['email'])) : ?>
                                            <div class="text-danger mt-1"><?= $fieldErrors['email']; ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group">
                                            <input id="password-field" required type="password" class="form-control" name="password" placeholder="***********" value="<?= old('password') ?>">
                                        </div>
                                        <?php if (!empty($fieldErrors['password'])) : ?>
                                            <div class="text-danger mt-1"><?= $fieldErrors['password']; ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary w-50">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<?= $this->endSection() ?>

