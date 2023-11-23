@extends('customer.layouts.app')

@section('page-title', $title)

@section('customer.message')
@include('customer.partials.messages')
@endsection
@section('content')
<div class="pt-5 container">
      <!-- Page Content  -->
      <div id="content" class="row">
        <!-- Left side with automatic running banner -->
        <div class="col-md-6">
          {{-- <div id="carouselExampleIndicators" class="carousel slide shadow" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1" ></li>
              <!-- Add more indicators as needed -->
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('img/bg.jpg') }}" class="d-block w-100 rounded" alt="..." height="336px" >
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/bn1.jpg') }}" class="d-block w-100 rounded" alt="..."  height="336px">
              </div>
              <!-- Add more items as needed -->
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only"></span>
            </a>
          </div> --}}
          <div class="carousel-item active">
            <img src="{{ asset('img/animation2.gif') }}" class="d-block w-100 rounded" alt="..." height="336px" >
          </div>
        </div>

        <!-- Right side with icons -->
        <div class=" pt-2 col-md-6">
          <!-- Your existing icon code goes here -->
          <div class="icon-row">
            <a href="{{route('profile')}}" class="icon-box shadow">
              <div>
                <i class="	fas fa-address-card icon"></i>
                <h5>Thông tin cá nhân</h5>
              </div>
            </a>
            <a href="{{route('hoadoncustomer')}}" class="icon-box shadow">
              <div>
                <i class="fas fa-file-alt icon" ></i>
                <h5>Hóa đơn</h5>
              </div>
            </a>
          </div>
          <div class="icon-row">
            <a href="{{route('hopdongCT')}}" class="icon-box shadow">
              <div>
                <i class="fas fa-clipboard icon"></i>
                <h5>Hợp Đồng</h5>
              </div>
            </a>
            <a href="{{route('baocaosc')}}" class="icon-box shadow">
              <div>
                <i class="fas fa-bullhorn icon"></i>
                <h5>Báo cáo sự cố</h5>
              </div>
            </a>
          </div>
          <div class="icon-row">
            <a href="{{route('tintuccustomer')}}" class="icon-box shadow">
              <div>
                <i class="fas fa-globe icon"></i>
                <h5>Tin Tức</h5>
              </div>
            </a>
            <a href="" class="icon-box shadow">
              <div>
                <i class="fas fa-phone icon"></i>
                <h5>Liên Hệ</h5>
              </div>
            </a>
          </div>
        </div>
      </div>
</div>
@endsection
