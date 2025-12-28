<?= $this->include('landing-page/layout/header') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-4 mb-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-2 text-primary mb-4 animated slideInDown">Detail Produk</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/produk">Produk</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page"><?= esc($product['name']) ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Product Detail Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Product Images -->
                <div class="col-lg-5 wow slideInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden mb-4 border rounded shadow-sm bg-white">
                        <img class="img-fluid w-100" src="<?= base_url('uploads/products/' . $product['image']) ?>" alt="<?= esc($product['name']) ?>" id="mainImage" style="min-height: 400px; object-fit: cover;">
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-lg-7 wow slideInUp" data-wow-delay="0.3s">
                    <h1 class="mb-2 display-5"><?= esc($product['name']) ?></h1>
                    
                    <div class="d-flex align-items-center mb-4">
                        <div class="text-warning me-2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-alt"></i>
                        </div>
                        <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">Stok Tersedia</span>
                        <span class="mx-3 text-muted">|</span>
                        <span class="text-muted">Kategori: <?= esc($product['category']) ?></span>
                    </div>

                    <h3 class="mb-4 text-primary fw-bold">Rp <?= number_format($product['price'], 0, ',', '.') ?></h3>
                    
                    <p class="mb-4 text-secondary lh-lg"><?= nl2br(esc($product['description'])) ?></p>
                    
                    <div class="row g-4 mb-5">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center p-3 border rounded bg-light">
                                <div class="feature-icon-box bg-primary rounded-circle me-3">
                                    <i class="fa fa-water text-white"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Fitur Unggulan</small>
                                    <h6 class="mb-0">Kualitas Premium</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center p-3 border rounded bg-light">
                                <div class="feature-icon-box bg-primary rounded-circle me-3">
                                    <i class="fa fa-shield-alt text-white"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Garansi</small>
                                    <h6 class="mb-0">Jaminan Kualitas</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="https://wa.me/<?= $settings['contact_phone'] ?? '6281234567890' ?>?text=Halo%2C%20saya%20tertarik%20dengan%20produk%20<?= urlencode($product['name']) ?>%20di%20website%20CV%20Dinamika" class="btn btn-primary rounded-pill py-3 px-5 shadow-sm" target="_blank">
                            <i class="fab fa-whatsapp me-2"></i> Pesan Sekarang
                        </a>
                        <a href="#" class="btn btn-outline-dark rounded-pill py-3 px-5 shadow-sm">
                            <i class="fa fa-download me-2"></i> Unduh Katalog
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tabs Section -->
            <div class="row mt-5 pt-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-12">
                    <div class="bg-light rounded p-4 p-sm-5 shadow-sm">
                        <ul class="nav nav-pills product-detail-nav mb-4 justify-content-center border-bottom pb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active rounded-pill px-4 mx-2" id="pills-desc-tab" data-bs-toggle="pill" data-bs-target="#pills-desc" type="button" role="tab">Deskripsi</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link rounded-pill px-4 mx-2" id="pills-spec-tab" data-bs-toggle="pill" data-bs-target="#pills-spec" type="button" role="tab">Spesifikasi</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Deskripsi -->
                            <div class="tab-pane fade show active" id="pills-desc" role="tabpanel">
                                <h4 class="mb-4">Deskripsi Lengkap</h4>
                                <p><?= nl2br(esc($product['description'])) ?></p>
                            </div>
                            
                            <!-- Spesifikasi -->
                            <div class="tab-pane fade" id="pills-spec" role="tabpanel">
                                <h4 class="mb-4">Detail Spesifikasi</h4>
                                <div class="bg-white p-4 rounded border">
                                    <?= nl2br(esc($product['details'] ?? 'Belum ada detail spesifikasi.')) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            <div class="row mt-5 pt-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">Produk Lainnya</h2>
                    <p class="text-muted">Mungkin Anda juga tertarik dengan produk ini</p>
                </div>
                
                <?php if(empty($related_products)): ?>
                    <div class="col-12 text-center text-muted">Tidak ada produk terkait lainnya.</div>
                <?php else: ?>
                    <?php foreach($related_products as $related): ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="product-item bg-light rounded overflow-hidden shadow-sm h-100 border">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="<?= base_url('uploads/products/' . $related['image']) ?>" alt="<?= esc($related['name']) ?>" style="height: 200px; object-fit: cover;" loading="lazy">
                            </div>
                            <div class="p-4 text-center">
                                <h5 class="mb-1 text-truncate"><?= esc($related['name']) ?></h5>
                                <small class="text-muted d-block mb-3"><?= esc($related['category']) ?></small>
                                <a href="<?= site_url('produk/detail/' . $related['id']) ?>" class="btn btn-primary rounded-pill px-4 btn-sm">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
    <!-- Product Detail End -->

<?= $this->include('landing-page/layout/footer') ?>
