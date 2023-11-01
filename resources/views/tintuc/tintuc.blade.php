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
                <table id="tbtintuc" class="table table-striped" style="width:100%">
                    <thead class="table-primary"> 
                        <tr>
                            <th >Mã tin</th>
                            <th >Tiêu đề</th>
                            <th >Tên người viết</th>
                            <th >Thời gian</th>
                            <th >Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tintucs as $tintuc)
                        <tr>
                            <td>{{$tintuc->id}}</td>
                            <td>{{$tintuc->tieude}}</td>
                            <td>{{$tintuc->ten_user}}</td>
                            <td>{{$tintuc->thoigian}}</td>
                            <td class="d-flex justify-content-start">
                                <button type="submit" onclick=chitiet_tintuc('{{$tintuc->id}}') class="btn btn-info me-md-3">
                                    <i class="fas fa-eye"></i> 
                                </button>
                                <form action="{{route('tintuc-chinhsua', $tintuc->id)}}" method="get" class="me-md-3">
                                    <button type="button" onclick=capnhat_tintuc('{{$tintuc->id}}') class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Sửa
                                    </button>
                                </form>
                                <form action="{{route('tintuc-xoa', $tintuc->id)}}" method="get" class="me-md-3">
                                    <button type="submit" onclick="return confirm('Bạn có đồng ý xóa hay không?')" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i> Xóa
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
            $('#noidung').val(editorInstance.getData());
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