<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sayhai\LoginController;
use App\Http\Controllers\Sayhai\RedirectController;
use App\Http\Controllers\Saykasir\KawalController;
use App\Http\Controllers\Saykasir\KtranController;
use App\Http\Controllers\Saymanager\MawalController;
use App\Http\Controllers\Saymanager\MitemController;
use App\Http\Controllers\Saymanager\MuserController;
use App\Http\Controllers\Saymanager\MstokController;

//  jika user belum login
Route::group(['middleware' => 'guest'], function() {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/loginu', [LoginController::class, 'dologin'])->name('masuk');

    Route::get('/Daftar', [LoginController::class, 'register'])->name('register');
    Route::post('/daftaru', [LoginController::class, 'dodaftar'])->name('daftar');

});

// untuk manager dan kasir
Route::group(['middleware' => ['auth', 'checkrole:1,2']], function() {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/redirect', [RedirectController::class, 'cek']);
});

// untuk owner
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/owner/dashboard', [MawalController::class, 'index'])->name('M.index');

    Route::get('/owner/create-toko', [MawalController::class, 'toko'])->name('M.C.T');
    Route::post('/owner/create-toko/store', [MawalController::class, 'create_toko'])->name('M.C.T.P');

    Route::get('/owner/transaksi', [MawalController::class ,'transaksi'])->name('M.R.T');

    Route::get('/owner/data-item', [MitemController::class, 'item'])->name('M.item');
    Route::get('/owner/data-item/loading', [MitemController::class, 'load_item'])->name('M.L.item');
    Route::get('/owner/data-stok', [MitemController::class, 'stok'])->name('M.stok');
    Route::get('/owner/data-stok-masuk/loading', [MitemController::class, 'load_stokM'])->name('M.L.stokM');
    Route::get('/owner/data-stok-keluar/loading', [MitemController::class, 'load_stokK'])->name('M.L.stokK');
    Route::get('/owner/data-suplayer', [MitemController::class, 'suplay'])->name('M.suplay');
    Route::get('/owner/data-suplayer/loading', [MitemController::class, 'load_suplay'])->name('M.L.suplay');

    Route::get('/owner/data-user', [MuserController::class, 'user'])->name('M.user');
    Route::post('/owner/data-user/store', [MuserController::class, 'create_user'])->name('M.C.user');
    Route::get('/owner/data-user/loading', [MuserController::class, 'load_user'])->name('M.L.user');
    Route::delete('/owner/data-user/delete', [MuserController::class, 'delete_user'])->name('M.D.user');
    Route::get('/owner/data-user/edit', [MuserController::class, 'edit_user'])->name('M.E.user');
    Route::post('/owner/data-user/update', [MuserController::class, 'update_user'])->name('M.U.user');
  
    //laporan
    Route::get('/owner/data-laporan/profit', [MawalController::class, 'profit_laporan'])->name('M.P.L');
    Route::get('/owner/data-laporan/bulanan', [MawalController::class, 'bulan_laporan'])->name('M.B.L');
    Route::get('/owner/data-laporan/harian', [MawalController::class, 'harian_laporan'])->name('M.H.L');
    Route::post('/owner/data-laporan/bulanan/filter', [MawalController::class, 'filter_bulanan_laporan'])->name('M.F.LB');
    Route::post('/owner/data-laporan/harian/filter', [MawalController::class, 'filter_harian_laporan'])->name('M.F.LH');
    Route::get('/owner/data-laporan/tahunan', [MawalController::class, 'tahunan_laporan'])->name('M.T.L');
    Route::post('/owner/data-laporan/tahunan/filter', [MawalController::class, 'filter_tahunan_laporan'])->name('M.F.LT');
});

