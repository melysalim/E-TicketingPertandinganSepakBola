<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route default ke dashboard home
$routes->get('/', 'Dashboard::index');

// Route untuk halaman jadwal
$routes->get('jadwal', 'Dashboard::jadwal');

// Route untuk halaman beli tiket
$routes->get('beli', 'Dashboard::beli');

// Route untuk halaman login (GET dan POST)
$routes->get('login', 'Auth::login');           // Menampilkan halaman login
$routes->post('login', 'Auth::process');        // Memproses data login

// Route untuk logout
$routes->get('logout', 'Auth::logout');         // Proses logout

// Route untuk halaman registrasi (GET dan POST)
$routes->get('register', 'Auth::register');     // Menampilkan halaman registrasi
$routes->post('register', 'Auth::registerProcess'); // Memproses data registrasi

// Route untuk halaman dashboard admin
$routes->get('admin', 'AdminController::index', ['filter' => 'authAdmin']); // Dashboard admin
$routes->get('admin/edit-user/(:num)', 'AdminController::editUser/$1', ['filter' => 'authAdmin']);
$routes->post('admin/update-user/(:num)', 'AdminController::updateUser/$1', ['filter' => 'authAdmin']);
$routes->get('admin/delete-user/(:num)', 'AdminController::deleteUser/$1', ['filter' => 'authAdmin']);
$routes->get('admin/jadwal', 'AdminController::jadwal', ['filter' => 'authAdmin']);
$routes->get('admin/add-jadwal', 'AdminController::addJadwal', ['filter' => 'authAdmin']);
$routes->post('admin/save-jadwal', 'AdminController::saveJadwal', ['filter' => 'authAdmin']);
$routes->get('admin/edit-jadwal/(:num)', 'AdminController::editJadwal/$1', ['filter' => 'authAdmin']);
$routes->post('admin/update-jadwal/(:num)', 'AdminController::updateJadwal/$1', ['filter' => 'authAdmin']);
$routes->get('admin/delete-jadwal/(:num)', 'AdminController::deleteJadwal/$1');
$routes->get('/admin/getSalesData', 'AdminController::getSalesData');







$routes->get('admin/status-pemesanan', 'AdminController::statusPemesanan', ['filter' => 'authAdmin']);
$routes->get('admin/konfirmasi-pesanan/(:num)', 'AdminController::konfirmasiPesanan/$1', ['filter' => 'authAdmin']);
$routes->post('/admin/konfirmasi-pesanan/(:num)', 'AdminController::konfirmasiPesanan/$1');

$routes->get('admin/laporan-penjualan', 'AdminController::laporanPenjualan', ['filter' => 'authAdmin']); // Laporan Penjualan
$routes->get('admin/getTicketSalesComparison', 'AdminController::getTicketSalesComparison');

// Route untuk halaman dashboard customer
$routes->get('customer', 'CustomerController::index', ['filter' => 'authCustomer']); // Dashboard customer
$routes->post('customer/book-ticket', 'CustomerController::bookTicket');
$routes->post('/customer/book-ticket', 'CustomerController::bookTicket');

$routes->get('customer/jadwal', 'CustomerController::jadwal', ['filter' => 'authCustomer']); // Melihat Jadwal Pertandingan
$routes->post('customer/pemesanan', 'CustomerController::pemesanan', ['filter' => 'authCustomer']); // Pemesanan Tiket
$routes->get('/customer/upload-payment', 'CustomerController::uploadPayment', ['filter' => 'authCustomer']);
$routes->post('customer/processPayment', 'CustomerController::processPayment');
$routes->get('/customer/eticket/(:num)', 'CustomerController::showETicket/$1');



