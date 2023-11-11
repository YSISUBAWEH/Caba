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

});

// untuk manager dan kasir
Route::group(['middleware' => ['auth', 'checkrole:1,2']], function() {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk manager
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/manager', [MawalController::class, 'index'])->name('M.index');
    Route::get('/manager/transaksi', [MawalController::class ,'transaksi'])->name('M.R.T');

    //kategori
    Route::get('/manager/data-kategori', [MitemController::class, 'kategori'])->name('M.kate');
    Route::post('/manager/data-kategori/store', [MitemController::class, 'create_kategori'])->name('M.C.kate');
    Route::get('/manager/data-kategori/loading', [MitemController::class, 'load_kategori'])->name('M.L.kate');
    Route::delete('/manager/data-kategori/delete', [MitemController::class, 'delete_kategori'])->name('M.D.kate');
    Route::get('/manager/data-kategori/edit', [MitemController::class, 'edit_kategori'])->name('M.E.kate');
    Route::post('/manager/data-kategori/update', [MitemController::class, 'update_kategori'])->name('M.U.kate');

    //unit
    Route::get('/manager/data-unit', [MitemController::class, 'unit'])->name('M.unit');
    Route::post('/manager/data-unit/store', [MitemController::class, 'create_unit'])->name('M.C.unit');
    Route::get('/manager/data-unit/loading', [MitemController::class, 'load_unit'])->name('M.L.unit');
    Route::delete('/manager/data-unit/delete', [MitemController::class, 'delete_unit'])->name('M.D.unit');
    Route::get('/manager/data-unit/edit', [MitemController::class, 'edit_unit'])->name('M.E.unit');
    Route::post('/manager/data-unit/update', [MitemController::class, 'update_unit'])->name('M.U.unit');

    //item
    Route::get('/manager/data-item', [MitemController::class, 'item'])->name('M.item');
    Route::post('/manager/data-item/store', [MitemController::class, 'create_item'])->name('M.C.item');
    Route::get('/manager/data-item/loading', [MitemController::class, 'load_item'])->name('M.L.item');
    Route::delete('/manager/data-item/delete', [MitemController::class, 'delete_item'])->name('M.D.item');
    Route::get('/manager/data-item/edit', [MitemController::class, 'edit_item'])->name('M.E.item');
    Route::post('/manager/data-item/update', [MitemController::class, 'update_item'])->name('M.U.item');
  //item
    Route::get('/manager/data-user', [MuserController::class, 'user'])->name('M.user');
    Route::post('/manager/data-user/store', [MuserController::class, 'create_user'])->name('M.C.user');
    Route::get('/manager/data-user/loading', [MuserController::class, 'load_user'])->name('M.L.user');
    Route::delete('/manager/data-user/delete', [MuserController::class, 'delete_user'])->name('M.D.user');
    Route::get('/manager/data-user/edit', [MuserController::class, 'edit_user'])->name('M.E.user');
    Route::post('/manager/data-user/update', [MuserController::class, 'update_user'])->name('M.U.user');

    //item
    Route::get('/manager/data-suplayer', [MstokController::class, 'suplay'])->name('M.suplay');
    Route::post('/manager/data-suplayer/store', [MstokController::class, 'create_suplay'])->name('M.C.suplay');
    Route::get('/manager/data-suplayer/loading', [MstokController::class, 'load_suplay'])->name('M.L.suplay');
    Route::delete('/manager/data-suplayer/delete', [MstokController::class, 'delete_suplay'])->name('M.D.suplay');
    Route::get('/manager/data-suplayer/edit', [MstokController::class, 'edit_suplay'])->name('M.E.suplay');
    Route::post('/manager/data-suplayer/update', [MstokController::class, 'update_suplay'])->name('M.U.suplay');

    Route::get('/manager/data-stok', [MstokController::class, 'stok'])->name('M.stok');
    Route::post('/manager/data-stok-masuk/store', [MstokController::class, 'create_stokM'])->name('M.C.stokM');
    Route::get('/manager/data-stok-masuk/loading', [MstokController::class, 'load_stokM'])->name('M.L.stokM');
    Route::delete('/manager/data-stok-masuk/delete', [MstokController::class, 'delete_stokM'])->name('M.D.stokM');
    Route::get('/manager/data-stok-masuk/edit', [MstokController::class, 'edit_stokM'])->name('M.E.stokM');
    Route::post('/manager/data-stok-masuk/update', [MstokController::class, 'update_stokM'])->name('M.U.stokM');

    Route::post('/manager/data-stok-keluar/store', [MstokController::class, 'create_stokK'])->name('M.C.stokK');
    Route::get('/manager/data-stok-keluar/loading', [MstokController::class, 'load_stokK'])->name('M.L.stokK');
    Route::delete('/manager/data-stok-keluar/delete', [MstokController::class, 'delete_stokK'])->name('M.D.stokK');
    Route::get('/manager/data-stok-keluar/edit', [MstokController::class, 'edit_stokK'])->name('M.E.stokK');
    Route::post('/manager/data-stok-keluar/update', [MstokController::class, 'update_stokK'])->name('M.U.stokK');
  
    //laporan
    Route::get('/manager/data-laporan/bulanan', [MawalController::class, 'bulan_laporan'])->name('M.B.L');
    Route::get('/manager/data-laporan/harian', [MawalController::class, 'harian_laporan'])->name('M.H.L');
    Route::post('/manager/data-laporan/bulanan/filter', [MawalController::class, 'filter_bulanan_laporan'])->name('M.F.LB');
    Route::post('/manager/data-laporan/harian/filter', [MawalController::class, 'filter_harian_laporan'])->name('M.F.LH');
    Route::get('/manager/data-laporan/tahunan', [MawalController::class, 'tahunan_laporan'])->name('M.T.L');
    Route::post('/manager/data-laporan/tahunan/filter', [MawalController::class, 'filter_tahunan_laporan'])->name('M.F.LT');
});

// untuk kasir
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/kasir', [KawalController::class, 'index'])->name('K.index');

  //item
    Route::get('/kasir/data-item', [KawalController::class, 'item'])->name('K.item');

  //transaksi
    Route::get('/kasir/transaksi', [KtranController::class ,'transaksi'])->name('K.V.T');
    Route::get('/kasir/transaksi/add-to-cart', [KtranController::class, 'addCart_transaksi'])->name('K.A.C');
    Route::patch('/kasir/transaksi/update-cart', [KtranController::class, 'update_transaksi'])->name('K.U.C');
    Route::delete('/kasir/transaksi/remove-from-cart', [KtranController::class, 'remove_transaksi'])->name('K.R.C');
    Route::post('/kasir/transaksi/selesai', [KtranController::class, 'selesai_transaksi'])->name('K.T.S');
    Route::get('/kasir/riwayat-transaksi', [KtranController::class ,'riwayat_transaksi'])->name('K.R.T');
    Route::get('/kasir/riwayat-transaksi/struk/{nomor_transaksi}', [KtranController::class, 'struk_riwayat'])->name('K.S');
    //laporan
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
