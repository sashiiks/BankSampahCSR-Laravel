@extends('layouts.user')

@section('content')

<!-- Halaman ini sumpah sebenernya udah muncul tapi datanya sama aja dan gua pgn narik dari
    halaman admin rancu mulu jadi gua apus apusin dan netapin yg ini doang"


<section class="container my-5">
    <h2 class="text-center mb-4">Laporan Pendataan Sampah Mitra CSR Indocement</h2>

    <!-- Filter Section -->
    <form method="GET" action="{{ route('report') }}">
        <div class="row justify-content-center mb-4">
            <div class="col-md-3">
                <label for="bulan">Bulan:</label>
                <select id="bulan" name="bulan" class="form-select">
                    <option value="All" {{ request('bulan') == 'All' ? 'selected' : '' }}>All</option>
                    <option value="Januari" {{ request('bulan') == 'Januari' ? 'selected' : '' }}>Januari</option>
                    <option value="Februari" {{ request('bulan') == 'Februari' ? 'selected' : '' }}>Februari</option>
                    <option value="Maret" {{ request('bulan') == 'Maret' ? 'selected' : '' }}>Maret</option>
                    <!-- Tambahkan opsi lainnya -->
                </select>
            </div>
            <div class="col-md-3">
                <label for="tahun">Tahun:</label>
                <select id="tahun" name="tahun" class="form-select">
                    <option value="All" {{ request('tahun') == 'All' ? 'selected' : '' }}>All</option>
                    <option value="2023" {{ request('tahun') == '2023' ? 'selected' : '' }}>2023</option>
                    <option value="2024" {{ request('tahun') == '2024' ? 'selected' : '' }}>2024</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="daerah">Daerah Mitra:</label>
                <select id="daerah" name="daerah" class="form-select">
                    <option value="All" {{ request('daerah') == 'All' ? 'selected' : '' }}>All</option>
                    <option value="Bantarjati" {{ request('daerah') == 'Bantarjati' ? 'selected' : '' }}>Bantarjati</option>
                    <option value="Citeureup" {{ request('daerah') == 'Citeureup' ? 'selected' : '' }}>Citeureup</option>
                    <option value="Gunung Putri" {{ request('daerah') == 'Gunung Putri' ? 'selected' : '' }}>Gunung Putri</option>
                    <option value="Gunung Sari" {{ request('daerah') == 'Gunung Sari' ? 'selected' : '' }}>Gunung Sari</option>
                    <option value="Hambalang" {{ request('daerah') == 'Hambalang' ? 'selected' : '' }}>Hambalang</option>
                    <option value="Leuwikaret" {{ request('daerah') == 'Leuwikaret' ? 'selected' : '' }}>Leuwikaret</option>
                    <option value="Puspanegara" {{ request('daerah') == 'Puspanegara' ? 'selected' : '' }}>Puspanegara</option>
                    <option value="Tarikolot" {{ request('daerah') == 'Tarikolot' ? 'selected' : '' }}>Tarikolot</option>
                </select>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>

    <!-- Charts Section -->
    <div class="row">
        <div class="col-md-12 mb-5">
            <h5 class="text-center">Jumlah Bank Sampah Daerah Mitra</h5>
            <div class="chart-container" style="position: relative; height:350px; width:100%">
                <canvas id="barChart"></canvas>
            </div>
        </div>
        <div class="col-md-4">
            <h5 class="text-center">Jumlah Nasabah</h5>
            <div class="chart-container" style="position: relative; height:300px; width:100%">
                <canvas id="doughnutChart"></canvas>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data for Bar Chart
    const barChartData = @json($barChartData);
    const barChartLabels = @json($barChartLabels);

    // Data for Doughnut Chart
    const doughnutChartData = @json($doughnutChartData);
    const doughnutChartLabels = @json($doughnutChartLabels);

    // Bar Chart
    const barChartCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barChartCtx, {
        type: 'bar',
        data: {
            labels: barChartLabels,
            datasets: [{
                label: 'Jumlah Bank Sampah',
                data: barChartData,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Doughnut Chart
    const doughnutChartCtx = document.getElementById('doughnutChart').getContext('2d');
    new Chart(doughnutChartCtx, {
        type: 'doughnut',
        data: {
            labels: doughnutChartLabels,
            datasets: [{
                data: doughnutChartData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(255, 205, 86, 0.6)'
                ],
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });
</script>
@endsection
