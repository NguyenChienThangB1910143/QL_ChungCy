<header>
    <div class="main-logo col" style=" display: flex; align-items: center; justify-content: space-between;">
        <a href="{{route('home')}}">
            <img src="{{ asset('img/logo.png') }}" alt="main_banner" style="width:100px; height:100px;">
        </a>
        <div  style="flex-grow: 1; text-align: center;">
            <div class="title-logo">HỆ THỐNG QUẢN LÝ CHUNG CƯ</div>
        </div>
        @if(Auth::check())
        <a href="{{route('logout')}}">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-sign-out-alt"></i>
                    Đăng xuất
                </span>
            </div>
        </a>
        @endif
    </div>
</header>
