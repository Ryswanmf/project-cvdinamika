<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">
            <a href="<?= base_url('admin/product-catalog') ?>" class="text-muted me-2">
                <i class="fas fa-arrow-left"></i>
            </a>
            <?= esc($category['name']) ?>
        </h5>
        <button class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#addBrandModal">
            <i class="fas fa-plus me-2"></i> Tambah Brand
        </button>
    </div>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<!-- Brands Grid -->
<div class="row">
    <?php if (empty($category['brands'])): ?>
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="fas fa-folder-open fa-4x text-muted mb-3"></i>
                    <h5>Belum ada brand dalam kategori ini</h5>
                    <p class="text-muted">Klik tombol "Tambah Brand" untuk memulai</p>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($category['brands'] as $brand): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card folder-card h-100">
                    <div class="card-body text-center">
                        <a href="<?= base_url('admin/product-catalog/brand/' . $categoryId . '/' . $brand['id']) ?>" 
                           class="text-decoration-none">
                            <?php if ($brand['has_subfolders']): ?>
                                <i class="fas fa-folder fa-5x text-warning mb-3"></i>
                            <?php else: ?>
                                <i class="fas fa-images fa-5x text-success mb-3"></i>
                            <?php endif; ?>
                            <h5 class="card-title text-dark"><?= esc($brand['name']) ?></h5>
                            <p class="text-muted mb-0">
                                <?php if ($brand['has_subfolders']): ?>
                                    <i class="fas fa-folder-tree"></i> 
                                    <?= count($brand['subfolders'] ?? []) ?> Koleksi
                                <?php else: ?>
                                    <i class="fas fa-image"></i> 
                                    <?= count($brand['items'] ?? []) ?> Produk
                                <?php endif; ?>
                            </p>
                        </a>
                        <div class="mt-3 d-flex gap-2 justify-content-center">
                            <button class="btn btn-sm btn-warning" onclick="editBrand('<?= $brand['id'] ?>', '<?= esc($brand['name']) ?>')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <a href="<?= base_url('admin/product-catalog/delete-brand/' . $categoryId . '/' . $brand['id']) ?>" 
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Yakin ingin menghapus brand ini beserta semua produknya?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<!-- Add Brand Modal -->
<div class="modal fade" id="addBrandModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('admin/product-catalog/add-brand/' . $categoryId) ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="fas fa-folder-plus"></i> Tambah Brand Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Brand <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required 
                               placeholder="Contoh: LX HAUSYS">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipe Folder</label>
                        <div class="form-check">
                            <input type="radio" id="noSubfolders" name="has_subfolders" value="no" 
                                   class="form-check-input" checked>
                            <label class="form-check-label" for="noSubfolders">
                                <i class="fas fa-images text-success"></i> Langsung Produk (Tanpa Sub-folder)
                            </label>
                            <small class="form-text text-muted d-block">
                                Untuk brand yang langsung berisi foto-foto produk
                            </small>
                        </div>
                        <div class="form-check mt-2">
                            <input type="radio" id="hasSubfolders" name="has_subfolders" value="yes" 
                                   class="form-check-input">
                            <label class="form-check-label" for="hasSubfolders">
                                <i class="fas fa-folder-tree text-warning"></i> Punya Sub-folder/Koleksi
                            </label>
                            <small class="form-text text-muted d-block">
                                Untuk brand yang punya koleksi/seri berbeda (seperti Gerflor Mipolam 180, dll)
                            </small>
                        </div>
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

<!-- Edit Brand Modal -->
<div class="modal fade" id="editBrandModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editBrandForm" method="post">
                <?= csrf_field() ?>
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Brand</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Brand <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="editBrandName" class="form-control" required>
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

<script>
function editBrand(brandId, brandName) {
    document.getElementById('editBrandName').value = brandName;
    document.getElementById('editBrandForm').action = '<?= base_url('admin/product-catalog/edit-brand/' . $categoryId . '/') ?>' + brandId;
    new bootstrap.Modal(document.getElementById('editBrandModal')).show();
}
</script>

<style>
.folder-card {
    transition: all 0.3s ease;
    border: 2px solid #e3e6f0;
    cursor: pointer;
}

.folder-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    border-color: #4e73df;
}
</style>

<?= $this->endSection() ?>
