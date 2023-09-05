@csrf
<!-- Content -->
<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        @foreach($suatoa as $sua)
            <div class="row justify-content-center">
                <h5 class="text-center" id="side12">CHỈNH SỬA TÒA</h5>
            </div>
            <input required value="{{$sua->id_toa}}" name="id_toa" id="id_toa" class="form-control" type="hidden">

            <div class="mb-3">
                <label class="form-label">Mã Tòa</label>
                <input style="cursor: not-allowed;" name="id_toa" class="form-control" value="{{$sua->id_toa}}"></input>
            </div>
            <div class="mb-3 text-left">
                <label class="form-label">Tên tòa
                    <span id="colorIcon">*</span>
                </label>
                <input required value="{{$sua->ten}}" name="ten" class="form-control" type="text" placeholder="Vui lòng nhập tên tòa">
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success col-md-5" id="side123">Chỉnh sửa</button>
            </div>
        @endforeach
    </div>
</div>