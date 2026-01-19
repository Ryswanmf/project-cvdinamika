<?= $this->include('landing-page/layout/header') ?>

<style>
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

.blog-section-title {
    text-align: center;
    margin-bottom: 50px;
    font-size: 2rem;
    font-weight: 700;
    color: #2c3e50;
}

.blog-section-title .highlight {
    color: #0d6e6e;
    text-transform: uppercase;
    background: #e8f8f5;
    padding: 2px 12px;
    border-radius: 4px;
}

/* Blog Card */
.blog-card {
    background: #ffffff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    height: 100%;
    display: flex;
    flex-direction: column;
}

.blog-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(13, 110, 110, 0.15);
}

/* Blog Image Container */
.blog-image {
    position: relative;
    width: 100%;
    height: 200px;
    overflow: hidden;
    background: #f5f5f5;
}

.blog-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.blog-card:hover .blog-image img {
    transform: scale(1.1);
}

.blog-image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.3) 100%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.blog-card:hover .blog-image::after {
    opacity: 1;
}

/* Category Badge */
.blog-category {
    position: absolute;
    top: 16px;
    left: 16px;
    background: #0d6e6e;
    color: #ffffff;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    z-index: 2;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Blog Content */
.blog-content {
    padding: 24px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.blog-date {
    display: inline-block;
    color: #7f8c8d;
    font-size: 0.85rem;
    margin-bottom: 12px;
    font-weight: 500;
}

.blog-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 12px;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 3.5rem;
}

.blog-excerpt {
    color: #5a6c7d;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 16px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex-grow: 1;
}

.blog-link {
    color: #0d6e6e;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
    margin-top: auto;
}

.blog-link:hover {
    color: #0a5252;
    gap: 8px;
}

/* Empty State */
.blog-empty-state {
    text-align: center;
    padding: 100px 20px;
    color: #95a5a6;
}

.blog-empty-state h4 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #bdc3c7;
}

/* Pagination */
.blog-pagination {
    margin-top: 60px;
    text-align: center;
}

/* Animation */
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

.blog-card {
    animation: fadeInUp 0.6s ease-out backwards;
}

.blog-card:nth-child(1) { animation-delay: 0.1s; }
.blog-card:nth-child(2) { animation-delay: 0.2s; }
.blog-card:nth-child(3) { animation-delay: 0.3s; }
.blog-card:nth-child(4) { animation-delay: 0.4s; }
.blog-card:nth-child(5) { animation-delay: 0.5s; }
.blog-card:nth-child(6) { animation-delay: 0.6s; }

/* Responsive */
@media (max-width: 768px) {
    .blog-page-header h1 {
        font-size: 2rem;
    }
    
    .blog-section-title {
        font-size: 1.5rem;
    }
    
    .blog-image {
        height: 180px;
    }
    
    .blog-title {
        font-size: 1.1rem;
    }
}
</style>

<!-- Page Header Start -->
<div class="page-title-box">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title-main animated slideInDown">Blog</h1>
                <p class="page-subtitle">Artikel & Tips Seputar Lantai dan Interior</p>
                <nav aria-label="breadcrumb" class="mt-4">
                    <ol class="breadcrumb justify-content-center mb-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>" class="text-white text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Blog Section Start -->
<div class="container py-5">
    <h2 class="blog-section-title">Tips & Inspirasi <span class="highlight">Interior</span></h2>
    
    <?php if(empty($blogs)): ?>
        <div class="blog-empty-state">
            <h4>Belum ada artikel yang diterbitkan.</h4>
        </div>
    <?php else: ?>
        <div class="row g-4">
            <?php foreach($blogs as $blog): ?>
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <div class="blog-image">
                        <img src="<?= base_url('uploads/blog/' . ($blog['image'] ?? 'placeholder-blog.jpg')) ?>" 
                             alt="<?= esc($blog['title']) ?>" 
                             loading="lazy">
                        <span class="blog-category"><?= esc($blog['category'] ?? 'Interior') ?></span>
                    </div>
                    <div class="blog-content">
                        <span class="blog-date"><?= date('d F Y', strtotime($blog['created_at'])) ?></span>
                        <h3 class="blog-title"><?= esc($blog['title']) ?></h3>
                        <p class="blog-excerpt">
                            <?= esc(substr(strip_tags($blog['content']), 0, 120)) ?>...
                        </p>
                        <a href="<?= site_url('blog/' . $blog['slug']) ?>" class="blog-link">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Pagination -->
        <div class="blog-pagination">
            <?= $pager->links() ?>
        </div>
    <?php endif; ?>
</div>
<!-- Blog Section End -->

<?= $this->include('landing-page/layout/footer') ?>
