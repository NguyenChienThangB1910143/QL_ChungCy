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
            <div class="modal fade" id="editphong">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Cập Nhật Phòng</h4>
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
            <div class="modal fade" id="addphong">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm Phòng</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form method="POST" id="body_add" action="{{route('phong-store')}}" enctype="multipart/form-data">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class='p-4 d-flex flex-column' >
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2 mt-1 mb-1" onclick=them_phong() type="button">
                        <i class="fas fa-plus"></i> Thêm</button>
                        <button><a href="{{ route('phong-test') }}">Run Test Function</a></button>
                </div>
                
                <table class="table table-hover mt-3">
                    <thead style="background-color:#0d6efd; color:white;'"> 
                        <tr>
                            <th scope="col-6 col-md-4">Mã phòng</th>
                            <th scope="col-6 col-md-4">Mã Tầng</th>
                            <th scope="col-6 col-md-4">Tên phòng</th>
                            <th scope="col-6 col-md-4">Tình Trạng</th>
                            <th scope="col-6 col-md-4">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($phong as $phong)
                        <tr>
                            <td>{{$phong->id_phong}}</td>
                            <td>{{$phong->id_tang}}</td>
                            <td>{{$phong->ten}}</td>
                            @if($phong->tinhtrang==0)
                                <td>Còn trống</td> 
                            @else
                                <td>Đã thuê</td>
                            @endif 
                            <td>
                                <form action="{{route('phong-chinhsua', $phong->id_phong)}}" method="get">
                                        <button type="button" onclick=capnhat_phong('{{$phong->id_phong}}') class="btn btn-primary me-md-3">
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

        function them_phong() {
            // $.get('{{Url("/design/edit")}}/' + id, function (data) {
            $.get('./phong/them', function(data) {
                $("#body_add").html(data);
            });
            $('#addphong').modal('show');
        }
        function capnhat_phong(id_phong) {
            $.get('./phong/chinhsua/' + id_phong, function(data) {
                $("#body_edit").html(data);
            });
            $('#editphong').modal('show');
        }
        $('#body_edit').submit(function(evt) {
            evt.preventDefault();
            var formData = new FormData(this);
            var id_phong = $("#id_phong").val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: './phong/update/' + id_phong,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    var successMessage = data.message;
                    $('#editphong').modal('hide');
                    window.location.href = './phong';
                },
            });
        });
    </script>
@endsection