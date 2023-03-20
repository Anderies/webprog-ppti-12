<?php

use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function() {
    return '<h1> hello world </h1>';
});

Route::get('/belajar', function () {
    echo '<h1>Hello World</h1>';
    echo '<p>Sedang belajar Laravel</p>';
});

Route::get('/mahasiswa/{nama}', function ($nama) {
    return "Selamat Pagi $nama";
});

Route::get('/hubungi-kami', function () {
    return "<h1>Hubungi Kami Page</h1>";
});

Route::get('/greet/{nama}', function($nama){
    $nim = '220108910';
    return view('profile', ['name' => $nama, 'nim' => $nim]);
});

Route::redirect('/contact-us', 'hubungi-kami');

Route::prefix('/admin')->group(function(){
    Route::get('/mahasiswa', function(){
        return '<h1>Halaman Daftar Mahasiswa</h1>';
    });
    Route::get('/dosen', function(){
        return '<h1>Halaman Daftar Dosen</h1>';
    });
    Route::get('/karyawan', function(){
        return '<h1>Halaman Daftar karyawan</h1>';
    });
});

Route::fallback(function(){
    return view('welcome');
});

// Query Parameter
Route::get('/test', function(HttpRequest $request){
    $query = $request->query('value');
    $query2 = $request->query('name');
    return "you are try to search $query and $query2";
});


