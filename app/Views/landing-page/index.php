<?= $this->include('landing-page/layout/header') ?>

    <!-- Hero Start -->
    <div class="container-fluid pb-5 hero-header bg-light mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center mb-5">
                <div class="col-lg-6">
                    <?php 
                    $heroTitle = $settings['site_title'] ?? 'CV Dinamika Inti';
                    $heroSubtitle = '"SELALU MELAKUKAN YANG TERBAIK , UNTUK MENJADI YANG TERBAIK"';
                    
                    if (!empty($banners) && !empty($banners[0]['title'])) {
                        $heroTitle = $banners[0]['title'];
                    }
                    if (!empty($banners) && !empty($banners[0]['subtitle'])) {
                        $heroSubtitle = $banners[0]['subtitle'];
                    }
                    ?>
                    <h1 class="display-1 mb-4"><?= $heroTitle ?> <span class="text-primary"></span>
                        Ada Untuk Anda.</h1>
                    <h6 class="d-inline-block border border-2 border-white py-3 px-5 mb-0 animated slideInRight">
                        <?= $heroSubtitle ?></h6>
                </div>
                <div class="col-lg-6">
                    <div class="owl-carousel header-carousel animated fadeIn">
                        <?php if(!empty($banners)): ?>
                            <?php foreach($banners as $banner): ?>
                                <img class="img-fluid" src="<?= base_url('uploads/banners/'.$banner['image']) ?>" alt="<?= esc($banner['title']) ?>" width="800" height="600">
                            <?php endforeach; ?>
                        <?php else: ?>
                            <img class="img-fluid" src="img/vinyl1.jpg" alt="" width="800" height="600" fetchpriority="high">
                            <img class="img-fluid" src="img/vinyl2.jpg" alt="" width="800" height="600">
                            <img class="img-fluid" src="img/vinyl3.jpg" alt="" width="800" height="600">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row g-5 animated fadeIn">
                <?php if(!empty($services)): ?>
                    <?php 
                    // Tampilkan hanya 4 layanan utama di Hero
                    $heroServices = array_slice($services, 0, 4);
                    foreach($heroServices as $service): 
                    ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-square border border-2 border-white me-3">
                                <i class="fas <?= esc($service['icon']) ?> text-primary"></i>
                            </div>
                            <h5 class="lh-base mb-0"><?= esc($service['title']) ?></h5>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Default Hardcoded if no services -->
                    <div class="col-md-6 col-lg-3">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-square border border-2 border-white me-3">
                                <i class="fa fa-shopping-cart text-primary"></i>
                            </div>
                            <h5 class="lh-base mb-0">Penjualan produk</h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-square border border-2 border-white me-3">
                                <i class="fa fa-tools text-primary"></i>
                            </div>
                            <h5 class="lh-base mb-0">Pemasangan produk</h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-square border border-2 border-white me-3">
                                <i class="fa fa-truck text-primary"></i>
                            </div>
                            <h5 class="lh-base mb-0">Pengiriman produk tepat waktu</h5>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-square border border-2 border-white me-3">
                                <i class="fa fa-shield-alt text-primary"></i>
                            </div>
                            <h5 class="lh-base mb-0">Garansi Material dan Pemasangan</h5>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end wow fadeInLeft" data-wow-delay="0.1s">
                            <img class="img-fluid rounded shadow w-100" src="img/harm.jpg" alt="" style="object-fit: cover; height: 350px;">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded shadow w-100 wow zoomIn" data-wow-delay="0.3s" src="img/moni.jpg" alt="" style="object-fit: cover; height: 250px;">
                            <div class="mt-3 d-flex align-items-center justify-content-center text-center bg-primary shadow-sm p-3 wow fadeInUp" data-wow-delay="0.5s" style="height: 97px; border-radius: 15px;">
                                <h6 class="text-white lh-base mb-0 fw-bold"><i class="fas fa-calendar-check me-2"></i>Sejak 2016 resmi berbadan hukum CV pada tahun 2021</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-5"><span class="text-uppercase text-primary bg-light px-2">Sejarah</span> <?= $settings['site_title'] ?? 'CV Dinamika Inti' ?></h1>
                    <p class="mb-4"><?= $settings['site_title'] ?? 'CV Dinamika Inti' ?> berdiri sejak 2016 resmi berbadan hukum CV pada tahun 2021, sebagai pemegang merek dan mulai mendistribusikan di Indonesia dan akan menjadi Market Leader dalam pemasaran Lantai Kayu (Laminate Flooring) dan Lantai Vinyl (Vinyl Floor).</p>
                    <p class="mb-5">Kami Menyediakan Keseluruhan produk yang memiliki kualitas terbaik
