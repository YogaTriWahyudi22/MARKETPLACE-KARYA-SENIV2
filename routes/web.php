<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\JenisKaryaController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;

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


Route::get('/', [HalamanController::class, 'halaman_awal'])->name('halaman_awal');

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::POST('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::POST('proses_register', [AuthController::class, 'proses_register'])->name('proses_register');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('admin', [AuthController::class, 'admin'])->name('admin');
    Route::get('toko', [AuthController::class, 'toko'])->name('toko');
    Route::get('user', [AuthController::class, 'user'])->name('user');
    Route::POST('logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('dashboard', [HalamanController::class, 'dashboard'])->name('dashboard');
    Route::get('home', [HalamanController::class, 'home'])->name('home');
    Route::prefix('admin')->group(function () {
        Route::get('index', [AkunController::class, 'index'])->name('admin');
        Route::get('tambah', [AkunController::class, 'create'])->name('tambah');
        Route::POST('tambah', [AkunController::class, 'store'])->name('tambah');
        Route::get('edit/{id}', [AkunController::class, 'edit'])->name('edit');
        Route::POST('edit/{id}', [AkunController::class, 'update'])->name('edit');
        Route::DELETE('delete/{id}', [AkunController::class, 'destroy'])->name('delete');
    });

    Route::prefix('kurir')->group(function () {
        Route::get('index', [KurirController::class, 'index'])->name('kurir');
        Route::get('tambah', [KurirController::class, 'create'])->name('kurir_tambah');
        Route::POST('tambah', [KurirController::class, 'store'])->name('kurir_tambah');
        Route::get('edit/{id_kurir}', [KurirController::class, 'edit'])->name('kurir_edit');
        Route::POST('edit/{id_kurir}', [KurirController::class, 'update'])->name('kurir_edit');
        Route::DELETE('delete/{id_kurir}', [KurirController::class, 'destroy'])->name('kurir_hapus');
    });
    Route::prefix('produk')->group(function () {
        Route::get('index', [ProdukController::class, 'index'])->name('produk');
        Route::get('tambah', [ProdukController::class, 'create'])->name('produk_tambah');
        Route::Post('tambah', [ProdukController::class, 'store'])->name('produk_tambah');
        Route::get('edit/{id_produk}', [ProdukController::class, 'edit'])->name('produk_edit');
        Route::POST('edit/{id_produk}', [ProdukController::class, 'update'])->name('produk_edit');
        Route::DELETE('delete/{id_produk}', [ProdukController::class, 'destroy'])->name('produk_delete');
        Route::get('detail/{id_produk}', [ProdukController::class, 'show'])->name('detail');
    });

    Route::prefix('jenis_karya')->group(function () {
        Route::get('index', [JenisKaryaController::class, 'index'])->name('jenis_produk_karya_seni');
        Route::get('tambah', [JenisKaryaController::class, 'create'])->name('jenis_tambah');
        Route::POST('tambah', [JenisKaryaController::class, 'store'])->name('jenis_tambah');
        Route::get('edit/{id_jenis}', [JenisKaryaController::class, 'edit'])->name('jenis_edit');
        Route::POST('edit/{id_jenis}', [JenisKaryaController::class, 'update'])->name('jenis_edit');
        Route::DELETE('hapus/{id_jenis}', [JenisKaryaController::class, 'destroy'])->name('jenis_hapus');
        Route::get('jenis_karya/{id_jenis}', [JenisKaryaController::class, 'jenis_karya'])->name('jenis_karya_seni');
    });

    Route::prefix('pesanan')->group(function () {
        Route::POST('proses_pesanan', [PesananController::class, 'proses_pesanan'])->name('proses_pesanan');
        Route::get('pesanan', [PesananController::class, 'pesanan'])->name('pesanan');
        Route::get('konfirmasi_pesanan', [PesananController::class, 'konfirmasi_pesanan'])->name('konfirmasi_pesanan');
        Route::get('/konfirmasi/{id_pesanan}', [PesananController::class, 'konfirmasi'])->name('konfirmasi');
        Route::get('/gagal/{id_pesanan}', [PesananController::class, 'gagal'])->name('gagal');
        Route::get('/hapus_pesanan/{id_pesanan}', [PesananController::class, 'destroy'])->name('hapus_pesanan');
    });
    Route::prefix('pembayaran')->group(function () {
        Route::get('proses_pembayaran', [PembayaranController::class, 'proses_pembayaran'])->name('proses_pembayaran');
        Route::POST('checkout', [PembayaranController::class, 'checkout'])->name('checkout');
        Route::get('konfirmasi_pembayaran', [PembayaranController::class, 'konfirmasi_pembayaran'])->name('konfirmasi_pembayaran');
        Route::get('pembayaran_toko', [PembayaranController::class, 'pembayaran_toko'])->name('pembayaran_toko');
        Route::get('konfirmasi/{id_rincian_pembayaran}', [PembayaranController::class, 'konfirmasi'])->name('pembayaran_konfirmasi');
        Route::get('gagal/{id_rincian_pembayaran}', [PembayaranController::class, 'gagal'])->name('pembayaran_gagal');
    });
    Route::prefix('laporan')->group(function () {
        Route::get('pesanan_saya', [LaporanController::class, 'pesanan_saya'])->name('pesanan_saya');
        Route::get('faktur', [LaporanController::class, 'faktur'])->name('faktur');
        Route::get('barang_sampai/{id_rincian_pembayaran}', [LaporanController::class, 'barang_sampai'])->name('barang_sampai');
        Route::get('laporan_admin', [LaporanController::class, 'laporan_admin'])->name('laporan_admin');
        Route::get('laporan_toko', [LaporanController::class, 'laporan_toko'])->name('laporan_toko');
        Route::POST('cari', [LaporanController::class, 'cari'])->name('cari');
    });
});
