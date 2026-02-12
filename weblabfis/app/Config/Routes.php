<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// ... kode di atasnya biarkan saja ...

$routes->get('/', 'Home::index');                    // Halaman Utama
// --- ROUTE LOGIN & LOGOUT ---
$routes->get('login', 'Auth::index');
$routes->post('login/proses', 'Auth::process');
$routes->get('logout', 'Auth::logout');
// ----------------------------
$routes->get('/lab/(:num)', 'Home::detailLab/$1');   // Halaman Detail Lab

// --- TAMBAHKAN KUMPULAN RUTE INI ---

// 1. Fitur Lihat Semua
$routes->get('/alat/semua', 'Home::semuaAlat');

// 2. Fitur Tambah
$routes->get('/alat/tambah', 'Home::tambah');   // <--- INI OBAT ERROR KAMU
$routes->post('/alat/simpan', 'Home::simpan');  // Untuk proses simpan data
// 3. Fitur Edit
$routes->get('/alat/edit/(:num)', 'Home::edit/$1');       // Form Edit
$routes->post('/alat/update/(:num)', 'Home::update/$1');  // Proses Update

// 4. Fitur Hapus
$routes->get('/alat/hapus/(:num)', 'Home::hapus/$1');     // Proses Hapus
// ------------------------------------
$routes->get('/setup-db', 'Home::setupDb');
// Route untuk menampilkan halaman form booking
$routes->get('home/booking/(:num)', 'Home::booking/$1');

// Route untuk memproses pengiriman form booking
$routes->post('home/simpan_booking', 'Home::simpan_booking');

$routes->get('home/jadwal_alat/(:num)', 'Home::jadwal_alat/$1');

$routes->get('semua_alat', 'Home::semuaAlat');