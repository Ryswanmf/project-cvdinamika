<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 border-0">
        <h5 class="mb-0 fw-bold">Daftar Pesan Masuk</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted">
                    <tr>
                        <th class="ps-4 py-3">Status</th>
                        <th class="py-3">Pengirim</th>
                        <th class="py-3">Subjek</th>
                        <th class="py-3">Tanggal</th>
                        <th class="py-3 text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($contacts)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">Belum ada pesan masuk.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($contacts as $contact): ?>
                        <tr class="<?= $contact['status'] == 'unread' ? 'fw-bold bg-light' : '' ?>">
                            <td class="ps-4">
                                <?php if($contact['status'] == 'unread'): ?>
                                    <span class="badge bg-danger rounded-pill">Baru</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary rounded-pill">Dibaca</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?= esc($contact['name']) ?>
                                <br>
                                <small class="text-muted fw-normal"><?= esc($contact['email']) ?></small>
                            </td>
                            <td>
                                <?= esc($contact['subject']) ?>
                            </td>
                            <td class="text-muted small">
                                <?= $contact['created_at'] ?>
                            </td>
                            <td class="text-end pe-4">
                                <a href="<?= site_url('admin/kontak/detail/' . $contact['id']) ?>" class="btn btn-sm btn-outline-primary me-1" title="Baca">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?= site_url('admin/kontak/delete/' . $contact['id']) ?>" 
                                   class="btn btn-sm btn-outline-danger" 
                                   onclick="return confirm('Hapus pesan ini?');" title="Hapus">
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
