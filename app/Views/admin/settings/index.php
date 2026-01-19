<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-0">
                <ul class="nav nav-tabs card-header-tabs" id="settingTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active fw-bold" id="site-tab" data-bs-toggle="tab" data-bs-target="#site" type="button" role="tab" aria-controls="site" aria-selected="true">
                            <i class="fas fa-globe me-2"></i>Profil Website
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-bold" id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="false">
                            <i class="fas fa-user-shield me-2"></i>Keamanan Akun
                        </button>
                    </li>
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content" id="settingTabsContent">
                    
                    <!-- Tab 1: Profil Website -->
                    <div class="tab-pane fade show active" id="site" role="tabpanel" aria-labelledby="site-tab">
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
                                    <i class="fas fa-save me-2"></i> Simpan Profil
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Tab 2: Keamanan Akun -->
                    <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <form action="<?= site_url('admin/settings/update_account') ?>" method="post">
                            <?= csrf_field() ?>
                            
                            <div class="alert alert-info border-0 bg-info bg-opacity-10">
                                <i class="fas fa-info-circle me-2"></i> Kosongkan kolom password jika Anda hanya ingin mengganti nama.
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" value="<?= session()->get('user_name') ?>" disabled>
                                <div class="form-text">Username tidak dapat diubah.</div>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= $user_fullname ?? '' ?>" required>
                            </div>

                            <hr class="my-4">

                            <h6 class="text-muted mb-3 text-uppercase small fw-bold">Ganti Password</h6>

                            <div class="mb-3">
                                <label for="current_password" class="form-label">Password Lama</label>
                                <input type="password" class="form-control" id="current_password" name="current_password">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="new_password" class="form-label">Password Baru</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-warning px-4 rounded-pill">
                                    <i class="fas fa-key me-2"></i> Update Akun
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
