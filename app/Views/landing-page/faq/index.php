<?= $this->include('landing-page/layout/header') ?>

<style>
    /* FAQ Page Styling */
    .page-title-box {
        background: linear-gradient(135deg, #14756E 0%, #1a9187 100%);
        color: white;
        padding: 80px 0 60px;
        margin-bottom: 60px;
        position: relative;
    }
    
    .accordion-item {
        border: 1px solid #eef0f3;
        margin-bottom: 15px;
        border-radius: 8px !important;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0,0,0,0.02);
    }
    
    .accordion-button {
        font-weight: 600;
        color: #2c3e50;
        padding: 20px 25px;
        background-color: #fff;
    }
    
    .accordion-button:not(.collapsed) {
        color: #14756E;
        background-color: #f8fcfb;
        box-shadow: none;
    }
    
    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(20, 117, 110, 0.1);
    }
    
    .accordion-body {
        padding: 25px;
        color: #555;
        line-height: 1.7;
    }

    .faq-icon {
        width: 60px;
        height: 60px;
        background: rgba(20, 117, 110, 0.1);
        color: #14756E;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 24px;
    }
</style>

<!-- Page Header Start -->
<div class="page-title-box">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white mb-4 animated slideInDown">Pertanyaan Umum (FAQ)</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-white text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">FAQ</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <div class="faq-icon"><i class="fas fa-question"></i></div>
            <h2 class="mb-4">Paling Sering Ditanyakan</h2>
            <p class="text-muted">Berikut adalah kumpulan pertanyaan yang sering diajukan oleh pelanggan kami. Jika Anda tidak menemukan jawaban yang Anda cari, silakan hubungi kami.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.3s">
                <div class="accordion" id="accordionFAQ">
                    <?php if(empty($faqs)): ?>
                        <div class="text-center text-muted py-5">
                            Belum ada pertanyaan yang ditambahkan.
                        </div>
                    <?php else: ?>
                        <?php foreach($faqs as $index => $faq): ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?= $index ?>">
                                <button class="accordion-button <?= $index === 0 ? '' : 'collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>" aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" aria-controls="collapse<?= $index ?>">
                                    <?= esc($faq['question']) ?>
                                </button>
                            </h2>
                            <div id="collapse<?= $index ?>" class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>" aria-labelledby="heading<?= $index ?>" data-bs-parent="#accordionFAQ">
                                <div class="accordion-body">
                                    <?= $faq['answer'] // Allow HTML (from Summernote) ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="row mt-5 text-center wow fadeInUp" data-wow-delay="0.5s">
            <div class="col-12">
                <p class="text-muted mb-4">Masih punya pertanyaan lain?</p>
                <a href="<?= site_url('kontak') ?>" class="btn btn-primary rounded-pill py-3 px-5">Hubungi Kami</a>
            </div>
        </div>

    </div>
</div>

<?= $this->include('landing-page/layout/footer') ?>
