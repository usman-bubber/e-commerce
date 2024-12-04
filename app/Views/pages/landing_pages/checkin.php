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
            <div class="card shadow-sm mb-3 border">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <img src="<?= base_url('assets/images/product/p-3.PNG') ?>" alt="Product Image"
                                class="img-fluid rounded">
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-1">Men Black Slim Fit T-shirt</h6>
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

            <!-- Product 2 -->
            <div class="card shadow-sm mb-3 border">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <img src="<?= base_url('assets/images/product/p-4.PNG') ?>" alt="Product Image"
                                class="img-fluid rounded">
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-1">Dark Green Cargo Pant</h6>
                            <p class="mb-1">Color: Dark Green &nbsp; | &nbsp; Size: M</p>
                            <div class="input-group" style="width: 120px;">
                                <button class="btn btn-outline-secondary btn-decrease" type="button">-</button>
                                <input type="text" class="form-control text-center quantity-input" value="1" min="1"
                                    inputmode="numeric" style="appearance: none;">
                                <button class="btn btn-outline-secondary btn-increase" type="button">+</button>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <p class="mb-1">Items Price: <span class="fw-bold">$330.00</span></p>
                            <p class="mb-1">Tax: <span class="text-muted">$4.00</span></p>
                            <p class="fw-bold mb-0">Total: $334.00</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="#" class="text-danger">Remove</a>
                        <a href="#" class="text-primary">Add to Wishlist</a>
                    </div>
                </div>
            </div>
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
                            <a href="<?= base_url('checkout') ?>" class="add-to-cart">Add To Cart</a>
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