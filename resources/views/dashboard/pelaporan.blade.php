@extends('layouts.layout')

@section('title', 'Pelaporan')

@section('content')
<section class="container my-5">
    <h2 class="text-center mb-4">Laporan Pendataan Sampah Mitra CSR Indocement</h2>

    <!-- Data Summary Section -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-header bg-primary text-white">Total Pembelian</div>
                <div class="card-body">
                    <p><strong>Jumlah (Kg):</strong> {{ $pembelianKg }} kg</p>
                    <p><strong>Total Pembelian (Rp):</strong> Rp {{ number_format($pembelianRp, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-header bg-success text-white">Total Penjualan</div>
                <div class="card-body">
                    <p><strong>Jumlah (Kg):</strong> {{ $penjualanKg }} kg</p>
                    <p><strong>Total Penjualan (Rp):</strong> Rp {{ number_format($penjualanRp, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Chart Section -->
    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center">Grafik Pembelian dan Penjualan</h5>
            <div class="chart-container" style="position: relative; height:350px; width:100%">
                <canvas id="transactionChart"></canvas>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const transactionChartData = {
        labels: ['Pembelian', 'Penjualan'],
        datasets: [
            {
                label: 'Jumlah (Kg)',
                data: [{{ $pembelianKg }}, {{ $penjualanKg }}],
                backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(75, 192, 192, 0.2)'],
                borderColor: ['rgba(54, 162, 235, 1)', 'rgba(75, 192, 192, 1)'],
                borderWidth: 1
            },
            {
                label: 'Jumlah (Rp)',
                data: [{{ $pembelianRp }}, {{ $penjualanRp }}],
                backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(153, 102, 255, 0.2)'],
                borderColor: ['rgba(255, 99, 132, 1)', 'rgba(153, 102, 255, 1)'],
                borderWidth: 1
            }
        ]
    };

    new Chart(document.getElementById('transactionChart'), {
        type: 'bar',
        data: transactionChartData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
