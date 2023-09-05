<!-- Content -->
@csrf

<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        <div class="row justify-content-center">
            <h5 class="text-center" id="side12">THÊM HỢP ĐỒNG</h5>
        </div>
        <!-- Khách hàng -->
        <div class="mb-3 option-user">
                <label class="form-label">Nhập id Khách Hàng</label>
                <input type="text" class="form-control" id="search" placeholder="Nhập id" list="userList" name="user">
                    <datalist id="userList">
                        @foreach($user as $user)
                        <option value="{{$user->id}}">{{ $user->name }}</option>
                        @endforeach
                    </datalist>
                </input>
        </div>
        <div class="mb-3">
            <label class="form-label">Tên Khách Hàng</label>
                <input type="text" class="form-control" id="userName" placeholder="Tên Khách Hàng" disabled>
        </div>
        <!-- Nhân viên tạo hợp đồng -->
        <div class="mb-3 option-ql">
            <label class="form-label">Tên Quản Lý
                <span id="colorIcon">*</span>
            </label>
            <input disabled required class="form-control" type="text" name="ten_ql" value="{{Auth::user()->name}}">
        </div>
        <!-- Chọn Tòa -->
        <div class="mb-3 option-toa">
            <label class="form-label">Tòa
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="toa" name="toa">
                <option value="">Chọn Tòa</option>
                @foreach($toa as $toa)
                <option value="{{$toa->id_toa}}">{{$toa->ten}}</option>
                @endforeach
            </select>
        </div>
        <!-- Chọn Tầng -->
        <div class="mb-3 option-tang">
            <label class="form-label">Tầng
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="tang" name="tang">
                <option value="">Chọn Tầng</option>
                @foreach($tang as $tang)
                <option value="{{$tang->id_tang}}" data-id-toa="{{$tang->id_toa}}">{{$tang->ten}}</option>
                @endforeach
            </select>
        </div>
        <!-- Chọn Phòng -->
        <div class="mb-3 option-phong">
            <label class="form-label">Phòng
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="phong" name="phong">
            <option value="">Chọn phòng</option>
                @foreach($phong as $phong)
                    @if($phong->tinhtrang == 0)
                    <option value="{{$phong->id_phong}}" data-id-tang="{{$phong->id_tang}}">{{$phong->ten}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <!-- Bãi xe -->
        <div class="mb-3 option-loaixe">
            <label class="form-label">Loại Xe
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="loaixe" name="loaixe">
                <option value="">Chọn phòng</option>
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
                @if($baixe->tinhtrang == 0)
                    <option value="{{$baixe->id_baixe}}" data-loaixe="{{$baixe->loaixe}}">{{$baixe->ms}}</option>
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
    //id khách hàng

    // Lấy phần tử input và datalist
    const searchInput = document.querySelector('#search');
    const userList = document.querySelector('#userList');

    // Lắng nghe sự kiện 'input' trên phần tử input
    searchInput.addEventListener('input', function() {
        // Lấy giá trị của phần tử input
        const searchValue = searchInput.value.trim().toLowerCase();

        // Lọc danh sách người dùng dựa trên giá trị tìm kiếm
        const filteredUsers = users.filter(function(user) {
            return user.name.toLowerCase().includes(searchValue);
        });

        // Cập nhật danh sách tùy chọn trong phần tử datalist
        userList.innerHTML = '';
        for (const user of filteredUsers) {
            const option = document.createElement('option');
            option.value = user.name;
            userList.appendChild(option);
        }
    });
    //hiển thị tên khách hàng
    document.querySelector('#search').addEventListener('change', function() {
        let userId = this.value;
        let userName = document.querySelector(`#userList option[value="${userId}"]`).textContent;
        document.querySelector('#userName').value = userName;
    });
    //Chọn tầng
    document.getElementById('tang').addEventListener('change', function() {
        var selectedTang = this.value;
        var phongOptions = document.querySelectorAll('#phong option');
        phongOptions.forEach(function(option) {
            if (option.getAttribute('data-id-tang') == selectedTang) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });
    });
    //Chọn tòa
    document.getElementById('toa').addEventListener('change', function() {
        var selectedToa = this.value;
        var toaOptions = document.querySelectorAll('#tang option');
        toaOptions.forEach(function(option) {
            if (option.getAttribute('data-id-toa') == selectedToa) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });
    });
    document.getElementById('loaixe').addEventListener('change', function() {
    var selectedLoaiXe = this.value;
    var baixeOptions = document.querySelectorAll('#baixe option');
    baixeOptions.forEach(function(option) {
        if (option.getAttribute('data-loaixe') == selectedLoaiXe) {
            option.style.display = 'block';
        } else {
            option.style.display = 'none';
        }
    });
});
</script>