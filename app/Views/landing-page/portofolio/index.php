<?= $this->include('landing-page/layout/header') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-4 mb-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-2 text-primary mb-4 animated slideInDown">Portofolio</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Portofolio</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Project Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="mb-5">Proyek <span class="text-uppercase text-primary bg-light px-2">Kami</span></h1>
            </div>
            
            <div class="row g-4 portfolio-container">
                <?php if(empty($projects)): ?>
                    <div class="col-12 text-center py-5">
                        <h4 class="text-muted">Belum ada portofolio yang ditampilkan.</h4>
                    </div>
                <?php else: ?>
                    <?php foreach($projects as $key => $project): ?>
                    <div class="col-lg-4 col-md-6 portfolio-item wow fadeIn" data-wow-delay="<?= 0.1 + ($key * 0.1) ?>s">
                        <div class="project-item position-relative overflow-hidden rounded shadow-sm h-100">
                            <img class="img-fluid w-100" src="<?= base_url('uploads/projects/' . $project['image']) ?>" alt="<?= esc($project['title']) ?>" style="height: 250px; object-fit: cover;" loading="lazy">
                            <a class="project-overlay text-decoration-none" href="#!">
                                <h4 class="text-white"><?= esc($project['title']) ?></h4>
                                <small class="text-white">
                                    <i class="fa fa-tag me-1"></i> <?= esc($project['category']) ?>
                                    <?php if(!empty($project['client_name'])): ?>
                                        | <i class="fa fa-user me-1"></i> <?= esc($project['client_name']) ?>
                                    <?php endif; ?>
                                </small>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Project End -->

<?= $this->include('landing-page/layout/footer') ?>
