<?= $this->include('landing-page/layout/header') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-4 mb-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-2 text-primary mb-4 animated slideInDown">Artikel & Berita</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Blog</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="mb-5">Tips & Inspirasi <span class="text-uppercase text-primary bg-light px-2">Interior</span></h1>
            </div>

            <div class="row g-4">
                <?php if(empty($blogs)): ?>
                    <div class="col-12 text-center py-5">
                        <h4 class="text-muted">Belum ada artikel yang diterbitkan.</h4>
                    </div>
                <?php else: ?>
                    <?php foreach($blogs as $key => $blog): ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="<?= 0.1 + ($key * 0.1) ?>s">
                        <div class="bg-light rounded overflow-hidden shadow-sm h-100">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="<?= base_url('uploads/blog/' . $blog['image']) ?>" alt="<?= esc($blog['title']) ?>" style="height: 250px; object-fit: cover;" loading="lazy">
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3"><?= esc($blog['category']) ?></div>
                            </div>
                            <div class="p-4">
                                <div class="d-flex mb-3">
                                    <small class="me-3"><i class="far fa-user text-primary me-2"></i><?= esc($blog['author']) ?></small>
                                    <small><i class="far fa-calendar-alt text-primary me-2"></i><?= date('d M Y', strtotime($blog['created_at'])) ?></small>
                                </div>
                                <h4 class="mb-3 text-truncate"><?= esc($blog['title']) ?></h4>
                                <p class="text-truncate" style="max-height: 50px;"><?= strip_tags($blog['content']) ?></p>
                                <a class="text-uppercase text-primary fw-bold" href="<?= site_url('blog/detail/' . $blog['slug']) ?>">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <!-- Pagination -->
            <div class="row wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-12 text-center mt-5">
                    <?= $pager->links() ?>
                </div>
            </div>

        </div>
    </div>
    <!-- Blog End -->

<?= $this->include('landing-page/layout/footer') ?>
