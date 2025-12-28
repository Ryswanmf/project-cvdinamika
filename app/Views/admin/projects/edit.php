<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold">Edit Proyek</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= site_url('admin/projects/update/' . $project['id']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Proyek</label>
                        <input type="text" class="form-control <?= $validation->hasError('title') ? 'is-invalid' : '' ?>" 
                               id="title" name="title" value="<?= old('title', $project['title']) ?>" required>
                        <div class="invalid-feedback"><?= $validation->getError('title') ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="category" class="form-label">Kategori</label>
                            <select class="form-select <?= $validation->hasError('category') ? 'is-invalid' : '' ?>" id="category" name="category" required>
                                <option value="">Pilih Kategori...</option>
                                <option value="Rumah Tinggal" <?= (old('category', $project['category']) == 'Rumah Tinggal') ? 'selected' : '' ?>>Rumah Tinggal</option>
                                <option value="Kantor" <?= (old('category', $project['category']) == 'Kantor') ? 'selected' : '' ?>>Kantor</option>
                                <option value="Komersial" <?= (old('category', $project['category']) == 'Komersial') ? 'selected' : '' ?>>Komersial</option>
                                <option value="Renovasi" <?= (old('category', $project['category']) == 'Renovasi') ? 'selected' : '' ?>>Renovasi</option>
                            </select>
                            <div class="invalid-feedback"><?= $validation->getError('category') ?></div>
                        </div>
                        <div class="col-md-6">
                            <label for="client_name" class="form-label">Nama Klien</label>
                            <input type="text" class="form-control" id="client_name" name="client_name" value="<?= old('client_name', $project['client_name']) ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3"><?= old('description', $project['description']) ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="completed_date" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="completed_date" name="completed_date" value="<?= old('completed_date', $project['completed_date']) ?>">
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label">Gambar Proyek (Opsional)</label>
                        <div class="mb-2">
                            <img src="<?= base_url('uploads/projects/' . $project['image']) ?>" alt="Current Image" class="rounded" style="height: 100px;">
                        </div>
                        <input type="file" class="form-control <?= $validation->hasError('image') ? 'is-invalid' : '' ?>" 
                               id="image" name="image" accept="image/*">
                        <div class="invalid-feedback"><?= $validation->getError('image') ?></div>
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= site_url('admin/projects') ?>" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Update Proyek</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
