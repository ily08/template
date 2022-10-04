<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\WaliController;
use App\Http\Controllers\GuruController;
// use App\Http\Controllers\PegawaiController;


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

Route::get('/hello', function () {
    return view('Hello');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('akun', SiswaController::class); 
Route::resource('guru', GuruController::class); 
Route::resource('jurusan', JurusanController::class); 

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('siswa', SiswaController::class);
    Route::resource('wali', WaliController::class);
    Route::resource('guru', GuruController::class);
//
}); 
Route::get('/test-admin', function(){
    return view('layouts.admin');
});

Route::get('/pegawai', 'PegawaiController@index');
Route::get('/pegawai/cetak_pdf', 'PegawaiController@cetak_pdf');

// Route::resource('/pegawai', PegawaiController::class);
