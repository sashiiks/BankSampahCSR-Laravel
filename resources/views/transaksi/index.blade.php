@extends('layouts.layout')

@section('title', 'Mitra dan Transaksi Bank Sampah')

@section('content')
    <h1>Daftar Mitra Bank Sampah</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Desa</th>
                <th>Nama Bank Sampah</th>
                <th>RT</th>
                <th>RW</th>
                <th>Jumlah Nasabah</th>
                <th>Nasabah Aktif</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mitra as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row->{'nama_desa'} }}</td> <!-- Nama Desa -->
                    <td>{{ $row->{'Nama bank sampah'} }}</td> <!-- Nama Bank Sampah -->
                    <td>{{ $row->RT }}</td> <!-- RT -->
                    <td>{{ $row->RW }}</td> <!-- RW -->
                    <td>{{ $row->{'Jumlah Nasabah'} }}</td> <!-- Jumlah Nasabah -->
                    <td>{{ $row->{'Nasabah aktif'} }}</td> <!-- Nasabah Aktif -->
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Daftar Transaksi Sampah</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Pembelian (kg)</th>
                <th>Penjualan (kg)</th>
                <th>Pembelian (Rp)</th>
                <th>Penjualan (Rp)</th>
                <th>Nama Pengepul</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row->Bulan }}</td> <!-- Bulan -->
                    <td>{{ $row->Tahun }}</td> <!-- Tahun -->
                    <td>{{ $row->{'Pembelian (kg)'} }} kg</td> <!-- Pembelian (kg) -->
                    <td>{{ $row->{'Penjualan (kg)'} }} kg</td> <!-- Penjualan (kg) -->
                    <td>Rp {{ number_format($row->{'Jumlah Pembelian (Rp)'}, 0, ',', '.') }}</td> <!-- Pembelian (Rp) -->
                    <td>Rp {{ number_format($row->{'Jumlah Penjualan (Rp)'}, 0, ',', '.') }}</td> <!-- Penjualan (Rp) -->
                    <td>{{ $row->{'Nama Pengepul'} }}</td> <!-- Nama Pengepul -->
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('transaksi.create') }}" class="btn btn-primary mt-3">Tambah Transaksi Baru</a>
@endsection
