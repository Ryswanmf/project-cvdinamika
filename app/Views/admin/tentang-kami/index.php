<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <form action="<?= site_url('admin/tentang-kami/update') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <!-- Section Sejarah & Gambar -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="mb-0 fw-bold">Konten Utama</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Gambar 1 (Kiri Atas)</label>
                            <?php if(!empty($settings['about_image_1'])): ?>
                                <div class="mb-2">
                                    <img src="<?= base_url('uploads/about/' . $settings['about_image_1']) ?>" class="img-thumbnail w-100" style="height: 250px; object-fit: cover;">
                                </div>
                            <?php endif; ?>
                            <input type="file" class="form-control" name="about_image_1" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Gambar 2 (Kiri Bawah)</label>
                            <?php if(!empty($settings['about_image_2'])): ?>
                                <div class="mb-2">
                                    <img src="<?= base_url('uploads/about/' . $settings['about_image_2']) ?>" class="img-thumbnail w-100" style="height: 250px; object-fit: cover;">
                                </div>
                            <?php endif; ?>
                            <input type="file" class="form-control" name="about_image_2" accept="image/*">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="about_history" class="form-label fw-bold">Sejarah Singkat</label>
                        <textarea class="form-control" id="about_history" name="about_history" rows="6"><?= $settings['about_history'] ?? '' ?></textarea>
                        <div class="form-text">Ceritakan sejarah berdirinya perusahaan, legalitas, dan fokus bisnis utama.</div>
                    </div>
                </div>
            </div>

            <!-- Section Visi & Misi -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="mb-0 fw-bold">Visi & Misi</h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <label for="about_vision" class="form-label fw-bold">Visi Perusahaan</label>
                        <textarea class="form-control" id="about_vision" name="about_vision" rows="3"><?= $settings['about_vision'] ?? '' ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="about_mission" class="form-label fw-bold">Misi Perusahaan</label>
                        <textarea class="form-control" id="about_mission" name="about_mission" rows="5"><?= $settings['about_mission'] ?? '' ?></textarea>
                        <div class="form-text">Anda bisa menggunakan HTML list (&lt;li&gt;) atau baris baru untuk memisahkan poin misi.</div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary px-5 rounded-pill">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>