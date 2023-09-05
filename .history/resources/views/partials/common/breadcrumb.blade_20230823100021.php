<ol class="breadcrumb" style="color:white">
    @if(mb_strtolower($title)!='trang chủ')
        <li class="breadcrumb-item"><a href="{{route('home')}}">Trang Chủ</a></li>
        @foreach($breadcrumbs as $key =>$breadcrumb)
            <li class="breadcrumb-item {{($key+1==count($breadcrumbs))?'active':''}}"><a href="{{$breadcrumb['link']}}">{{$breadcrumb['name']}}</a></li>
        @endforeach
    @else
        <li class="breadcrumb-item"><a href="{{route('home')}}">Trang Chủ</a></li>
    @endif
    @if(Auth::check())
            <div class="col-auto justify-content-end align-items-end desktop-only user-header" id="logoutButtonDesktop">
                <div class="input-group" style="align-items: center;">
                    <span class="p-2" style="color:white">{{(auth()->user()!=null)?auth()->user()->name:''}}</span>
                    <a href="{{route('logout')}}">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                        </div>
                    </a>
                </div>

            </div>
            @endif
</ol>