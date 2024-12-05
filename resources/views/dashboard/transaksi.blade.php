@extends('layouts.layout')

@section('title', 'Transaksi Sampah')

@section('content')
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
                    <td>{{ $row->Bulan }}</td>
                    <td>{{ $row->Tahun }}</td>
                    <!-- Tambahkan "kg" pada kolom Pembelian -->
                    <td>{{ $row->{'Pembelian (kg)'} }} kg</td>

                    <td>Rp {{ $row->{'Jumlah Pembelian (Rp)'} ? number_format((float) $row->{'Jumlah Pembelian (Rp)'}, 0, ',', '.') : '-' }}</td>

                    <!-- Tambahkan "kg" pada kolom Penjualan -->
                    <td>{{ $row->{'Penjualan (kg)'} }} kg</td>

                    <!-- Tambahkan "Rp" pada kolom Jumlah Penjualan -->
                    <td>Rp {{ $row->{'Jumlah Penjualan (Rp)'} ? number_format((float) $row->{'Jumlah Penjualan (Rp)'}, 0, ',', '.') : '-' }}</td>

                    <td>{{ $row->{'Nama Pengepul'} }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
