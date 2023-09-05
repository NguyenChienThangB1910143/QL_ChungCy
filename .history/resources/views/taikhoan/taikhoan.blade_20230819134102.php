@extends('layouts.app')


@section('page-title', $title)

@section('message')
@include('partials.messages')
@endsection

@section('content')
<div class="content-main">

    <!-- start body -->
    <div class="wrapper">
        <!-- Sidebar  -->
        @include('partials.common.slide-bar')

        <!-- Page Content  -->
        <div id="content">
            <!-- Tieu de -->
            @include('partials.common.tieude')
            <!-- start modal ajax edit, add--->
            <div class="modal fade" id="editTaiKhoan">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Cập Nhật Tài Khoản</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form id="body_edit" class="form-horizontal" method="post" enctype="multipart/form-data">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="addTaiKhoan">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm Tài Khoản</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form method="POST" id="body_add" action="{{route('taikhoan-store')}}" enctype="multipart/form-data">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="hienthiTaiKhoan">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Chi Tiết Tài Khoản</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form method="GET" id="body_hienthi"  enctype="multipart/form-data">
                                @csrf
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!--  end modal ajax edit, add--->
            <!-- Content -->
            <div >
                <div class="d-grid gap-2 d-md-flex justify-content-md-start ms-3 mt-3">
                    <button class="btn btn-primary me-md-2 mt-1 mb-1" type="button" onclick=them_taikhoan()>
                        <i class="fas fa-plus"></i> &nbsp Thêm tài khoản người dùng</button>
                </div>
                <div class="table-responsive p-3">
                    <table class="table table-hover ">
                        <thead  style="background-color:#0d6efd; color:white;">
                            <tr>
                                <th scope="col-6 col-md-3">STT</th>
                                <th scope="col-6 col-md-3">Avatar</th>
                                <th scope="col-6 col-md-3">Mã người dùng</th>
                                <th scope="col-6 col-md-3">Tên người dùng</th>
                                <th scope="col-6 col-md-3">Giới tính</th>
                                <th scope="col-6 col-md-3">Địa chỉ</th>
                                <th scope="col-6 col-md-3">Email</th>
                                <th scope="col-6 col-md-3">SĐT</th>
                                <th scope="col-6 col-md-3">Quyền người dùng</th>
                                <th scope="col-6 col-md-3">Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1 ?>
                            <tr>
                                <th style="" scope="row"><?= $stt++ ?></th>
                                <td style=""><img src="{{asset($taikhoan->avatar)}}" alt="avatar" width="70" height="70" style="object-fit:contain;border-radius:10px"></td>
                                <td style="">{{$taikhoan->ND_MaND}}</td>
                                <td style="">{{$taikhoan->name}}</td>
                                <td style="">{{$taikhoan->ND_GioiTinh}}</td>
                                <td style="">{{$taikhoan->ND_DiaChi}}</td>
                                <td style="">{{$taikhoan->email}}</td>
                                <td style="">{{$taikhoan->ND_SDT}}</td>
                                <td style="">{{$quyen}}</td>
                                <td>
                                    <div class="d-flex ">
                                        <buton type="submit" onclick=hienthi_taikhoan({{$taikhoan->id}}) class="btn btn-info me-md-1 m-1">
                                            <i class="fas fa-eye"></i> 
                                        </buton>
                                        @if($quyennd=='Q0')
                                        <button type="submit" onclick=capnhat_taikhoan({{$taikhoan->id}}) class="btn btn-primary me-md-1 m-1">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{route('taikhoan-xoa', $taikhoan->id)}}" method="get">
                                            <button type="submit" onclick="return confirm('Bạn có đồng ý xóa hay không?')" class="btn btn-danger me-md-1 m-1">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $taikhoans->links() }}
            </div>
        </div>

    </div>
    <!-- end body -->
</div>
@endsection

@section('JS')
<script>
    $('.close').click(function() {
        $('.modal').modal('hide');
    });

    function capnhat_taikhoan(id) {
        // $.get('{{Url("/design/edit")}}/' + id, function (data) {
        $.get('./taikhoan/chinhsua/' + id, function(data) {
            $("#body_edit").html(data);
            // console.log(data);
            // getDesignSuggest(id)
        });
        $('#editTaiKhoan').modal('show');
    }
    function hienthi_taikhoan(id) {
        // $.get('{{Url("/design/edit")}}/' + id, function (data) {
        $.get('./taikhoan/hienthi/' + id, function(data) {
            $("#body_hienthi").html(data);
            // console.log(data);
            // getDesignSuggest(id)
        });
        $('#hienthiTaiKhoan').modal('show');
    }

    function them_taikhoan() {
        // $.get('{{Url("/design/edit")}}/' + id, function (data) {
        $.get('./taikhoan/them', function(data) {
            $("#body_add").html(data);
            // console.log(data);
            // getDesignSuggest(id)
        });
        $('#addTaiKhoan').modal('show');
    }
    $('#body_edit').submit(function(evt) {
        evt.preventDefault();
        var formData = new FormData(this);
        var id = $("#id").val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            //url: '{{Url("/design/update-post")}}',
            url: '/taikhoan/chinhsua/' + id,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                var successMessage = data.message;
                $('#editHopDong').modal('hide');
                window.location.href = './designs';
            },
        });
    });
</script>
@endsection