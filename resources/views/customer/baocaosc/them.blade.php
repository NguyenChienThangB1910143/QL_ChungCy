@csrf
<!-- Content -->
<div class="container col-md-auto mt-2">
    <div class="alert alert-primary">
        <div class="mb-3">
            <label class="form-label">Tiêu đề
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="tieude" placeholder="Vui lòng nhập tiêu đề">
        </div>
        <div class="mb-3">
            <label class="form-label">Nội dung:
                <span id="colorIcon">*</span>
            </label>
            <input required class="form-control" type="text" name="noidung" placeholder="Vui lòng nhập nội dung">
        </div>
        <div class="mb-3">
            <label for="imageUpload" class="form-label">Hình:
                <span id="colorIcon">*</span>
            </label>
            <input type="file" id="imageUpload" name="hinh" accept="uploads/*" required class="form-control">
        </div>        
        
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-success col-md-5" id="side123">Gửi</button>
        </div>
    </div>
</div>