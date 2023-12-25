<nav style="display: flex; justify-content: space-between;">
    <div>
        <a href="{{route('homecustomer')}}">Trang chủ</a> |
        <a href="{{route('profile')}}">Thông tin cá nhân</a> |
        <a href="{{route('hoadoncustomer')}}">Hóa đơn</a> |
        <a href="{{route('baocaosc')}}">Báo cáo sự cố</a> |
        <a href="{{route('tintuccustomer')}}">Tin tức</a> |
        <a href="{{route('hopdongCT')}}">Hợp đồng</a>
    </div>
    @php
    $userId = auth()->id(); // Get the id of the currently logged-in user
    $thoiGianKiemTra = \Carbon\Carbon::now()->subDay(); // Change according to your needs

    $coThongBaoMoi = \App\Models\ThongBao::where('created_at', '>', $thoiGianKiemTra)
        ->where(function ($query) use ($userId) {
            $query->where('nhan', 0)
                ->orWhere('nhan', $userId);
        })
        ->exists();
@endphp

<div>
    <a href="{{route('thongbaoCT')}}">
        Thông báo 
        <i class="fas fa-bell" style="{{ $coThongBaoMoi ? 'color: red;' : '' }}"></i> <!-- Notification icon -->
    </a>
</div>


</nav>
