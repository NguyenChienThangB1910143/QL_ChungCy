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

        $hoadons = HoaDon::where('id_phong', $hopdong->id_phong)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

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
    public function filter(Request $request)
{
    $month = $request->get('month');
    $year = $request->get('year');

    $hoadons = HoaDon::whereYear('created_at', $year)
                     ->whereMonth('created_at', $month)
                     ->get();

    return response()->json($hoadons);
}

}
