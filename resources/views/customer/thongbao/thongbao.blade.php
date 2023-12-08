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
            <div class="modal fade" id="chitietthongbao">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Chi Tiết Thông báo</h4>

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
            <div class='p-4 d-flex flex-column' >
                <table id="tbthongbaoCT" class="table table-striped" style="width:100%">
                    <thead class="table-primary"> 
                        <tr>
                            <th>Tiêu Đề</th>
                            <th>Nội Dung</th>
                            <th>Người Gửi</th>
                            <th>Thời Gian</th>
                            <th>Người Nhận</th>
                            <th>Tùy chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($thongbaoCT as $tb)
                        <tr>
                            <td>{{ \Illuminate\Support\Str::limit($tb->tieude, 30, '...') }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($tb->noidung, 30, '...') }}</td>
                            <td>{{ \App\Models\User::find($tb->id_user)->name }}</td>
                            <td>{{ $tb->thoigian }}</td>
                            <td>
                                @if($tb->nhan == 0)
                                    Tất cả
                                @else
                                    {{ \App\Models\Phong::find($tb->nhan)->ten }}
                                @endif
                            </td>
                            <td class="d-flex justify-content-start">
                                <button type="submit" onclick=chitiet_thongbao('{{$tb->id_thongbao}}') class="btn btn-info me-md-3">
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
        function chitiet_thongbao(id_thongbao) {
        $.get('./thongbao/chitiet/' + id_thongbao, function(data) {
            $("#body_chitiet").html(data);
        });
        $('#chitietthongbao').modal('show');
    }
    </script>
@endsection