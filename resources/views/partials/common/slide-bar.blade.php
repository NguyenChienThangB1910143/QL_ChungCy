
<nav id="sidebar">
    <ul class="list-unstyled">
        <li class="pt-3" style="text-align: center;">
                    <span style="color:white"> {{(auth()->user()!=null)?auth()->user()->name:''}}</span>
        </li>
    </ul>
    <ul class="list-unstyled">
        <li class="{{mb_strtolower($title)=='trang chủ'?'active':''}}">
            <a href="{{route('home')}}">Trang chủ</a>
        </li>
        <li class="{{mb_strtolower($title)=='Chung cư'?'active':''}}">
            <a href="#"  data-toggle="dropdown">Chung cư</a>
                <ul class="dropdown-menu">
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
                </ul>
        </li>
        <li class="{{mb_strtolower($title)=='hợp đồng'?'active':''}}">
            <a href="{{route('hopdong')}}">Hợp đồng</a>
        </li>
        <li class="{{mb_strtolower($title)=='tài khoản'?'active':''}}">
            <a href="{{route('taikhoan')}}">Tài khoản</a>
        </li>
        <li class="{{mb_strtolower($title)=='tin tức'?'active':''}}">
            <a href="{{route('tintuc')}}">Tin tức</a>
        </li>
        <li class="{{mb_strtolower($title)=='thông báo'?'active':''}}">
            <a href="{{route('thongbao')}}">Thông báo</a>
        </li>
        <li class="{{mb_strtolower($title)=='điện nước'?'active':''}}">
            <a href="#" data-toggle="dropdown">Điện nước</a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('dien')}}">Điện</a></li>
                    <li><a href="{{route('nuoc')}}">Nước</a></li>
                </ul>
        </li>
        <li class="{{mb_strtolower($title)=='hóa đơn'?'active':''}}">
            <a href="{{route('hoadon')}}">Hóa đơn</a>
        </li>
        <li class="{{mb_strtolower($title)=='Báo cáo sự cố'?'active':''}}">
            <a href="{{route('phanhoi')}}">Báo cáo sự cố</a>
        </li>

    </ul>
</nav>
