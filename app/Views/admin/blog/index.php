<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Daftar Artikel</h5>
        <a href="<?= site_url('admin/blog/create') ?>" class="btn btn-primary rounded-pill px-4">
            <i class="fas fa-pen me-2"></i> Tulis Artikel
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted">
                    <tr>
                        <th class="ps-4 py-3">Gambar</th>
                        <th class="py-3">Judul</th>
                        <th class="py-3">Kategori</th>
                        <th class="py-3">Penulis</th>
                        <th class="py-3 text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($blogs)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">Belum ada artikel.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($blogs as $blog): ?>
                        <tr>
                            <td class="ps-4">
                                <img src="<?= base_url('uploads/blog/' . $blog['image']) ?>" alt="" 
                                     class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                            </td>
                            <td>
                                <div class="fw-bold text-dark"><?= esc($blog['title']) ?></div>
                                <small class="text-muted"><?= $blog['created_at'] ?></small>
                            </td>
                            <td>
                                <?= esc($blog['category']) ?>
                            </td>
                            <td><?= esc($blog['author']) ?></td>
                            <td class="text-end pe-4">
                                <a href="<?= site_url('admin/blog/edit/' . $blog['id']) ?>" class="btn btn-sm btn-outline-warning me-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= site_url('admin/blog/delete/' . $blog['id']) ?>" 
                                   class="btn btn-sm btn-outline-danger" 
                                   onclick="return confirm('Hapus artikel ini?');">
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
