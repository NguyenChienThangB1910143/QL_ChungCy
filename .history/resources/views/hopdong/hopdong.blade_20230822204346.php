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
            <!-- Content -->
            <div class='p-4 d-flex flex-column' >
                <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2 mt-1 mb-1" onclick=them_phong() type="button">
                        <i class="fas fa-plus"></i> Thêm</button>
                </div> -->
                <table class="table table-hover mt-3">
                    <thead style="background-color:#0d6efd; color:white;'"> 
                        <tr>
                            <th scope="col-6 col-md-4">id</th>
                            <th scope="col-6 col-md-4">id khách</th>
                            <th scope="col-6 col-md-4">id quản lý</th>
                            <th scope="col-6 col-md-4">id phòng</th>
                            <th scope="col-6 col-md-4">id bãi xe</th>
                            <th scope="col-6 col-md-4">ngay bat dau</th>
                            <th scope="col-6 col-md-4">ngay ket thuc</th>
                            <th scope="col-6 col-md-4">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hopdong as $hopdong)
                        <tr>
                            <td>{{$hopdong->id_hopdong}}</td>
                            <td>{{$hopdong->id_user}}</td>
                            <td>{{$hopdong->id_ql}}</td>
                            <td>{{$hopdong->id_phong}}</td>
                            <td>{{$hopdong->id_baixe}}</td>
                            <td>{{$hopdong->ngaybatdau}}</td>
                            <td>{{$hopdong->ngayketthuc}}</td>
                            <td>

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