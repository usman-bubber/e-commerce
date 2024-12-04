<?= $this->extend('all_template/layout') ?>
<?= $this->section('main_content') ?>
<div class="container">
    <div class="row">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-primary fw-bold mb-4">Add New Certificate</h2>
        </div>
        <!-----Add Certificate Form ----->
        <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/certificates/add_certificate') ?>">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label class="form-label color_primary mb-1">Student Name<span class="required_show">*</span></label>
                    <input type="text" class="form-control" placeholder="Student Name" name="student_name" value="<?= old('student_name') ?>" required>
                    <!-- Validation Error -->
                    <?php if (!empty($fieldErrors['student_name'])) : ?>
                        <p class="text-danger"><?= $fieldErrors['student_name']; ?></p>
                    <?php endif ?>
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label color_primary mb-1">Course Name<span class="required_show">*</span></label>
                    <input type="text" class="form-control" placeholder="Course Name" name="course_name" value="Quran Completion" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label class="form-label color_primary mb-1">Completion Date<span class="required_show">*</span></label>
                    <input type="date" class="form-control" name="completion_date" value="<?= old('completion_date') ?>" required>
                    <!-- Validation Error -->
                    <?php if (!empty($fieldErrors['completion_date'])) : ?>
                        <p class="text-danger"><?= $fieldErrors['completion_date']; ?></p>
                    <?php endif ?>
                </div>
                <div class="col-md-6 mb-2">
                    <label class="form-label color_primary mb-1">Grade<span class="required_show">*</span></label>
                    <input type="text" class="form-control" placeholder="Grade" name="grade" value="<?= old('grade') ?>" required>
                    <!-- Validation Error -->
                    <?php if (!empty($fieldErrors['grade'])) : ?>
                        <p class="text-danger"><?= $fieldErrors['grade']; ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <label class="form-label passenger_form_label color_primary mb-1">
                    Student Image <span class="required_show">*</span>
                </label>
                <div action="upload" id="category-pic" class="dropzone dropzone_main needsclick dz-clickable">
                    <div class="dz-message needsclick">
                        <span class="text">
                            <img src="<?= base_url('assets/img/svg/panel_svg/upload_icon.svg') ?>" alt="">
                            <span class="text_light">Drag and drop Cover image, or <span class="text_orange">Browse</span></span>
                        </span>
                    </div>
                </div>
                <input type="hidden" id="category-image" value="" name="category_img">
                <input type="hidden" name="is_service" id="is_service_input" value="false">
            </div>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <label class="form-label color_primary mb-1">Comments</label>
                    <textarea class="form-control" placeholder="Comments" name="comments" rows="4" cols="50"><?= old('comments') ?></textarea>
                    <!-- Validation Error -->
                    <?php if (!empty($fieldErrors['comments'])) : ?>
                        <p class="text-danger"><?= $fieldErrors['comments']; ?></p>
                    <?php endif ?>
                </div>
            </div>
            <!-- Submit Button -->
            <div class="row">
                <div class="col-md-12 mb-2 text-end">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>

    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('extraScript') ?>
<script src="<?= base_url('assets/js/custom_libs/images_upload.js') ?>"></script>
<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<!-----Script for dropzone image ----->
<script>
    initializeFileUploader(
        '#category-pic',
        '<?php echo base_url('admin/upload-resized-images') ?>',
        '<?= base_url() ?>',
        1,
        '#category-image',
        'image/jpeg,image/png,image/jpg', {
            'directory': 'uploads/categories/images/',
            'dir_folder': 'images',
            'dimensionsWithPath': JSON.stringify([{
                thumbnail_path: 'thumbnail90-90',
                width: '90',
                height: '90'
            }, ])
        }
    );
</script>
<?= $this->endSection() ?>