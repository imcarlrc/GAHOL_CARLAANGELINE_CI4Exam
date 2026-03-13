<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">My Profile</h1>
   
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center border-end">
                    <?php if (!empty($user['profile_image'])): ?>
                        <img src="<?= base_url('uploads/profiles/' . esc($user['profile_image'])) ?>" alt="Profile Image" class="img-fluid rounded-circle mb-3 border shadow-sm" style="width: 150px; height: 150px; object-fit: cover;">
                    <?php else: ?>
                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($user['name'] ?? 'User') ?>&background=random&size=150" alt="Placeholder" class="img-fluid rounded-circle mb-3 border shadow-sm">
                    <?php endif; ?>
                   
                    <h4><?= esc($user['name'] ?? $user['fullname'] ?? 'Student') ?></h4>
                    <p class="text-muted"><?= esc($user['email'] ?? $user['username'] ?? '') ?></p>
                    <a href="<?= base_url('profile/edit') ?>" class="btn btn-primary mt-2">
                        <i class="align-middle" data-feather="edit"></i> Edit Profile
                    </a>
                </div>

                <div class="col-md-8">
                    <h5 class="card-title mb-4">Student Details</h5>
                    <dl class="row">
                        <dt class="col-sm-3">Student ID</dt>
                        <dd class="col-sm-9"><?= !empty($user['student_id']) ? esc($user['student_id']) : '<span class="text-muted">Not set</span>' ?></dd>

                        <dt class="col-sm-3">Course</dt>
                        <dd class="col-sm-9"><?= !empty($user['course']) ? esc($user['course']) : '<span class="text-muted">Not set</span>' ?></dd>

                        <dt class="col-sm-3">Year Level</dt>
                        <dd class="col-sm-9"><?= !empty($user['year_level']) ? esc($user['year_level']) : '<span class="text-muted">Not set</span>' ?></dd>

                        <dt class="col-sm-3">Section</dt>
                        <dd class="col-sm-9"><?= !empty($user['section']) ? esc($user['section']) : '<span class="text-muted">Not set</span>' ?></dd>

                        <dt class="col-sm-3">Phone</dt>
                        <dd class="col-sm-9"><?= !empty($user['phone']) ? esc($user['phone']) : '<span class="text-muted">Not set</span>' ?></dd>

                        <dt class="col-sm-3">Address</dt>
                        <dd class="col-sm-9"><?= !empty($user['address']) ? esc($user['address']) : '<span class="text-muted">Not set</span>' ?></dd>
                       
                        <dt class="col-sm-3 mt-3">Account Created</dt>
                        <dd class="col-sm-9 mt-3 text-muted"><?= esc($user['created_at'] ?? 'Unknown') ?></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>