<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Daftar Tim Kami</h5>
        <a href="<?= site_url('admin/team/create') ?>" class="btn btn-primary rounded-pill px-4">
            <i class="fas fa-plus me-2"></i> Tambah Anggota
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted">
                    <tr>
                        <th class="ps-4 py-3">Foto</th>
                        <th class="py-3">Nama Lengkap</th>
                        <th class="py-3">Posisi</th>
                        <th class="py-3 text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($teams)): ?>
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">Belum ada anggota tim.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($teams as $team): ?>
                        <tr>
                            <td class="ps-4">
                                <img src="<?= base_url('uploads/team/'.$team['image']) ?>" class="rounded-circle border" width="50" height="50" style="object-fit: cover;">
                            </td>
                            <td>
                                <div class="fw-bold text-dark"><?= esc($team['name']) ?></div>
                            </td>
                            <td>
                                <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3">
                                    <?= esc($team['position']) ?>
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <a href="<?= site_url('admin/team/delete/'.$team['id']) ?>" 
                                   class="btn btn-sm btn-outline-danger" 
                                   onclick="return confirm('Yakin ingin menghapus anggota ini?')" title="Hapus">
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