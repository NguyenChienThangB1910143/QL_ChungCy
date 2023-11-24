@csrf

<!-- Content -->
<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        @foreach($capnhathopdong as $capnhat)
            <div class="row justify-content-center">
                <h5 class="text-center" id="side12">CHỈNH SỬA HỢP ĐỒNG</h5>
            </div>
            <input required value="{{$capnhat->id_hopdong}}" name="id_hopdong" id="id_hopdong" class="form-control" type="hidden">

            <div class="mb-3">
                <label class="form-label">Mã HĐ</label>
                <input style="cursor: not-allowed;" name="id_hopdong" class="form-control" value="{{$capnhat->id_hopdong}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Tên Khách</label>
                <input required style="cursor: not-allowed;" name="ten_user" class="form-control" value="{{$capnhat->ten_user}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Tên Quản Lý</label>
                <input required style="cursor: not-allowed;" name="ten_ql" class="form-control" value="{{$capnhat->ten_ql}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Mã phòng</label>
                <input required style="cursor: not-allowed;" name="ten_phong" class="form-control" value="{{$capnhat->ten_phong}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Mã BX</label>
                <input  name="ms_baixe" class="form-control" value="{{$capnhat->ms_baixe}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Nội dung</label>
                <textarea required  name="noidung" class="form-control" value="{{$capnhat->noidung}}"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Gía thuê</label>
                <input required  name="gia" class="form-control" value="{{$capnhat->gia}}">
            </div>
            <div class="mb-3 text-left">
                <label class="form-label">Ngày ký
                    <span  id="colorIcon">*</span>
                </label>
                <input required style="cursor: pointer;" required value="{{$capnhat->ngaybatdau}}" name="ngaybatdau" class="form-control" type="date">
            </div>
            <div class="mb-3 text-left">
                <label class="form-label">Ngày hết hạn
                    <span id="colorIcon">*</span>
                </label>
                <input required style="cursor: pointer;" required value="{{$capnhat->ngayketthuc}}" name="ngayketthuc" class="form-control" type="date">
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success col-md-5" id="side123">Chỉnh sửa</button>
            </div>
        @endforeach
    </div>
</div>