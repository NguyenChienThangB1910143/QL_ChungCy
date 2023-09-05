@csrf
<!-- Content -->
<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        @foreach($suabaixe as $sua)
            <div class="row justify-content-center">
                <h5 class="text-center" id="side12">CHỈNH SỬA BÃI XE</h5>
            </div>
            <input required value="{{$sua->id_baixe}}" name="id_baixe" id="id_baixe" class="form-control" type="hidden">

            <div class="mb-3">
                <label class="form-label">id</label>
                <input style="cursor: not-allowed;" name="id_baixe" class="form-control" value="{{$sua->id_baixe}}"></input>
            </div>
            <div class="mb-3 text-left">
                <label class="form-label">Mã số
                    <span id="colorIcon">*</span>
                </label>
                <input required value="{{$sua->ms}}" name="ms" class="form-control" type="text" placeholder="Vui lòng nhập mã số">
            </div>
            <div class="mb-3 text-left">
                <label class="form-label">Tình trạng</label>
                <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="tinhtrang" name="tinhtrang">
                    <option value="1">Hoạt dộng</option>
                    <option value="0">Ngưng hoạt dộng</option>
                </select>
            </div>
            <div class="mb-3 text-left">
                <label class="form-label">Gía: VND/tháng
                    <span id="colorIcon">*</span>
                </label>
                <input required value="{{$sua->gia}}" name="gia" class="form-control" type="text" placeholder="Vui lòng nhập giá">
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success col-md-5" id="side123">Chỉnh sửa</button>
            </div>
        @endforeach
    </div>
</div>