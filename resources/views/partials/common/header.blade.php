<header>
    <div class="main-logo col" style="height:75px">
        <a href="{{route('home')}}" class="col-12">
            <img src="" alt="main_banner">
        </a>
        <div class="row" style="width:100% ;margin-left :0px;">
            <div class="title-logo">Hệ thống quản lý chung cư</div>

        </div>

        <!-- top-banner.jpg -->
    </div>

</header>

<script>
    window.addEventListener('resize', () => {
        const logoutButtonDesktop = document.getElementById('logoutButtonDesktop');

        // Kiểm tra kích thước màn hình khi trang được tải
        const isDesktop = window.matchMedia('(max-width: 767px)').matches;

        // Ẩn nút đăng xuất nếu là giao diện di động
        if (isDesktop) {
            logoutButtonDesktop.style.display = 'none';
        }
    });
</script>