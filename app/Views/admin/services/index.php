<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Daftar Layanan</h5>
        <a href="<?= site_url('admin/services/create') ?>" class="btn btn-primary rounded-pill px-4">
            <i class="fas fa-plus me-2"></i> Tambah Layanan
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted">
                    <tr>
                        <th class="ps-4 py-3">Gambar & Icon</th>
                        <th class="py-3">Judul Layanan</th>
                        <th class="py-3">Deskripsi Singkat</th>
                        <th class="py-3">Urutan</th>
                        <th class="py-3 text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($services)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">Belum ada layanan.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($services as $service): ?>
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <img src="<?= base_url('uploads/services/'.$service['image']) ?>" class="rounded me-3" width="50" height="50" style="object-fit: cover;">
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center border" style="width: 35px; height: 35px;">
                                        <i class="fas <?= $service['icon'] ?> text-primary small"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="fw-bold text-dark"><?= esc($service['title']) ?></td>
                            <td><?= character_limiter(esc($service['description']), 60) ?></td>
                            <td><?= $service['sort_order'] ?></td>
                            <td class="text-end pe-4">
                                <a href="<?= site_url('admin/services/edit/'.$service['id']) ?>" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></a>
                                <a href="<?= site_url('admin/services/delete/'.$service['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus layanan ini?')"><i class="fas fa-trash"></i></a>
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
