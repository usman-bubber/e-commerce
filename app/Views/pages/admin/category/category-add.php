<?= $this->extend('admin_template/layout') ?>
<?= $this->section('main_content') ?>
<style>
     .error-message {
          color: #dc3545;
     }
</style>
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
          <form action="<?= base_url('admin/store-category') ?>" method="POST" enctype="multipart/form-data">
               <!-- Cover Image Upload -->
               <div class="card p-3">
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
                                        <input type="text" id="category-title" name="title" class="form-control" placeholder="Enter Title">
                                        <p class="title-error"></p>
                                   </div>
                              </div>
                              <div class="col-lg-6">
                                   <div class="mb-3">
                                        <label for="meta-keywords" class="form-label">Meta Keywords<span class="required_show text-danger">*</span></label>
                                        <input type="text" id="meta-keywords" name="meta_keywords" class="form-control" placeholder="Enter Meta Keywords">
                                   </div>
                              </div>
                              <div class="col-lg-12">
                                   <div class="mb-0">
                                        <label for="description" class="form-label">Description<span class="required_show text-danger">*</span></label>
                                        <textarea class="form-control bg-light-subtle" id="description" name="description" rows="7" placeholder="Type description"></textarea>
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
                                        <textarea class="form-control bg-light-subtle" id="meta_description" name="meta_description" rows="7" placeholder="Type meta description"></textarea>
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
<script>
    // Get the input element and the preview image element
    const coverImageInput = document.getElementById('cover_image');
    const coverImagePreview = document.getElementById('coverImagePreview');

    // Event listener for the file input change event
    coverImageInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        
        // Check if a file was selected and if it's an image
        if (file && file.type.startsWith('image')) {
            const reader = new FileReader();
            
            // Once the file is read, update the image preview
            reader.onload = function(e) {
                coverImagePreview.src = e.target.result;
            };

            // Read the selected file as a data URL (this allows it to be displayed as an image)
            reader.readAsDataURL(file);
        } else {
            // If the file is not an image, you can reset the preview or show a default image
            coverImagePreview.src = '<?= base_url('assets/img/svg/panel_svg/upload_icon.svg') ?>';
        }
    });
</script>

<?= $this->endSection() ?>