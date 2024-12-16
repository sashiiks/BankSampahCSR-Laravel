@extends('layouts.user')

@section('title', 'Form Transaksi Sampah Bulanan')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">Form Transaksi Sampah Bulanan</h1>

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

        <!-- Validasi Error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('transaksi.store') }}" method="POST" id="transaksiForm">
            @csrf

            <!-- Input Nama Desa -->
            <div class="mb-3">
                <label for="nama_desa" class="form-label">Nama Desa/Kelurahan</label>
                <input type="text" id="nama_desa" name="nama_desa" class="form-control"
                    value="{{ old('nama_desa') }}" placeholder="Contoh: Gunung Putri" required />
            </div>

            <!-- Input Bulan dan Tahun -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="bulan" class="form-label">Bulan</label>
                    <input type="text" id="bulan" name="bulan" class="form-control"
                        value="{{ old('bulan') }}" placeholder="Contoh: Januari" required />
                </div>
                <div class="col-md-6">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="number" id="tahun" name="tahun" class="form-control"
                        value="{{ old('tahun') }}" placeholder="Contoh: 2023" required />
                </div>
            </div>

            <!-- Input Nama Bank Sampah -->
            <div class="mb-3">
                <label for="nama_bank_sampah" class="form-label">Nama Bank Sampah</label>
                <input type="text" id="nama_bank_sampah" name="nama_bank_sampah" class="form-control"
                    value="{{ old('nama_bank_sampah') }}" placeholder="Contoh: Pelangi Ceria" required />
            </div>

            <!-- Input RT dan RW -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="rt" class="form-label">RT</label>
                    <input type="number" id="rt" name="rt" class="form-control"
                        value="{{ old('rt') }}" placeholder="Contoh: 1" required />
                </div>
                <div class="col-md-6">
                    <label for="rw" class="form-label">RW</label>
                    <input type="number" id="rw" name="rw" class="form-control"
                        value="{{ old('rw') }}" placeholder="Contoh: 2" required />
                </div>
            </div>

            <!-- Input Keseluruhan Nasabah dan Nasabah Aktif -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="jumlah_nasabah" class="form-label">Jumlah Keseluruhan Nasabah</label>
                    <input type="number" id="jumlah_nasabah" name="jumlah_nasabah" class="form-control"
                        value="{{ old('jumlah_nasabah') }}" placeholder="Contoh: 22" required />
                </div>
                <div class="col-md-6">
                    <label for="nasabah_aktif" class="form-label">Jumlah Nasabah Aktif</label>
                    <input type="number" id="nasabah_aktif" name="nasabah_aktif" class="form-control"
                        value="{{ old('nasabah_aktif') }}" placeholder="Contoh: 15" required />
                </div>
            </div>

            <!-- Input Pembelian dan Penjualan -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pembelian_kg" class="form-label">Jumlah Berat Pembelian Sampah</label>
                    <div class="input-group">
                        <input type="number" id="pembelian_kg" name="pembelian_kg" class="form-control"
                            value="{{ old('pembelian_kg') }}" placeholder="Contoh: 127.55" required />
                        <span class="input-group-text">kg</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="penjualan_kg" class="form-label">Jumlah Berat Penjualan Sampah</label>
                    <div class="input-group">
                        <input type="number" id="penjualan_kg" name="penjualan_kg" class="form-control"
                            value="{{ old('penjualan_kg') }}" placeholder="Contoh: 132.45" required />
                        <span class="input-group-text">kg</span>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="pembelian_rp" class="form-label">Jumlah Harga Pembelian Sampah</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" id="pembelian_rp" name="pembelian_rp" class="form-control"
                            value="{{ old('pembelian_rp') }}" placeholder="Contoh: 1500000" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="penjualan_rp" class="form-label">Jumlah Harga Penjualan Sampah</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" id="penjualan_rp" name="penjualan_rp" class="form-control"
                            value="{{ old('penjualan_rp') }}" placeholder="Contoh: 2000000" required />
                    </div>
                </div>
            </div>

            <!-- Input Nama Pengepul -->
            <div class="mb-3">
                <label for="nama_pengepul" class="form-label">Nama Pengepul</label>
                <input type="text" id="nama_pengepul" name="nama_pengepul" class="form-control"
                    value="{{ old('nama_pengepul') }}" placeholder="Contoh: Bp Abdul Harum Asri" required />
            </div>

            <!-- Tombol Simpan -->
            <div class="text-center">
                <button type="submit" class="btn btn-success">Simpan Transaksi</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('js/form-validation.js') }}"></script>
@endpush
