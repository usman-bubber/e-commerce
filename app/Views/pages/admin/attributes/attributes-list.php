<?= $this->extend('admin_template/layout') ?>
<?= $this->section('main_content') ?>
<div class="container-xxl">
     <div class="row">
          <div class="col-xl-12">
               <div class="card">
                    <!-- Heading -->
                    <div class="card-header d-flex justify-content-between align-items-center gap-1">
                         <h4 class="card-title flex-grow-1">All Attribute List</h4>
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
                                             <a href="<?= base_url('admin/add-attributes') ?>" class="btn btn-success me-1"><i class="bx bx-plus"></i> Add Attributes </a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
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
                                        <th>ID</th>
                                        <th>Variant</th>
                                        <th>Value</th>
                                        <th>Option</th>
                                        <th>Created On</th>
                                        <th>Published</th>
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
                                        <td>BR-3922</td>
                                        <td>Brand</td>
                                        <td>Dyson , H&M, Nike , GoPro , Huawei , Rolex , Zara , Thenorthface</td>
                                        <td>Dropdown</td>
                                        <td>10 Sep 2023</td>
                                        <td>
                                             <div class="form-check form-switch">
                                                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked="">
                                             </div>
                                        </td>
                                        <td>
                                             <div class="d-flex gap-2">
                                                  <a href="<?= base_url('admin/product-detail') ?>" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="<?= base_url('admin/edit-attributes') ?>" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="<?= base_url('admin/product-detail') ?>" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                             </div>
                                        </td>
                                   </tr>

                                   <tr>
                                        <td>
                                             <div class="form-check">
                                                  <input type="checkbox" class="form-check-input" id="customCheck2">
                                                  <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                             </div>
                                        </td>
                                        <td>CL-3721</td>
                                        <td>Color</td>
                                        <td>Black , Blue , Green , Yellow , White</td>
                                        <td>Dropdown</td>
                                        <td>16 May 2024</td>
                                        <td>
                                             <div class="form-check form-switch">
                                                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked="">
                                             </div>
                                        </td>
                                        <td>
                                             <div class="d-flex gap-2">
                                                  <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="#!" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                             </div>
                                        </td>
                                   </tr>

                                   <tr>
                                        <td>
                                             <div class="form-check">
                                                  <input type="checkbox" class="form-check-input" id="customCheck2">
                                                  <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                             </div>
                                        </td>
                                        <td>SZ-2291</td>
                                        <td>Size</td>
                                        <td>XS , S , M , XL , XXL , 3XL</td>
                                        <td>Radio</td>
                                        <td>27 Jan 2024</td>
                                        <td>
                                             <div class="form-check form-switch">
                                                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked="">
                                             </div>
                                        </td>
                                        <td>
                                             <div class="d-flex gap-2">
                                                  <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="#!" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                             </div>
                                        </td>
                                   </tr>


                                   <tr>
                                        <td>
                                             <div class="form-check">
                                                  <input type="checkbox" class="form-check-input" id="customCheck2">
                                                  <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                             </div>
                                        </td>
                                        <td>WG-9212</td>
                                        <td>Weight</td>
                                        <td>500gm , 1kg , 2kg , 3kg , up to 4kg</td>
                                        <td>Radio</td>
                                        <td>12 March 2024</td>
                                        <td>
                                             <div class="form-check form-switch">
                                                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked="">
                                             </div>
                                        </td>
                                        <td>
                                             <div class="d-flex gap-2">
                                                  <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="#!" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                             </div>
                                        </td>
                                   </tr>

                                   <tr>
                                        <td>
                                             <div class="form-check">
                                                  <input type="checkbox" class="form-check-input" id="customCheck2">
                                                  <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                             </div>
                                        </td>
                                        <td>PC-1022</td>
                                        <td>Packaging</td>
                                        <td>Paper Box , Plastic Box , Heard Box , Tin</td>
                                        <td>Dropdown</td>
                                        <td>02 Jan 2024</td>
                                        <td>
                                             <div class="form-check form-switch">
                                                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1">
                                             </div>
                                        </td>
                                        <td>
                                             <div class="d-flex gap-2">
                                                  <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="#!" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                             </div>
                                        </td>
                                   </tr>


                                   <tr>
                                        <td>
                                             <div class="form-check">
                                                  <input type="checkbox" class="form-check-input" id="customCheck2">
                                                  <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                             </div>
                                        </td>
                                        <td>ML-0022</td>
                                        <td>Material</td>
                                        <td>Cotton , Polyester , Leather , Chiffon , Denim , Linen , Satin</td>
                                        <td>Dropdown</td>
                                        <td>20 April 2024</td>
                                        <td>
                                             <div class="form-check form-switch">
                                                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1">
                                             </div>
                                        </td>
                                        <td>
                                             <div class="d-flex gap-2">
                                                  <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="#!" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                             </div>
                                        </td>
                                   </tr>

                                   <tr>
                                        <td>
                                             <div class="form-check">
                                                  <input type="checkbox" class="form-check-input" id="customCheck2">
                                                  <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                             </div>
                                        </td>
                                        <td>MM-9011</td>
                                        <td>Memory</td>
                                        <td>64 , 128 , 250 , 512 , 1TB</td>
                                        <td>Radio</td>
                                        <td>29 March 2024</td>
                                        <td>
                                             <div class="form-check form-switch">
                                                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked="">
                                             </div>
                                        </td>
                                        <td>
                                             <div class="d-flex gap-2">
                                                  <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="#!" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                             </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>
                                             <div class="form-check">
                                                  <input type="checkbox" class="form-check-input" id="customCheck2">
                                                  <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                             </div>
                                        </td>
                                        <td>SZ-2911</td>
                                        <td>Shoes Size</td>
                                        <td>18 to 22 , 38 to 44</td>
                                        <td>Radio</td>
                                        <td>03 Dec 2023</td>
                                        <td>
                                             <div class="form-check form-switch">
                                                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1" checked="">
                                             </div>
                                        </td>
                                        <td>
                                             <div class="d-flex gap-2">
                                                  <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="#!" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                             </div>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>
                                             <div class="form-check">
                                                  <input type="checkbox" class="form-check-input" id="customCheck2">
                                                  <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                             </div>
                                        </td>
                                        <td>ST-4525</td>
                                        <td>Style</td>
                                        <td>Classic , Modern , Ethnic , Western</td>
                                        <td>Dropdown</td>
                                        <td>30 Jun 2024</td>
                                        <td>
                                             <div class="form-check form-switch">
                                                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked1">
                                             </div>
                                        </td>
                                        <td>
                                             <div class="d-flex gap-2">
                                                  <a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                  <a href="#!" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
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