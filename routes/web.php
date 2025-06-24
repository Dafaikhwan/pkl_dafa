<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\productController;
use App\Http\Controllers\FrontendController;

Route::get('/',[FrontendController::class,'index']);
Route::get('/about',[FrontendController::class,'about']);
Route::get('/product',[FrontendController::class,'product']);
Route::get('/cart',[FrontendController::class,'cart']);





// Route::get('about', function () {
//     return 'ini halaman about';
// });
// Route::get('profile', function () {
//     return view('profile');
// });

// Route::get('produk/{namaProduk}',function ($a){
//     return 'saya membeli <b>'.$a . '</b>';
// });

// Route::get('beli/{barang}/{jumlah}',function ($a,$b){
//     return view('beli', compact('a','b'));
// });

// Route::get('beli/{barang}/{jumlah}',function ($a,$b){
//     return view('beli', compact('a','b'));
// });
// Route::get('kategori/{namaKategori?}',function ($nama=null){
//     if ($nama) {
//         return 'anda memilih kategori:' . $nama;
//     }else{
//         return 'anda belum memilih kategori:';
//     }
    
// });

Route::get('/promo/{barang?}/{kode?}', function ($barang = null, $kode = null) {
    if ($barang && $kode) {
        $pesan = "Menampilkan promo untuk $barang dengan kode promo $kode";
    } elseif ($barang) {
        $pesan = "Menampilkan promo untuk $barang";
    } else {
        $pesan = "Menampilkan semua produk barang";
    }

    return view('promo', ['pesan' => $pesan]);
}); 

Route::get('siswa',[MyController::class,'index']);
Route::get('siswa/create',[MyController::class,'create']);
Route::post('/siswa',[MyController::class, 'store']);
Route::get('/siswa/{id}', [MyController::class, 'show']);
Route::get('siswa/{id}/edit',[MyController::class,'edit']);
Route::put('/siswa/{id}', [MyController::class, 'update']);
Route::delete('/siswa/{id}', [MyController::class, 'destroy']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Middleware\Admin;
Route::group(['prefix'=>'admin','middleware'=>['auth' , Admin::class]],function(){
    Route::get('/',[BackendController::class,'index']);
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);

    
});

