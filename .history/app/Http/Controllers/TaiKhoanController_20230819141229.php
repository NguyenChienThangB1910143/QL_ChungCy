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
        $role = null;
        $id = Auth::user()->id;
        if (!empty(Auth::user())) {
            $role = Auth::user()->quyennguoidungs()->first()->quyen()->first();
        }
        $title = 'Tài Khoản';
        $breadcrumbs = [
            [
                'name' => 'Tài khoản',
                'link' => './taikhoan'
            ]
        ];
        $taikhoans = User::paginate(5);

        return view('taikhoan/taikhoan', compact('title', 'taikhoans', 'breadcrumbs', 'role','id'));
    }
}