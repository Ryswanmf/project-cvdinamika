<?= $this->include('landing-page/layout/header') ?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-4 mb-4 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Produk Kami</h1>
        <p class="text-white mb-4">Koleksi Produk Lantai Berkualitas Premium</p>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0" id="breadcrumb-nav">
                <li class="breadcrumb-item"><a class="text-white" href="<?= base_url() ?>">Beranda</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page" id="breadcrumb-current">Produk</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Products Section Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row">
            <!-- Sidebar Navigation -->
            <div class="col-lg-3 mb-4">
                <div class="sidebar-nav sticky-top" style="top: 120px; z-index: 99;">
                    <h5 class="mb-4">Kategori Produk</h5>
                    
                    <!-- Category Filter -->
                    <div class="category-list" id="category-list">
                        <button class="btn btn-outline-primary w-100 mb-2 category-btn active" data-category="semua">
                            <i class="fas fa-th-large me-2"></i>Semua Produk
                        </button>
                        <!-- Kategori akan dimuat secara dinamis dari products.json -->
                    </div>

                    <!-- Brand Filter (shown when category selected) -->
                    <div id="brand-filter" class="mt-4" style="display: none;">
                        <h6 class="mb-3">Brand</h6>
                        <div id="brand-list"></div>
                    </div>

                    <!-- Collection Filter (shown when brand selected) -->
                    <div id="collection-filter" class="mt-4" style="display: none;">
                        <h6 class="mb-3">Koleksi</h6>
                        <div id="collection-list"></div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                <!-- Navigation Breadcrumb -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 id="section-title">Semua Produk</h4>
                        <p class="text-muted mb-0" id="product-count">Koleksi Lantai Berkualitas Premium</p>
                    </div>
                    <button class="btn btn-primary" id="reset-filter">
                        <i class="fas fa-redo me-2"></i>Reset Filter
                    </button>
                </div>

                <!-- Download Deskripsi Section -->
                <div id="download-section" class="alert alert-info border-0 shadow-sm mb-4" style="display: none;">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <h5 class="mb-2"><i class="fas fa-file-download me-2 text-primary"></i>Deskripsi Produk Tersedia</h5>
                            <p class="mb-0 text-muted">Download file deskripsi untuk informasi lengkap</p>
                        </div>
                        <a href="#" id="download-btn" class="btn btn-primary" download>
                            <i class="fas fa-download me-2"></i>Download .DOCX
                        </a>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="row g-4" id="products-grid">
                    <!-- Products will be loaded here -->
                    <div class="col-12 text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-3">Memuat produk...</p>
                    </div>
                </div>

                <!-- Pagination -->
                <nav aria-label="Product navigation" class="mt-5" id="pagination-nav" style="display: none;">
                    <ul class="pagination justify-content-center" id="pagination"></ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Products Section End -->

<!-- Lightbox Modal -->
<div class="modal fade" id="productLightbox" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="lightbox-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <img id="lightbox-image" src="" alt="" class="img-fluid w-100">
            </div>
            <div class="modal-footer border-0">
                <p class="text-muted mb-0" id="lightbox-description"></p>
            </div>
        </div>
    </div>
</div>

<!-- Load Product JavaScript -->
<script src="<?= base_url('js/products.js') ?>"></script>

<?= $this->include('landing-page/layout/footer') ?>
