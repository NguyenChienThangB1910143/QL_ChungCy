<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Auth;
class TaiKhoanController extends Controller
{
    public function index()
    {
        $title = 'Tài Khoản';
        $breadcrumbs = [
            [
                'name' => 'Tài khoản',
                'link' => './taikhoan'
            ]
        ];
        $taikhoans = User::paginate(5);

        return view('taikhoan/taikhoan', compact('title', 'taikhoans', 'breadcrumbs'));
    }
    public function them()
    {
        $title = 'Tài Khoản';
        $breadcrumbs = [
            [
                'name' => 'Tài khoản',
                'link' => './'
            ], [
                'name' => 'Thêm',
                'link' => './them'
            ]
        ];

        return view('taikhoan/them', compact('title', 'breadcrumbs'));
    }
}