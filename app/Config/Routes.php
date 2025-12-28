<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('tentang-kami', 'Home::about');
$routes->get('portofolio', 'Home::portfolio');
$routes->get('/produk', 'Home::products');
$routes->get('/produk/detail/(:num)', 'Home::productDetail/$1');
$routes->get('/blog', 'Home::blog');
$routes->get('/blog/detail/(:segment)', 'Home::blogDetail/$1');
$routes->get('/kontak', 'Home::contact');
$routes->post('/kontak/send', 'Home::sendMessage');

// Auth Routes
$routes->get('login', 'Login::index');
$routes->post('login', 'Login::index');
$routes->get('logout', 'Login::logout');

// Admin Routes (Protected)
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('logout', 'Login::logout');
    $routes->get('settings', 'Admin\Settings::index');
    $routes->post('settings/update', 'Admin\Settings::update');

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
    $routes->get('testimonial/delete/(:num)', 'Admin\Testimonial::delete/$1');
});

// Redirect /admin/login to /login for consistency
$routes->get('admin/login', function() {
    return redirect()->to(site_url('login'));
});
