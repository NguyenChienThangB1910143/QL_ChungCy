<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\HopDong;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class HopDongCustomerController extends Controller
{
    public function index()
{
    $title = 'Hợp Đồng';
    $breadcrumbs = [
        [
            'name' => 'Hợp Đồng',
            'link' => './hopdong'
        ]
    ];
    // Lấy người dùng hiện tại đã xác thực
    $user = Auth::user();

    // Lấy hợp đồng cuối cùng của người dùng
    $hopdongCT = HopDong::join('users as user', 'user.id', '=', 'hopdong.id_user')
    ->join('users as ql', 'ql.id', '=', 'hopdong.id_ql')
    ->join('phong', 'phong.id_phong', '=', 'hopdong.id_phong')
    ->leftJoin('baixe', 'baixe.id_baixe', '=', 'hopdong.id_baixe') // Sử dụng leftJoin thay vì join
    ->select(
        'hopdong.*',
        'user.name as ten_user',
        'ql.name as ten_ql',
        'phong.ten as ten_phong',
        'baixe.ms as ms_baixe' // Nếu id_baixe là null, ms_baixe cũng sẽ là null
    )
    ->where('hopdong.id_user', $user->id)
        ->get();

    return view('customer/hopdong/hopdong', compact('title', 'hopdongCT', 'breadcrumbs'));
}
public function chitiet(Request $request)
{
    $title = 'Hợp đồng';
    $breadcrumbs = [
        [
            'name' => 'Hợp đồng',
            'link' => '../'
        ], [
            'name' => 'Chi tiết',
            'link' => './' . $request->id_hopdong
        ]
    ];
    $chitiethopdongCT = HopDong::join('users as user', 'user.id', '=', 'hopdong.id_user')
    ->join('users as ql', 'ql.id', '=', 'hopdong.id_ql')
    ->join('phong', 'phong.id_phong', '=', 'hopdong.id_phong')
    ->leftJoin('baixe', 'baixe.id_baixe', '=', 'hopdong.id_baixe') // Sử dụng leftJoin thay vì join
    ->select(
        'hopdong.*',
        'user.name as ten_user',
        'ql.name as ten_ql',
        'phong.ten as ten_phong',
        'baixe.ms as ms_baixe' // Nếu id_baixe là null, ms_baixe cũng sẽ là null
    )->where('id_hopdong', $request->id_hopdong)->get();

    return view('customer/hopdong/chitiet', compact('title', 'chitiethopdongCT', 'breadcrumbs'));
}
}
