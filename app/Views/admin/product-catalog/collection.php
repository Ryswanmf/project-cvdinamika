<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">
            <a href="<?= base_url('admin/product-catalog/brand/' . $categoryId . '/' . $brandId) ?>" class="text-muted me-2">
                <i class="fas fa-arrow-left"></i>
            </a>
            <?= esc($collection['name']) ?>
        </h5>
        <button class="btn btn-success rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#uploadProductsModal">
            <i class="fas fa-upload me-2"></i> Upload Produk
        </button>
    </div>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<!-- Products Grid -->
<div class="row">
    <?php if (empty($collection['items'])): ?>
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="fas fa-images fa-4x text-muted mb-3"></i>
                    <h5>Belum ada produk di koleksi ini</h5>
                    <p class="text-muted">Klik "Upload Produk" untuk menambahkan foto</p>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($collection['items'] as $item): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card product-card">
                    <img src="<?= base_url($item['image']) ?>" class="card-img-top" alt="<?= esc($item['name']) ?>">
                    <div class="card-body">
                        <h6 class="card-title"><?= esc($item['name']) ?></h6>
                        <p class="card-text text-muted small"><?= esc($item['description']) ?></p>
                        <div class="btn-group w-100" role="group">
                            <button type="button" class="btn btn-sm btn-warning" 
                                    onclick="editProduct('<?= esc($item['id']) ?>', '<?= esc($item['name']) ?>', '<?= esc($item['description']) ?>')">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <a href="<?= base_url('admin/product-catalog/delete-product/' . $categoryId . '/' . $brandId . '/' . $item['id'] . '/' . $collectionId) ?>" 
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<!-- Upload Products Modal -->
<div class="modal fade" id="uploadProductsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url('admin/product-catalog/upload-products') ?>" method="post" enctype="multipart/form-data" id="uploadProductsForm">
                <?= csrf_field() ?>
                <input type="hidden" name="category_id" value="<?= $categoryId ?>">
                <input type="hidden" name="brand_id" value="<?= $brandId ?>">
                <input type="hidden" name="collection_id" value="<?= $collectionId ?>">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title"><i class="fas fa-upload"></i> Upload Produk</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Pilih Foto Produk <span class="text-danger">*</span></label>
                        <input type="file" name="products[]" class="form-control" multiple 
                               accept="image/*" required id="productFiles">
                        <small class="form-text text-muted">
                            Anda bisa memilih beberapa file sekaligus. Nama file akan otomatis menjadi nama produk. Format: JPG, PNG, WebP
                        </small>
                    </div>
                    <div id="preview" class="row mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-upload"></i> Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.product-card {
    transition: all 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.15);
}

.product-card img {
    height: 200px;
    object-fit: cover;
}
</style>

<script>
document.getElementById('productFiles')?.addEventListener('change', function(e) {
    const preview = document.getElementById('preview');
    preview.innerHTML = '';
    
    Array.from(e.target.files).forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function(event) {
            const col = document.createElement('div');
            col.className = 'col-md-4 mb-2';
            // Get filename without extension
            const nameWithoutExt = file.name.substring(0, file.name.lastIndexOf('.')) || file.name;
            col.innerHTML = `
                <div class="card">
                    <img src="${event.target.result}" class="card-img-top" style="height: 100px; object-fit: cover;">
                    <div class="card-body p-2">
                        <input type="text" name="product_names[]" class="form-control form-control-sm mb-1" 
                               value="${nameWithoutExt}" required 
                               placeholder="Nama produk">
                        <small class="text-muted" style="font-size: 0.7rem;">${file.name}</small>
                    </div>
                </div>
            `;
            preview.appendChild(col);
        };
        reader.readAsDataURL(file);
    });
});

function editProduct(productId, productName, productDesc) {
    document.getElementById('editProductId').value = productId;
    document.getElementById('editProductName').value = productName;
    document.getElementById('editProductDesc').value = productDesc || '';
    document.getElementById('editProductForm').action = '<?= base_url('admin/product-catalog/edit-product/' . $categoryId . '/' . $brandId . '/' . $collectionId) ?>';
    new bootstrap.Modal(document.getElementById('editProductModal')).show();
}
</script>

<!-- Modal Edit Product -->
<div class="modal fade" id="editProductModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editProductForm" method="POST">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title">Edit Nama Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editProductId" name="product_id">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="editProductName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi (Opsional)</label>
                        <textarea class="form-control" id="editProductDesc" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
