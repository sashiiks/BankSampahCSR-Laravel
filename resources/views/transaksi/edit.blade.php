@extends('layouts.layout')

@section('title', 'Edit Transaksi')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">Edit Transaksi Sampah Bulanan</h1>
        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" id="editTransaksiForm">
            @csrf
            @method('PUT')
            <!-- Field input -->
            <div class="form-group mb-3">
                <label for="nama_desa">Nama Desa</label>
                <input type="text" class="form-control" id="nama_desa" name="nama_desa" value="{{ $transaksi->nama_desa }}"
                    required>
            </div>

            <div class="form-group mb-3">
                <label for="bulan">Bulan</label>
                <input type="text" class="form-control" id="bulan" name="bulan" value="{{ $transaksi->bulan }}"
                    required>
            </div>

            <div class="form-group mb-3">
                <label for="tahun">Tahun</label>
                <input type="number" class="form-control" id="tahun" name="tahun" value="{{ $transaksi->tahun }}"
                    required>
            </div>

            <div class="form-group mb-3">
                <label for="nama_bank_sampah">Nama Bank Sampah</label>
                <input type="text" class="form-control" id="nama_bank_sampah" name="nama_bank_sampah"
                    value="{{ $transaksi->nama_bank_sampah }}" required>
            </div>

            <!-- Other input fields -->

            <div class="form-group mb-3">
                <label for="penjualan_kg">Jumlah Berat Penjualan Sampah</label>
                <input type="number" class="form-control" id="penjualan_kg" name="penjualan_kg"
                    value="{{ $transaksi->penjualan_kg }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="penjualan_rp">Jumlah Harga Penjualan Sampah</label>
                <input type="number" class="form-control" id="penjualan_rp" name="penjualan_rp"
                    value="{{ $transaksi->penjualan_rp }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

<script src="{{ asset('js/edit-transaksi.js') }}"></script>

