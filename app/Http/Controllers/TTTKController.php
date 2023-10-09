<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\HopDong;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class TTTKController extends Controller
{
    public function index()
    {
        $title = 'Thông tin tài khoản';
        $breadcrumbs = [
            [
                'name' => 'Thông tin tài khoản',
                'link' => './profile'
            ]
        ];
        $user = Auth::user();
        $hopdong = HopDong::where('id_user', $user->id)
            ->where('ngayketthuc', '>', Carbon::now())
            ->first();

        return view('customer/taikhoan/profile', compact('title', 'user','hopdong', 'breadcrumbs'));
    }
    public function chinhsua(Request $request)
    {
        $title = 'Thông tin tài khoản';
        $breadcrumbs = [
            [
                'name' => 'Thông tin tài khoản',
                'link' =>'./'
            ],[
                'name' => 'Chỉnh sửa',
                'link' => './chinhsua' . $request->id
            ]
        ];
        $suatk = User::where('id', $request->id)->get();
        return view('customer/taikhoan/chinhsua', compact('title', 'breadcrumbs','suatk'));
    }
    public function update(Request $request){
        $suatk = User::where('id', $request->id)->update([
            'id' => $request->id,
            'name' => $request->name,
            'ngaysinh' => $request->ngaysinh,
            'email' => $request->email,
            'STK' => $request->STK,

        ]);
        if ($suatk) {
            Session::flash('success', 'Cập nhật thành công.');
            return response()->json(['status' => 'success', 'message' => 'Cập nhật thành công.']); 
        }

        return redirect()->route('profile')->with('success', 'Sửa không thành công, không được chỉnh sửa mã người dùng');
    }
}
