<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Home::index');

// ================= USER AREA =================
// Halaman utama / landing
$routes->get('/', 'Home::index');

// Ajukan permohonan
$routes->get('permohonan', 'Permohonan::index');
$routes->post('permohonan/submit', 'Permohonan::submit');

// Lacak permohonan
$routes->get('tracking', 'Tracking::index');
$routes->post('tracking/cari', 'Tracking::cari');

// Halaman FAQ
$routes->get('faq', 'Pages::faq');

// ================= ADMIN AUTH =================
$routes->get('admin/login', 'AdminLogin::index');
$routes->post('admin/login/auth', 'AdminLogin::auth');
$routes->get('admin/logout', 'AdminLogin::logout');

// ================= ADMIN AREA =================
$routes->group('admin', ['filter' => 'auth'], function ($routes) {

    // Dashboard utama
    $routes->get('dashboard', 'AdminDashboard::index');

    // Detail permohonan
    $routes->get('permohonan/(:num)', 'AdminDashboard::detail/$1');

    // Keputusan admin utama
    $routes->post('approve/(:num)', 'AdminDashboard::approve/$1');
    $routes->post('reject/(:num)', 'AdminDashboard::reject/$1');

    // Assign ke bidang
    $routes->post('assign/(:num)', 'AdminDashboard::assign/$1');
});
