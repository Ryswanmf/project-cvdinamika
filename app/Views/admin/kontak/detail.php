<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Detail Pesan</h5>
                <a href="<?= site_url('admin/kontak') ?>" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-4 border-bottom pb-3">
                    <div>
                        <h4 class="mb-1"><?= esc($contact['subject']) ?></h4>
                        <div class="text-muted">
                            Dari: <strong><?= esc($contact['name']) ?></strong> &lt;<?= esc($contact['email']) ?>&gt;
                        </div>
                    </div>
                    <div class="text-end text-muted small">
                        <?= $contact['created_at'] ?>
                    </div>
                </div>

                <div class="p-3 bg-light rounded border mb-4" style="min-height: 200px; white-space: pre-wrap; font-family: sans-serif;">
<?= esc($contact['message']) ?>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="mailto:<?= esc($contact['email']) ?>?subject=Re: <?= urlencode($contact['subject']) ?>" class="btn btn-primary">
                        <i class="fas fa-reply me-2"></i> Balas via Email
                    </a>
                    <a href="<?= site_url('admin/kontak/delete/' . $contact['id']) ?>" 
                       class="btn btn-outline-danger" 
                       onclick="return confirm('Hapus pesan ini?');">
                        <i class="fas fa-trash me-2"></i> Hapus Pesan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
