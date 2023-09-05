@csrf

<!-- Content -->
<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        @foreach($suahopdong as $sua)
            <div class="row justify-content-center">
                <h5 class="text-center" id="side12">CHỈNH SỬA HỢP ĐỒNG</h5>
            </div>
            <input required value="{{$sua->id_hopdong}}" name="id_hopdong" id="id_hopdong" class="form-control" type="hidden">

            <div class="mb-3">
                <label class="form-label">Mã HĐ</label>
                <input style="cursor: not-allowed;" name="id_hopdong" class="form-control" value="{{$sua->id_hopdong}}"></input>
            </div>
            <div class="mb-3">
                <label class="form-label">Tên Khách</label>
                <input style="cursor: not-allowed;" name="id_user" class="form-control" value="{{$sua->id_user}}"></input>
            </div>
            <div class="mb-3">
                <label class="form-label">Tên Quản Lý</label>
                <input style="cursor: not-allowed;" name="id_ql" class="form-control" value="{{$sua->id_ql}}"></input>
            </div>
            <div class="mb-3">
                <label class="form-label">Mã phòng</label>
                <input style="cursor: not-allowed;" name="id_phong" class="form-control" value="{{$sua->id_phong}}"></input>
            </div>
            <div class="mb-3">
                <label class="form-label">Mã BX</label>
                <input style="cursor: not-allowed;" name="id_baixe" class="form-control" value="{{$sua->id_baixe}}"></input>
            </div>
            <div class="mb-3 text-left">
                <label class="form-label">Ngày ký
                    <span id="colorIcon">*</span>
                </label>
                <input style="cursor: pointer;" required value="{{$sua->ngaybatdau}}" name="ngaybatdau" class="form-control" type="date">
            </div>
            <div class="mb-3 text-left">
                <label class="form-label">Ngày hết hạn
                    <span id="colorIcon">*</span>
                </label>
                <input style="cursor: pointer;" required value="{{$sua->ngayketthuc}}" name="ngayketthuc" class="form-control" type="date">
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success col-md-5" id="side123">Chỉnh sửa</button>
            </div>
        @endforeach
    </div>
</div>