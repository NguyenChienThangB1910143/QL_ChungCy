<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BaiXe;
use App\Models\Tang;
use App\Models\Toa;
use Illuminate\Http\Request;
use App\Models\HopDong;
use App\Models\User;
use App\Models\Phong;
use Illuminate\Support\Facades\Auth;
use Session;
class HopDongController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Hợp Đồng';
        $breadcrumbs = [
            [
                'name' => 'Hợp Đồng',
                'link' => './hopdong'
            ]
        ];
        $hopdong = HopDong::join('users as user', 'user.id', '=', 'hopdong.id_user')
                  ->join('users as ql', 'ql.id', '=', 'hopdong.id_ql')
                  ->join('phong', 'phong.id_phong', '=', 'hopdong.id_phong')
                  ->join('baixe', 'baixe.id_baixe', '=', 'hopdong.id_baixe')
                  ->select(
                      'hopdong.*',
                      'user.name as ten_user',
                      'ql.name as ten_ql',
                      'phong.ten as ten_phong',
                      'baixe.ms as ms_baixe'
                  )
                  ->paginate(5);

        if ($request->has('search')) {
            $search = $request->search;
            $hopdong = $hopdong->where(function ($query) use ($search) {
                        $query->where('id_hopdong', 'like', "%$search%")
                            ->orWhere('ten_user', 'like', "%$search%")
                            ->orWhere('ten_ql', 'like', "%$search%")
                            ->orWhere('ten_phong', 'like', "%$search%")
                            ->orWhere('ms_baixe', 'like', "%$search%")->paginate(5);
                    });
                
        }
        return view('hopdong/hopdong', compact('title', 'hopdong', 'breadcrumbs'));
    }
    public function capnhat(Request $request)
    {
        $title = 'Hợp Đồng';

        $breadcrumbs = [
            [
                'name' => 'Hợp đồng',
                'link' => '../'
            ], [
                'name' => 'Cập nhật',
                'link' => './' . $request->id_hopdong
            ]
        ];
        $capnhathopdong = HopDong::join('users as user', 'user.id', '=', 'hopdong.id_user')
        ->join('users as ql', 'ql.id', '=', 'hopdong.id_ql')
        ->join('phong', 'phong.id_phong', '=', 'hopdong.id_phong')
        ->join('baixe', 'baixe.id_baixe', '=', 'hopdong.id_baixe')
        ->select(
            'hopdong.*',
            'user.name as ten_user',
            'ql.name as ten_ql',
            'phong.ten as ten_phong',
            'baixe.ms as ms_baixe'
        )->where('id_hopdong', $request->id_hopdong)->get();

        return view('hopdong/capnhat', compact('title', 'capnhathopdong', 'breadcrumbs'));
    }
    public function update(Request $request)
    {
        // dd($request);
        $user = User::where('name', $request->ten_user)->first();
        $userql= User::Where('name',$request->ten_ql)->first();
        $phong = Phong::where('ten', $request->ten_phong)->first();
        $baixe = Baixe::where('ms', $request->ms_baixe)->first();
        $suahopdong = HopDong::where('id_hopdong', $request->id_hopdong)->update([
            'id_hopdong' => $request->id_hopdong,
            'id_user' => $user->id,
            'id_ql' => $userql->id,
            'id_phong' => $phong->id_phong,
            'id_baixe' => $baixe->id_baixe,
            'ngaybatdau' => $request->ngaybatdau,
            'ngayketthuc' => $request->ngayketthuc,
        ]);
        if ($suahopdong) {
            Session::flash('success', 'Cập nhật thành công.');
            return response()->json(['status' => 'success', 'message' => 'Cập nhật thành công.']); 
        }

        return redirect()->route('hopdong')->with('success', 'Sửa không thành công, không được chỉnh sửa mã hợp đồng');
    }
    public function them()
    {
        $title = 'Hợp đồng';
        $breadcrumbs = [
            [
                'name' => 'Hợp đồng',
                'link' => './'
            ], [
                'name' => 'Thêm',
                'link' => './them'
            ]
        ];
        $hopdong = hopdong::get();
        $user =User::get();
        $baixe=BaiXe::get();
        $phong=Phong::get();
        $tang=Tang::get();
        $toa= Toa::get();
        return view('hopdong/them', compact('title', 'breadcrumbs', 'hopdong','user','toa','tang', 'phong', 'baixe'));
    }
    public function store(Request $request)
    {
        // Lấy id người dùng đang đăng nhập
         $id_ql = Auth::user()->id;
        // Tạo hợp đồng mới
            $addhopdong = new HopDong();
        
            $addhopdong->id_user = $request->user;
            $addhopdong->id_ql = $id_ql;
            $addhopdong->id_phong = $request->phong;
            $addhopdong->id_baixe = $request->baixe;
            $addhopdong->ngaybatdau = $request->input('ngaybatdau');
            $addhopdong->ngayketthuc = $request->input('ngayketthuc');
            $addhopdong->save();
            //cap nhat tinh trang phong
            Phong::where('id_phong', $request->input('phong'))->update(['tinhtrang' => 1]);
    // Hiển thị danh sách hợp đồng
    return redirect()->route('hopdong')->with('success', 'Thêm thành công');
}
public function chitiet(Request $request)
{
    $title = 'Hợp đồng';
    $breadcrumbs = [
        [
            'name' => 'Hợp đồng',
            'link' => '../'
        ], [
            'name' => 'Chi tiết',
            'link' => './' . $request->id_hopdong
        ]
    ];
    $chitiethopdong = HopDong::join('users as user', 'user.id', '=', 'hopdong.id_user')
    ->join('users as ql', 'ql.id', '=', 'hopdong.id_ql')
    ->join('phong', 'phong.id_phong', '=', 'hopdong.id_phong')
    ->join('baixe', 'baixe.id_baixe', '=', 'hopdong.id_baixe')
    ->select(
        'hopdong.*',
        'user.name as ten_user',
        'ql.name as ten_ql',
        'phong.ten as ten_phong',
        'baixe.ms as ms_baixe'
    )->where('id_hopdong', $request->id_hopdong)->get();

    return view('hopdong/chitiet', compact('title', 'chitiethopdong', 'breadcrumbs'));
}
}