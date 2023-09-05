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
                
                <table class="table table-hover mt-3">
                    <thead style="background-color:#0d6efd; color:white;'"> 
                        <tr>
                            <th scope="col-6 col-md-4">Họ Tên</th>
                            <th scope="col-6 col-md-4">Ngày sinh</th>
                            <th scope="col-6 col-md-4">email</th>
                            <th scope="col-6 col-md-4">SĐT</th>
                            <th scope="col-6 col-md-4">STK</th>
                            <th scope="col-6 col-md-4">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($taikhoans as $taikhoan)
                        <tr>
                            <td>{{$taikhoan->name}}</td>
                            <td>{{$taikhoan->ngaysinh}}</td>
                            <td>{{$taikhoan->email}}</td>
                            <td>{{$taikhoan->sdt}}</td>
                            <td>{{$taikhoan->STK}}</td>
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