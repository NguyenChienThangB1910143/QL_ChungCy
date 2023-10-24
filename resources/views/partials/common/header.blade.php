<header>
    <div class="main-logo col" style=" display: flex; align-items: center; justify-content: space-between;">
        <a href="{{route('home')}}">
            <img src="{{ asset('img/logo.png') }}" alt="main_banner" style="width:100px; height:100px;">
        </a>
        <div  style="flex-grow: 1; text-align: center;">
            <div class="title-logo">Hệ thống quản lý chung cư</div>
        </div>
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