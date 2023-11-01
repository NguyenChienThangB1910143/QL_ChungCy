<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaoCaoSC;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\PhanHoi;
use Session;
use Carbon\Carbon;
class PhanHoiController extends Controller
{
        public function index(){
            $title = 'Báo cáo sự cố';
            $breadcrumbs = [
                [
                    'name' => 'Báo cáo sự cố',
                    'link' => './baocaosc'
                ]
            ];
            $bcsc = BaoCaoSC::join('users', 'baocaosc.id_user', '=', 'users.id')
        ->select('baocaosc.*', 'users.name')
        ->get();
            return view('/phanhoi/phanhoi', compact('title', 'bcsc', 'breadcrumbs'));
    }
    public function them($id_baocao){
        return view('phanhoi.them', ['id_baocao' => $id_baocao]);
    }
    

    public function store(Request $request){
        $user= Auth::user();
        $phanhoi = new PhanHoi();
        $phanhoi->id_user = $user->id;
        $phanhoi->id_baocao = $request->input('id_baocao');
        $phanhoi->tieude = $request->input('tieude');
        $phanhoi->noidung = $request->input('noidung');
        $phanhoi->thoigian = now();
        $phanhoi->save();
        
        return redirect()->route('phanhoi')->with('success', 'Phản hồi đã được gửi!');
    }
    
    
}
