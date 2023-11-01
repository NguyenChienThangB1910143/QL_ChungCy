<nav style="display: flex; justify-content: space-between;">
    <div>
        <a href="{{route('homecustomer')}}">Trang chủ</a> |
        <a href="{{route('profile')}}">Thông tin TK</a> |
        <a href="{{route('hoadoncustomer')}}">Hóa đơn</a> |
        <a href="{{route('baocaosc')}}">Báo cáo sự cố</a> |
        <a href="{{route('tintuccustomer')}}">Tin Tức</a>
    </div>
    @php
        $thoiGianKiemTra = \Carbon\Carbon::now()->subDay(); // Thay đổi theo nhu cầu của bạn
        $coThongBaoMoi =\App\Models\ThongBao::where('created_at', '>', $thoiGianKiemTra)->exists();
    @endphp

    <div>
        <a href="{{route('thongbaoCT')}}">
            Thông báo 
            <i class="fas fa-bell" style="{{ $coThongBaoMoi ? 'color: red;' : '' }}"></i> <!-- Biểu tượng thông báo -->
        </a>
    </div>

</nav>
