<!-- Content -->
@csrf

<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        <div class="row justify-content-center">
            <h5 class="text-center" id="side12">THÊM HỢP ĐỒNG</h5>
        </div>
        <div class="mb-3 option-user">
            <label class="form-label">Tên Khách Hàng
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="user" name="user">
                @foreach($user as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 option-ql">
            <label class="form-label">Tên Quản Lý
                <span id="colorIcon">*</span>
            </label>
            <input disabled required class="form-control" type="text" name="ten_ql" value="{{Auth::user()->name}}">
        </div>
        <div class="mb-3 option-phong">
            <label class="form-label">Phòng
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="phong" name="phong">
                @foreach($phong as $phong)
                <option value="{{$phong->id}}">{{$phong->ten}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 option-baixe">
            <label class="form-label">Bãi Xe
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="baixe" name="baixe">
                @foreach($baixe as $baixe)
                <option value="{{$baixe->id}}">{{$baixe->ms}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 option-ngaybatdau">
            <label class="form-label">Ngày Bắt Đầu
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="date" name="ngaybatdau">
        </div>
        <div class="mb-3 option-ngayketthuc">
            <label class="form-label">Ngày Kết Thúc
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="date" name="ngayketthuc">
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-success col-md-5" id="">Thêm</button>
        </div>
    </div>
</div>
