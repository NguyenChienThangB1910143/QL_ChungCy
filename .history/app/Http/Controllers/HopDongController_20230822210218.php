<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HopDong;
use Session;
class HopDongController extends Controller
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
        $hopdong = HopDong::paginate(5);
        $hopdong = HopDong::join('users as user', 'user.id', '=', 'hopdong.id_user')
                  ->join('users as ql', 'ql.id', '=', 'hopdong.id_ql')
                  ->join('phong', 'phong.id', '=', 'hopdong.id_phong')
                  ->join('baixe', 'baixe.id', '=', 'hopdong.id_baixe')
                  ->select(
                      'hopdong.*',
                      'user.name as ten_user',
                      'user.name as ten_ql',
                      'phong.ten as ten_phong',
                      'baixe.ms as ten_baixe'
                  )
                  ->paginate(5);

        return view('hopdong/hopdong', compact('title', 'hopdong', 'breadcrumbs'));
    }
}