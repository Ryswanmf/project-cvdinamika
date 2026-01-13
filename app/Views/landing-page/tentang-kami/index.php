<?= $this->include('landing-page/layout/header') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-4 mb-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-2 text-primary mb-4 animated slideInDown">Tentang Kami</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Tentang Kami</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <?php if(!empty($settings['about_image_1'])): ?>
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="<?= base_url('uploads/about/' . $settings['about_image_1']) ?>" style="height: 300px; object-fit: cover; margin-top: 25%;">
                            <?php else: ?>
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="<?= base_url('img/about-1.jpg') ?>" style="height: 300px; object-fit: cover; margin-top: 25%;">
                            <?php endif; ?>
                        </div>
                        <div class="col-6 text-start">
                            <?php if(!empty($settings['about_image_2'])): ?>
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="<?= base_url('uploads/about/' . $settings['about_image_2']) ?>" style="height: 250px; object-fit: cover;">
                            <?php else: ?>
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="<?= base_url('img/about-2.jpg') ?>" style="height: 250px; object-fit: cover;">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">Tentang <span class="text-primary"><?= $settings['site_title'] ?? 'CV Dinamika' ?></span></h1>
                    
                    <div class="mb-4 text-secondary lh-lg" style="text-align: justify;">
                        <?= nl2br($settings['about_history'] ?? 'Isi sejarah perusahaan belum diatur.') ?>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Produk Ekslusif</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Pelayanan Terbaik</h6>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Harga Terjangkau</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Pengiriman Aman</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-4">
                        <a href="https://wa.me/<?= $settings['contact_phone'] ?? '' ?>" class="btn btn-primary rounded-pill px-4 me-3" target="_blank">
                            <i class="fab fa-whatsapp me-2"></i> Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Visi Misi Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="h-100 bg-white p-5 rounded shadow-sm">
                        <h3 class="mb-4 text-primary"><i class="fas fa-eye me-2"></i>Visi, Misi Kami</h3>
                        <p class="text-secondary mb-0 lh-lg"><?= nl2br($settings['about_vision'] ?? 'Menjadikan CV.DINAMIKA INTI sebagai perusahaan pertama yang menghasilkan produk teknologi tinggi ramah lingkungan dengan pengawasan yang ketat mengintegrasikan penelitian dan pengembangan , produksi penjualan serta pelayan prima.') ?></p>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 bg-white p-5 rounded shadow-sm">
                        <h3 class="mb-4 text-primary"><i class="fas fa-rocket me-2"></i>Moto Kami</h3>
                        <p class="text-secondary mb-0 lh-lg">
                            <?= nl2br($settings['about_mission'] ?? 'Moto CV.DINAMIKA INTI adalah "SELALU MELAKUKAN YANG TERBAIK , UNTUK MENJADI YANG TERBAIK" , dengan menjamin kepuasan konsumen terhadap produk kami , karena menggunakan bahan - bahan produksi berkualitas sangat baik dan memberikan purna jual yang memuaskan.') ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Visi Misi End -->

<?= $this->include('landing-page/layout/footer') ?>