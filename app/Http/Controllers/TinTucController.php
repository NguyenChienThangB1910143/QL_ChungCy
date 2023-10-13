<?php

namespace App\Http\Controllers;

use App\Models\TinTuc;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class TinTucController extends Controller
{
    public function index()
    {
        $title = 'Tin Tức';
        $breadcrumbs = [
            [
                'name' => 'Tin Tức',
                'link' => './tintuc'
            ]
        ];
        $tintucs = TinTuc::join('users', 'tintuc.id_user', '=', 'users.id')
            ->select('tintuc.*', 'users.name as ten_user')
            ->paginate(5);

        return view('tintuc/tintuc', compact('title', 'tintucs', 'breadcrumbs'));
    }
    
    public function them()
    {
        $title = 'Tin Tức';
        $breadcrumbs = [
            [
                'name' => 'Tin Tức',
                'link' =>'./'
            ],[
                'name' => 'Thêm',
                'link' => './them'
            ]
        ];
        $tintuc=TinTuc::get();
        $user = User::get();
        return view('tintuc/them', compact('title',  'breadcrumbs', 'tintuc','user'));
    }

    public function store(Request $request)
    {
        // Lấy id người dùng đang đăng nhập
        $id_ql = Auth::user()->id;
        $addtintuc = new TinTuc();
        $addtintuc->tieude = $request->input('tieude');
        $addtintuc->id_user = $id_ql;
        $addtintuc->noidung = $request->input('noidung');
        $addtintuc->thoigian = $request ->input('thoigian');
        $addtintuc->save();

        return redirect()->route('tintuc')->with('success', 'Thêm thành công');
    }
    public function upload(Request $request)
    {
       if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }
    public function chitiet(Request $request)
    {
        $title = 'Tin Tức';
        $breadcrumbs = [
            [
                'name' => 'Tin Tức',
                'link' => '../'
            ], [
                'name' => 'Chi tiết',
                'link' => './' . $request->id
            ]
        ];
        $chitiettintuc =  TinTuc::where('id', $request->id)->get();

        return view('tintuc/chitiet', compact('title', 'chitiettintuc', 'breadcrumbs'));
    }
    public function chinhsua(Request $request)
    {
        $title = 'Tin Tức';
        $breadcrumbs = [
            [
                'name' => 'Tin Tức',
                'link' =>'../'
            ],[
                'name' => 'Chỉnh sửa',
                'link' => './' . $request->id
            ]
        ];
        $suatintuc=TinTuc::where('id', $request->id)->get();
        $user = User::get();
        return view('tintuc/chinhsua', compact('title',  'breadcrumbs', 'suatintuc','user'));
    }
    public function update(Request $request){
        $id_ql = Auth::user()->id;
        $suatintuc = TinTuc::where('id', $request->id)->update([
            'id' => $request->id,
            'tieude' => $request->tieude,
            'thoigian' => $request->thoigian,
            'id_user' => $id_ql,
            'noidung' => $request->noidung,

        ]);
        if ($suatintuc) {
            Session::flash('success', 'Cập nhật thành công.');
            return response()->json(['status' => 'success', 'message' => 'Cập nhật thành công.']); 
        }

        return redirect()->route('tintuc')->with('success', 'Sửa không thành công, không được chỉnh sửa mã trạm');
    }
    public function xoa(Request $request)
    {
        $deletetintuc = TinTuc::where('id', $request->id)->first();

        $deletetintuc->where('id', $request->id)->delete();

        return redirect()->route('tintuc')->with('success', 'Xóa thành công');
    }
    public function tintuccustomer()
    {
        $title = 'Tin Tức';
        $breadcrumbs = [
            [
                'name' => 'Tin Tức',
                'link' => './tintuc'
            ]
        ];
        $tintucs = TinTuc::join('users', 'tintuc.id_user', '=', 'users.id')
            ->select('tintuc.*', 'users.name as ten_user')
            ->paginate(5);

        return view('customer/tintuc/tintuc', compact('title', 'tintucs', 'breadcrumbs'));
    }
    public function chitietcustomer(Request $request)
    {
        $title = 'Tin Tức';
        $breadcrumbs = [
            [
                'name' => 'Tin Tức',
                'link' => '../'
            ], [
                'name' => 'Chi tiết',
                'link' => './' . $request->id
            ]
        ];
        $chitiettintuc =  TinTuc::where('id', $request->id)->get();

        return view('customer/tintuc/chitiet', compact('title', 'chitiettintuc', 'breadcrumbs'));
    }
}