yang diperuntukkan bagi Pelanggan yang mengutamakan kualitas.</p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Produk Ekslusif</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Pelayanan Terbaik</h6>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Harga Terjangkau</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Pengiriman Aman dan Cepat</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-5">
                        <a class="btn btn-primary px-4 me-2" href="/sejarah">Selengkapnya</a>
                        <a class="btn btn-outline-primary btn-square border-2 me-2" href="https://www.instagram.com/harmony_decor_karangtengah?igsh=MWUwazlldm5vMzF3dA==" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-primary btn-square border-2 me-2" href="https://tk.tokopedia.com/ZSaJJGgC2/" target="_blank"><i class="fas fa-shopping-bag"></i></a>
                        <a class="btn btn-outline-primary btn-square border-2" href="https://s.shopee.co.id/2g4xeUpgAS" target="_blank"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid py-5">
    <div class="container">
        <div class="text-center wow fadeIn" data-wow-delay="0.1s">
            <h1 class="mb-5">Kenapa <span class="text-uppercase text-primary bg-light px-2">Memilih Kami</span></h1>
        </div>
        <div class="row g-5 align-items-center text-center">

            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <i class="fa fa-shopping-cart fa-5x text-primary mb-4"></i>
                <h4>Penjualan Produk</h4>
                <p class="mb-0">
                    Menyediakan produk berkualitas tinggi dengan pilihan yang dapat disesuaikan dengan kebutuhan dan spesifikasi pelanggan.
                </p>
            </div>

            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <i class="fa fa-map-marked-alt fa-5x text-primary mb-4"></i>
                <h4>Survei Lokasi</h4>
                <p class="mb-0">
                    Melakukan survei langsung ke lokasi pemasangan untuk memastikan ukuran, kondisi, dan hasil yang maksimal.
                </p>
            </div>

            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <i class="fa fa-truck fa-5x text-primary mb-4"></i>
                <h4>Pengiriman Tepat Waktu</h4>
                <p class="mb-0">
                    Produk dikirim sesuai jadwal yang disepakati dengan aman, cepat, dan tepat waktu.
                </p>
            </div>

            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <i class="fa fa-tools fa-5x text-primary mb-4"></i>
                <h4>Pemasangan Produk</h4>
                <p class="mb-0">
                    Proses pemasangan dilakukan oleh tenaga profesional untuk menjamin kerapian, kekuatan, dan fungsi produk.
                </p>
            </div>

            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <i class="fa fa-cube fa-5x text-primary mb-4"></i>
                <h4>Garansi Material</h4>
                <p class="mb-0">
                    Memberikan garansi material sebagai jaminan kualitas terhadap cacat produksi atau kerusakan tertentu.
                </p>
            </div>

            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <i class="fa fa-shield-alt fa-5x text-primary mb-4"></i>
                <h4>Garansi Pemasangan</h4>
                <p class="mb-0">
                    Menjamin hasil pemasangan dengan layanan perbaikan apabila terjadi kendala akibat proses instalasi.
                </p>
            </div>

        </div>
    </div>
