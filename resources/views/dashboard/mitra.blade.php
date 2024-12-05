@extends('layouts.layout')

@section('title', 'Mitra Bank Sampah')

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
                    <td>{{ $row->{'nama_desa'} }}</td>
                    <td>{{ $row->{'Nama bank sampah'} }}</td>
                    <td>{{ $row->RT }}</td>
                    <td>{{ $row->RW }}</td>
                    <td>{{ $row->{'Jumlah Nasabah'} }}</td>
                    <td>{{ $row->{'Nasabah aktif'} }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

<!--Halaman ini literally CSS aja cuma bisa jadiin panduan sama lu soalnya datanya udah tampil semua>
    <!-- Kenapa bisa muncul? karena di bantuin pacar gua dia anak data tapi ga bisa backend hehehe
