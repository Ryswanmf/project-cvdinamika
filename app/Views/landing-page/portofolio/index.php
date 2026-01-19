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

        <?php 
        // Grup proyek berdasarkan kategori
        $categories = [
            'Klinik' => ['icon' => 'fa-clinic-medical', 'delay' => '0.2s'],
            'Rumah Sakit' => ['icon' => 'fa-hospital', 'delay' => '0.3s'],
            'Institut Pendidikan' => ['icon' => 'fa-graduation-cap', 'delay' => '0.4s'],
            'Area Olahraga' => ['icon' => 'fa-running', 'delay' => '0.5s'],
            'Commercial' => ['icon' => 'fa-building', 'delay' => '0.6s'],
            'Healthy Care' => ['icon' => 'fa-hand-holding-medical', 'delay' => '0.7s']
        ];
        
        foreach ($categories as $categoryName => $categoryConfig):
            $categoryProjects = array_filter($projects, function($project) use ($categoryName) {
                return $project['category'] === $categoryName;
            });
            
            if (empty($categoryProjects)) continue;
        ?>
        
        <!-- <?= $categoryName ?> Section -->
        <div class="section-category wow fadeIn" data-wow-delay="<?= $categoryConfig['delay'] ?>">
            <h3 class="category-title"><i class="fas <?= $categoryConfig['icon'] ?> me-2"></i> <?= $categoryName ?></h3>
            <div class="projects-grid">
                
                <?php foreach ($categoryProjects as $project): ?>
                <!-- <?= esc($project['title']) ?> -->
                <div class="project-card">
                    <div class="project-image">
                        <img src="<?= base_url('uploads/projects/' . $project['image']) ?>" alt="<?= esc($project['title']) ?>" loading="lazy">
                        <span class="project-badge">
                            <i class="fas fa-check-circle me-1"></i> 
                            <?= esc($project['badge_text'] ?: $categoryName) ?>
                        </span>
                    </div>
                    <div class="project-content">
                        <h4 class="project-name"><?= esc($project['title']) ?></h4>
                        <?php if (!empty($project['product_details'])): ?>
                        <div class="project-details">
                            <?php 
                            $details = explode("\n", $project['product_details']);
                            foreach ($details as $detail): 
                                $detail = trim($detail);
                                if (empty($detail)) continue;
                            ?>
                            <div class="project-details-item">
                                <i class="fas fa-check-circle"></i> <?= esc($detail) ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
        
        <?php endforeach; ?>

    </div>
</div>
<!-- Hasil Instalasi Section End -->

<?= $this->include('landing-page/layout/footer') ?>
