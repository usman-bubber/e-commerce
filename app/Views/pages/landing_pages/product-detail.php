<?= $this->extend('home_template/layout') ?>
<?= $this->section('main_content') ?>
<style>
    /* Color Option Styles */
    .color-option {
        display: inline-block;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .color-option.active span {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .color-option:hover span {
        border-color: #007bff;
    }

    /* Size Option Styles */
    .size-option {
        display: inline-block;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .size-option.active span {
        border-color: #007bff;
        background-color: #007bff;
        color: blue;
        font-weight: 600;
    }

    .size-option:hover span {
        border-color: #007bff;
    }

    input[type="radio"]:checked+.color-option span {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    input[type="radio"]:checked+.size-option span {
        border-color: #007bff;
        background-color: #007bff;
        color: white;
    }
</style>
<!-- Add Review Modal -->
<div class="modal fade" id="addReviewModal" tabindex="-1" aria-labelledby="addReviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addReviewModalLabel">Add Your Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Review Form -->
                <form action="<?= base_url('save-review') ?>" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <input type="hidden" name="product_id" value="<?= esc($product['id']) ?>">

                    <!-- Review Name -->
                    <div class="mb-3">
                        <label for="reviewName" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="reviewName" name="name" placeholder="Enter your name">
                        <small id="nameError" class="text-danger d-none">Name is required.</small>
                    </div>

                    <!-- Rating -->
                    <div class="mb-3">
                        <label for="reviewStars" class="form-label">Rating</label>
                        <select class="form-select" id="reviewStars" name="rating">
                            <option selected disabled>Choose a rating</option>
                            <option value="1">1 Star</option>
                            <option value="2">2 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="5">5 Stars</option>
                        </select>
                        <small id="ratingError" class="text-danger d-none">Please select a rating.</small>
                    </div>

                    <!-- File Upload -->
                    <div class="mb-3">
                        <label for="file" class="form-label">Received Product Images <span>(Optional)</span></label>
                        <input type="file" class="form-control" id="file" name="file[]" multiple>
                        <small id="fileError" class="text-danger d-none">You can upload up to 4 images only.</small>
                    </div>

                    <!-- Review Message -->
                    <div class="mb-3">
                        <label for="reviewMessage" class="form-label">Your Review</label>
                        <textarea class="form-control" id="reviewMessage" name="message" rows="3" placeholder="Write your review here"></textarea>
                        <small id="messageError" class="text-danger d-none">Review message is required.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid p-5">
    <div class="row">
        <!-- Product Image Section -->
        <div class="col-lg-6">
            <div class="product-image text-center">
                <img id="main-product-image"
                    src="<?= base_url('uploads/products/cover_images/' . esc($product['cover_image'])) ?>"
                    class="img-fluid  bg-white"
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
                <button type="button" class="add-to-cart" data-product-id="<?= $product['id'] ?>">Add to cart</button>
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

            <!-- Product Colors -->
            <div class="my-4">
                <h6>Colors:</h6>
                <div class="d-flex gap-2" id="color-selection">
                    <?php
                    $colors = json_decode($product['color'] ?? '[]', true);
                    if (!empty($colors) && is_array($colors)):
                        foreach ($colors as $color):
                            $colorCode = match (strtolower($color)) {
                                'dark' => '#000000',
                                'white' => '#ffffff',
                                'red' => '#ff0000',
                                'blue' => '#0000ff',
                                default => $color,
                            };
                    ?>
                            <!-- Color option -->
                            <label class="color-option" data-color="<?= esc($color) ?>">
                                <span
                                    style="display: inline-block; width: 24px; height: 24px; background-color: <?= esc($colorCode) ?>; border: 1px solid #ccc; border-radius: 50%; cursor: pointer;"
                                    title="<?= esc(ucfirst($color)) ?>"></span>
                                <input type="checkbox" name="color[]" value="<?= esc($color) ?>" hidden>
                            </label>
                        <?php
                        endforeach;
                    else:
                        ?>
                        <p>N/A</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Product Sizes -->
            <div class="mb-4">
                <h6>Sizes:</h6>
                <div class="d-flex gap-2" id="size-selection">
                    <?php
                    $sizes = json_decode($product['size'] ?? '[]', true);
                    if (!empty($sizes) && is_array($sizes)):
                        foreach ($sizes as $size):
                    ?>
                            <!-- Size option -->
                            <label class="size-option" data-size="<?= esc($size) ?>">
                                <span
                                    style="display: inline-block; padding: 5px 10px; border: 1px solid #ccc; border-radius: 4px; background-color: #f8f9fa; font-size: 14px; cursor: pointer;">
                                    <?= esc($size) ?>
                                </span>
                                <input type="checkbox" name="size[]" value="<?= esc($size) ?>" hidden>
                            </label>
                        <?php
                        endforeach;
                    else:
                        ?>
                        <p>N/A</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Product Quantity -->
            <div class="d-flex align-items-center mb-3">
                <h6 class="me-3 fw-bold">Quantity:</h6>
                <div class="input-group" style="width: 120px;">
                    <button class="btn btn-outline-secondary btn-decrease" type="button">-</button>
                    <input type="text" class="form-control text-center quantity-input" value="1" min="1" inputmode="numeric">
                    <button class="btn btn-outline-secondary btn-increase" type="button">+</button>
                </div>
            </div>

            <!-- Product Description -->
            <div>
                <h5 class="fw-bold">Description:</h5>
                <p id="short-description-<?= $product['id'] ?>" class="short-description">
                    <?= word_limiter(esc($product['description'] ?? 'No description available.'), 70) ?>
                    <?php if (!empty($product['description']) && str_word_count($product['description']) > 70): ?>
                        <span>...</span>
                        <button class="btn btn-sm btn-link p-0 read-more-btn" data-product-id="<?= $product['id'] ?>">Read More</button>
                    <?php endif; ?>
                </p>
                <p id="full-description-<?= $product['id'] ?>" class="full-description d-none">
                    <?= esc($product['description'] ?? 'No description available.') ?>
                </p>
            </div>

            <!-- Product Available Offers -->
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
                            <td>Product Name :</td>
                            <td class="fw-bold"><?= esc($product['title']) ?></td>
                        </tr>
                        <tr>
                            <td>Department :</td>
                            <td><?= esc(ucfirst($product['gender'])) ?></td>
                        </tr>
                        <tr>
                            <td>Brand Name :</td>
                            <td><?= esc($product['brand_name']) ?></td>
                        </tr>
                        <tr>
                            <td>Quantity :</td>
                            <td><?= esc($product['stock']) ?> items</td>
                        </tr>
                        <tr>
                            <td>Item Weight:</td>
                            <td><?= esc($product['weight']) ?> kg/gram</td>
                        </tr>
                        <tr>
                            <td>Manufacture Date:</td>
                            <td><?= esc(date('Y-m-d', strtotime($product['created_at']))) ?></td>
                        </tr>
                        <tr>
                            <td>Country of Origin :</td>
                            <td>Overall Pakistan</td>
                        </tr>
                        <tr>
                            <td>Related Tags :</td>
                            <td>
                                <?php
                                $tags = explode(',', $product['tags']); // Split the tags by comma
                                foreach ($tags as $tag): ?>
                                    <span class="badge bg-secondary me-1"><?= esc(trim($tag)) ?></span>
                                <?php endforeach; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Right: Reviews -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <!-- Header Section -->
                    <div class="row align-items-center mb-4">
                        <div class="col-lg-6">
                            <h5 class="fw-bold">Customer Reviews</h5>
                        </div>
                        <div class="col-lg-6 text-end">
                            <!-- Add Review Button -->
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addReviewModal">Add Review</button>
                        </div>
                    </div>
                    <!-- Product Reviews Section -->
                    <div class="reviews-section" id="load_review_here">
                        <?php
                        if (isset($reviews) && !empty($reviews)) {
                            $reviews_to_display = array_slice($reviews, 0, 2);

                            foreach ($reviews_to_display as $key => $val) {
                                $images = json_decode($val['images'], true);
                        ?>
                                <div class="review-card d-flex align-items-start mb-3" data-review-id="<?= esc($val['id']) ?>" data-product-id="<?= esc($val['product_id']) ?>">
                                    <img src="<?= base_url('assets/images/profile_dummy.PNG') ?>" class="rounded-circle" alt="Reviewer Image">
                                    <div class="ms-3">
                                        <h6 class="mb-0"><?= esc($val['name']) ?></h6>
                                        <p class="small text-muted"><?= !empty($val['created_at']) ? date('d M Y', strtotime($val['created_at'])) : 'Date not available'; ?></p>
                                        <p class="mb-1 text-warning">
                                            <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $val['rating']) {
                                                    echo '<i class="bi bi-star-fill"></i>';
                                                } elseif ($i - $val['rating'] < 1) {
                                                    echo '<i class="bi bi-star-half"></i>';
                                                } else {
                                                    echo '<i class="bi bi-star"></i>';
                                                }
                                            }
                                            ?>
                                        </p>
                                        <p class="small mb-2"><?= esc($val['message']) ?></p>
                                        <?php if (is_array($images) && !empty($images)) { ?>
                                            <div class="row">
                                                <?php foreach ($images as $image) {
                                                    // Check if the image already includes the path
                                                    $imagePath = strpos($image, 'uploads/reviews/') === 0 ? $image : 'uploads/reviews/' . $image;
                                                ?>
                                                    <div class="col-lg-3">
                                                        <img src="<?= base_url(esc($imagePath)) ?>" class="img-fluid rounded" alt="Review Image">
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php
                            }
                        } else { ?>
                            <p>No Review Found</p>
                        <?php } ?>
                        <!-- View More Link -->
                    </div>
                    <a href="#" id="more-review-btn" class="text-primary d-block text-center mt-3 fw-bold">View More Customer Reviews →</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Trending Products -->
    <div class="row mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4 brand-section">
            <h2>Related Products</h2>
            <a href="<?= base_url('shop/') ?>" class="view-all">View All Products →</a>
        </div>
        <!-- Swiper Slider -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                helper('product');
                $products = get_all_products($productModel);
                ?>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="swiper-slide">
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
                                        <h6 class="card-title text-truncate fw-bold"><?= esc($product['title']) ?></h6>
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
                <?php else: ?>
                    <p class="text-center">No products available at the moment.</p>
                <?php endif; ?>
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
    document.addEventListener('DOMContentLoaded', function() {
        const readMoreButtons = document.querySelectorAll('.read-more-btn');

        readMoreButtons.forEach(button => {
            button.addEventListener('click', function() {
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
<!-- Script for ad-to-cart checkin  -->
<script>
    $(document).ready(function() {
        var base_url = '<?php echo base_url(); ?>';

        $('.add-to-cart').click(function() {
            var product_id = $(this).attr('data-product-id');
            var quantity = $('.quantity-input').val();
            var colors = $('input[name="color[]"]:checked').map(function() {
                return $(this).val();
            }).get(); // Get selected colors
            var sizes = $('input[name="size[]"]:checked').map(function() {
                return $(this).val();
            }).get(); // Get selected sizes

            if (colors.length === 0 || sizes.length === 0) {
                alert('Please select at least one color and one size.');
                return;
            }

            $.ajax({
                url: base_url + 'add_tocart',
                type: 'get',
                data: {
                    product_id: product_id,
                    quantity: quantity,
                    color: colors, // Send all selected colors
                    size: sizes, // Send all selected sizes
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 1) {
                        window.location.href = base_url + 'checkin';
                    } else {
                        alert(response.message);
                    }
                }
            });
        });
    });
</script>
<!-- select color size and quantity script  -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Get quantity input and initialize selections
        const quantityInput = document.querySelector('.quantity-input');
        const colorOptions = document.querySelectorAll('.color-option');
        const sizeOptions = document.querySelectorAll('.size-option');

        // Function to update selections based on quantity
        const updateSelections = () => {
            const quantity = parseInt(quantityInput.value);

            // Allow up to `quantity` colors to be selected
            const colorLimit = Math.min(quantity, colorOptions.length);
            const selectedColors = Array.from(colorOptions).filter(option => option.querySelector('input[type="checkbox"]').checked).length;

            // Enable/Disable color selections based on quantity
            colorOptions.forEach(option => {
                const checkbox = option.querySelector('input[type="checkbox"]');
                if (selectedColors >= colorLimit) {
                    if (!checkbox.checked) checkbox.disabled = true;
                } else {
                    checkbox.disabled = false;
                }
            });

            // Allow up to `quantity` sizes to be selected
            const sizeLimit = Math.min(quantity, sizeOptions.length);
            const selectedSizes = Array.from(sizeOptions).filter(option => option.querySelector('input[type="checkbox"]').checked).length;

            // Enable/Disable size selections based on quantity
            sizeOptions.forEach(option => {
                const checkbox = option.querySelector('input[type="checkbox"]');
                if (selectedSizes >= sizeLimit) {
                    if (!checkbox.checked) checkbox.disabled = true;
                } else {
                    checkbox.disabled = false;
                }
            });
        };

        // Event listener for quantity change
        quantityInput.addEventListener('input', updateSelections);

        // Color selection
        colorOptions.forEach(option => {
            option.addEventListener('click', () => {
                // Toggle active class and checkbox selection
                const checkbox = option.querySelector('input[type="checkbox"]');
                checkbox.checked = !checkbox.checked;
                option.classList.toggle('active', checkbox.checked);

                updateSelections(); // Update available selections
            });
        });

        // Size selection
        sizeOptions.forEach(option => {
            option.addEventListener('click', () => {
                // Toggle active class and checkbox selection
                const checkbox = option.querySelector('input[type="checkbox"]');
                checkbox.checked = !checkbox.checked;
                option.classList.toggle('active', checkbox.checked);

                updateSelections(); // Update available selections
            });
        });

        // Initialize selections on page load
        updateSelections();
    });
</script>
<!-- Select only 4 images for reviews of product  -->
<script>
    function validateForm() {
        // Clear any previous error messages
        document.getElementById('nameError').classList.add('d-none');
        document.getElementById('ratingError').classList.add('d-none');
        document.getElementById('fileError').classList.add('d-none');
        document.getElementById('messageError').classList.add('d-none');

        const name = document.getElementById('reviewName').value.trim();
        const rating = document.getElementById('reviewStars').value;
        const fileInput = document.getElementById('file');
        const message = document.getElementById('reviewMessage').value.trim();

        // Validate Name
        if (name === "") {
            document.getElementById('nameError').classList.remove('d-none');
            return false;
        }

        // Validate Rating
        if (!rating) {
            document.getElementById('ratingError').classList.remove('d-none');
            return false;
        }

        // Validate File Input (Limit to 4 files)
        if (fileInput.files.length > 4) {
            document.getElementById('fileError').classList.remove('d-none');
            return false;
        }

        // Validate Review Message
        if (message === "") {
            document.getElementById('messageError').classList.remove('d-none');
            return false;
        }

        // If everything is valid, allow the form to be submitted
        return true;
    }
</script>
<!-- Load more Reviews script  -->
<script>
    var page = 1;
    var productId = "<?= esc($val['product_id'] ?? '') ?>";
    function loadMoreReview() {
        $.ajax({
            type: "GET",
            url: "<?= base_url('fetch-more-reviews') ?>",
            data: {
                page: ++page,
                product_id: productId
            },
            dataType: 'html',
            async: true,
            success: function(response) {
                if (response != 'null') {
                    $('#load_review_here').html(response);
                } else {
                    $('#more-review-btn').text('No more reviews');
                    $('#more-review-btn').attr('disabled', true);
                }
            },
            error: function() {
                alert("An error occurred while loading more reviews.");
            }
        });
    }

    $(document).on('click', '#more-review-btn', function() {
        loadMoreReview(); // Trigger the load more function
        $('html, body').animate({
            scrollTop: '+=100px' // Scroll down a bit after loading more
        }, 'slow');
    });
</script>
<?= $this->endSection() ?>