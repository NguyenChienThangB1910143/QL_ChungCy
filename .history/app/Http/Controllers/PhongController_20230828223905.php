<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tang;
use App\Models\Phong;
use Illuminate\Support\Facades\Artisan;
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
    public function store(Request $request)
    {
        $addphong = new Phong();
        $addphong->id_tang = $request->tang;
        $addphong->id_phong = $request->input('id_phong');
        $addphong->ten = $request->input('ten');
        $addphong->tinhtrang = $request->input('tt');
        $addphong->save();

        return redirect()->route('phong')->with('success', 'Thêm thành công');
    }
    public function chinhsua(Request $request)
    {
        $title = 'Phòng';
        $breadcrumbs = [
            [
                'name' => 'Phòng',
                'link' => '../'
            ], [
                'name' => 'Chỉnh sửa',
                'link' => './' . $request->id_phong
            ]
        ];
        $suaphong = Phong::where('id_phong', $request->id_phong)->get();

        return view('phong/chinhsua', compact('title', 'suaphong', 'breadcrumbs'));
    }

    public function update(Request $request)
    {
        // dd($request);
        $suaphong = Phong::where('id_phong', $request->id_phong)->update([
            'id_phong' => $request->id_phong,
            'ten' => $request->ten,
            'tinhtrang' => $request->tinhtrang,
        ]);
        if ($suaphong) {
            Session::flash('success', 'Cập nhật thành công.');
            return response()->json(['status' => 'success', 'message' => 'Cập nhật thành công.']); 
        }

        return redirect()->route('phong')->with('success', 'Sửa không thành công, không được chỉnh sửa mã trạm');
    }
    public function runSchedule()
{
    Artisan::call('schedule:run');

    // Return a response to the user
    return redirect()->route('phong')->with('success', 'Đã refresh');}
    public function __construct()
{
    $this->runSchedule();
}

}