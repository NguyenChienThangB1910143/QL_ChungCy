<?php
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BaiXeController;
use App\Http\Controllers\DienController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeCustomerController;
use App\Http\Controllers\HopDongController;
use App\Http\Controllers\NuocController;
use App\Http\Controllers\PhongController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\TangController;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\ToaController;
use App\Http\Controllers\TTTKController;
Use App\Http\Controllers\HoaDonCustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BaoCaoSCController;
use App\Http\Controllers\PhanHoiController;
use App\Http\Controllers\ThongBaoController;
use App\Http\Controllers\ThongBaoCustomerController;
use App\Http\Controllers\HopDongCustomerController;

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
    Route::get('/customer', [HomeCustomerController::class, 'index'])->name('homecustomer');
    Route::get('/logout', [LogoutController::class, 'getLogout'])->name('logout');
    //phong
    Route::get('/phong', [PhongController::class, 'index'])->name('phong');
    Route::get('/phong/them', [PhongController::class, 'them'])->name('phong-them');
    Route::post('/phong/them', [PhongController::class, 'store'])->name('phong-store');
    Route::get('/phong/chinhsua/{id_phong}', [PhongController::class, 'chinhsua'])->name('phong-chinhsua');
    Route::post('/phong/update/{id_phong}', [PhongController::class, 'update'])->name('phong-update');
    Route::get('/run-schedule', [PhongController::class, 'runSchedule']);
    // hop dong 
    Route::get('/hopdong', [HopDongController::class, 'index'])->name('hopdong');
    Route::get('/hopdong/capnhat/{id_hopdong}', [HopDongController::class, 'capnhat'])->name('hopdong-capnhat');
    Route::post('/hopdong/update/{id_hopdong}', [HopDongController::class, 'update'])->name('hopdong-update');
    Route::get('/hopdong/them', [HopDongController::class, 'them'])->name('hopdong-them');
    Route::post('/hopdong/them', [HopDongController::class, 'store'])->name('hopdong-store');
    Route::get('/hopdong/chitiet/{id_hopdong}', [HopDongController::class, 'chitiet'])->name('hopdong-chitiet');


    // Tang
    Route::get('/tang', [TangController::class, 'index'])->name('tang');
    Route::get('/tang/them', [TangController::class, 'them'])->name('tang-them');
    Route::post('/tang/them', [TangController::class, 'store'])->name('tang-store');
    Route::get('/tang/chinhsua/{id_tang}', [TangController::class, 'chinhsua'])->name('tang-chinhsua');
    Route::post('/tang/update/{id_tang}', [TangController::class, 'update'])->name('tang-update');
    // tai khoan 
    Route::get('/taikhoan', [TaiKhoanController::class, 'index'])->name('taikhoan');
    Route::get('/taikhoan/them', [TaiKhoanController::class, 'them'])->name('taikhoan-them');
    Route::post('/taikhoan/them', [TaiKhoanController::class, 'store'])->name('taikhoan-store');
    Route::get('/taikhoan/chinhsua/{id}', [TaiKhoanController::class, 'chinhsua'])->name('taikhoan-chinhsua');
    Route::post('/taikhoan/update/{id}', [TaiKhoanController::class, 'update'])->name('taikhoan-update');
    // thong ke
    Route::get('/thongke', [ThongKeController::class, 'index'])->name('thongke');
    // bai xe
    Route::get('/baixe', [BaiXeController::class, 'index'])->name('baixe');
    Route::get('/baixe/them', [BaiXeController::class, 'them'])->name('baixe-them');
    Route::post('/baixe/them', [BaiXeController::class, 'store'])->name('baixe-store');
    Route::get('/baixe/chinhsua/{id_baixe}', [BaiXeController::class, 'chinhsua'])->name('baixe-chinhsua');
    Route::post('/baixe/update/{id_baixe}', [BaiXeController::class, 'update'])->name('baixe-update');
    //toa
    Route::get('/toa', [ToaController::class, 'index'])->name('toa');
    Route::get('/toa/them', [ToaController::class, 'them'])->name('toa-them');
    Route::post('/toa/them', [ToaController::class, 'store'])->name('toa-store');
    Route::get('/toa/chinhsua/{id_toa}', [ToaController::class, 'chinhsua'])->name('toa-chinhsua');
    Route::post('/toa/update/{id_toa}', [ToaController::class, 'update'])->name('toa-update');
    
    //Dien
    Route::get('/dien',[DienController::class,'index'])->name('dien');
    Route::get('/dien/them',[DienController::class,'them'])->name('dien-them');
    Route::post('/dien/them',[DienController::class,'store'])->name('dien-store');
    //Nuoc
    Route::get('/nuoc',[NuocController::class,'index'])->name('nuoc');
    Route::get('/nuoc/them',[NuocController::class,'them'])->name('nuoc-them');
    Route::post('/nuoc/them',[NuocController::class,'store'])->name('nuoc-store');

    //Hoa don
    Route::get('/hoadon',[HoaDonController::class,'index'])->name('hoadon');
    Route::get('/hoadon/them',[HoaDonController::class,'them'])->name('hoadon-them');
    Route::post('/hoadon/them',[HoaDonController::class,'store'])->name('hoadon-store');
    Route::get('/hoadon/hethan', [HoaDonController::class,'hethan'])->name('hoadon-hethan');


    //Tin tuc
    Route::get('/tintuc',[TinTucController::class,'index'])->name('tintuc');
    Route::get('/tintuc/them',[TinTucController::class,'them'])->name('tintuc-them');
    Route::post('/tintuc/store',[TinTucController::class,'store'])->name('tintuc-store');
    Route::get('/tintuc/chinhsua/{id}', [TinTucController::class, 'chinhsua'])->name('tintuc-chinhsua');
    Route::post('/tintuc/update/{id}', [TinTucController::class, 'update'])->name('tintuc-update');
    Route::get('/tintuc/chitiet/{id}', [TinTucController::class, 'chitiet'])->name('tintuc-chitiet');
    Route::get('/tintuc/xoa/{id}', [TinTucController::class, 'xoa'])->name('tintuc-xoa');
    //tin tuc customer

    Route::get('/customer/tintuc',[TinTucController::class,'tintuccustomer'])->name('tintuccustomer');
    Route::get('/customer/tintuc/chitiet/{id}', [TinTucController::class, 'chitietcustomer'])->name('tintuccustomer-chitiet');
    // Bao cao su co
    Route::get('/customer/baocaosc',[BaoCaoSCController::class,'index'])->name('baocaosc');
    Route::get('/customer/baocaosc/them',[BaoCaoSCController::class,'them'])->name('baocao-them');
    Route::post('/customer/baocaosc/store',[BaoCaoSCController::class,'store'])->name('baocao-store');
    Route::get('/customer/baocaosc/phanhoi/{id_baocao}',[BaoCaoSCController::class,'phanhoi'])->name('baocao-phanhoi');
    //Phan hoi bao cao su co
    Route::get('/phanhoi', [PhanHoiController::class, 'index'])->name('phanhoi');
    Route::get('/phanhoi/them/{id_baocao}', [PhanHoiController::class, 'them'])->name('phanhoi.them');
    Route::post('/phanhoi/store', [PhanHoiController::class, 'store'])->name('phanhoi.store');
    //customer
    Route::get('/customer/taikhoan',[TTTKController::class,'index'])->name('profile');
    Route::get('/customer/taikhoan/chinhsua/{id}', [TTTKController::class, 'chinhsua'])->name('profile-chinhsua');
    Route::post('/customer/taikhoan/update/{id}', [TTTKController::class, 'update'])->name('profile-update');

    //Hoa Don customer
    Route::get('/customer/hoadon',[HoaDonCustomerController::class,'index'])->name('hoadoncustomer');
    Route::get('/customer/hoadon/chitiet/{id}',[HoaDonCustomerController::class,'chitiet'])->name('hoadoncustomer-chitiet');

    //Thông báo
    Route::get('/thongbao', [ThongBaoController::class, 'index'])->name('thongbao');
    Route::get('/thongbao/them', [ThongBaoController::class, 'them'])->name('thongbao-them');
    Route::post('/thongbao/them', [ThongBaoController::class, 'store'])->name('thongbao-store');

    //Thông báo Customer
    Route::get('/customer/thongbao', [ThongBaoCustomerController::class, 'index'])->name('thongbaoCT');

    //Hợp đồng Customer
    Route::get('/customer/hopdong', [HopDongCustomerController::class, 'index'])->name('hopdongCT');
});
route::post('/upload',[TinTucController::class,'upload'])->name('ckeditor.upload');

//pay
Route::post('/payment/create/{hoadon_id}', [PaymentController::class, 'createPayment']);
Route::get('/payment/return', [PaymentController::class, 'returnPayment'])->name('payment.return');

