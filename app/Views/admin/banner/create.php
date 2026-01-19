<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold">Tambah Banner Baru</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= site_url('admin/banner/store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Utama (Opsional)</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Contoh: Promo Spesial">
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sub Judul (Opsional)</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Contoh: Diskon 50% untuk pemasangan bulan ini">
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label">Link Tautan (Opsional)</label>
                        <input type="text" class="form-control" id="link" name="link" placeholder="Contoh: /produk/detail/1">
                    </div>

                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Urutan</label>
                        <input type="number" class="form-control" id="sort_order" name="sort_order" value="0">
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label">Gambar Banner (Wajib)</label>
                        <input type="file" class="form-control <?= $validation->hasError('image') ? 'is-invalid' : '' ?>" 
                               id="image" name="image" accept="image/*" required>
                        <div class="invalid-feedback"><?= $validation->getError('image') ?></div>
                        <div class="form-text">Rekomendasi ukuran: 1920x800 pixel. Max 5MB.</div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= site_url('admin/banner') ?>" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Simpan Banner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
