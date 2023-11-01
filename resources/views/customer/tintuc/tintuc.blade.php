@extends('customer.layouts.app')


@section('page-title', $title)

@section('message')
@include('customer.partials.messages')
@endsection

@section('content')
<div class="content-main">

    <!-- start body -->
    <div class="wrapper">
        <!-- Sidebar  -->

        <!-- Page Content  -->
        <div id="content">
            <!-- Tieu de -->
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
            <div class='pt-5 d-flex flex-column' >
                <div class="row">
                    <!-- Cột 2/4 bên trái là slide banner -->
                    <div class="col-md-6">
                        <div id="carouselExampleIndicators" class="carousel slide shadow" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($tintucs as $index => $tintuc)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($tintucs as $index => $tintuc)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('/' . $tintuc->hinhanh) }}" class="d-block w-100 rounded" alt="Hình ảnh" height="336px" onclick=chitiet_tintuc('{{$tintuc->id}}') style="cursor:pointer;">
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    
            
                    <!-- Cột 2/4 bên phải là hiển thị tin tức -->
                    <div class="col-md-6 ">
                        <div class='d-flex flex-column overflow-auto' style="height: 47vh;">
                            @foreach($tintucs as $tintuc)
                            <div class="d-flex flex-column border rounded mt-3 shadow" style="height: 250px;" onclick=chitiet_tintuc('{{$tintuc->id}}')>
                                <!-- Hàng 2/5 hiển thị tiêu đề mỗi tin tức -->
                                <div class="d-flex align-items-center border rounded bg-info justify-content-center" style="height: 30%;">
                                    <h5>{{ Str::limit($tintuc->tieude, 50) }}</h5>
                                </div>
                                <!-- Hàng 3/5 chia thành 2 cột 1:2 hiển thị hình ảnh và nội dung của tin tức -->
                                <div class="d-flex flex-row" style="height: 70%;">
                                    <!-- Cột 1/3 hiển thị hình ảnh -->
                                    <div class="w-30 p-2" >
                                        <img name="hinhanh" src="{{ asset('/' . $tintuc->hinhanh) }}" alt="Hình ảnh" class="img-fluid" style="width:200px; height:75px;" >
                                    </div>
                                    <!-- Cột 2/3 hiển thị nội dung -->
                                    <div class="w-70 p-2">
                                        {!! Str::limit($tintuc->noidung, 100) !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    
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
        function chitiet_tintuc(id) {
        $.get('./tintuc/chitiet/' + id, function(data) {
            $("#body_chitiet").html(data);
        });
        $('#chitiettintuc').modal('show');
    }
    </script>
@endsection