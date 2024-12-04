<?= $this->extend('all_template/layout') ?>
<?= $this->section('main_content') ?>
<div class="container">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="text-primary fw-bold mb-4">All Certifications</h2>
                        <a href="<?= base_url('admin/certificate/add-certificate') ?>" class="btn btn-success mb-4">Add Certificate</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Course</th>
                                    <th>Grade</th>
                                    <th>Date Issued</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>Quran Recitation</td>
                                    <td>A+</td>
                                    <td>2024-07-25</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">View</button>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jane Smith</td>
                                    <td>Quran Memorization</td>
                                    <td>A</td>
                                    <td>2024-07-24</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">View</button>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>Quran Recitation</td>
                                    <td>A+</td>
                                    <td>2024-07-25</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">View</button>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jane Smith</td>
                                    <td>Quran Memorization</td>
                                    <td>A</td>
                                    <td>2024-07-24</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">View</button>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>Quran Recitation</td>
                                    <td>A+</td>
                                    <td>2024-07-25</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">View</button>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jane Smith</td>
                                    <td>Quran Memorization</td>
                                    <td>A</td>
                                    <td>2024-07-24</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">View</button>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<?= $this->endSection() ?>