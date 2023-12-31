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
            <div class="modal fade" id="edithopdong">
                <div class="modal-dialog">
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
            </div>
            <div class="modal fade" id="addhopdong">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm Hợp Đồng</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form method="POST" id="body_add" action="{{route('hopdong-store')}}" enctype="multipart/form-data">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="chitiethopdong">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Chi Tiết Hợp Đồng</h4>
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
            <div class="d-flex align-items-center justify-content-between">
                <button class="btn btn-success me-md-2 m-2 " onclick=them_hopdong() type="button">
                    <i class="fas fa-plus"></i> Thêm
                </button>
                <form action="{{ route('hopdong') }}" method="get" class="d-flex align-items-center m-2">
                    <div class="input-group">
                        <select class="form-select" name="status">
                            <option value="">Chọn tình trạng</option>
                            <option value="active"{{ request()->status == 'active' ? ' selected' : '' }}>Còn hiệu lực</option>
                            <option value="expired"{{ request()->status == 'expired' ? ' selected' : '' }}>Hết hiệu lực</option>
                        </select>
                        <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-filter"></i></button>
                    </div>
                </form>
            </div>
            
            
            <div class='p-2 d-flex flex-column' >
                
                <table id="tbhopdong" class="table table-striped" style="width:100%">
                    <thead class="table-primary"> 
                        <tr>
                            <th >Mã HĐ</th>
                            <th >Tên khách</th>
                            <th >Tên quản lý</th>
                            <th >Mã phòng</th>
                            <th >Mã bãi xe</th>
                            <th >Ngày ký</th>
                            <th >Ngày hết hạn</th>
                            <th >Tình trạng</th>
                            <th >Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hopdong as $hopdongs)
                        <tr>
                            <td>{{$hopdongs->id_hopdong}}</td>
                            <td>{{$hopdongs->ten_user}}</td>
                            <td>{{$hopdongs->ten_ql}}</td>
                            <td>{{$hopdongs->ten_phong}}</td>
                            <td>{{$hopdongs->ms_baixe}}</td>
                            <td>{{$hopdongs->ngaybatdau}}</td>
                            <td>{{$hopdongs->ngayketthuc}}</td>
                            <td>{{ \Carbon\Carbon::parse($hopdongs->ngayketthuc)->isPast() ? 'Hết hiệu lực' : 'Còn hiệu lực' }}</td>
                            <td>
                                <button type="submit" onclick=chitiet_hopdong('{{$hopdongs->id_hopdong}}') class="btn btn-info me-md-1 m-1">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button type="button" onclick=capnhat_hopdong('{{$hopdongs->id_hopdong}}') class="btn btn-primary me-md-3">
                                    <i class="fas fa-edit"></i> Sửa
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
        function them_hopdong() {
            $.get('./hopdong/them', function(data) {
                $("#body_add").html(data);
            });
            $('#addhopdong').modal('show');
        }
        function capnhat_hopdong(id_hopdong) {
            $.get('./hopdong/capnhat/' + id_hopdong, function(data) {
                $("#body_edit").html(data);
            });
            $('#edithopdong').modal('show');
        }
        $('#body_edit').submit(function(evt) {
            evt.preventDefault();
            var formData = new FormData(this);
            var id_hopdong = $("#id_hopdong").val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: './hopdong/update/' + id_hopdong,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    var successMessage = data.message;
                    $('#edithopdong').modal('hide');
                    window.location.href = './hopdong';
                },
            });
        });
        function chitiet_hopdong(id_hopdong) {
        $.get('./hopdong/chitiet/' + id_hopdong, function(data) {
            $("#body_chitiet").html(data);
        });
        $('#chitiethopdong').modal('show');
    }

    </script>
@endsection