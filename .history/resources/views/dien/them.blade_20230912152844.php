@csrf
<!-- Content -->
<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">

        <div class="mb-3 text-left">
            <label class="form-label"> Chỉ số cũ:
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="chiso_cu">
        </div>
        <div class="mb-3">
            <label class="form-label">Chỉ số mới
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="chiso_moi" placeholder="Vui lòng nhập chỉ số điện">
        </div>
        <div class="mb-3">
            <label class="form-label">Thời gian:
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="date" name="thoigian" placeholder="Vui lòng nhập thời gian">
        </div>
        <div class="mb-3">
            <label class="form-label">Đơn giá:
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="dongia" placeholder="Vui lòng nhập đơn giá điện">
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-success col-md-5" id="side123">Thêm</button>
        </div>
    </div>
</div>