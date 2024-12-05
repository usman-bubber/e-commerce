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
                <li class="nav-item"><a class="nav-link fw-bold" href="<?= base_url('/') ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link fw-bold" href="<?= base_url('shop') ?>">Shop</a></li>
                <li class="nav-item"><a class="nav-link fw-bold" href="<?= base_url('faq') ?>">Faq's</a></li>
                <li class="nav-item"><a class="nav-link fw-bold" href="<?= base_url('contact') ?>">Contact</a></li>
            </ul>
        </div>

        <!-- Right-side Cart and Login -->
        <div class="d-flex align-items-center">
            <!-- Login Button -->
            <a href="<?= base_url('login') ?>" class="add-to-cart px-5">Login</a>
            <!-- Cart Icon -->
            <a class="nav-link position-relative me-3" href="<?= base_url('checkin') ?>">
                <i class="bi bi-cart fs-3"></i>
                <span class="position-absolute top-0 start-100">
                    <?php
                    if (isset($_COOKIE['cart_cookie'])) {
                        $cart_cookie = $_COOKIE['cart_cookie'];
                        $cart_detail = json_decode($cart_cookie);
                        $total_items = count($cart_detail);
                        if (intval($total_items) < 10) {
                            $show_total = $total_items;
                        } else {
                            $show_total = '9+';
                        } ?>
                        <?= $show_total ?>
                    <?php } else { ?>
                        0
                    <?php } ?>
                </span>
            </a>
        </div>
    </div>
</nav>