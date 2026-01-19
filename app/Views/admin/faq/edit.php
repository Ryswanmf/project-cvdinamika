<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold">Edit FAQ</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= site_url('admin/faq/update/' . $faq['id']) ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="question" class="form-label">Pertanyaan</label>
                        <input type="text" class="form-control <?= $validation->hasError('question') ? 'is-invalid' : '' ?>" 
                               id="question" name="question" value="<?= old('question', $faq['question']) ?>" required>
                        <div class="invalid-feedback"><?= $validation->getError('question') ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="answer" class="form-label">Jawaban</label>
                        <textarea class="form-control" id="answer" name="answer" rows="5" required><?= old('answer', $faq['answer']) ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="sort_order" class="form-label">Urutan Tampil</label>
                        <input type="number" class="form-control" id="sort_order" name="sort_order" value="<?= old('sort_order', $faq['sort_order']) ?>">
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= site_url('admin/faq') ?>" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Update FAQ</button>
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
    $('#answer').summernote({
        placeholder: 'Tulis jawaban di sini...',
        tabsize: 2,
        height: 200,
        toolbar: [['style', ['bold', 'italic', 'underline']], ['para', ['ul', 'ol', 'paragraph']], ['view', ['fullscreen', 'codeview']]]
    });
</script>
<?= $this->endSection() ?>
