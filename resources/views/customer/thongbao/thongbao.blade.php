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
            
            <!-- Content -->
            <div class='p-4 d-flex flex-column' >
                <table id="tbthongbaoCT" class="table table-striped" style="width:100%">
                    <thead class="table-primary"> 
                        <tr>
                            <th>Mã Thông Báo</th>
                            <th>Người Gửi</th>
                            <th>Tiêu Đề</th>
                            <th>Nội Dung</th>
                            <th>Thời Gian</th>
                            <th>Người Nhận</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($thongbaoCT as $tb)
                        <tr>
                            <td>{{$tb->id_thongbao}}</td>
                            <td>{{ \App\Models\User::find($tb->id_user)->name }}</td>

                            <td>{{$tb->tieude}}</td>
                            <td>{{$tb->noidung}}</td>
                            <td>{{$tb->thoigian}}</td>
                            <td>
                                @if($tb->nhan == 0)
                                    Tất cả
                                @else
                                    {{ \App\Models\Phong::find($tb->nhan)->ten }}
                                @endif
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
@endsection