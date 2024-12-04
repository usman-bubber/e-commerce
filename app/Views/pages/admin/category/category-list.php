<?= $this->extend('admin_template/layout') ?>
<?= $this->section('main_content') ?>
<!-- custom CSS -->
<style>
     .carousel-item {
          transition: transform 3s ease;
     }

     .carousel-inner {
          display: flex;
          flex-wrap: nowrap;
     }

     .carousel-item {
          flex: 0 0 100%;
     }
</style>
<div class="container-fluid mt-3">
     <!-- Table of All Categories  -->
     <div class="row">
          <div class="col-xl-12">
               <div class="card">
                    <!-- Heading -->
                    <div class="card-header d-flex justify-content-between align-items-center gap-1">
                         <h4 class="card-title flex-grow-1">All Category List</h4>
                    </div>
                    <!-- Filters -->
                    <div class="card">
                         <div class="card-header">
                              <div class="row justify-content-between align-items-center">
                                   <!-- Breadcrumb and Total Items -->
                                   <div class="col-lg-3">
                                        <ol class="breadcrumb mb-0">
                                             <li class="breadcrumb-item">
                                                  <a href="#" class="fw-bold text-primary">Categories</a>
                                             </li>
                                             <li class="breadcrumb-item active" aria-current="page">All Categories</li>
                                        </ol>
                                        <p class="mb-0 text-muted mt-2">
                                             Showing all <span class="text-dark fw-semibold"><?= esc($total_items) ?></span> items.
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
                                        <a href="<?= base_url('admin/add-category') ?>" class="btn btn-primary">Add Category</a>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <?php if (session()->get('success')) : ?>
                         <div class="alert alert-success" id="successAlert">
                              <p><?= session()->get('success') ?></p>
                         </div>
                    <?php endif; ?>
                    <?php if (session()->get('fail')) : ?>
                         <div class="alert alert-danger" id="failAlert">
                              <p><?= session()->get('fail') ?></p>
                         </div>
                    <?php endif; ?>
                    <?php
                    if (!empty(session()->get('validation')) || !empty(session()->get('fieldErrors'))) {
                         $validation = session()->get('validation');
                         $fieldErrors = session()->get('fieldErrors');
                    }
                    ?>

                    <!-- Table -->
                    <div class="table-responsive">
                         <table class="table align-middle mb-0 table-hover table-centered">
                              <thead class="bg-light-subtle">
                                   <tr class="text-center">
                                        <th style="width: 20px;">Sr.#</th>
                                        <th>Cover Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php if (!empty($categories) && is_array($categories)): ?>
                                        <?php foreach ($categories as $category): ?>
                                             <tr>
                                                  <td class="text-center"><?= $category['sequence_number'] ?></td>
                                                  <td>
                                                       <div class="d-flex align-items-center gap-2">
                                                            <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                                 <img src="<?= base_url('uploads/categories/' . esc($category['cover_image'])) ?>" alt="" class="avatar-md">
                                                            </div>
                                                       </div>
                                                  </td>
                                                  <td><?= esc($category['category_title']) ?></td>
                                                  <td><?= esc(substr($category['description'], 0, 70)) ?>...</td>
                                                  <td><?= esc($category['role_name']) ?></td>
                                                  <td><?= esc($category['status']) ?></td>

                                                  <td>
                                                       <div class="d-flex justify-content-center">
                                                            <a href="<?= base_url('admin/category-detail/' . esc($category['id'])) ?>" class="btn role_action_btn tooltip-left" data-tooltip="view">
                                                                 <img src="<?= base_url('assets/images/svg/eye_icon.svg') ?>" alt="">
                                                            </a>
                                                            <a href="<?= base_url('admin/edit-category/' . esc($category['id'])) ?>" class="btn role_action_btn ms-1 tooltip-left" data-tooltip="Edit">
                                                                 <img src="<?= base_url('assets/images/svg/edit_icon.svg') ?>" alt="">
                                                            </a>
                                                       </div>
                                                  </td>
                                             </tr>
                                        <?php endforeach; ?>
                                   <?php else: ?>
                                        <tr id="noResults">
                                             <td colspan="7" class="text-center">No categories available.</td>
                                        </tr>
                                   <?php endif; ?>
                                   <!-- No results found row -->
                                   <tr id="noRecords" style="display: none;">
                                        <td colspan="7" class="text-center">No records found matching your search criteria.</td>
                                   </tr>
                              </tbody>
                         </table>
                    </div>
                    <!-- Pagination -->
                    <div id="userspagination" class="mt-4 d-flex justify-content-center">
                         <?= $pager_links ?>
                    </div>
               </div>
          </div>
     </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<!-- // Initialize the carousel with auto-slide and disable pause on hover -->
<script>
     var carouselElement = document.querySelector('#categoryCarousel');
     var carousel = new bootstrap.Carousel(carouselElement, {
          interval: 3000, // 3 seconds
          ride: 'carousel',
          pause: 'false' // Note: use 'false' as a string
     });
</script>
<!-- Confirm before delete any category  -->
<script type="text/javascript">
     function confirmDeleteCategory() {
          return confirm('Are you sure you want to delete this category?');
     }
</script>
<!-- search table  -->
<script>
     $(document).ready(function() {
          function filterTable() {
               let title = $('#searchTitle').val().toLowerCase();
               let status = $('#searchStatus').val().toLowerCase();
               let visibleRows = 0;

               $('tbody tr').each(function() {
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
          $('#searchTitle, #searchStatus').on('keyup', function() {
               filterTable();
          });

          // Reset filters on button click
          $('#resetFilters').on('click', function() {
               $('#searchTitle').val(''); // Clear title search input
               $('#searchStatus').val(''); // Clear status search input
               filterTable(); // Reset the table to show all records
          });
     });
</script>
<!-- // Function to hide alert messages after 5 seconds -->
<script>
     function hideAlerts() {
          const successAlert = document.getElementById('successAlert');
          const failAlert = document.getElementById('failAlert');

          if (successAlert) {
               setTimeout(function() {
                    successAlert.style.display = 'none';
               }, 5000); // 5000ms = 5 seconds
          }

          if (failAlert) {
               setTimeout(function() {
                    failAlert.style.display = 'none';
               }, 5000); // 5000ms = 5 seconds
          }
     }

     // Call the function on page load if alerts are present
     window.onload = hideAlerts;
</script>

<?= $this->endSection() ?>