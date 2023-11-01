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
            <div class="modal fade" id="chitiettintuc">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Chi Tiết Tin Tức</h4>
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
            <!-- Content -->
            <div class='p-4 d-flex flex-column' >
                <table class="table table-hover mt-3">
                    <thead style="background-color:#0d6efd; color:white;'"> 
                        <tr>
                            <th scope="col-6 col-md-4">Mã tin</th>
                            <th scope="col-6 col-md-4">Tiêu đề</th>
                            <th scope="col-6 col-md-4">Tên người viết</th>
                            <th scope="col-6 col-md-4">Thời gian</th>
                            <th scope="col-6 col-md-4">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tintucs as $tintuc)
                        <tr>
                            <td>{{$tintuc->id}}</td>
                            <td>{{$tintuc->tieude}}</td>
                            <td>{{$tintuc->ten_user}}</td>
                            <td>{{$tintuc->thoigian}}</td>
                            <td>
                                
                                    <button type="submit" onclick=chitiet_tintuc('{{$tintuc->id}}') class="btn btn-info">
                                        <i class="fas fa-eye"></i> 
                                    </button>
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
        function chitiet_tintuc(id) {
        $.get('./tintuc/chitiet/' + id, function(data) {
            $("#body_chitiet").html(data);
        });
        $('#chitiettintuc').modal('show');
    }
    </script>
@endsection