<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Modul Administrator
Route::resource('admin','AdminController');
    // UKM
    Route::get('admin-ukm','AdminController@adminukm');
    Route::get('admin-ukm-create','AdminController@createukm');
    Route::post('admin-user-store','AdminController@storeuser');
    Route::get('admin-ukm-edit/{id_user}','AdminController@editukm');
    Route::put('admin-user-update/{id_user}','AdminController@updateuser');
    Route::get('admin-user-reset/{id_user}','AdminController@resetpwuser');
    Route::get('admin-progja-ukm','AdminController@adminprogja');
    Route::get('download-berkas/{id}','AdminController@downberkas');

    // BEM
    Route::get('admin-bem','AdminController@adminbem');
    Route::get('admin-bem-create','AdminController@createbem');
    Route::get('admin-bem-edit/{id_user}','AdminController@editbem');

    // KMH
    Route::get('admin-kmh','AdminController@adminkmh');
    Route::get('admin-kmh-create','AdminController@createkmh');
    Route::get('admin-kmh-edit/{id_user}','AdminController@editkmh');

    // Program Kerja
    Route::get('tinjau-progja-ukm','AdminController@tinjauprogja');
    Route::get('setujui-progja-ukm','AdminController@setujuiprogja');

// Modul UKM
Route::resource('ukm','UkmController');
    // Progja
    Route::get('progja-ukm-a','UkmController@progjaukma'); // Pengajuan Progja
    Route::get('progja-ukm-arsip-v','UkmController@arsipv');
    Route::get('progja-ukm-a-konfirmasi','UkmController@konfirmasi'); // Konfirmasi Berkas Pengajuan
    Route::get('progja-ukm-mulai','UkmController@mulai'); // Mulai Jalankan Progja
    Route::get('progja-ukm-revisi/{id}','UkmController@revisi'); // Revisi Program Kerja
    Route::post('program-kerja-revisi/{id}','UkmController@revisiproses'); // Proses Revisi Program kerja

    // PDF
    Route::get('progja-ukm-revisi-pdf/{id}','UkmController@revisiukm'); // View PDF Revisi

    // Anggota
    Route::get('anggota','UkmController@anggota');
    Route::get('anggota-create','UkmController@createanggota');
    Route::post('anggota-create-store','UkmController@storeanggota');
    Route::get('anggota-create-edit','UkmController@editanggota');
    Route::get('struktur','UkmController@struktur');
    Route::get('dp','UkmController@dp');
    Route::get('anggota-add-jabatan','UkmController@addjabatan');
    Route::get('profile/{id}','UkmController@profile');

    // Setting
    Route::get('set-data-ukm','UkmController@setDataUkm');

    
// Modul BEM
Route::resource('bem','BemController');
    // Progja
    Route::get('progja-bem-a','BemController@progjabema');
    Route::get('progja-bem-a-tinjau','BemController@tinjauprogja');
    Route::get('progja-bem-teruskan','BemController@teruskanprogja');
    Route::get('progja-bem-setujui','BemController@setujuiprogja');
    Route::get('progja-bem-revisi','BemController@revisiprogja');
    Route::get('progja-bem-tolak','BemController@tolakprogja');
    Route::get('download-progja-bem/{id}','BemController@downberkasbem');
    Route::get('progja-bem-revisi/{id}','BemController@bemreivisi');
    Route::post('progja-bem-revisi-store','BemController@bemrevisistore');

    Route::get('progja-bem-new','BemController@bemnew');
    Route::get('progja-bem-a-setujui','BemController@setujuiBem');
    // Dibatalkan Ditolak Ditunda
    Route::get('progja-bem-tolak-v','BemController@tolakbem');
    Route::get('progja-bem-hapus','BemController@hapusbem');

    // Anggota
    Route::get('anggota-bem','BemController@anggotabem');
    Route::get('anggota-bem-add','BemController@addanggotabem');
    Route::get('anggota-bem-edit','BemController@editanggotabem');
    Route::get('add-jabatan-bem','BemController@addjabatanbem');
    Route::get('struktur-bem','BemController@strukturbem');
    Route::get('profile-bem/{id}','BemController@profilebem');
    Route::get('dp-bem','BemController@dpbem');

    // Kegiatan
    Route::resource('kegiatan','KegiatanController');

    // Laporan
    Route::get('laporan-bem','BemController@laporanbem');

// Modul KMH
Route::resource('kmh','KmhController');
    // Progja
    Route::get('progja-kmh-a','KmhController@progjakmha');
    Route::get('progja-kmh-t','KmhController@progjakmht');
    Route::get('progja-kmh-a-tinjau','KmhController@tinjauprogja');
    Route::get('progja-kmh-setujui','KmhController@setujuiprogja');
    Route::get('progja-kmh-revisi','KmhController@revisiprogja');
    Route::get('progja-kmh-tolak','KmhController@tolakprogja');
    Route::get('progja-kmh-new','KmhController@kmhnew');
    Route::get('progja-kmh-setujui','KmhController@setujuikmh');
    

