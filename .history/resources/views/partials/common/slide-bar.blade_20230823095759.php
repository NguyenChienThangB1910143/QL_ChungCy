
<nav id="sidebar" class="show-window hide-mobile" >
    <hr/>
    <ul class="list-unstyled">
        <li class="{{mb_strtolower($title)=='trang chủ'?'active':''}}">
            <a href="{{route('home')}}">Trang Chủ</a>
        </li>
        <li class="{{mb_strtolower($title)=='tòa'?'active':''}}">
            <a href="{{route('toa')}}">Tòa</a>
        </li>
        <li class="{{mb_strtolower($title)=='Tầng'?'active':''}}">
            <a href="{{route('tang')}}">Tầng</a>
        </li>

        <li class="{{(mb_strtolower($title)=='Phòng')?'active':''}}">
            <a href="{{route('phong')}}">Phòng</a>
        </li>
        <li class="{{(mb_strtolower($title)=='Bãi xe')?'active':''}}">
            <a href="{{route('baixe')}}">Bãi Xe</a>
        </li>
        <li class="{{mb_strtolower($title)=='hợp đồng'?'active':''}}">
            <a href="{{route('hopdong')}}">Hợp đồng</a>
        </li>
        <li class="{{mb_strtolower($title)=='tài khoản'?'active':''}}">
            <a href="{{route('taikhoan')}}">Tài khoản</a>
        </li>
        <li class="{{mb_strtolower($title)=='thống kê'?'active':''}}">
            <a href="{{route('thongke')}}">Thống kê</a>
        </li>
        @if(Auth::check())
            <div class="col-auto justify-content-end align-items-end desktop-only user-header" id="logoutButtonDesktop">
                <div class="input-group" style="align-items: center;">
                    <img src="{{url((auth()->user()!=null)?auth()->user()->avatar:'')}}" alt="" width="32" height="32" class="rounded-circle">
                    <span class="p-2" style="color:white">{{(auth()->user()!=null)?auth()->user()->name:''}}</span>
                    <a href="{{route('logout')}}">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                        </div>
                    </a>
                </div>

            </div>
            @endif
    </ul>
</nav>

<script>
    window.addEventListener('resize', () => {
        const logoutButtonMobile = document.getElementById('logoutButtonMobile');

        // Kiểm tra kích thước màn hình khi trang được tải
        const isMobile = window.matchMedia('(min-width: 768px)').matches;

        // Ẩn nút đăng xuất nếu là giao diện desktop
        if (isMobile) {
            logoutButtonMobile.style.display = 'none';
        }
    });
</script>