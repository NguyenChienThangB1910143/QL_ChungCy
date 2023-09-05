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
        return view('baixe/baixe', compact('title', 'baixe', 'breadcrumbs'));
    }
    public function them()
    {
        $title = 'Bãi Xe';
        $breadcrumbs = [
            [
                'name' => 'Bãi Xe',
                'link' => './'
            ], [
                'name' => 'Thêm',
                'link' => './them'
            ]
        ];
        return view('baixe/them', compact('title', 'breadcrumbs'));
    }
    public function store(Request $request)
    {
        $addbaixe = new BaiXe();
        $addbaixe->ms= $request->input('ms');
        $addbaixe->ms= $request->input('loaixe');
        $addbaixe->tinhtrang= $request->input('tinhtrang');
        $addbaixe->gia= $request->input('gia');

        $addbaixe->save();

        return redirect()->route('baixe')->with('success', 'Thêm thành công');
    }
    public function chinhsua(Request $request)
    {
        $title = 'Bãi Xe';
        $breadcrumbs = [
            [
                'name' => 'Bãi Xe',
                'link' => '../'
            ], [
                'name' => 'Chỉnh sửa',
                'link' => './' . $request->id_baixe
            ]
        ];
        // dd($request);
        $suabaixe = BaiXe::where('id_baixe', $request->id_baixe)->get();

        return view('baixe/chinhsua', compact('title', 'suabaixe', 'breadcrumbs'));
    }

    public function update(Request $request)
    {
        // dd($request);
        $suabaixe = BaiXe::where('id_baixe', $request->id_baixe)->update([
            'id_baixe'=>$request->id_baixe,
            'ms'=>$request->ms,
            'tinhtrang' => $request->tinhtrang,
            'gia' => $request->gia
        ]);
        if ($suabaixe) {
            Session::flash('success', 'Cập nhật thành công.');
            return response()->json(['status' => 'success', 'message' => 'Cập nhật thành công.']); 
        }

        return redirect()->route('baixe')->with('success', 'Sửa không thành công, không được chỉnh sửa mã tầng');
    }
}