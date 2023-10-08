@extends('customer.layouts.app')


@section('page-title', $title)

@section('customer.message')
@include('customer.partials.messages')
@endsection
@section('content')
<div class="content-main">
  <!--  start slide bar  -->
  <div class="wrapper">
    <!-- Sidebar  -->
    @include('customer.partials.common.slide-bar')

    <!-- Page Content  -->
    <div id="content">
      @include('customer.partials.common.tieude')
      @php
      if(auth()->user()){
      }
      @endphp
  @endsection