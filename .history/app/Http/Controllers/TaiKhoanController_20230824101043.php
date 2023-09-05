<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|unique:users',
            'email' => 'required|unique:users',
            'sdt' => 'required|unique:users',
            'STK' => 'required|unique:users',
        ]);
        if ($validator->fails()) {
            return redirect()->route('taikhoan')
                ->withErrors($validator);
        }
        // dd($request->file('avatar'));
        $addtaikhoan = new User();
        $addtaikhoan->name = $request->input('name');
        $addtaikhoan->ngaysinh = $request->input('ngaysinh');
        $addtaikhoan->email = $request->input('email');
        $addtaikhoan->sdt = $request->input('sdt');
        $addtaikhoan->password = $request->input('password');
        $addtaikhoan->quyen = $request->input('quyen');
        $addtaikhoan->STK = $request->input('STK');
        $addtaikhoan->trangthai = $request->input('trangthai');

        $addtaikhoan->save();

        return redirect()->route('taikhoan')->with('success', 'Thêm thành công');
    }
}