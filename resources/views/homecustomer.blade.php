@extends('layouts.app')


@section('page-title', $title)

@section('message')
@include('partials.messages')
@endsection
@section('content')
<div class="content-main">
  <!--  start slide bar  -->
  <div class="wrapper">
    <!-- Sidebar  -->
    @include('partials.common.slide-bar')

    <!-- Page Content  -->
    <div id="content">
      @include('partials.common.tieude')
      @php
      if(auth()->user()){
      }
      @endphp
      <div class="container text-center p-2">
        <div class="row align-items-center gx-2  row-item-home">
          <div class="col-6 col-md-4 rounded-3 border border-dark">
            <a href="{{route('phong')}}" class="item-home d-flex align-items-center justify-content-center">
              <div>
                <i class="fas fa-broadcast-tower"></i>
                <h4>Phong</h4>
              </div>
            </a>
          </div>
          <div class="col-6 col-md-4 rounded-3 border border-dark">
            <a href="{{route('hopdong')}}" class="item-home d-flex align-items-center justify-content-center">
              <div>
                <i class="fas fa-file-alt"></i>
                <h4>Hợp đồng</h4>
              </div>
            </a>
          </div>
          <div class="col-6 col-md-4 rounded-3 border border-dark">
            <a href="{{route('tang')}}" class="item-home d-flex align-items-center justify-content-center">
              <div>
                <i class="fas fa-building"></i>
                <h4>Tầng</h4>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection