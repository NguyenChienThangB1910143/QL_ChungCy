<?php

use App\Http\Controllers\PhongController;
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
    return view('chungcu');
});
//router login
Route::get('/login', [LoginController::class, 'getLogin'])->name('login');;
Route::post('/login', [LoginController::class, 'postLogin'])->name('post-login');
Route::any('/forgotpassword', [LoginController::class, 'forgotpassword'])->name('forgot-password');
Route::group(['middleware' => 'auth'], function () {
    // router home 
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [LogoutController::class, 'getLogout'])->name('logout');
    //phong
    Route::get('/phong', [PhongControllerController::class, 'index'])->name('phong');
     // hop dong 
     Route::get('/hopdong', [HopDongController::class, 'index'])->name('hopdong');
      // Tang
    Route::get('/tang', [HopDongController::class, 'index'])->name('tang');
    // tai khoan 
    Route::get('/taikhoan', [TaiKhoanController::class, 'index'])->name('taikhoan');
});