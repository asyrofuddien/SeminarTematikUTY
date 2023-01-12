<?php

use App\Http\Controllers\DashboardKatalogController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PesenController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Models\Kategori;

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

Route::get('/', [KatalogController::class,"index"] );
Route::get('/produk/{katalog:slug}', [KatalogController::class,"show"] );



Route::get('/login',[LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);

Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/dashboard',function(){
    return view('dashboard.index');
})->middleware('toko');

Route::get('/kategori/{kategori:slug}',function(Kategori $kategori){
    return view('kategori',[
        'nama' => $kategori->nama,
        'katalog' => $kategori->katalog,
        'kategori' => $kategori->nama

    ]);
});

Route::resource('/dashboard/katalog', DashboardKatalogController::class)->middleware('toko');
Route::resource('/dashboard/pesanan', PesananController::class)->middleware('toko');
Route::resource('/dashboard/pembelian', PembelianController::class)->middleware('auth');
Route::resource('/pesen', PesenController::class)->middleware('auth');



