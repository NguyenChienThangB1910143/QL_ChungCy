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

                <table id="tbbaocaosc" class="table table-striped" style="width:100%">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start ms-3 mt-3">
                        <button class="btn btn-primary me-md-2 mt-1 mb-1" type="button" onclick=them_baocao()>
                            <i class="fas fa-plus"></i> &nbsp Gửi báo cáo sự cố</button>
                    </div>
                    <thead class="table-primary"> 
                    <tr>
                        <th >Mã báo cáo</th>
                        <th >Mã phòng</th>
                        <th >Tiêu đề</th>
                        <th >Nội dung</th>
                        <th>Hình</th>
                        <th >Thời gian</th>
                        <th >Tùy chỉnh</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($baocaosc as $baocao)
                        <tr>
                            <td>{{$baocao->id_baocao}}</td>
                            <td>{{$baocao->id_phong}}</td>
                            <td>{{$baocao->tieude}}</td>
                            <td>{{$baocao->noidung}}</td>
                            <td><img src="{{ asset('/' . $baocao->hinh) }}" alt="Hình ảnh" width="50px" height="50px">
                                </td>

                            <td>{{$baocao->thoigian}}</td>
                            <td>
                                @if( \App\Models\PhanHoi::where('id_baocao', $baocao->id_baocao)->exists())
                                    <button type="submit" onclick=phanhoi_baocao('{{$baocao->id_baocao}}') class="btn btn-info">
                                        <i class="fas fa-comment"></i> xem phản hồi
                                    </button>
                                @endif
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