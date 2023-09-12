@csrf
<!-- Content -->
<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        <div class="mb-3 option-toa">
            <label class="form-label">Tòa
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="toa" name="toa">
                <option value="">Chọn Tòa</option>
                @foreach($toa as $toa)
                <option value="{{$toa->id_toa}}">{{$toa->ten}}</option>
                @endforeach
            </select>
        </div>
        <!-- Chọn Tầng -->
        <div class="mb-3 option-tang">
            <label class="form-label">Tầng
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="tang" name="tang">
                <option value="">Chọn Tầng</option>
                @foreach($tang as $tang)
                <option value="{{$tang->id_tang}}" data-id-toa="{{$tang->id_toa}}">{{$tang->ten}}</option>
                @endforeach
            </select>
        </div>
        <!-- Chọn Phòng -->
        <div class="mb-3 option-phong">
            <label class="form-label">Phòng
                <span id="colorIcon">*</span>
            </label>
            <select style="cursor: pointer;" class="form-control" aria-label="Default select example" id="phong" name="phong">
            <option value="">Chọn phòng</option>
                @foreach($phong as $phong)
                    @if($phong->tinhtrang == 0)
                    <option value="{{$phong->id_phong}}" data-id-tang="{{$phong->id_tang}}">{{$phong->ten}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label"> Chỉ số cũ:
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="chiso_cu" placeholder="Vui lòng nhập chỉ số điện cũ">
        </div>
        <div class="mb-3">
            <label class="form-label">Chỉ số mới
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="chiso_moi" placeholder="Vui lòng nhập chỉ số điện">
        </div>
        <div class="mb-3">
            <label class="form-label">Thời gian:
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="date" name="thoigian" placeholder="Vui lòng nhập thời gian">
        </div>
        <div class="mb-3">
            <label class="form-label">Đơn giá:
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="dongia" placeholder="Vui lòng nhập đơn giá điện">
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-success col-md-5" id="side123">Thêm</button>
        </div>
    </div>
</div>
<script>
    //Chọn tầng
    document.getElementById('tang').addEventListener('change', function() {
        var selectedTang = this.value;
        var phongOptions = document.querySelectorAll('#phong option');
        phongOptions.forEach(function(option) {
            if (option.getAttribute('data-id-tang') == selectedTang) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });
    });
    //Chọn tòa
    document.getElementById('toa').addEventListener('change', function() {
        var selectedToa = this.value;
        var toaOptions = document.querySelectorAll('#tang option');
        toaOptions.forEach(function(option) {
            if (option.getAttribute('data-id-toa') == selectedToa) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });
    });


</script>