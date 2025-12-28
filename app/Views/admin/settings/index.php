<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold"><i class="fas fa-cog me-2"></i>Pengaturan Situs</h5>
            </div>
            <div class="card-body p-4">
                <form action="/admin/settings/update" method="post">
                    <?= csrf_field() ?>
                    
                    <h6 class="text-muted mb-3 text-uppercase small fw-bold">Informasi Umum</h6>
                    <div class="mb-3">
                        <label for="site_title" class="form-label">Nama Situs / Perusahaan</label>
                        <input type="text" class="form-control" id="site_title" name="site_title" value="<?= $settings['site_title'] ?? '' ?>">
                    </div>

                    <div class="mb-4">
                        <label for="site_description" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control" id="site_description" name="site_description" rows="3"><?= $settings['site_description'] ?? '' ?></textarea>
                        <div class="form-text">Deskripsi ini akan muncul di footer dan meta tag SEO.</div>
                    </div>

                    <h6 class="text-muted mb-3 text-uppercase small fw-bold pt-3 border-top">Kontak & Alamat</h6>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="contact_email" class="form-label">Email Resmi</label>
                            <input type="email" class="form-control" id="contact_email" name="contact_email" value="<?= $settings['contact_email'] ?? '' ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="contact_phone" class="form-label">Nomor Telepon / WhatsApp</label>
                            <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="<?= $settings['contact_phone'] ?? '' ?>">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="contact_address" class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" id="contact_address" name="contact_address" rows="3"><?= $settings['contact_address'] ?? '' ?></textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4 rounded-pill">
                            <i class="fas fa-save me-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
