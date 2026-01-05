<?= $this->include('landing-page/layout/header') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-4 mb-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-2 mb-4 animated slideInDown">
                <span class="text-primary fw-bold">COMPANY PROFILE</span>
                <br>
                <span class="text-dark fw-normal fs-3">CV. DINAMIKA INTI</span>
                <br>
                <span class="text-secondary fs-6 fw-light">VINYL FLOOR, SPC FLOOR, LAMINATE FLOOR  & JASA INSTALASI VINYL KE SELURUH INDONESIA</span>
            </h1>
            <hr class="mx-auto" style="width: 60%; border-top: 2px solid #198754;">
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Sejarah</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Sejarah Detail Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 mb-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="<?= base_url('img/harm.jpg') ?>" style="margin-top: 25%;">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="<?= base_url('img/moni.jpg') ?>">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">Sejarah <span class="text-primary"><?= $settings['site_title'] ?? 'CV Dinamika' ?></span></h1>
                    <div class="mb-4">
                        <h4 class="text-primary mb-3"><i class="fas fa-calendar-alt me-2"></i>Awal Berdiri</h4>
                        <p class="text-secondary lh-lg">
                            <?= $settings['site_title'] ?? 'CV Dinamika Inti' ?> berdiri sejak 2016 resmi berbadan hukum CV pada tahun 2021, sebagai pemegang merek dan mulai mendistribusikan di Indonesia dan akan menjadi Market Leader dalam pemasaran Lantai Kayu (Laminate Flooring) dan Lantai Vinyl (Vinyl Floor).
                        </p>
                    </div>
                    
                    <div class="mb-4">
                        <h4 class="text-primary mb-3"><i class="fas fa-star me-2"></i>Komitmen Kualitas</h4>
                        <p class="text-secondary lh-lg">
                            Kami Menyediakan Keseluruhan produk yang memiliki kualitas terbaik yang diperuntukkan bagi Pelanggan yang mengutamakan kualitas.
                        </p>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Produk Ekslusif</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Pelayanan Terbaik</h6>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Harga Terjangkau</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Pengiriman Aman dan Cepat</h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Konten Tambahan - Akan diisi oleh user -->
            <div class="row g-5 wow fadeIn" data-wow-delay="0.3s">
                <div class="col-12">
                    <div class="bg-light p-5 rounded">
                        <h2 class="text-primary mb-4"><i class="fas fa-history me-2"></i>Perjalanan Kami</h2>
                        <div class="text-secondary lh-lg">
                            <p class="mb-4">
                                CV.DINAMIKA INTI berdiri sejak 2016 resmi berbadan hukum CV pada tahun 2021, sebagai pemegang merek dan mulai mendistribusikan di Indonesia dan akan menjadi Market Leader dalam pemasaran Lantai Kayu (Laminate Flooring) dan Lantai Vinyl (Vinyl Floor).
                            </p>
                            
                            <p class="mb-4">
                                Menjual berbagai macam vinyl lantai dari berbagai merk selain LG Hausys/LX Hausys. Dengan kompentensi kami di bidang perusahaan vinyl flooring, vinyl plank & spc pertama yang menghasilkan produk teknologi tinggi ramah lingkungan analisis yang berstandar internasional, serta didukung dengan sumber daya yang profesional, kami siap membantu memenuhi kebutuhan Anda.
                            </p>
                            
                            <p class="mb-4">
                                Kami Menyediakan Keseluruhan produk yang memiliki kualitas terbaik yang  diperuntukkan bagi Pelanggan yang mengutamakan kualitas.
                            </p>
                            
                            <p class="mb-4">
                                Team manajemen dan penjualan akan selalu bertanggung jawab dan berkomitmen untuk selalu menjaga hubungan baik dengan setiap Pelanggan dan siap untuk memberikan pelayanan yang terbaik kepada setiap Pelanggan.
                            </p>
                            
                            <p class="mb-4">
                                LX Hausys & LG Hausys merupakan produk bahan bangunan dan interior untuk kategori lantai yang dikenal dengan produk Lantai Kayu (Laminate Floor) dan Lantai Vinyl (Vinyl Floor) serta berbagai macam aksesoris profil pendukungnya.
                            </p>
                            
                            <p class="mb-0">
                                LX Hausys & LG Hausys senantiasa konsisten dalam meningkatkan dan mempertahankan kualitas material serta aman untuk kesehatan, anti metal, ramah lingkungan & go green serta mengembangkan inovasi produk untuk kesempurnaan Lantai Kayu (Laminate Flooring) dan Lantai Vinyl (Vinyl Floor) pilihan Pelanggan dengan selalu mengutamakan kepuasan Pelanggan dan memberikan harga yang kompetitif.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sejarah Detail End -->

    <!-- Timeline Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <h2 class="text-center mb-5 wow fadeIn"><span class="text-primary">Timeline</span> Perkembangan Kami</h2>
            <div class="row g-4">
                <!-- Timeline items akan ditambahkan di sini -->
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h4 class="text-primary mb-3">2016</h4>
                        <p class="text-secondary mb-0">Awal berdirinya usaha...</p>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h4 class="text-primary mb-3">2021</h4>
                        <p class="text-secondary mb-0">Resmi berbadan hukum CV...</p>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white p-4 rounded shadow-sm h-100">
                        <h4 class="text-primary mb-3">Sekarang</h4>
                        <p class="text-secondary mb-0">Terus berkembang dan melayani pelanggan...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Timeline End -->

<?= $this->include('landing-page/layout/footer') ?>
