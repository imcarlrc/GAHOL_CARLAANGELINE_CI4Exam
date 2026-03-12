<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid py-4">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 mb-0 text-dark fw-bold">Student Directory</h2>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

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

    <div class="row g-4">
        
        <div class="col-lg-4">
            <div class="p-4 bg-white rounded-4 shadow-sm border-0">
                <h5 class="mb-4 text-primary fw-semibold">Add New Student</h5>
                
                <form action="<?= base_url('student/store') ?>" method="post">
                    <?= csrf_field() ?>
                    
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control bg-light border-0" id="nameInput" placeholder="Full Name" value="<?= old('name') ?>" required>
                        <label for="nameInput" class="text-muted">Full Name</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control bg-light border-0" id="emailInput" placeholder="Email Address" value="<?= old('email') ?>" required>
                        <label for="emailInput" class="text-muted">Email Address</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="text" name="course" class="form-control bg-light border-0" id="courseInput" placeholder="Course" value="<?= old('course') ?>" required>
                        <label for="courseInput" class="text-muted">Course (e.g., BSIT)</label>
                    </div>
                    
                    <div class="form-floating mb-4">
                        <textarea name="description" class="form-control bg-light border-0" id="descInput" placeholder="Notes" style="height: 100px" required><?= old('description') ?></textarea>
                        <label for="descInput" class="text-muted">Notes / Description</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold rounded-3">Save Student</button>
                </form>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="p-0 bg-white rounded-4 shadow-sm border-0 overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-muted fw-medium py-3 ps-4 border-0">Student Info</th>
                                <th class="text-muted fw-medium py-3 border-0">Course</th>
                                <th class="text-muted fw-medium py-3 pe-4 text-end border-0">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            <?php if(!empty($students)): foreach ($students as $s): ?>
                                <tr>
                                    <td class="py-3 ps-4">
                                        <div class="fw-semibold text-dark mb-1"><?= esc($s['name']) ?></div>
                                        <div class="small text-muted mb-1"><?= esc($s['email']) ?></div>
                                        <div class="small text-secondary fst-italic"><?= esc($s['description']) ?></div>
                                    </td>
                                    
                                    <td class="py-3">
                                        <span class="badge bg-primary bg-opacity-10 text-primary border border-primary-subtle px-2 py-1">
                                            <?= esc($s['course']) ?>
                                        </span>
                                    </td>
                                    
                                    <td class="py-3 pe-4 text-end">
                                        <a href="<?= base_url('student/edit/' . $s['id']) ?>" class="btn btn-sm btn-light text-primary fw-medium me-1 px-3">Edit</a>
                                        
                                        <form action="<?= base_url('student/delete/' . $s['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Delete this student? This cannot be undone.')">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-light text-danger fw-medium px-3">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; else: ?>
                                <tr>
                                    <td colspan="3" class="text-center py-5 text-muted">
                                        <span class="fs-4 d-block mb-2">📭</span>
                                        No students found. Add one using the form!
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?= $this->endSection(); ?>