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
        <div class="col-md-8" id="cart-items">
            <?php
            if (isset($_COOKIE['cart_cookie'])) {
                $cart_cookie = $_COOKIE['cart_cookie'];
                $cart_detail = json_decode($cart_cookie, true); // Decode into associative array
                $subTotal = 0;
                $totalDiscount = 0;

                if (!empty($cart_detail)) {
                    foreach ($product_detail as $productdetail) {
                        // print_r($productdetail);exit;
                        $finalPrice = $productdetail['price'] - $productdetail['discount'];
                        $subTotal += $productdetail['price'];
                        $totalDiscount += $productdetail['discount'];
            ?>
                        <!-- Product Card -->
                        <div class="card shadow-sm mb-3 border position-relative" id="product-<?= $productdetail['id'] ?>">
                            <div class="card-body">
                                <!-- Delete Icon -->
                                <a href="javascript:void(0)"
                                    class="text-danger position-absolute delete-item"
                                    style="top: 10px; right: 10px;"
                                    data-id="<?= $productdetail['id'] ?>"
                                    title="Remove Item">
                                    <i class="bi bi-trash fs-5"></i>
                                </a>
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <img src="<?= base_url('uploads/products/cover_images/' . esc($productdetail['cover_image'])) ?>"
                                            alt="<?= esc($productdetail['title']) ?>"
                                            class="img-fluid rounded">
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="fw-bold mb-1"><?= esc($productdetail['title']) ?></h6>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <p class="mb-1">Item Price: <span class="fw-bold">PKR <?= number_format($productdetail['price'], 2) ?></span></p>
                                        <p class="mb-1">Discount: <span class="text-danger">PKR <?= number_format($productdetail['discount'], 2) ?></span></p>
                                        <p class="fw-bold mb-0">Final Price: PKR <?= number_format($finalPrice, 2) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <!-- Empty Cart Message -->
                    <div class="text-center mt-4">
                        <img src="<?= base_url('assets/images/svg/panel_svg/cart_icon_active.svg') ?>" width="50" alt="Empty Cart Icon">
                        <h4 class="fw-bold mt-3">Your cart is empty!</h4>
                        <p class="text-muted">Add items to your cart to proceed.</p>
                        <a href="<?= base_url('categories') ?>" class="btn btn-primary rounded-pill">Add Items</a>
                    </div>
            <?php
                }
            }
            ?>
        </div>

        <!-- Order Summary -->
        <div class="col-md-4">
            <?php
            $deliveryCharge = 150.00;
            $taxRate = 15.5;
            $tax = ($subTotal - $totalDiscount) * ($taxRate / 100);
            $totalAmount = $subTotal - $totalDiscount + $deliveryCharge + $tax;
            ?>
            <div class="card shadow-sm border">
                <div class="card-body">
                    <h6 class="fw-bold mb-4">Order Summary</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Sub Total:</span>
                            <span>PKR <?= number_format($subTotal, 2) ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Discount:</span>
                            <span class="text-danger">PKR <?= number_format($totalDiscount, 2) ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Delivery Charge:</span>
                            <span>PKR <?= number_format($deliveryCharge, 2) ?></span>
                        </li>
                        <!-- <li class="list-group-item d-flex justify-content-between">
                            <span>Estimated Tax (<?= $taxRate ?>%):</span>
                            <span>PKR <?= number_format($tax, 2) ?></span>
                        </li> -->
                        <li class="list-group-item d-flex justify-content-between fw-bold">
                            <span>Total Amount:</span>
                            <span class="text-success">PKR <?= number_format($totalAmount, 2) ?></span>
                        </li>
                    </ul>
                    <div class="mt-4 d-flex justify-content-between">
                        <a href="<?= base_url('checkout') ?>" class="add-to-cart">Book Now</a>
                        <a href="<?= base_url('shop') ?>" class="btn btn-secondary">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const cartItems = document.getElementById("cart-items");

        // Handle delete icon clicks
        cartItems.addEventListener("click", function(event) {
            const deleteButton = event.target.closest(".delete-item");
            if (deleteButton) {
                const productId = deleteButton.getAttribute("data-id");

                // Send AJAX request to delete item
                fetch("<?= base_url('delete_item') ?>", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: JSON.stringify({
                            id: productId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Remove product card from DOM
                            const productCard = document.getElementById(`product-${productId}`);
                            if (productCard) {
                                productCard.remove();
                            }

                            // Optionally update totals dynamically here
                            alert(data.message);
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => console.error("Error:", error));
            }
        });
    });
</script>
<?= $this->endSection() ?>