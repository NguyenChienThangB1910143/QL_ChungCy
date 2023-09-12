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
        $diens = Dien::paginate(5);

        return view('dien/dien', compact('title', 'diens', 'breadcrumbs'));
    }
    
}
