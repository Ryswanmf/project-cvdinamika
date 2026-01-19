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
                    <h1 class="page-title-main animated slideInDown">Produk Kami</h1>
                    <p class="page-subtitle">Koleksi Produk Lantai Berkualitas Premium</p>
                    <nav aria-label="breadcrumb" class="mt-4">
                        <ol class="breadcrumb justify-content-center mb-0 bg-transparent">
                            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-white text-decoration-none">Beranda</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Produk</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Product Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="mb-5">Koleksi <span class="text-uppercase text-primary bg-light px-2">Terbaik</span></h1>
            </div>
            
            <!-- Category Filter -->
            <div class="row g-4 mb-5 wow fadeIn" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline">
                        <li class="list-inline-item m-1">
                            <a href="?category=Semua" class="btn <?= ($current_category == 'Semua') ? 'btn-primary active' : 'btn-outline-primary' ?>">Semua</a>
                        </li>
                        <li class="list-inline-item m-1">
                            <a href="?category=HOMOGENEOUS SHEET" class="btn <?= ($current_category == 'HOMOGENEOUS SHEET') ? 'btn-primary active' : 'btn-outline-primary' ?>">Homogeneous Sheet</a>
                        </li>
                        <li class="list-inline-item m-1">
                            <a href="?category=HETEROGENEOUS SHEET" class="btn <?= ($current_category == 'HETEROGENEOUS SHEET') ? 'btn-primary active' : 'btn-outline-primary' ?>">Heterogeneous Sheet</a>
                        </li>
                        <li class="list-inline-item m-1">
                            <a href="?category=HETEROGENEOUS SPECIALITY SHEET" class="btn <?= ($current_category == 'HETEROGENEOUS SPECIALITY SHEET') ? 'btn-primary active' : 'btn-outline-primary' ?>">Heterogeneous Speciality Sheet</a>
                        </li>
                        <li class="list-inline-item m-1">
                            <a href="?category=PLANK & TILE" class="btn <?= ($current_category == 'PLANK & TILE') ? 'btn-primary active' : 'btn-outline-primary' ?>">Plank & Tile</a>
                        </li>
                        <li class="list-inline-item m-1">
                            <a href="?category=AKSESORIS" class="btn <?= ($current_category == 'AKSESORIS') ? 'btn-primary active' : 'btn-outline-primary' ?>">Aksesoris</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Brand Filter for HOMOGENEOUS SHEET -->
            <?php if($current_category == 'HOMOGENEOUS SHEET' && !$current_brand): ?>
            <div class="row g-4 mb-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="col-12">
                    <div class="text-center mb-4">
                        <h4 class="text-primary">Pilih Brand</h4>
                        <p class="text-muted">Kami menyediakan produk dari brand terpercaya</p>
                    </div>
                    <div class="row g-4 justify-content-center">
                        <!-- Armstrong Brand -->
                        <div class="col-lg-3 col-md-6">
                            <a href="?category=HOMOGENEOUS SHEET&brand=Armstrong" class="text-decoration-none">
                                <div class="brand-card h-100 <?= ($current_brand == 'Armstrong') ? 'active' : '' ?>">
                                    <div class="brand-icon mb-3">
                                        <i class="fas fa-building fa-3x text-primary"></i>
                                    </div>
                                    <h5 class="brand-name mb-2">Armstrong</h5>
                                    <p class="brand-desc text-muted small mb-0">Premium flooring solutions</p>
                                </div>
                            </a>
                        </div>
                        
                        <!-- Gerflor Brand -->
                        <div class="col-lg-3 col-md-6">
                            <a href="?category=HOMOGENEOUS SHEET&brand=Gerflor" class="text-decoration-none">
                                <div class="brand-card h-100 <?= ($current_brand == 'Gerflor') ? 'active' : '' ?>">
                                    <div class="brand-icon mb-3">
                                        <i class="fas fa-layer-group fa-3x text-primary"></i>
                                    </div>
                                    <h5 class="brand-name mb-2">Gerflor</h5>
                                    <p class="brand-desc text-muted small mb-0">Innovation in flooring</p>
                                </div>
                            </a>
                        </div>
                        
                        <!-- LX Hausys Brand -->
                        <div class="col-lg-3 col-md-6">
                            <a href="?category=HOMOGENEOUS SHEET&brand=LX" class="text-decoration-none">
                                <div class="brand-card h-100 <?= ($current_brand == 'LX') ? 'active' : '' ?>">
                                    <div class="brand-icon mb-3">
                                        <i class="fas fa-award fa-3x text-primary"></i>
                                    </div>
                                    <h5 class="brand-name mb-2">LX Hausys</h5>
                                    <p class="brand-desc text-muted small mb-0">Korean quality excellence</p>
                                </div>
                            </a>
                        </div>
                        
                        <!-- Omega Brand -->
                        <div class="col-lg-3 col-md-6">
                            <a href="?category=HOMOGENEOUS SHEET&brand=Omega" class="text-decoration-none">
                                <div class="brand-card h-100 <?= ($current_brand == 'Omega') ? 'active' : '' ?>">
                                    <div class="brand-icon mb-3">
                                        <i class="fas fa-star fa-3x text-primary"></i>
                                    </div>
                                    <h5 class="brand-name mb-2">Omega</h5>
                                    <p class="brand-desc text-muted small mb-0">Homogeneous sheet specialist</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <!-- Series Selection for Armstrong -->
            <?php if($current_category == 'HOMOGENEOUS SHEET' && $current_brand == 'Armstrong'): ?>
            <div class="row g-4 mb-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="col-12">
                    <div class="text-center mb-4">
                        <a href="?category=HOMOGENEOUS SHEET" class="btn btn-outline-secondary btn-sm shadow-sm">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Pilihan Brand
                        </a>
                    </div>
                    
                    <div class="section-category">
                        <div class="category-title mb-5 text-center">
                            <i class="fas fa-th-large text-primary me-2"></i>
                            <h4 class="d-inline fw-bold">Pilih Seri Armstrong</h4>
                            <p class="text-muted mt-2 mb-0">Klik pada seri untuk melihat koleksi warna</p>
                        </div>
                        
                        <div class="row g-4 justify-content-center">
                            <!-- Medintone Series -->
                            <div class="col-lg-4 col-md-6">
                                <div class="series-card-new medintone-card-new" onclick="toggleSeriesGallery('medintone')">
                                    <div class="series-card-header">
                                        <div class="series-badge">
                                            <i class="fas fa-certificate"></i>
                                        </div>
                                        <div class="series-gradient"></div>
                                    </div>
                                    <div class="series-card-body">
                                        <h4 class="series-name">Medintone</h4>
                                        <p class="series-desc">Medical grade flooring</p>
                                        <div class="series-features">
                                            <span class="feature-tag"><i class="fas fa-check-circle"></i> Medical Grade</span>
                                            <span class="feature-tag"><i class="fas fa-shield-alt"></i> Hygienic</span>
                                        </div>
                                        <button class="btn-view-colors mt-3">
                                            <i class="fas fa-palette me-2"></i>Lihat Koleksi Warna
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Starlux Series -->
                            <div class="col-lg-4 col-md-6">
                                <div class="series-card-new starlux-card-new" onclick="toggleSeriesGallery('starlux')">
                                    <div class="series-card-header">
                                        <div class="series-badge">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="series-gradient"></div>
                                    </div>
                                    <div class="series-card-body">
                                        <h4 class="series-name">Starlux</h4>
                                        <p class="series-desc">Premium luxury series</p>
                                        <div class="series-features">
                                            <span class="feature-tag"><i class="fas fa-crown"></i> Premium</span>
                                            <span class="feature-tag"><i class="fas fa-gem"></i> Luxury</span>
                                        </div>
                                        <button class="btn-view-colors mt-3">
                                            <i class="fas fa-palette me-2"></i>Lihat Koleksi Warna
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Zanlite Series -->
                            <div class="col-lg-4 col-md-6">
                                <div class="series-card-new zanlite-card-new" onclick="toggleSeriesGallery('zanlite')">
                                    <div class="series-card-header">
                                        <div class="series-badge">
                                            <i class="fas fa-gem"></i>
                                        </div>
                                        <div class="series-gradient"></div>
                                    </div>
                                    <div class="series-card-body">
                                        <h4 class="series-name">Zanlite</h4>
                                        <p class="series-desc">Durable performance</p>
                                        <div class="series-features">
                                            <span class="feature-tag"><i class="fas fa-hard-hat"></i> Durable</span>
                                            <span class="feature-tag"><i class="fas fa-bolt"></i> High Performance</span>
                                        </div>
                                        <button class="btn-view-colors mt-3">
                                            <i class="fas fa-palette me-2"></i>Lihat Koleksi Warna
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Gallery Sections (Hidden by default) -->
            <div id="medintone-gallery" class="series-gallery-section" style="display: none;">
                <div class="gallery-header text-center mb-4">
                    <h3 class="fw-bold text-primary">Medintone Color Collection</h3>
                    <p class="text-muted">Koleksi warna untuk medical grade flooring</p>
                    <button class="btn btn-sm btn-outline-secondary" onclick="closeGallery('medintone')">
                        <i class="fas fa-times me-2"></i>Tutup Galeri
                    </button>
                </div>
                <div class="medintone-gallery">
                    <?php for($i = 1; $i <= 4; $i++): ?>
                    <div class="medintone-card wow fadeInUp" data-wow-delay="<?= 0.1 + ($i * 0.1) ?>s">
                        <div class="medintone-image-wrapper" onclick="openImageModal('<?= base_url('img/Medintone_' . $i . '.jpg') ?>', 'Medintone Color Palette <?= $i ?>')">
                            <img src="<?= base_url('img/Medintone_' . $i . '.jpg') ?>" 
                                 alt="Medintone Color Palette <?= $i ?>"
                                 class="medintone-img"
                                 style="cursor: pointer;">
                            <div class="medintone-overlay">
                                <div class="medintone-info">
                                    <h5>Color Palette <?= $i ?></h5>
                                    <p class="mb-0">Armstrong Medintone</p>
                                    <small class="d-block mt-2" style="font-size: 0.85rem; opacity: 0.9;">
                                        <i class="fas fa-search-plus me-1"></i>Klik untuk perbesar
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
            
            <div id="starlux-gallery" class="series-gallery-section" style="display: none;">
                <div class="gallery-header text-center mb-4">
                    <h3 class="fw-bold text-primary">Starlux Color Collection</h3>
                    <p class="text-muted">Koleksi warna premium luxury series</p>
                    <button class="btn btn-sm btn-outline-secondary" onclick="closeGallery('starlux')">
                        <i class="fas fa-times me-2"></i>Tutup Galeri
                    </button>
                </div>
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle me-2"></i>
                    Koleksi warna Starlux akan segera hadir
                </div>
            </div>
            
            <div id="zanlite-gallery" class="series-gallery-section" style="display: none;">
                <div class="gallery-header text-center mb-4">
                    <h3 class="fw-bold text-primary">Zanlite Color Collection</h3>
                    <p class="text-muted">Koleksi warna durable performance</p>
                    <button class="btn btn-sm btn-outline-secondary" onclick="closeGallery('zanlite')">
                        <i class="fas fa-times me-2"></i>Tutup Galeri
                    </button>
                </div>
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle me-2"></i>
                    Koleksi warna Zanlite akan segera hadir
                </div>
            </div>
            <?php endif; ?>
            
            <style>
            /* New Series Card Styles */
            .series-card-new {
                position: relative;
                background: white;
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 10px 40px rgba(0,0,0,0.1);
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                cursor: pointer;
                height: 100%;
            }
            
            .series-card-new:hover {
                transform: translateY(-15px);
                box-shadow: 0 20px 60px rgba(0,0,0,0.15);
            }
            
            .series-card-header {
                position: relative;
                height: 200px;
                overflow: hidden;
            }
            
            .series-gradient {
                position: absolute;
                width: 100%;
                height: 100%;
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                transition: transform 0.6s ease;
            }
            
            .series-gradient::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(135deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.5) 100%);
            }
            
            .medintone-card-new .series-gradient {
                background-image: url('<?= base_url('img/vinyl1.jpg') ?>');
            }
            
            .starlux-card-new .series-gradient {
                background-image: url('<?= base_url('img/vinyl2.jpg') ?>');
            }
            
            .zanlite-card-new .series-gradient {
                background-image: url('<?= base_url('img/vinyl3.jpg') ?>');
            }
            
            .series-card-new:hover .series-gradient {
                transform: scale(1.1) rotate(5deg);
            }
            
            .series-badge {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 2;
                width: 100px;
                height: 100px;
                background: rgba(255,255,255,0.2);
                backdrop-filter: blur(10px);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                border: 3px solid rgba(255,255,255,0.5);
                transition: all 0.4s ease;
            }
            
            .series-card-new:hover .series-badge {
                transform: translate(-50%, -50%) scale(1.2) rotate(360deg);
                background: rgba(255,255,255,0.3);
            }
            
            .series-badge i {
                font-size: 40px;
                color: white;
            }
            
            .series-card-body {
                padding: 30px 25px;
                text-align: center;
            }
            
            .series-name {
                font-size: 1.8rem;
                font-weight: 700;
                color: #2c3e50;
                margin-bottom: 10px;
            }
            
            .series-desc {
                color: #7f8c8d;
                font-size: 1rem;
                margin-bottom: 20px;
            }
            
            .series-features {
                display: flex;
                gap: 10px;
                justify-content: center;
                flex-wrap: wrap;
                margin-top: 15px;
            }
            
            .feature-tag {
                background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
                padding: 6px 15px;
                border-radius: 20px;
                font-size: 0.85rem;
                color: #495057;
                border: 1px solid #dee2e6;
                display: inline-flex;
                align-items: center;
                gap: 5px;
            }
            
            .feature-tag i {
                color: #14756E;
            }
            
            .btn-view-colors {
                background: linear-gradient(135deg, #14756E 0%, #1a9187 100%);
                color: white;
                border: none;
                padding: 12px 30px;
                border-radius: 25px;
                font-weight: 600;
                transition: all 0.3s ease;
                display: inline-flex;
                align-items: center;
                box-shadow: 0 4px 15px rgba(20, 117, 110, 0.3);
            }
            
            .btn-view-colors:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(20, 117, 110, 0.4);
                color: white;
            }
            
            /* Gallery Section Styles */
            .series-gallery-section {
                margin: 40px 0;
                padding: 30px;
                background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.05);
                animation: slideDown 0.5s ease;
            }
            
            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .gallery-header {
                padding: 20px 0;
                border-bottom: 2px solid #e9ecef;
                margin-bottom: 30px;
            }
            
            .gallery-header h3 {
                margin-bottom: 5px;
            }
            
            /* Old Brand Card Styles */
            .brand-card {
                background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
                border: 2px solid #e9ecef;
                border-radius: 15px;
                padding: 30px 20px;
                text-align: center;
                transition: all 0.3s ease;
                cursor: pointer;
            }
            
            .brand-card:hover {
                transform: translateY(-10px);
                border-color: #14756E;
                box-shadow: 0 10px 30px rgba(20, 117, 110, 0.2);
            }
            
            .brand-card.active {
                background: linear-gradient(135deg, #14756E 0%, #1a9187 100%);
                border-color: #14756E;
                box-shadow: 0 10px 30px rgba(20, 117, 110, 0.3);
            }
            
            .brand-card.active .brand-icon i {
                color: white !important;
            }
            
            .brand-card.active .brand-name {
                color: white !important;
            }
            
            .brand-card.active .brand-desc {
                color: rgba(255,255,255,0.9) !important;
            }
            
            .brand-icon i {
                transition: all 0.3s ease;
            }
            
            .brand-card:hover .brand-icon i {
                transform: scale(1.1);
            }
            
            .brand-name {
                font-weight: 600;
                color: #2c3e50;
            }
            </style>
            
            <script>
            function toggleSeriesGallery(seriesName) {
                // Close all galleries first
                const allGalleries = document.querySelectorAll('.series-gallery-section');
                allGalleries.forEach(gallery => {
                    if (gallery.id !== seriesName + '-gallery') {
                        gallery.style.display = 'none';
                    }
                });
                
                // Toggle the clicked series gallery
                const gallery = document.getElementById(seriesName + '-gallery');
                if (gallery.style.display === 'none' || gallery.style.display === '') {
                    gallery.style.display = 'block';
                    // Scroll to gallery
                    setTimeout(() => {
                        gallery.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }, 100);
                } else {
                    gallery.style.display = 'none';
                }
            }
            
            function closeGallery(seriesName) {
                const gallery = document.getElementById(seriesName + '-gallery');
                gallery.style.display = 'none';
                // Scroll back to series selection
                document.querySelector('.series-card-new').scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            </script>
            
            <style>
            .color-palette-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
                gap: 20px;
                margin: 30px 0;
            }
            
            @media (max-width: 768px) {
                .color-palette-grid {
                    grid-template-columns: repeat(3, 1fr);
                    gap: 15px;
                }
            }
            
            @media (max-width: 480px) {
                .color-palette-grid {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 12px;
                }
            }
            
            .color-item {
                opacity: 0;
                animation: fadeInUp 0.6s ease forwards;
                background: white;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 2px 8px rgba(0,0,0,0.08);
                transition: all 0.3s ease;
                cursor: pointer;
            }
            
            .color-item:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 20px rgba(20, 117, 110, 0.2);
            }
            
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .color-image-wrapper {
                position: relative;
                width: 100%;
                padding-top: 100%;
                overflow: hidden;
                background: #f8f9fa;
            }
            
            .color-image {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.4s ease;
            }
            
            .color-item:hover .color-image {
                transform: scale(1.05);
            }
            
            .color-overlay {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%);
                padding: 12px;
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            
            .color-item:hover .color-overlay {
                opacity: 1;
            }
            
            .color-code {
                color: white;
                font-size: 0.75rem;
                font-weight: 600;
                text-shadow: 0 1px 2px rgba(0,0,0,0.5);
            }
            
            .color-details {
                padding: 12px;
                background: white;
            }
            
            .color-name {
                font-size: 0.85rem;
                font-weight: 600;
                color: #2c3e50;
                margin: 0;
                line-height: 1.3;
            }
            .color-card:hover::before {
                transform: scaleX(1);
            }
            
            /* Medintone Gallery Styles */
            .medintone-gallery {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 40px;
                margin: 50px auto;
                max-width: 1400px;
                padding: 0 20px;
            }
            
            .medintone-card {
                position: relative;
                border-radius: 25px;
                overflow: hidden;
                box-shadow: 0 15px 40px rgba(0,0,0,0.15);
                transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
                background: #f8f9fa;
            }
            
            .medintone-card:hover {
                transform: translateY(-20px);
                box-shadow: 0 25px 60px rgba(20, 117, 110, 0.35);
            }
            
            .medintone-image-wrapper {
                position: relative;
                overflow: hidden;
                padding-top: 75%; /* 4:3 Aspect Ratio - lebih lebar */
                background: white;
            }
            
            .medintone-img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: contain; /* Ganti dari cover ke contain agar gambar terlihat penuh */
                padding: 20px; /* Tambah padding agar gambar tidak terpotong */
                transition: all 0.6s ease;
            }
            
            .medintone-card:hover .medintone-img {
                transform: scale(1.05);
                padding: 10px; /* Reduce padding saat hover */
            }
            
            .medintone-overlay {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background: linear-gradient(to top, 
                    rgba(20, 117, 110, 0.98) 0%, 
                    rgba(20, 117, 110, 0.85) 40%,
                    transparent 100%);
                padding: 30px 25px;
                opacity: 0;
                transition: opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            .medintone-card:hover .medintone-overlay {
                opacity: 1;
            }
            
            .medintone-info {
                color: white;
                text-align: center;
            }
            
            .medintone-info h5 {
                font-size: 1.5rem;
                font-weight: 700;
                margin-bottom: 8px;
                text-shadow: 0 2px 4px rgba(0,0,0,0.3);
                letter-spacing: 0.5px;
            }
            
            .medintone-info p {
                font-size: 1.1rem;
                opacity: 0.95;
                text-shadow: 0 1px 2px rgba(0,0,0,0.2);
            }
            
            /* Responsive Design */
            @media (max-width: 1200px) {
                .medintone-gallery {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 30px;
                }
            }
            
            @media (max-width: 768px) {
                .medintone-gallery {
                    grid-template-columns: 1fr;
                    gap: 30px;
                }
                
                .medintone-card {
                    border-radius: 20px;
                }
                
                .medintone-image-wrapper {
                    padding-top: 80%; /* Slightly taller on mobile */
                }
                
                .medintone-info h5 {
                    font-size: 1.3rem;
                }
            }
            
            @media (max-width: 576px) {
                .medintone-gallery {
                    gap: 25px;
                    padding: 0 15px;
                }
                
                .medintone-img {
                    padding: 15px;
                }
                
                .medintone-overlay {
                    padding: 20px 15px;
                }
                
                .medintone-card {
                    border-radius: 15px;
                }
            }
            </style>
            
        </div>
    </div>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title text-white" id="imageModalLabel"></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <img id="modalImage" src="" alt="" class="img-fluid w-100" style="border-radius: 10px;">
                </div>
            </div>
        </div>
    </div>

    <script>
    function openImageModal(imageSrc, title) {
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('imageModalLabel').textContent = title;
        const modal = new bootstrap.Modal(document.getElementById('imageModal'));
        modal.show();
    }
    </script>

    <style>
    #imageModal .modal-dialog {
        max-width: 90%;
    }
    
    #imageModal .modal-content {
        background: rgba(0,0,0,0.95) !important;
    }
    
    #imageModal .modal-body {
        padding: 20px;
    }
    
    #imageModal img {
        box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    }
    </style>
    <!-- Product End -->

<?= $this->include('landing-page/layout/footer') ?>
