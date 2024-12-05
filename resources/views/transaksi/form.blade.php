@extends('layouts.user')

@section('title', 'Form Transaksi Sampah Bulanan')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">Form Transaksi Sampah Bulanan</h1>

        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <!-- Pilihan Nama Bank Sampah -->
            <div class="mb-3">
                <label for="nama_bank_sampah" class="form-label">Nama Bank Sampah</label>
                <select name="nama_mitra" id="nama_bank_sampah" class="form-control" required>
                    <option value="" disabled selected>Pilih Mitra</option>
                    @foreach ($mitra as $row)
                        <option value="{{ $row->id }}">{{ $row->nama_bank_sampah }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Input Bulan dan Tahun -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="bulan" class="form-label">Bulan</label>
                    <input type="text" id="bulan" name="Bulan" class="form-control" placeholder="Contoh: Januari" required />
                </div>
                <div class="col-md-6">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="number" id="tahun" name="Tahun" class="form-control" placeholder="Contoh: 2024" required />
                </div>
            </div>

            <!-- Input Pembelian dan Penjualan (kg) -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pembelian_kg" class="form-label">Pembelian (kg)</label>
                    <input type="number" id="pembelian_kg" name="Pembelian (kg)" class="form-control"
                           placeholder="Masukkan jumlah dalam kg" required />
                </div>
                <div class="col-md-6">
                    <label for="penjualan_kg" class="form-label">Penjualan (kg)</label>
                    <input type="number" id="penjualan_kg" name="Penjualan (kg)" class="form-control"
                           placeholder="Masukkan jumlah dalam kg" required />
                </div>
            </div>

            <!-- Input Pembelian dan Penjualan (Rp) -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="jumlah_pembelian_rp" class="form-label">Jumlah Pembelian (Rp)</label>
                    <input type="number" id="jumlah_pembelian_rp" name="Jumlah Pembelian (Rp)" class="form-control"
                           placeholder="Masukkan total dalam Rp" required />
                </div>
                <div class="col-md-6">
                    <label for="jumlah_penjualan_rp" class="form-label">Jumlah Penjualan (Rp)</label>
                    <input type="number" id="jumlah_penjualan_rp" name="Jumlah Penjualan (Rp)" class="form-control"
                           placeholder="Masukkan total dalam Rp" required />
                </div>
            </div>

            <!-- Input Nama Pengepul -->
            <div class="mb-3">
                <label for="nama_pengepul" class="form-label">Nama Pengepul</label>
                <input type="text" id="nama_pengepul" name="Nama Pengepul" class="form-control"
                       placeholder="Masukkan nama pengepul" required />
            </div>

            <!-- Tombol Simpan -->
            <div class="text-center">
                <button type="submit" class="btn btn-success">Simpan Transaksi</button>
            </div>
        </form>
    </div>
@endsection
