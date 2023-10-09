<!-- Content -->
@csrf

<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        @foreach($suatintuc as $suatin)
        <div class="row justify-content-center">
            <h5 class="text-center" id="side12">CHỈNH SỬA TIN TỨC</h5>
        </div>

        <!-- Nhân viên tạo hợp đồng -->
            <input required value="{{$suatin->id}}" name="id" id="id" class="form-control" type="hidden">

            <div class="mb-3">
                <label class="form-label">Mã Tin</label>
                <input style="cursor: not-allowed;" name="id" class="form-control" value="{{$suatin->id}}">
            </div>
            <div class="mb-3 option-tieude">
                <label class="form-label">Tiêu đề
                    <span id="colorIcon">*</span>
                </label>
                <input required class="form-control" name="tieude" id="tieude" value="{{$suatin->tieude}}" >
            </div>
            <div class="mb-3 option-noidung">
                <label class="form-label">Nội dung
                    <span id="colorIcon">*</span>
                </label>
                <textarea required class="form-control" name="noidung" id="noidung" value="{{$suatin->noidung}}">
                </textarea>
            </div>
            <div class="mb-3 option-thoigian">
                <label class="form-label">Thời gian
                    <span id="colorIcon">*</span>
                </label>
                <input required class="form-control" type="date" name="thoigian" value="{{$suatin->thoigian}}">
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success col-md-5" id="">Cập nhật</button>
            </div>
            @endforeach
        </div>
</div>
<script>
    let editorInstance;  // Biến toàn cục để lưu thể hiện của CKEditor

ClassicEditor
    .create( document.querySelector( '#noidung' ), {
        ckfinder: {
            uploadUrl: "{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
        }
    } )
    .then( newEditor => {
        editorInstance = newEditor;  // Lưu thể hiện của CKEditor vào biến `editorInstance`
    } )
    .catch( error => {
        console.error( error );
    } );

</script>
    