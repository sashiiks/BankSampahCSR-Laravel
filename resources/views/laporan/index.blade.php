@extends('layouts.user')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Laporan Bank Sampah Mitra</h1>

        <!-- Grafik 1: Total Bank Sampah Mitra dan Desa -->
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Total Bank Sampah Mitra</h4>
                        <p class="card-text">{{ $totalBankSampahMitra->total_bank_sampah }} Bank Sampah</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Total Desa</h4>
                        <p class="card-text">{{ $totalDesa->total_desa }} Desa</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik 2: Jumlah Nasabah Bank Sampah -->
        <div class="mt-5">
            <h4>Jumlah Nasabah Bank Sampah</h4>
            <div class="row">
                <!-- Card untuk Total Nasabah -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Total Nasabah</strong>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $totalNasabah }} Nasabah</p>
                        </div>
                    </div>
                </div>

                <!-- Card untuk Total Nasabah Aktif -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Total Nasabah Aktif</strong>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $totalNasabahAktif }} Nasabah Aktif</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rincian Bank Sampah Per Desa -->
        <div class="mt-5">
            <h4>Rincian Bank Sampah Per Desa</h4>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Desa</th>
                        <th>Total Bank Sampah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rincianBankSampahPerDesa as $rincian)
                        <tr>
                            <td>{{ $rincian->nama_desa }}</td>
                            <td>{{ $rincian->total_bank_sampah }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Grafik 3: Data Bank Sampah Tiap Daerah -->
        <div class="mt-5">
            <h4>Data Bank Sampah Tiap Daerah</h4>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Desa</th>
                        <th>Bank Sampah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bankSampahPerDaerah->groupBy('nama_desa') as $namaDesa => $bankSampahList)
                        @foreach ($bankSampahList as $index => $data)
                            <tr>
                                @if ($index == 0)
                                    <td rowspan="{{ $bankSampahList->count() }}">{{ $namaDesa }}</td>
                                    <!-- Nama Desa hanya ditampilkan sekali -->
                                @endif
                                <td>{{ $data->nama_bank_sampah }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Grafik Bar (Bank Sampah per Desa) -->
        <div class="mt-5">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels), // Array labels dari data desa
                datasets: [{
                    label: 'Jumlah Bank Sampah',
                    data: @json($bankSampahData), // Data jumlah bank sampah
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
    </script>
@endsection
