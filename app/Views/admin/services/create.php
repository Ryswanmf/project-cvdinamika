<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold">Tambah Layanan Baru</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= site_url('admin/services/store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="title" class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon FontAwesome</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-icons"></i></span>
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Contoh: fa-tools, fa-truck, fa-check" required>
                        </div>
                        <div class="form-text">Cari kode icon di <a href="https://fontawesome.com/v5/search" target="_blank">FontAwesome 5</a></div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Urutan</label>
                        <input type="number" class="form-control" id="sort_order" name="sort_order" value="0">
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label">Gambar Ilustrasi</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                        <div class="form-text">Akan muncul di bagian "Detail Layanan".</div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= site_url('admin/services') ?>" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
