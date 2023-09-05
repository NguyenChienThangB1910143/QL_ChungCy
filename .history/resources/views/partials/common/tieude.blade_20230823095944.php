<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid justify-content-start" style="height:35px">
        <button type="button" id="sidebarCollapse" class="btn btn-sm m-2 hidden-mobile" style="color:#1050aa;background-color:white">
            <i class="fas fa-align-left"></i>
        </button>
        <!-- page show in mobile -->
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto m-2 hidden-window" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>
        <nav aria-label="breadcrumb " style="height:25px">
            @include('partials.common.breadcrumb')
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
        </nav>
        <!-- menu in mobile -->
        @include('partials.common.mobile-menu')
    </div>
</nav>