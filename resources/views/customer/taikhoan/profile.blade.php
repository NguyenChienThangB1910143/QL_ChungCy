@extends('customer.layouts.app')


@section('page-title', $title)

@section('message')
@include('customer.partials.messages')
@endsection

@section('content')
<div class="content-main">
        <!-- Page Content  -->
        <div id="content">
            <!-- Tieu de -->
            <div class="modal fade" id="editprofile">
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
            <!-- Content -->
            <div class="container col-md-5 mt-2">
                <form action="{{route('profile-chinhsua', $user->id)}}" method="get">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2 mt-1 mb-1" onclick=capnhat_profile('{{$user->id}}') type="button">
                        <i class="fas fa-plus"></i> Cập nhật</button>
                </div>
                </form>
                <div class="alert alert-primary shadow">
                    <h5 class="text-center" id="side12">THÔNG TIN TÀI KHOẢN</h5>
                    <form method="post" action="{{route('profile', $user->id)}}">
                        @csrf
                        <div class="row justify-content-center mb-2">
                            <div class="container">
                                <style>
                                    .text-view {
                                        color: #212529;
                                        text-align: center;
                                        display: inline-block;
                                        font-weight: 400;
                                        line-height: 1.5;
                                        cursor: text;
                                        border: 1px solid transparent;
                                        padding: 0.375rem 0.75rem;
                                        font-size: 1rem;
                                    }
                                </style>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Mã người dùng:</div>
                                    <label name="id" class="col-6 col-sm-6 text-view">{{$user->id}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Tên:</div>
                                    <label name="name" class="col-6 col-sm-6 text-view">{{$user->name}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Ngày sinh:</div>
                                    <label name="ngaysinh" class="col-6 col-sm-6 text-view">{{$user->ngaysinh}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Email:</div>
                                    <label name="email" class="col-6 col-sm-6 text-view">{{$user->email}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">SĐT:</div>
                                    <label name="sdt" class="col-6 col-sm-6 text-view">{{$user->sdt}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">STK:</div>
                                    <label name="STK" class="col-6 col-sm-6 text-view">{{$user->STK}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Phòng:</div>
                                    <label name="phong" class="col-6 col-sm-6 text-view">
                                        @if($hopdong==null)
                                            CHƯA CÓ HỢP ĐỒNG
                                        @else
                                            @php
                                                $phong = App\Models\Phong::find($hopdong->id_phong);
                                                $tang = App\Models\Tang::find($phong->id_tang);
                                                $toa = App\Models\Toa::find($tang->id_toa);
                                            @endphp
                                            {{$phong->ten}},
                                            {{$tang->ten}},
                                             Tòa {{$toa->ten}}
                                        @endif
                                    </label>
                                </div>
                                
                            </div>
                        </div>
                    </form>
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
    function capnhat_profile(id) {
        $.get('./taikhoan/chinhsua/' + id, function(data) {
            $("#body_edit").html(data);
        });
        $('#editprofile').modal('show');
    }
    $('#body_edit').submit(function(evt) {
        evt.preventDefault();
        var formData = new FormData(this);
        var id = $("#id").val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: './taikhoan/update/' + id,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                var successMessage = data.message;
                $('#editprofile').modal('hide');
                window.location.href = './taikhoan';
            },
        });
    });
</script>
@endsection