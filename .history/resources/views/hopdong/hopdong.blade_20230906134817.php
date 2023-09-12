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
            <div class="modal fade" id="edithopdong">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Cập Nhật Hợp Đồng</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form id="body_edit" class="form-horizontal" method="post" enctype="multipart/form-data">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="addhopdong">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm Hợp Đồng</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form method="POST" id="body_add" action="{{route('hopdong-store')}}" enctype="multipart/form-data">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="chitiethopdong">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Chi Tiết Hợp Đồng</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form method="GET" id="body_chitiet"  enctype="multipart/form-data">
                                @csrf
                            </form>
                        </div>

                    </div>
                </div>
            </div>
                                <!-- start search -->
                    @include('partials.common.search')
                    <!-- end search  -->
            <!-- Content -->
            <div class='p-4 d-flex flex-column' >
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2 mt-1 mb-1" onclick=them_hopdong() type="button">
                        <i class="fas fa-plus"></i> Thêm</button>
                </div>
                <table class="table table-hover mt-3">
                    <thead style="background-color:#0d6efd; color:white;'"> 
                        <tr>
                            <th scope="col-6 col-md-4">Mã HĐ</th>
                            <th scope="col-6 col-md-4">Tên khách</th>
                            <th scope="col-6 col-md-4">Tên quản lý</th>
                            <th scope="col-6 col-md-4">Mã phòng</th>
                            <th scope="col-6 col-md-4">Mã bãi xe</th>
                            <th scope="col-6 col-md-4">Ngày ký</th>
                            <th scope="col-6 col-md-4">Ngày hết hạn</th>
                            <th scope="col-6 col-md-4">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hopdong as $hopdongs)
                        <tr>
                            <td>{{$hopdongs->id_hopdong}}</td>
                            <td>{{$hopdongs->ten_user}}</td>
                            <td>{{$hopdongs->ten_ql}}</td>
                            <td>{{$hopdongs->ten_phong}}</td>
                            <td>{{$hopdongs->ms_baixe}}</td>
                            <td>{{$hopdongs->ngaybatdau}}</td>
                            <td>{{$hopdongs->ngayketthuc}}</td>
                            <td>
                            <form action="{{route('hopdong-capnhat', $hopdongs->id_hopdong)}}" method="get">
                                        <buton type="submit" onclick=chitiet_hopdong('{{$hopdongs->id_hopdong}}') class="btn btn-info me-md-1 m-1">
                                            <i class="fas fa-eye"></i> 
                                        </buton>
                                        <button type="button" onclick=capnhat_hopdong('{{$hopdongs->id_hopdong}}') class="btn btn-primary me-md-3">
                                            <i class="fas fa-edit"></i> Sửa
                                        </a>
                                    </form>
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
        function them_hopdong() {
            $.get('./hopdong/them', function(data) {
                $("#body_add").html(data);
            });
            $('#addhopdong').modal('show');
        }
        function capnhat_hopdong(id_hopdong) {
            $.get('./hopdong/capnhat/' + id_hopdong, function(data) {
                $("#body_edit").html(data);
            });
            $('#edithopdong').modal('show');
        }
        $('#body_edit').submit(function(evt) {
            evt.preventDefault();
            var formData = new FormData(this);
            var id_phong = $("#id_hopdong").val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: './hopdong/update/' + id_hopdong,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    var successMessage = data.message;
                    $('#edithopdong').modal('hide');
                    window.location.href = './hopdong';
                },
            });
        });
        function chitiet_hopdong(id_hopdong) {
        $.get('./hopdong/chitiet/' + id_hopdong, function(data) {
            $("#body_chitiet").html(data);
        });
        $('#chitiethopdong').modal('show');
    }
    </script>
@endsection