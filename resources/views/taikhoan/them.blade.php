@csrf
<!-- Content -->
<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        <div class="mb-3 text-left">
            <label class="form-label">Tên người dùng
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="name" placeholder="Vui lòng nhập tên người dùng">
        </div>
        <div class="mb-3 text-left">
            <label class="form-label">Ngày sinh:
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="date" name="ngaysinh" placeholder="Vui lòng nhập ngày sinh">
        </div>
        <div class="mb-3">
            <label class="form-label">Email
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="email" name="email" placeholder="Vui lòng nhập email">
        </div>
        <div class="mb-3">
            <label class="form-label">SĐT:
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="sdt" placeholder="Vui lòng nhập số điện thoại">
        </div>
        <div class="mb-3">
            <label class="form-label">Mật khẩu
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="password" name="password" placeholder="Vui lòng nhập mật khẩu">
        </div>
        <div class="mb-3">
            <label class="form-label">Quyền:
                <span id="colorIcon">*</span>
            </label>
            <select required class="form-control" aria-label="Default select example" name="quyen">
                <option value="1">Quản lý</option>
                <option value="2">Khách hàng</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Số TK
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="STK" placeholder="Vui lòng nhập số tài khoản">
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái
                <span id="colorIcon">*</span>
            </label>
            <select required class="form-control" aria-label="Default select example" name="trangthai">
                <option value="1">Hoạt động</option>
                <option value="0">Không hoạt động</option>
            </select>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-success col-md-5" id="side123">Thêm</button>
        </div>
    </div>
</div>