</div>

    <!-- Feature End -->

    <!-- Call to Action Start -->
    <div class="container-fluid py-5 my-5 cta-section" style="background: linear-gradient(rgba(20, 117, 110, 0.8), rgba(20, 117, 110, 0.8)), url('img/hero-bg.jpg') fixed center center; background-size: cover;">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-8 text-white wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-4 text-white mb-3">Butuh Konsultasi Lantai Vinyl?</h1>
                    <p class="lead mb-0">Tim ahli kami siap membantu Anda menghitung kebutuhan material, survey lokasi gratis, dan memberikan penawaran terbaik untuk proyek Anda.</p>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="d-grid gap-3">
                        <button onclick="toggleWA()" class="btn btn-light py-3 px-5 rounded-pill">
                            <i class="fab fa-whatsapp me-2 text-primary"></i> Chat WhatsApp
                        </button>
                        <a href="/kontak" class="btn btn-outline-light py-3 px-5 rounded-pill">
                            <i class="fa fa-envelope me-2"></i> Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->


    <!-- Project Start -->
    <div class="container-fluid mt-5 py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column justify-content-center bg-primary h-100 p-5 rounded shadow">
                        <h1 class="text-white mb-4">Proyek Terbaru Kami</h1>
                        <div class="d-flex align-items-center mb-4">
                            <span class="display-1 text-white fw-bold me-3"><?= count($recent_projects) ?></span>
                            <h4 class="text-white mb-0">Proyek<br>Terakhir Kami</h4>
                        </div>
                        <p class="text-white-50 mb-4">Lihat hasil instalasi terbaru dari tim profesional kami yang telah dipercaya oleh berbagai klien.</p>
                        <a href="/portofolio" class="btn btn-light btn-lg align-self-start">
                            Lihat Semua Proyek
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row g-4">
                        <?php foreach($recent_projects as $key => $project): ?>
                        <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="<?= 0.2 + ($key * 0.1) ?>s">
                            <div class="project-item position-relative overflow-hidden rounded shadow-sm h-100">
                                <img class="img-fluid w-100" 
                                     src="uploads/projects/<?= $project['image'] ?>" 
                                     alt="<?= $project['title'] ?>" 
                                     style="height: 250px; object-fit: cover;">
                                <div class="project-overlay d-flex flex-column justify-content-end p-4 text-decoration-none">
                                    <h5 class="text-white mb-2"><?= $project['title'] ?></h5>
                                    <small class="text-white-50">
                                        <i class="fas fa-tag me-2"></i><?= $project['category'] ?? 'Proyek' ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        
                        <?php if(empty($recent_projects)): ?>
                        <div class="col-12 p-5 text-center bg-light rounded">
                            <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada proyek yang ditampilkan.</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Project End -->


    <!-- Service Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-5 mb-4">OUR SERVICE</h1>
                    <h4 class="text-primary mb-4">CV. DINAMIKA INTI</h4>
                    <p class="mb-3" style="text-align: justify;"><strong>CV.DINAMIKA INTI</strong> selalu memberikan pelayanan terbaik, produk berkualitas dan harga yang kompetitif.</p>
                    <p class="mb-3" style="text-align: justify;">Kami sangat berkomitmen penuh pada bidang usaha yang kami kerjakan, yaitu pemasaran produk lantai kayu dan lantai vinyl <strong>LX Hausys & LG Hausys</strong>.</p>
                    <p class="mb-4" style="text-align: justify;">Dengan pengalaman bertahun tahun juga didukung oleh seluruh tenaga kerja yang profesional serta kerja sama yang baik terhadap para agen, toko, dan kontraktor yang ada di seluruh Indonesia membuat kami yakin untuk dapat melayani seluruh pelanggan dimanapun berada secara konsisten.</p>
                    
                    <h5 class="mb-3">Adapun pelayanan kami meliputi:</h5>
                    <div class="row g-2 mb-4">
                        <?php if(!empty($services)): ?>
                            <?php foreach($services as $service): ?>
                            <div class="col-sm-6">
                                <p class="mb-2"><i class="fa fa-check text-primary me-2"></i><?= esc($service['title']) ?></p>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-sm-6">
                                <p class="mb-2"><i class="fa fa-check text-primary me-2"></i>Penjualan Produk</p>
                                <p class="mb-2"><i class="fa fa-check text-primary me-2"></i>Survey Lokasi Pemasangan</p>
                                <p class="mb-0"><i class="fa fa-check text-primary me-2"></i>Pengiriman Tepat Waktu</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-2"><i class="fa fa-check text-primary me-2"></i>Pemasangan Produk</p>
                                <p class="mb-2"><i class="fa fa-check text-primary me-2"></i>Garansi Material</p>
                                <p class="mb-0"><i class="fa fa-check text-primary me-2"></i>Garansi Pemasangan</p>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="d-flex align-items-center bg-light rounded p-3">
                        <div class="btn-square flex-shrink-0 bg-primary" style="width: 80px; height: 80px;">
                            <i class="fa fa-phone fa-2x text-white"></i>
                        </div>
                        <div class="ps-3">
                            <h5 class="mb-1"><?= $settings['contact_phone'] ?? '+62 0813-1974-0808' ?></h5>
                            <small>Hubungi kami untuk konsultasi gratis</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row g-3">
                        <?php if(!empty($services)): ?>
                            <?php foreach($services as $key => $service): ?>
                            <div class="col-md-6 wow fadeIn" data-wow-delay="<?= 0.2 + ($key * 0.2) ?>s">
                                <div class="service-item h-100 d-flex flex-column <?= ($key % 2 == 0) ? 'bg-primary' : 'bg-light' ?> rounded overflow-hidden">
                                    <div class="service-img position-relative">
                                        <img class="img-fluid w-100" src="<?= base_url('uploads/services/' . $service['image']) ?>" alt="<?= esc($service['title']) ?>" style="height: 140px; object-fit: cover;">
                                    </div>
                                    <div class="p-3 flex-grow-1 d-flex flex-column">
                                        <h5 class="<?= ($key % 2 == 0) ? 'text-white' : 'text-dark' ?> mb-2"><?= esc($service['title']) ?></h5>
                                        <p class="<?= ($key % 2 == 0) ? 'text-white' : 'text-muted' ?> mb-0 small" style="text-align: justify;"><?= esc($service['description']) ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <!-- Default Hardcoded -->
                            <div class="col-md-6 wow fadeIn" data-wow-delay="0.2s">
                                <div class="service-item h-100 d-flex flex-column bg-primary rounded overflow-hidden">
                                    <div class="service-img position-relative">
                                        <img class="img-fluid w-100" src="img/service-1.jpg" alt="Penjualan Produk" style="height: 140px; object-fit: cover;">
                                    </div>
                                    <div class="p-3 flex-grow-1 d-flex flex-column">
                                        <h5 class="text-white mb-2">Penjualan Produk</h5>
                                        <p class="text-white mb-0 small" style="text-align: justify;">Menyediakan lantai vinyl dan kayu berkualitas tinggi dari brand LX Hausys & LG Hausys dengan harga kompetitif.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- ... other static items ... -->
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
    
    <!-- Marketplace Section Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="text-primary">BELANJA ONLINE</h6>
                <h1 class="display-5 mb-4">Kunjungi Toko Online Kami</h1>
                <p class="mb-4">Temukan produk vinyl flooring berkualitas dari Harmony Decor di marketplace terpercaya</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="<?= $settings['link_tokopedia'] ?? 'https://www.tokopedia.com' ?>" target="_blank" class="marketplace-link">
                        <div class="marketplace-card tokopedia-card">
                            <div class="marketplace-logo-wrapper">
                                <img src="<?= base_url('img/tokopedia_logo.webp') ?>" alt="Tokopedia" class="marketplace-logo">
                            </div>
                            <div class="marketplace-info">
                                <h3>Harmony Decor</h3>
                                <p class="mb-0">Official Store di Tokopedia</p>
                                <span class="visit-store">
                                    <i class="fas fa-shopping-bag me-2"></i>Kunjungi Toko
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a href="<?= $settings['link_shopee'] ?? 'https://shopee.co.id' ?>" target="_blank" class="marketplace-link">
                        <div class="marketplace-card shopee-card">
                            <div class="marketplace-logo-wrapper">
                                <img src="<?= base_url('img/shopee_logo.png') ?>" alt="Shopee" class="marketplace-logo shopee-logo">
                            </div>
                            <div class="marketplace-info">
                                <h3>Harmony Decor</h3>
                                <p class="mb-0">Official Store di Shopee</p>
                                <span class="visit-store">
                                    <i class="fas fa-shopping-bag me-2"></i>Kunjungi Toko
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Marketplace Section End -->
    
    <style>
    .marketplace-link {
        text-decoration: none;
        display: block;
    }
    
    .marketplace-card {
        background: white;
        border-radius: 20px;
        padding: 40px 30px;
        text-align: center;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 3px solid transparent;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    
    .marketplace-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    }
    
    .tokopedia-card:hover {
        border-color: #42B549;
        background: linear-gradient(135deg, #f8fff9 0%, #ffffff 100%);
    }
    
    .shopee-card:hover {
        border-color: #EE4D2D;
        background: linear-gradient(135deg, #fff8f6 0%, #ffffff 100%);
    }
    
    .marketplace-logo-wrapper {
        width: 100%;
        max-width: 300px;
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 15px;
        transition: all 0.3s ease;
    }
    
    .marketplace-card:hover .marketplace-logo-wrapper {
        transform: scale(1.05);
    }
    
    .tokopedia-card:hover .marketplace-logo-wrapper {
        background: linear-gradient(135deg, #e8f5e9 0%, #f1f8f2 100%);
    }
    
    .shopee-card .marketplace-logo-wrapper {
        background: transparent !important;
    }
    
    .shopee-card:hover .marketplace-logo-wrapper {
        background: transparent !important;
    }
    
    .marketplace-logo {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        filter: drop-shadow(0 2px 8px rgba(0,0,0,0.1));
    }
    
    .shopee-logo {
        background: transparent !important;
        mix-blend-mode: darken;
        filter: none;
    }
    
    .marketplace-info h3 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 8px;
        transition: color 0.3s ease;
    }
    
    .tokopedia-card:hover .marketplace-info h3 {
        color: #42B549;
    }
    
    .shopee-card:hover .marketplace-info h3 {
        color: #EE4D2D;
    }
    
    .marketplace-info p {
        color: #7f8c8d;
        font-size: 1.1rem;
        margin-bottom: 20px;
    }
    
    .visit-store {
        display: inline-flex;
        align-items: center;
        padding: 15px 35px;
        background: linear-gradient(135deg, #14756E 0%, #1a9187 100%);
        color: white;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(20, 117, 110, 0.3);
    }
    
    .tokopedia-card:hover .visit-store {
        background: linear-gradient(135deg, #42B549 0%, #36a03f 100%);
        box-shadow: 0 6px 20px rgba(66, 181, 73, 0.4);
    }
    
    .shopee-card:hover .visit-store {
        background: linear-gradient(135deg, #EE4D2D 0%, #d43d1f 100%);
        box-shadow: 0 6px 20px rgba(238, 77, 45, 0.4);
    }
    
    .marketplace-card:hover .visit-store {
        transform: translateY(-3px);
    }
    
    @media (max-width: 768px) {
        .marketplace-card {
            padding: 30px 20px;
        }
        
        .marketplace-logo-wrapper {
            max-width: 200px;
            height: 90px;
        }
        
        .marketplace-info h3 {
            font-size: 1.5rem;
        }
        
        .visit-store {
            font-size: 1rem;
            padding: 12px 28px;
        }
    }
    </style>


    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-9">
                    <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.2s">
                        <?php foreach($testimonials as $testi): ?>
                        <div class="testimonial-item">
                            <div class="row g-5 align-items-center">
                                <div class="col-md-6">
                                    <div class="testimonial-img">
                                        <?php if(!empty($testi['image'])): ?>
                                            <img class="img-fluid" src="<?= base_url('uploads/testimonial/' . $testi['image']) ?>" alt="" loading="lazy">
                                        <?php else: ?>
                                            <img class="img-fluid" src="img/testimonial-1.jpg" alt="" loading="lazy">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="testimonial-text pb-5 pb-md-0">
                                        <h3>Satisfied Customer</h3>
                                        <p><?= esc($testi['message']) ?></p>
                                        <h5 class="mb-0"><?= esc($testi['name']) ?></h5>
                                        <small class="text-muted"><?= esc($testi['position']) ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


<?= $this->include('landing-page/layout/footer') ?>