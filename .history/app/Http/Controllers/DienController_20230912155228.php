<?php

namespace App\Http\Controllers;
use App\Models\Dien;

use App\Models\Phong;
use App\Models\Tang;
use App\Models\Toa;
use Illuminate\Http\Request;

class DienController extends Controller
{
    public function index()
    {
        $title = 'Điện';
        $breadcrumbs = [
            [
                'name' => 'Điện',
                'link' => './dien'
            ]
        ];
        $diens = Dien::join('phong', 'dien.id_phong', '=', 'phong.id_phong')
            ->select('dien.*', 'phong.ten as ten_phong')
            ->paginate(5);

        return view('dien/dien', compact('title', 'diens', 'breadcrumbs'));
    }
    public function them()
    {
        $title = 'Điện';
        $breadcrumbs = [
            [
                'name' => 'Điện',
                'link' => './'
            ], [
                'name' => 'Thêm',
                'link' => './them'
            ]
        ];
        $dien=Dien::get();
        $phong = Phong::get();
        $tang=Tang::get();
        $toa= Toa::get();
        return view('dien/them', compact('title', 'breadcrumbs','dien','toa','tang','phong'));
    }
    public function store(Request $request)
    {
        $dien = new Dien();
        $dien->id_phong = $request->id_phong;
        $dien->chiso_cu = $request->chiso_cu;
        $dien->chiso_moi = $request->chiso_moi;
        $dien->thoigian = $request->thoigian;
        $dien->dongia = $request->dongia;
        $dien->save();

        return redirect()->route('dien')->with('success', 'Thêm thành công');
    }
}
