@extends('customer.layouts.app')

@section('page-title', $title)

@section('customer.message')
@include('customer.partials.messages')
@endsection
@section('content')
<div class="container">
      <!-- Page Content  -->
      <div id="content">
        @php
        if(auth()->user()){
        }
        @endphp
        <div class="icon-row">
          <a href="{{route('profile')}}" class="icon-box">
            <div>
              <i class="	fas fa-address-card icon"></i>
              <h5>Thông tin cá nhân</h5>
            </div>
          </a>
          <a href="{{route('hoadoncustomer')}}" class="icon-box">
            <div>
              <i class="fas fa-file-alt icon" ></i>
              <h5>Hóa đơn</h5>
            </div>
          </a>
        </div>
        <div class="icon-row">
          <a href="" class="icon-box">
            <div>
              <i class="fas fa-clipboard icon"></i>
              <h5>Hợp Đồng</h5>
            </div>
          </a>
          <a href="{{route('baocaosc')}}" class="icon-box">
            <div>
              <i class="fas fa-bullhorn icon"></i>
              <h5>Báo cáo sự cố</h5>
            </div>
          </a>
        </div>
        <div class="icon-row">
          <a href="" class="icon-box">
            <div>
              <i class="fas fa-globe icon"></i>
              <h5>Tin Tức</h5>
            </div>
          </a>
          <a href="" class="icon-box">
            <div>
              <i class="fas fa-phone icon"></i>
              <h5>Liên Hệ</h5>
            </div>
          </a>
        </div>

              
      </div>
</div>
@endsection
