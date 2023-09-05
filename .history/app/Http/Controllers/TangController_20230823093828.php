<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Toa;
use Illuminate\Http\Request;
use App\Models\Tang;
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
        $toa=Toa::get();
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
        $toa = Toa::get();
        return view('tang/them', compact('title', 'breadcrumbs', 'toa'));
    }
    public function store(Request $request)
    {
        $addtang = new Tang();
        $addtang->id_tang = $request->input('id_tang');
        $addtang->ten = $request->input('ten');
        $addtang->id_toa = $request->toa;

        $addtang->save();

        return redirect()->route('tang')->with('success', 'Thêm thành công');
    }
    public function chinhsua(Request $request)
    {
        $title = 'Tầng';
        $breadcrumbs = [
            [
                'name' => 'Tầng',
                'link' => '../'
            ], [
                'name' => 'Chỉnh sửa',
                'link' => './' . $request->id_tang
            ]
        ];
        // dd($request);
        $suatang = Tang::where('id_tang', $request->id_tang)->get();
        $toa = Toa::get();
        return view('tang/chinhsua', compact('title', 'suatang', 'breadcrumbs', 'toa'));
    }

    public function update(Request $request)
    {
        // dd($request);
        $suatang = Tang::where('id_tang', $request->id_tang)->update([
            'id_tang'=>$request->id_tang,
            'ten' => $request->ten,
            'id_toa'=>$request->toa
        ]);
        if ($suatang) {
            Session::flash('success', 'Cập nhật thành công.');
            return response()->json(['status' => 'success', 'message' => 'Cập nhật thành công.']); 
        }

        return redirect()->route('tang')->with('success', 'Sửa không thành công, không được chỉnh sửa mã tầng');
    }
}
