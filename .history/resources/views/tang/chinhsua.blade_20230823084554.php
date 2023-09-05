@csrf
<!-- Content -->
<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        @foreach($suatang as $sua)
            <div class="row justify-content-center">
                <h5 class="text-center" id="side12">CHỈNH SỬA TẦNG</h5>
            </div>
            <input required value="{{$sua->id_tang}}" name="id_tang" id="id_tang" class="form-control" type="hidden">

            <div class="mb-3">
                <label class="form-label">Mã Tầng</label>
                <input style="cursor: not-allowed;" name="id_tang" class="form-control" value="{{$sua->id_tang}}"></input>
            </div>
            <div class="mb-3 text-left">
                <label class="form-label">Tên tầng
                    <span id="colorIcon">*</span>
                </label>
                <input required value="{{$sua->ten}}" name="ten" class="form-control" type="text" placeholder="Vui lòng nhập tên tầng">
            </div>
            <div class="mb-3 option-toa">
            <label class="form-label">Tòa
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="toa" name="toa">
                @foreach($toa as $toa)
                <option value="{{$toa->id_toa}}">{{$tang->ten}}</option>
                @endforeach
            </select>
        </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success col-md-5" id="side123">Chỉnh sửa</button>
            </div>
        @endforeach
    </div>
</div>