<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h4 mb-0 text-dark fw-bold">Edit Student Profile</h2>
                <a href="<?= base_url('students') ?>" class="btn btn-sm btn-light text-secondary fw-medium px-3">
                    &larr; Back to Directory
                </a>
            </div>

            <?php if(session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-3" role="alert">
                    <ul class="mb-0 ps-3">
                        <?php foreach(session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="p-4 p-md-5 bg-white rounded-4 shadow-sm border-0">
                <form action="<?= base_url('student/update/' . $student['id']) ?>" method="post">
                    <?= csrf_field() ?>
                    
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control bg-light border-0" id="nameInput" placeholder="Full Name" value="<?= old('name', $student['name']) ?>" required>
                        <label for="nameInput" class="text-muted">Full Name</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control bg-light border-0" id="emailInput" placeholder="Email Address" value="<?= old('email', $student['email']) ?>" required>
                        <label for="emailInput" class="text-muted">Email Address</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="text" name="course" class="form-control bg-light border-0" id="courseInput" placeholder="Course" value="<?= old('course', $student['course']) ?>" required>
                        <label for="courseInput" class="text-muted">Course (e.g., BSIT)</label>
                    </div>
                    
                    <div class="form-floating mb-4">
                        <textarea name="description" class="form-control bg-light border-0" id="descInput" placeholder="Description / Notes" style="height: 120px" required><?= old('description', $student['description']) ?></textarea>
                        <label for="descInput" class="text-muted">Description / Notes</label>
                    </div>
                    
                    <div class="d-flex justify-content-end gap-3 mt-4">
                        <a href="<?= base_url('students') ?>" class="btn btn-light px-4 py-2 fw-medium text-muted">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">Save Changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>