<?= $this->extend('home_template/layout') ?>
<?= $this->section('main_content') ?>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow" style="width: 100%; max-width: 600px;">
        <div class="card-body">
            <h4 class="fw-bold text-center mb-4">Change Password</h4>
            <form method="post" action="<?= base_url('change_password_form/' . $_GET['userid']) ?>">
                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <div class="position-relative">
                        <input id="password-field" name="password" required type="password" class="form-control" placeholder="New Password">
                        <div class="position-absolute top-50 end-0 translate-middle-y me-2">
                            <span toggle="#password-field" class="ti ti-eye-off field-icon toggle-password" style="cursor: pointer;">
                                <img src="<?= base_url('assets/img/svg/eye_off.svg') ?>" class="img-fluid" alt="">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm New Password</label>
                    <div class="position-relative">
                        <input id="password-field2" name="confirm_password" required type="password" class="form-control" placeholder="Confirm Password">
                        <div class="position-absolute top-50 end-0 translate-middle-y me-2">
                            <span toggle="#password-field2" class="ti ti-eye-off field-icon toggle-password" style="cursor: pointer;">
                                <img src="<?= base_url('assets/img/svg/eye_off.svg') ?>" class="img-fluid" alt="">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <a href="<?= base_url('/login') ?>" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<style>
    .error {
        color: red;
        font-size: 0.875rem;
        /* Optional: Adjust font size if needed */
    }
</style>
<script>
    $(document).ready(function() {
        //start jquery validation of form//
        $.validator.addMethod(
            "password_regex",
            function(value, element) {
                return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>ยง~]).{8,25}$/.test(value);
            },
            "Please enter a valid password."
        );
        $('form').validate({
            errorPlacement: function(error, element) {
                if (element.attr("name") == "password") {
                    error.appendTo("#password-error-container");
                } else {
                    error.insertAfter(element);
                }
            },
            rules: {
                password: {
                    required: true,
                    minlength: 8,
                    password_regex: true,
                },
                confirm_password: {
                    required: true,
                    minlength: 8,
                    password_regex: true,
                    equalTo: "#password-field",
                },
            },
            messages: {
                password: {
                    required: "Password is required",
                    minlength: "Password must be at least 8 characters long",
                    password_regex: "Password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character."
                },
                confirm_password: {
                    required: "Password is required",
                    minlength: "Password must be at least 8 characters long",
                    equalTo: 'Password and Confirm Password do not match',
                    password_regex: "Password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character."
                },
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
        //end jquery validation of form//
    });
</script>
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
    // ----Show Password---
    $(document).ready(function() {
        $(".toggle-password").click(function() {
            $(this).toggleClass("ti-eye ti-eye-off");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
</script>
<?= $this->endSection() ?>