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
            <div class="modal fade" id="edittintuc">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Chỉnh sửa</h4>
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
            <div class="modal fade" id="addtintuc">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm Tin Tức</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form method="POST" id="body_add" action="{{route('tintuc-store')}}" enctype="multipart/form-data">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="chitiettintuc">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Chi Tiết Tin Tức</h4>
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
            <!-- Content -->
            <div class='p-4 d-flex flex-column' >
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2 mt-1 mb-1" onclick=them_tintuc() type="button">
                        <i class="fas fa-plus"></i> Thêm</button>
                </div>
                <table class="table table-hover mt-3">
                    <thead style="background-color:#0d6efd; color:white;'"> 
                        <tr>
                            <th scope="col-6 col-md-4">Mã tin</th>
                            <th scope="col-6 col-md-4">Tiêu đề</th>
                            <th scope="col-6 col-md-4">Tên người viết</th>
                            <th scope="col-6 col-md-4">Thời gian</th>
                            <th scope="col-6 col-md-4">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tintucs as $tintuc)
                        <tr>
                            <td>{{$tintuc->id}}</td>
                            <td>{{$tintuc->tieude}}</td>
                            <td>{{$tintuc->ten_user}}</td>
                            <td>{{$tintuc->thoigian}}</td>
                            <td>
                                <form action="{{route('tintuc-chinhsua', $tintuc->id)}}" method="get">
                                        <buton type="submit" onclick=chitiet_tintuc('{{$tintuc->id}}') class="btn btn-info me-md-1 m-1">
                                            <i class="fas fa-eye"></i> 
                                        </buton>
                                        <button type="button" onclick=capnhat_tintuc('{{$tintuc->id}}') class="btn btn-primary me-md-3">
                                            <i class="fas fa-edit"></i> Sửa
                                        </button>
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

        function them_tintuc() {
            $.get('./tintuc/them', function(data) {
                $("#body_add").html(data);
            });
            $('#addtintuc').modal('show');
        }
        function capnhat_tintuc(id) {
            $.get('./tintuc/chinhsua/' + id, function(data) {
                $("#body_edit").html(data);
            });
            $('#edittintuc').modal('show');
        }
        $('#body_edit').submit(function(evt) {
            evt.preventDefault();
            var formData = new FormData(this);
            var id = $("#id").val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: './tintuc/update/' + id,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    var successMessage = data.message;
                    $('#edittintuc').modal('hide');
                    window.location.href = './tintuc';
                },
            });
        });
        function chitiet_tintuc(id) {
        $.get('./tintuc/chitiet/' + id, function(data) {
            $("#body_chitiet").html(data);
        });
        $('#chitiettintuc').modal('show');
    }
    </script>
@endsection