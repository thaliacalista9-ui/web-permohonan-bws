<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index'); 

// Halaman Permohonan
$routes->get('/permohonan', 'Permohonan::index');
$routes->post('/permohonan/submit', 'Permohonan::submit');

// Halaman Tracking
$routes->get('/tracking', 'Tracking::index');
$routes->post('/tracking/cari', 'Tracking::cari');

// Halaman FAQ
$routes->get('/faq', 'Pages::faq');

// ====================== ADMIN AUTH ======================
// Form login admin
$routes->get('admin/login', 'AdminLogin::index');   
// Proses login admin
$routes->post('admin/auth', 'AdminLogin::auth');   
// Logout admin
$routes->get('admin/logout', 'AdminLogin::logout'); 

// ====================== ADMIN DASHBOARD ======================
$routes->group('admin', ['filter' => 'auth'], function($routes){
    $routes->get('dashboard', 'AdminDashboard::index');
    $routes->get('bidang', 'AdminDashboard::bidang');
    $routes->post('assign/(:num)', 'AdminDashboard::assign/$1');
});
