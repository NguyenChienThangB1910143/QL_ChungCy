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
                    <button class="btn btn-warning me-md-2 mt-1 mb-1" type="button" id="btnLocHetHan">
                            <i class="fas fa-filter"></i> &nbsp Lọc hóa đơn hết hạn</button>
                </div>
            <div class='p-4 d-flex flex-column' >
                
                <table id="tbhoadonad" class="table table-striped" style="width:100%">
                    <thead class="table-primary"> 
                        <tr>
                            <th >id</th>
                            <th >Tên Phòng</th>
                            <th >Thời gian</th>
                            <th >Tiền điện</th>
                            <th >Tiền nước</th>
                            <th >Tiền bãi xe</th>
                            <th >Khác</th>
                            <th >Thu thêm</th>
                            <th >Thành tiền</th>
                            <th >Tình trạng</th>
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
    $('#btnLocHetHan').click(function() {
    window.location.href = "{{ route('hoadon-hethan') }}";
    });

</script>
@endsection