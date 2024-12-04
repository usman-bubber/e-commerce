<?= $this->extend('admin_template/layout') ?>
<?= $this->section('main_content') ?>
<style>
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

     .upload-dropzone {
          border: 2px dashed #ccc;
          border-radius: 10px;
          padding: 20px;
          text-align: center;
          position: relative;
          background-color: #f9f9f9;
          width: 100%;
          max-width: 400px;
          margin: 20px auto;
          cursor: pointer;
          transition: border-color 0.3s ease;
     }

     .upload-dropzone:hover {
          border-color: #5a9;
     }

     .upload-input {
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          width: 100%;
          height: 100%;
          opacity: 0;
          cursor: pointer;
     }

     .dropzone-text {
          color: #777;
          font-size: 16px;
          font-family: Arial, sans-serif;
          margin-top: 10px;
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

               <form action="<?= base_url('admin/store-product') ?>" method="post" enctype="multipart/form-data">
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
                                             <label for="product-name" class="form-label">Product Name <span class="required_show text-danger">*</label>
                                             <input type="text" id="product-name" name="title" class="form-control" placeholder="Product Name" value="<?= old('title') ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-6">
                                        <label for="product-categories" class="form-label">Product Category <span class="required_show text-danger">*</label>
                                        <select class="form-control" id="product-categories" name="category_id" value="<?= old('category_id') ?>">
                                             <option disabled selected>Choose a category</option>
                                             <?php if (!empty($categories)): ?>
                                                  <?php foreach ($categories as $category): ?>
                                                       <option value="<?= esc($category['id']); ?>"><?= esc($category['title']); ?></option>
                                                  <?php endforeach; ?>
                                             <?php endif; ?>
                                        </select>
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col-lg-4">
                                        <div class="mb-3">
                                             <label for="product-brand" class="form-label">Brand</label>
                                             <input type="text" id="product-brand" name="brand_name" class="form-control" placeholder="Brand Name" value="<?= old('brand_name') ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-4">
                                        <div class="mb-3">
                                             <label for="product-weight" class="form-label">Weight</label>
                                             <input type="text" id="product-weight" name="weight" class="form-control" placeholder="In gm & kg" value="<?= old('weight') ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-4">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-control" id="gender" name="gender" value="<?= old('gender') ?>">
                                             <option selected disabled>Select Product Gender</option>
                                             <option value="male">Men</option>
                                             <option value="female">Women</option>
                                             <option value="unisex">Other</option>
                                        </select>
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col-lg-4">
                                        <div class="mb-3">
                                             <label for="product-stock" class="form-label">Stock Quantity</label>
                                             <input type="number" id="product-stock" name="stock" class="form-control" placeholder="Quantity" value="<?= old('stock') ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-4">
                                        <div class="mb-3">
                                             <label for="product-slug" class="form-label">Slug</label>
                                             <input type="text" id="product-slug" name="slug" class="form-control" placeholder="Slug" value="<?= old('slug') ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-4">
                                        <label for="product-tags" class="form-label">Tags</label>
                                        <div class="tags-input" id="tags-input">
                                             <input type="text" id="tag-input" class="form-control" placeholder="Add custom tag..." />
                                        </div>
                                        <input type="hidden" name="tags" id="tags" value="<?= old('tags') ?>">
                                   </div>
                              </div>
                              <div class="row mb-4">
                                   <!-- Size Colom -->
                                   <div class="col-lg-4">
                                        <div class="mt-3">
                                             <h5 class="text-dark fw-medium">Size :</h5>
                                             <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                                                  <input type="checkbox" class="btn-check" id="size-xs1" name="size[]" value="XS" value="<?= old('size[]') ?>">
                                                  <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-xs1">XS</label>

                                                  <input type="checkbox" class="btn-check" id="size-s1" name="size[]" value="S" value="<?= old('size[]') ?>">
                                                  <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-s1">S</label>

                                                  <input type="checkbox" class="btn-check" id="size-m1" name="size[]" value="M">
                                                  <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-m1">M</label>

                                                  <input type="checkbox" class="btn-check" id="size-xl1" name="size[]" value="XL">
                                                  <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-xl1">XL</label>

                                                  <input type="checkbox" class="btn-check" id="size-xxl1" name="size[]" value="XXL">
                                                  <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-xxl1">XXL</label>

                                                  <input type="checkbox" class="btn-check" id="size-3xl1" name="size[]" value="3XL">
                                                  <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-3xl1">3XL</label>
                                             </div>
                                        </div>
                                   </div>
                                   <!-- Color Field -->
                                   <div class="col-lg-5">
                                        <div class="mt-3">
                                             <h5 class="text-dark fw-medium">Colors :</h5>
                                             <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                                                  <input type="checkbox" class="btn-check" id="color-dark1" name="color[]" value="dark" value="<?= old('color[]') ?>">
                                                  <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-dark1">
                                                       <i class="bx bxs-circle fs-18 text-dark"></i>
                                                  </label>

                                                  <input type="checkbox" class="btn-check" id="color-yellow1" name="color[]" value="yellow" value="<?= old('color[]') ?>">
                                                  <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-yellow1">
                                                       <i class="bx bxs-circle fs-18 text-warning"></i>
                                                  </label>

                                                  <input type="checkbox" class="btn-check" id="color-white1" name="color[]" value="white">
                                                  <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-white1">
                                                       <i class="bx bxs-circle fs-18 text-white"></i>
                                                  </label>

                                                  <input type="checkbox" class="btn-check" id="color-red1" name="color[]" value="red">
                                                  <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-red1">
                                                       <i class="bx bxs-circle fs-18 text-primary"></i>
                                                  </label>

                                                  <!-- More colors can go here -->
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <!-- Description Row -->
                              <div class="row">
                                   <div class="col-lg-12">
                                        <div class="mb-3">
                                             <label for="description" class="form-label">Description</label>
                                             <textarea class="form-control" id="description" name="description" rows="7" placeholder="Short description about the product" value="<?= old('description') ?>"></textarea>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <!-- Price Detail Card -->
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
                                             <input type="number" id="product-price" name="price" class="form-control" placeholder="000" value="<?= old('price') ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-4">
                                        <label for="product-discount" class="form-label">Discount</label>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text"><i class='bx bxs-discount'></i></span>
                                             <input type="number" id="product-discount" name="discount" class="form-control" placeholder="000" value="<?= old('discount') ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-4">
                                        <label for="product-tax" class="form-label">Tax</label>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text"><i class='bx bxs-file-txt'></i></span>
                                             <input type="number" id="product-tax" name="tax" class="form-control" placeholder="000" value="<?= old('tax') ?>">
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
                                             <input type="text" id="meta-keywords" name="meta_keywords" class="form-control" placeholder="Enter Meta Keywords" value="<?= old('meta_keywords') ?>">
                                        </div>
                                   </div>
                                   <div class="col-lg-12">
                                        <div class="mb-0">
                                             <label for="meta_description" class="form-label">Meta Description<span class="required_show text-danger">*</span></label>
                                             <textarea class="form-control" id="meta_description" name="meta_description" rows="7" placeholder="Type meta description" value="<?= old('meta_description') ?>"></textarea>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <!-- Product images section  -->
                    <div class="card">
                         <!-- Heading -->
                         <div class="card-header">
                              <h4 class="card-title">Add Product Photo</h4>
                         </div>

                         <!-- File Upload Section -->
                         <div class="card-body">
                              <!-- Cover Image Upload -->
                              <div class="col-md-12 mb-4">
                                   <label class="form-label passenger_form_label color_primary mb-1">
                                        Cover Image <span class="required_show">*</span>
                                   </label>
                                   <div class="image-upload-wrapper" id="coverImageUploadWrapper">
                                        <div class="image-placeholder">
                                             <img src="<?= base_url('assets/images/svg/panel_svg/upload_icon.svg') ?>" id="coverImagePreview" alt="Cover Image Preview" class="upload-image">
                                        </div>
                                        <input type="file" id="cover_image" name="cover_image" class="upload-input" accept="image/*">
                                   </div>
                                   <p class="mt-2 text_small text_light mb-0">
                                        Note: Upload image of dimension 1440x573
                                   </p>
                              </div>

                              <!-- Product Images Upload -->
                              <div class="row p-3">
                                   <label class="fw-bold form-label passenger_form_label color_primary mb-2">
                                        Product Images <span class="required_show text-danger">*</span>
                                   </label>
                                   <?php for ($i = 1; $i <= 4; $i++) : ?>
                                        <div class="col-lg-3 col-md-6 mb-2">
                                             <div class="image-upload-wrapper">
                                                  <div class="image-placeholder">
                                                       <img src="<?= base_url('assets/images/svg/panel_svg/add_orange.svg') ?>" id="productImagePreview<?= $i ?>" alt="Product Image Preview" class="upload-image">
                                                  </div>
                                                  <input type="file" id="product_image_<?= $i ?>" name="product_images[]" class="upload-input" accept="image/*">
                                             </div>
                                        </div>
                                   <?php endfor; ?>
                              </div>

                              <p class="mt-2 mb-0 text_small text_light">
                                   <span class="text-primary">Note: </span>Upload at least one image of dimension 500x500
                              </p>
                         </div>
                    </div>

                    <!-- buttons -->
                    <div class="p-3 bg-light mb-3 rounded">
                         <div class="row justify-content-end g-2">
                              <div class="col-lg-2">
                                   <button type="submit" class="btn btn-outline-secondary w-100">Create Product</button>
                              </div>
                              <div class="col-lg-2">
                                   <a href="<?= base_url('admin/product-list') ?>" class="btn btn-primary w-100">Cancel</a>
                              </div>
                         </div>
                    </div>
               </form>
          </div>
     </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<!-- Custom Tags script  -->
<script>
     document.addEventListener('DOMContentLoaded', function() {
          const tagsInput = document.getElementById('tags-input');
          const tagInput = document.getElementById('tag-input');
          const tagsField = document.getElementById('tags');

          tagInput.addEventListener('keydown', function(e) {
               if (e.key === 'Enter') {
                    e.preventDefault(); // Prevent form submission on Enter

                    const tagValue = this.value.trim();
                    if (tagValue) {
                         addTag(tagValue);
                         this.value = ''; // Clear input after adding
                    }
               }
          });

          function addTag(tagValue) {
               const tag = document.createElement('div');
               tag.className = 'tag';
               tag.textContent = tagValue;

               // Create remove button
               const removeButton = document.createElement('button');
               removeButton.textContent = 'x';
               removeButton.onclick = function() {
                    tagsInput.removeChild(tag); // Remove tag on button click
                    updateTagsField(); // Update hidden input field
               };
               tag.appendChild(removeButton);
               tagsInput.insertBefore(tagInput, tagsInput.lastChild); // Keep the input at the end
               tagsInput.insertBefore(tag, tagInput); // Add the new tag before the input

               updateTagsField(); // Update hidden input field
          }

          function updateTagsField() {
               const tags = Array.from(tagsInput.querySelectorAll('.tag')).map(tag => tag.textContent.slice(0, -1)); // Remove button text
               tagsField.value = tags.join(','); // Update the hidden input
          }
     });
</script>
<!-- Custom Script for insert product image  -->
<script>
     document.addEventListener("DOMContentLoaded", function() {
          // Handle cover image preview
          const coverImageInput = document.getElementById('cover_image');
          const coverImagePreview = document.getElementById('coverImagePreview');

          coverImagePreview.addEventListener('click', function() {
               coverImageInput.click();
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
                              productImagePreview.src = e.target.result; // Update preview
                         };
                         reader.readAsDataURL(file);
                    }
               });
          }
     });
</script>
<?= $this->endSection() ?>