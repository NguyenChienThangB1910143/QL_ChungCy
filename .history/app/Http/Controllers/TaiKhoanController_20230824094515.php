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
            'SDT' => 'required|unique:users',
        ]);
        if ($validator->fails()) {
            return redirect()->route('taikhoan')
                ->withErrors($validator);
        }
        // dd($request->file('avatar'));
        $addtaikhoan = new User();
        $addtaikhoan->ND_MaND = $request->input('ND_MaND');
        $addtaikhoan->name = $request->input('name');
        $addtaikhoan->ND_GioiTinh = ($request->input('gioiTinh') == 1) ? 'Nam' : 'Nu';
        $addtaikhoan->ND_DiaChi = $request->input('diaChi');
        $addtaikhoan->email = $request->input('email');
        $addtaikhoan->password = $request->input('password');

        if ($file = $request->file('avatar')) {
            // $path = $file->store('public/avatar');
            $filename = $file->getClientOriginalName();

            // Move the file to the public directory
            $file->move(public_path('avatar'), $filename);

            // Get the public URL of the file
            $publicUrl = asset('avatar/' . $filename);
            $addtaikhoan->avatar = 'avatar/' . $filename;
        }
        $addtaikhoan->ND_SDT = $request->input('ND_SDT');
        $addtaikhoan->save();

        $addquyennguoidung = new QuyenNguoiDung();
        $addquyennguoidung->Q_MaQ = $request->input('Ma_Q');
        $addquyennguoidung->ND_MaND = User::where('ND_MaND', $request->input('ND_MaND'))->first()->id;
        $addquyennguoidung->save();

        $addnguoidungdonvi = new NguoiDungDonVi();
        $addnguoidungdonvi->DV_MaDV = $request->input('Ma_DV');
        $addnguoidungdonvi->ND_MaND = User::where('ND_MaND', $request->input('ND_MaND'))->first()->id;
        $addnguoidungdonvi->save();
        return redirect()->route('taikhoan')->with('success', 'Thêm thành công');
    }
}