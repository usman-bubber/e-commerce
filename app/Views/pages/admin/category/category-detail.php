<?= $this->extend('admin_template/layout') ?>
<?= $this->section('main_content') ?>
<div class="container-xxl">
     <div class="row">
          <!-- General Information -->
          <div class="card">
               <div class="card-header">
                    <h5 class="card-title">General Information</h5>
               </div>
               <div class="card-body">
                    <div class="row">
                         <h5 class="fw-bold">Title</h5>
                         <span class=" mb-3"><?= esc($category['title']) ?></span>
                    </div>
                    <div class="row">
                         <h5 class="fw-bold mb-3">Keywords</h5>
                         <span class=" mb-3"><?= esc($category['meta_keywords']) ?></span>
                    </div>
                    <div class="row">
                         <h5 class="fw-bold mb-3">Description</h5>
                         <span class=" mb-3"><?= esc($category['description']) ?></span>
                    </div>
               </div>
          </div>

          <!-- Meta Options -->
          <div class="card">
               <div class="card-header">
                    <h5 class="card-title">Meta Options</h5>
               </div>
               <div class="card-body">
                    <div class="row">
                         <h5 class="fw-bold mb-3">Meta Description</h5>
                         <span class=" mb-3"><?= esc($category['meta_description']) ?></span>
                    </div>
               </div>
          </div>
     </div>
</div>
</div>
<?= $this->endSection() ?>