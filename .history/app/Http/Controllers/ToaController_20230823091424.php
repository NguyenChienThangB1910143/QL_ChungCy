<?php

namespace App\Http\Controllers;

use App\Models\Toa;
use Illuminate\Http\Request;
use Session;

class ToaController extends Controller
{
    public function index()
    {
        $title = 'Tòa';
        $breadcrumbs = [
            [
                'name' => 'Tòa',
                'link' => './toa'
            ]
        ];
        $toa = Toa::paginate(5);
        return view('toa/toa', compact('title', 'toa', 'breadcrumbs'));
    }
    public function them()
    {
        $title = 'Tòa';
        $breadcrumbs = [
            [
                'name' => 'Tòa',
                'link' => './'
            ], [
                'name' => 'Thêm',
                'link' => './them'
            ]
        ];
        return view('toa/them', compact('title', 'breadcrumbs'));
    }
    public function store(Request $request)
    {
        $addtoa = new Toa();
        $addtoa->ten = $request->input('ten');

        $addtoa->save();

        return redirect()->route('toa')->with('success', 'Thêm thành công');
    }
    public function chinhsua(Request $request)
    {
        $title = 'Tòa';
        $breadcrumbs = [
            [
                'name' => 'Tòa',
                'link' => '../'
            ], [
                'name' => 'Chỉnh sửa',
                'link' => './' . $request->id_toa
            ]
        ];
        // dd($request);
        $suatoa = Toa::where('id_toa', $request->id_toa)->get();

        return view('toa/chinhsua', compact('title', 'suatoa', 'breadcrumbs'));
    }

    public function update(Request $request)
    {
        // dd($request);
        $suatoa = Toa::where('id_toa', $request->id_toa)->update([
            'id_toa'=>$request->id_toa,
            'ten' => $request->ten
        ]);
        if ($suatoa) {
            Session::flash('success', 'Cập nhật thành công.');
            return response()->json(['status' => 'success', 'message' => 'Cập nhật thành công.']); 
        }

        return redirect()->route('toa')->with('success', 'Sửa không thành công, không được chỉnh sửa mã tầng');
    }
}

