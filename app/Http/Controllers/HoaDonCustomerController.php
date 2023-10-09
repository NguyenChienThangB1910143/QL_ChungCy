<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\HopDong;
use App\Models\HoaDon;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
class HoaDonCustomerController extends Controller
{
    public function index()
    {
        $title = 'Hóa Đơn';
        $breadcrumbs = [
            [
                'name' => 'Hóa Đơn',
                'link' => './hoadon'
            ]
        ];
        // Lấy người dùng hiện tại đã xác thực
        $user = Auth::user();

        // Lấy hợp đồng của người dùng có ngày kết thúc lớn hơn ngày hiện tại
        $hopdong = HopDong::where('id_user', $user->id)
            ->where('ngayketthuc', '>', Carbon::now())
            ->first();
        $hoadons = HoaDon::where('id_phong', $hopdong->id_phong)->get();

        return view('customer/hoadon/hoadon', compact('title', 'hoadons', 'breadcrumbs'));
    }
}
