<?= $this->extend('admin_template/layout') ?>
<?= $this->section('main_content') ?>
<div class="container-xxl">
     <div class="row">
          <div class="col-xl-12">
               <div class="card">
                    <!-- Heading  -->
                    <div class="card-header d-flex justify-content-between align-items-center gap-1">
                         <h4 class="card-title flex-grow-1">All Sellers List</h4>
                    </div>
                    <!-- Filters  -->
                    <div class="card bg-light-subtle">
                         <div class="card-header border-0">
                              <div class="row justify-content-between align-items-center">
                                   <div class="col-lg-6">
                                        <ol class="breadcrumb mb-0">
                                             <li class="breadcrumb-item fw-medium"><a href="javascript: void(0);" class="text-dark">Categories</a></li>
                                             <li class="breadcrumb-item active">All Sellers</li>
                                        </ol>
                                        <p class="mb-0 text-muted">Showing all <span class="text-dark fw-semibold">5,786</span> items results</p>
                                   </div>
                                   <div class="col-lg-6">
                                        <div class="text-md-end mt-3 mt-md-0">
                                             <button type="button" class="btn btn-outline-secondary me-1"><i class="bx bx-cog me-1"></i>More Setting</button>
                                             <button type="button" class="btn btn-outline-secondary me-1"><i class="bx bx-filter-alt me-1"></i> Filters</button>
                                             <a href="<?= base_url('admin/add-seller') ?>" class="btn btn-success me-1"><i class="bx bx-plus"></i> New Sellers</a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="row">
          <div class="col-xl-3 col-md-6">
               <div class="card">
                    <div class="card-body">
                         <div class="position-relative bg-light p-2 rounded text-center">
                              <img src="<?= base_url('assets/images/seller/zara.svg') ?>" alt="" class="avatar-xxl">
                              <div class="position-absolute top-0 end-0 m-1">
                                   <div class="dropdown">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                             <iconify-icon icon="iconamoon:menu-kebab-vertical-circle-duotone" class="fs-20 align-middle text-muted"></iconify-icon>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                             <!-- item-->
                                             <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                             <!-- item-->
                                             <a href="javascript:void(0);" class="dropdown-item">Export</a>
                                             <!-- item-->
                                             <a href="javascript:void(0);" class="dropdown-item">Import</a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="d-flex flex-wrap justify-content-between my-3">
                              <div>
                                   <h4 class="mb-1">ZARA International<span class="text-muted fs-13 ms-1">(Fashion) </span></h4>
                                   <div>
                                        <a href="#!" class="link-primary fs-16 fw-medium">www.zarafashion.co</a>
                                   </div>
                              </div>
                              <div>
                                   <p class="mb-0"><span class="badge bg-light text-dark fs-12 me-1"><i class="bx bxs-star align-text-top fs-14 text-warning me-1"></i> 4.5</span>3.5k</p>
                              </div>
                         </div>
                         <div class="">
                              <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:point-on-map-bold-duotone" class="fs-18 text-primary"></iconify-icon>4604 , Philli Lane Kiowa IN 47404</p>
                              <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:letter-bold-duotone" class="fs-18 text-primary"></iconify-icon>zarafashionworld@dayrep.com</p>
                              <p class="d-flex align-items-center gap-2 mb-0"><iconify-icon icon="solar:outgoing-call-rounded-bold-duotone" class="fs-20 text-primary"></iconify-icon>+243 812-801-9335</p>
                         </div>
                         <div class="d-flex align-items-center justify-content-between mt-3 mb-1">
                              <p class="mb-0 fs-15 fw-medium text-dark">Fashion</p>
                              <div>
                                   <p class="mb-0 fs-15 fw-medium text-dark">$200k <span class="ms-1"><iconify-icon icon="solar:course-up-outline" class="text-success"></iconify-icon></span></p>
                              </div>
                         </div>
                         <div class="progress progress-soft progress-md">
                              <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 80%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                         </div>
                         <div class="p-2 pb-0 mx-n3 mt-2">
                              <div class="row text-center g-2">
                                   <div class="col-lg-4 col-4 border-end">
                                        <h5 class="mb-1">865</h5>
                                        <p class="text-muted mb-0">Item Stock</p>
                                   </div>
                                   <div class="col-lg-4 col-4 border-end">
                                        <h5 class="mb-1">+4.5k</h5>
                                        <p class="text-muted mb-0">Sells</p>
                                   </div>
                                   <div class="col-lg-4 col-4">
                                        <h5 class="mb-1">+2k</h5>
                                        <p class="text-muted mb-0">Happy Client</p>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="card-footer border-top gap-1 hstack">
                         <a href="<?= base_url('admin/seller-detail') ?>" class="btn btn-primary w-100">View Profile</a>
                         <a href="<?= base_url('admin/edit-seller') ?>" class="btn btn-light w-100">Edit Profile</a>
                    </div>
               </div>
          </div>
          <div class="col-xl-3 col-md-6">
               <div class="card">
                    <div class="card-body">
                         <div class="position-relative bg-light p-2 rounded text-center">
                              <img src="<?= base_url('assets/images/seller/rolex.svg') ?>" alt="" class="avatar-xxl">
                              <div class="position-absolute top-0 end-0 m-1">
                                   <div class="dropdown">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                             <iconify-icon icon="iconamoon:menu-kebab-vertical-circle-duotone" class="fs-20 align-middle text-muted"></iconify-icon>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                             <!-- item-->
                                             <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                             <!-- item-->
                                             <a href="javascript:void(0);" class="dropdown-item">Export</a>
                                             <!-- item-->
                                             <a href="javascript:void(0);" class="dropdown-item">Import</a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="d-flex flex-wrap justify-content-between my-3">
                              <div>
                                   <h4 class="mb-1">Rolex Watches<span class="text-muted fs-13 ms-1">(Watch) </span></h4>
                                   <div>
                                        <a href="#!" class="link-primary fs-16 fw-medium">www.rolexwatch.co</a>
                                   </div>
                              </div>
                              <div>
                                   <p class="mb-0"><span class="badge bg-light text-dark fs-12 me-1"><i class="bx bxs-star align-text-top fs-14 text-warning me-1"></i> 4.5</span>1.2k</p>
                              </div>
                         </div>
                         <div class="">
                              <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:point-on-map-bold-duotone" class="fs-18 text-primary"></iconify-icon>1678 Avenue Milwaukee, WI 53202</p>
                              <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:letter-bold-duotone" class="fs-18 text-primary"></iconify-icon>rolexwatches@dayrep.com</p>
                              <p class="d-flex align-items-center gap-2 mb-0"><iconify-icon icon="solar:outgoing-call-rounded-bold-duotone" class="fs-20 text-primary"></iconify-icon>+243 262-223-1464</p>
                         </div>
                         <div class="d-flex align-items-center justify-content-between mt-3 mb-1">
                              <p class="mb-0 fs-15 fw-medium text-dark">Watches</p>
                              <div>
                                   <p class="mb-0 fs-15 fw-medium text-dark">$349k <span class="ms-1"><iconify-icon icon="solar:course-up-outline" class="text-success"></iconify-icon></span></p>
                              </div>
                         </div>
                         <div class="progress progress-soft progress-md">
                              <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 60%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                         </div>
                         <div class="p-2 pb-0 mx-n3 mt-2">
                              <div class="row text-center g-2">
                                   <div class="col-lg-4 col-4 border-end">
                                        <h5 class="mb-1">261</h5>
                                        <p class="text-muted mb-0">Item Stock</p>
                                   </div>
                                   <div class="col-lg-4 col-4 border-end">
                                        <h5 class="mb-1">+2.9k</h5>
                                        <p class="text-muted mb-0">Sells</p>
                                   </div>
                                   <div class="col-lg-4 col-4">
                                        <h5 class="mb-1">+1.4k</h5>
                                        <p class="text-muted mb-0">Happy Client</p>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="card-footer border-top gap-1 hstack">
                         <a href="#!" class="btn btn-primary w-100">View Profile</a>
                         <a href="#!" class="btn btn-light w-100">Edit Profile</a>
                    </div>
               </div>
          </div>
          <div class="col-xl-3 col-md-6">
               <div class="card">
                    <div class="card-body">
                         <div class="position-relative bg-light p-2 rounded text-center">
                              <img src="<?= base_url('assets/images/seller/dyson.svg') ?>" alt="" class="avatar-xxl">
                              <div class="position-absolute top-0 end-0 m-1">
                                   <div class="dropdown">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                             <iconify-icon icon="iconamoon:menu-kebab-vertical-circle-duotone" class="fs-20 align-middle text-muted"></iconify-icon>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                             <!-- item-->
                                             <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                             <!-- item-->
                                             <a href="javascript:void(0);" class="dropdown-item">Export</a>
                                             <!-- item-->
                                             <a href="javascript:void(0);" class="dropdown-item">Import</a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="d-flex flex-wrap justify-content-between my-3">
                              <div>
                                   <h4 class="mb-1">Dyson Machinery<span class="text-muted fs-13 ms-1">(Electronics) </span></h4>
                                   <div>
                                        <a href="#!" class="link-primary fs-16 fw-medium">www.dysonmachine.co</a>
                                   </div>
                              </div>
                              <div>
                                   <p class="mb-0"><span class="badge bg-light text-dark fs-12 me-1"><i class="bx bxs-star align-text-top fs-14 text-warning me-1"></i> 4.1</span>3.7k</p>
                              </div>
                         </div>
                         <div class="">
                              <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:point-on-map-bold-duotone" class="fs-18 text-primary"></iconify-icon>23 Cubbine Road GHOOLI WA 6426</p>
                              <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:letter-bold-duotone" class="fs-18 text-primary"></iconify-icon>dysonmachine@dayrep.com</p>
                              <p class="d-flex align-items-center gap-2 mb-0"><iconify-icon icon="solar:outgoing-call-rounded-bold-duotone" class="fs-20 text-primary"></iconify-icon>+81(08) 9059 8047</p>
                         </div>
                         <div class="d-flex align-items-center justify-content-between mt-3 mb-1">
                              <p class="mb-0 fs-15 fw-medium text-dark">Electronics</p>
                              <div>
                                   <p class="mb-0 fs-15 fw-medium text-dark">$545k <span class="ms-1"><iconify-icon icon="solar:course-up-outline" class="text-success"></iconify-icon></span></p>
                              </div>
                         </div>
                         <div class="progress progress-soft progress-md">
                              <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 90%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                         </div>
                         <div class="p-2 pb-0 mx-n3 mt-2">
                              <div class="row text-center g-2">
                                   <div class="col-lg-4 col-4 border-end">
                                        <h5 class="mb-1">781</h5>
                                        <p class="text-muted mb-0">Item Stock</p>
                                   </div>
                                   <div class="col-lg-4 col-4 border-end">
                                        <h5 class="mb-1">+5.3k</h5>
                                        <p class="text-muted mb-0">Sells</p>
                                   </div>
                                   <div class="col-lg-4 col-4">
                                        <h5 class="mb-1">+3.1k</h5>
                                        <p class="text-muted mb-0">Happy Client</p>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="card-footer border-top gap-1 hstack">
                         <a href="#!" class="btn btn-primary w-100">View Profile</a>
                         <a href="#!" class="btn btn-light w-100">Edit Profile</a>
                    </div>
               </div>
          </div>
          <div class="col-xl-3 col-md-6">
               <div class="card">
                    <div class="card-body">
                         <div class="position-relative bg-light p-2 rounded text-center">
                              <img src="<?= base_url('assets/images/seller/gopro.svg') ?>" alt="" class="avatar-xxl">
                              <div class="position-absolute top-0 end-0 m-1">
                                   <div class="dropdown">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                             <iconify-icon icon="iconamoon:menu-kebab-vertical-circle-duotone" class="fs-20 align-middle text-muted"></iconify-icon>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                             <!-- item-->
                                             <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                             <!-- item-->
                                             <a href="javascript:void(0);" class="dropdown-item">Export</a>
                                             <!-- item-->
                                             <a href="javascript:void(0);" class="dropdown-item">Import</a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="d-flex flex-wrap justify-content-between my-3">
                              <div>
                                   <h4 class="mb-1">GoPro Camera<span class="text-muted fs-13 ms-1">(Electronics) </span></h4>
                                   <div>
                                        <a href="#!" class="link-primary fs-16 fw-medium">www.goprocamera.co</a>
                                   </div>
                              </div>
                              <div>
                                   <p class="mb-0"><span class="badge bg-light text-dark fs-12 me-1"><i class="bx bxs-star align-text-top fs-14 text-warning me-1"></i> 4.3</span>7.2k</p>
                              </div>
                         </div>
                         <div class="">
                              <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:point-on-map-bold-duotone" class="fs-18 text-primary"></iconify-icon>5 Gaffney Street MIDDLE PARK VIC 3206</p>
                              <p class="d-flex align-items-center gap-2 mb-1"><iconify-icon icon="solar:letter-bold-duotone" class="fs-18 text-primary"></iconify-icon>goprocamera@dayrep.com</p>
                              <p class="d-flex align-items-center gap-2 mb-0"><iconify-icon icon="solar:outgoing-call-rounded-bold-duotone" class="fs-20 text-primary"></iconify-icon>+81(08) 6727 4227</p>
                         </div>
                         <div class="d-flex align-items-center justify-content-between mt-3 mb-1">
                              <p class="mb-0 fs-15 fw-medium text-dark">Camera</p>
                              <div>
                                   <p class="mb-0 fs-15 fw-medium text-dark">$465k <span class="ms-1"><iconify-icon icon="solar:course-up-outline" class="text-success"></iconify-icon></span></p>
                              </div>
                         </div>
                         <div class="progress progress-soft progress-md">
                              <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 40%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                         </div>
                         <div class="p-2 pb-0 mx-n3 mt-2">
                              <div class="row text-center g-2">
                                   <div class="col-lg-4 col-4 border-end">
                                        <h5 class="mb-1">890</h5>
                                        <p class="text-muted mb-0">Item Stock</p>
                                   </div>
                                   <div class="col-lg-4 col-4 border-end">
                                        <h5 class="mb-1">+10.6k</h5>
                                        <p class="text-muted mb-0">Sells</p>
                                   </div>
                                   <div class="col-lg-4 col-4">
                                        <h5 class="mb-1">+6.3k</h5>
                                        <p class="text-muted mb-0">Happy Client</p>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="card-footer border-top gap-1 hstack">
                         <a href="#!" class="btn btn-primary w-100">View Profile</a>
                         <a href="#!" class="btn btn-light w-100">Edit Profile</a>
                    </div>
               </div>
          </div>
     </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<?= $this->endSection() ?>