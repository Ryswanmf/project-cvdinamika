<?php
// Load settings manually since this is an error view
$db = \Config\Database::connect();
$query = $db->query('SELECT key_name, value FROM site_settings');
$results = $query->getResultArray();
$settings = [];
foreach ($results as $row) {
    $settings[$row['key_name']] = $row['value'];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Halaman Tidak Ditemukan | <?= $settings['site_title'] ?? 'CV Dinamika' ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">

    <style>
        .error-page {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: linear-gradient(rgba(255,255,255,0.9), rgba(255,255,255,0.9)), url('/img/hero-bg.jpg');
            background-size: cover;
            background-position: center;
        }
        .error-code {
            font-size: 8rem;
            font-weight: 700;
            color: #14756E;
            line-height: 1;
        }
        .error-text {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <!-- Navbar Start -->
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light border-bottom border-2 border-white">
                <a href="/" class="navbar-brand">
                    <img src="<?= base_url('img/logo_dinamikainti.png') ?>" alt="Logo" style="height: 50px;">
                    <h1><?= $settings['site_title'] ?? 'CV Dinamika' ?></h1>
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="/" class="nav-item nav-link">Beranda</a>
                        <a href="/produk" class="nav-item nav-link">Produk</a>
                        <a href="/kontak" class="nav-item nav-link">Kontak</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- 404 Start -->
    <div class="container-fluid error-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="error-code">404</div>
                    <h1 class="error-text">Halaman Tidak Ditemukan</h1>
                    <p class="mb-4 text-muted" style="font-size: 1.1rem;">Maaf, halaman yang Anda cari mungkin telah dihapus, namanya diubah, atau sementara tidak tersedia.</p>
                    
                    <div class="d-flex justify-content-center gap-3">
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="/">
                            <i class="fas fa-home me-2"></i> Kembali ke Beranda
                        </a>
                        <a class="btn btn-outline-dark rounded-pill py-3 px-5" href="/produk">
                            <i class="fas fa-search me-2"></i> Lihat Produk
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5">
        <div class="container py-5 text-center">
            <p>&copy; <a class="border-bottom" href="/"><?= $settings['site_title'] ?? 'CV Dinamika' ?></a>, All Right Reserved.</p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/wow/wow.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/waypoints/waypoints.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>