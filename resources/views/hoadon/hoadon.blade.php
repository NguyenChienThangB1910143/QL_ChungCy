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
            <div class="modal fade" id="addHoadon">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm Hóa Đơn</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form method="POST" id="body_add" action="{{route('hoadon-store')}}" enctype="multipart/form-data">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Content -->
            <div class="d-grid gap-2 d-md-flex justify-content-md-start ms-3 mt-3">
                    <button class="btn btn-primary me-md-2 mt-1 mb-1" type="button" onclick=them_hoadon()>
                        <i class="fas fa-plus"></i> &nbsp Thêm hóa đơn</button>
                </div>
            <div class='p-4 d-flex flex-column' >
                
                <table class="table table-hover mt-3">
                    <thead style="background-color:#0d6efd; color:white;'"> 
                        <tr>
                            <th scope="col-6 col-md-4">id</th>
                            <th scope="col-6 col-md-4">Tên Phòng</th>
                            <th scope="col-6 col-md-4">Thời gian</th>
                            <th scope="col-6 col-md-4">Tiền điện</th>
                            <th scope="col-6 col-md-4">Tiền nước</th>
                            <th scope="col-6 col-md-4">Tiền bãi xe</th>
                            <th scope="col-6 col-md-4">Khác</th>
                            <th scope="col-6 col-md-4">Thu thêm</th>
                            <th scope="col-6 col-md-4">Thành tiền</th>
                            <th scope="col-6 col-md-4">Tình trạng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hoadons as $hoadon)
                        <tr>
                            <td>{{$hoadon->id}}</td>
                            <td>{{$hoadon->ten_phong}}</td>
                            <td>{{$hoadon->thoigian}}</td>
                            <td>{{$hoadon->tiendien}}</td>
                            <td>{{$hoadon->tiennuoc}}</td>
                            <td>{{$hoadon->tienbaixe}}</td>
                            <td>{{$hoadon->khac}}</td>
                            <td>{{$hoadon->thuthem}}</td>
                            <td>{{$hoadon->thanhtien}}</td>
                            @if($hoadon->tinhtrang==0)
                                <td>Chưa đóng</td> 
                            @else
                                <td>Đã đóng</td>
                            @endif 
                            <td>
                                <div class="d-flex ">
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

    function them_hoadon() {
        $.get('./hoadon/them', function(data) {
            $("#body_add").html(data);
        });
        $('#addHoadon').modal('show');
    }
</script>
@endsection