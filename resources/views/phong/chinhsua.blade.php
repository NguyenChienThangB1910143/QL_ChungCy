@csrf

<!-- Content -->
<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        @foreach($suaphong as $sua)
            <div class="row justify-content-center">
                <h5 class="text-center" id="side12">CHỈNH SỬA PHÒNG</h5>
            </div>
            <input required value="{{$sua->id_phong}}" name="id_phong" id="id_phong" class="form-control" type="hidden">

            <div class="mb-3">
                <label class="form-label">Mã Phòng</label>
                <input style="cursor: not-allowed;" name="id_phong" class="form-control" value="{{$sua->id_phong}}">
            </div>
            <div class="mb-3 text-left">
                <label class="form-label">Tên phòng
                    <span id="colorIcon">*</span>
                </label>
                <input required value="{{$sua->ten}}" name="ten" class="form-control" type="text" placeholder="Vui lòng nhập tên phòng ">
            </div>
            <div class="mb-3 text-left">
                <label class="form-label">Tình trạng</label>
                <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="tinhtrang" name="tinhtrang">
                    <option value="1">Hoạt dộng</option>
                    <option value="0">Ngưng hoạt dộng</option>
                </select>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success col-md-5" id="side123">Chỉnh sửa</button>
            </div>
        @endforeach
    </div>
</div>