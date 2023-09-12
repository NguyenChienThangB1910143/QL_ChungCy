<?php

namespace App\Http\Controllers;
use App\Models\Dien;

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
        $diens = Dien::join('phong', 'dien.id_phong', '=', 'phong.id')
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

        return view('dien/them', compact('title', 'breadcrumbs','dien'));
    }
}
