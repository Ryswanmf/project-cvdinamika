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

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
    <style>
        /* Logo styling */
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .navbar-brand img {
            height: 50px;
            width: auto;
            object-fit: contain;
        }
        
        .navbar-brand h1 {
            font-size: 1.8rem;
            margin: 0;
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
    <!-- Spinner Start -->
    <!-- Removed to improve LCP performance -->
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light border-bottom border-2 border-white">
                <a href="/" class="navbar-brand">
                    <img src="<?= base_url('img/logo_dinamikainti.png') ?>" alt="Logo CV Dinamika Inti">
                    <h1><?= $settings['site_title'] ?? 'CV Dinamika Inti' ?></h1>
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
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
