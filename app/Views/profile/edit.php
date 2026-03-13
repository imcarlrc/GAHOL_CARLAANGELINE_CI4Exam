<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Edit Profile</h1>

    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('profile/update') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="row mb-3">
                    <div class="col-md-4 text-center">
                        <?php if (!empty($user['profile_image'])): ?>
                            <img id="imagePreview" src="<?= base_url('uploads/profiles/' . esc($user['profile_image'])) ?>" class="img-fluid rounded-circle mb-3 border shadow-sm" style="width: 150px; height: 150px; object-fit: cover;">
                        <?php else: ?>
                            <img id="imagePreview" src="https://ui-avatars.com/api/?name=<?= urlencode($user['name'] ?? $user['fullname'] ?? 'User') ?>&background=random&size=150" class="img-fluid rounded-circle mb-3 border shadow-sm" style="width: 150px; height: 150px; object-fit: cover;">
                        <?php endif; ?>
                       
                        <div class="mb-3 text-start">
                            <label for="profile_image" class="form-label fw-bold">Profile Picture</label>
                            <input class="form-control <?= session('errors.profile_image') ? 'is-invalid' : '' ?>" type="file" id="profile_image" name="profile_image" accept="image/*" onchange="previewImage(event)">
                            <div class="invalid-feedback">
                                <?= session('errors.profile_image') ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Full Name</label>
                                <input type="text" class="form-control <?= session('errors.name') ? 'is-invalid' : '' ?>" name="name" value="<?= old('name', esc($user['name'] ?? $user['fullname'] ?? '')) ?>">
                                <div class="invalid-feedback"><?= session('errors.name') ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Email Address</label>
                                <input type="email" class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" name="email" value="<?= old('email', esc($user['email'] ?? $user['username'] ?? '')) ?>">
                                <div class="invalid-feedback"><?= session('errors.email') ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Student ID</label>
                                <input type="text" class="form-control <?= session('errors.student_id') ? 'is-invalid' : '' ?>" name="student_id" value="<?= old('student_id', esc($user['student_id'] ?? '')) ?>">
                                <div class="invalid-feedback"><?= session('errors.student_id') ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Course</label>
                                <input type="text" class="form-control <?= session('errors.course') ? 'is-invalid' : '' ?>" name="course" value="<?= old('course', esc($user['course'] ?? '')) ?>">
                                <div class="invalid-feedback"><?= session('errors.course') ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Year Level</label>
                                <input type="number" class="form-control <?= session('errors.year_level') ? 'is-invalid' : '' ?>" name="year_level" value="<?= old('year_level', esc($user['year_level'] ?? '')) ?>">
                                <div class="invalid-feedback"><?= session('errors.year_level') ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Section</label>
                                <input type="text" class="form-control <?= session('errors.section') ? 'is-invalid' : '' ?>" name="section" value="<?= old('section', esc($user['section'] ?? '')) ?>">
                                <div class="invalid-feedback"><?= session('errors.section') ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Phone</label>
                                <input type="text" class="form-control <?= session('errors.phone') ? 'is-invalid' : '' ?>" name="phone" value="<?= old('phone', esc($user['phone'] ?? '')) ?>">
                                <div class="invalid-feedback"><?= session('errors.phone') ?></div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label fw-bold">Address</label>
                                <textarea class="form-control <?= session('errors.address') ? 'is-invalid' : '' ?>" name="address" rows="3"><?= old('address', esc($user['address'] ?? '')) ?></textarea>
                                <div class="invalid-feedback"><?= session('errors.address') ?></div>
                            </div>
                        </div>
                       
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">
                                <i class="align-middle" data-feather="save"></i> Save Changes
                            </button>
                            <a href="<?= base_url('profile') ?>" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('imagePreview');
        output.src = reader.result;
    };
    if(event.target.files[0]){
        reader.readAsDataURL(event.target.files[0]);
    }
}
</script>
<?= $this->endSection() ?>