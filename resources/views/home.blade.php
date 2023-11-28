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
      <div class="container text-center p-2">
        <div class="row">
          <div class="col-md-3">
            <div class="card shadow bg-success text-white">
              <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                  <p class="card-title">Phòng đã thuê</p>
                  <h5 class="card-title">{{ $phong1 }} / {{ $phong }}</h5>
                </div>
                <i class="fas fa-home fa-3x"></i>
              </div>
            </div>
            
          </div>
          <div class="col-md-3">
            <div class="card shadow bg-warning text-white">
              <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                  <p class="card-title">Bãi xe đã thuê</p>
                  <h5 class="card-title">{{ $baixe1 }} / {{ $baixe }}</h5>
                </div>
                <i class="fas fa-car fa-3x"></i>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card shadow bg-secondary text-white">
              <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                  <p class="card-title">Hợp đồng hiệu lực</p>
                  <h5 class="card-title">{{ $hopdong }}</h5>
                </div>
                <i class="fas fa-file-alt fa-3x"></i>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card shadow bg-info text-white">
              <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                  <p class="card-title">Người dùng </p>
                  <h5 class="card-title">{{ $user }}</h5>
                </div>
                <i class="fas fa-users fa-3x"></i>
              </div>
            </div>
          </div>
        </div>
          <!-- Form to select year -->
          <form id="yearForm" method="GET" action="{{ route('home') }}">
            <div class="form-group mt-3">
                <label for="year">Biểu đồ hợp đồng năm:</label>
                <select id="year" name="year" required onchange="updateChart(this.value)">
                    @for ($i = 2000; $i <= date('Y'); $i++)
                        <option value="{{ $i }}" {{ $i == date('Y') ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </form>
        
        
        <!-- Chart container -->
        <div class="container" style="width: 900px; " >
            <div class="chart">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        
      </div>
    </div>
  </div>
  @endsection

  @section('JS')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script>
      var myChart;
  
      // Function to update the chart
      function updateChart(year) {
          $.get('{{ route('home') }}', { year: year }, function(data) {
              if (myChart) {
                  myChart.destroy();
              }
              var ctx = document.getElementById('myChart').getContext('2d');
              myChart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      datasets: [{
                          label: 'Số hợp đồng',
                          data: data,
                          backgroundColor: 'rgba(75, 192, 192, 0.2)',
                          borderColor: 'rgba(75, 192, 192, 1)',
                          borderWidth: 3
                      }]
                  },
                  options: {
                      scales: {
                          y: {
                              beginAtZero: true
                          }
                      },
                      plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 20  // Increase this value to make the font larger
                            }
                        }
                    }
                  }
                  }
                  
              });
          });
      }
  
      // Update the chart with the current year's data when the page loads
      updateChart({{ date('Y') }});
  </script>
  
  @endsection