<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">
            <a href="<?= base_url('admin/product-catalog/category/' . $categoryId) ?>" class="text-muted me-2">
                <i class="fas fa-arrow-left"></i>
            </a>
            <?= esc($brand['name']) ?>
        </h5>
        <?php if ($brand['has_subfolders']): ?>
            <button class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#addCollectionModal">
                <i class="fas fa-plus me-2"></i> Tambah Koleksi
            </button>
        <?php else: ?>
            <button class="btn btn-success rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#uploadProductsModal">
                <i class="fas fa-upload me-2"></i> Upload Produk
            </button>
        <?php endif; ?>
    </div>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<div class="row">
    <?php if ($brand['has_subfolders']): ?>
        <!-- Show Collections/Subfolders -->
        <?php if (empty($brand['subfolders'])): ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center py-5">
                        <i class="fas fa-folder-open fa-4x text-muted mb-3"></i>
                        <h5>Belum ada koleksi di brand ini</h5>
                        <p class="text-muted">Klik "Tambah Koleksi" untuk membuat folder koleksi</p>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($brand['subfolders'] as $collection): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card folder-card h-100">
                        <div class="card-body text-center">
                            <a href="<?= base_url('admin/product-catalog/collection/' . $categoryId . '/' . $brandId . '/' . $collection['id']) ?>" 
                               class="text-decoration-none">
                                <i class="fas fa-folder fa-5x text-info mb-3"></i>
                                <h5 class="card-title text-dark"><?= esc($collection['name']) ?></h5>
                                <p class="text-muted mb-0">
                                    <i class="fas fa-image"></i> <?= count($collection['items'] ?? []) ?> Produk
                                </p>
                            </a>
                            <div class="mt-3 d-flex gap-2 justify-content-center">
                                <button class="btn btn-sm btn-warning" onclick="editCollection('<?= $collection['id'] ?>', '<?= esc($collection['name']) ?>')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="<?= base_url('admin/product-catalog/delete-collection/' . $categoryId . '/' . $brandId . '/' . $collection['id']) ?>" 
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Yakin ingin menghapus koleksi ini beserta semua produknya?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php else: ?>
        <!-- Show Direct Products -->
        <?php if (empty($brand['items'])): ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center py-5">
                        <i class="fas fa-images fa-4x text-muted mb-3"></i>
                        <h5>Belum ada produk di brand ini</h5>
                        <p class="text-muted">Klik "Upload Produk" untuk menambahkan foto</p>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($brand['items'] as $item): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card product-card">
                        <img src="<?= base_url($item['image']) ?>" class="card-img-top" alt="<?= esc($item['name']) ?>">
                        <div class="card-body">
                            <h6 class="card-title"><?= esc($item['name']) ?></h6>
                            <div class="btn-group w-100" role="group">
                                <button type="button" class="btn btn-sm btn-warning" 
                                        onclick="editProduct('<?= esc($item['id']) ?>', '<?= esc($item['name']) ?>', '<?= esc($item['description'] ?? '') ?>')">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <a href="<?= base_url('admin/product-catalog/delete-product/' . $categoryId . '/' . $brandId . '/' . $item['id']) ?>" 
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
    <?php endif; ?>
</div>

<!-- Add Collection Modal -->
<div class="modal fade" id="addCollectionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('admin/product-catalog/add-collection/' . $categoryId . '/' . $brandId) ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="fas fa-folder-plus"></i> Tambah Koleksi Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Koleksi <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required 
                               placeholder="Contoh: Polyflex UNI SD">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Upload Products Modal -->
<div class="modal fade" id="uploadProductsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url('admin/product-catalog/upload-products') ?>" method="post" enctype="multipart/form-data" id="uploadProductsForm">
                <?= csrf_field() ?>
                <input type="hidden" name="category_id" value="<?= $categoryId ?>">
                <input type="hidden" name="brand_id" value="<?= $brandId ?>">
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

<!-- Edit Collection Modal -->
<div class="modal fade" id="editCollectionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editCollectionForm" method="post">
                <?= csrf_field() ?>
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Koleksi</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Koleksi <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="editCollectionName" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.folder-card, .product-card {
    transition: all 0.3s ease;
}

.folder-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.15);
}

.product-card img {
    height: 200px;
    object-fit: cover;
}
</style>

<script>
function editCollection(collectionId, collectionName) {
    document.getElementById('editCollectionName').value = collectionName;
    document.getElementById('editCollectionForm').action = '<?= base_url('admin/product-catalog/edit-collection/' . $categoryId . '/' . $brandId . '/') ?>' + collectionId;
    new bootstrap.Modal(document.getElementById('editCollectionModal')).show();
}

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
    document.getElementById('editProductForm').action = '<?= base_url('admin/product-catalog/edit-product/' . $categoryId . '/' . $brandId) ?>';
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
