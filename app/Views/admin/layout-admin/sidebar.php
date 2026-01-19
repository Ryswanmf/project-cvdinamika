        <!-- Sidebar -->
        <nav class="sidebar p-3" style="width: 250px;">
            <h4 class="text-center mb-4">CV Dinamika Admin</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="/admin" class="nav-link <?= uri_string() == 'admin' ? 'active' : '' ?>"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="/admin/projects" class="nav-link <?= strpos(uri_string(), 'admin/projects') !== false ? 'active' : '' ?>"><i class="fas fa-briefcase me-2"></i>Proyek / Portofolio</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="/admin/produk" class="nav-link <?= strpos(uri_string(), 'admin/produk') !== false ? 'active' : '' ?>"><i class="fas fa-shopping-cart me-2"></i>Produk</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="/admin/blog" class="nav-link <?= strpos(uri_string(), 'admin/blog') !== false ? 'active' : '' ?>"><i class="fas fa-blog me-2"></i>Blog</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="/admin/team" class="nav-link <?= strpos(uri_string(), 'admin/team') !== false ? 'active' : '' ?>"><i class="fas fa-users me-2"></i>Team</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="/admin/testimonial" class="nav-link <?= strpos(uri_string(), 'admin/testimonial') !== false ? 'active' : '' ?>"><i class="fas fa-star me-2"></i>Testimonial</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="/admin/faq" class="nav-link <?= strpos(uri_string(), 'admin/faq') !== false ? 'active' : '' ?>"><i class="fas fa-question-circle me-2"></i>FAQ</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="/admin/kontak" class="nav-link <?= strpos(uri_string(), 'admin/kontak') !== false ? 'active' : '' ?>"><i class="fas fa-envelope me-2"></i>Kontak</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="/admin/tentang-kami" class="nav-link <?= strpos(uri_string(), 'admin/tentang-kami') !== false ? 'active' : '' ?>"><i class="fas fa-info-circle me-2"></i>Tentang Kami</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="/admin/settings" class="nav-link <?= strpos(uri_string(), 'admin/settings') !== false ? 'active' : '' ?>"><i class="fas fa-cog me-2"></i>Pengaturan</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="/admin/banner" class="nav-link <?= strpos(uri_string(), 'admin/banner') !== false ? 'active' : '' ?>"><i class="fas fa-images me-2"></i>Banner Depan</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="/admin/backup" class="nav-link text-danger" onclick="return confirm('Download backup database sekarang?')"><i class="fas fa-database me-2"></i>Backup Database</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="/" class="nav-link"><i class="fas fa-home me-2"></i>Kembali ke Situs</a>
                </li>
            </ul>
        </nav>