<?= $this->extend('admin_template/layout') ?>
<?= $this->section('main_content') ?>
<div class="container-fluid">
     <div class="row">
          <div class="col-xl-12">
               <div class="card">
                    <!-- Heading -->
                    <div class="card-header d-flex justify-content-between align-items-center gap-1">
                         <h4 class="card-title flex-grow-1">All Products List</h4>
                    </div>
                    <!-- Filters -->
                    <div class="card">
                         <div class="card-header border-0">
                              <div class="row justify-content-between align-items-center">
                                   <!-- Breadcrumb and Total Items -->
                                   <div class="col-lg-3">
                                        <ol class="breadcrumb mb-0">
                                             <li class="breadcrumb-item">
                                                  <a href="#" class="fw-bold text-primary">Products</a>
                                             </li>
                                             <li class="breadcrumb-item active" aria-current="page">All Products</li>
                                        </ol>
                                        <p class="mb-0 text-muted">
                                             Showing all <span class="text-dark fw-semibold"><?= esc($total_items) ?></span> items.
                                        </p>
                                   </div>

                                   <!-- Search Fields -->
                                   <div class="col-lg-7 d-flex justify-content-center">
                                        <input type="text" id="searchTitle" class="form-control me-3" placeholder="Search by title">
                                        <input type="text" id="searchStatus" class="form-control" placeholder="Search by status">
                                        <!-- <button id="resetFilters" class="btn btn-outline-secondary w-50 ms-3 border-">Reset</button> -->
                                   </div>

                                   <!-- Add New product Button -->
                                   <div class="col-lg-2 text-lg-end text-center mt-3 mt-lg-0">
                                        <a href="<?= base_url('admin/add-product') ?>" class="btn btn-primary">Add Product</a>
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
                    <!-- Table  -->
                    <div class="table-responsive">
                         <table class="table align-middle mb-0 table-hover table-centered">
                              <thead class="bg-light-subtle">
                                   <tr class="text-center">
                                        <th>Sr#</th>
                                        <th>Cover Image</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Category</th>
                                        <th>Rating</th>
                                        <th>Action</th>
                                   </tr>
                              </thead>
                              <tbody class="text-center">
                                   <?php if (!empty($products) && is_array($products)): ?>
                                        <?php foreach ($products as $value): ?>
                                             <tr>
                                                  <td class="text-center"><?= $value['sequence_number'] ?></td>
                                                  <td>
                                                       <div class="d-flex align-items-center gap-2">
                                                            <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                                                 <img src="<?= base_url('uploads/products/cover_images/' . esc($value['cover_image'])) ?>" alt="" class="avatar-md">
                                                            </div>
                                                       </div>
                                                  </td>
                                                  <td class="fw-bold"><?= esc($value['title']) ?></td>
                                                  <td>$<?= esc($value['price']) ?></td>
                                                  <td>
                                                       <p class="mb-1 text-muted"><?= esc($value['stock']) ?></p>
                                                  </td>
                                                  <td><?= esc($value['category_title']) ?></td>
                                                  <td> <span class="badge p-1 bg-light text-dark fs-12 me-1"><i class="bx bxs-star align-text-top fs-14 text-warning me-1"></i> 4.5</span> 55 Review</td>
                                                  <td>
                                                       <div class="d-flex justify-content-center">
                                                            <a href="<?= base_url('admin/product-detail/' . esc($value['id'])) ?>" class="btn role_action_btn tooltip-left" data-tooltip="view">
                                                                 <img src="<?= base_url('assets/images/svg/eye_icon.svg') ?>" alt="">
                                                            </a>
                                                            <a href="<?= base_url('admin/edit-product/' . esc($value['id'])) ?>" class="btn role_action_btn ms-1 tooltip-left" data-tooltip="Edit">
                                                                 <img src="<?= base_url('assets/images/svg/edit_icon.svg') ?>" alt="">
                                                            </a>
                                                       </div>
                                                  </td>
                                             </tr>
                                        <?php endforeach; ?>
                                   <?php else: ?>
                                        <tr id="noResults">
                                             <td colspan="7" class="text-center">No Product available.</td>
                                        </tr>
                                   <?php endif; ?>
                                   <!-- No results found row -->
                                   <tr id="noRecords" style="display: none;">
                                        <td colspan="7" class="text-center">No records found matching your search criteria.</td>
                                   </tr>
                              </tbody>
                         </table>
                    </div>
                    <!-- Pagination  -->
                    <div class="mt-3 pagination" id="pagination">
            <?= $pager_links ?>
        </div>
               </div>
          </div>
     </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
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

