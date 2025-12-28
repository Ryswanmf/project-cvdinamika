<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Daftar Produk</h5>
        <a href="<?= site_url('admin/produk/create') ?>" class="btn btn-primary rounded-pill px-4">
            <i class="fas fa-plus me-2"></i> Tambah Produk
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light text-muted">
                    <tr>
                        <th class="ps-4 py-3">Gambar</th>
                        <th class="py-3">Produk</th>
                        <th class="py-3">Kategori</th>
                        <th class="py-3">Harga</th>
                        <th class="py-3 text-end pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($products)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">Belum ada produk.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($products as $product): ?>
                        <tr>
                            <td class="ps-4">
                                <img src="<?= base_url('uploads/products/' . $product['image']) ?>" alt="<?= $product['name'] ?>" 
                                     class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                            </td>
                            <td>
                                <div class="fw-bold text-dark"><?= esc($product['name']) ?></div>
                                <small class="text-muted text-truncate d-inline-block" style="max-width: 200px;">
                                    <?= esc($product['description']) ?>
                                </small>
                            </td>
                            <td>
                                <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3">
                                    <?= esc($product['category'] ?? 'Uncategorized') ?>
                                </span>
                            </td>
                            <td class="fw-bold text-success">
                                Rp <?= number_format($product['price'], 0, ',', '.') ?>
                            </td>
                            <td class="text-end pe-4">
                                <a href="<?= site_url('admin/produk/detail/' . $product['id']) ?>" class="btn btn-sm btn-outline-info me-1" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?= site_url('admin/produk/edit/' . $product['id']) ?>" class="btn btn-sm btn-outline-warning me-1" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= site_url('admin/produk/delete/' . $product['id']) ?>" 
                                   class="btn btn-sm btn-outline-danger" 
                                   onclick="return confirm('Yakin ingin menghapus produk ini?');" title="Hapus">
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
