<?= $this->extend('admin/layout-admin/template') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold">Tambah Proyek Baru</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= site_url('admin/projects/store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Proyek</label>
                        <input type="text" class="form-control <?= $validation->hasError('title') ? 'is-invalid' : '' ?>" 
                               id="title" name="title" value="<?= old('title') ?>" required>
                        <div class="invalid-feedback"><?= $validation->getError('title') ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="category" class="form-label">Kategori</label>
                            <select class="form-select <?= $validation->hasError('category') ? 'is-invalid' : '' ?>" id="category" name="category" required>
                                <option value="">Pilih Kategori...</option>
                                <option value="Klinik" <?= old('category') == 'Klinik' ? 'selected' : '' ?>>Klinik</option>
                                <option value="Rumah Sakit" <?= old('category') == 'Rumah Sakit' ? 'selected' : '' ?>>Rumah Sakit</option>
                                <option value="Institut Pendidikan" <?= old('category') == 'Institut Pendidikan' ? 'selected' : '' ?>>Institut Pendidikan</option>
                                <option value="Area Olahraga" <?= old('category') == 'Area Olahraga' ? 'selected' : '' ?>>Area Olahraga</option>
                                <option value="Commercial" <?= old('category') == 'Commercial' ? 'selected' : '' ?>>Commercial</option>
                                <option value="Healthy Care" <?= old('category') == 'Healthy Care' ? 'selected' : '' ?>>Healthy Care</option>
                                <option value="custom" <?= old('category') == 'custom' ? 'selected' : '' ?>>+ Kategori Baru</option>
                            </select>
                            <div class="invalid-feedback"><?= $validation->getError('category') ?></div>
                            
                            <!-- Custom Category Input -->
                            <div id="customCategoryWrapper" style="display: none;" class="mt-2">
                                <input type="text" class="form-control" id="custom_category" name="custom_category" value="<?= old('custom_category') ?>" placeholder="Masukkan kategori baru...">
                                <small class="text-muted">Masukkan nama kategori baru Anda</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="badge_text" class="form-label">Teks Badge</label>
                            <input type="text" class="form-control" id="badge_text" name="badge_text" value="<?= old('badge_text') ?>" placeholder="Contoh: Klinik, RSUD, Universitas">
                            <small class="text-muted">Badge yang ditampilkan di pojok gambar</small>
                        </div>
                    </div>
                    
                    <script>
                        document.getElementById('category').addEventListener('change', function() {
                            var customWrapper = document.getElementById('customCategoryWrapper');
                            var customInput = document.getElementById('custom_category');
                            
                            if (this.value === 'custom') {
                                customWrapper.style.display = 'block';
                                customInput.required = true;
                            } else {
                                customWrapper.style.display = 'none';
                                customInput.required = false;
                                customInput.value = '';
                            }
                        });
                        
                        // Check on page load if custom was selected
                        if (document.getElementById('category').value === 'custom') {
                            document.getElementById('customCategoryWrapper').style.display = 'block';
                            document.getElementById('custom_category').required = true;
                        }
                    </script>

                    <div class="mb-3">
                        <label for="client_name" class="form-label">Nama Klien/Lokasi</label>
                        <input type="text" class="form-control" id="client_name" name="client_name" value="<?= old('client_name') ?>" placeholder="Contoh: RS Orthopedi Siaga Raya">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3"><?= old('description') ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="product_details" class="form-label">Detail Produk yang Digunakan</label>
                        <textarea class="form-control" id="product_details" name="product_details" rows="4" placeholder="Masukkan detail produk, satu per baris. Contoh:&#10;Gerflor Mipolam Ambiance Ultra - 0043&#10;LG Hausys Origin - 1203"><?= old('product_details') ?></textarea>
                        <small class="text-muted">Masukkan detail produk, satu produk per baris</small>
                    </div>

                    <div class="mb-3">
                        <label for="completed_date" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="completed_date" name="completed_date" value="<?= old('completed_date') ?>">
                    </div>

                    <div class="mb-4">
                        <label for="image" class="form-label">Gambar Proyek</label>
                        <input type="file" class="form-control <?= $validation->hasError('image') ? 'is-invalid' : '' ?>" 
                               id="image" name="image" accept="image/*" required>
                        <div class="invalid-feedback"><?= $validation->getError('image') ?></div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= site_url('admin/projects') ?>" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Simpan Proyek</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
