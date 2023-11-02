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

        // Lấy hợp đồng cuối cùng của người dùng
        $hopdong = HopDong::where('id_user', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($hopdong) {
            $hoadons = HoaDon::where('id_phong', $hopdong->id_phong)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $hoadons = null;
        }

        return view('customer/hoadon/hoadon', compact('title', 'hoadons', 'breadcrumbs'));

    }
    public function chitiet(Request $request)
    {
        $title = 'Chi tiết';
        $breadcrumbs = [
            [
                'name' => 'Chi tiết',
                'link' => '../'
            ], [
                'name' => 'Chi tiết',
                'link' => './' . $request->id
            ]
        ];
        $chitiethd =HoaDon::where('id', $request->id)->get();

        return view('customer/hoadon/chitiet', compact('title', 'chitiethd', 'breadcrumbs'));
    }
}
