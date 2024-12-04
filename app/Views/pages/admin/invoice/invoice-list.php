<?= $this->extend('admin_template/layout') ?>
<?= $this->section('main_content') ?>
<div class="container-xxl">
     <div class="row">
          <div class="col-lg-3">
               <div class="card">
                    <div class="card-body">
                         <div class="d-flex align-items-center justify-content-between">
                              <div>
                                   <h4 class="card-title mb-2 d-flex align-items-center gap-2">Total Invoice</h4>
                                   <p class="text-muted fw-medium fs-22 mb-0">2310</p>
                              </div>
                              <div>
                                   <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                        <iconify-icon icon="solar:bill-list-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-lg-3">
               <div class="card">
                    <div class="card-body">
                         <div class="d-flex align-items-center justify-content-between">
                              <div>
                                   <h4 class="card-title mb-2 d-flex align-items-center gap-2">Pending Invoice</h4>
                                   <p class="text-muted fw-medium fs-22 mb-0">1000</p>
                              </div>
                              <div>
                                   <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                        <iconify-icon icon="solar:bill-cross-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-lg-3">
               <div class="card">
                    <div class="card-body">
                         <div class="d-flex align-items-center justify-content-between">
                              <div>
                                   <h4 class="card-title mb-2 d-flex align-items-center gap-2">Paid Invoice</h4>
                                   <p class="text-muted fw-medium fs-22 mb-0">1310</p>
                              </div>
                              <div>
                                   <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                        <iconify-icon icon="solar:bill-check-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-lg-3">
               <div class="card">
                    <div class="card-body">
                         <div class="d-flex align-items-center justify-content-between">
                              <div>
                                   <h4 class="card-title mb-2 d-flex align-items-center gap-2">Inactive Invoice</h4>
                                   <p class="text-muted fw-medium fs-22 mb-0">1243</p>
                              </div>
                              <div>
                                   <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                        <iconify-icon icon="solar:bill-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>

     </div>
     <div class="row">
          <div class="col-xl-12">
               <div class="card">
                    <!-- Heading -->
                    <div class="card-header d-flex justify-content-between align-items-center gap-1">
                         <h4 class="card-title flex-grow-1">All Invoice List</h4>
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
                                             <a href="<?= base_url('admin/add-invoice') ?>" class="btn btn-success me-1"><i class="bx bx-plus"></i> Add Invoice </a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="card-body p-0">
                         <div class="table-responsive">
                              <table class="table align-middle mb-0 table-hover table-centered">
                                   <thead class="bg-light-subtle">
                                        <tr>
                                             <th style="width: 20px;">
                                                  <div class="form-check">
                                                       <input type="checkbox" class="form-check-input" id="customCheck1">
                                                       <label class="form-check-label" for="customCheck1"></label>
                                                  </div>
                                             </th>
                                             <th>Invoice ID</th>
                                             <th>Billing Name</th>
                                             <th>Order Date</th>
                                             <th>Total</th>
                                             <th>Payment Method</th>
                                             <th>Status</th>
                                             <th>Action</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <tr>
                                             <td>
                                                  <div class="form-check">
                                                       <input type="checkbox" class="form-check-input" id="customCheck2">
                                                       <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                  </div>
                                             </td>
                                             <td><a href="javascript: void(0);" class="text-body">#INV2540</a> </td>
                                             <td><img src="<?= base_url('assets/images/users/avatar-2.jpg') ?>" class="avatar-sm rounded-circle me-2" alt="..."> Michael A. Miner</td>
                                             <td> 07 Jan, 2023</td>
                                             <td> $452 </td>
                                             <td> Mastercard </td>
                                             <td> <span class="badge bg-success-subtle text-success py-1 px-2">Completed</span> </td>
                                             <td>
                                             <div class="d-flex gap-2">
                                                  <a href="<?= base_url('admin/detail-invoice') ?>" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="<?= base_url('admin/edit-invoice') ?>" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="<?= base_url('admin/edit-invoice') ?>" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                             </div>
                                             </td>
                                        </tr>

                                        <tr>
                                             <td>
                                                  <div class="form-check">
                                                       <input type="checkbox" class="form-check-input" id="customCheck3">
                                                       <label class="form-check-label" for="customCheck3">&nbsp;</label>
                                                  </div>
                                             </td>
                                             <td><a href="javascript: void(0);" class="text-body">#INV3924</a> </td>
                                             <td><img src="<?= base_url('assets/images/users/avatar-3.jpg') ?>" class="avatar-sm rounded-circle me-2" alt="..."> Theresa T. Brose</td>
                                             <td> 03 Dec, 2023</td>
                                             <td> $783 </td>
                                             <td> Visa </td>
                                             <td> <span class="badge bg-danger-subtle text-danger px-2 py-1">Cancel</span> </td>
                                             <td>
                                                  <div class="d-flex gap-2">
                                                       <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  </div>
                                             </td>
                                        </tr>

                                        <tr>
                                             <td>
                                                  <div class="form-check">
                                                       <input type="checkbox" class="form-check-input" id="customCheck4">
                                                       <label class="form-check-label" for="customCheck4">&nbsp;</label>
                                                  </div>
                                             </td>
                                             <td><a href="javascript: void(0);" class="text-body">#INV5032</a> </td>
                                             <td><img src="<?= base_url('assets/images/users/avatar-4.jpg') ?>" class="avatar-sm rounded-circle me-2" alt="..."> James L. Erickson</td>
                                             <td> 28 Sep, 2023 </td>
                                             <td> $134 </td>
                                             <td> Paypal </td>
                                             <td>
                                                  <span class="badge bg-success-subtle text-success py-1 px-2">Completed</span>
                                             </td>
                                             <td>
                                                  <div class="d-flex gap-2">
                                                       <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  </div>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>
                                                  <div class="form-check">
                                                       <input type="checkbox" class="form-check-input" id="customCheck5">
                                                       <label class="form-check-label" for="customCheck5">&nbsp;</label>
                                                  </div>
                                             </td>
                                             <td><a href="javascript: void(0);" class="text-body">#INV1695</a> </td>
                                             <td><img src="<?= base_url('assets/images/users/avatar-5.jpg') ?>" class="avatar-sm rounded-circle me-2" alt="..."> Lily W. Wilson</td>
                                             <td>10 Aug, 2023</td>
                                             <td> $945 </td>
                                             <td> Mastercard</td>
                                             <td><span class="badge bg-primary-subtle text-primary py-1 px-2">Pending</span></td>
                                             <td>
                                                  <div class="d-flex gap-2">
                                                       <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  </div>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>
                                                  <div class="form-check">
                                                       <input type="checkbox" class="form-check-input" id="customCheck6">
                                                       <label class="form-check-label" for="customCheck6">&nbsp;</label>
                                                  </div>
                                             </td>
                                             <td><a href="javascript: void(0);" class="text-body">#INV8473</a> </td>
                                             <td><img src="<?= base_url('assets/images/users/avatar-6.jpg') ?>" class="avatar-sm rounded-circle me-2" alt="..."> Sarah M. Brooks</td>
                                             <td> 22 May, 2023 </td>
                                             <td> $421</td>
                                             <td> Visa</td>
                                             <td> <span class="badge bg-danger-subtle text-danger px-2 py-1 ">Cancel</span></td>
                                             <td>
                                                  <div class="d-flex gap-2">
                                                       <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  </div>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>
                                                  <div class="form-check">
                                                       <input type="checkbox" class="form-check-input" id="customCheck7">
                                                       <label class="form-check-label" for="customCheck7">&nbsp;</label>
                                                  </div>
                                             </td>
                                             <td><a href="javascript: void(0);" class="text-body">#INV2150</a> </td>
                                             <td><img src="<?= base_url('assets/images/users/avatar-7.jpg') ?>" class="avatar-sm rounded-circle me-2" alt="..."> Joe K. Hall</td>
                                             <td>15 Mar, 2023
                                             </td>
                                             <td>$251 </td>
                                             <td> Paypal </td>
                                             <td> <span class="badge bg-success-subtle text-success py-1 px-2">Completed</span> </td>
                                             <td>
                                                  <div class="d-flex gap-2">
                                                       <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  </div>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>
                                                  <div class="form-check">
                                                       <input type="checkbox" class="form-check-input" id="customCheck7">
                                                       <label class="form-check-label" for="customCheck7">&nbsp;</label>
                                                  </div>
                                             </td>
                                             <td><a href="javascript: void(0);" class="text-body">#INV5636</a> </td>
                                             <td><img src="<?= base_url('assets/images/users/avatar-8.jpg') ?>" class="avatar-sm rounded-circle me-2" alt="...">Ralph Hueber</td>
                                             <td>15 Mar, 2023
                                             </td>
                                             <td>$310 </td>
                                             <td> Visa </td>
                                             <td> <span class="badge bg-success-subtle text-success py-1 px-2">Completed</span> </td>
                                             <td>
                                                  <div class="d-flex gap-2">
                                                       <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  </div>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>
                                                  <div class="form-check">
                                                       <input type="checkbox" class="form-check-input" id="customCheck7">
                                                       <label class="form-check-label" for="customCheck7">&nbsp;</label>
                                                  </div>
                                             </td>
                                             <td><a href="javascript: void(0);" class="text-body">#INV2940</a> </td>
                                             <td><img src="<?= base_url('assets/images/users/avatar-9.jpg') ?>" class="avatar-sm rounded-circle me-2" alt="...">Sarah Drescher</td>
                                             <td>15 Mar, 2023
                                             </td>
                                             <td>$241 </td>
                                             <td> Mastercard </td>
                                             <td> <span class="badge bg-success-subtle text-success py-1 px-2">Completed</span> </td>
                                             <td>
                                                  <div class="d-flex gap-2">
                                                       <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  </div>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>
                                                  <div class="form-check">
                                                       <input type="checkbox" class="form-check-input" id="customCheck7">
                                                       <label class="form-check-label" for="customCheck7">&nbsp;</label>
                                                  </div>
                                             </td>
                                             <td><a href="javascript: void(0);" class="text-body">#INV9027</a> </td>
                                             <td><img src="<?= base_url('assets/images/users/avatar-10.jpg') ?>" class="avatar-sm rounded-circle me-2" alt="...">Leonie Meister</td>
                                             <td>15 Mar, 2023
                                             </td>
                                             <td>$136 </td>
                                             <td> Paypal </td>
                                             <td><span class="badge bg-primary-subtle text-primary py-1 px-2">Pending</span></td>
                                             <td>
                                                  <div class="d-flex gap-2">
                                                       <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="#!" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  </div>
                                             </td>
                                        </tr>
                                   </tbody>
                              </table>
                         </div>
                         <!-- end table-responsive -->
                    </div>
                    <div class="card-footer border-top">
                         <nav aria-label="Page navigation example">
                              <ul class="pagination justify-content-end mb-0">
                                   <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                                   <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                   <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                   <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                   <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                              </ul>
                         </nav>
                    </div>
               </div>
          </div>

     </div>

</div>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<?= $this->endSection() ?>