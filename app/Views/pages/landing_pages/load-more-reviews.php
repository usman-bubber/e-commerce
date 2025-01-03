<div class="reviews-section">
    <?php
    if (isset($reviews) && !empty($reviews)) {
        // Loop through reviews and display them
        foreach ($reviews as $key => $val) {
            $images = isset($val['images']) && !empty($val['images']) ? json_decode($val['images'], true) : [];
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
                    <?php if (!empty($images)) { ?>
                        <div class="row">
                            <?php foreach ($images as $image) {
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
</div>