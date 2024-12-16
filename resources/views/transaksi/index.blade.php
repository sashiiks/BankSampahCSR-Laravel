@extends('layouts.layout')

@section('title', 'Daftar Transaksi Sampah')

@section('content')
    <h1 class="text-center my-4">Daftar Transaksi Sampah</h1>
    <a href="{{ route('transaksi.form') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Tambah Transaksi Baru
    </a>

    <!-- Flash Message untuk Notifikasi -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Tabel Transaksi Sampah -->
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>id</th>
                <th>Nama Desa</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Nama Bank Sampah</th>
                <th>RT</th>
                <th>RW</th>
                <th>Jumlah Nasabah</th>
                <th>Nasabah Aktif</th>
                <th>Pembelian (kg)</th>
                <th>Pembelian (Rp)</th>
                <th>Penjualan (kg)</th>
                <th>Penjualan (Rp)</th>
                <th>Nama Pengepul</th>
                <th>Aksi</th> <!-- Tambahkan kolom untuk aksi -->
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksi as $index => $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->nama_desa }}</td>
                    <td>{{ $row->bulan }}</td>
                    <td>{{ $row->tahun }}</td>
                    <td>{{ $row->nama_bank_sampah }}</td>
                    <td>{{ $row->rt }}</td>
                    <td>{{ $row->rw }}</td>
                    <td>{{ $row->jumlah_nasabah }}</td>
                    <td>{{ $row->nasabah_aktif }}</td>
                    <td>{{ $row->pembelian_kg }} kg</td>
                    <td>Rp
                        {{ $row->pembelian_rp ? number_format((float) $row->pembelian_rp, 0, ',', '.') : '-' }}
                    </td>
                    <td>{{ $row->penjualan_kg }} kg</td>
                    <td>Rp
                        {{ $row->penjualan_rp ? number_format((float) $row->penjualan_rp, 0, ',', '.') : '-' }}
                    </td>

                    <td>{{ $row->nama_pengepul }}</td> <!-- Nama Pengepul -->
                    <td>
                        <!-- Tombol Aksi -->
                        <a href="{{ route('transaksi.edit', $row->{'id'}) }}"
                            class="btn btn-warning btn-sm action-btn">Edit</a>

                        <form action="{{ route('transaksi.destroy', $row->{'id'}) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm action-btn">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <!-- Notifikasi jika data kosong -->
                <tr>
                    <td colspan="10" class="text-center">Tidak ada data transaksi sampah.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Navigasi Pagination -->
    <div class="d-flex justify-content-center">
        {{ $transaksi->links() }}
    </div>

@endsection

<script src="{{ asset('js/auto-refresh.js') }}"></script>
