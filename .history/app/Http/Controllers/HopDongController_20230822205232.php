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
        $hopdong = HopDong::join('users', 'users.id', '=', 'hopdong.id_user')
                  ->select('hopdong.*', 'users.name as ten_user')
                  ->paginate(5);
        return view('hopdong/hopdong', compact('title', 'hopdong', 'breadcrumbs'));
    }
}