<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <!-- Brand Logo -->
        <a class="navbar-brand me-auto" href="<?= base_url('/') ?>">
            <img src="<?= base_url('assets/images/logo-dark.png') ?>" alt="Logo" class="img-fluid" style="max-height: 30px;">
        </a>

        <!-- Toggle Button for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('shop') ?>">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('faq') ?>">Faq's</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('contact') ?>">Contact</a></li>
            </ul>
        </div>

        <!-- Right-side Cart and Login -->
        <div class="d-flex align-items-center">
            <!-- Login Button -->
            <a href="<?= base_url('login') ?>" class="add-to-cart px-5">Login</a>
            <!-- Cart Icon -->
            <a class="nav-link position-relative me-3" href="<?= base_url('cart') ?>">
                <i class="bi bi-cart fs-3"></i>
                <span class="position-absolute top-0 start-100">
                    3 <!-- Example cart count -->
                </span>
            </a>
        </div>
    </div>
</nav>
