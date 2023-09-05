<!-- Content -->
@csrf

<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        <div class="row justify-content-center">
            <h5 class="text-center" id="side12">THÊM PHÒNG</h5>
        </div>
        <div class="mb-3 option-toa">
            <label class="form-label">Tòa
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="toa" name="toa">
                @foreach($toa as $toa)
                <option value="{{$toa->id_toa}}">{{$toa->ten}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 option-tang">
            <label class="form-label">Tầng
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="tang" name="tang">
                @foreach($tang as $tang)
                <option value="{{$tang->id_tang}}">{{$tang->ten}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tên phòng
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="ten" placeholder="Vui lòng nhập tên phòng">
        </div>
        <div class="mb-3">
            <label class="form-label">Tình trạng
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="tt" name="tt">
                <option value="0">Còn trống</option>
                <option value="1">Đầy</option>
            </select>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-success col-md-5" id="side123">Thêm</button>
        </div>
    </div>
</div>