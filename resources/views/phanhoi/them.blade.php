<form id="body_add" class="form-horizontal" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id_baocao" value="{{ $id_baocao }}">
    <div class="mb-3">
        <label for="tieude" class="form-label">Tiêu đề<span id="colorIcon" class="text-danger">*</span></label>
        <input id="tieude" required class="form-control" type="text" name="tieude" placeholder="Vui lòng nhập tiêu đề">
    </div>
    <div class="mb-3">
        <label for="noidung" class="form-label">Nội dung:<span id="colorIcon" class="text-danger">*</span></label>
        <textarea id="noidung" required class="form-control" name="noidung" rows="4" placeholder="Vui lòng nhập nội dung"></textarea>
    </div>
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Gửi phản hồi</button>
    </div>
</form>
