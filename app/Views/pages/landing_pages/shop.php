<?= $this->extend('home_template/layout') ?>
<?= $this->section('main_content') ?>

<div class="container-fluid" style="padding: 20px;">
    <div class="row">
        <!-- Heading of the Shop -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <h4 style="font-weight: bold;">All Products</h4>
        </div>

        <!-- Sidebar -->
        <aside class="col-md-3" style="background-color: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); border: 1px solid #ddd; padding: 20px;">
            <h5 style="font-weight: bold; color: #6c757d;">Filters</h5>

            <!-- Search Bar -->
            <div style="margin-bottom: 15px;">
                <input type="text" class="form-control" placeholder="Search products..." style="width: 100%; padding: 10px;">
            </div>

            <!-- Category Dropdown -->
            <div style="margin-bottom: 15px;">
                <h6 style="font-weight: bold; color: #6c757d;">Categories</h6>
                <select style="width: 100%; padding: 10px;">
                    <option value="all">All Categories</option>
                    <option value="fashion">Fashion</option>
                    <option value="electronics">Electronics</option>
                    <option value="furniture">Furniture</option>
                    <option value="beauty">Beauty & Health</option>
                    <option value="footwear">Footwear</option>
                </select>
            </div>

            <!-- Price Range -->
            <div style="margin-bottom: 15px;">
                <h6 style="font-weight: bold; color: #6c757d;">Price Range</h6>
                <input type="range" min="0" max="200" step="1" style="width: 100%;">
                <div style="display: flex; justify-content: space-between;">
                    <span>$0</span>
                    <span>$200</span>
                </div>
            </div>

            <!-- Gender -->
            <div style="margin-bottom: 15px;">
                <h6 style="font-weight: bold; color: #6c757d;">Gender</h6>
                <div>
                    <input type="checkbox" id="men">
                    <label for="men">Men</label>
                </div>
                <div>
                    <input type="checkbox" id="women">
                    <label for="women">Women</label>
                </div>
                <div>
                    <input type="checkbox" id="kids">
                    <label for="kids">Kids</label>
                </div>
            </div>

            <!-- Size & Fit -->
            <div>
                <h6 style="font-weight: bold; color: #6c757d;">Size & Fit</h6>
                <div>
                    <input type="checkbox" id="small">
                    <label for="small">Small</label>
                </div>
                <div>
                    <input type="checkbox" id="medium">
                    <label for="medium">Medium</label>
                </div>
                <div>
                    <input type="checkbox" id="large">
                    <label for="large">Large</label>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="col-md-9" style="display: flex; flex-wrap: wrap; gap: 15px; padding: 10px;">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div style="flex: 1 1 calc(25% - 15px); max-width: calc(25% - 15px); display: flex; flex-direction: column; border: 1px solid #ddd; border-radius: 5px; overflow: hidden; background-color: white; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                        <a href="<?= base_url('product-detail/' . esc($product['id'])) ?>" style="text-decoration: none; color: inherit; display: flex; flex-direction: column; flex-grow: 1;">
                            <!-- Product Image -->
                            <div style="position: relative; height: 200px; flex-shrink: 0;">
                                <img src="<?= base_url('uploads/products/cover_images/' . esc($product['cover_image'])) ?>"
                                    style="width: 100%; height: 100%; object-fit: cover;">
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
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="text-align: center; width: 100%;">No products found.</p>
            <?php endif; ?>
        </main>

    </div>
</div>

<?= $this->endSection() ?>