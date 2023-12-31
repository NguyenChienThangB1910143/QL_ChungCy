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
            <div class="modal fade" id="editphong">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Cập nhật phòng</h4>
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
            <div class="modal fade" id="addphong">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form method="POST" id="body_add" action="{{route('phong-store')}}" enctype="multipart/form-data">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between me-md-2 mt-1 mb-1">
                <div class="row">
                    <!-- Lọc theo tòa -->
                    <div class="form-group col-md-4 ml-3 text-left">
                        <select class="form-control" id="toa" onchange="location = this.value;">
                            <option value="{{ route('phong') }}">Chọn tòa</option>
                            @foreach ($toa as $item)
                                <option value="{{ route('phong', ['toa' => $item->id_toa]) }}" {{ request()->toa == $item->id_toa ? 'selected' : '' }}>{{ $item->ten }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <!-- Lọc theo tầng -->
                    <div class="form-group col-md-4 ml-3 text-left">
                        <select class="form-control" id="tang" onchange="location = this.value;">
                            <option value="{{ route('phong') }}">Chọn tầng</option>
                            @foreach ($tang as $item)
                                <option value="{{ route('phong', ['toa' => request()->toa, 'tang' => $item->id_tang]) }}" {{ request()->tang == $item->id_tang ? 'selected' : '' }}>{{ $item->ten }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <!-- Lọc theo tình trạng -->
                    <div class="form-group col-md-4 ml-3 text-left">
                        <select class="form-control" id="tinhtrang" onchange="location = this.value;">
                            <option value="{{ route('phong') }}">Tình trạng</option>
                            <option value="{{ route('phong', ['toa' => request()->toa, 'tang' => request()->tang, 'tinhtrang' => 0]) }}" {{ request()->tinhtrang == '0' ? 'selected' : '' }}>Còn trống</option>
                            <option value="{{ route('phong', ['toa' => request()->toa, 'tang' => request()->tang, 'tinhtrang' => 1]) }}" {{ request()->tinhtrang == '1' ? 'selected' : '' }}>Đã thuê</option>
                        </select>
                    </div>
                </div>
                
            <div>
                    <button class="btn btn-success" onclick=them_phong() type="button">
                        <i class="fas fa-plus"></i> Thêm</button>
                </div>
            </div>
            <!-- Content -->
            <div class='p-4 d-flex flex-column' >
                <table id="tbphong" class="table table-striped" style="width:100%">
                    <thead class="table-primary">
                    <tr>
                        <th scope="col-6 col-md-4">Tên phòng</th>
                        <th scope="col-6 col-md-4">Tên tầng</th>
                        <th scope="col-6 col-md-4">Tên tòa</th>
                        <th scope="col-6 col-md-4">Tình trạng</th>
                        <th scope="col-6 col-md-4">Tùy chỉnh</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($phong as $phong)
                        <tr>
                            <td>{{$phong->ten}}</td>
                            <td>{{$phong->ten_tang}}</td>
                            <td>{{$phong->ten_toa}}</td>
                            @if($phong->tinhtrang==0)
                                <td>Còn trống</td> 
                            @else
                                <td>Đã thuê</td>
                            @endif 
                            <td>
                                <form action="{{route('phong-chinhsua', $phong->id_phong)}}" method="get">
                                        <button type="button" onclick=capnhat_phong('{{$phong->id_phong}}') class="btn btn-primary me-md-3">
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

        function them_phong() {
            // $.get('{{Url("/design/edit")}}/' + id, function (data) {
            $.get('./phong/them', function(data) {
                $("#body_add").html(data);
            });
            $('#addphong').modal('show');
        }
        function capnhat_phong(id_phong) {
            $.get('./phong/chinhsua/' + id_phong, function(data) {
                $("#body_edit").html(data);
            });
            $('#editphong').modal('show');
        }
        $('#body_edit').submit(function(evt) {
            evt.preventDefault();
            var formData = new FormData(this);
            var id_phong = $("#id_phong").val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: './phong/update/' + id_phong,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    var successMessage = data.message;
                    $('#editphong').modal('hide');
                    window.location.href = './phong';
                },
            });
        });
    </script>
@endsection