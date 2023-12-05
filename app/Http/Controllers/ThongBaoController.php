<?php

namespace App\Http\Controllers;
use App\Models\ThongBao;
use App\Models\Phong;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class ThongBaoController extends Controller
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
        $thongbao = ThongBao::get();
        return view('thongbao/thongbao', compact('title', 'thongbao', 'breadcrumbs'));
    }
    public function them(){
        $title = 'Thông Báo';
        $breadcrumbs = [
            [
                'name' => 'Thông Báo',
                'link' => './'
            ], [
                'name' => 'Thêm',
                'link' => './them'
            ]
        ];
        $tbphong=Phong::where('tinhtrang', '=', 1 )->get();
        return view('thongbao/them', compact('title', 'tbphong','breadcrumbs'));
    }
    public function store(Request $request)
    {
        $id_ql = Auth::user()->id;
        $addthongbao = new ThongBao();
        $addthongbao->id_user = $id_ql;
        $addthongbao->tieude = $request->input('tieude');
        $addthongbao->noidung = $request->input('noidung');
        $addthongbao->thoigian = now();
        $addthongbao->nhan = $request->input('nhan');
        $addthongbao->save();

        return redirect()->route('thongbao')->with('success', 'Thêm thành công');
    }
    public function chitiet(Request $request)
    {
        $title = 'Thông báo';
        $breadcrumbs = [
            [
                'name' => 'Thông báo',
                'link' => '../'
            ], [
                'name' => 'thông báo',
                'link' => './' . $request->id_thongbao
            ]
        ];
        $chitiettb =  ThongBao::where('id_thongbao', $request->id_thongbao)->get();

        return view('thongbao/chitiet', compact('title', 'chitiettb', 'breadcrumbs'));
    }
    
}
