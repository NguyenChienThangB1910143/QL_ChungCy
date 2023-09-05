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
            <div class="modal fade" id="edittoa">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Cập Nhật Tòa</h4>
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
            </div>
            <div class="modal fade" id="addtoa">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm Tòa</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form method="POST" id="body_add" action="{{route('toa-store')}}" enctype="multipart/form-data">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class='p-4 d-flex flex-column' >
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-success me-md-2 mt-1 mb-1" onclick=them_toa() type="button">
                        <i class="fas fa-plus"></i> Thêm</button>
                </div>
                <table class="table table-hover mt-3">
                    <thead style="background-color:#0d6efd; color:white;'"> 
                        <tr>
                            <th scope="col-6 col-md-4">Mã tòa</th>
                            <th scope="col-6 col-md-4">Tên tòa</th>
                            <th scope="col-6 col-md-4">Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($toa as $toa)
                        <tr>
                            <td>{{$toa->id_toa}}</td>
                            <td>{{$toa->ten}}</td>
                            <td>
                                <form action="{{route('toa-chinhsua', $toa->id_toa)}}" method="get">
                                        <button type="button" onclick=capnhat_toa('{{$toa->id_toa}}') class="btn btn-primary me-md-3">
                                            <i class="fas fa-edit"></i> Sửa
                                        </a>
                                    </form>
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

        function them_toa() {
            // $.get('{{Url("/design/edit")}}/' + id, function (data) {
            $.get('./toa/them', function(data) {
                $("#body_add").html(data);
            });
            $('#addtoa').modal('show');
        }
        function capnhat_toa(id_toa) {
            $.get('./toa/chinhsua/' + id_toa, function(data) {
                $("#body_edit").html(data);
            });
            $('#edittoa').modal('show');
        }
        $('#body_edit').submit(function(evt) {
            evt.preventDefault();
            var formData = new FormData(this);
            var id_toa = $("#id_toa").val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: './toa/update/' + id_toa,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    var successMessage = data.message;
                    $('#edittoa').modal('hide');
                    window.location.href = './toa';
                },
            });
        });
    </script>
@endsection