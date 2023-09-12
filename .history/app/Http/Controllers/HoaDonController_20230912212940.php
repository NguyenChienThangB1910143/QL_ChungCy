<?php

namespace App\Http\Controllers;

use App\Models\BaiXe;
use App\Models\Dien;
use App\Models\HoaDon;
use App\Models\Nuoc;
use App\Models\Phong;
use App\Models\Tang;
use App\Models\Toa;
use Illuminate\Http\Request;

class HoaDonController extends Controller
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
        $hoadons = HoaDon::join('phong', 'hoadon.id_phong', '=', 'phong.id_phong')
            ->select('hoadon.*', 'phong.ten as ten_phong')
            ->paginate(5);

        return view('hoadon/hoadon', compact('title', 'hoadons', 'breadcrumbs'));
    }
    public function them()
    {
        $title = 'Hóa Đơn';
        $breadcrumbs = [
            [
                'name' => 'Hóa Đơn',
                'link' => './'
            ], [
                'name' => 'Thêm',
                'link' => './them'
            ]
        ];
        $hoadon=HoaDon::get();
        $dien=Dien::get();
        $phong = Phong::get();
        $tang=Tang::get();
        $toa= Toa::get();
        $nuoc=Nuoc::get();
        $baixe=BaiXe::get();
        return view('hoadon/them', compact('title', 'breadcrumbs','hoadon','dien','nuoc','toa','tang','phong','baixe'));
    }
    public function store(Request $request)
{

}
}
