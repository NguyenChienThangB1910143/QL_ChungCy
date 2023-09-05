<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tang;
use App\Models\Phong;
use Session;
class CSHTController extends Controller
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
}