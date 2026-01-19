<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Daftar Pertanyaan (FAQ)</h5>
        <a href="<?= site_url('admin/faq/create') ?>" class="btn btn-primary rounded-pill px-4">
            <i class="fas fa-plus me-2"></i> Tambah Baru
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted">
                    <tr>
                        <th class="ps-4 py-3" width="50">#</th>
                        <th class="py-3">Pertanyaan</th>
                        <th class="py-3">Jawaban</th>
                        <th class="py-3 text-end pe-4" width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($faqs)): ?>
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">Belum ada FAQ.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($faqs as $faq): ?>
                        <tr>
                            <td class="ps-4 fw-bold"><?= $faq['sort_order'] ?></td>
                            <td class="fw-bold text-dark"><?= esc($faq['question']) ?></td>
                            <td><?= character_limiter(strip_tags($faq['answer']), 80) ?></td>
                            <td class="text-end pe-4">
                                <a href="<?= site_url('admin/faq/edit/'.$faq['id']) ?>" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></a>
                                <a href="<?= site_url('admin/faq/delete/'.$faq['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus FAQ ini?')"><i class="fas fa-trash"></i></a>
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
