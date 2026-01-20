<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= (isset($title) ? $title . ' | ' : '') . ($settings['site_title'] ?? 'CV Dinamika') ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="<?= $meta_description ?? $settings['site_description'] ?? '' ?>" name="description">

    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= current_url() ?>">
    <meta property="og:title" content="<?= (isset($title) ? $title . ' | ' : '') . ($settings['site_title'] ?? 'CV Dinamika') ?>">
    <meta property="og:description" content="<?= $meta_description ?? $settings['site_description'] ?? '' ?>">
    <meta property="og:image" content="<?= $og_image ?? base_url('img/logo_dinamikainti.png') ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= current_url() ?>">
    <meta property="twitter:title" content="<?= (isset($title) ? $title . ' | ' : '') . ($settings['site_title'] ?? 'CV Dinamika') ?>">
    <meta property="twitter:description" content="<?= $meta_description ?? $settings['site_description'] ?? '' ?>">
    <meta property="twitter:image" content="<?= $og_image ?? base_url('img/logo_dinamikainti.png') ?>">

    <!-- Favicon -->
    <link href="<?= base_url('img/logo%20dinamikainti%202.jpeg?v=2') ?>" rel="icon" type="image/jpeg">
    <link href="<?= base_url('img/logo%20dinamikainti%202.jpeg?v=2') ?>" rel="apple-touch-icon">
    <link href="<?= base_url('img/logo%20dinamikainti%202.jpeg?v=2') ?>" rel="shortcut icon" type="image/jpeg">

    <!-- Google Web Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet"> -->

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Glightbox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
    <style>
        /* --- Premium UI Upgrade --- */
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #14756E;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #1a9187;
        }

        /* Reading Progress Bar */
        #scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 4px;
            background: linear-gradient(90deg, #14756E, #20B2AA);
            z-index: 9999;
            transition: width 0.1s ease;
        }

        /* 1. Glassmorphism Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.03);
            transition: all 0.3s ease;
            padding: 15px 0;
        }
        
        .navbar.sticky-top {
            background: rgba(255, 255, 255, 0.9) !important;
            padding: 10px 0;
        }

        .navbar-brand h1 {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
            letter-spacing: 1px;
            color: #14756E;
        }

        /* 2. Modern Cards (Product & Project) */
        .product-item, .project-item, .service-item, .bg-light.rounded {
            border: none !important;
            background: #fff !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border-radius: 16px !important;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); /* Bouncy effect */
            overflow: hidden;
        }

        .product-item:hover, .project-item:hover, .service-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(20, 117, 110, 0.15);
        }

        /* 3. Typography & Buttons */
        body {
            font-family: 'Montserrat', sans-serif;
            color: #555;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
            color: #2c3e50;
        }

        .btn-primary {
            background: linear-gradient(135deg, #14756E 0%, #1a9187 100%);
            border: none;
            box-shadow: 0 4px 15px rgba(20, 117, 110, 0.3);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(20, 117, 110, 0.4);
            background: linear-gradient(135deg, #1a9187 0%, #14756E 100%);
        }

        .btn-square {
            border-radius: 12px !important; /* Soften square buttons */
        }

        /* 4. Section Spacing */
        .py-5 {
            padding-top: 5rem !important;
            padding-bottom: 5rem !important;
        }
        
        /* Logo styling correction */
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .navbar-brand img {
            height: 45px;
            width: auto;
            object-fit: contain;
        }

        /* --- Mobile Responsive Fixes --- */
        @media (max-width: 991.98px) {
            /* 1. Solid Background for Mobile Menu */
            .navbar-collapse {
                background: #ffffff;
                padding: 15px;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                margin-top: 10px;
            }
            
            /* 2. Smaller Headings */
            .display-1 { font-size: 3rem !important; }
            .display-2 { font-size: 2.5rem !important; }
            .display-3 { font-size: 2rem !important; }
            
            /* 3. Compact Spacing */
            .py-5 {
                padding-top: 3rem !important;
                padding-bottom: 3rem !important;
            }
            
            /* 4. Adjust Hero Text */
            .hero-header {
                text-align: center;
            }
            .hero-header .col-lg-6:first-child {
                margin-bottom: 30px;
            }
        }
    </style>

    <!-- Schema.org JSON-LD -->
    <?php if (isset($schema)): ?>
    <script type="application/ld+json">
        <?= json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
    </script>
    <?php endif; ?>
</head>

<body>
    <!-- Reading Progress Bar -->
    <div id="scroll-progress"></div>

    <!-- Navbar Start -->
    <div class="container-fluid sticky-top p-0">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="/" class="navbar-brand ps-3">
                    <img src="<?= base_url('img/logo_dinamikainti.png') ?>" alt="Logo CV Dinamika Inti">
                    <h1><?= $settings['site_title'] ?? 'CV Dinamika Inti' ?></h1>
                </a>
                <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto p-3">
                        <a href="/" class="nav-item nav-link <?= (uri_string() == '') ? 'active' : '' ?>">Beranda</a>
                        <a href="/produk" class="nav-item nav-link <?= (strpos(uri_string(), 'produk') !== false) ? 'active' : '' ?>">Produk</a>
                        <a href="/portofolio" class="nav-item nav-link <?= (uri_string() == 'portofolio') ? 'active' : '' ?>">Portofolio</a>
                        <a href="/blog" class="nav-item nav-link <?= (strpos(uri_string(), 'blog') !== false) ? 'active' : '' ?>">Blog</a>
                        <a href="/kontak" class="nav-item nav-link <?= (uri_string() == 'kontak') ? 'active' : '' ?>">Kontak</a>  
                        <a href="/tentang-kami" class="nav-item nav-link <?= (uri_string() == 'tentang-kami') ? 'active' : '' ?>">Tentang Kami</a>
                        <a href="/search" class="nav-item nav-link" title="Pencarian"><i class="fas fa-search"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
