<?= $this->extend('admin_template/layout') ?>
<?= $this->section('main_content') ?>
<div class="container-xxl">
     <div class="card overflow-hiddenCoupons">
          <!-- Heading -->
          <div class="card-header d-flex justify-content-between align-items-center gap-1">
               <h4 class="card-title flex-grow-1">All Review List</h4>
          </div>
          <!-- Filters -->
          <div class="card bg-light-subtle">
               <div class="card-header border-0">
                    <div class="row justify-content-between align-items-center">
                         <div class="col-lg-10">
                              <input type="text" class="btn btn-outline-secondary mr-3" placeholder="search by order ID">
                              <input type="text" class="btn btn-outline-secondary mr-3" placeholder="search by username">
                              <input type="text" class="btn btn-outline-secondary mr-3" placeholder="search by payment status">
                              <input type="text" class="btn btn-outline-secondary mr-3" placeholder="search by payment status">
                         </div>
                         <div class="col-lg-2">
                              <div class="text-md-end mt-3 mt-md-0">
                                   <a href="<?= base_url('admin/add-review') ?>" class="btn btn-success me-1"><i class="bx bx-plus"></i> Add Review </a>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="card-body p-0">
               <div class="table-responsive">
                    <table class="table align-middle mb-0 table-hover table-centered">
                         <thead class="bg-light-subtle">
                              <tr class="text-center">
                                   <th>Sr#</th>
                                   <th>Product Title</th>
                                   <th>Review ID</th>
                                   <th>Rating</th>
                                   <th>Message</th>
                                   <th>Date</th>
                                   <th>Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php if (!empty($reviews)) : ?>
                                   <?php foreach ($reviews as $review) : ?>
                                        <tr>
                                             <td><?= esc($review['sequence_number']) ?></td>
                                             <td><?= esc($review['product_title'] ?? 'N/A') ?></td>
                                             <td><?= esc($review['name']) ?></td>
                                             <td><?= esc($review['rating']) ?></td>
                                             <td><?= esc($review['message']) ?></td>
                                             <td><?= !empty($review['created_at']) ? date('d M Y', strtotime($review['created_at'])) : 'N/A'; ?></td>
                                             <td>
                                                  <div class="d-flex gap-2">
                                                       <a href="<?= base_url('admin/role-detail') ?>" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="<?= base_url('admin/edit-role') ?>" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="<?= base_url('admin/role-detail') ?>" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  </div>
                                             </td>
                                        </tr>
                                   <?php endforeach; ?>
                              <?php else : ?>
                                   <tr>
                                        <td colspan="7">No reviews found.</td>
                                   </tr>
                              <?php endif; ?>
                         </tbody>
                    </table>
               </div>
          </div>
          <div class="row g-0 align-items-center justify-content-between text-center text-sm-start p-3 border-top">
               <div class="col-sm">
                    <div class="text-muted">
                         Showing <span class="fw-semibold">10</span> of <span class="fw-semibold">59</span> Results
                    </div>
               </div>
               <div class="col-sm-auto mt-3 mt-sm-0">
                    <ul class="pagination  m-0">
                         <li class="page-item">
                              <a href="#" class="page-link"><i class='bx bx-left-arrow-alt'></i></a>
                         </li>
                         <li class="page-item active">
                              <a href="#" class="page-link">1</a>
                         </li>
                         <li class="page-item">
                              <a href="#" class="page-link">2</a>
                         </li>
                         <li class="page-item">
                              <a href="#" class="page-link">3</a>
                         </li>
                         <li class="page-item">
                              <a href="#" class="page-link"><i class='bx bx-right-arrow-alt'></i></a>
                         </li>
                    </ul>
               </div>
          </div>
     </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<?= $this->endSection() ?>