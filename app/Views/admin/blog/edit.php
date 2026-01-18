<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold">Edit Artikel</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= site_url('admin/blog/update/' . $blog['id']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Artikel</label>
                        <input type="text" class="form-control <?= $validation->hasError('title') ? 'is-invalid' : '' ?>" 
                               id="title" name="title" value="<?= old('title', $blog['title']) ?>" required>
                        <div class="invalid-feedback"><?= $validation->getError('title') ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <select class="form-select <?= $validation->hasError('category') ? 'is-invalid' : '' ?>" id="category" name="category" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Interior" <?= old('category', $blog['category']) == 'Interior' ? 'selected' : '' ?>>Interior</option>
                            <option value="Tips & Trik" <?= old('category', $blog['category']) == 'Tips & Trik' ? 'selected' : '' ?>>Tips & Trik</option>
                            <option value="Produk" <?= old('category', $blog['category']) == 'Produk' ? 'selected' : '' ?>>Produk</option>
                            <option value="Berita" <?= old('category', $blog['category']) == 'Berita' ? 'selected' : '' ?>>Berita</option>
                            <option value="Panduan" <?= old('category', $blog['category']) == 'Panduan' ? 'selected' : '' ?>>Panduan</option>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('category') ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Isi Artikel</label>
                        <textarea class="form-control" id="content" name="content" rows="15" required><?= old('content', $blog['content']) ?></textarea>
                        <div class="form-text">
                            <strong>Panduan Format:</strong><br>
                            - Untuk judul section: <code>&lt;h3&gt;Judul Section&lt;/h3&gt;</code><br>
                            - Untuk paragraf: <code>&lt;p&gt;Isi paragraf...&lt;/p&gt;</code><br>
                            - Untuk list: <code>&lt;ol&gt;&lt;li&gt;Item 1&lt;/li&gt;&lt;/ol&gt;</code><br>
                            - Untuk bold: <code>&lt;strong&gt;teks tebal&lt;/strong&gt;</code><br>
                            - Untuk italic: <code>&lt;em&gt;teks miring&lt;/em&gt;</code>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label">Gambar Utama</label>
                        <div class="mb-3">
                            <p class="text-muted small mb-2">Gambar saat ini:</p>
                            <img src="<?= base_url('uploads/blog/' . $blog['image']) ?>" 
                                 class="rounded shadow-sm" 
                                 style="max-height: 150px; object-fit: cover;">
                        </div>
                        <input type="file" class="form-control <?= $validation->hasError('image') ? 'is-invalid' : '' ?>" 
                               id="image" name="image" accept="image/*">
                        <div class="invalid-feedback"><?= $validation->getError('image') ?></div>
                        <div class="form-text">Biarkan kosong jika tidak ingin mengubah gambar. Ukuran maksimal: 2MB</div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= site_url('admin/blog') ?>" class="btn btn-light px-4">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-save me-2"></i>Update Artikel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
#content {
    font-family: 'Courier New', monospace;
    font-size: 0.95rem;
}
</style>

<?= $this->endSection() ?>
