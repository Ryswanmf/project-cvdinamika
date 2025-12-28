<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">Detail Produk</h5>
                <div>
                    <a href="<?= site_url('admin/produk') ?>" class="btn btn-outline-secondary btn-sm me-2">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <a href="<?= site_url('admin/produk/edit/' . $product['id']) ?>" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit me-1"></i> Edit
                    </a>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-5 mb-4">
                        <div class="bg-light p-3 rounded text-center">
                            <img src="<?= base_url('uploads/products/' . $product['image']) ?>" 
                                 alt="<?= $product['name'] ?>" class="img-fluid rounded shadow-sm" 
                                 style="max-height: 400px; object-fit: contain;">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h2 class="fw-bold mb-2"><?= esc($product['name']) ?></h2>
                        <div class="mb-3">
                            <span class="badge bg-primary fs-6"><?= esc($product['category']) ?></span>
                            <span class="badge bg-success fs-6 ms-2">Rp <?= number_format($product['price'], 0, ',', '.') ?></span>
                        </div>
                        
                        <h5 class="mt-4 text-muted">Deskripsi Singkat</h5>
                        <p class="lead fs-6"><?= nl2br(esc($product['description'])) ?></p>

                        <h5 class="mt-4 text-muted">Detail Spesifikasi</h5>
                        <div class="bg-light p-3 rounded border">
                            <?php if(!empty($product['details'])): ?>
                                <?= nl2br(esc($product['details'])) ?>
                            <?php else: ?>
                                <em class="text-muted">Tidak ada detail spesifikasi.</em>
                            <?php endif; ?>
                        </div>

                        <div class="mt-4 text-muted small">
                            <i class="fas fa-clock me-1"></i> Dibuat pada: <?= $product['created_at'] ?>
                            <br>
                            <i class="fas fa-edit me-1"></i> Terakhir diupdate: <?= $product['updated_at'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
