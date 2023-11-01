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
            <div class="modal fade" id="addphanhoi">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm phản hồi</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form id="body_add" class="form-horizontal" action="{{route('phanhoi.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class='p-4 d-flex flex-column' >
                
                <table id="tbbaocaosc" class="table table-striped" style="width:100%">
                    <thead class="table-primary"> 
                        <tr>
                            <th>Họ Tên</th>
                            <th>Mã phòng</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Hình</th>
                            <th>Thời gian</th>
                            <th>Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bcsc as $bc)
                        <tr>
                            <td>{{$bc->name }}</td>
                            <td>{{$bc->id_phong}}</td>
                            <td>{{$bc->tieude}}</td>
                            <td>{{$bc->noidung}}</td>
                            <td><img src="{{ asset('/' . $bc->hinh) }}" alt="Hình ảnh" width="50px" height="50px">
                            </td>
                            <td>{{$bc->thoigian}}</td>
                            <td>
                                <div class="d-flex ">
                                    <form action="{{ route('phanhoi.them',  $bc->id_baocao)}}" method="get">
                                        <button type="button" onclick=them_phanhoi('{{$bc->id_baocao}}') class="btn btn-primary me-md-1 m-1">
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
    $('.close').click(function() {
            $('.modal').modal('hide');
        });
    function them_phanhoi(id_baocao) {
            $.get('./phanhoi/them/' + id_baocao, function(data) {
                $("#body_add").html(data);
            });
            $('#addphanhoi').modal('show');
        }
</script>
@endsection