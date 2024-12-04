<?= $this->extend('admin_template/layout') ?>
<?= $this->section('main_content') ?>
<style>
     /* General Styling */
     .tags-input {
          display: flex;
          flex-wrap: wrap;
          border: 1px solid #ccc;
          border-radius: 8px;
          padding: 4px;
          gap: 5px;
          min-height: 40px;
     }

     .tag {
          background-color: orange;
          color: white;
          border-radius: 3px;
          padding: 4px 8px;
          display: flex;
          align-items: center;
          font-size: 14px;
     }

     .tag button {
          margin-left: 5px;
          background: none;
          border: none;
          color: white;
          cursor: pointer;
          font-size: 14px;
          padding: 0;
          line-height: 1;
     }

     #tag-input {
          border: none;
          outline: none;
          flex-grow: 1;
          min-width: 100px;
          font-size: 14px;
          padding: 4px;
     }

     #tag-input::placeholder {
          color: #aaa;
     }

     /* Image Upload Styling */
     .image-upload-wrapper {
          position: relative;
          border: 2px dashed burlywood;
          border-radius: 10px;
          padding: 20px;
          text-align: center;
          transition: background-color 0.3s ease;
          cursor: pointer;
     }

     .image-upload-wrapper:hover {
          background-color: #f8f9fa;
     }

     .image-placeholder {
          display: flex;
          justify-content: center;
          align-items: center;
          height: 150px;
          width: 100%;
          border-radius: 8px;
     }

     .upload-image {
          width: 100px;
          height: 100px;
          object-fit: cover;
          cursor: pointer;
     }

     .image-placeholder img {
          width: 100px;
          height: 100px;
     }

     .card {
          box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
          border-radius: 10px;
          transition: transform 0.3s ease;
     }

     .card:hover {
          transform: translateY(-5px);
     }

     .required_show {
          font-weight: bold;
     }

     .text_small {
          font-size: 12px;
     }
