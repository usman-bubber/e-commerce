<?= $this->extend('admin_template/layout') ?>
<?= $this->section('main_content') ?>
<div class="container-xxl">
     <div class="card overflow-hiddenCoupons">
          <!-- Heading -->
          <div class="card-header d-flex justify-content-between align-items-center gap-1">
               <h4 class="card-title flex-grow-1">All Roles List</h4>
          </div>
          <!-- Filters -->
          <div class="card">
               <div class="card-header border-0">
                    <div class="row justify-content-between align-items-center">
                         <!-- Breadcrumb and Total Items -->
                         <div class="col-lg-3">
                              <ol class="breadcrumb mb-0">
                                   <li class="breadcrumb-item">
                                        <a href="#" class="fw-bold text-primary">User Roles</a>
                                   </li>
                                   <li class="breadcrumb-item active" aria-current="page">All Roles</li>
                              </ol>
                              <p class="mb-0 text-muted">
                                   Showing all <span class="text-dark fw-semibold"><?= esc($total_items) ?></span> roles.
                              </p>
                         </div>

                         <!-- Search Fields -->
                         <div class="col-lg-7 d-flex justify-content-center">
                              <input type="text" id="searchTitle" class="form-control me-3" placeholder="Search by title">
                              <input type="text" id="searchStatus" class="form-control" placeholder="Search by status">
                              <!-- <button id="resetFilters" class="btn btn-outline-secondary w-50 ms-3 border-">Reset</button> -->
                         </div>

                         <!-- Add New Category Button -->
                         <div class="col-lg-2 text-lg-end text-center mt-3 mt-lg-0">
                              <a href="<?= base_url('admin/add-role') ?>" class="btn btn-primary">Add Role</a>
                         </div>
                    </div>
               </div>
          </div>
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
          <div class="card-body p-0">
               <div class="table-responsive">
                    <table class="table align-middle mb-0 table-hover table-centered">
                         <thead class="bg-light-subtle">
                              <tr class="text-center">
                                   <th>Sr.#</th>
                                   <th>Title</th>
                                   <th>Description</th>
                                   <th>Created At</th>
                                   <th>Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php if (!empty($roles) && is_array($roles)): ?>
                                   <?php foreach ($roles as $value): ?>
                                        <tr class="text-center">
                                             <td class="text-center"><?= $value['sequence_number'] ?></td>
                                             <td><?= esc($value['title']) ?></td>
                                             <td><?= esc($value['description']) ?></td>
                                             <td><?= esc($value['created_at']) ?></td>
                                             <td>
                                                  <div class="d-flex gap-2">
                                                       <!-- view file link -->
                                                       <a href="<?= base_url('admin/role-detail/' . esc($value['id'])) ?>" class="btn btn-light btn-sm">
                                                            <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                                       </a>
                                                       <!-- edit file link  -->
                                                       <a href="<?= base_url('admin/edit-role/' . esc($value['id'])) ?>" class="btn btn-soft-primary btn-sm">
                                                            <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                                       </a>
                                                       <!-- Delete value link with confirmation -->
                                                       <a href="<?= base_url('admin/delete-role/' . esc($value['id'])) ?>"
                                                            class="btn btn-soft-danger btn-sm"
                                                            onclick="return confirmDeletevalue();">
                                                            <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                                       </a>
                                                  </div>
                                             </td>
                                        </tr>
                                   <?php endforeach; ?>
                              <?php else: ?>
                                   <tr id="noResults">
                                        <td colspan="7" class="text-center">No role available.</td>
                                   </tr>
                              <?php endif; ?>
                              <!-- No results found row -->
                              <tr id="noRecords" style="display: none;">
                                   <td colspan="7" class="text-center">No records found matching your search criteria.</td>
                              </tr>
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
<script type="text/javascript">
     function confirmDeleteCategory() {
          return confirm('Are you sure you want to delete this category?');
     }
</script>
<script>
    $(document).ready(function () {
        function filterTable() {
            let title = $('#searchTitle').val().toLowerCase();
            let status = $('#searchStatus').val().toLowerCase();
            let visibleRows = 0;

            $('tbody tr').each(function () {
                let rowTitle = $(this).find('td:eq(2)').text().toLowerCase(); // Title column
                let rowStatus = $(this).find('td:eq(5)').text().toLowerCase(); // Status column

                // Show row if it matches the search criteria
                if ((rowTitle.includes(title) || title === '') && (rowStatus.includes(status) || status === '')) {
                    $(this).show();
                    visibleRows++; // Count visible rows
                } else {
                    $(this).hide();
                }
            });

            // Show or hide the "No records found" message
            if (visibleRows === 0) {
                $('#noRecords').show(); // Show no records message
            } else {
                $('#noRecords').hide(); // Hide no records message
            }
        }

        // Trigger the filter function on keyup events in the search fields
        $('#searchTitle, #searchStatus').on('keyup', function () {
            filterTable();
        });

        // Reset filters on button click
        $('#resetFilters').on('click', function () {
            $('#searchTitle').val(''); // Clear title search input
            $('#searchStatus').val(''); // Clear status search input
            filterTable(); // Reset the table to show all records
        });
    });
</script>

<?= $this->endSection() ?>