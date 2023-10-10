@extends('customer.layouts.app')


@section('page-title', $title)

@section('message')
@include('customer.partials.messages')
@endsection

@section('content')
<div class="content-main">
    <!-- start body -->
    <div class="wrapper">
        <!-- Page Content  -->
        <div id="content">
            <!-- Content -->
            <div class='p-4 d-flex flex-column' >
                <table class="table table-hover mt-3">
                    <thead style="background-color:#0d6efd; color:white;'"> 
                    <tr>
                        <th scope="col-6 col-md-4">Mã Hóa Đơn</th>
                        <th scope="col-6 col-md-4">Mã phòng</th>
                        <th scope="col-6 col-md-4">Thời gian</th>
                        <th scope="col-6 col-md-4">Tiền điện</th>
                        <th scope="col-6 col-md-4">Tiền nước</th>
                        <th scope="col-6 col-md-4">Tiền bãi xe</th>
                        <th scope="col-6 col-md-4">Khác</th>
                        <th scope="col-6 col-md-4">Thu thêm</th>
                        <th scope="col-6 col-md-4">Tổng</th>
                        <th scope="col-6 col-md-4">Tình Trạng</th>
                        <th scope="col-6 col-md-4">Tùy chỉnh</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($hoadons as $hoadon)
                        <tr>
                            <td>{{$hoadon->id}}</td>
                            <td>{{$hoadon->id_phong}}</td>
                            <td>{{$hoadon->thoigian}}</td>
                            <td>{{$hoadon->tiendien}}</td>
                            <td>{{$hoadon->tiennuoc}}</td>
                            <td>{{$hoadon->tienbaixe}}</td>
                            <td>{{$hoadon->khac}}</td>
                            <td>{{$hoadon->thuthem}}</td>
                            <td>{{$hoadon->thanhtien}}</td>
                            @if($hoadon->tinhtrang==0)
                                <td>Chưa thánh toán</td> 
                            @else
                                <td>Đã thanh toán</td>
                            @endif 

                                @if($hoadon->tinhtrang==0)
                                <td>
                                    <form action="" method="get">
                                        <button type="button" class="btn btn-primary me-md-3">
                                            <i class="fas fa-dollar-sign"></i> Thanh Toán
                                        </a>
                                    </form>
                                </td>
                                @endif 
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
</script>
@endsection