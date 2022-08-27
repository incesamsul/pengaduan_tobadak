<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\General;
use App\Http\Controllers\Home;
use App\Http\Controllers\Masyarakat;
use App\Http\Controllers\Penilai;
use App\Http\Controllers\Sekdes;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

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



Route::post('/postlogin', [LoginController::class, 'postLogin']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/', [Home::class, 'beranda']);

Route::post('/register', [LoginController::class, 'register']);

Route::get('/tentang_aplikasi', [Home::class, 'tentangAplikasi']);


Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
});

// GENERAL CONTROLLER ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator,masyarakat,sekdes']], function () {

    Route::get('/dashboard', [General::class, 'dashboard']);
    Route::get('/profile', [General::class, 'profile']);
    Route::get('/bantuan', [General::class, 'bantuan']);

    Route::post('/ubah_foto_profile', [General::class, 'ubahFotoProfile']);
    Route::post('/ubah_role', [General::class, 'ubahRole']);
});

// MASYARAKAT ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:masyarakat']], function () {
    Route::group(['prefix' => 'masyarakat'], function () {
        // GET REQUEST
        Route::get('/pengaduan', [Masyarakat::class, 'pengaduan']);

        // POST REQUEST
        Route::post('/create_pengaduan', [Masyarakat::class, 'createPengaduan']);
        Route::post('/delete_pengaduan', [Masyarakat::class, 'deletePengaduan']);
        Route::post('/update_pengaduan', [Masyarakat::class, 'updatePengaduan']);
    });
});

// SEKDES ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:sekdes']], function () {
    Route::group(['prefix' => 'sekdes'], function () {
        // GET REQUEST
        Route::get('/pengaduan', [Sekdes::class, 'pengaduan']);

        // POST REQUEST
        Route::post('/update_status_pengaduan', [Sekdes::class, 'updateStatusPengaduan']);
    });
});


// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator']], function () {
    Route::group(['prefix' => 'admin'], function () {
        // GET REQUEST
        Route::get('/pengguna', [Admin::class, 'pengguna']);
        Route::get('/kategori', [Admin::class, 'kategori']);
        Route::get('/fetch_data', [Admin::class, 'fetchData']);

        // CRUD PENGGUNA
        Route::post('/create_pengguna', [Admin::class, 'createPengguna']);
        Route::post('/update_pengguna', [Admin::class, 'updatePengguna']);
        Route::post('/delete_pengguna', [Admin::class, 'deletePengguna']);

        // CRUD KATEGORI
        Route::post('/create_kategori', [Admin::class, 'createKategori']);
        Route::post('/update_kategori', [Admin::class, 'updateKategori']);
        Route::post('/delete_kategori', [Admin::class, 'deleteKategori']);
    });
});
