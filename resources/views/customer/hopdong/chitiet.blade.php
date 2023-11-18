@csrf
            <div class="container col-md-auto mt-2">
                <div class="alert alert-primary">
                    
                    @foreach($chitiethopdongCT as $chitietCT)
                    <form method="post" action="{{route('hopdong-chitietCT', $chitietCT->id_hopdong)}}">
                        @csrf
                        <div class="row justify-content-center mb-2">
                            <div class="container">
                                <style>
                                    .text-view {
                                        color: #212529;
                                        text-align: center;
                                        display: inline-block;
                                        font-weight: 400;
                                        line-height: 1.5;
                                        cursor: text;
                                        border: 1px solid transparent;
                                        padding: 0.375rem 0.75rem;
                                        font-size: 1rem;
                                    }
                                </style>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Mã hợp đồng:</div>
                                    <label name="id_hopdong" class="col-6 col-sm-6 text-view">{{$chitietCT->id_hopdong}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Tên khách hàng:</div>
                                    <label name="ten_user" class="col-6 col-sm-6 text-view">{{$chitietCT->ten_user}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Tên quản lý:</div>
                                    <label name="ten_ql" class="col-6 col-sm-6 text-view">{{$chitietCT->ten_ql}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Phòng:</div>
                                    <label name="ten_phong" class="col-6 col-sm-6 text-view">{{$chitietCT->ten_phong}}</label>
                                </div>

                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Bãi xe:</div>
                                    <label name="ms_baixe" class="col-6 col-sm-6 text-view">{{$chitietCT->ms_baixe}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Nội dung:</div>
                                    <label name="noidung" class="col-6 col-sm-6 text-view">{{$chitietCT->noidung}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Gía thuê:</div>
                                    <label name="gia" class="col-6 col-sm-6 text-view">{{$chitietCT->gia}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Ngày bắt đầu:</div>
                                    <label name="ngaybatdau" class="col-6 col-sm-6 text-view">{{$chitietCT->ngaybatdau}}</label>
                                </div>

                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Ngày kết thúc:</div>
                                    <label name="ngayketthuc" class="col-6 col-sm-6 text-view">{{$chitietCT->ngayketthuc}}</label>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>