<?= $this->extend('admin_template/layout') ?>
<?= $this->section('main_content') ?>
<style>
     .error-message {
          color: #dc3545;
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
</style>
<div class="container-xxl">
     <div class="row">
          <?php if (session()->get('success')) : ?>
               <div class="alert alert-success">
                    <p><?= session()->get('success') ?></p>
               </div>
          <?php endif; ?>
          <?php if (session()->get('fail')) : ?>
               <div class="alert alert-danger">
                    <p><?= session()->get('fail') ?></p>
               </div>
          <?php endif; ?>
          <?php
          if (!empty(session()->get('validation')) || !empty(session()->get('fieldErrors'))) {
               $validation = session()->get('validation');
               $fieldErrors = session()->get('fieldErrors');
          }
          ?>
          <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/save-edit-category/' . $category['id']) ?>">
               <!-- Cover Image Upload -->
               <div class="card p-3">
                    <div class="col-md-12 mb-4">
                         <label class="form-label passenger_form_label color_primary mb-1 fw-bold"> Edit Cover Image <span class="required_show">*</span></label>
                         <div class="image-upload-wrapper" id="coverImageUploadWrapper">
                              <div class="image-placeholder">
                                   <!-- Display old cover image or default -->
                                   <img src="<?= base_url('uploads/categories/' . $category['cover_image']) ?>" id="coverImagePreview" alt="Cover Image" class="upload-image" style="cursor: pointer;">
                              </div>
                              <input type="file" id="cover_image" name="cover_image" style="display: none;">
                              <!-- Store old cover image to submit if not updated -->
                              <input type="hidden" name="old_cover_image" value="<?= $category['cover_image'] ?>">
                         </div>
                         <p class="mt-2 text_small text_light mb-0">Note: Upload image of dimension 1440x573</p>
                    </div>
               </div>

               <!-- General Information -->
               <div class="card">
                    <div class="card-header">
                         <h4 class="card-title">General Information</h4>
                    </div>
                    <div class="card-body">
                         <div class="row">
                              <div class="col-lg-6">
                                   <div class="mb-3">
                                        <label for="category-title" class="form-label">Category Title<span class="required_show text-danger">*</span></label>
                                        <input type="text" id="category-title" name="title" class="form-control" placeholder="Enter Title" value="<?= old('title', $category['title']) ?>">
                                        <p class="title-error"></p>
                                   </div>
                              </div>
                              <div class="col-lg-6">
                                   <div class="mb-3">
                                        <label for="meta-keywords" class="form-label">Meta Keywords<span class="required_show text-danger">*</span></label>
                                        <input type="text" id="meta-keywords" name="meta_keywords" class="form-control" placeholder="Enter Meta Keywords" value="<?= old('meta_keywords', $category['meta_keywords']) ?>">
                                   </div>
                              </div>
                              <div class="col-lg-6">
                                   <div class="mb-3">
                                        <label for="meta-keywords" class="form-label">Status<span class="required_show text-danger">*</span></label>
                                        <select class="form-select bg-white" name="status">
                                             <option disabled>Select Category Status</option>
                                             <option value="active" <?= old('status', $category['status']) == 'active' ? 'selected' : '' ?>>Active</option>
                                             <option value="inactive" <?= old('status', $category['status']) == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                                        </select>
                                   </div>
                              </div>
                              <div class="col-lg-12">
                                   <div class="mb-0">
                                        <label for="description" class="form-label">Description<span class="required_show text-danger">*</span></label>
                                        <textarea class="form-control bg-light-subtle" id="description" name="description" rows="7" placeholder="Type description"><?= old('description', $category['description']) ?></textarea>
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
                              <div class="col-lg-12">
                                   <div class="mb-0">
                                        <label for="meta_description" class="form-label">Meta Description<span class="required_show text-danger">*</span></label>
                                        <textarea class="form-control bg-light-subtle" id="meta_description" name="meta_description" rows="7" placeholder="Type Meta Description"><?= old('meta_description', $category['meta_description']) ?></textarea>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>

               <!-- Action Buttons -->
               <div class="p-3 bg-light mb-3 rounded">
                    <div class="row justify-content-end g-2">
                         <div class="col-lg-2">
                              <button type="submit" class="btn btn-outline-secondary w-100">Save Change</button>
                         </div>
                         <div class="col-lg-2">
                              <a href="<?= base_url('admin/category-list') ?>" class="btn btn-primary w-100">Cancel</a>
                         </div>
                    </div>
               </div>
          </form>
     </div>
</div>
</div>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<script src="<?= base_url('assets/js/dropzone/custom_libs/images_upload.js') ?>"></script>
<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<!----- Custom Script for Dropzone ----->
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