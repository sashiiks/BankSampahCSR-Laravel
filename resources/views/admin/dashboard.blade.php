@extends('layouts.layout')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Dashboard Admin</h1>

        <!-- Dropdown Sort Section -->
        <div class="row mb-3">
            <div class="col-md-6">
                <select id="filterBulan" class="form-select">
                    <option value="">Pilih Bulan</option>
                    @foreach ($tableData as $desa => $bulanData)
                        @foreach ($bulanData as $bulan => $bankSampahData)
                            <option value="{{ $bulan }}">{{ $bulan }}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <select id="filterDesa" class="form-select">
                    <option value="">Pilih Desa</option>
                    @foreach ($tableData as $desa => $bulanData)
                        <option value="{{ $desa }}">{{ $desa }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Table Transaksi Section -->
        <div class="mt-5">
            <h4>Data Transaksi Bank Sampah</h4>
            <table class="table table-bordered mt-4" id="dataTable">
                <thead>
                    <tr>
                        <th>Nama Desa</th>
                        <th>Bulan</th>
                        <th>Nama Bank Sampah</th>
                        <th>Pembelian (Kg)</th>
                        <th>Pembelian (Rp)</th>
                        <th>Penjualan (Kg)</th>
                        <th>Penjualan (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tableData as $desa => $bulanData)
                        @foreach ($bulanData as $bulan => $bankSampahData)
                            @foreach ($bankSampahData as $bankSampah => $data)
                                <tr data-desa="{{ $desa }}" data-bulan="{{ $bulan }}">
                                    <td>{{ $desa }}</td>
                                    <td>{{ $bulan }}</td>
                                    <td>{{ $bankSampah }}</td>
                                    <td>{{ $data['pembelian_kg'] }}</td>
                                    <td>{{ $data['pembelian_rp'] }}</td>
                                    <td>{{ $data['penjualan_kg'] }}</td>
                                    <td>{{ $data['penjualan_rp'] }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Chart Section -->
        <div class="mt-5">
            <h4 class="text-center">Grafik Transaksi Bank Sampah Tahun 2023</h4>
            <div class="row mt-4">
                <div class="col-md-6">
                    <canvas id="chartPembelianKg" width="400" height="200"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="chartPembelianRp" width="400" height="200"></canvas>
                </div>
                <div class="col-md-6 mt-4">
                    <canvas id="chartPenjualanKg" width="400" height="200"></canvas>
                </div>
                <div class="col-md-6 mt-4">
                    <canvas id="chartPenjualanRp" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const tableData = {!! json_encode($tableData) !!};

        // Process data for charts
        const desaLabels = Object.keys(tableData);
        const pembelianKgData = desaLabels.map(desa => {
            return Object.values(tableData[desa]).reduce((sum, bulanData) => {
                return sum + Object.values(bulanData).reduce((subSum, bankSampahData) => subSum + bankSampahData.pembelian_kg, 0);
            }, 0);
        });

        const pembelianRpData = desaLabels.map(desa => {
            return Object.values(tableData[desa]).reduce((sum, bulanData) => {
                return sum + Object.values(bulanData).reduce((subSum, bankSampahData) => subSum + bankSampahData.pembelian_rp, 0);
            }, 0);
        });

        const penjualanKgData = desaLabels.map(desa => {
            return Object.values(tableData[desa]).reduce((sum, bulanData) => {
                return sum + Object.values(bulanData).reduce((subSum, bankSampahData) => subSum + bankSampahData.penjualan_kg, 0);
            }, 0);
        });

        const penjualanRpData = desaLabels.map(desa => {
            return Object.values(tableData[desa]).reduce((sum, bulanData) => {
                return sum + Object.values(bulanData).reduce((subSum, bankSampahData) => subSum + bankSampahData.penjualan_rp, 0);
            }, 0);
        });

        // Create charts
        const createChart = (ctx, label, data, color) => {
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: desaLabels,
                    datasets: [{
                        label: label,
                        data: data,
                        backgroundColor: color,
                        borderColor: color,
                        borderWidth: 1,
                    }],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });
        };

        createChart(document.getElementById('chartPembelianKg').getContext('2d'), 'Pembelian (Kg)', pembelianKgData, 'rgba(75, 192, 192, 0.5)');
        createChart(document.getElementById('chartPembelianRp').getContext('2d'), 'Pembelian (Rp)', pembelianRpData, 'rgba(153, 102, 255, 0.5)');
        createChart(document.getElementById('chartPenjualanKg').getContext('2d'), 'Penjualan (Kg)', penjualanKgData, 'rgba(255, 159, 64, 0.5)');
        createChart(document.getElementById('chartPenjualanRp').getContext('2d'), 'Penjualan (Rp)', penjualanRpData, 'rgba(54, 162, 235, 0.5)');

        // Filter function
        document.getElementById('filterBulan').addEventListener('change', filterTable);
        document.getElementById('filterDesa').addEventListener('change', filterTable);

        function filterTable() {
            const selectedBulan = document.getElementById('filterBulan').value;
            const selectedDesa = document.getElementById('filterDesa').value;
            const rows = document.querySelectorAll('#dataTable tbody tr');

            rows.forEach(row => {
                const desa = row.getAttribute('data-desa');
                const bulan = row.getAttribute('data-bulan');

                const desaMatch = !selectedDesa || desa === selectedDesa;
                const bulanMatch = !selectedBulan || bulan === selectedBulan;

                row.style.display = desaMatch && bulanMatch ? '' : 'none';
            });
        }
    </script>
@endsection
