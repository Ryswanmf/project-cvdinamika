<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('tentang-kami', 'Home::about');
$routes->get('sejarah', 'Home::sejarah');
$routes->get('portofolio', 'Home::portfolio');
$routes->get('/produk', 'Home::products');
$routes->get('/produk/detail/(:num)', 'Home::productDetail/$1');
$routes->get('/blog', 'Home::blog');
$routes->get('/blog/(:segment)', 'Home::blogDetail/$1');
$routes->get('/kontak', 'Home::contact');
$routes->post('/kontak/send', 'Home::sendMessage');
$routes->post('/kontak/sendTestimonial', 'Home::sendTestimonial');
$routes->get('/search', 'Search::index');
$routes->get('/faq', 'Home::faq');

// Sitemap
$routes->get('sitemap.xml', 'Sitemap::index');

// Auth Routes
$routes->get('login', 'Login::index');
$routes->post('login', 'Login::index');
$routes->get('logout', 'Login::logout');

// Admin Routes (Protected)
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('logout', 'Login::logout');
    
    // Settings
    $routes->get('settings', 'Admin\Settings::index');
    $routes->post('settings/update', 'Admin\Settings::update');
    $routes->post('settings/update_account', 'Admin\Settings::update_account');

    // Banner
    $routes->get('banner', 'Admin\Banner::index');
    $routes->get('banner/create', 'Admin\Banner::create');
    $routes->post('banner/store', 'Admin\Banner::store');
    $routes->get('banner/delete/(:num)', 'Admin\Banner::delete/$1');

    // Services
    $routes->get('services', 'Admin\Services::index');
    $routes->get('services/create', 'Admin\Services::create');
    $routes->post('services/store', 'Admin\Services::store');
    $routes->get('services/edit/(:num)', 'Admin\Services::edit/$1');
    $routes->post('services/update/(:num)', 'Admin\Services::update/$1');
    $routes->get('services/delete/(:num)', 'Admin\Services::delete/$1');

    // FAQ
    $routes->get('faq', 'Admin\Faq::index');
    $routes->get('faq/create', 'Admin\Faq::create');
    $routes->post('faq/store', 'Admin\Faq::store');
    $routes->get('faq/edit/(:num)', 'Admin\Faq::edit/$1');
    $routes->post('faq/update/(:num)', 'Admin\Faq::update/$1');
    $routes->get('faq/delete/(:num)', 'Admin\Faq::delete/$1');

    // Projects
    $routes->get('projects', 'Admin\Projects::index');
    $routes->get('projects/create', 'Admin\Projects::create');
    $routes->post('projects/store', 'Admin\Projects::store');
    $routes->get('projects/edit/(:num)', 'Admin\Projects::edit/$1');
    $routes->post('projects/update/(:num)', 'Admin\Projects::update/$1');
    $routes->get('projects/delete/(:num)', 'Admin\Projects::delete/$1');

    // Products
    $routes->get('produk', 'Admin\Produk::index');
    $routes->get('produk/detail/(:num)', 'Admin\Produk::detail/$1');
    $routes->get('produk/create', 'Admin\Produk::create');
    $routes->post('produk/store', 'Admin\Produk::store');
    $routes->get('produk/edit/(:num)', 'Admin\Produk::edit/$1');
    $routes->post('produk/update/(:num)', 'Admin\Produk::update/$1');
    $routes->get('produk/delete/(:num)', 'Admin\Produk::delete/$1');
    $routes->get('produk/delete-image/(:num)', 'Admin\Produk::delete_image/$1');

    // Contacts (Inbox)
    $routes->get('kontak', 'Admin\Kontak::index');
    $routes->get('kontak/detail/(:num)', 'Admin\Kontak::detail/$1');
    $routes->get('kontak/delete/(:num)', 'Admin\Kontak::delete/$1');

    // Tentang Kami
    $routes->get('tentang-kami', 'Admin\TentangKami::index');
    $routes->post('tentang-kami/update', 'Admin\TentangKami::update');

    // Blog
    $routes->get('blog', 'Admin\Blog::index');
    $routes->get('blog/create', 'Admin\Blog::create');
    $routes->post('blog/store', 'Admin\Blog::store');
    $routes->get('blog/edit/(:num)', 'Admin\Blog::edit/$1');
    $routes->post('blog/update/(:num)', 'Admin\Blog::update/$1');
    $routes->get('blog/delete/(:num)', 'Admin\Blog::delete/$1');

    // Team
    $routes->get('team', 'Admin\Team::index');
    $routes->get('team/create', 'Admin\Team::create');
    $routes->post('team/store', 'Admin\Team::store');
    $routes->get('team/delete/(:num)', 'Admin\Team::delete/$1');

    // Testimonial
    $routes->get('testimonial', 'Admin\Testimonial::index');
    $routes->get('testimonial/create', 'Admin\Testimonial::create');
    $routes->post('testimonial/store', 'Admin\Testimonial::store');
    $routes->get('testimonial/approve/(:num)', 'Admin\Testimonial::approve/$1');
    $routes->get('testimonial/reject/(:num)', 'Admin\Testimonial::reject/$1');
    $routes->get('testimonial/delete/(:num)', 'Admin\Testimonial::delete/$1');

    // Product Catalog (Google Drive-like)
    $routes->get('product-catalog', 'Admin\ProductCatalog::index');
    $routes->get('product-catalog/category/(:segment)', 'Admin\ProductCatalog::category/$1');
    $routes->get('product-catalog/brand/(:segment)/(:segment)', 'Admin\ProductCatalog::brand/$1/$2');
    $routes->get('product-catalog/collection/(:segment)/(:segment)/(:segment)', 'Admin\ProductCatalog::collection/$1/$2/$3');
    
    $routes->post('product-catalog/add-category', 'Admin\ProductCatalog::addCategory');
    $routes->post('product-catalog/add-brand/(:segment)', 'Admin\ProductCatalog::addBrand/$1');
    $routes->post('product-catalog/add-collection/(:segment)/(:segment)', 'Admin\ProductCatalog::addCollection/$1/$2');
    
    $routes->post('product-catalog/edit-category/(:segment)', 'Admin\ProductCatalog::editCategory/$1');
    $routes->post('product-catalog/edit-brand/(:segment)/(:segment)', 'Admin\ProductCatalog::editBrand/$1/$2');
    $routes->post('product-catalog/edit-collection/(:segment)/(:segment)/(:segment)', 'Admin\ProductCatalog::editCollection/$1/$2/$3');
    $routes->post('product-catalog/edit-product/(:segment)/(:segment)/(:segment)', 'Admin\ProductCatalog::editProduct/$1/$2/$3');
    $routes->post('product-catalog/edit-product/(:segment)/(:segment)', 'Admin\ProductCatalog::editProduct/$1/$2');
    
    // Upload description file
    $routes->post('product-catalog/upload-description/(:segment)', 'Admin\ProductCatalog::uploadDescription/$1');
    
    // Upload products (POST)
    $routes->post('product-catalog/upload-products', 'Admin\ProductCatalog::uploadProducts');
    
    // Delete routes - SPECIFIC ROUTES MUST COME BEFORE GENERAL ROUTES
    $routes->get('product-catalog/delete-description/(:segment)', 'Admin\ProductCatalog::deleteDescription/$1');
    $routes->get('product-catalog/delete-product/(:segment)/(:segment)/(:segment)/(:segment)', 'Admin\ProductCatalog::deleteProduct/$1/$2/$3/$4');
    $routes->get('product-catalog/delete-product/(:segment)/(:segment)/(:segment)', 'Admin\ProductCatalog::deleteProduct/$1/$2/$3');
    $routes->get('product-catalog/delete-collection/(:segment)/(:segment)/(:segment)', 'Admin\ProductCatalog::deleteCollection/$1/$2/$3');
    $routes->get('product-catalog/delete-brand/(:segment)/(:segment)', 'Admin\ProductCatalog::deleteBrand/$1/$2');
    $routes->get('product-catalog/delete-category/(:segment)', 'Admin\ProductCatalog::deleteCategory/$1');

    // System
    $routes->get('backup', 'Admin\Backup::index');
});

// Redirect /admin/login to /login for consistency
$routes->get('admin/login', function() {
    return redirect()->to(site_url('login'));
});
