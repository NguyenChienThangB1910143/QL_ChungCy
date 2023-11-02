<?php

namespace App\Http\Controllers;

use App\Models\BaiXe;
use App\Models\Dien;
use App\Models\HoaDon;
use App\Models\Nuoc;
use App\Models\Phong;
use App\Models\Tang;
use App\Models\Toa;
use App\Models\HopDong;
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
            ->orderBy('created_at', 'desc')
            ->get();

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
    // Lấy thông tin từ form
    $id_phong = $request->input('phong');
    $thoigian = $request->input('thoigian');
    $tiendien = $request->input('tiendien');
    $tiennuoc = $request->input('tiennuoc');
    $tienbaixe = $request->input('tienbaixe');
    $khac = $request->input('khac') ?? '';
    $thuthem = $request->input('thuthem') ?? 0;
    $thanhtien = $tiendien + $tiennuoc + $tienbaixe + $thuthem;


        // Tạo hóa đơn mới
        HoaDon::create([
            'id_phong' => $id_phong,
            'thoigian' => $thoigian,
            'tiendien' => $tiendien,
            'tiennuoc' => $tiennuoc,
            'tienbaixe' => $tienbaixe, // Lưu tiền bãi xe vào cơ sở dữ liệu
            'khac' => $khac,
            'thuthem' => $thuthem,
            'thanhtien' => $thanhtien,
            'tinhtrang' => 0, // Tình trạng khi thêm là 0
        ]);

        return redirect()->route('hoadon')->with('success', 'Thêm thành công');
}
    public function hethan()
    {
        $title = 'Hóa Đơn';
            $breadcrumbs = [
                [
                    'name' => 'Hóa Đơn',
                    'link' => './'
                ]
            ];
        $hoadons = Hoadon::where('tinhtrang', 0)
                        ->where('thoigian', '<', \Carbon\Carbon::now()->subDays(14))
                        ->get();

        return view('hoadon/hoadon', compact('title', 'hoadons', 'breadcrumbs'));
    }

    public function getDienNuoc(Request $request)
    {
        $dien = Dien::where('id_phong', $request->id_phong)->latest('created_at')->first();
        $nuoc = Nuoc::where('id_phong', $request->id_phong)->latest('created_at')->first();
        return response()->json(['dien' => $dien->thanhtien, 'nuoc' => $nuoc->thanhtien]);
    }
    public function getBaixe(Request $request)
{

    $hopdong = HopDong::where('id_phong', $request->id_phong)->latest('created_at')->first();
    $baixe = BaiXe::where('id_baixe', $hopdong->id_baixe)->first();

    return response()->json(['gia' => $baixe->gia]);
}



}
