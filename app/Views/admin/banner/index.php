<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Daftar Banner</h5>
        <a href="<?= site_url('admin/banner/create') ?>" class="btn btn-primary rounded-pill px-4">
            <i class="fas fa-plus me-2"></i> Tambah Banner
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted">
                    <tr>
                        <th class="ps-4 py-3">Gambar</th>
                        <th class="py-3">Judul & Subjudul</th>
                        <th class="py-3">Urutan</th>
                        <th class="py-3 text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($banners)): ?>
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">Belum ada banner.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($banners as $banner): ?>
                        <tr>
                            <td class="ps-4">
                                <img src="<?= base_url('uploads/banners/'.$banner['image']) ?>" class="rounded shadow-sm" width="120" style="object-fit: cover;">
                            </td>
                            <td>
                                <div class="fw-bold text-dark"><?= esc($banner['title'] ?: '-') ?></div>
                                <small class="text-muted"><?= esc($banner['subtitle']) ?></small>
                            </td>
                            <td><?= $banner['sort_order'] ?></td>
                            <td class="text-end pe-4">
                                <a href="<?= site_url('admin/banner/delete/'.$banner['id']) ?>" 
                                   class="btn btn-sm btn-outline-danger" 
                                   onclick="return confirm('Hapus banner ini?')">
                                    <i class="fas fa-trash"></i>
                                </a>
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
