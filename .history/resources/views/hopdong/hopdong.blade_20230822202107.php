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
            <!-- start modal ajax edit--->
            <!-- <div class="modal fade" id="editHopDong">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Cập Nhật Hợp Đồng</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form id="body_edit" class="form-horizontal" method="post" enctype="multipart/form-data">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
            <!--  end modal ajax edit--->
            <!-- Content -->
            <!-- <?php $stt = 1 ?>
            @if (!empty($request->search)&&$hopdong->count() <= 0) <h3 class="container">Hợp đồng đã tìm kiếm không tồn tại</h3>
                @else -->
                <div class="container" style="min-width:98%">
                    <!-- start search -->
                    @include('partials.common.search')
                    <!-- end search  -->
                    @csrf
                    <!--import-->
                        <div class="text-left">
                            <ul class="text-left">Chú thích:
                                <li class="text-warning">Màu cam: Hợp đồng đã hết hạn</li>
                                <li class="text-dark">Màu đen: Hợp đồng chưa hết hạn</li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead style="background-color:#0d6efd; color:white;'">
                                        <tr>
                                            <th scope="col-6 col-md-4" style="min-width: 100px;">id</th>
                                            <th scope="col-6 col-md-4">Tên khách hàng</th>
                                            <th scope="col-6 col-md-4">Tên quản lý</th>
                                            <th scope="col-6 col-md-4">Mã phòng</th>
                                            <th scope="col-6 col-md-4">Bãi xe</th>
                                            <th scope="col-6 col-md-4">Ngày ký</th>
                                            <th scope="col-6 col-md-4" style="min-width: 120px;">Ngày hết hạn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($hopdong as $row)
                                        <!-- @php
                                        $ngayhethan = \Carbon\Carbon::parse($row->HD_NgayHetHan);
                                        $now = \Carbon\Carbon::now();
                                        $diffInDays = 0;
                                        if($ngayhethan>$now){
                                        $diffInDays = $now->diffInDays($ngayhethan);
                                        }else{
                                        $diffInDays = -$now->diffInDays($ngayhethan);
                                        }
                                        $color = "";
                                        if($diffInDays<=30){ //do $color="red" ; }else if($diffInDays>30){
                                            if($diffInDays>60){ //xanh
                                            $color = "black";
                                            }else{//cam
                                            $color = "orange";
                                            }
                                            }
                                            if ($diffInDays < 31) { $unit="ngày" ; } elseif ($diffInDays < 365) { $diffInDays=round($diffInDays / 30); $unit="tháng" ; } else { $diffInDays=round($diffInDays / 365); $unit="năm" ; } 
                                            @endphp -->
                                             <tr style="color: {{$color}};">
                                                <input type="hidden" value="{{$row->id_hopdong}}" name="HD[{{$row->id_hopdong}}]">
                                                <td style="">{{$row->id_hopdong}}</td>
                                                <td style="">{{$row->id_user}}</td>
                                                <td style="">{{$row->id_ql}}</td>
                                                <td style="">{{$row->id_phong}}</td>
                                                <td style="">{{$row->id_baixe}}</td>
                                                <td style="">{{\Carbon\Carbon::parse($row->ngaybatdau)->format('d/m/Y')}}</td>
                                                <td style="">{{\Carbon\Carbon::parse($row->ngayketthuc)->format('d/m/Y')}}</td>
                                                <td>
                                                    <a onclick=capnhat_hopdong('{{$row->HD_MaHD}}')  class="btn btn-primary me-md-3" >
                                                        <i class="fas fa-edit" style="color:white"></i> 
                                                    </a>
                                                    @endif
                                                    <a class="btn btn-outline-warning" href="{{ $row->HD_HDScan }}"><i class="fas fa-file" style="color:orange"></i> .PDF</a>
                                                </td>
                                                </tr>
                                                @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $hopdong->links() }}
                        </div>
                    </form>
                    <!-- <div class="alert" style="text-align: center;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Hướng dẫn sử dụng</button>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content" style="height: 100%;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Hướng dẫn chi tiết</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe width="100%" height="500px" class="" src="https://docs.google.com/document/d/e/2PACX-1vRWb1Uq5c6C_cjv_ThdRwfrXjXuozhnauS36ba70nUZeGbd_YBpZItZhUjZkG21VXiAsX0a2gRFQi4c/pub?embedded=true" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->


                    
                </div>
                @endif
        </div>
    </div>
    <!-- end body -->
</div>
@endsection