<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HopDong;

class ThongKeController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Thống kê';
        $breadcrumbs = [
            [
                'name' => 'Thống kê',
                'link' => './thongke'
            ]
        ];
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

        return view('thongke.thongke', compact('title', 'thongke', 'breadcrumbs'));
    }
}
