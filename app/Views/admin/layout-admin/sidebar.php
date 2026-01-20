        <div class="list-group list-group-flush">
            <a href="/admin" class="list-group-item list-group-item-action bg-transparent nav-link <?= uri_string() == 'admin' ? 'active' : '' ?>">
                <i class="fas fa-tachometer-alt"></i>Dashboard
            </a>
            <a href="/admin/projects" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/projects') !== false ? 'active' : '' ?>">
                <i class="fas fa-briefcase"></i>Proyek / Portofolio
            </a>
            <a href="/admin/produk" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/produk') !== false ? 'active' : '' ?>">
                <i class="fas fa-shopping-cart"></i>Produk
            </a>
            <a href="/admin/blog" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/blog') !== false ? 'active' : '' ?>">
                <i class="fas fa-blog"></i>Blog
            </a>
            <a href="/admin/team" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/team') !== false ? 'active' : '' ?>">
                <i class="fas fa-users"></i>Team
            </a>
            <a href="/admin/testimonial" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/testimonial') !== false ? 'active' : '' ?>">
                <i class="fas fa-star"></i>Testimonial
            </a>
            <a href="/admin/faq" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/faq') !== false ? 'active' : '' ?>">
                <i class="fas fa-question-circle"></i>FAQ
            </a>
            <a href="/admin/kontak" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/kontak') !== false ? 'active' : '' ?>">
                <i class="fas fa-envelope"></i>Kontak
            </a>
            <a href="/admin/tentang-kami" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/tentang-kami') !== false ? 'active' : '' ?>">
                <i class="fas fa-info-circle"></i>Tentang Kami
            </a>
            <a href="/admin/settings" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/settings') !== false ? 'active' : '' ?>">
                <i class="fas fa-cog"></i>Pengaturan
            </a>
            <a href="/admin/banner" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/banner') !== false ? 'active' : '' ?>">
                <i class="fas fa-images"></i>Banner Depan
            </a>
            <a href="/admin/services" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/services') !== false ? 'active' : '' ?>">
                <i class="fas fa-concierge-bell"></i>Layanan
            </a>
            <a href="/admin/backup" class="list-group-item list-group-item-action bg-transparent nav-link text-danger" onclick="return confirm('Download backup database sekarang?')">
                <i class="fas fa-database"></i>Backup Database
            </a>
            <a href="/" class="list-group-item list-group-item-action bg-transparent nav-link">
                <i class="fas fa-home"></i>Kembali ke Situs
            </a>
        </div>