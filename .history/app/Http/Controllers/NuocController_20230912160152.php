<?php

namespace App\Http\Controllers;

use App\Models\Dien;
use App\Models\Nuoc;
use App\Models\Phong;
use App\Models\Tang;
use App\Models\Toa;
use Illuminate\Http\Request;

class NuocController extends Controller
{
    public function index()
    {
        $title = 'Nước';
        $breadcrumbs = [
            [
                'name' => 'Nước',
                'link' => './nuoc'
            ]
        ];
        $nuocs = Nuoc::join('phong', 'nuoc.id_phong', '=', 'phong.id_phong')
            ->select('nuoc.*', 'nuoc.ten as ten_phong')
            ->paginate(5);

        return view('nuoc/nuoc', compact('title', 'nuocs', 'breadcrumbs'));
    }
    public function them()
    {
        $title = 'Nước';
        $breadcrumbs = [
            [
                'name' => 'Nước',
                'link' => './'
            ], [
                'name' => 'Thêm',
                'link' => './them'
            ]
        ];
        $nuoc=Nuoc::get();
        $phong = Phong::get();
        $tang=Tang::get();
        $toa= Toa::get();
        return view('nuoc/them', compact('title', 'breadcrumbs','nuoc','toa','tang','phong'));
    }
    public function store(Request $request)
    {
        $nuoc = new Nuoc();
        $nuoc->id_phong = $request->phong;
        $nuoc->chiso_cu = $request->chiso_cu;
        $nuoc->chiso_moi = $request->chiso_moi;
        $nuoc->thoigian = $request->thoigian;
        $nuoc->dongia = $request->dongia;
        $nuoc->save();

        return redirect()->route('nuoc')->with('success', 'Thêm thành công');
    }
}
