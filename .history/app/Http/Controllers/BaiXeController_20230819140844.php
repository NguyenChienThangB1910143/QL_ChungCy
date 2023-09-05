<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BaiXe;
use Session;
class BaiXeController extends Controller
{
    public function index()
    {
        $title = 'Bãi xe';
        $breadcrumbs = [
            [
                'name' => 'Bãi xe',
                'link' => './baixe'
            ]
        ];
        $baixe = BaiXe::paginate(5);
        // dd($cshts);
        return view('baixe/baixe', compact('title', 'baixe', 'breadcrumbs'));
    }
}