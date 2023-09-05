<!-- Content -->
@csrf

<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        <div class="row justify-content-center">
            <h5 class="text-center" id="side12">THÊM HỢP ĐỒNG</h5>
        </div>
        <div class="mb-3 option-tang">
            <label class="form-label">Tên Khách
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="user" name="user">
                @foreach($user as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        @php
            $ten_user = Auth::user()->name;
        @endphp
        <div class="mb-3">
            <label class="form-label">Tên Quản Lý</label>
                <input style="cursor: not-allowed;" name="" class="form-control" value="{{$ten_user}}"></input>
        </div>
        <div class="mb-3 option-tang">
            <label class="form-label">Phòng
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="phong" name="phong">
                @foreach($phong as $phong)
                <option value="{{$phong->id}}">{{$phong->ten}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 option-tang">
            <label class="form-label">Bãi xe
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="baixe" name="baixe">
                @foreach($baixe as $baixe)
                <option value="{{$baixe->id}}">{{$baixe->ms}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 text-left">
                <label class="form-label">Ngày ký
                    <span id="colorIcon">*</span>
                </label>
                <input style="cursor: pointer;" required value="{{$hopdong->ngaybatdau}}" name="ngaybatdau" class="form-control" type="date">
            </div>
            <div class="mb-3 text-left">
                <label class="form-label">Ngày hết hạn
                    <span id="colorIcon">*</span>
                </label>
                <input style="cursor: pointer;" required value="{{$hopdong->ngayketthuc}}" name="ngayketthuc" class="form-control" type="date">
            </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-success col-md-5" id="side123">Thêm</button>
        </div>
    </div>
</div>