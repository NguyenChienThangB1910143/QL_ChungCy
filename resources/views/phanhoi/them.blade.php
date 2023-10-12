<form action="{{ route('phanhoi.store') }}" method="post">
    @csrf
    <!-- Content -->
    <!-- Các trường nhập liệu cho phản hồi của bạn ở đây -->
    <div class="alert alert-primary">
        <input type="hidden" name="id_baocao" value="{{ $id_baocao }}">
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
        
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-primary">Gửi phản hồi</button>
        </div>
    </div>
</form>
