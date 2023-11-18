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
            <div class="modal fade" id="addNuoc">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm Tiền Nước</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form method="POST" id="body_add" action="{{route('nuoc-store')}}" enctype="multipart/form-data">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Content -->
            <div class="d-grid gap-2 d-md-flex justify-content-md-start ms-3 mt-3">
                    <button class="btn btn-primary me-md-2 mt-1 mb-1" type="button" onclick=them_nuoc()>
                        <i class="fas fa-plus"></i> &nbsp Thêm tiền nước</button>
                </div>
            <div class='p-4 d-flex flex-column' >
                
                <table id="tbnuoc" class="table table-striped" style="width:100%">
                    <thead class="table-primary"> 
                        <tr>
                            <th >id</th>
                            <th >Tên Phòng</th>
                            <th >Chỉ số cũ</th>
                            <th >Chỉ số mới</th>
                            <th >Thời gian</th>
                            <th >Đơn giá</th>
                            <th >Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nuocs as $nuoc)
                        <tr>
                            <td>{{$nuoc->id}}</td>
                            <td>{{$nuoc->ten_phong}}</td>
                            <td>{{$nuoc->chiso_cu}}</td>
                            <td>{{$nuoc->chiso_moi}}</td>
                            <td>{{$nuoc->thoigian}}</td>
                            <td>{{$nuoc->dongia}}</td>
                            <td>{{$nuoc->thanhtien}}</td>

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

    function them_nuoc() {
        $.get('./nuoc/them', function(data) {
            $("#body_add").html(data);
        });
        $('#addNuoc').modal('show');
    }
</script>
@endsection