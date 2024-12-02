<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Homectrl');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//ADMIN
$routes->get('login', 'Login::index');
$routes->post('login/process', 'Login::process');
$routes->get('logout', 'Login::logout');


$routes->get('admin/dashboard', 'admin\Dashboardctrl::index');

$routes->get('admin/profil/edit', 'admin\Profil::edit');
$routes->post('admin/profil/proses_edit', 'admin\Profil::edit');

$routes->get('admin/produk/index', 'admin\Produk::index');
$routes->get('admin/produk/tambah', 'admin\Produk::tambah');
$routes->post('admin/produk/proses_tambah', 'admin\Produk::proses_tambah');
$routes->get('admin/produk/edit/(:num)', 'admin\Produk::edit/$1');
$routes->post('admin/produk/proses_edit/(:num)', 'admin\Produk::proses_edit/$1');
$routes->get('admin/produk/delete/(:any)', 'admin\Produk::delete/$1');

$routes->get('admin/slider/index', 'admin\Slider::index');
$routes->get('admin/slider/tambah', 'admin\Slider::tambah');
$routes->post('admin/slider/proses_tambah', 'admin\Slider::proses_tambah');
$routes->get('admin/slider/edit/(:num)', 'admin\Slider::edit/$1');
$routes->post('admin/slider/proses_edit/(:num)', 'admin\Slider::proses_edit/$1');
$routes->get('admin/slider/delete/(:any)', 'admin\Slider::delete/$1');

$routes->get('admin/aktivitas/index', 'admin\Aktivitas::index');
$routes->get('admin/aktivitas/tambah', 'admin\Aktivitas::tambah');
$routes->post('admin/aktivitas/proses_tambah', 'admin\Aktivitas::proses_tambah');
$routes->get('admin/aktivitas/edit/(:num)', 'admin\Aktivitas::edit/$1');
$routes->post('admin/aktivitas/proses_edit/(:num)', 'admin\Aktivitas::proses_edit/$1');
$routes->get('admin/aktivitas/delete/(:any)', 'admin\Aktivitas::delete/$1');

$routes->get('admin/artikel/index', 'admin\Artikel::index');
$routes->get('admin/artikel/tambah', 'admin\Artikel::tambah');
$routes->post('admin/artikel/proses_tambah', 'admin\Artikel::proses_tambah');
$routes->get('admin/artikel/edit/(:num)', 'admin\Artikel::edit/$1');
$routes->post('admin/artikel/proses_edit/(:num)', 'admin\Artikel::proses_edit/$1');
$routes->get('admin/artikel/delete/(:any)', 'admin\Artikel::delete/$1');

$routes->get('admin/meta/index', 'admin\MetaController::index');
$routes->get('admin/meta/tambah', 'admin\MetaController::tambah');
$routes->post('admin/meta/proses_tambah', 'admin\MetaController::proses_tambah');
$routes->get('/admin/meta/edit/(:num)', 'admin\MetaController::edit/$1');
$routes->post('admin/meta/proses_edit/(:num)', 'admin\MetaController::proses_edit/$1');
$routes->get('admin/meta/delete/(:any)', 'admin\MetaController::delete/$1');


//USER
// start frond end routes
//USER

$routes->group('id', function ($routes) {
    $routes->get('/', 'user\Homectrl::index'); // Rute untuk bahasa Indonesia
    $routes->get('tentang-kami', 'user\Aboutctrl::index');
    // route halaman produk
    $routes->get('produk', 'User\Productsctrl::index');
    $routes->get('produk/(:segment)', 'User\Productsctrl::detail/$1'); // routes halaman aktivitas

    $routes->get('aktivitas', 'user\Aktivitasctrl::index');
    $routes->get('aktivitas/(:segment)', 'user\Aktivitasctrl::detail/$1');
    // routes halaman contact
    $routes->get('kontak', 'user\Contactctrl::index');
    // end frond end routes
    // routes halaman artikel
    $routes->get('artikel', 'user\Artikelctrl::index');
    $routes->get('artikel/(:segment)', 'user\Artikelctrl::detail/$1');
});

$routes->group('en', function ($routes) {
    $routes->get('/', 'user\Homectrl::index'); // Rute untuk bahasa Inggris
    $routes->get('about', 'user\Aboutctrl::index');
    // route halaman produk
    $routes->get('product', 'User\Productsctrl::index');
    $routes->get('product/(:segment)', 'User\Productsctrl::detail/$1');
    // routes halaman aktivitas
    $routes->get('activities', 'user\Aktivitasctrl::index');
    $routes->get('activities/(:segment)', 'user\Aktivitasctrl::detail/$1');
    // routes halaman contact
    $routes->get('contact', 'user\Contactctrl::index');
    // end frond end routes
    // routes halaman artikel
    $routes->get('article', 'user\Artikelctrl::index');
    $routes->get('article/(:segment)', 'user\Artikelctrl::detail/$1');
});

$routes->get('/', function () {
    return redirect()->to('/id/beranda');
});
// end fronendroutes

// route language home
// $routes->get('lang/{locale}', 'user\Homectrl::language');
$routes->get('language/(:any)', 'user\Homectrl::language/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

// Define your routes here
