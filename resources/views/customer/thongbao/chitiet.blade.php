@csrf
            <div class="container col-md-auto mt-2">
                <div class="alert alert-primary">
                    
                    @foreach($cttb as $cttbs)
                    <form method="post" action="{{route('thongbaoct-chitiet', $cttbs->id_thongbao)}}">
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
                                    <div style="cursor: default;" class="col-6 col-sm-6">Mã TB:</div>
                                    <label name="id" class="col-6 col-sm-6 text-view">{{$cttbs->id_thongbao}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Người gửi:</div>
                                    <p name="nguoigui" class="col-6 col-sm-6 text-view"><td>{{ \App\Models\User::find($cttbs->id_user)->name }}</td></p>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Người nhận:</div>
                                    <p name="nhan" class="col-6 col-sm-6 text-view">
                                        <td>
                                            @if($cttbs->nhan == 0)
                                                Tất cả
                                            @else
                                                {{ \App\Models\User::find($cttbs->nhan)->name }}
                                            @endif
                                        </td>
                                    </p>
                                </div>                                
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Tiêu đề:</div>
                                    <label name="tieude" class="col-6 col-sm-6 text-view">{{$cttbs->tieude}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Thời gian viết:</div>
                                    <label name="thoigian" class="col-6 col-sm-6 text-view">{{$cttbs->thoigian}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Nội dung:</div>
                                    <p name="noidung" class="col-6 col-sm-6 text-view">{!! $cttbs->noidung !!}</p>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>