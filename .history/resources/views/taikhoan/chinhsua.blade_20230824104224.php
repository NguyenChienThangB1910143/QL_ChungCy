<!-- Content -->
<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        <form method="post" action="{{route('taikhoan-chinhsua', $chinhsua->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="container">
                    <style>
                        .text-view {
                            color: #212529;
                            text-align: center;
                            display: inline-block;
                            font-weight: 400;
                            line-height: 1.5;
                            cursor: text;
                            border: 1px solid transparent;
                            padding: 0.375rem 0.75rem;
                            font-size: 1rem;
                        }
                    </style>
                    <input required value="{{$chinhsua->id}}" name="id" id="id" class="form-control" type="hidden">

                    <div class="mb-3 text-left">
                        <label style="cursor: default;" class="form-label">Tên người dùng
                            <span id="colorIcon">*</span>
                        </label>
                        <input required name="name" class="col-6 col-sm-6 form-control" value="{{$chinhsua->name}}"></input>
                    </div>
                    <div>
                        <label style="cursor: default;" class="form-label">Ngày sinh:
                            <span id="colorIcon">*</span>
                        </label>
                        <input required name="ngaysinh" type="date" class="col-6 col-sm-6 form-control" value="{{$chinhsua->ngaysinh}}"></input>
                    </div>
                    <div>
                        <label style="cursor: default;" class="form-label">Email
                            <span id="colorIcon">*</span>
                        </label>
                        <input required name="email" type="email" class="col-6 col-sm-6 form-control" value="{{$chinhsua->email}}"></input>
                    </div>
                    <div class="mb-3 text-left">
                        <label style="cursor: default;" class="form-label">Số điện thoại
                            <span id="colorIcon">*</span>
                        </label>
                        <input required name="sdt" class="col-6 col-sm-6 form-control" value="{{$chinhsua->sdt}}"></input>
                    </div>
                    <div>
                        <label style="cursor: default;" class="form-label">Password
                            <span id="colorIcon">*</span>
                        </label>
                        <input required name="email" type="password" class="col-6 col-sm-6 form-control" value="{{$chinhsua->password}}"></input>
                    </div>
                    <div>
                        <label style="cursor: default;" class="form-label">Quyền
                            <span id="colorIcon">*</span>
                        </label>
                        <select required class="form-control" aria-label="Default select example" name="quyen">
                            <option value="1">Quản lý</option>
                            <option value="2">Khách hàng</option>
                        </select>
                    </div>
                    <div>
                        <label style="cursor: default;" class="form-label">Số TK:
                            <span id="colorIcon">*</span>
                        </label>
                        <input required name="STK" type="text" class="col-6 col-sm-6 form-control" value="{{$chinhsua->STK}}"></input>
                    </div>
                    <div class="row justify-content-center m-3">
                        <button type="submit" class="btn btn-success col-md-5" id="side123">Chỉnh sửa</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>