<!-- Content -->
<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        @csrf
        <div class="row">
            <h5 class="text-center" id="side12">THÊM BÃI XE</h5>
        </div>
        <div class="mb-3">
            <label class="form-label">Mã số
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="ms" placeholder="Vui lòng nhập mã số">
        </div>
        <div class="mb-3">
            <label class="form-label">Loại xe
                <span id="colorIcon">*</span>
            </label>            
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="loaixe" name="loaixe">
                <option value="Xe máy">Xe máy</option>
                <option value="Ô tô">Ô tô</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tình trạng
                <span id="colorIcon">*</span>
            </label>            
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="tinhtrang" name="tinhtrang">
                <option value="0">Trống</option>
                <option value="1">Đã thuê</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Gía: VNĐ/tháng
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="gia" placeholder="Vui lòng nhập giá">
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-success col-md-5" id="side123">Thêm</button>
        </div>
    </div>
</div>