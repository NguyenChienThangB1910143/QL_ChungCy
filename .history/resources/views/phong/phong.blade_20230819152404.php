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
                            <td>{{$phong->tinhtrang}}</td>
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