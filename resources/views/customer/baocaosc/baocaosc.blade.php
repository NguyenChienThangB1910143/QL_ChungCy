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
            <div class="modal fade" id="phanhoibaocao">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Phản hồi báo cáo</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display:none"></div>
                            <form method="GET" id="body_phanhoi"  enctype="multipart/form-data">
                                @csrf
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class='d-flex flex-column' >
                <div class="modal fade" id="addBaoCaoSC">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Gửi báo cáo sự cố</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="alert alert-danger" style="display:none"></div>
                                <form method="POST" id="body_add" action="{{route('baocao-store')}}" enctype="multipart/form-data">
    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-hover ">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start ms-3 mt-3">
                        <button class="btn btn-primary me-md-2 mt-1 mb-1" type="button" onclick=them_baocao()>
                            <i class="fas fa-plus"></i> &nbsp Gửi báo cáo sự cố</button>
                    </div>
                    <thead style="background-color:#0d6efd; color:white;'"> 
                    <tr>
                        <th scope="col-6 col-md-4">Mã báo cáo</th>
                        <th scope="col-6 col-md-4">Mã phòng</th>
                        <th scope="col-6 col-md-4">Tiêu đề</th>
                        <th scope="col-6 col-md-4">Nội dung</th>
                        <th scope="col-6 col-md-4">Thời gian</th>
                        <th scope="col-6 col-md-4">Tùy chỉnh</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($baocaosc as $baocao)
                        <tr>
                            <td>{{$baocao->id_baocao}}</td>
                            <td>{{$baocao->id_phong}}</td>
                            <td>{{$baocao->tieude}}</td>
                            <td>{{$baocao->noidung}}</td>
                            <td>{{$baocao->thoigian}}</td>
                            <td>
                                    <button type="submit" onclick=phanhoi_baocao('{{$baocao->id_baocao}}') class="btn btn-info me-md-1 m-1">
                                        <i class="fas fa-comment"></i> xem phản hồi
                                    </button>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $baocaosc->links() }}
                
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
    function phanhoi_baocao(id_baocao) {
        $.get('./baocaosc/phanhoi/' + id_baocao, function(data) {
            $("#body_phanhoi").html(data);
        });
        $('#phanhoibaocao').modal('show');
    }
    function them_baocao() {
        $.get('./baocaosc/them', function(data) {
            $("#body_add").html(data);
        });
        $('#addBaoCaoSC').modal('show');
    }
</script>
@endsection