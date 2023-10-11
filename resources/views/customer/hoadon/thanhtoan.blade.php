
@csrf
            <div class="container col-md-auto mt-2">
                <div class="alert alert-primary">
                    
                    @foreach($thanhtoanhd as $thanhtoan)
                    <form method="post" action="{{route('hoadoncustomer-thanhtoan', $thanhtoan->id)}}">
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
                                    <div style="cursor: default;" class="col-6 col-sm-6">Mã hóa đơn:</div>
                                    <label name="id" class="col-6 col-sm-6 text-view">{{$thanhtoan->id}}</label>
                                </div>

                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Mã phòng:</div>
                                    <label name="id_phong" class="col-6 col-sm-6 text-view">{{$thanhtoan->id_phong}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Tiền điện:</div>
                                    <label name="tiendien" class="col-6 col-sm-6 text-view">{{$thanhtoan->tiendien}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Tiền Nước:</div>
                                    <p name="tiennuoc" class="col-6 col-sm-6 text-view">{!! $thanhtoan->tiennuoc !!}</p>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Tiền bãi xe:</div>
                                    <p name="tienbaixe" class="col-6 col-sm-6 text-view">{!! $thanhtoan->tienbaixe !!}</p>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Khác:</div>
                                    <p name="khac" class="col-6 col-sm-6 text-view">{!! $thanhtoan->khac !!}</p>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Thu thêm:</div>
                                    <p name="thuthem" class="col-6 col-sm-6 text-view">{!! $thanhtoan->thuthem !!}</p>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Thành tiền:</div>
                                    <p name="thanhtien" class="col-6 col-sm-6 text-view">{!! $thanhtoan->thanhtien !!}</p>
                                </div>
                                <div class="row justify-content-center">
                                    <form method="POST" action="{{ url('/payment/create') }}">
                                        @csrf
                                        <!-- Thêm các trường thông tin thanh toán tại đây -->
                                        <button type="submit">Thanh toán qua VNPay</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>