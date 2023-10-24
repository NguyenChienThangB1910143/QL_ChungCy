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
            {{-- <div class="modal fade" id="editthongbao">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Cập Nhật Thông Báo</h4>
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
            </div> --}}
            <div class="modal fade" id="addthongbao">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm Thông Báo</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form method="POST" id="body_add" action="{{route('thongbao-store')}}" enctype="multipart/form-data">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class='p-4 d-flex flex-column' >
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2 mt-1 mb-1" onclick=them_thongbao() type="button">
                        <i class="fas fa-plus"></i> Thêm</button>
                </div>
                <table class="table table-hover mt-3">
                    <thead style="background-color:#0d6efd; color:white;'"> 
                        <tr>
                            <th scope="col-6 col-md-4">Mã Thông Báo</th>
                            <th scope="col-6 col-md-4">Người Gửi</th>
                            <th scope="col-6 col-md-4">Tiêu Đề</th>
                            <th scope="col-6 col-md-4">Nội Dung</th>
                            <th scope="col-6 col-md-4">Thời Gian</th>
                            <th scope="col-6 col-md-4">Người Nhận</th>
                            <th scope="col-6 col-md-4">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($thongbao as $thongbaos)
                        <tr>
                            <td>{{$thongbaos->id_thongbao}}</td>
                            <td>{{$thongbaos->id_user}}</td>
                            <td>{{$thongbaos->tieude}}</td>
                            <td>{{$thongbaos->noidung}}</td>
                            <td>{{$thongbaos->thoigian}}</td>
                            <td>{{$thongbaos->nhan}}</td>
                            <td>
                                {{-- <form action="{{route('thongbao-chinhsua', $thongbao->id_thongbao)}}" method="get">
                                        <button type="button" onclick=capnhat_thongbao('{{$thongbao->id_thongbao}}') class="btn btn-primary me-md-3">
                                            <i class="fas fa-edit"></i> Sửa
                                        </a>
                                    </form> --}}
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

        function them_thongbao() {
            // $.get('{{Url("/design/edit")}}/' + id, function (data) {
            $.get('./thongbao/them', function(data) {
                $("#body_add").html(data);
            });
            $('#addthongbao').modal('show');
        }
        // function capnhat_thongbao(id_thongbao) {
        //     $.get('./thongbao/chinhsua/' + id_thongbao, function(data) {
        //         $("#body_edit").html(data);
        //     });
        //     $('#editthongbao').modal('show');
        // }
        // $('#body_edit').submit(function(evt) {
        //     evt.preventDefault();
        //     var formData = new FormData(this);
        //     var id_thongbao = $("#id_thongbao").val();
        //     $.ajax({
        //         type: 'POST',
        //         dataType: 'json',
        //         url: './thongbao/update/' + id_thongbao,
        //         data: formData,
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         success: function(data) {
        //             var successMessage = data.message;
        //             $('#editthongbao').modal('hide');
        //             window.location.href = './thongbao';
        //         },
        //     });
        // });
    </script>
@endsection