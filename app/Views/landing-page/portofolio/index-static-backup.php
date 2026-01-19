<?= $this->include('landing-page/layout/header') ?>

<style>
    /* Hasil Instalasi Section Styling */
    .hasil-instalasi-section {
        background: #ffffff;
        padding: 60px 0;
    }
    
    .section-category {
        margin-bottom: 60px;
    }
    
    .category-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2rem;
        font-weight: 700;
        color: #14756E;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 3px solid #14756E;
        display: inline-block;
        position: relative;
    }
    
    .category-title::after {
        content: '';
        position: absolute;
        bottom: -3px;
        left: 0;
        width: 60%;
        height: 3px;
        background: linear-gradient(90deg, #14756E, #20B2AA);
    }
    
    .project-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 0;
        height: 100%;
        border: 1px solid #e8f4f3;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    
    .project-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #14756E, #20B2AA);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s ease;
        z-index: 2;
    }
    
    .project-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(20, 117, 110, 0.15);
        border-color: #14756E;
    }
    
    .project-card:hover::before {
        transform: scaleX(1);
    }
    
    .project-card:hover .project-image img {
        transform: scale(1.1);
    }
    
    .project-image {
        width: 100%;
        height: 200px;
        overflow: hidden;
        position: relative;
        background: linear-gradient(135deg, #14756E, #1a9187);
    }
    
    .project-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
        opacity: 0.9;
    }
    
    .project-image::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg, transparent 0%, rgba(20, 117, 110, 0.3) 100%);
        pointer-events: none;
    }
    
    .project-content {
        padding: 25px;
    }
    
    .project-name {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.1rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 12px;
        line-height: 1.4;
    }
    
    .project-badge {
        display: inline-block;
        padding: 6px 16px;
        background: linear-gradient(135deg, #14756E, #1a9187);
        color: #ffffff;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin-bottom: 15px;
        box-shadow: 0 2px 8px rgba(20, 117, 110, 0.2);
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 1;
    }
    
    .project-details {
        color: #5a6c7d;
        font-size: 0.9rem;
        line-height: 1.7;
        font-weight: 500;
    }
    
    .project-details-item {
        padding: 8px 0;
        border-bottom: 1px solid #f0f4f3;
    }
    
    .project-details-item:last-child {
        border-bottom: none;
    }
    
    .project-details-item i {
        color: #14756E;
        margin-right: 8px;
        font-size: 0.85rem;
    }
    
    /* Grid Layout */
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        animation: fadeInUp 0.6s ease-out;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Responsive Design */
    @media (max-width: 992px) {
        .projects-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }
        
        .category-title {
            font-size: 1.75rem;
        }
    }
    
    @media (max-width: 576px) {
        .projects-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .category-title {
            font-size: 1.5rem;
        }
        
        .hasil-instalasi-section {
            padding: 40px 0;
        }
        
        .project-image {
            height: 180px;
        }
    }
    
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
    
    .section-header {
        text-align: center;
        margin-bottom: 50px;
    }
    
    .section-main-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 15px;
    }
    
    .section-main-title .highlight {
        color: #14756E;
        background: linear-gradient(135deg, rgba(20, 117, 110, 0.1), rgba(26, 145, 135, 0.1));
        padding: 5px 20px;
        border-radius: 8px;
    }
    
    @media (max-width: 768px) {
        .page-title-main {
            font-size: 2.5rem;
        }
        
        .section-main-title {
            font-size: 2rem;
        }
    }
</style>

<!-- Page Header Start -->
<div class="page-title-box">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title-main animated slideInDown">Hasil Instalasi</h1>
                <p class="page-subtitle">Portofolio Proyek Instalasi Lantai Berkualitas</p>
                <nav aria-label="breadcrumb" class="mt-4">
                    <ol class="breadcrumb justify-content-center mb-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-white text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Hasil Instalasi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Hasil Instalasi Section Start -->
