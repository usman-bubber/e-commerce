<?= $this->extend('home_template/layout') ?>
<?= $this->section('main_content') ?>
<div class="container-fluid p-5">
    <div class="row">
        <!-- Product Image Section -->
        <div class="col-lg-6">
            <div class="product-image text-center">
                <img id="main-product-image"
                    src="<?= base_url('uploads/products/cover_images/' . esc($product['cover_image'])) ?>"
                    class="img-fluid"
                    alt="<?= esc($product['title']) ?>">
            </div>
            <div class="mt-4 d-flex justify-content-center gap-3">
                <?php foreach ($productImages as $image): ?>
                    <img src="<?= base_url('uploads/products/images/' . esc($image['path'])) ?>"
                        class="img-thumbnail thumbnail-image"
                        alt="<?= esc($product['title']) ?>"
                        onclick="changeMainImage('<?= base_url('uploads/products/images/' . esc($image['path'])) ?>')">
                <?php endforeach; ?>
            </div>
            <div class="d-flex justify-content-center gap-3 mt-5">
                <a href="<?= base_url('checkin/' . esc($product['id'])) ?>" class="add-to-cart">Buy Now</a>
            </div>
        </div>

        <!-- Product Details Section -->
        <div class="col-lg-6">
            <h5 class="badge bg-success mb-2"><?= esc($product['brand_name'] ?? 'New Arrival') ?></h5>
            <h3 class="fw-bold"><?= esc($product['title']) ?></h3>
            <div class="d-flex align-items-center mb-2">
                <span class="me-2 text-warning">★★★★☆</span>
                <small>(<?= esc($product['reviews_count'] ?? '0') ?> Reviews)</small>
            </div>
            <h4 class="text-success">
                <?php
                // Calculate the final price after applying the discount
                $finalPrice = $product['price'] - $product['discount'];
                ?>
                PKR <?= number_format($finalPrice, 2) ?>

                <?php if (!empty($product['discount']) && $product['discount'] > 0): ?>
                    <!-- Original price with strikethrough -->
                    <small class="text-decoration-line-through text-danger">
                        PKR <?= number_format($product['price'], 2) ?>
                    </small>

                    <!-- Show the discount amount -->
                    <span class="text-muted">(AED <?= number_format($product['discount'], 2) ?> Off)</span>
                <?php endif; ?>
            </h4>

            <!-- Product Colors  -->
            <div class="my-4">
                <h6>Colors:</h6>
                <div class="d-flex gap-2">
                    <?php
                    // Decode the JSON string into an array
                    $colors = json_decode($product['color'] ?? '[]', true);

                    // Check if colors are valid and display them
                    if (!empty($colors) && is_array($colors)):
                        foreach ($colors as $color):
                            // Map color names to CSS-compatible color codes
                            $colorCode = match (strtolower($color)) {
                                'dark' => '#000000', // Black
                                'white' => '#ffffff', // White
                                'red' => '#ff0000',  // Example for red
                                'blue' => '#0000ff', // Example for blue
                                default => $color,   // Assume valid CSS color if unmapped
                            };
                    ?>
                            <!-- Display a circular color swatch -->
                            <span
                                style="display: inline-block; width: 24px; height: 24px; background-color: <?= esc($colorCode) ?>; border: 1px solid #ccc; border-radius: 50%;"
                                title="<?= esc(ucfirst($color)) ?>"></span>
                        <?php
                        endforeach;
                    else:
                        ?>
                        <p>N/A</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Product Size  -->
            <div class="mb-4">
                <h6>Sizes:</h6>
                <div class="d-flex gap-2">
                    <?php
                    // Decode the JSON string into an array
                    $sizes = json_decode($product['size'] ?? '[]', true);

                    // Check if sizes are valid and display them
                    if (!empty($sizes) && is_array($sizes)):
                        foreach ($sizes as $size):
                    ?>
                            <!-- Display each size as a badge or button -->
                            <span
                                style="display: inline-block; padding: 5px 10px; border: 1px solid #ccc; border-radius: 4px; background-color: #f8f9fa; font-size: 14px;">
                                <?= esc($size) ?>
                            </span>
                        <?php
                        endforeach;
                    else:
                        ?>
                        <p>N/A</p>
                    <?php endif; ?>
                </div>
            </div>


            <div class="d-flex align-items-center mb-3">
                <h6 class="me-3 fw-bold">Quantity:</h6>
                <div class="input-group" style="width: 120px;">
                    <button class="btn btn-outline-secondary btn-decrease" type="button">-</button>
                    <input type="text" class="form-control text-center quantity-input" value="1" min="1" inputmode="numeric">
                    <button class="btn btn-outline-secondary btn-increase" type="button">+</button>
                </div>
            </div>

            <ul class="list-unstyled text-success mb-3">
                <li><i class="bi bi-check-circle"></i> <?= $product['stock'] > 0 ? 'In Stock' : 'Out of Stock' ?></li>
                <li><i class="bi bi-truck"></i> Free delivery available</li>
                <li><i class="bi bi-percent"></i> Sales <?= esc($product['discount'] ?? '0') ?>% Off</li>
            </ul>

            <div>
    <h5 class="fw-bold">Description:</h5>
    <p id="short-description-<?= $product['id'] ?>" class="short-description">
        <?= word_limiter(esc($product['description'] ?? 'No description available.'), 40) ?>
        <?php if (!empty($product['description']) && str_word_count($product['description']) > 40): ?>
            <span>...</span>
            <button class="btn btn-sm btn-link p-0 read-more-btn" data-product-id="<?= $product['id'] ?>">Read More</button>
        <?php endif; ?>
    </p>
    <p id="full-description-<?= $product['id'] ?>" class="full-description d-none">
        <?= esc($product['description'] ?? 'No description available.') ?>
    </p>
