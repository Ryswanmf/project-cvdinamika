<?= $this->include('landing-page/layout/header') ?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Pencarian</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pencarian</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<div class="container-xxl py-5">
    <div class="container">
        
        <!-- Search Form Again -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <form action="/search" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" name="q" placeholder="Cari produk, proyek, atau artikel..." value="<?= esc($keyword) ?>">
                        <button class="btn btn-primary px-4" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        <?php if ($keyword): ?>
            <h3 class="mb-4">Hasil pencarian untuk: "<?= esc($keyword) ?>"</h3>
            
            <?php 
            $hasResults = false;
            if (!empty($results['products']) || !empty($results['projects']) || !empty($results['blogs'])) {
                $hasResults = true;
            }
            ?>

            <?php if (!$hasResults): ?>
                <div class="alert alert-warning text-center">
                    Tidak ditemukan hasil yang cocok dengan kata kunci tersebut.
                </div>
            <?php else: ?>

                <!-- Products Results -->
                <?php if (!empty($results['products'])): ?>
                    <div class="mb-5">
                        <h4 class="mb-3 text-primary border-bottom pb-2">Produk (<?= count($results['products']) ?>)</h4>
                        <div class="row g-4">
                            <?php foreach ($results['products'] as $item): ?>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="project-item">
                                    <div class="position-relative">
                                        <img class="img-fluid" src="<?= base_url('uploads/products/' . ($item['image'] ?? 'default.jpg')) ?>" alt="<?= esc($item['name']) ?>" style="height: 250px; object-fit: cover; width: 100%;">
                                        <div class="project-overlay">
                                            <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?= base_url('produk/detail/' . $item['id']) ?>"><i class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <a class="d-block h5" href="<?= base_url('produk/detail/' . $item['id']) ?>"><?= esc($item['name']) ?></a>
                                        <span><?= substr(strip_tags($item['description']), 0, 100) ?>...</span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Projects Results -->
                <?php if (!empty($results['projects'])): ?>
                    <div class="mb-5">
                        <h4 class="mb-3 text-primary border-bottom pb-2">Proyek (<?= count($results['projects']) ?>)</h4>
                        <div class="row g-4">
                            <?php foreach ($results['projects'] as $item): ?>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                    <div class="service-icon btn-square">
                                        <i class="fa fa-handshake fa-2x"></i>
                                    </div>
                                    <h5 class="mb-3"><?= esc($item['title']) ?></h5>
                                    <p><?= substr(strip_tags($item['description']), 0, 100) ?>...</p>
                                    <a class="btn px-3 mt-auto mx-auto" href="/portofolio">Lihat Detail</a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Blog Results -->
                <?php if (!empty($results['blogs'])): ?>
                    <div class="mb-5">
                        <h4 class="mb-3 text-primary border-bottom pb-2">Blog & Artikel (<?= count($results['blogs']) ?>)</h4>
                        <div class="row g-4">
                            <?php foreach ($results['blogs'] as $item): ?>
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="bg-light p-4">
                                    <a class="d-block h5 lh-base mb-3" href="<?= base_url('blog/detail/' . $item['slug']) ?>"><?= esc($item['title']) ?></a>
                                    <p class="mb-0"><?= substr(strip_tags($item['content']), 0, 150) ?>...</p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

            <?php endif; ?>

        <?php else: ?>
            <div class="text-center py-5 text-muted">
                <i class="fa fa-search fa-3x mb-3"></i>
                <p>Silakan masukkan kata kunci untuk mulai mencari.</p>
            </div>
        <?php endif; ?>

    </div>
</div>

<?= $this->include('landing-page/layout/footer') ?>
