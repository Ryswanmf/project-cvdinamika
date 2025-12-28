<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
    <!-- Stats Cards -->
    <div class="row g-4 mb-5">
        <!-- Produk Stat -->
        <div class="col-md-4">
            <div class="card text-white h-100 border-0 shadow-sm" style="background: linear-gradient(45deg, #0d6efd, #0a58ca);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="card-title text-white-50 text-uppercase mb-2 small fw-bold">Total Produk</h6>
                            <h2 class="fw-bold mb-0"><?= $total_products ?></h2>
                        </div>
                        <div class="fs-1 text-white-50">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                    <a href="<?= site_url('admin/produk') ?>" class="text-white-50 small mt-3 d-block text-decoration-none">
                        Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Pesan Masuk Stat -->
        <div class="col-md-4">
            <div class="card text-white h-100 border-0 shadow-sm" style="background: linear-gradient(45deg, #dc3545, #b02a37);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="card-title text-white-50 text-uppercase mb-2 small fw-bold">Pesan Belum Dibaca</h6>
                            <h2 class="fw-bold mb-0"><?= $unread_contacts ?></h2>
                        </div>
                        <div class="fs-1 text-white-50">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    <a href="<?= site_url('admin/kontak') ?>" class="text-white-50 small mt-3 d-block text-decoration-none">
                        Buka Inbox <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Blog Stat -->
        <div class="col-md-4">
            <div class="card text-white h-100 border-0 shadow-sm" style="background: linear-gradient(45deg, #198754, #146c43);">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="card-title text-white-50 text-uppercase mb-2 small fw-bold">Artikel Blog</h6>
                            <h2 class="fw-bold mb-0"><?= $total_blogs ?></h2>
                        </div>
                        <div class="fs-1 text-white-50">
                            <i class="fas fa-newspaper"></i>
                        </div>
                    </div>
                    <a href="<?= site_url('admin/blog') ?>" class="text-white-50 small mt-3 d-block text-decoration-none">
                        Kelola Blog <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Messages -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-0">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold"><i class="fas fa-inbox me-2 text-primary"></i>Pesan Masuk Terbaru</h5>
                <a href="<?= site_url('admin/kontak') ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3">Lihat Semua</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted small text-uppercase">
                        <tr>
                            <th class="ps-4 py-3">Pengirim</th>
                            <th class="py-3">Subjek</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 text-end pe-4">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($recent_contacts)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">Tidak ada pesan terbaru.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($recent_contacts as $contact): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="fw-bold text-dark"><?= esc($contact['name']) ?></div>
                                    <small class="text-muted"><?= esc($contact['email']) ?></small>
                                </td>
                                <td>
                                    <div class="text-truncate" style="max-width: 250px;">
                                        <?= esc($contact['subject']) ?>
                                    </div>
                                </td>
                                <td>
                                    <?php if($contact['status'] == 'unread'): ?>
                                        <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3">Baru</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3">Dibaca</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end pe-4 text-muted small">
                                    <?= date('d M Y', strtotime($contact['created_at'])) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
