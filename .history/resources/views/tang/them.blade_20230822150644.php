<!-- Content -->
<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        @csrf
        <div class="row">
            <h5 class="text-center" id="side12">THÊM TẦNG</h5>
        </div>
        <div class="mb-3 text-left">
            <label class="form-label">Mã Tầng
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="id_tang" placeholder="Vui lòng nhập mã tầng">
        </div>
        <div class="mb-3">
            <label class="form-label">Tên Tầng
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="ten" placeholder="Vui lòng nhập tên tầng">
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-success col-md-5" id="side123">Thêm</button>
        </div>
    </div>
</div>