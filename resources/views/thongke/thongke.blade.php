@extends('layouts.app')

@section('page-title', $title)

@section('message')
@include('partials.messages')
@endsection

@section('content')
<div class="content-main">
    <!-- start body -->
    <div class="wrapper">
        <!-- Sidebar  -->
        @include('partials.common.slide-bar')

        <!-- Page Content  -->
        <div id="content">
            <!-- Tieu de -->
            @include('partials.common.tieude')

            <!-- Form to select year -->
            <form id="yearForm" method="GET" action="{{ route('thongke') }}">
                <div class="form-group">
                    <label for="year">Năm:</label>
                    <select id="year" name="year" required onchange="updateChart(this.value)">
                        @for ($i = 2000; $i <= date('Y'); $i++)
                            <option value="{{ $i }}" {{ $i == date('Y') ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </form>
            
            
<!-- Chart container -->
            <div class="container">
                <div class="chart">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        <!-- end body -->
    </div>
@endsection

@section('JS')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var myChart;

    // Function to update the chart
    function updateChart(year) {
        $.get('{{ route('thongke') }}', { year: year }, function(data) {
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
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
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