<script>
    // Function to hide alerts after 3 seconds
    setTimeout(function() {
        document.getElementById('successAlert').style.display = 'none';
        document.getElementById('failAlert').style.display = 'none';
    }, 3000);

    $(document).ready(function() {
        $('.active_field').show();
        $('.feature_product').change(function() {
            var $checkbox = $(this);
            var isChecked = $(this).prop('checked');
            if (isChecked) {
                var checked = 'true';
            } else {
                var checked = 'false';
            }

            var product_id = $(this).attr('data-producid');
            $.ajax({
                url: '<?php echo base_url('admin/markas_top'); ?>',
                type: 'get',
                data: {
                    product_id: product_id,
                    checked: checked
                },
                dataType: 'json',
                success: function(html) {
                    if (html.status == 1) {
                        $checkbox.prop('checked', 'true');


                        Swal.fire({
                            // background: 'abc.png',
                            toast: true,
                            icon: 'success',
                            text: 'Marked as top',
                            animation: false,
                            background: '#f4fcfe',
                            color: '#99ea6b',
                            //position: position,
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener("mouseenter", Swal.stopTimer);
                                toast.addEventListener("mouseleave", Swal.resumeTimer);
                            },
                        });
                    } else {


                        Swal.fire({
                            // background: 'abc.png',
                            background: '#f4fcfe',
                            toast: true,
                            color: '#f27474',
                            icon: 'error',
                            text: 'Unmarked as top',
                            animation: false,
                            //position: position,
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener("mouseenter", Swal.stopTimer);
                                toast.addEventListener("mouseleave", Swal.resumeTimer);
                            },
                        });
                    }
                }
            });
        });

        $('.active_field').click(function() {
            if ($(this).prop('checked')) {
                var product_status = true;
            } else {
                var product_status = false;
            }
            var product_id = $(this).attr('data-id');
            $.ajax({
                url: "<?php echo base_url('admin/product_status'); ?>",
                type: 'get',
                data: {
                    product_id: product_id,
                    product_status: product_status
                },
                dataType: 'json',
                success: function(html) {
                    if (html.status == 1) {
                        Swal.fire({
                            // background: 'abc.png',
                            toast: true,
                            icon: 'success',
                            text: 'Product status changed',
                            animation: false,
                            background: '#f4fcfe',
                            color: '#99ea6b',
                            //position: position,
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener("mouseenter", Swal.stopTimer);
                                toast.addEventListener("mouseleave", Swal.resumeTimer);
                            },
                        });
                    }

                    if (html.data.active == 't') {
                        $('.active_fieldtext').html('Active');
                    } else {
                        $('.active_fieldtext').html('Inactive');
                    }

                }
            });


        });


        var page = 1;

        function search_productdata() {
            var search = $('.search_product').val();
            var select_entries = $('#select_entries :selected').val();
            var min_price_range = $('#product_min_price').val();
            var max_price_range = $('#product_max_price').val();
            var all_category = $('.all_category option:selected').val();

            $.ajax({
                url: '<?php echo base_url('admin/search_product'); ?>',
                type: 'get',
                data: {
                    search: search,
                    page: page,
                    min_price_range: min_price_range,
                    max_price_range: max_price_range,
                    all_category: all_category
                },
                dataType: 'html',
                async: false,
                success: function(html) {
                    $('.searched_product_list').html(html);
                }
            });
        }

        $('.search_product').keyup(function() {
            search_productdata();
        });

        // $('#select_entries').change(function() {
        //     search_productdata();
        // });

        $(document).on('click', '.price_range', function() {
            search_productdata();
        });

        $(document).on('change', '#product_min_price', function() {
            search_productdata();
        });

        $(document).on('change', '#product_max_price', function() {
            search_productdata();
        });


        $(document).on('change', '#min_range', function() {
            search_productdata();
        });

        $(document).on('change', '#max_range', function() {
            search_productdata();
        });


        $(document).on('change', '.all_category', function() {
            search_productdata();
        });


        $('.reset_and_clear_btn').on('click', function() {
            $('.search_product').val('');
            //$('#orderSearchInput').val('');
            $(".all_category").val("0");
            $('#product_min_price').val("0");
            search_productdata();
        });

        $(document).on('click', '#pagination a', function(e) {
            e.preventDefault();
            if ($(this).hasClass('page-link')) {
                page = $(this).attr('href').split('page=')[1];
                search_productdata();
                $('html, body').animate({
                    scrollTop: 0
                }, 'fast');
            }
        });
    });
</script>
<?= $this->endSection() ?>