<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// ================= USER AREA =================
$routes->get('/', 'Home::index');

$routes->get('permohonan', 'Permohonan::index');
$routes->post('permohonan/submit', 'Permohonan::submit');

$routes->get('tracking', 'Tracking::index');
$routes->post('tracking/cari', 'Tracking::cari');

$routes->get('faq', 'Pages::faq');

$routes->get('download/(:segment)', 'Download::file/$1');

$routes->get('kepuasan/isi/(:segment)', 'Kepuasan::isi/$1');
$routes->post('kepuasan/simpan/(:segment)', 'Kepuasan::simpan/$1');

$routes->get('grafik', 'Grafik::index');
$routes->post('grafik/survey', 'Grafik::submitSurvey');

$routes->post('admin/permohonan/tolak/(:num)', 'Permohonan::tolak/$1');
$routes->post('admin/permohonan/selesai/(:num)', 'Permohonan::selesai/$1');

$routes->post('admin/bidang/proses/(:num)', 'AdminBidang::proses/$1');
$routes->get('admin/bidang/proses/(:num)', 'AdminBidang::proses/$1');


// ================= ADMIN AUTH =================
$routes->get('admin/login', 'AdminLogin::index');
$routes->post('admin/login/auth', 'AdminLogin::auth');
$routes->get('admin/logout', 'AdminLogin::logout');

// ================= ADMIN UTAMA =================
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'AdminDashboard::index');
    $routes->get('permohonan/(:num)', 'AdminDashboard::detail/$1');
    $routes->post('approve/(:num)', 'AdminDashboard::approve/$1');
    $routes->post('reject/(:num)', 'AdminDashboard::reject/$1');
    $routes->post('assign/(:num)', 'AdminDashboard::assign/$1');

    $routes->get('grafik', 'Grafik::index');
    $routes->post('grafik/survey', 'Grafik::submitSurvey');
});

// ================= ADMIN BIDANG =================
$routes->group('admin/bidang', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'AdminBidang::dashboard');
    $routes->get('permohonan/(:num)', 'AdminBidang::detail/$1');
    $routes->post('permohonan/proses/(:num)', 'AdminBidang::proses/$1');
});
