<?= $this->include('landing-page/layout/header') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-4 mb-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-2 text-primary mb-4 animated slideInDown">Detail Artikel</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="/blog">Blog</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page"><?= esc($blog['title']) ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Blog Detail Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Main Content -->
                <div class="col-lg-8 wow slideInUp" data-wow-delay="0.1s">
                    <img class="img-fluid w-100 rounded mb-5" src="<?= base_url('uploads/blog/' . $blog['image']) ?>" alt="<?= esc($blog['title']) ?>">
                    <h1 class="mb-4"><?= esc($blog['title']) ?></h1>
                    <div class="d-flex mb-4">
                        <small class="me-3"><i class="far fa-user text-primary me-2"></i><?= esc($blog['author']) ?></small>
                        <small class="me-3"><i class="far fa-calendar-alt text-primary me-2"></i><?= date('d M Y', strtotime($blog['created_at'])) ?></small>
                        <small><i class="far fa-folder text-primary me-2"></i><?= esc($blog['category']) ?></small>
                    </div>
                    
                    <div class="blog-content">
                        <?= $blog['content'] // Raw output karena content mengandung HTML ?>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <!-- Recent Post Widget -->
                    <div class="mb-5">
                        <h4 class="mb-4">Artikel Terbaru</h4>
                        <?php foreach($recent_posts as $recent): ?>
                        <div class="d-flex mb-3">
                            <img class="img-fluid rounded" src="<?= base_url('uploads/blog/' . $recent['image']) ?>" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <div class="d-flex flex-column justify-content-center ps-3">
                                <a href="<?= site_url('blog/detail/' . $recent['slug']) ?>" class="h6 lh-base mb-1 text-truncate" style="max-width: 200px;"><?= esc($recent['title']) ?></a>
                                <small class="text-muted"><i class="bi bi-clock me-1"></i><?= date('d M Y', strtotime($recent['created_at'])) ?></small>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Detail End -->

<?= $this->include('landing-page/layout/footer') ?>