// untuk kasir
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/kasir/dashboard', [KawalController::class, 'index'])->name('K.index');

    //kategori
    Route::get('/kasir/data-kategori', [KawalController::class, 'kategori'])->name('K.kate');
    Route::post('/kasir/data-kategori/store', [KawalController::class, 'create_kategori'])->name('K.C.kate');
    Route::get('/kasir/data-kategori/loading', [KawalController::class, 'load_kategori'])->name('K.L.kate');
    Route::delete('/kasir/data-kategori/delete', [KawalController::class, 'delete_kategori'])->name('K.D.kate');
    Route::get('/kasir/data-kategori/edit', [KawalController::class, 'edit_kategori'])->name('K.E.kate');
    Route::post('/kasir/data-kategori/update', [KawalController::class, 'update_kategori'])->name('K.U.kate');

    //unit
    Route::get('/kasir/data-unit', [KawalController::class, 'unit'])->name('K.unit');
    Route::post('/kasir/data-unit/store', [KawalController::class, 'create_unit'])->name('K.C.unit');
    Route::get('/kasir/data-unit/loading', [KawalController::class, 'load_unit'])->name('K.L.unit');
    Route::delete('/kasir/data-unit/delete', [KawalController::class, 'delete_unit'])->name('K.D.unit');
    Route::get('/kasir/data-unit/edit', [KawalController::class, 'edit_unit'])->name('K.E.unit');
    Route::post('/kasir/data-unit/update', [KawalController::class, 'update_unit'])->name('K.U.unit');

    //item
    Route::get('/kasir/data-item', [KawalController::class, 'item'])->name('K.item');
    Route::post('/kasir/data-item/store', [KawalController::class, 'create_item'])->name('K.C.item');
    Route::get('/kasir/data-item/loading', [KawalController::class, 'load_item'])->name('K.L.item');
    Route::delete('/kasir/data-item/delete', [KawalController::class, 'delete_item'])->name('K.D.item');
    Route::get('/kasir/data-item/edit', [KawalController::class, 'edit_item'])->name('K.E.item');
    Route::post('/kasir/data-item/update', [KawalController::class, 'update_item'])->name('K.U.item');
    Route::get('/kasir/data-item/print-pdf', [KawalController::class, 'print_item'])->name('K.PDF.item');

    //stok
    Route::get('/kasir/data-suplayer', [KawalController::class, 'suplay'])->name('K.suplay');
    Route::post('/kasir/data-suplayer/store', [KawalController::class, 'create_suplay'])->name('K.C.suplay');
    Route::get('/kasir/data-suplayer/loading', [KawalController::class, 'load_suplay'])->name('K.L.suplay');
    Route::delete('/kasir/data-suplayer/delete', [KawalController::class, 'delete_suplay'])->name('K.D.suplay');
    Route::get('/kasir/data-suplayer/edit', [KawalController::class, 'edit_suplay'])->name('K.E.suplay');
    Route::post('/kasir/data-suplayer/update', [KawalController::class, 'update_suplay'])->name('K.U.suplay');

    Route::get('/kasir/data-stok', [KawalController::class, 'stok'])->name('K.stok');
    Route::post('/kasir/data-stok-masuk/store', [KawalController::class, 'create_stokM'])->name('K.C.stokM');
    Route::get('/kasir/data-stok-masuk/loading', [KawalController::class, 'load_stokM'])->name('K.L.stokM');
    Route::delete('/kasir/data-stok-masuk/delete', [KawalController::class, 'delete_stokM'])->name('K.D.stokM');
    Route::get('/kasir/data-stok-masuk/edit', [KawalController::class, 'edit_stokM'])->name('K.E.stokM');
    Route::post('/kasir/data-stok-masuk/update', [KawalController::class, 'update_stokM'])->name('K.U.stokM');

    Route::post('/kasir/data-stok-keluar/store', [KawalController::class, 'create_stokK'])->name('K.C.stokK');
    Route::get('/kasir/data-stok-keluar/loading', [KawalController::class, 'load_stokK'])->name('K.L.stokK');
    Route::delete('/kasir/data-stok-keluar/delete', [KawalController::class, 'delete_stokK'])->name('K.D.stokK');
    Route::get('/kasir/data-stok-keluar/edit', [KawalController::class, 'edit_stokK'])->name('K.E.stokK');
    Route::post('/kasir/data-stok-keluar/update', [KawalController::class, 'update_stokK'])->name('K.U.stokK');

  //transaksi
    Route::get('/kasir/transaksi', [KtranController::class ,'transaksi'])->name('K.V.T');
    Route::get('/kasir/transaksi/add-to-cart', [KtranController::class, 'addCart_transaksi'])->name('K.A.C');
    Route::patch('/kasir/transaksi/update-cart', [KtranController::class, 'update_transaksi'])->name('K.U.C');
    Route::delete('/kasir/transaksi/remove-from-cart', [KtranController::class, 'remove_transaksi'])->name('K.R.C');
    Route::post('/kasir/transaksi/selesai', [KtranController::class, 'selesai_transaksi'])->name('K.T.S');
    Route::post('/kasir/transaksi/remove-session', [KtranController::class, 'removeSessionrwt'])->name('K.R.session');
    Route::get('/kasir/riwayat-penjualan', [KtranController::class ,'riwayat_transaksi'])->name('K.R.T');
    Route::get('/kasir/riwayat-penjualan/Detail', [KtranController::class ,'detail_transaksi'])->name('K.V.rwt');
    Route::get('/kasir/riwayat-penjualan/struk/{nomor_transaksi}', [KtranController::class, 'struk_riwayat'])->name('K.S');

    //profile
    Route::get('/kasir/user-profile', [KawalController::class, 'profile_v'])->name('K.V.UP');
    //laporan
    Route::get('/kasir/data-laporan/profit', [KawalController::class, 'profit_laporan'])->name('K.P.L');
    Route::post('/kasir/data-laporan/profit/f', [KawalController::class, 'filter_profit_laporan'])->name('K.F.LP');
    Route::get('/kasir/data-laporan/bulanan', [KawalController::class, 'bulan_laporan'])->name('K.B.L');
    Route::get('/kasir/data-laporan/harian', [KawalController::class, 'harian_laporan'])->name('K.H.L');
    Route::post('/kasir/data-laporan/bulanan/filter', [KawalController::class, 'filter_bulanan_laporan'])->name('K.F.LB');
    Route::post('/kasir/data-laporan/harian/filter', [KawalController::class, 'filter_harian_laporan'])->name('K.F.LH');
    Route::get('/kasir/data-laporan/tahunan', [KawalController::class, 'tahunan_laporan'])->name('K.T.L');
    Route::post('/kasir/data-laporan/tahunan/filter', [KawalController::class, 'filter_tahunan_laporan'])->name('K.F.LT');
});


Route::get('/', function () {
    return view('welcome');
});
