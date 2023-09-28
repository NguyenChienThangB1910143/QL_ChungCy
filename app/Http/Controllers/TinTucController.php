<?php

namespace App\Http\Controllers;

use App\Models\TinTuc;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        $chitiettintuc =  TinTuc::join('users', 'tintuc.id_user', '=', 'users.id')
        ->select('tintuc.*', 
                'users.name as ten_user'
                )->where('id', $request->id)->get();

        return view('tintuc/chitiet', compact('title', 'chitiettintuc', 'breadcrumbs'));
    }
}
