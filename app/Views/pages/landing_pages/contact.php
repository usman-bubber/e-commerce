<?= $this->extend('home_template/layout') ?>
<?= $this->section('main_content') ?>
<section class="contact-section py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <!-- Contact Info Cards -->
            <div class="col-md-4 ">
                <div class="info-card shadow-sm p-4 border">
                    <div class="icon mb-3">
                        <i class="bi bi-geo-alt-fill" style="font-size: 2.5rem; color: #ff5722;"></i>
                    </div>
                    <h5>Visit Us</h5>
                    <p>
                        <strong>Address:</strong> Al Karama, Bur Dubai, Near ADCB Metro, Dubai, UAE
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-card shadow-sm p-4 border">
                    <div class="icon mb-3">
                        <i class="bi bi-telephone-fill" style="font-size: 2.5rem; color: #2196f3;"></i>
                    </div>
                    <h5>Call Us</h5>
                    <p>
                        <strong>Mobile:</strong> +971 543330496 <br>
                        <strong>WhatsApp:</strong> +971 543330496
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-card shadow-sm p-4 border">
                    <div class="icon mb-3">
                        <i class="bi bi-envelope-fill" style="font-size: 2.5rem; color: #4caf50;"></i>
                    </div>
                    <h5>Email</h5>
                    <p>
                        Start planning your adventure! <br>
                        <strong>Email:</strong> info@horaitourism.com
                    </p>
                </div>
            </div>
        </div>
        <hr>
        <!-- Contact Form -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3 class="fw-bold">Let's Get in <span class="text-primary">Touch!</span></h3>
                <p>
                    Have a question or need assistance? Reach out to us via email, phone, or the contact form below.
                    We're eager to assist you.
                </p>
                <form action="<?= base_url('admin/store-category') ?>" class="contact-form" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name:</label>
                        <input type="text" class="form-control" id="fullName" name="name" placeholder="Your Name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message:</label>
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Your Message"></textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="add-to-cart">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-center">
                <img src="<?= base_url('assets/images/contact.PNG') ?>" class="img-fluid" alt="Product Image">
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<?= $this->endSection() ?>