</style>
<div class="container-xxl">
     <div class="row">
          <div class="col-xl-12 col-lg-8 ">
               <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success">
                         <p><?= esc(session()->get('success')) ?></p>
                    </div>
               <?php endif; ?>

               <?php if (session()->get('fail')) : ?>
                    <div class="alert alert-danger">
                         <p><?= esc(session()->get('fail')) ?></p>
                    </div>
               <?php endif; ?>

               <?php if (session()->get('validation')) : ?>
                    <div class="alert alert-danger">
                         <ul>
                              <?php foreach (session()->get('validation') as $error) : ?>
                                   <li><?= esc($error) ?></li>
                              <?php endforeach; ?>
                         </ul>
                    </div>
               <?php endif; ?>
               <form action="<?= base_url('admin/save-edit-product/' . $product['id']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <!-- Product Information Card -->
                    <div class="card">
                         <div class="card-header">
                              <h4 class="card-title">Product Information</h4>
                         </div>
                         <div class="card-body">
                              <div class="row">
                                   <div class="col-lg-6">
                                        <div class="mb-3">
                                             <label for="product-name" class="form-label">Product Name <span class="required_show text-danger">*</span></label>
                                             <input type="text" id="product-name" name="title" class="form-control" placeholder="Product Name" value="<?= old('title', $product['title']) ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-6">
                                        <label for="product-categories" class="form-label">Product Category <span class="required_show text-danger">*</span></label>
                                        <select class="form-control" id="product-categories" name="category_id">
                                             <option disabled selected>Choose a category</option>
                                             <?php if (!empty($categories)): ?>
                                                  <?php foreach ($categories as $category): ?>
                                                       <option value="<?= esc($category['id']); ?>" <?= $category['id'] == $product['category_id'] ? 'selected' : '' ?>>
                                                            <?= esc($category['title']); ?>
                                                       </option>
                                                  <?php endforeach; ?>
                                             <?php endif; ?>
                                        </select>
                                   </div>
                              </div>

                              <!-- Other Product Information Fields (Brand, Weight, Gender, Stock, Slug, Tags) -->
                              <div class="row">
                                   <div class="col-lg-4">
                                        <div class="mb-3">
                                             <label for="product-brand" class="form-label">Brand</label>
                                             <input type="text" id="product-brand" name="brand_name" class="form-control" placeholder="Brand Name" value="<?= old('brand_name', $product['brand_name']) ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-4">
                                        <div class="mb-3">
                                             <label for="product-weight" class="form-label">Weight</label>
                                             <input type="text" id="product-weight" name="weight" class="form-control" placeholder="In gm & kg" value="<?= old('weight', $product['weight']) ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-4">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-control" id="gender" name="gender">
                                             <option selected disabled>Select Product Gender</option>
                                             <option value="male" <?= $product['gender'] == 'male' ? 'selected' : '' ?>>Men</option>
                                             <option value="female" <?= $product['gender'] == 'female' ? 'selected' : '' ?>>Women</option>
                                             <option value="unisex" <?= $product['gender'] == 'unisex' ? 'selected' : '' ?>>Other</option>
                                        </select>
                                   </div>
                              </div>

                              <!-- Stock, Slug, Tags -->
                              <div class="row">
                                   <div class="col-lg-4">
                                        <div class="mb-3">
                                             <label for="product-stock" class="form-label">Stock Quantity</label>
                                             <input type="number" id="product-stock" name="stock" class="form-control" placeholder="Quantity" value="<?= old('stock', $product['stock']) ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-4">
                                        <div class="mb-3">
                                             <label for="product-slug" class="form-label">Slug</label>
                                             <input type="text" id="product-slug" name="slug" class="form-control" placeholder="Slug" value="<?= old('slug', $product['slug']) ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-4">
                                        <label for="product-tags" class="form-label">Tags</label>
                                        <input type="text" id="tags" name="tags" class="form-control" placeholder="Add tags" value="<?= old('tags', $product['tags']) ?>">
                                   </div>
                              </div>

                              <!-- Sizes and Colors -->
                              <div class="row mb-4">
                                   <div class="col-lg-4">
                                        <h5 class="text-dark fw-medium">Size :</h5>
                                        <div class="d-flex flex-wrap gap-2">
                                             <?php
                                             $sizes = explode(',', $product['size']);
                                             $availableSizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL', '3XL'];
                                             foreach ($availableSizes as $size) {
                                                  echo '<input type="checkbox" class="btn-check" id="size-' . $size . '" name="size[]" value="' . $size . '" ' . (in_array($size, $sizes) ? 'checked' : '') . '>';
                                                  echo '<label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-' . $size . '">' . $size . '</label>';
                                             }
                                             ?>
                                        </div>
                                   </div>

                                   <div class="col-lg-5">
                                        <h5 class="text-dark fw-medium">Colors :</h5>
                                        <div class="d-flex flex-wrap gap-2">
                                             <?php
                                             $colors = explode(',', $product['color']);
                                             $availableColors = ['dark', 'yellow', 'white', 'red'];
                                             foreach ($availableColors as $color) {
                                                  echo '<input type="checkbox" class="btn-check" id="color-' . $color . '" name="color[]" value="' . $color . '" ' . (in_array($color, $colors) ? 'checked' : '') . '>';
                                                  echo '<label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-' . $color . '">
                                        <i class="bx bxs-circle fs-18 text-' . $color . '"></i></label>';
                                             }
                                             ?>
                                        </div>
                                   </div>
                              </div>

                              <!-- Description -->
                              <div class="row">
                                   <div class="col-lg-12">
                                        <div class="mb-3">
                                             <label for="description" class="form-label">Description</label>
                                             <textarea class="form-control" id="description" name="description" rows="7" placeholder="Short description about the product"><?= old('description', $product['description']) ?></textarea>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <!-- Pricing Details -->
                    <div class="card">
                         <div class="card-header">
                              <h4 class="card-title">Pricing Details</h4>
                         </div>
                         <div class="card-body">
                              <div class="row">
                                   <div class="col-lg-4">
                                        <label for="product-price" class="form-label">Price</label>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text"><i class='bx bx-dollar'></i></span>
                                             <input type="number" id="product-price" name="price" class="form-control" placeholder="000" value="<?= old('price', $product['price']) ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-4">
                                        <label for="product-discount" class="form-label">Discount</label>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text"><i class='bx bxs-discount'></i></span>
                                             <input type="number" id="product-discount" name="discount" class="form-control" placeholder="000" value="<?= old('discount', $product['discount']) ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-4">
                                        <label for="product-tax" class="form-label">Tax</label>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text"><i class='bx bxs-file-txt'></i></span>
                                             <input type="number" id="product-tax" name="tax" class="form-control" placeholder="000" value="<?= old('tax', $product['tax']) ?>">
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <!-- Meta Options -->
                    <div class="card">
                         <div class="card-header">
                              <h4 class="card-title">Meta Options</h4>
                         </div>
                         <div class="card-body">
                              <div class="row">
                                   <div class="col-lg-6">
                                        <div class="mb-3">
                                             <label for="meta-keywords" class="form-label">Meta Keywords<span class="required_show text-danger">*</span></label>
                                             <input type="text" id="meta-keywords" name="meta_keywords" class="form-control" placeholder="Enter Meta Keywords" value="<?= old('meta_keywords', $product['meta_keywords']) ?>">
                                        </div>
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col-lg-12">
                                        <div class="mb-3">
                                             <label for="meta-description" class="form-label">Meta Description<span class="required_show text-danger">*</span></label>
                                             <textarea class="form-control" id="meta-description" name="meta_description" rows="7" placeholder="Enter Meta Description"><?= old('meta_description', $product['meta_description']) ?></textarea>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <!-- Product images section  -->
                    <div class="card">
                         <!-- Heading -->
                         <div class="card-header">
                              <h4 class="card-title">Edit Product Photo</h4>
                         </div>

                         <!-- File Upload Section -->
                         <div class="card-body">
                              <!-- Cover Image Upload -->
                              <div class="col-md-12 mb-4">
                                   <label class="form-label passenger_form_label color_primary mb-1">Cover Image <span class="required_show">*</span></label>
                                   <div class="image-upload-wrapper" id="coverImageUploadWrapper">
                                        <div class="image-placeholder">
                                             <!-- Display old cover image or default -->
                                             <img src="<?= base_url('uploads/products/cover_images/' . $product['cover_image']) ?>" id="coverImagePreview" alt="Cover Image" class="upload-image" style="cursor: pointer;">
                                        </div>
                                        <input type="file" id="cover_image" name="cover_image" style="display: none;">
                                        <!-- Store old cover image to submit if not updated -->
                                        <input type="hidden" name="old_cover_image" value="<?= $product['cover_image'] ?>">
                                   </div>
                                   <p class="mt-2 text_small text_light mb-0">Note: Upload image of dimension 1440x573</p>
                              </div>

                              <!-- Product Images Upload -->
                              <div class="row p-3">
                                   <label class="fw-bold form-label passenger_form_label color_primary mb-2">Product Images <span class="required_show text-danger">*</span></label>
                                   <?php
                                   $product_images = explode(',', $product['images']); // Split product images from database
                                   for ($i = 0; $i < 4; $i++) :
                                        $image = isset($product_images[$i]) ? $product_images[$i] : 'assets/img/svg/panel_svg/add_orange.svg'; // Use default if no image
                                   ?>
                                        <div class="col-lg-3 col-md-6 mb-2">
                                             <div class="image-upload-wrapper">
                                                  <div class="image-placeholder">
                                                       <!-- Display old product images or default -->
                                                       <img src="<?= base_url($image != 'assets/img/svg/panel_svg/add_orange.svg' ? 'uploads/products/images/' . $image : $image) ?>" id="productImagePreview<?= $i + 1 ?>" alt="Product Image Preview" class="upload-image" style="cursor: pointer;">
                                                  </div>
                                                  <input type="file" id="product_image_<?= $i ?>" name="product_images[]" class="upload-input" accept="image/*" style="display: none;">

                                                  <!-- <input type="file" id="product_image_<?= $i + 1 ?>" name="product_images[]" class="upload-input" accept="image/*" style="display: none;"> -->
                                                  <!-- Store old product images to submit if not updated -->
                                                  <input type="hidden" name="product_images[]" value="<?= $image ?>">
                                             </div>
                                        </div>
                                   <?php endfor; ?>
                              </div>

                              <p class="mt-2 mb-0 text_small text_light"><span class="text-primary">Note: </span>Upload at least one image of dimension 500x500</p>
                         </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="d-flex justify-content-end">
                         <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
               </form>
          </div>
     </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<!-- Custom Tags script  -->
<script>
     document.addEventListener("DOMContentLoaded", function() {
          // Handle cover image preview
          const coverImageInput = document.getElementById('cover_image');
          const coverImagePreview = document.getElementById('coverImagePreview');

          coverImagePreview.addEventListener('click', function() {
               coverImageInput.click(); // Trigger file input click
          });

          coverImageInput.addEventListener('change', function(event) {
               const file = event.target.files[0];
               if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                         coverImagePreview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
               }
          });

          // Handle product images preview
          for (let i = 1; i <= 4; i++) {
               let productImagePreview = document.getElementById('productImagePreview' + i);
               let productImageInput = document.getElementById('product_image_' + i);

               productImagePreview.addEventListener('click', function() {
                    productImageInput.click(); // Trigger file input click
               });

               productImageInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                         const reader = new FileReader();
                         reader.onload = function(e) {
                              productImagePreview.src = e.target.result;
                         };
                         reader.readAsDataURL(file);
                    }
               });
          }
     });
</script>
<?= $this->endSection() ?>