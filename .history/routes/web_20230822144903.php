<?php
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BaiXeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhongController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\TangController;
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
    Route::get('/phong', [PhongController::class, 'index'])->name('phong');
    Route::get('/phong/them', [PhongController::class, 'them'])->name('phong-them');

    // hop dong 
    Route::get('/hopdong', [HopDongController::class, 'index'])->name('hopdong');
    // Tang
    Route::get('/tang', [TangController::class, 'index'])->name('tang');
    // tai khoan 
    Route::get('/taikhoan', [TaiKhoanController::class, 'index'])->name('taikhoan');
    // thong ke
    Route::get('/thongke', [ThongKeController::class, 'index'])->name('thongke');
    // bai xe
    Route::get('/baixe', [BaiXeController::class, 'index'])->name('baixe');
});