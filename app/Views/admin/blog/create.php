<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold">Tulis Artikel Baru</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= site_url('admin/blog/store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Artikel</label>
                        <input type="text" class="form-control <?= $validation->hasError('title') ? 'is-invalid' : '' ?>" 
                               id="title" name="title" value="<?= old('title') ?>" required>
                        <div class="invalid-feedback"><?= $validation->getError('title') ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <input type="text" class="form-control <?= $validation->hasError('category') ? 'is-invalid' : '' ?>" 
                               id="category" name="category" value="<?= old('category') ?>" placeholder="Contoh: Tips Interior, Berita, dll" required>
                        <div class="invalid-feedback"><?= $validation->getError('category') ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Isi Artikel</label>
                        <textarea class="form-control" id="content" name="content" rows="10" required><?= old('content') ?></textarea>
                        <div class="form-text">Anda bisa menggunakan HTML basic untuk formatting.</div>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label">Gambar Utama</label>
                        <input type="file" class="form-control <?= $validation->hasError('image') ? 'is-invalid' : '' ?>" 
                               id="image" name="image" accept="image/*" required>
                        <div class="invalid-feedback"><?= $validation->getError('image') ?></div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= site_url('admin/blog') ?>" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Terbitkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
