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
                @if($hopdongCT->isempty())
            <div class="card text-center shadow" style="width: 18rem; margin: auto; border-radius: 25px;">
                <div class="card-body">
                  <h4  class="card-title bg-info rounded">Thông báo</h4>
                  <p class="card-text">Người dùng chưa có hợp đồng.</p>
                </div>
              </div>
              
              
                @else
                <table id="tbhopdongCT" class="table table-striped" style="width:100%">
                    <thead class="table-primary"> 
                        <tr>
                            <th>Mã HĐ</th>
                            <th>Tên khách</th>
                            <th>Tên quản lý</th>
                            <th>Mã phòng</th>
                            <th>Mã bãi xe</th>
                            <th>Ngày ký</th>
                            <th>Ngày hết hạn</th>
                            <th>Tình trạng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hopdongCT as $hd)
                        <tr>
                            <td>{{$hd->id_hopdong}}</td>
                            <td>{{$hd->ten_user}}</td>
                            <td>{{$hd->ten_ql}}</td>
                            <td>{{$hd->ten_phong}}</td>
                            <td>{{$hd->ms_baixe}}</td>
                            <td>{{$hd->ngaybatdau}}</td>
                            <td>{{$hd->ngayketthuc}}</td>
                            <td>{{ \Carbon\Carbon::parse($hd->ngayketthuc)->isPast() ? 'Hết hiệu lực' : 'Còn hiệu lực' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>     
                @endif           
            </div>
        </div>
        <!-- end body -->
    </div>
    @endsection
    @section('JS')
@endsection