</div>


            <div>
                <h5 class="fw-bold">Available Offers:</h5>
                <ul class="list-unstyled">
                    <li><i class="bi bi-tag-fill text-success"></i> Bank Offer: 10% instant discount on Bank Debit
                        Cards, up to $30 on orders of $50 and above.
                    </li>
                    <li><i class="bi bi-gift-fill text-success"></i> Bank Offer: Grab our exclusive offer now and
                        save 20% on your next purchase!
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Top Banner -->
    <div class="row text-center mb-4 mt-5">
        <div class="col-md-3">
            <div class="icon-box brand-card">
                <i class="bi bi-truck"></i>
                <span>Free shipping for all orders in Pakistan over PkR:200<br></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="icon-box brand-card">
                <i class="bi bi-tags"></i>
                <span>Special discounts for customers<br><small>Coupons up to $100</small></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="icon-box brand-card">
                <i class="bi bi-gift"></i>
                <span>Free gift wrapping<br><small>With 100 letters custom note</small></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="icon-box brand-card">
                <i class="bi bi-headset"></i>
                <span>Expert Customer Service<br><small>8:00 - 20:00, 7 days/week</small></span>
            </div>
        </div>
    </div>

    <!-- Details and Reviews Section -->
    <div class="row mt-5">
        <!-- Left: Items Detail -->
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold">Items Detail</h5>
                    <table class="details-table">
                        <tr>
                            <td>Product Dimensions :</td>
                            <td>53.3 x 40.6 x 6.4 cm; 500 Grams</td>
                        </tr>
                        <tr>
                            <td>Date First Available :</td>
                            <td>22 September 2023</td>
                        </tr>
                        <tr>
                            <td>Department :</td>
                            <td>Men</td>
                        </tr>
                        <tr>
                            <td>Manufacturer :</td>
                            <td>Greensboro, NC 27401 Prospa-Pal</td>
                        </tr>
                        <tr>
                            <td>ASIN :</td>
                            <td>BOCJML118</td>
                        </tr>
                        <tr>
                            <td>Item model number :</td>
                            <td>1137AZ</td>
                        </tr>
                        <tr>
                            <td>Country of Origin :</td>
                            <td>U.S.A</td>
                        </tr>
                        <tr>
                            <td>Item Weight :</td>
                            <td>500 g</td>
                        </tr>
                        <tr>
                            <td>Generic Name :</td>
                            <td>T-Shirt</td>
                        </tr>
                        <tr>
                            <td>Best Sellers Rank :</td>
                            <td>#13 in Clothing & Accessories</td>
                        </tr>
                    </table>
                    <a href="#" class="text-primary mt-2 d-block">View More Details →</a>
                </div>
            </div>
        </div>

        <!-- Right: Reviews -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Customer Reviews</h5>
                    <div class="reviews-section">
                        <!-- Review Card 1 -->
                        <div class="review-card d-flex mb-3">
                            <img src="https://via.placeholder.com/50" alt="User 1">
                            <div class="ms-3">
                                <h6>Henny K. Mark</h6>
                                <p class="mb-1"><i class="bi bi-star-fill text-warning"></i> <i
                                        class="bi bi-star-fill text-warning"></i> <i
                                        class="bi bi-star-fill text-warning"></i> <i
                                        class="bi bi-star-fill text-warning"></i> <i
                                        class="bi bi-star-half text-warning"></i> Excellent Quality</p>
                                <p class="small">Reviewed in Canada on 16 November 2023</p>
                                <p class="small">Medium thickness. Did not shrink after wash... Highly recommended
                                    in so low
                                    price.</p>
                                <a href="#" class="text-primary small">Helpful</a> · <a href="#"
                                    class="text-primary small">Report</a>
                            </div>
                        </div>
                        <!-- Review Card 2 -->
                        <div class="review-card d-flex">
                            <img src="https://via.placeholder.com/50" alt="User 2">
                            <div class="ms-3">
                                <h6>Jorge Herry</h6>
                                <p class="mb-1"><i class="bi bi-star-fill text-warning"></i> <i
                                        class="bi bi-star-fill text-warning"></i> <i
                                        class="bi bi-star-fill text-warning"></i> <i
                                        class="bi bi-star-fill text-warning"></i> <i
                                        class="bi bi-star-fill text-warning"></i> Good Quality</p>
                                <p class="small">Reviewed in U.S.A on 21 December 2023</p>
                                <p class="small">I liked the t-shirt, it's pure cotton & skin friendly... best rated
                                </p>
                                <a href="#" class="text-primary small">Helpful</a> · <a href="#"
                                    class="text-primary small">Report</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<!-- Script for Image perview changer  -->
<script>
    // Function to change the main product image
    function changeMainImage(imagePath) {
        document.getElementById('main-product-image').src = imagePath;
    }
</script>
<!-- Script for Read More button in Description -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const readMoreButtons = document.querySelectorAll('.read-more-btn');

    readMoreButtons.forEach(button => {
        button.addEventListener('click', function () {
            const productId = button.getAttribute('data-product-id');
            const shortDescription = document.getElementById(`short-description-${productId}`);
            const fullDescription = document.getElementById(`full-description-${productId}`);

            // Toggle visibility
            if (fullDescription.classList.contains('d-none')) {
                fullDescription.classList.remove('d-none');
                shortDescription.classList.add('d-none');
                button.textContent = 'Read Less'; // Change button text to 'Read Less'
            } else {
                fullDescription.classList.add('d-none');
                shortDescription.classList.remove('d-none');
                button.textContent = 'Read More'; // Change button text back to 'Read More'
            }
        });
    });
});

</script>

<?= $this->endSection() ?>