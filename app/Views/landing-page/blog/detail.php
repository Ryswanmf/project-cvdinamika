<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($blog['title']) ?> - CV Dinamika Inti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<style>
/* Blog Detail Page */
body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    background: #f5f7fa;
    margin: 0;
    padding: 0;
}

.back-button {
    position: fixed;
    top: 30px;
    left: 30px;
    z-index: 1000;
    background: #ffffff;
    color: #0d6e6e;
    border: 2px solid #0d6e6e;
    padding: 12px 24px;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 4px 12px rgba(13, 110, 110, 0.15);
    transition: all 0.3s ease;
}

.back-button:hover {
    background: #0d6e6e;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(13, 110, 110, 0.25);
}

.back-button i {
    font-size: 1.1rem;
}

.blog-detail-header {
    background: linear-gradient(135deg, #0d6e6e 0%, #0a5252 100%);
    padding: 80px 0 60px;
    margin-bottom: 60px;
}

.blog-detail-header h1 {
    color: #ffffff;
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 20px;
}

.blog-detail-breadcrumb {
    background: transparent;
    margin: 0;
    padding: 0;
}

.blog-detail-breadcrumb .breadcrumb {
    background: transparent;
    margin: 0;
    padding: 0;
    justify-content: center;
}

.blog-detail-breadcrumb .breadcrumb-item {
    color: rgba(255, 255, 255, 0.8);
}

.blog-detail-breadcrumb .breadcrumb-item + .breadcrumb-item::before {
    content: "/";
    color: rgba(255, 255, 255, 0.5);
}

.blog-detail-breadcrumb .breadcrumb-item a {
    color: #ffffff;
    text-decoration: none;
    transition: opacity 0.3s;
}

.blog-detail-breadcrumb .breadcrumb-item a:hover {
    opacity: 0.8;
}

.blog-detail-breadcrumb .breadcrumb-item.active {
    color: #a8e6cf;
}

/* Article Container */
.article-container {
    background: #ffffff;
    padding: 50px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

/* Featured Image */
.article-featured-image {
    width: 100%;
    height: 450px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 40px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
}

/* Article Title */
.article-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: #1a1a1a;
    line-height: 1.3;
    margin-bottom: 25px;
    letter-spacing: -0.5px;
}

/* Article Meta */
.article-meta {
    display: flex;
    gap: 30px;
    margin-bottom: 35px;
    padding-bottom: 25px;
    border-bottom: 2px solid #e8e8e8;
    flex-wrap: wrap;
}

.article-meta-item {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #666;
    font-size: 0.95rem;
    font-weight: 500;
}

.article-meta-item i {
    color: #0d6e6e;
    font-size: 1.1rem;
}

/* Article Content */
.article-content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #333;
    font-family: 'Georgia', serif;
}

.article-content p {
    margin-bottom: 25px;
    text-align: justify;
}

.article-content h3 {
    font-size: 1.75rem;
    font-weight: 700;
    color: #0d6e6e;
    margin-top: 45px;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 3px solid #e8f8f5;
}

.article-content ol,
.article-content ul {
    margin-bottom: 25px;
    padding-left: 30px;
}

.article-content li {
    margin-bottom: 12px;
    line-height: 1.8;
}

.article-content strong {
    color: #0d6e6e;
    font-weight: 600;
}

.article-content em {
    background: #fff8e6;
    padding: 2px 6px;
    border-radius: 3px;
    font-style: normal;
}

/* Sidebar */
.blog-sidebar {
    position: sticky;
    top: 100px;
}

.sidebar-widget {
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
    margin-bottom: 30px;
}

.sidebar-widget-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 3px solid #0d6e6e;
}

/* Recent Post Item */
.recent-post-item {
    display: flex;
    gap: 15px;
    padding: 15px;
    border-radius: 8px;
    transition: all 0.3s ease;
    margin-bottom: 15px;
}

.recent-post-item:hover {
    background: #f8f9fa;
    transform: translateX(5px);
}

.recent-post-image {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 8px;
    flex-shrink: 0;
}

.recent-post-content {
    flex-grow: 1;
}

.recent-post-title {
    font-size: 1rem;
    font-weight: 600;
    color: #2c3e50;
    text-decoration: none;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    line-height: 1.4;
    margin-bottom: 8px;
    transition: color 0.3s;
}

.recent-post-title:hover {
    color: #0d6e6e;
}

.recent-post-date {
    color: #7f8c8d;
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    gap: 6px;
}

/* Responsive */
@media (max-width: 992px) {
    .article-container {
        padding: 30px 20px;
    }
    
    .article-title {
        font-size: 2rem;
    }
    
    .article-featured-image {
        height: 300px;
    }
    
    .blog-sidebar {
        position: static;
        margin-top: 50px;
    }
}

@media (max-width: 768px) {
    .back-button {
        top: 15px;
        left: 15px;
        padding: 10px 20px;
        font-size: 0.9rem;
    }
    
    .blog-detail-header h1 {
        font-size: 1.75rem;
    }
    
    .article-title {
        font-size: 1.75rem;
    }
    
    .article-content {
        font-size: 1rem;
    }
    
    .article-meta {
        gap: 15px;
    }
}
</style>

<!-- Back Button -->
<a href="/blog" class="back-button">
    <i class="fas fa-arrow-left"></i>
    Kembali ke Blog
</a>

<!-- Page Header Start -->
<div class="blog-detail-header">
    <div class="container text-center">
        <h1>Detail Artikel</h1>
        <nav aria-label="breadcrumb" class="blog-detail-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/blog">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mengenal Vinyl Lantai Roll: Solusi Lantai Modern untuk Berbagai Kebutuhan</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Blog Detail Start -->
<div class="container py-5">
    <div class="row g-5">
        <!-- Main Content -->
        <div class="col-lg-8">
            <article class="article-container">
                <img class="article-featured-image" 
                     src="<?= base_url('uploads/blog/' . $blog['image']) ?>" 
                     alt="<?= esc($blog['title']) ?>">
                
                <h1 class="article-title"><?= esc($blog['title']) ?></h1>
                
                <div class="article-meta">
                    <span class="article-meta-item">
                        <i class="far fa-user"></i>
                        <?= esc($blog['author']) ?>
                    </span>
                    <span class="article-meta-item">
                        <i class="far fa-calendar-alt"></i>
                        <?= date('d F Y', strtotime($blog['created_at'])) ?>
                    </span>
                    <span class="article-meta-item">
                        <i class="far fa-folder"></i>
                        <?= esc($blog['category']) ?>
                    </span>
                </div>
                
                <div class="article-content">
                    <?= $blog['content'] ?>
                </div>
            </article>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <aside class="blog-sidebar">
                <div class="sidebar-widget">
                    <h4 class="sidebar-widget-title">Artikel Terbaru</h4>
                    <?php foreach($recent_posts as $recent): ?>
                    <div class="recent-post-item">
                        <img class="recent-post-image" 
                             src="<?= base_url('uploads/blog/' . $recent['image']) ?>" 
                             alt="<?= esc($recent['title']) ?>">
                        <div class="recent-post-content">
                            <a href="<?= site_url('blog/' . $recent['slug']) ?>" 
                               class="recent-post-title">
                                <?= esc($recent['title']) ?>
                            </a>
                            <div class="recent-post-date">
                                <i class="far fa-clock"></i>
                                <?= date('d M Y', strtotime($recent['created_at'])) ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </aside>
        </div>
    </div>
</div>
<!-- Blog Detail End -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
