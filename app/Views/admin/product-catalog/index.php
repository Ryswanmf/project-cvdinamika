<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="fas fa-folder-tree"></i> Katalog Produk</h5>
        <button class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            <i class="fas fa-plus me-2"></i> Tambah Kategori
        </button>
    </div>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<!-- Categories Grid -->
<div class="row">
    <?php if (empty($catalog['categories'])): ?>
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="fas fa-folder-open fa-4x text-muted mb-3"></i>
                    <h5>Belum ada kategori produk</h5>
                    <p class="text-muted">Klik tombol "Tambah Kategori" untuk memulai</p>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($catalog['categories'] as $category): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card folder-card h-100 hover-shadow">
                    <div class="card-body text-center">
                        <a href="<?= base_url('admin/product-catalog/category/' . $category['id']) ?>" class="text-decoration-none">
                            <i class="fas fa-folder fa-5x text-primary mb-3"></i>
                            <h5 class="card-title text-dark"><?= esc($category['name']) ?></h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-layer-group"></i> 
                                <?= count($category['brands'] ?? []) ?> Brand
                            </p>
                        </a>
                        
                        <!-- File Deskripsi Info -->
                        <div class="mb-2">
                            <?php 
                            $fileExists = false;
                            if (!empty($category['description_file'])) {
                                $filePath = FCPATH . 'uploads/brochures/' . $category['description_file'];
                                $fileExists = file_exists($filePath);
                            }
                            ?>
                            <?php if ($fileExists): ?>
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                    <span class="badge bg-success text-truncate" 
                                          style="max-width: 150px;" 
                                          title="<?= esc($category['description_file']) ?>">
                                        <i class="fas fa-check-circle"></i> File tersedia
                                    </span>
                                    <button class="btn btn-danger btn-sm py-0 px-2" 
                                            onclick="deleteDescription('<?= $category['id'] ?>', '<?= esc($category['name']) ?>')" 
                                            title="Hapus file deskripsi">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            <?php else: ?>
                                <span class="badge bg-secondary">
                                    <i class="fas fa-exclamation-circle"></i> Belum upload
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="mt-3 d-flex gap-1 justify-content-center flex-wrap">
                            <button class="btn btn-sm btn-info" onclick="uploadDescription('<?= $category['id'] ?>', '<?= esc($category['name']) ?>', '<?= esc($category['description_file'] ?? '') ?>')">
                                <i class="fas fa-upload"></i>
                            </button>
                            <button class="btn btn-sm btn-warning" onclick="editCategory('<?= $category['id'] ?>', '<?= esc($category['name']) ?>')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <a href="<?= base_url('admin/product-catalog/delete-category/' . $category['id']) ?>" 
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Yakin ingin menghapus kategori ini? Semua brand dan produk di dalamnya akan ikut terhapus!')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('admin/product-catalog/add-category') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="fas fa-folder-plus"></i> Tambah Kategori Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required 
                               placeholder="Contoh: Homogeneous Sheet">
                        <small class="form-text text-muted">
                            Nama kategori akan otomatis diubah menjadi ID (URL-friendly)
                        </small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">File Deskripsi (opsional)</label>
                        <input type="text" name="description_file" class="form-control" 
                               placeholder="Contoh: DESKRIPSI_HOMOGENEOUS.docx">
                        <small class="form-text text-muted">
                            Nama file brosur yang akan diupload ke folder uploads/brochures/
                        </small>
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

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editCategoryForm" method="post">
                <?= csrf_field() ?>
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Kategori</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="editCategoryName" class="form-control" required>
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

<!-- Upload Description Modal -->
<div class="modal fade" id="uploadDescriptionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="uploadDescriptionForm" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title"><i class="fas fa-upload"></i> Upload File Deskripsi</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <h6 class="mb-3" id="uploadCategoryName"></h6>
                    
                    <!-- Current File Info -->
                    <div id="currentFileInfo" class="alert alert-info" style="display: none;">
                        <i class="fas fa-info-circle"></i> <strong>File saat ini:</strong> 
                        <div class="mt-1 p-2 bg-white rounded" style="word-break: break-all; font-size: 0.85rem;">
                            <span id="currentFileName"></span>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Pilih File Deskripsi (.docx) <span class="text-danger">*</span></label>
                        <input type="file" name="description_file" id="descriptionFileInput" class="form-control" accept=".doc,.docx" required>
                        <small class="form-text text-muted">
                            Format: .docx (Microsoft Word) • Maksimal 5MB
                        </small>
                    </div>
                    
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i> <strong>Catatan:</strong>
                        <ul class="mb-0 mt-2">
                            <li>File akan otomatis diberi nama sesuai kategori</li>
                            <li>File lama akan ditimpa jika sudah ada</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info">
                        <i class="fas fa-upload"></i> Upload File
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editCategory(categoryId, categoryName) {
    document.getElementById('editCategoryName').value = categoryName;
    document.getElementById('editCategoryForm').action = '<?= base_url('admin/product-catalog/edit-category/') ?>' + categoryId;
    new bootstrap.Modal(document.getElementById('editCategoryModal')).show();
}

function uploadDescription(categoryId, categoryName, currentFile) {
    document.getElementById('uploadCategoryName').textContent = 'Kategori: ' + categoryName;
    document.getElementById('uploadDescriptionForm').action = '<?= base_url('admin/product-catalog/upload-description/') ?>' + categoryId;
    
    // Show current file info if exists
    if (currentFile) {
        document.getElementById('currentFileName').textContent = currentFile;
        document.getElementById('currentFileInfo').style.display = 'block';
    } else {
        document.getElementById('currentFileInfo').style.display = 'none';
    }
    
    // Reset file input
    document.getElementById('descriptionFileInput').value = '';
    
    new bootstrap.Modal(document.getElementById('uploadDescriptionModal')).show();
}

function deleteDescription(categoryId, categoryName) {
    if (confirm('Yakin ingin menghapus file deskripsi untuk kategori "' + categoryName + '"?\n\nFile akan dihapus permanen dan tidak dapat dikembalikan.')) {
        window.location.href = '<?= base_url('admin/product-catalog/delete-description/') ?>' + categoryId;
    }
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

.hover-shadow {
    transition: box-shadow 0.3s ease;
}
</style>

<?= $this->endSection() ?>
