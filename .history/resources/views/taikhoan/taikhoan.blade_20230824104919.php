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
            <!-- Content -->
            <div class="d-grid gap-2 d-md-flex justify-content-md-start ms-3 mt-3">
                    <button class="btn btn-primary me-md-2 mt-1 mb-1" type="button" onclick=them_taikhoan()>
                        <i class="fas fa-plus"></i> &nbsp Thêm tài khoản người dùng</button>
                </div>
            <div class='p-4 d-flex flex-column' >
                
                <table class="table table-hover mt-3">
                    <thead style="background-color:#0d6efd; color:white;'"> 
                        <tr>
                            <th scope="col-6 col-md-4">Họ Tên</th>
                            <th scope="col-6 col-md-4">Ngày sinh</th>
                            <th scope="col-6 col-md-4">email</th>
                            <th scope="col-6 col-md-4">SĐT</th>
                            <th scope="col-6 col-md-4">STK</th>
                            <th scope="col-6 col-md-4">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($taikhoans as $taikhoan)
                        <tr>
                            <td>{{$taikhoan->name}}</td>
                            <td>{{$taikhoan->ngaysinh}}</td>
                            <td>{{$taikhoan->email}}</td>
                            <td>{{$taikhoan->sdt}}</td>
                            <td>{{$taikhoan->STK}}</td>
                            <td>
                                <div class="d-flex ">
                                        <button type="submit" onclick=capnhat_taikhoan({{$taikhoan->id}}) class="btn btn-primary me-md-1 m-1">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               
                
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

    function them_taikhoan() {
        $.get('./taikhoan/them', function(data) {
            $("#body_add").html(data);
        });
        $('#addTaiKhoan').modal('show');
    }
    function capnhat_taikhoan(id) {
        $.get('./taikhoan/chinhsua/' + id, function(data) {
            $("#body_edit").html(data);
        });
        $('#editTaiKhoan').modal('show');
    }
    $('#body_edit').submit(function(evt) {
        evt.preventDefault();
        var formData = new FormData(this);
        var id = $("#id").val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
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