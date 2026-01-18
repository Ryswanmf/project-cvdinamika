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
</style>

    <!-- Page Header Start -->
    <div class="page-title-box">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title-main animated slideInDown">Kontak</h1>
                    <p class="page-subtitle">Hubungi Kami Untuk Konsultasi dan Informasi Lebih Lanjut</p>
                    <nav aria-label="breadcrumb" class="mt-4">
                        <ol class="breadcrumb justify-content-center mb-0 bg-transparent">
                            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-white text-decoration-none">Beranda</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Kontak</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="mb-5">Hubungi <span class="text-uppercase text-primary bg-light px-2">Kami</span></h1>
            </div>
            
            <div class="row g-5">
                <!-- Form Section -->
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <div class="bg-light p-4 p-md-5 rounded shadow-sm h-100">
                        <p class="mb-4">Punya pertanyaan atau ingin berkonsultasi mengenai proyek Anda? Isi formulir di bawah ini dan tim kami akan segera menghubungi Anda.</p>
                        
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form action="<?= site_url('kontak/send') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Anda" required>
                                        <label for="name">Nama Anda</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Anda" required>
                                        <label for="email">Email Anda</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subjek" required>
                                        <label for="subject">Subjek</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Tulis pesan Anda di sini" id="message" name="message" style="height: 150px" required></textarea>
                                        <label for="message">Pesan</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Kirim Pesan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Info & Map Section -->
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
                    <div class="bg-light p-4 p-md-5 rounded shadow-sm h-100">
                        <div class="d-flex align-items-center mb-4">
                            <div class="btn-square bg-primary flex-shrink-0 me-3 rounded">
                                <i class="fa fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Alamat Kantor</h5>
                                <p class="mb-0 text-muted"><?= $settings['contact_address'] ?? 'Jl. Raden Saleh No.18 Rt.002/Rw.009 Karang Mulya Karang Tengah Kota Tangerang Titik Kios Mega Ria Ruko Pojok No.5, Patokan Samping Gepuk Pak Gembus Sebrang Klinik Stella Medika' ?></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div class="btn-square bg-primary flex-shrink-0 me-3 rounded">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Telepon</h5>
                                <p class="mb-0 text-muted"><?= $settings['contact_phone'] ?? '+62 0813-1974-0808' ?></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-square bg-primary flex-shrink-0 me-3 rounded">
                                <i class="fa fa-envelope-open text-white"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Email</h5>
                                <p class="mb-0 text-muted"><?= $settings['contact_email'] ?? 'harmony.decor26@gmail.com' ?></p>
                            </div>
                        </div>

                        <!-- Google Map -->
                        <div class="position-relative w-100 rounded overflow-hidden shadow-sm" style="height: 300px;">
                            <iframe 
                                style="width: 100%; height: 100%; border:0;"
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15864.770234561234!2d106.6288889!3d-6.2397222!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb41e1f1e1e1%3A0x1e1e1e1e1e1e1e1e!2sJl.%20Raden%20Saleh%20No.18%2C%20Karangmulya%2C%20Kec.%20Karang%20Tengah%2C%20Kota%20Tangerang%2C%20Banten!5e0!3m2!1sid!2sid!4v1737127000000!5m2!1sid!2sid" 
                                allowfullscreen="" 
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

<?= $this->include('landing-page/layout/footer') ?>
