<?= $this->extend('admin_template/layout') ?>
<?= $this->section('main_content') ?>
<div class="container-xxl h-100">
     <div class="d-flex flex-column h-100 p-3">
          <div class="d-flex flex-column flex-grow-1">
               <div class="row h-100">
                    <div class="row justify-content-center h-100">
                         <div class="col-lg-6 py-lg-5">
                              <div class="d-flex flex-column h-100 justify-content-center">
                                   <div class="auth-logo mb-4">
                                        <a href="index.html" class="logo-dark">
                                             <img src="<?= base_url('assets/images/logo-dark.png') ?>" height="24" alt="logo dark">
                                        </a>

                                        <a href="index.html" class="logo-light">
                                             <img src="<?= base_url('assets/images/logo-light.png') ?>" height="24" alt="logo light">
                                        </a>
                                   </div>

                                   <h2 class="fw-bold fs-24">Reset Password</h2>

                                   <p class="text-muted mt-1 mb-4">Enter your email address and we'll send you an email with instructions to reset your password.</p>

                                   <div>
                                        <form action="https://techzaa.getappui.com/larkon/admin/index.html" class="authentication-form">
                                             <div class="mb-3">
                                                  <label class="form-label" for="example-email">Email</label>
                                                  <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Enter your email">
                                             </div>
                                             <div class="mb-1 text-center d-grid">
                                                  <button class="btn btn-primary" type="submit">Reset Password</button>
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