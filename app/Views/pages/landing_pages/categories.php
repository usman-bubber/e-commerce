<?= $this->extend('home_template/layout') ?>
<?= $this->section('main_content') ?>

<!-- Cover Image -->
<div class="cover-image">
    <div class="filter-overlay">
        <form class="d-flex justify-content-center align-items-center">
            <input type="text" id="productSearch" class="form-control me-2" placeholder="Search products here" style="max-width: 300px;">
        </form>
    </div>
</div>

<!-- Features Section -->
<div class="features shadow-sm">
    <div class="container-fluid px-5">
        <div class="d-flex justify-content-between">
            <div class="feature-icon">
                <i class="bi bi-shield-check"></i>
                <span class="">Free shipping for all orders in Pakistan</span>
            </div>
            <div class="feature-icon">
                <i class="bi bi-chat-dots"></i>
                <span>24x7 Live Chat Support</span>
            </div>
            <div class="feature-icon">
                <i class="bi bi-bookmark"></i>
                <span>Fast Booking</span>
            </div>
            <div class="feature-icon">
                <i class="bi bi-star"></i>
                <span>Special discounts for customers Coupons</span>
            </div>
            <div class="feature-icon">
                <i class="bi bi-wifi"></i>
                <span>Free gift wrapping
                    With 100 letters custom note</span>
            </div>
        </div>
    </div>
</div>

<!-- Categories Section -->
<div class="container-fluid px-5">
    <?php if (!empty($products)): ?>
        <!-- Category Title -->
        <div class="mb-4 brand-section">
            <h2 class="mt-4 text-center"><?= esc($categoryTitle) ?></h2>
        </div>

        <!-- Custom Products Grid -->
        <div class="d-flex flex-wrap justify-content-between" id="productsContainer">
            <?php foreach ($products as $product): ?>
                <div class="product-item" style="flex: 0 0 calc(20% - 10px); margin-bottom: 20px;">
                    <a href="<?= base_url('product-detail/' . esc($product['id'])) ?>" style="text-decoration: none;">
                        <div class="card shadow-sm border rounded h-100 d-flex flex-column">
                            <!-- Product Image -->
                            <div class="position-relative">
                                <img
                                    src="<?= base_url('uploads/products/cover_images/' . esc($product['cover_image'])) ?>"
                                    class="card-img-top rounded-top p-2"
                                    style="height: 200px; object-fit: cover;">
                            </div>

                            <!-- Card Body -->
                            <div class="card-body flex-grow-1">
                                <h6 class="card-title text-truncate fw-bold product-title"><?= esc($product['title']) ?></h6>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p class="text-muted small mb-0">
                                        <span class="text-warning">★★★★★</span>
                                        <span>104 Reviews</span>
                                    </p>
                                    <?php if (!empty($product['discount']) && $product['discount'] > 0): ?>
                                        <p class="text-muted text-decoration-line-through mb-0">PKR <?= number_format($product['price'], 2) ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <?php if (!empty($product['discount']) && $product['discount'] > 0): ?>
                                        <p class="text-danger mb-0"><?= number_format($product['discount'], 2) ?> Off</p>
                                    <?php endif; ?>
                                    <?php
                                    $finalPrice = $product['price'] - $product['discount'];
                                    ?>
                                    <p class="fw-bold text-success mb-0">PKR <?= number_format($finalPrice, 2) ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

    <?php else: ?>
        <p class="text-center mt-5">No products found for this category.</p>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<!-- Search Product Title -->
<script>
    $(document).ready(function() {
        $('#productSearch').on('keyup', function() {
            let searchQuery = $(this).val().toLowerCase(); // Get the search input value

            // Loop through all product items
            $('#productsContainer .product-item').each(function() {
                let productTitle = $(this).find('.product-title').text().toLowerCase(); // Get the product title

                // If the title contains the search query, show the product, otherwise hide it
                if (productTitle.includes(searchQuery)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>