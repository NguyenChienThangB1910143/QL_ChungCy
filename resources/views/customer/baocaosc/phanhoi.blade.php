@csrf
            <div class="container col-md-auto mt-2">
                <div class="alert alert-primary">
                    
                    @foreach($phanhoibc as $phbc)
                    <form method="post" action="{{route('baocao-phanhoi', $phbc->id_baocao)}}">
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
                                    <div style="cursor: default;" class="col-6 col-sm-6">Mã báo cáo:</div>
                                    <label name="id" class="col-6 col-sm-6 text-view">{{$phbc->id_baocao}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Thời gian viết:</div>
                                    <label name="thoigian" class="col-6 col-sm-6 text-view">{{$phbc->thoigian}}</label>
                                </div>

                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Tiêu đề:</div>
                                    <label name="tieude" class="col-6 col-sm-6 text-view">{{$phbc->tieude}}</label>
                                </div>
                                <div class="row mb-1">
                                    <div style="cursor: default;" class="col-6 col-sm-6">Nội dung:</div>
                                    <p name="noidung" class="col-6 col-sm-6 text-view">{!! $phbc->noidung !!}</p>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>