<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Toa;
use Illuminate\Http\Request;
use App\Models\Tang;
use App\Models\Phong;
use Illuminate\Support\Facades\Artisan;
use Session;
class PhongController extends Controller
{
    public function index(Request $request)
{
    $title = 'Phòng';
    $breadcrumbs = [
        [
            'name' => 'Phòng',
            'link' => './phong'
        ]
    ];
    $toa = Toa::get();
    $tang = Tang::when($request->has('toa'), function ($query) use ($request) {
        $query->where('id_toa', $request->toa);
    })->get();
    
    $phong = Phong::join('tang', 'phong.id_tang', '=', 'tang.id_tang')
    ->join('toa', 'tang.id_toa', '=', 'toa.id_toa');
    
    if ($request->has('toa')) {
        $phong = $phong->where('toa.id_toa', $request->toa);
    }
    
    if ($request->has('tang')) {
        $phong = $phong->where('tang.id_tang', $request->tang);
    }
    
    $phong = $phong->select('phong.*', 'tang.ten as ten_tang', 'toa.ten as ten_toa')->paginate(5);

    return view('phong/phong', compact('title', 'phong', 'breadcrumbs', 'toa', 'tang'));
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
        $toa=Toa::get();
        return view('phong/them', compact('title', 'breadcrumbs', 'tang','toa'));
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
    return redirect()->route('phong');}
    public function __construct()
{
    $this->runSchedule();
}

}