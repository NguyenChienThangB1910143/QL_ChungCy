<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tang;
use App\Models\Phong;
use Session;
class PhongController extends Controller
{
    public function index()
    {
        $title = 'Phòng';
        $breadcrumbs = [
            [
                'name' => 'Phòng',
                'link' => './phong'
            ]
        ];
        $phong = Phong::paginate(5);
        // dd($cshts);
        return view('phong/phong', compact('title', 'phong', 'breadcrumbs'));
    }
    public function them()
    {
        $title = 'Phòng';
        $breadcrumbs = [
            [
                'name' => 'Phòng',
                'link' => './'
            ], [
                'name' => 'Thêm',
                'link' => './them'
            ]
        ];
        $tang = Tang::get();
        return view('phong/them', compact('title', 'breadcrumbs', 'tang'));
    }
}