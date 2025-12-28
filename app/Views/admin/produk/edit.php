<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold">Edit Produk</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= site_url('admin/produk/update/' . $product['id']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : '' ?>" 
                               id="name" name="name" value="<?= old('name', $product['name']) ?>" required>
                        <div class="invalid-feedback"><?= $validation->getError('name') ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <select class="form-select <?= $validation->hasError('category') ? 'is-invalid' : '' ?>" id="category" name="category" required>
                            <option value="">Pilih Kategori...</option>
                            <option value="Lantai Vinyl" <?= (old('category', $product['category']) == 'Lantai Vinyl') ? 'selected' : '' ?>>Lantai Vinyl</option>
                            <option value="Lantai Parket" <?= (old('category', $product['category']) == 'Lantai Parket') ? 'selected' : '' ?>>Lantai Parket</option>
                            <option value="SPC Flooring" <?= (old('category', $product['category']) == 'SPC Flooring') ? 'selected' : '' ?>>SPC Flooring</option>
                            <option value="Aksesoris Lantai" <?= (old('category', $product['category']) == 'Aksesoris Lantai') ? 'selected' : '' ?>>Aksesoris Lantai</option>
                            <option value="Jasa Pemasangan" <?= (old('category', $product['category']) == 'Jasa Pemasangan') ? 'selected' : '' ?>>Jasa Pemasangan</option>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('category') ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control" id="description" name="description" rows="2"><?= old('description', $product['description']) ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="details" class="form-label">Detail Spesifikasi</label>
                        <textarea class="form-control" id="details" name="details" rows="5"><?= old('details', $product['details']) ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Harga (Rp)</label>
                        <input type="number" class="form-control <?= $validation->hasError('price') ? 'is-invalid' : '' ?>" 
                               id="price" name="price" value="<?= old('price', $product['price']) ?>" required>
                        <div class="invalid-feedback"><?= $validation->getError('price') ?></div>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label">Gambar Produk (Opsional)</label>
                        <div class="mb-2">
                            <img src="<?= base_url('uploads/products/' . $product['image']) ?>" alt="Current Image" class="rounded" style="height: 100px;">
                        </div>
                        <input type="file" class="form-control <?= $validation->hasError('image') ? 'is-invalid' : '' ?>" 
                               id="image" name="image" accept="image/*">
                        <div class="invalid-feedback"><?= $validation->getError('image') ?></div>
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= site_url('admin/produk') ?>" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Update Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
