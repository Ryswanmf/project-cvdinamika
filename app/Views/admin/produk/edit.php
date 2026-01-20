<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold">Edit Produk</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= site_url('admin/produk/update/' . $product['id']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control <?= session('validation') && session('validation')->hasError('name') ? 'is-invalid' : '' ?>" 
                                       id="name" name="name" value="<?= old('name', $product['name']) ?>" required>
                                <div class="invalid-feedback"><?= session('validation') ? session('validation')->getError('name') : '' ?></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="price" class="form-label">Harga (Angka saja)</label>
                                <input type="number" class="form-control <?= session('validation') && session('validation')->hasError('price') ? 'is-invalid' : '' ?>" 
                                       id="price" name="price" value="<?= old('price', $product['price']) ?>" required>
                                <div class="invalid-feedback"><?= session('validation') ? session('validation')->getError('price') : '' ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <select class="form-select <?= session('validation') && session('validation')->hasError('category') ? 'is-invalid' : '' ?>" id="category" name="category" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Hospital" <?= old('category', $product['category']) == 'Hospital' ? 'selected' : '' ?>>Hospital</option>
                            <option value="Commercial" <?= old('category', $product['category']) == 'Commercial' ? 'selected' : '' ?>>Commercial</option>
                            <option value="Healthy Care" <?= old('category', $product['category']) == 'Healthy Care' ? 'selected' : '' ?>>Healthy Care</option>
                            <option value="Education" <?= old('category', $product['category']) == 'Education' ? 'selected' : '' ?>>Education</option>
                            <option value="Sport" <?= old('category', $product['category']) == 'Sport' ? 'selected' : '' ?>>Sport</option>
                            <option value="Residential" <?= old('category', $product['category']) == 'Residential' ? 'selected' : '' ?>>Residential</option>
                        </select>
                        <div class="invalid-feedback"><?= session('validation') ? session('validation')->getError('category') : '' ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control" id="description" name="description" rows="3"><?= old('description', $product['description']) ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="details" class="form-label">Detail Spesifikasi / Konten Lengkap</label>
                        <textarea class="form-control" id="details" name="details" rows="10"><?= old('details', $product['details']) ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label">Gambar Produk</label>
                        <div class="mb-3">
                            <p class="text-muted small mb-2">Gambar saat ini:</p>
                            <img src="<?= base_url('uploads/products/' . $product['image']) ?>" 
                                 class="rounded shadow-sm" 
                                 style="max-height: 150px; object-fit: cover;">
                        </div>
                        <input type="file" class="form-control <?= session('validation') && session('validation')->hasError('image') ? 'is-invalid' : '' ?>" 
                               id="image" name="image" accept="image/*">
                        <div class="invalid-feedback"><?= session('validation') ? session('validation')->getError('image') : '' ?></div>
                        <div class="form-text">Biarkan kosong jika tidak ingin mengubah gambar. Ukuran maksimal: 2MB</div>
                    </div>

                    <div class="mb-4">
                        <label for="file_catalog" class="form-label">Katalog / Brosur PDF (Opsional)</label>
                        <?php if(!empty($product['file_catalog'])): ?>
                            <div class="mb-2">
                                <a href="<?= base_url('uploads/products/catalogs/' . $product['file_catalog']) ?>" target="_blank" class="btn btn-sm btn-outline-info">
                                    <i class="fas fa-file-pdf me-1"></i> Lihat Katalog Saat Ini
                                </a>
                            </div>
                        <?php endif; ?>
                        <input type="file" class="form-control <?= session('validation') && session('validation')->hasError('file_catalog') ? 'is-invalid' : '' ?>" 
                               id="file_catalog" name="file_catalog" accept="application/pdf">
                        <div class="invalid-feedback"><?= session('validation') ? session('validation')->getError('file_catalog') : '' ?></div>
                        <div class="form-text">Upload file PDF baru untuk mengganti. Maks 5MB.</div>
                    </div>

                    <hr class="my-4">
                    
                    <h5 class="mb-3">Galeri Varian (Motif/Warna)</h5>
                    
                    <div class="mb-3">
                        <label for="gallery" class="form-label">Upload Varian Baru</label>
                        <input type="file" class="form-control" id="gallery" name="gallery[]" accept="image/*" multiple>
                        <div class="form-text">Bisa pilih banyak gambar sekaligus.</div>
                    </div>

                    <div class="row g-3 mb-4">
                        <?php if(!empty($gallery)): ?>
                            <?php foreach($gallery as $img): ?>
                            <div class="col-md-3 col-6">
                                <div class="card h-100 border shadow-sm">
                                    <img src="<?= base_url('uploads/products/gallery/' . $img['image']) ?>" class="card-img-top" style="height: 120px; object-fit: cover;">
                                    <div class="card-body p-2 text-center">
                                        <a href="<?= site_url('admin/produk/delete-image/' . $img['id']) ?>" 
                                           class="btn btn-sm btn-danger w-100" 
                                           onclick="return confirm('Hapus varian ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= site_url('admin/produk') ?>" class="btn btn-light px-4">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-save me-2"></i>Update Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $('#details').summernote({
            placeholder: 'Tulis detail spesifikasi produk di sini...',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });
</script>
<?= $this->endSection() ?>
