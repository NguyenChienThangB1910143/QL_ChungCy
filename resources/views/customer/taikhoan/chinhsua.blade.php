<!-- Content -->
@csrf

<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        <div class="row justify-content-center">
            <h5 class="text-center" id="side12">Cập nhật thông tin</h5>
        </div>

        <!-- Nhân viên tạo hợp đồng -->
            <div class="mb-3 option-ql">
                <label class="form-label">Họ Tên
                    <span id="colorIcon">*</span>
                </label>
                <input required class="form-control" type="text" name="name" value="{{Auth::user()->name}}">
            </div>
            <div class="mb-3 option-ngaysinh">
                <label class="form-label">Ngày sinh
                    <span id="colorIcon">*</span>
                </label>
                <input required class="form-control" type="date" name="ngaysinh" id="ngaysinh" value="{{Auth::user()->ngaysinh}}">
            </div>
            <div class="mb-3 option-email">
                <label class="form-label">email
                    <span id="colorIcon">*</span>
                </label>
                <input required class="form-control" name="email" id="email" value="{{Auth::user()->email}}">
            </div>
            <div class="mb-3 option-sdt">
                <label class="form-label">SĐT
                    <span id="colorIcon">*</span>
                </label>
                <input required class="form-control" type="sdt" name="sdt" value="{{Auth::user()->sdt}}">
            </div>
            <div class="mb-3 option-stk">
                <label class="form-label">STK
                    <span id="colorIcon">*</span>
                </label>
                <input required class="form-control" type="STK" name="STK" value="{{Auth::user()->STK}}">
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success col-md-5" id="">Cập nhật</button>
            </div>
        </div>
</div>
    