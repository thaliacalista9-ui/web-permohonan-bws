<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ==================================================
// DEFAULT
// ==================================================
$routes->get('/', 'Home::index');

// ==================================================
// USER / PEMOHON
// ==================================================
$routes->get('permohonan', 'Permohonan::index');
$routes->post('permohonan/submit', 'Permohonan::submit');

// ==================================================
// TRACKING PERMOHONAN
// ==================================================
$routes->get('tracking', 'Tracking::index');
$routes->get('tracking/cari', 'Tracking::index');
$routes->post('tracking/cari', 'Tracking::cari');

// Download file hasil permohonan
$routes->get('download/(:segment)', 'Tracking::download/$1');

// Survei kepuasan
$routes->get('kepuasan/isi/(:segment)', 'Tracking::isiKepuasan/$1');
$routes->post('kepuasan/simpan', 'Tracking::simpanKepuasan');

// ==================================================
// STATIC PAGE
// ==================================================
$routes->get('faq', 'Pages::faq');

// ==================================================
// GRAFIK KEPUASAN
// ==================================================
$routes->get('grafik', 'Grafik::index');

// ==================================================
// ADMIN AUTH
// ==================================================
$routes->get('admin/login', 'AdminLogin::index');
$routes->post('admin/login/auth', 'AdminLogin::auth');
$routes->get('admin/logout', 'AdminLogin::logout');

// ==================================================
// ADMIN UTAMA (FILTER AUTH)
// ==================================================
$routes->group('admin', ['filter' => 'auth'], function ($routes) {

    // Dashboard Admin Utama
    $routes->get('dashboard', 'AdminDashboard::index');

    // Detail permohonan Admin Utama
    $routes->get('permohonan/(:num)', 'AdminDashboard::detail/$1');

    // Aksi admin utama (POST)
    $routes->post('permohonan/approve/(:num)', 'AdminDashboard::approve/$1');
    $routes->post('permohonan/reject/(:num)', 'AdminDashboard::reject/$1');
    $routes->post('permohonan/assign/(:num)', 'AdminDashboard::assign/$1');
    

    // Grafik admin utama
    $routes->get('grafik', 'Grafik::index');
});

// ==================================================
// ADMIN BIDANG (FILTER AUTH)
// ==================================================
$routes->group('admin/bidang', ['filter' => 'auth'], function ($routes) {

    // Dashboard Admin Bidang
    $routes->get('dashboard', 'AdminBidang::dashboard');

    // Detail Permohonan Bidang
    $routes->get('permohonan/(:num)', 'AdminBidang::detail/$1');

    // Proses permohonan + upload file (POST)
    $routes->post('permohonan/proses/(:num)', 'AdminBidang::proses/$1');

    // Download file hasil
    $routes->get('download/(:num)', 'AdminBidang::download/$1');
});

// ==================================================
// ADMIN ACTION TAMBAHAN (POST ONLY)
// ==================================================
$routes->post('admin/permohonan/tolak/(:num)', 'Permohonan::tolak/$1');
$routes->post('admin/permohonan/selesai/(:num)', 'Permohonan::selesai/$1');
