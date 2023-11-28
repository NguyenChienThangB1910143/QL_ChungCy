<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phong;
use App\Models\Baixe;
use App\Models\User;
use App\Models\Hopdong;

class HomeController extends Controller
{
    public function index( Request $request)
    {
        $title = 'Trang Chủ';
        $phong = Phong::count();
        $phong1 = Phong::where('tinhtrang', 1)->count();
        $baixe = Baixe::count();
        $baixe1 = Baixe::where('tinhtrang', 1)->count();
        $hopdong = Hopdong::where('ngayketthuc', '>', now())->count();
        $user = User::count();
        $year = $request->get('year', date('Y')); // Get the year from the request, or use the current year as a default
        $thongke = [];
        for ($month = 1; $month <= 12; $month++) {
            $count = HopDong::whereYear('ngaybatdau', $year)
                            ->whereMonth('ngaybatdau', $month)
                            ->count();
            $thongke[$month] = $count;
        }

        if ($request->ajax()) {
            return response()->json($thongke);
        }

        return view('home', compact('title', 'phong','phong1', 'baixe','baixe1', 'hopdong', 'user','thongke'));
    }
}
