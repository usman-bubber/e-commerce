<?= $this->extend('home_template/layout') ?>
<?= $this->section('main_content') ?>
<div class="container-fluid p-5">
    <!-- Cart Header -->
    <div class="d-flex justify-content-between align-items-center hero-section p-3 rounded mb-4">
        <span>There are <?php
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
            <?php } ?> products in your cart</span>
        <a href="#" class="text-danger fw-bold text-decoration-none">Clear cart</a>
    </div>
    <!-- Ad-To-Cart Detail  -->
    <div class="row">
        <!-- Cart Items -->
        <div class="col-md-8" id="cart-items">
            <?php
            if (!empty($product_detail)) {
                $subTotal = 0;
                $totalDiscount = 0;

                foreach ($product_detail as $product) {
                    $quantity = isset($product['selected_quantity']) ? (int)$product['selected_quantity'] : 1;
                    $itemTotalPrice = $product['price'] * $quantity;
                    $itemTotalDiscount = $product['discount'] * $quantity;
                    $finalPrice = $itemTotalPrice - $itemTotalDiscount;

                    $subTotal += $itemTotalPrice;
                    $totalDiscount += $itemTotalDiscount;
            ?>
                    <!-- Product Card -->
                    <div class="card shadow-sm mb-3 border position-relative text-center" id="product-<?= $product['id'] ?>">
                        <div class="card-body">
                            <!-- Delete Icon -->
                            <a href="javascript:void(0)"
                                class="text-danger position-absolute delete-item"
                                style="top: 10px; right: 10px;"
                                data-id="<?= $product['id'] ?>"
                                title="Remove Item">
                                <i class="bi bi-trash fs-5"></i>
                            </a>
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="<?= base_url('uploads/products/cover_images/' . esc($product['cover_image'])) ?>"
                                        alt="<?= esc($product['title']) ?>"
                                        class="img-fluid rounded">
                                </div>
                                <div class="col-md-6">
                                    <h6 class="fw-bold mb-1"><?= esc($product['title']) ?></h6>
                                    <!-- Show the selected color and size -->
                                    <h6 class="mb-1">Color:
                                        <?= is_array($product['selected_color']) ? implode(', ', $product['selected_color']) : esc($product['selected_color']) ?>
                                    </h6>
                                    <h6 class="mb-1">Size:
                                        <?= is_array($product['selected_size']) ? implode(', ', $product['selected_size']) : esc($product['selected_size']) ?>
                                    </h6>
                                </div>
                                <div class="col-md-4 text-end">
                                    <p class="mb-1">Per Item Price: <span class="fw-bold"><?= number_format($product['price']) ?> PKR</span></p>
                                    <p class="mb-1">Discount: <span class="text-danger" style="text-decoration: line-through;"><?= number_format($product['discount']) ?> PKR</span></p>
                                    <p class="mb-1">Total Items: <span class="fw-bold"><?= number_format($product['selected_quantity']) ?></span></p>
                                    <!-- <p class="mb-1">Total Discount: <span class="text-danger"><?= number_format($itemTotalDiscount) ?> PKR</span></p> -->
                                    <!-- <p class="fw-bold mb-0">Final Price: <?= number_format($finalPrice, 2) ?> PKR</p> -->
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
            ?>
        </div>

        <!-- Order Summary -->
        <div class="col-md-4">
            <?php
            $deliveryCharge = 150.00;
            $totalAmount = $subTotal - $totalDiscount + $deliveryCharge;
            // Calculate estimated delivery date
            $currentDate = new DateTime();
            $currentDate->modify('+2 days');
            $estimatedDelivery = $currentDate->format('d F, Y');
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
                            <span class="text-danger" style="text-decoration: line-through;">PKR <?= number_format($totalDiscount, 2) ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Delivery Charge:</span>
                            <span>PKR <?= number_format($deliveryCharge, 2) ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between fw-bold">
                            <span>Total Amount:</span>
                            <span class="text-success">PKR <?= number_format($totalAmount, 2) ?></span>
                        </li>
                        <div class="estimated-delivery shadow-sm">
                            <i class="bi bi-truck me-2"></i>
                            Estimated Delivery by <?= $estimatedDelivery ?>
                        </div>
                    </ul>
                    <div class="mt-4 d-flex justify-content-between">
                        <a href="<?= base_url('checkout') ?>" class="add-to-cart">Book Now</a>
                        <a href="<?= base_url('shop') ?>" class="btn btn-secondary">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<!-- Delete Product form ad-to-cart  -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const cartItems = document.getElementById("cart-items");

        // Handle delete icon clicks
        cartItems.addEventListener("click", function(event) {
            const deleteButton = event.target.closest(".delete-item");

            if (deleteButton) {
                const productId = deleteButton.getAttribute("data-id");

                console.log("Product ID to delete:", productId); // Debugging log

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