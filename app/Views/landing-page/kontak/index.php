<?= $this->include('landing-page/layout/header') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-4 mb-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-2 text-primary mb-4 animated slideInDown">Kontak</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Kontak</li>
                </ol>
            </nav>
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
                                <p class="mb-0 text-muted"><?= $settings['contact_address'] ?? 'Jl. Contoh No. 123, Jakarta' ?></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div class="btn-square bg-primary flex-shrink-0 me-3 rounded">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Telepon</h5>
                                <p class="mb-0 text-muted"><?= $settings['contact_phone'] ?? '+62 812 3456 7890' ?></p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-square bg-primary flex-shrink-0 me-3 rounded">
                                <i class="fa fa-envelope-open text-white"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Email</h5>
                                <p class="mb-0 text-muted"><?= $settings['contact_email'] ?? 'info@cv-dinamika.com' ?></p>
                            </div>
                        </div>

                        <!-- Google Map -->
                        <div class="position-relative w-100 rounded overflow-hidden shadow-sm" style="height: 300px;">
                            <iframe 
                                style="width: 100%; height: 100%; border:0;"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4664534435!2d106.82715331476884!3d-6.175110395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2db8c5617%3A0x4e446b7ac891d84f!2sMonas!5e0!3m2!1sen!2sid!4v1647833000000!5m2!1sen!2sid" 
                                allowfullscreen="" 
                                loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

<?= $this->include('landing-page/layout/footer') ?>
