        <div class="list-group list-group-flush sidebar">
            <a href="/admin" class="list-group-item list-group-item-action bg-transparent nav-link <?= uri_string() == 'admin' ? 'active' : '' ?>">
                <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
            </a>
            <a href="/admin/projects" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/projects') !== false ? 'active' : '' ?>">
                <i class="fas fa-briefcase"></i><span>Proyek / Portofolio</span>
            </a>
            <a href="/admin/product-catalog" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/product-catalog') !== false ? 'active' : '' ?>">
                <i class="fas fa-folder-open"></i><span>Katalog Produk</span>
            </a>
            <a href="/admin/blog" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/blog') !== false ? 'active' : '' ?>">
                <i class="fas fa-blog"></i><span>Blog</span>
            </a>
            <a href="/admin/team" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/team') !== false ? 'active' : '' ?>">
                <i class="fas fa-users"></i><span>Team</span>
            </a>
            <a href="/admin/testimonial" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/testimonial') !== false ? 'active' : '' ?>">
                <i class="fas fa-star"></i><span>Testimonial</span>
            </a>
            <a href="/admin/faq" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/faq') !== false ? 'active' : '' ?>">
                <i class="fas fa-question-circle"></i><span>FAQ</span>
            </a>
            <a href="/admin/kontak" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/kontak') !== false ? 'active' : '' ?>">
                <i class="fas fa-envelope"></i><span>Kontak</span>
            </a>
            <a href="/admin/tentang-kami" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/tentang-kami') !== false ? 'active' : '' ?>">
                <i class="fas fa-info-circle"></i><span>Tentang Kami</span>
            </a>
            <a href="/admin/settings" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/settings') !== false ? 'active' : '' ?>">
                <i class="fas fa-cog"></i><span>Pengaturan</span>
            </a>
            <a href="/admin/banner" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/banner') !== false ? 'active' : '' ?>">
                <i class="fas fa-images"></i><span>Banner Depan</span>
            </a>
            <a href="/admin/services" class="list-group-item list-group-item-action bg-transparent nav-link <?= strpos(uri_string(), 'admin/services') !== false ? 'active' : '' ?>">
                <i class="fas fa-concierge-bell"></i><span>Layanan</span>
            </a>
            <a href="/admin/backup" class="list-group-item list-group-item-action bg-transparent nav-link text-danger" onclick="return confirm('Download backup database sekarang?')">
                <i class="fas fa-database"></i><span>Backup Database</span>
            </a>
            <a href="/" class="list-group-item list-group-item-action bg-transparent nav-link">
                <i class="fas fa-home"></i><span>Kembali ke Situs</span>
            </a>
        </div>