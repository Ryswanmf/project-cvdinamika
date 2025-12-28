<!-- Sidebar -->
<nav class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 260px; min-height: 100vh;">
    <a href="<?= site_url('admin') ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4 fw-bold">CV Dinamika</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="<?= site_url('admin') ?>" class="nav-link text-white <?= uri_string() == 'admin' ? 'active' : '' ?>">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="<?= site_url('admin/projects') ?>" class="nav-link text-white <?= strpos(uri_string(), 'admin/projects') !== false ? 'active' : '' ?>">
                <i class="fas fa-folder me-2"></i> Proyek / Portofolio
            </a>
        </li>
        
        <!-- Menu Produk Baru -->
        <li>
            <a href="<?= site_url('admin/produk') ?>" class="nav-link text-white <?= strpos(uri_string(), 'admin/produk') !== false ? 'active' : '' ?>">
                <i class="fas fa-box me-2"></i> Produk
            </a>
        </li>

        <li>
            <a href="<?= site_url('admin/kontak') ?>" class="nav-link text-white <?= strpos(uri_string(), 'admin/kontak') !== false ? 'active' : '' ?>">
                <i class="fas fa-envelope me-2"></i> Pesan Masuk
            </a>
        </li>

        <li>
            <a href="<?= site_url('admin/blog') ?>" class="nav-link text-white <?= strpos(uri_string(), 'admin/blog') !== false ? 'active' : '' ?>">
                <i class="fas fa-newspaper me-2"></i> Blog / Artikel
            </a>
        </li>

        <li>
            <a href="<?= site_url('admin/team') ?>" class="nav-link text-white <?= strpos(uri_string(), 'admin/team') !== false ? 'active' : '' ?>">
                <i class="fas fa-users me-2"></i> Tim Kami
            </a>
        </li>

        <li>
            <a href="<?= site_url('admin/testimonial') ?>" class="nav-link text-white <?= strpos(uri_string(), 'admin/testimonial') !== false ? 'active' : '' ?>">
                <i class="fas fa-comment-alt me-2"></i> Testimonial
            </a>
        </li>

        <li>
            <a href="<?= site_url('admin/tentang-kami') ?>" class="nav-link text-white <?= strpos(uri_string(), 'admin/tentang-kami') !== false ? 'active' : '' ?>">
                <i class="fas fa-info-circle me-2"></i> Tentang Kami
            </a>
        </li>
        <!--
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fas fa-shopping-cart me-2"></i> Pesanan
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fas fa-users me-2"></i> Pelanggan
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fas fa-chart-line me-2"></i> Laporan
            </a>
        </li>
        -->

        <li>
            <a href="<?= site_url('admin/settings') ?>" class="nav-link text-white <?= strpos(uri_string(), 'admin/settings') !== false ? 'active' : '' ?>">
                <i class="fas fa-cog me-2"></i> Pengaturan
            </a>
        </li>
        <li>
            <a href="<?= site_url('/') ?>" class="nav-link text-white" target="_blank">
                <i class="fas fa-external-link-alt me-2"></i> Lihat Website
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                <i class="fas fa-user small"></i>
            </div>
            <strong><?= session()->get('user_name') ?? 'Admin' ?></strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="<?= site_url('admin/settings') ?>">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= site_url('logout') ?>">Sign out</a></li>
        </ul>
    </div>
</nav>