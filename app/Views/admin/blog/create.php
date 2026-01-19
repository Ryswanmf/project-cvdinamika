<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold">Tulis Artikel Baru</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= site_url('admin/blog/store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Artikel</label>
                        <input type="text" class="form-control <?= $validation->hasError('title') ? 'is-invalid' : '' ?>" 
                               id="title" name="title" value="<?= old('title') ?>" required>
                        <div class="invalid-feedback"><?= $validation->getError('title') ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <select class="form-select <?= $validation->hasError('category') ? 'is-invalid' : '' ?>" id="category" name="category" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Interior" <?= old('category') == 'Interior' ? 'selected' : '' ?>>Interior</option>
                            <option value="Tips & Trik" <?= old('category') == 'Tips & Trik' ? 'selected' : '' ?>>Tips & Trik</option>
                            <option value="Produk" <?= old('category') == 'Produk' ? 'selected' : '' ?>>Produk</option>
                            <option value="Berita" <?= old('category') == 'Berita' ? 'selected' : '' ?>>Berita</option>
                            <option value="Panduan" <?= old('category') == 'Panduan' ? 'selected' : '' ?>>Panduan</option>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('category') ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Isi Artikel</label>
                        <textarea class="form-control" id="content" name="content" rows="15" required><?= old('content') ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label">Gambar Utama</label>
                        <input type="file" class="form-control <?= $validation->hasError('image') ? 'is-invalid' : '' ?>" 
                               id="image" name="image" accept="image/*" required>
                        <div class="invalid-feedback"><?= $validation->getError('image') ?></div>
                        <div class="form-text">Ukuran maksimal: 2MB. Format: JPG, PNG, JPEG</div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= site_url('admin/blog') ?>" class="btn btn-light px-4">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-paper-plane me-2"></i>Terbitkan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- Summernote CSS/JS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $('#content').summernote({
            placeholder: 'Tulis isi artikel Anda di sini...',
            tabsize: 2,
            height: 400,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
<?= $this->endSection() ?>
