<?= $this->include('landing-page/layout/header') ?>

    <!-- Hero Start -->
    <div class="container-fluid pb-5 hero-header bg-light mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center mb-5">
                <div class="col-lg-6">
                    <h1 class="display-1 mb-4"><?= $settings['site_title'] ?? 'CV Dinamika Inti' ?> <span class="text-primary"></span>
                        Ada Untuk Anda.</h1>
                    <h6 class="d-inline-block border border-2 border-white py-3 px-5 mb-0 animated slideInRight">
                        "SELALU MELAKUKAN YANG TERBAIK , UNTUK MENJADI YANG TERBAIK"</h6>
                </div>
                <div class="col-lg-6">
                    <div class="owl-carousel header-carousel animated fadeIn">
                        <img class="img-fluid" src="img/vinyl1.jpg" alt="" width="800" height="600" fetchpriority="high">
                        <img class="img-fluid" src="img/vinyl2.jpg" alt="" width="800" height="600">
                        <img class="img-fluid" src="img/vinyl3.jpg" alt="" width="800" height="600">
                    </div>
                </div>
            </div>
            <div class="row g-5 animated fadeIn">
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
                        <a class="btn btn-outline-primary btn-square border-2 me-2" href="#!"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-primary btn-square border-2 me-2" href="#!"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square border-2 me-2" href="#!"><i
                                class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-primary btn-square border-2" href="#!"><i
                                class="fab fa-linkedin-in"></i></a>
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


    <!-- Project Start -->
    <div class="container-fluid mt-5">
        <div class="container mt-5">
            <div class="row g-0">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column justify-content-center bg-primary h-100 p-5">
                        <h1 class="text-white mb-5">Proyek Baru Baru Ini <span
                                class="text-uppercase text-primary bg-light px-2"></span></h1>
                        <h4 class="text-white mb-0"><span class="display-1"><?= count($recent_projects) ?></span> proyek terakhir kami</h4>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row g-0">
                        <?php foreach($recent_projects as $key => $project): ?>
                        <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="<?= 0.2 + ($key * 0.1) ?>s">
                            <div class="project-item position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="uploads/projects/<?= $project['image'] ?>" alt="<?= $project['title'] ?>" style="height: 250px; object-fit: cover;">
                                <a class="project-overlay text-decoration-none" href="#!">
                                    <h4 class="text-white"><?= $project['title'] ?></h4>
                                    <small class="text-white"><?= $project['category'] ?? 'Proyek' ?></small>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        
                        <?php if(empty($recent_projects)): ?>
                        <div class="col-12 p-5 text-center bg-light">
                            <p>Belum ada proyek yang ditampilkan.</p>
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
                    <h1 class="mb-5">Our Creative <span
                            class="text-uppercase text-primary bg-light px-2">Services</span></h1>
                    <p>Aliqu diam
                        amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus
                        clita duo justo et tempor eirmod magna dolore erat amet</p>
                    <p class="mb-5">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam
                        amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus
                        clita duo justo et tempor eirmod magna dolore erat amet</p>
                    <div class="d-flex align-items-center bg-light">
                        <div class="btn-square flex-shrink-0 bg-primary" style="width: 100px; height: 100px;">
                            <i class="fa fa-phone fa-2x text-white"></i>
                        </div>
                        <div class="px-3">
                            <h3>+0123456789</h3>
                            <span>Call us direct 24/7 for get a free consultation</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row g-3">
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.2s">
                            <div class="service-item h-100 d-flex flex-column justify-content-center bg-primary">
                                <a href="#!" class="service-img position-relative mb-4">
                                    <img class="img-fluid w-100" src="img/service-1.jpg" alt="">
                                    <h3>Interior Design</h3>
                                </a>
                                <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                    stet diam sed stet lorem.</p>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.4s">
                            <div class="service-item h-100 d-flex flex-column justify-content-center bg-light">
                                <a href="#!" class="service-img position-relative mb-4">
                                    <img class="img-fluid w-100" src="img/service-2.jpg" alt="">
                                    <h3>Implement</h3>
                                </a>
                                <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                    stet diam sed stet lorem.</p>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.6s">
                            <div class="service-item h-100 d-flex flex-column justify-content-center bg-light">
                                <a href="#!" class="service-img position-relative mb-4">
                                    <img class="img-fluid w-100" src="img/service-3.jpg" alt="">
                                    <h3>Renovation</h3>
                                </a>
                                <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                    stet diam sed stet lorem.</p>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.8s">
                            <div class="service-item h-100 d-flex flex-column justify-content-center bg-primary">
                                <a href="#!" class="service-img position-relative mb-4">
                                    <img class="img-fluid w-100" src="img/service-4.jpg" alt="">
                                    <h3>Commercial</h3>
                                </a>
                                <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                    stet diam sed stet lorem.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Team Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <h1 class="mb-5">Our Professional <span class="text-uppercase text-primary bg-light px-2">Designers</span>
            </h1>
            <div class="row g-4">
                <?php foreach($teams as $team): ?>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="team-item position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?= base_url('uploads/team/' . $team['image']) ?>" alt="<?= esc($team['name']) ?>" loading="lazy">
                        <div class="team-overlay">
                            <small class="mb-2"><?= esc($team['position']) ?></small>
                            <h4 class="lh-base text-light"><?= esc($team['name']) ?></h4>
                            <div class="d-flex justify-content-center">
                                <?php if(!empty($team['social_fb'])): ?>
                                <a class="btn btn-outline-primary btn-sm-square border-2 me-2" href="<?= esc($team['social_fb']) ?>"><i class="fab fa-facebook-f"></i></a>
                                <?php endif; ?>
                                <?php if(!empty($team['social_instagram'])): ?>
                                <a class="btn btn-outline-primary btn-sm-square border-2 me-2" href="<?= esc($team['social_instagram']) ?>"><i class="fab fa-instagram"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Team End -->


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