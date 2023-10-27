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
                <form id="filter-form">
                    <select name="month" id="month">
                        <option value="">Chọn tháng</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <select name="year" id="year">
                        <option value="">Chọn năm</option>
                        @for ($i = date('Y'); $i >= date('Y') - 10; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </form>
                
                
                <table class="table table-hover mt-3">
                    <thead style="background-color:#0d6efd; color:white;'"> 
                    <tr>
                        <th >Mã Hóa Đơn</th>
                        <th >Mã phòng</th>
                        <th >Thời gian</th>
                        <th >Tổng</th>
                        <th >Tình Trạng</th>
                        <th >Tùy chỉnh</th>
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
                            

                            <td style="display: flex;">
                                <button type="submit" onclick=chitiet_hoadon('{{$hoadon->id}}') class="btn btn-info me-md-3">
                                    <i class="fas fa-eye"></i> 
                                </button>
                                @if($hoadon->tinhtrang==0)
                                <form method="POST" action="{{ url('/payment/create/' . $hoadon->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary me-md-3" name="redirect">Thanh toán</button>
                                </form>
                                @endif 
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $hoadons->links() }}
                
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
    $('#month, #year').on('change', function() {
    var month = $('#month').val();
    var year = $('#year').val();

    if (month && year) {
        $.ajax({
            url: '{{ route('hoadoncustomer-filter') }}',
            type: 'GET',
            data: {
                month: month,
                year: year
            },
            success: function(data) {
    var tableBody = '';
    $.each(data, function(key, hoadon) {
        tableBody += '<tr>';
        tableBody += '<td>' + hoadon.id + '</td>';
        tableBody += '<td>' + hoadon.id_phong + '</td>';
        tableBody += '<td>' + hoadon.thoigian + '</td>';
        tableBody += '<td>' + hoadon.thanhtien + '</td>';

        var hethan = new Date(hoadon.thoigian);
        hethan.setDate(hethan.getDate() + 14);
        var baygio = new Date();

        if(hoadon.tinhtrang == 0) {
            if(baygio > hethan) {
                tableBody += '<td style="color: red">Hết hạn</td>';
            } else {
                tableBody += '<td>Chưa thanh toán</td>';
            }
        } else {
            tableBody += '<td>Đã thanh toán</td>';
        }

        tableBody += '<td><button type="submit" onclick=chitiet_hoadon("' + hoadon.id + '") class="btn btn-info me-md-1 m-1"><i class="fas fa-eye"></i></button>';

        if(hoadon.tinhtrang == 0) {
            tableBody += '<form method="POST" action="{{ url("/payment/create/" . ' + hoadon.id + ') }}"><button type="submit" class="btn btn-primary me-md-3" name="redirect">Thanh toán qua VNPay</button></form>';
        }

        tableBody += '</td></tr>';
    });
    $('table tbody').html(tableBody);
}

        });
    }
});
</script>
@endsection