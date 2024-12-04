<?= $this->extend('home_template/layout') ?>
<?= $this->section('main_content') ?>
<div class="container-fluid p-5">
    <!-- Cart Header -->
    <div class="d-flex justify-content-between align-items-center hero-section p-3 rounded mb-4">
        <span>There are 4 products in your cart</span>
        <a href="#" class="text-danger fw-bold text-decoration-none">Clear cart</a>
    </div>

   
    <div class="row">
        <!-- Cart Items -->
        <div class="col-md-8">
            <!-- Product 1 -->
            <?php
            if (isset($_COOKIE['cart_cookie'])) {
                $cart_cookie = $_COOKIE['cart_cookie'];
                $cart_detail = json_decode($cart_cookie);
                if (!empty($cart_detail)) {
                    foreach ($product_detail as $productdetail) {
            ?>
                        <div class="card shadow-sm mb-3 border">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <img src="<?= base_url('uploads/products/cover_images/' . esc($productdetail['cover_image'])) ?>" alt="Product Image"
                                            class="img-fluid rounded">
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="fw-bold mb-1"><?= $productdetail['title'] ?></h6>
                                        <p class="mb-1">Color: Dark &nbsp; | &nbsp; Size: M</p>
                                        <div class="input-group" style="width: 120px;">
                                            <button class="btn btn-outline-secondary btn-decrease" type="button">-</button>
                                            <input type="text" class="form-control text-center quantity-input" value="1" min="1"
                                                inputmode="numeric" style="appearance: none;">
                                            <button class="btn btn-outline-secondary btn-increase" type="button">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <p class="mb-1">Items Price: <span class="fw-bold">$80.00</span></p>
                                        <p class="mb-1">Tax: <span class="text-muted">$3.00</span></p>
                                        <p class="fw-bold mb-0">Total: $83.00</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="#" class="text-danger">Remove</a>
                                    <a href="#" class="text-primary">Add to Wishlist</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
            } else {
                ?>
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-12">
                        <div class="card tour_detail_card p-4 mt-4 text-center">
                            <img src="<?= base_url('assets/images/svg/panel_svg/cart_icon_active.svg') ?>" width="50" class="mx-auto" alt="cart icon active" />
                            <h4 class="fw-bold mt-4">Your cart is empty!</h4>
                            <p class="color_primary my-2">
                                Must add a tour in the cart before you proceed to place the order.
                            </p>
                            <a href="<?= base_url('categories'); ?>" class="btn btn_primary add_tour_btn rounded-pill w-25 mx-auto mt-3">
                                Add&nbsp;tour
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>


        </div>
        <!-- Order Summary -->
        <div class="col-md-4">
            <div class="card shadow-sm border">
                <div class="card-body">
                    <h6 class="fw-bold mb-4">Order Summary</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span><i class="bi bi-wallet2"></i> Sub Total:</span>
                            <span>$777.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span><i class="bi bi-percent"></i> Discount:</span>
                            <span class="text-danger">-$60.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span><i class="bi bi-truck"></i> Delivery Charge:</span>
                            <span>$00.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span><i class="bi bi-calculator"></i> Estimated Tax (15.5%):</span>
                            <span>$20.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between fw-bold">
                            <span><i class="bi bi-currency-dollar"></i> Total Amount:</span>
                            <span class="text-success">$737.00</span>
                        </li>
                    </ul>
                    <div class="mt-4 text-center">
                        <div class="d-flex justify-content-between mt-4">
                            <a href="<?= base_url('checkout') ?>" class="add-to-cart">Book Now</a>
                            <button class="btn btn-secondary">Continue Shopping</button>
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