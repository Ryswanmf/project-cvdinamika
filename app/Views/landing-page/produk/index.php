<?= $this->include('landing-page/layout/header') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-4 mb-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-2 text-primary mb-4 animated slideInDown">Produk Kami</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Produk</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Product Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="mb-5">Koleksi <span class="text-uppercase text-primary bg-light px-2">Terbaik</span></h1>
            </div>
            
            <!-- Category Filter -->
            <div class="row g-4 mb-5 wow fadeIn" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline">
                        <li class="list-inline-item m-1">
                            <a href="?category=Semua" class="btn <?= ($current_category == 'Semua') ? 'btn-primary active' : 'btn-outline-primary' ?>">Semua</a>
                        </li>
                        <li class="list-inline-item m-1">
                            <a href="?category=Lantai Vinyl" class="btn <?= ($current_category == 'Lantai Vinyl') ? 'btn-primary active' : 'btn-outline-primary' ?>">Lantai Vinyl</a>
                        </li>
                        <li class="list-inline-item m-1">
                            <a href="?category=Lantai Parket" class="btn <?= ($current_category == 'Lantai Parket') ? 'btn-primary active' : 'btn-outline-primary' ?>">Lantai Parket</a>
                        </li>
                        <li class="list-inline-item m-1">
                            <a href="?category=SPC Flooring" class="btn <?= ($current_category == 'SPC Flooring') ? 'btn-primary active' : 'btn-outline-primary' ?>">SPC Flooring</a>
                        </li>
                        <li class="list-inline-item m-1">
                            <a href="?category=Aksesoris Lantai" class="btn <?= ($current_category == 'Aksesoris Lantai') ? 'btn-primary active' : 'btn-outline-primary' ?>">Aksesoris</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row g-4">
                <?php if(empty($products)): ?>
                    <div class="col-12 text-center py-5">
                        <h4 class="text-muted">Belum ada produk untuk kategori ini.</h4>
                    </div>
                <?php else: ?>
                    <?php foreach($products as $key => $product): ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="<?= 0.1 + ($key * 0.1) ?>s">
                        <div class="product-item bg-light rounded overflow-hidden shadow-sm h-100">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="<?= base_url('uploads/products/' . $product['image']) ?>" 
                                     alt="<?= esc($product['name']) ?>" style="height: 250px; object-fit: cover;" loading="lazy">
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    <?= esc($product['category'] ?? 'Produk') ?>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="text-primary"><i class="fa fa-tag me-2"></i><?= esc($product['category'] ?? 'General') ?></small>
                                    <small class="text-muted fw-bold">Rp <?= number_format($product['price'], 0, ',', '.') ?></small>
                                </div>
                                <h4 class="d-block h5 mb-2"><?= esc($product['name']) ?></h4>
                                <p class="text-muted mb-4 text-truncate" style="min-height: 48px;">
                                    <?= esc($product['description'] ?? 'Deskripsi produk belum tersedia.') ?>
                                </p>
                                <div class="d-flex border-top pt-3">
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>Standar</small>
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-layer-group text-primary me-2"></i>Premium</small>
                                    <small class="flex-fill text-center py-2"><i class="fa fa-check text-primary me-2"></i>Ready</small>
                                </div>
                                <div class="mt-3 text-center">
                                    <a href="<?= site_url('produk/detail/' . $product['id']) ?>" class="btn btn-primary w-100 rounded-pill">Detail Produk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Product End -->

<?= $this->include('landing-page/layout/footer') ?>
