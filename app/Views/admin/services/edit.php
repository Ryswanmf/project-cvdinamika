<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold">Edit Layanan</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= site_url('admin/services/update/' . $service['id']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="title" class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= esc($service['title']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon FontAwesome</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas <?= esc($service['icon']) ?>"></i></span>
                            <input type="text" class="form-control" id="icon" name="icon" value="<?= esc($service['icon']) ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required><?= esc($service['description']) ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Urutan</label>
                        <input type="number" class="form-control" id="sort_order" name="sort_order" value="<?= esc($service['sort_order']) ?>">
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label">Gambar Ilustrasi</label>
                        <div class="mb-2">
                            <img src="<?= base_url('uploads/services/' . $service['image']) ?>" class="rounded" width="100">
                        </div>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= site_url('admin/services') ?>" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
