<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PertemuanController;
use App\Http\Controllers\KRSController;
use App\Http\Controllers\AbsensiController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('logout', function(){
    Auth::logout();
    return redirect('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'mahasiswa'], function () {
    Route::get('/', function() { return view('mahasiswa.mahasiswa'); });
    Route::post('/create', [UserController::class, 'create']);
    Route::post('/update/{id}', [UserController::class, 'update']);
    Route::get('/delete/{id}', [UserController::class, 'delete']);
    Route::get('/data', [UserController::class, 'data']);
});

Route::group(['prefix' => 'kelas'], function () {
    Route::get('/', function() { return view('kelas.kelas'); });
    Route::post('/create', [KelasController::class, 'create']);
    Route::post('/update/{id}', [KelasController::class, 'update']);
    Route::get('/delete/{id}', [KelasController::class, 'delete']);
    Route::get('/data', [KelasController::class, 'data']);
    Route::get('/detail/{id}', [KelasController::class, 'detail']);
    Route::get('/detail1/{id}', [KelasController::class, 'detail1']);
    Route::get('/detail/data_mahasiswa/{id}', [KelasController::class, 'data_mahasiswa']);
    Route::get('/detail/data_pertemuan/{id}', [KelasController::class, 'data_pertemuan']);
    Route::get('/pertemuan/detail/{id}', [AbsensiController::class, 'detail']);
    
});

Route::group(['prefix' => 'lihatkelas'], function () {
    Route::get('/', function() { return view('kelas.lihatkelas'); });
    Route::get('/data1', [KelasController::class, 'data1']);
    Route::get('/data2', [KelasController::class, 'data2']);
    Route::get('/detail/{id}', [KelasController::class, 'detail']);
    Route::get('/detail/data_mahasiswa/{id}', [KelasController::class, 'data_mahasiswa']);
    Route::get('/detail/data_pertemuan/{id}', [KelasController::class, 'data_pertemuan']);
    Route::get('/pertemuan/detail/{id}', [AbsensiController::class, 'detail']);
    
});

Route::group(['prefix' => 'pertemuan'], function () {
    Route::post('/create', [PertemuanController::class, 'create']);
    Route::post('/update/{id}', [PertemuanController::class, 'update']);
    Route::post('/updatefile/{id}', [PertemuanController::class, 'updatefile']);
    Route::get('/delete/{id}', [PertemuanController::class, 'delete']);
    Route::get('/data', [PertemuanController::class, 'data']);
    Route::get('/detail/data_absensi/{id}', [PertemuanController::class, 'data_absensi']);
    Route::get('/combo_kelas', [PertemuanController::class, 'combo_kelas']);
    Route::get('/combo_kelas1/{id}', [PertemuanController::class, 'combo_kelas1']);
});

Route::group(['prefix' => 'peserta'], function () {
    Route::get('/', function() { return view('kelas.pesertakelas'); });
    Route::post('/create', [KRSController::class, 'create']);
    Route::post('/update/{id}', [KRSController::class, 'update']);
    Route::get('/delete/{id}', [KRSController::class, 'delete']);
    Route::get('/data', [KRSController::class, 'data']);
    Route::get('/combo_kelas', [KRSController::class, 'combo_kelas']);
    Route::get('/combo_user', [KRSController::class, 'combo_user']);
    Route::get('/combo_kelas1/{id}', [KRSController::class, 'combo_kelas1']);
    Route::get('/combo_user1/{id}', [KRSController::class, 'combo_user1']);

});

Route::group(['prefix' => 'absensi'], function () {
    Route::post('/create', [AbsensiController::class, 'create']);
    Route::post('/update/{id}', [AbsensiController::class, 'update']);
    Route::get('/delete/{id}', [AbsensiController::class, 'delete']);
    Route::get('/data', [AbsensiController::class, 'data']);
    Route::get('/combo_kelas', [AbsensiController::class, 'combo_kelas']);
    Route::get('/combo_user', [AbsensiController::class, 'combo_user']);
    Route::get('/combo_pertemuan1/{id}', [AbsensiController::class, 'combo_pertemuan1']);
    Route::get('/combo_user1', [AbsensiController::class, 'combo_user1']);
});