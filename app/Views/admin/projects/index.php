<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Daftar Proyek</h5>
        <a href="<?= site_url('admin/projects/create') ?>" class="btn btn-primary rounded-pill px-4">
            <i class="fas fa-plus me-2"></i> Tambah Proyek
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted">
                    <tr>
                        <th class="ps-4 py-3">Gambar</th>
                        <th class="py-3">Judul Proyek</th>
                        <th class="py-3">Kategori</th>
                        <th class="py-3">Klien</th>
                        <th class="py-3 text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($projects)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">Belum ada proyek.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($projects as $project): ?>
                        <tr>
                            <td class="ps-4">
                                <img src="<?= base_url('uploads/projects/' . $project['image']) ?>" alt="<?= $project['title'] ?>" 
                                     class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                            </td>
                            <td>
                                <div class="fw-bold text-dark"><?= esc($project['title']) ?></div>
                                <small class="text-muted text-truncate d-inline-block" style="max-width: 200px;">
                                    <?= esc($project['description']) ?>
                                </small>
                            </td>
                            <td>
                                <span class="badge bg-info bg-opacity-10 text-info rounded-pill px-3">
                                    <?= esc($project['category']) ?>
                                </span>
                            </td>
                            <td>
                                <?= esc($project['client_name'] ?? '-') ?>
                            </td>
                            <td class="text-end pe-4">
                                <a href="<?= site_url('admin/projects/edit/' . $project['id']) ?>" class="btn btn-sm btn-outline-warning me-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= site_url('admin/projects/delete/' . $project['id']) ?>" 
                                   class="btn btn-sm btn-outline-danger" 
                                   onclick="return confirm('Yakin ingin menghapus proyek ini?');">
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
