<?php

namespace App\Http\Controllers;
use App\Models\BaoCaoSC;
use Illuminate\Http\Request;
use Auth;
use App\Models\HopDong;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\PhanHoi;
class BaoCaoSCController extends Controller
{
    public function index(){
        $title = 'Báo cáo sự cố';
        $breadcrumbs = [
            [
                'name' => 'Báo cáo sự cố',
                'link' => './baocaosc'
            ]
        ];
        // Lấy người dùng hiện tại đã xác thực
        $user = Auth::user();
        $baocaosc = $user->baocaoscs()->get();
        $hopdong = HopDong::where('id_user', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();
        return view('customer/baocaosc/baocaosc', compact('title', 'baocaosc','hopdong', 'breadcrumbs'));
    }
    public function them(){
        $title = 'Báo cáo sự cố';
        $breadcrumbs = [
            [
                'name' => 'Báo cáo sự cố',
                'link' => './'
            ], [
                'name' => 'Thêm',
                'link' => './them'
            ]
        ];
        $baocao=BaoCaoSC::get();

        return view('customer/baocaosc/them', compact('title', 'breadcrumbs','baocao'));
    }
    public function store(Request $request){
        $user = Auth::user();
        $hopdong = HopDong::where('id_user', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();
        $baocaosc = new BaoCaoSC();
        $baocaosc->id_user = $user->id;
        $baocaosc->id_phong = $hopdong->id_phong;
    
        // tieude được người dùng nhập vào
        $baocaosc->tieude = $request->tieude;
    
        // noidung được người dùng nhập vào
        $baocaosc->noidung = $request->noidung;
    
        // Kiểm tra xem yêu cầu có chứa hình không
        if ($request->hasFile('hinh')) {
            // Lấy tệp từ yêu cầu
            $file = $request->file('hinh');
    
            // Tạo một tên duy nhất cho tệp
            $filename = time() . '.' . $file->getClientOriginalExtension();
    
            // Di chuyển tệp đã tải lên vào thư mục public / img
            $file->move(public_path('upload'), $filename);
    
            // Lưu đường dẫn của hình vào cơ sở dữ liệu
            $baocaosc->hinh = 'upload/' . $filename;
        }
    
        // thoigian lúc người dùng them báo cáo
        $baocaosc->thoigian = now();
        $baocaosc->save();
        return redirect()->route('baocaosc')->with('success', 'Gửi thành công');
    }
    
    public function phanhoi(Request $request)
    {
        $title = 'Tin Tức';
        $breadcrumbs = [
            [
                'name' => 'Tin Tức',
                'link' => '../'
            ], [
                'name' => 'Chi tiết',
                'link' => './' . $request->id_baocao
            ]
        ];
        $phanhoibc =  PhanHoi::where('id_baocao', $request->id_baocao)->get();

        return view('customer/baocaosc/phanhoi', compact('title', 'phanhoibc', 'breadcrumbs'));
    }
}
