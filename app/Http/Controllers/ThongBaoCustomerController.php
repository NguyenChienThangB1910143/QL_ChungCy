<?php

namespace App\Http\Controllers;
use App\Models\ThongBao;
use App\Models\HopDong;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class ThongBaoCustomerController extends Controller
{
    public function index()
    {
        $title = 'Thông Báo';
        $breadcrumbs = [
            [
                'name' => 'Thông Báo',
                'link' => './thongbao'
            ]
        ];
        $user = Auth::user();
        $hopdong = HopDong::where('id_user', $user->id)
        ->orderBy('created_at', 'desc')
        ->first();
    
    if ($hopdong) {
        $thongbaoCT = ThongBao::where(function ($query) use ($hopdong) {
            $query->where('nhan', 0)
            ->orWhere('nhan', $hopdong->id_phong);
        })->get();
    } else {
        $thongbaoCT = ThongBao::where('nhan', 0)->get();
    }
    
        return view('customer/thongbao/thongbao', compact('title', 'thongbaoCT','hopdong','user', 'breadcrumbs'));
    }
    
}
