
<header>
    <div class=" header">
            <a href="{{route('homecustomer')}}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
            </a>
        <h1 class="title">Chung Cư TL</h1>
            
            
            <div class="user-info">
                <span style="color:white">{{(auth()->user()!=null)?auth()->user()->name:''}}</span>
                <a href="{{route('logout')}}">
                    <button class="logout-button"><i class="fas fa-sign-out-alt"></i>
                        Đăng xuất</button>
                </a>
            </div>
    </div>
</header>
