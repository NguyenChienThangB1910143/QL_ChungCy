
<nav id="sidebar" class="show-window hide-mobile" >
    <hr/>
    <ul class="list-unstyled">
        <li class="{{mb_strtolower($title)=='trang chủ'?'active':''}}">
            <a href="{{route('homecustomer')}}">Trang Chủ</a>
        </li>
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