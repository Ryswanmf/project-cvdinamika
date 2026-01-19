<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Daftar Testimonial</h5>
        <a href="<?= site_url('admin/testimonial/create') ?>" class="btn btn-primary rounded-pill px-4">
            <i class="fas fa-plus me-2"></i> Tambah Baru
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted">
                    <tr>
                        <th class="ps-4 py-3">Nama Pelanggan</th>
                        <th class="py-3">Status</th>
                        <th class="py-3">Pesan</th>
                        <th class="py-3">Rating</th>
                        <th class="py-3 text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($testimonials)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">Belum ada testimonial.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($testimonials as $testi): ?>
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <?php if(!empty($testi['image'])): ?>
                                        <img src="<?= base_url('uploads/testimonial/'.$testi['image']) ?>" class="rounded-circle me-3" width="40" height="40" style="object-fit: cover;">
                                    <?php else: ?>
                                        <div class="bg-secondary bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="fas fa-user text-secondary"></i>
                                        </div>
                                    <?php endif; ?>
                                    <div>
                                        <div class="fw-bold text-dark"><?= esc($testi['name']) ?></div>
                                        <small class="text-muted"><?= esc($testi['position']) ?></small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?php if(($testi['status'] ?? 'approved') == 'pending'): ?>
                                    <span class="badge bg-warning text-dark">Pending</span>
                                <?php elseif(($testi['status'] ?? 'approved') == 'rejected'): ?>
                                    <span class="badge bg-danger">Ditolak</span>
                                <?php else: ?>
                                    <span class="badge bg-success">Aktif</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <small class="text-muted fst-italic">"<?= character_limiter(esc($testi['message']), 60) ?>"</small>
                            </td>
                            <td>
                                <div class="text-warning small">
                                    <?php for($i=0; $i<$testi['rating']; $i++): ?>
                                        <i class="fas fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                            </td>
                            <td class="text-end pe-4">
                                <?php if(($testi['status'] ?? 'approved') == 'pending'): ?>
                                    <a href="<?= site_url('admin/testimonial/approve/'.$testi['id']) ?>" 
                                       class="btn btn-sm btn-success me-1" title="Setujui">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="<?= site_url('admin/testimonial/reject/'.$testi['id']) ?>" 
                                       class="btn btn-sm btn-warning me-1" title="Tolak">
                                        <i class="fas fa-times"></i>
                                    </a>
                                <?php endif; ?>
                                <a href="<?= site_url('admin/testimonial/delete/'.$testi['id']) ?>" 
                                   class="btn btn-sm btn-outline-danger" 
                                   onclick="return confirm('Yakin ingin menghapus testimonial ini?')" title="Hapus">
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