<div class="hasil-instalasi-section">
    <div class="container">
        
        <!-- Section Header -->
        <div class="section-header wow fadeIn" data-wow-delay="0.1s">
            <h2 class="section-main-title">Proyek <span class="highlight">Kami</span></h2>
        </div>

        <!-- KLINIK Section -->
        <div class="section-category wow fadeIn" data-wow-delay="0.2s">
            <h3 class="category-title"><i class="fas fa-clinic-medical me-2"></i> Klinik</h3>
            <div class="projects-grid">
                
                <!-- Clinic DR Belle Pondok Indah -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/instalasiklinik-1.png" alt="Clinic DR Belle Pondok Indah" loading="lazy">
                        <span class="project-badge"><i class="fas fa-stethoscope me-1"></i> Klinik</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">Clinic DR Belle Pondok Indah</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> Gerflor Mipolam Ambiance Ultra - 0043
                            </div>
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> LG Hausys Origin - 1203
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dental Clinic 911 Bali -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/instalasiklinik-2.png" alt="Dental Clinic 911 Bali" loading="lazy">
                        <span class="project-badge"><i class="fas fa-tooth me-1"></i> Dental Clinic</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">Dental Clinic 911 Bali</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> Omega - LG2001
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Klinik Kemenlu -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/instalasiklinik-3.png" alt="Klinik Kemenlu" loading="lazy">
                        <span class="project-badge"><i class="fas fa-stethoscope me-1"></i> Klinik</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">Klinik Kemenlu</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> LG Hausys Origin – SMO1206
                            </div>
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> LG Hausys Origin – SMO1203
                            </div>
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> LG Hausys Origin – SMO1219
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- RUMAH SAKIT Section -->
        <div class="section-category wow fadeIn" data-wow-delay="0.3s">
            <h3 class="category-title"><i class="fas fa-hospital me-2"></i> Rumah Sakit</h3>
            <div class="projects-grid">
                
                <!-- RS Orthopedi Siaga Raya -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/rumahsakit-1.jpg" alt="RS Orthopedi Siaga Raya" loading="lazy">
                        <span class="project-badge"><i class="fas fa-hospital-alt me-1"></i> Rumah Sakit</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">RS Orthopedi Siaga Raya</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> Mipolam 180 - 2009
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Madaya Royal Hospital Puri -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/rumahsakit-2.png" alt="Madaya Royal Hospital Puri" loading="lazy">
                        <span class="project-badge"><i class="fas fa-hospital-alt me-1"></i> Rumah Sakit</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">Madaya Royal Hospital Puri</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> LG Hausys Supreme – SPR1802
                            </div>
                        </div>
                    </div>
                </div>

                <!-- IGD Soedarso -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/rumahsakit-3.png" alt="IGD Soedarso" loading="lazy">
                        <span class="project-badge"><i class="fas fa-ambulance me-1"></i> IGD</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">IGD Soedarso</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> LG Hausys Origin – SMO1228
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RS Mata JEC -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/rumahsakit-4.png" alt="RS Mata JEC" loading="lazy">
                        <span class="project-badge"><i class="fas fa-eye me-1"></i> Rumah Sakit Mata</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">RS Mata JEC</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> Vinyl Flooring Premium
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RSK Dharmais -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/rumahsakit-5.png" alt="RSK Dharmais" loading="lazy">
                        <span class="project-badge"><i class="fas fa-hospital-alt me-1"></i> Rumah Sakit</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">RSK Dharmais</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> Ambiance Ultra - 2054
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RSIA Kemang Medical Care -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/rumahsakit-6.png" alt="RSIA Kemang Medical Care" loading="lazy">
                        <span class="project-badge"><i class="fas fa-hospital-user me-1"></i> RSIA</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">RSIA Kemang Medical Care</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> Allroad GF - 81004
                            </div>
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> Allroad GF - 81010
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RS Bhayangkara Pontianak -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/rumahsakit-7.png" alt="RS Bhayangkara Pontianak" loading="lazy">
                        <span class="project-badge"><i class="fas fa-hospital-alt me-1"></i> Rumah Sakit</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">RS Bhayangkara Pontianak</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> LG Hausys Unite 4212
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RS Muhammadiyah Taman Puring -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/rumahsakit-8.png" alt="RS Muhammadiyah Taman Puring" loading="lazy">
                        <span class="project-badge"><i class="fas fa-hospital-alt me-1"></i> Rumah Sakit</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">RS Muhammadiyah Taman Puring</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> LG Hausys Unite
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RS Immanuel Way Halim -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/rumahsakit-9.png" alt="RS Immanuel Way Halim" loading="lazy">
                        <span class="project-badge"><i class="fas fa-hospital-alt me-1"></i> Rumah Sakit</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">RS Immanuel Way Halim</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> Omega – DG 2002
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RSUD Simo Kab Boyolali -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/rumahsakit-10.png" alt="RSUD Simo Kab Boyolali" loading="lazy">
                        <span class="project-badge"><i class="fas fa-hospital-alt me-1"></i> RSUD</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">RSUD Simo Kab Boyolali</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> LG Hausys Origin – SMO1212
                            </div>
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> LG Hausys Origin – SMO1201
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RSUD Tarakan Jakarta -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/rumahsakit-11.png" alt="RSUD Tarakan Jakarta" loading="lazy">
                        <span class="project-badge"><i class="fas fa-hospital-alt me-1"></i> RSUD</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">RSUD Tarakan Jakarta</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> Gerflor Mipolam Concept – 5025
                            </div>
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> Mipolam Ambiance Ultra – 0044
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RSKIA Kopo Bandung -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/rumahsakit-12.png" alt="RSKIA Kopo Bandung" loading="lazy">
                        <span class="project-badge"><i class="fas fa-hospital-user me-1"></i> RSKIA</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">RSKIA Kopo Bandung</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> LG Hausys Unite – SMU4212
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RSUD Kab Bengkayang -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/rumahsakit-13.jpg" alt="RSUD Kab Bengkayang" loading="lazy">
                        <span class="project-badge"><i class="fas fa-hospital-alt me-1"></i> RSUD</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">RSUD Kab Bengkayang</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> LG Hausys Unite – SMU4212
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RS Humana Prima Bandung -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/rumahsakit-14.png" alt="RS Humana Prima Bandung" loading="lazy">
                        <span class="project-badge"><i class="fas fa-hospital-alt me-1"></i> Rumah Sakit</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">RS Humana Prima Bandung</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> LG Hausys Allroad 81007
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- INSTITUT PENDIDIKAN Section -->
        <div class="section-category wow fadeIn" data-wow-delay="0.4s">
            <h3 class="category-title"><i class="fas fa-graduation-cap me-2"></i> Institut Pendidikan</h3>
            <div class="projects-grid">
                
                <!-- BPK Penabur Bandung -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/pendidikan-1.png" alt="BPK Penabur Bandung" loading="lazy">
                        <span class="project-badge"><i class="fas fa-school me-1"></i> Sekolah</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">BPK Penabur Bandung</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> LG Hausys Leisure - 6400
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Universitas Solo - Ruang Alkes -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/pendidikan-2.png" alt="Universitas Solo - Ruang Alkes" loading="lazy">
                        <span class="project-badge"><i class="fas fa-university me-1"></i> Universitas</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">Universitas Solo - Ruang Alkes</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> LG Hausys Unite
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Universitas Mataram - Fakultas Kedokteran -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/pendidikan-3.png" alt="Universitas Mataram - Fakultas Kedokteran" loading="lazy">
                        <span class="project-badge"><i class="fas fa-university me-1"></i> Universitas</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">Universitas Mataram - Fakultas Kedokteran</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> GFlor Allroad - 81010
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cita Buana -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/pendidikan-4.png" alt="Cita Buana" loading="lazy">
                        <span class="project-badge"><i class="fas fa-book-reader me-1"></i> Pendidikan</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">Cita Buana</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> LG Hausys Unite
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- AREA OLAHRAGA Section -->
        <div class="section-category wow fadeIn" data-wow-delay="0.5s">
            <h3 class="category-title"><i class="fas fa-running me-2"></i> Area Olahraga</h3>
            <div class="projects-grid">
                
                <!-- GOR Kalimantan -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/olahraga-1.png" alt="GOR Kalimantan" loading="lazy">
                        <span class="project-badge"><i class="fas fa-basketball-ball me-1"></i> GOR</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">GOR Kalimantan</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> Kumgang Sport 4.5mm
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- COMMERCIAL Section -->
        <div class="section-category wow fadeIn" data-wow-delay="0.6s">
            <h3 class="category-title"><i class="fas fa-building me-2"></i> Commercial</h3>
            <div class="projects-grid">
                
                <!-- PT Bernofarm Petojo Gudang Obat -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/commercial-1.png" alt="PT Bernofarm Petojo Gudang Obat" loading="lazy">
                        <span class="project-badge"><i class="fas fa-industry me-1"></i> Industri</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">PT Bernofarm Petojo Gudang Obat</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> LG Hausys Palace - PAL9201
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PT Panasonic Manufacturing -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/commercial-2.png" alt="PT Panasonic Manufacturing" loading="lazy">
                        <span class="project-badge"><i class="fas fa-industry me-1"></i> Manufacturing</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">PT Panasonic Manufacturing</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> Omega - 18015
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hotel Gran Melia Kuningan -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/commercial-3.png" alt="Hotel Gran Melia Kuningan" loading="lazy">
                        <span class="project-badge"><i class="fas fa-hotel me-1"></i> Hotel</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">Hotel Gran Melia Kuningan (Dapur Cake)</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> GFlor Allroad – AR81004
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gedung MPP Pontianak -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/commercial-4.png" alt="Gedung MPP Pontianak" loading="lazy">
                        <span class="project-badge"><i class="fas fa-landmark me-1"></i> Gedung Pemerintah</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">Gedung MPP Pontianak</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> LG Hausys Decotile 60x60 – 6523
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- HEALTHY CARE AREA Section -->
        <div class="section-category wow fadeIn" data-wow-delay="0.7s">
            <h3 class="category-title"><i class="fas fa-hand-holding-medical me-2"></i> Healthy Care Area</h3>
            <div class="projects-grid">
                
                <!-- PMI Kutai Kertanegara -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/healthycare-1.png" alt="PMI Kutai Kertanegara" loading="lazy">
                        <span class="project-badge"><i class="fas fa-tint me-1"></i> PMI</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">PMI Kutai Kertanegara</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> Omega – Cream 18013
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PMI Serang -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="/img/healthycare-2.png" alt="PMI Serang" loading="lazy">
                        <span class="project-badge"><i class="fas fa-tint me-1"></i> PMI</span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name">PMI Serang</h4>
                        <div class="project-details">
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> GFlor Allroad – AR81037
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- Hasil Instalasi Section End -->

<?= $this->include('landing-page/layout/footer') ?>
