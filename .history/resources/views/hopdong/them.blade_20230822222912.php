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
        <div class="mb-3 option-tang">
            <label class="form-label">Tên Quản Lý</label>
                <input style="cursor: not-allowed;" name="" class="form-control" value="{{$ten_user}}"></input>
        </div>
        <div class="mb-3">
            <label class="form-label">Tình trạng
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="tt" name="tt">
                <option value="1">Hoạt dộng</option>
                <option value="0">Ngưng hoạt dộng</option>
            </select>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-success col-md-5" id="side123">Thêm</button>
        </div>
    </div>
</div>