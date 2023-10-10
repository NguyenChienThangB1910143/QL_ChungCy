
<nav id="sidebar">
    <hr/>
    <ul class="list-unstyled">
        <li class="{{mb_strtolower($title)=='trang chủ'?'active':''}}">
            <a href="{{route('homecustomer')}}">Trang Chủ</a>
        </li>
        <li class="{{mb_strtolower($title)=='thông tin người dùng'?'active':''}}">
            <a href="{{route('profile')}}">Thông tin người dùng</a>
        </li>
        <li class="{{mb_strtolower($title)=='hóa đơn'?'active':''}}">
            <a href="{{route('hoadoncustomer')}}">Hóa đơn</a>
        </li>
    </ul>
</nav>