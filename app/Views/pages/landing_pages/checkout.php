<?= $this->extend('home_template/layout') ?>
<?= $this->section('main_content') ?>
<div class="container-fluid p-5 checkout-container">
    <form method="post" action="<?= base_url('order_placement') ?>">
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
                        <!-- <button class="btn btn-link">+ Add New Billing Address</button> -->
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="section-title">Payment Method</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="cashOnDelivery" checked>
                            <label class="form-check-label" for="cashOnDelivery">Cash on Delivery</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="bankTransfer">
                            <label class="form-check-label" for="bankTransfer">Bank Transfer</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard">
                            <label class="form-check-label" for="creditCard">Credit Card</label>
                        </div>

                        <!-- Bank Details -->
                        <div id="bankDetails" class="mt-3" style="display: none;">
                            <div class="card bg-white">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary fw-bold">Bank Transfer Details</h5>
                                            <p class="mb-2"><strong>Bank Name:</strong> <span>Bank Alfalah</span></p>
                                            <p class="mb-2"><strong>Receiver Name:</strong> <span>Muhammad Usman</span></p>
                                            <p class="mb-0"><strong>Account Number:</strong> <span>8348952348958923</span></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary fw-bold">Other Transfer Accounts</h5>
                                            <p class="mb-2"><strong>Bank Name:</strong> <span>Easypaisa & Jazzcash</span></p>
                                            <p class="mb-2"><strong>Receiver Name:</strong> <span>Muhammad Usman</span></p>
                                            <p class="mb-0"><strong>Account Number:</strong> <span>03317344949</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Credit Card Details -->
                        <div id="creditCardDetails" class="mt-3" style="display: none;">
                            <input type="text" class="form-control mb-2" placeholder="Card Number">
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
                            <?php
                            // Calculate estimated delivery date
                            $currentDate = new DateTime();
                            $currentDate->modify('+2 days');
                            $estimatedDelivery = $currentDate->format('d F, Y');
                            $subTotal = 0;
                            $totalDiscount = 0;
                            $deliveryCharge = 150.00;
                            $totalAmount = $subTotal - $totalDiscount + $deliveryCharge;
                            if (isset($product_detail) && !empty($product_detail)) {
                                foreach ($product_detail as $productdetail) {
                            ?>
                                    <div class="review-card d-flex mb-3 gap-4">
                                        <img src="<?= base_url('uploads/products/cover_images/' . esc($productdetail['cover_image'])) ?>" alt="Product Image">
                                        <div class="ms-3">
                                            <p class="small fw-bold"><?= esc($productdetail['title']) ?></p>
                                            <span class="small">Color:
                                                <small>
                                                    <?= is_array($productdetail['colors']) ? implode(', ', $productdetail['colors']) : esc($productdetail['colors']) ?>
                                                </small>
                                            </span>
                                        </div>
                                        <div class="ms-3">
                                            <p class="small fw-bold"><?= esc($productdetail['price']) ?></p>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <span><i class="bi bi-wallet2"></i> Sub Total:</span>
                                <span>PKR <?= number_format($subTotal, 2) ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span><i class="bi bi-percent"></i> Discount:</span>
                                <span class="text-danger">PKR <?= number_format($totalDiscount, 2) ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span><i class="bi bi-truck"></i> Delivery Charge:</span>
                                <span>PKR <?= number_format($deliveryCharge, 2) ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between fw-bold">
                                <span><i class="bi bi-currency-dollar"></i> Total Amount:</span>
                                <span class="text-success">PKR <?= number_format($totalAmount, 2) ?></span>
                            </li>
                            <div class="estimated-delivery shadow-sm">
                                <i class="bi bi-truck me-2"></i>
                                Estimated Delivery by <?= $estimatedDelivery ?>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-between">
                    <button class="btn btn-back">Back to Cart</button>
                    <button type="submit" class="btn btn-checkout">Checkout Order</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Elements
        const creditCardDetails = document.getElementById("creditCardDetails");
        const bankDetails = document.getElementById("bankDetails");
        const paymentMethods = document.getElementsByName("paymentMethod");

        // Hide all sections initially
        function hideAllDetails() {
            creditCardDetails.style.display = "none";
            bankDetails.style.display = "none";
        }

        // Show relevant section based on selected payment method
        paymentMethods.forEach(method => {
            method.addEventListener("change", function() {
                hideAllDetails(); // Hide all sections first
                if (this.id === "creditCard") {
                    creditCardDetails.style.display = "block";
                } else if (this.id === "bankTransfer") {
                    bankDetails.style.display = "block";
                }
            });
        });

        // Ensure initial state reflects the default selection (Cash on Delivery)
        hideAllDetails();
    });
</script>

<?= $this->endSection() ?>