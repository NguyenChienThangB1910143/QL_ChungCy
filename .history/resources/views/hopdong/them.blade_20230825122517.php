<!-- Content -->
@csrf

<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        <div class="row justify-content-center">
            <h5 class="text-center" id="side12">THÊM HỢP ĐỒNG</h5>
        </div>
        <div class="mb-3 option-user">
            <label class="form-label">Tên Khách Hàng
                <span id="colorIcon">*</span>
            </label>
            <div class="mb-3 option-user">
    <label class="form-label">Nhập ID hoặc Tên Khách Hàng</label>
    <input type="text" class="form-control" id="search" placeholder="Nhập ID hoặc Tên" list="userList">
    <datalist id="userList"></datalist>
</div>
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
<script>
    // Lắng nghe sự kiện thay đổi giá trị của trường loaixe
    document.getElementById('loaixe').addEventListener('change', function() {
        // Lấy giá trị của trường loaixe
        var loaixe = this.value;

        // Lấy danh sách các option trong trường baixe
        var options = document.querySelectorAll('#baixe option');

        // Lấy phần tử input và datalist
    const searchInput = document.querySelector('#search');
    const userList = document.querySelector('#userList');

    // Lắng nghe sự kiện 'input' trên phần tử input
    searchInput.addEventListener('input', function() {
        // Lấy giá trị của phần tử input
        const searchValue = searchInput.value.trim().toLowerCase();

        // Lọc danh sách người dùng dựa trên giá trị tìm kiếm
        const filteredUsers = users.filter(function(user) {
            return user.id.toString().includes(searchValue) || user.name.toLowerCase().includes(searchValue);
        });

        // Cập nhật danh sách tùy chọn trong phần tử datalist
        userList.innerHTML = '';
        for (const user of filteredUsers) {
            const option = document.createElement('option');
            option.value = `${user.id} - ${user.name}`;
            userList.appendChild(option);
        }
    });
</script>