<?= $this->extend('home_template/layout') ?>
<?= $this->section('main_content') ?>
<div class="container-fluid p-5 checkout-container">
    <div class="row">
        <!-- Left Section -->
        <div class="col-lg-8">
            <!-- Personal Details -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="section-title">Personal Details</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your First Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="text" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="text" placeholder="Enter your Last Name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone"
                                placeholder="Enter your phone number">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shipping Details -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="section-title">Shipping Details</h5>
                    <div class="mb-3">
                        <label for="address" class="form-label">Full Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter your address">
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="Zip-Code">
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="City">
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="Country">
                        </div>
                    </div>
                    <button class="btn btn-link">+ Add New Billing Address</button>
                </div>
            </div>

            <!-- Payment Method -->
            <div class="card">
                <div class="card-body">
                    <h5 class="section-title">Payment Method</h5>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="paypal" checked>
                        <label class="form-check-label" for="paypal">PayPal</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard">
                        <label class="form-check-label" for="creditCard">Credit Card</label>
                    </div>
                    <div class="mt-3">
                        <input type="text" class="form-control mb-2" placeholder="000-000000000-000">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Expiry Date">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="CVC/CVV">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Section -->
        <div class="col-lg-4">
            <!-- Promo Code -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="section-title">Have a Promo Code?</h5>
                    <div class="d-flex">
                        <input type="text" class="form-control me-2" placeholder="Enter Code">
                        <button class="add-to-cart">Apply</button>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="card">
                <div class="card-body">
                    <h6 class="fw-bold mb-4">Order Summary</h6>
                    <!-- ad to card product details -->
                    <div class="reviews-section">
                        <div class="review-card d-flex mb-3 gap-4">
                            <img src="<?= base_url('assets/images/product/p-3.PNG') ?>" alt="User 1">
                            <div class="ms-3">
                                <p class="small fw-bold">T-Shirt for Men</p>
                                <span class="small">Size: <small>Small</small></span>
                            </div>
                            <div class="ms-3">
                                <p class="small fw-bold">300$</p>
                            </div>
                        </div>
                        <div class="review-card d-flex mb-3 gap-4">
                            <img src="<?= base_url('assets/images/product/p-4.PNG') ?>" alt="User 1">
                            <div class="ms-3">
                                <p class="small fw-bold">T-Shirt for Men</p>
                                <span class="small">Size: <small>Medium</small></span>
                            </div>
                            <div class="ms-3">
                                <p class="small fw-bold">300$</p>
                            </div>
                        </div>
                        <div class="review-card d-flex mb-3 gap-4">
                            <img src="<?= base_url('assets/images/product/p-2.PNG') ?>" alt="User 1">
                            <div class="ms-3">
                                <p class="small fw-bold">T-Shirt for Men</p>
                                <span class="small">Size: <small>Large</small></span>
                            </div>
                            <div class="ms-3">
                                <p class="small fw-bold">300$</p>
                            </div>
                        </div>
                    </div>

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
                </div>
            </div>

            <div class="estimated-delivery shadow-sm">
                <i class="bi bi-truck me-2"></i>
                Estimated Delivery by 25 April, 2024
            </div>
            <div class="mt-4 d-flex justify-content-between">
                <button class="btn btn-back">Back to Cart</button>
                <button class="btn btn-checkout">Checkout Order</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<?= $this->endSection() ?>