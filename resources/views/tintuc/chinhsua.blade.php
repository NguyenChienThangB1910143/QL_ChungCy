<!-- Content -->
@csrf

<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        <div class="row justify-content-center">
            <h5 class="text-center" id="side12">CHỈNH SỬA TIN TỨC</h5>
        </div>

        <!-- Nhân viên tạo hợp đồng -->
            <div class="mb-3 option-ql">
                <label class="form-label">Tên Quản Lý
                    <span id="colorIcon">*</span>
                </label>
                <input disabled required class="form-control" type="text" name="ten_ql" value="{{Auth::user()->name}}">
            </div>
            <div class="mb-3 option-tieude">
                <label class="form-label">Tiêu đề
                    <span id="colorIcon">*</span>
                </label>
                <input required class="form-control" name="tieude" id="tieude" >
            </div>
            <div class="mb-3 option-noidung">
                <label class="form-label">Nội dung
                    <span id="colorIcon">*</span>
                </label>
                <textarea required class="form-control" name="noidung" id="noidung">
                </textarea>
            </div>
            <div class="mb-3 option-thoigian">
                <label class="form-label">Thời gian
                    <span id="colorIcon">*</span>
                </label>
                <input required class="form-control" type="date" name="thoigian">
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success col-md-5" id="">Cập nhật</button>
            </div>
        </div>
</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#noidung' ) ,
          {
            ckfinder:
            {
                uploadUrl:"{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
            }
          }
        )
        .then( editor => {
        console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
    