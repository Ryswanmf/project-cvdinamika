<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold">Tambah Anggota Tim</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= site_url('admin/team/store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" required placeholder="Contoh: John Doe">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Posisi / Jabatan</label>
                        <input type="text" name="position" class="form-control" required placeholder="Contoh: Senior Architect">
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label">Foto Profil</label>
                        <input type="file" name="image" class="form-control" required accept="image/*">
                        <div class="form-text">Format: JPG, PNG. Ukuran maks 2MB.</div>
                    </div>

                    <h6 class="text-muted mb-3 text-uppercase small fw-bold pt-2 border-top">Media Sosial (Opsional)</h6>
                    <div class="row g-2">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Link Facebook</label>
                            <input type="url" name="social_fb" class="form-control" placeholder="https://facebook.com/username">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Link Instagram</label>
                            <input type="url" name="social_instagram" class="form-control" placeholder="https://instagram.com/username">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-3">
                        <a href="<?= site_url('admin/team') ?>" class="btn btn-light px-4 rounded-pill">Batal</a>
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