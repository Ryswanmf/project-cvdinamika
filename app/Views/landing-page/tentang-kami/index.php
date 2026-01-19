<?= $this->include('landing-page/layout/header') ?>

<style>
/* Page Title Enhancement */
.page-title-box {
    background: linear-gradient(135deg, #14756E 0%, #1a9187 100%);
    color: white;
    padding: 80px 0 60px;
    margin-bottom: 60px;
    position: relative;
    overflow: hidden;
}

.page-title-box::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
    background-size: cover;
    background-position: bottom;
    pointer-events: none;
    z-index: 0;
}

.page-title-box .container {
    position: relative;
    z-index: 1;
}

.breadcrumb-item a {
    position: relative;
    z-index: 2;
    cursor: pointer;
}

.page-title-main {
    font-family: 'Cormorant Garamond', serif;
    font-size: 3.5rem;
    font-weight: 700;
    color: white;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
}

.page-subtitle {
    font-size: 1.1rem;
    color: rgba(255,255,255,0.9);
    font-weight: 400;
}

/* Responsive Design */
@media (max-width: 992px) {
    .page-title-box {
        padding: 60px 0 40px;
    }
    
    .page-title-main {
        font-size: 2.5rem;
    }
    
    .page-subtitle {
        font-size: 1rem;
    }
}

@media (max-width: 768px) {
    .page-title-box {
        padding: 50px 0 30px;
        margin-bottom: 40px;
    }
    
    .page-title-main {
        font-size: 2rem;
    }
    
    .page-subtitle {
        font-size: 0.95rem;
    }
}

@media (max-width: 576px) {
    .page-title-box {
        padding: 40px 0 25px;
        margin-bottom: 30px;
    }
    
    .page-title-main {
        font-size: 1.75rem;
    }
    
    .page-subtitle {
        font-size: 0.9rem;
    }
}
</style>

    <!-- Page Header Start -->
    <div class="page-title-box">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title-main animated slideInDown">Tentang Kami</h1>
                    <p class="page-subtitle">Mengenal Lebih Dekat CV Dinamika Inti</p>
                    <nav aria-label="breadcrumb" class="mt-4">
                        <ol class="breadcrumb justify-content-center mb-0 bg-transparent">
                            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-white text-decoration-none">Beranda</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Tentang Kami</li>
                        </ol>
                    </nav>
                </div>
            </div>
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