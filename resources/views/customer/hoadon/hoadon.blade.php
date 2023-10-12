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
                <div class="modal fade" id="chitiethoadon">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Chi Tiết Hóa Đơn</h4>
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
                <table class="table table-hover mt-3">
                    <thead style="background-color:#0d6efd; color:white;'"> 
                    <tr>
                        <th scope="col-6 col-md-4">Mã Hóa Đơn</th>
                        <th scope="col-6 col-md-4">Mã phòng</th>
                        <th scope="col-6 col-md-4">Thời gian</th>
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
                            <td>{{$hoadon->thanhtien}}</td>
                            @php
                                $hethan = \Carbon\Carbon::parse($hoadon->thoigian)->addDays(14);
                                $baygio = \Carbon\Carbon::now();
                            @endphp
                            @if($hoadon->tinhtrang==0)
                                @if($baygio->greaterThan($hethan))
                                    <td style="color: red">Hết hạn</td>
                                @else
                                    <td>Chưa thanh toán</td>
                                @endif
                            @else
                                <td>Đã thanh toán</td>
                            @endif
                            

                            <td>
                                    <button type="submit" onclick=chitiet_hoadon('{{$hoadon->id}}') class="btn btn-info me-md-1 m-1">
                                        <i class="fas fa-eye"></i> 
                                    </button>
                                    @if($hoadon->tinhtrang==0)
                                    <form method="POST" action="{{ url('/payment/create/' . $hoadon->id) }}">
                                        @csrf
                                        <!-- Thêm các trường thông tin thanh toán tại đây -->
                                        <button type="submit" class="btn btn-primary me-md-3" name="redirect">Thanh toán qua VNPay</button>
                                    </form>
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
<script>
    $('.close').click(function() {
        $('.modal').modal('hide');
    });
    function chitiet_hoadon(id) {
        $.get('./hoadon/chitiet/' + id, function(data) {
            $("#body_chitiet").html(data);
        });
        $('#chitiethoadon').modal('show');
    }
</script>
@endsection