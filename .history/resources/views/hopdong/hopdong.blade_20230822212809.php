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
            <!-- Content -->
            <div class='p-4 d-flex flex-column' >
                <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2 mt-1 mb-1" onclick=them_phong() type="button">
                        <i class="fas fa-plus"></i> Thêm</button>
                </div> -->
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
                        @foreach($hopdong as $hopdong)
                        <tr>
                            <td>{{$hopdong->id_hopdong}}</td>
                            <td>{{$hopdong->ten_user}}</td>
                            <td>{{$hopdong->ten_ql}}</td>
                            <td>{{$hopdong->ten_phong}}</td>
                            <td>{{$hopdong->ms_baixe}}</td>
                            <td>{{$hopdong->ngaybatdau}}</td>
                            <td>{{$hopdong->ngayketthuc}}</td>
                            <td>
                            <form action="{{route('hopdong-capnhat', $hopdong->id_hopdong)}}" method="get">
                                        <button type="button" onclick=capnhat_hopdong('{{$phong->id_phong}}') class="btn btn-primary me-md-3">
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