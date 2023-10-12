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
                            <th scope="col-6 col-md-4">Mã báo cáo</th>
                            <th scope="col-6 col-md-4">Họ Tên</th>
                            <th scope="col-6 col-md-4">Mã phòng</th>
                            <th scope="col-6 col-md-4">Tiêu đề</th>
                            <th scope="col-6 col-md-4">Nội dung</th>
                            <th scope="col-6 col-md-4">Thời gian</th>
                            <th scope="col-6 col-md-4">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bcsc as $bc)
                        <tr>
                            <td>{{$bc->id_baocao}}</td>
                            <td>{{$bc->id_user}}</td>
                            <td>{{$bc->id_phong}}</td>
                            <td>{{$bc->tieude}}</td>
                            <td>{{$bc->noidung}}</td>
                            <td>{{$bc->thoigian}}</td>
                            <td>
                                <div class="d-flex ">
                                    <form action="{{ route('phanhoi.them', ['id_baocao' => $bc->id_baocao]) }}" method="get">
                                        <button type="submit" class="btn btn-primary me-md-1 m-1">
                                            <i class="fas fa-edit"></i>phản hồi
                                        </button>
                                    </form>
                                    
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
</script>
@endsection