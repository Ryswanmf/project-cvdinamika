<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold">Tambah Testimonial</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= site_url('admin/testimonial/store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Pelanggan</label>
                        <input type="text" name="name" class="form-control" required placeholder="Contoh: Budi Santoso">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Posisi / Keterangan</label>
                        <input type="text" name="position" class="form-control" placeholder="Contoh: Pemilik Rumah Type 45">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Pesan Testimonial</label>
                        <textarea name="message" class="form-control" rows="4" required placeholder="Tuliskan ulasan pelanggan di sini..."></textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Rating (1-5)</label>
                            <input type="number" name="rating" class="form-control" value="5" min="1" max="5">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Foto Pelanggan (Opsional)</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-3">
                        <a href="<?= site_url('admin/testimonial') ?>" class="btn btn-light px-4 rounded-pill">Batal</a>
                        <button type="submit" class="btn btn-primary px-4 rounded-pill">
                            <i class="fas fa-save me-2"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>