<?= $this->extend('home_template/layout') ?>
<?= $this->section('main_content')  ?>
<!-- Hero Section -->
<section class="hero-section">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="">Fresh Smoothie & Summer Collection</h2>
                <p>Best Selling Summer Juice with Natural Extracts</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus
                    tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus
                    tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.
                </p>
                <a href="#" class="add-to-cart">Shop Now</a>
            </div>
            <div class="col-md-4">
                <img src="<?= base_url('assets/images/hero.PNG') ?>" alt="Smoothie Bottle" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- Category Section -->
<div class="container-fluid p-5">
    <div class="d-flex justify-content-between align-items-center mb-4 brand-section">
        <h2>Category</h2>
    </div>
    <h2></h2>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php if (!empty($categories) && is_array($categories)): ?>
                <?php
                $activecategories = array_filter($categories, function ($category) {
                    return $category['status'] === 'active';
                });
                if (!empty($activecategories)):
                    foreach ($activecategories as $category):
                ?>
                        <div class="swiper-slide">
                            <div class="category-card text-center">
                                <img src="<?= base_url('uploads/categories/' . esc($category['cover_image'])) ?>" alt="Category Image" class="avatar-xl img-fluid">
                                <p><?= esc($category['title']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No active categories available.</p>
                <?php endif; ?>
            <?php else: ?>
                <p>No categories found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Trending Products -->
<div class="container-fluid p-5">
    <div class="d-flex justify-content-between align-items-center mb-4 brand-section">
        <h2>Trending Products</h2>
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

<!-- Banner Section -->
<div class="container-fluid p-5">
    <div class="row">
        <!-- Text Content -->
        <div class="col-md-6 text-center">
            <h3 class="display-5 fw-bold">Limited Time Offer!<br>Up to 50% OFF!</h3>
            <p class="text-muted mb-4">
                Don't Wait – Limited Stock at Unbeatable Prices! Grab the hottest deals before they’re gone – discounts like this don’t last forever! Shop your favorite products at unbeatable prices and save big today! Hurry, limited stock available! Make the most of this exclusive offer now!
            </p>

            <!-- HTML Timer Element -->
            <div id="countdown" class="mb-3" style="font-size: 1.5rem; font-weight: bold; color: #ff0000;">
                <span id="days">00</span>d
                <span id="hours">00</span>h
                <span id="minutes">00</span>m
                <span id="seconds">00</span>s
            </div>

            <!-- Shop Now Button -->
            <a href="#" class="add-to-cart">Shop Now</a>
        </div>
        <!-- Illustration -->
        <div class="col-md-6 text-center">
            <img src="<?= base_url('assets/images/banner.PNG') ?>" alt="Discount Illustration" style="width: 400px;">
        </div>
    </div>
</div>

<!-- Category Wise Products Section -->
<?php helper('product'); ?>
<div class="container-fluid p-5">
    <?php
    $productsByCategory = get_products_by_category($categoryModel, $productModel);
    // print_r($productsByCategory);exit;
    ?>
    <?php if (!empty($productsByCategory)): ?>
        <?php foreach ($productsByCategory as $categoryTitle => $products): ?>
            <!-- Category Title -->
            <div class="d-flex justify-content-between align-items-center mb-4 brand-section">
                <h2 class="mt-5"><?= esc($categoryTitle) ?></h2>
                <a href="<?= base_url('categories/' . urlencode($products[0]['category_id'])) ?>" class="view-all">
                    View All <?= esc($categoryTitle) ?> →
                </a>
            </div>

            <!-- Swiper Slider for Category Products -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($products as $product): ?>
                        <div class="swiper-slide" style="width: 20%; padding: 0 10px;"> <!-- 20% width ensures 5 products per row -->
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
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-center">No categories available.</p>
    <?php endif; ?>
</div>

<!-- Newly Arrived Brands Section -->
<div class="container-fluid p-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Newly Arrived Brands</h2>
    </div>
    <div class="row g-3">
        <div class="col-6 col-md-3">
            <div class="brand-card d-flex align-items-center">
                <img src="<?= base_url('assets/images/product/p-1.PNG') ?>" alt="Brand">
                <div class="ms-3">
                    <h6>Amber Jar</h6>
                    <p class="mb-0">Honey best nectar you wish to get</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="brand-card d-flex align-items-center">
                <img src="<?= base_url('assets/images/product/p-2.PNG') ?>" alt="Brand">
                <div class="ms-3">
                    <h6>Amber Jar</h6>
                    <p class="mb-0">Honey best nectar you wish to get</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="brand-card d-flex align-items-center">
                <img src="<?= base_url('assets/images/product/p-3.PNG') ?>" alt="Brand">
                <div class="ms-3">
                    <h6>Amber Jar</h6>
                    <p class="mb-0">Honey best nectar you wish to get</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="brand-card d-flex align-items-center">
                <img src="<?= base_url('assets/images/product/p-4.PNG') ?>" alt="Brand">
                <div class="ms-3">
                    <h6>Amber Jar</h6>
                    <p class="mb-0">Honey best nectar you wish to get</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials  -->
<div class="container-fluid p-5">
    <div class="d-flex justify-content-between align-items-center mb-4 brand-section">
        <h2>Testimonials</h2>
    </div>
    <div class="row gy-4">
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                    </div>
                    <p class="card-text">Comfy and supportive. Comfiest bed I have ever owned. My aches and pains have become less and less.</p>
                    <h6 class="fw-semibold mt-3">Sam O</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                    </div>
                    <p class="card-text">This is my second mattress from Tuft and Needle. Fast delivery, easy setup, and great sleep.</p>
                    <h6 class="fw-semibold mt-3">JMadeleine</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                    </div>
                    <p class="card-text">My favorite mattress ever since I bought my first one about 5 years ago. Still firm as the day I bought it.</p>
                    <h6 class="fw-semibold mt-3">MG29</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100 border-0 shadow">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                    </div>
                    <p class="card-text">Love the mattress. This is my 10th mattress. I have given them as gifts as well as for both my homes. Love them!</p>
                    <h6 class="fw-semibold mt-3">Kathy R</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Brand Logos -->
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-lg-12 text-center">
            <img src="<?= base_url('assets/images/brands/shop1.PNG') ?>" alt="Disney" class="brand-logo mx-3">
            <img src="<?= base_url('assets/images/brands/shop2.PNG') ?>" alt="Samsung" class="brand-logo mx-3">
            <img src="<?= base_url('assets/images/brands/shop3.PNG') ?>" alt="Nike" class="brand-logo mx-3">
            <img src="<?= base_url('assets/images/brands/shop4.PNG') ?>" alt="Apple" class="brand-logo mx-3">
            <img src="<?= base_url('assets/images/brands/shop5.PNG') ?>" alt="LG" class="brand-logo mx-3">
            <img src="<?= base_url('assets/images/brands/shop6.PNG') ?>" alt="Sony" class="brand-logo mx-3">
            <img src="<?= base_url('assets/images/brands/shop3.PNG') ?>" alt="Nike" class="brand-logo mx-3">
            <img src="<?= base_url('assets/images/brands/shop4.PNG') ?>" alt="Apple" class="brand-logo mx-3">
            <img src="<?= base_url('assets/images/brands/shop5.PNG') ?>" alt="LG" class="brand-logo mx-3">
        </div>
    </div>
</div>

<!-- Footer -->
<section class=" p-5 brand-section">
    <div class="container-fluid">
        <!-- Tag Section -->
        <h2 class="mb-4">People are also looking for</h2>
        <div class="tags-container">
            <span>Blue diamond almonds</span>
            <span>Angie’s Boomchickapop Corn</span>
            <span>Salty kettle Corn</span>
            <span>Chobani Greek Yogurt</span>
            <span>Blue diamond almonds</span>
            <span>Angie’s Boomchickapop Corn</span>
            <span>Salty kettle Corn</span>
            <span>Chobani Greek Yogurt</span>
            <span>Sweet Vanilla Yogurt</span>
            <span>Foster Farms Takeout Crispy wings</span>
            <span>Warrior Blend Organic</span>
            <span>Chao Cheese Creamy</span>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>

<!-- JavaScript Countdown Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set the target countdown date
        const countdownDate = new Date();
        countdownDate.setDate(countdownDate.getDate() + 5);

        function updateCountdown() {
            const now = new Date();
            const timeLeft = countdownDate - now;

            if (timeLeft <= 0) {
                document.getElementById('countdown').innerHTML = "Offer Expired!";
                return;
            }

            const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

            // Update each span individually
            document.getElementById('days').innerText = String(days).padStart(2, '0');
            document.getElementById('hours').innerText = String(hours).padStart(2, '0');
            document.getElementById('minutes').innerText = String(minutes).padStart(2, '0');
            document.getElementById('seconds').innerText = String(seconds).padStart(2, '0');
        }

        // Initial call and update every second
        updateCountdown();
        setInterval(updateCountdown, 1000);
    });
</script>

<?= $this->endSection() ?>