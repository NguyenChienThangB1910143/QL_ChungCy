<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tang;
use App\Models\Phong;
use Session;
class TangController extends Controller
{
    public function index()
    {
        $title = 'Tầng';
        $breadcrumbs = [
            [
                'name' => 'Tầng',
                'link' => './tang'
            ]
        ];
        $tang = Tang::paginate(5);
        return view('tang/tang', compact('title', 'tang', 'breadcrumbs'));
    }
    public function them()
    {
        $title = 'Tầng';
        $breadcrumbs = [
            [
                'name' => 'Tầng',
                'link' => './'
            ], [
                'name' => 'Thêm',
                'link' => './them'
            ]
        ];
        return view('tang/them', compact('title', 'breadcrumbs'));
    }
    public function store(Request $request)
    {
        $addtang = new Tang();
        $addtang->ten = $request->input('ten');

        $addtang->save();

        return redirect()->route('tang')->with('success', 'Thêm thành công');
    }
}
