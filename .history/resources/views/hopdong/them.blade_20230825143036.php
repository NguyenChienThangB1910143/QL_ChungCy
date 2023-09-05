<!-- Content -->
@csrf

<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        <div class="row justify-content-center">
            <h5 class="text-center" id="side12">THÊM HỢP ĐỒNG</h5>
        </div>

        <div class="mb-3 option-user">
    <label class="form-label">Nhập id Khách Hàng</label>
    <input type="text" class="form-control" id="search" placeholder="Nhập id" list="userList" name="user">
    <datalist id="userList">
        @foreach($user as $user)
        <option value="{{$user->id}}">{{ $user->id }}</option>
        @endforeach
    </datalist>
</input>
</div>
<div class="mb-3 option-user">
    <label class="form-label">Thông tin Khách Hàng</label>
    <span id="userInfo"></span>
</div>
        <div class="mb-3 option-ql">
            <label class="form-label">Tên Quản Lý
                <span id="colorIcon">*</span>
            </label>
            <input disabled required class="form-control" type="text" name="ten_ql" value="{{Auth::user()->name}}">
        </div>
        <div class="mb-3 option-phong">
            <label class="form-label">Phòng
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="phong" name="phong">
                @foreach($phong as $phong)
                <option value="{{$phong->id_phong}}">{{$phong->ten}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 option-loaixe">
    <label class="form-label">Loại Xe
        <span id="colorIcon">*</span>
    </label>
    <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="loaixe" name="loaixe">
        <option value="xe máy">Xe máy</option>
        <option value="ô tô">Ô tô</option>
    </select>
</div>

<div class="mb-3 option-baixe">
    <label class="form-label">Bãi Xe
        <span id="colorIcon">*</span>
    </label>
    <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="baixe" name="baixe">
        @foreach($baixe as $baixe)
            @if($baixe->loaixe == 'Xe máy')
                <option value="{{$baixe->id_baixe}}">{{$baixe->ms}}</option>
            @endif
        @endforeach
    </select>
</div>
        <div class="mb-3 option-ngaybatdau">
            <label class="form-label">Ngày Bắt Đầu
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="date" name="ngaybatdau">
        </div>
        <div class="mb-3 option-ngayketthuc">
            <label class="form-label">Ngày Kết Thúc
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="date" name="ngayketthuc">
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-success col-md-5" id="">Thêm</button>
        </div>
    </div>
</div>
<?php
// Truy xuất dữ liệu từ bảng user
$users = User::get();

// Tạo ra một mảng JavaScript tương ứng
echo '<script>';
echo 'const users = ' . json_encode($users) . ';';
echo '</script>';
?>
<script>
    // Lắng nghe sự kiện thay đổi giá trị của trường loaixe
    document.getElementById('loaixe').addEventListener('change', function() {
        // Lấy giá trị của trường loaixe
        var loaixe = this.value;

        // Lấy danh sách các option trong trường baixe
        var options = document.querySelectorAll('#baixe option');

        // Duyệt qua từng option
        options.forEach(function(option) {
            // Lấy giá trị của option
            var value = option.value;

            // Tìm bãi xe tương ứng với giá trị của option
            var baixe = @json($baixe).find(function(baixe) {
                return baixe.id_baixe == value;
            });

            // Nếu bãi xe có loại xe khớp với giá trị của trường loaixe
            if (baixe.loaixe == loaixe) {
                // Hiển thị option
                option.style.display = 'block';
            } else {
                // Ẩn option
                option.style.display = 'none';
            }
        });
    });

// Lấy phần tử input và span
const searchInput = document.querySelector('#search');
const userInfoSpan = document.querySelector('#userInfo');

// Lắng nghe sự kiện 'input' trên phần tử input
searchInput.addEventListener('input', function() {
    // Lấy giá trị của phần tử input
    const searchValue = searchInput.value.trim();

    // Tìm người dùng có id khớp với giá trị tìm kiếm
    const user = users.find(function(user) {
        return user.id.toString() === searchValue;
    });

    // Cập nhật nội dung của phần tử span
    if (user) {
        userInfoSpan.textContent = `ID: ${user.id}, Tên: ${user.name}`;
    } else {
        userInfoSpan.textContent = '';
    }
});
</script>