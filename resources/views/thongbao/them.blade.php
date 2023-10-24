<!-- Content -->
@csrf

<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        <div class="row justify-content-center">
            <h5 class="text-center" id="side12">THÊM THÔNG BÁO</h5>
        </div>
        <!-- Nhân viên tạo hợp đồng -->
        <div class="mb-3 option-ql">
            <label class="form-label">Tên Quản Lý
                <span id="colorIcon">*</span>
            </label>
            <input disabled required class="form-control" type="text" name="ten_ql" value="{{Auth::user()->name}}">
        </div>
        <div class="mb-3 option-tieude">
            <label class="form-label">Tiêu đề
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" name="tieude" id="tieude">
        </div>
        <div class="mb-3 option-noidung">
            <label class="form-label">Nội dung
                <span id="colorIcon">*</span>
            </label>
            <textarea required class="form-control" name="noidung" id="noidung">
            </textarea>
        </div>
        <div class="mb-3 option-nhan">
            <label class="form-label">Người nhận
                <span id="colorIcon">*</span>
            </label>
            <div>
                <input type="radio" id="all" name="nhan" value="0">
                <label for="all">Tất cả</label>
            </div>
            <div>
                <input type="radio" id="individual" name="nhan">
                <label for="individual">Cá nhân</label>
                <!-- Danh sách lựa chọn các phòng -->
                <select name="tbphong" id="tbphong" style="display: none;">
                    @foreach ($tbphong as $phongs)
                        <option value="{{ $phongs->id_phong }}">{{ $phongs->ten }}</option>
                    @endforeach
                </select>
            </div>
        </div>
                
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-success col-md-5" id="">Thêm</button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
    // Cập nhật giá trị của radio button "Cá nhân" khi người dùng chọn một phòng
    $('#tbphong').change(function() {
        $('#individual').val($(this).val());
    });

    $('input[type=radio][name=nhan]').change(function() {
        if (this.value == '0') {
            // Ẩn danh sách lựa chọn các phòng khi người dùng chọn "Tất cả"
            $('#tbphong').hide();
        } else {
            // Hiển thị danh sách lựa chọn các phòng khi người dùng chọn "Cá nhân"
            $('#tbphong').show();
            // Đặt giá trị mặc định cho radio button "Cá nhân"
            if ($('#tbphong').val()) {
                $('#individual').val($('#tbphong').val());
            } else {
                $('#individual').val('default_value');
            }
        }
    });
});

    </script>
    