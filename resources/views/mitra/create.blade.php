@extends('layouts.user')

@section('title', 'Pendaftaran Mitra Bank Sampah')

@section('content')
    <h1>Pendaftaran Mitra Bank Sampah</h1>
    <form method="POST" action="{{ route('mitra.store') }}">
        @csrf <!-- Token CSRF untuk keamanan -->

        <div class="form-group mb-3">
            <label for="nama_desa">Nama Desa</label>
            <input type="text" class="form-control" id="nama_desa" name="nama_desa" placeholder="Nama Desa" required>
        </div>

        <div class="form-group mb-3">
            <label for="nama_bank_sampah">Nama Bank Sampah</label>
            <input type="text" class="form-control" id="nama_bank_sampah" name="Nama bank sampah" placeholder="Nama Bank Sampah" required>
        </div>

        <div class="form-group mb-3">
            <label for="bulan">Bulan</label>
            <input type="text" class="form-control" id="bulan" name="Bulan" placeholder="Contoh: Januari" required>
        </div>

        <div class="form-group mb-3">
            <label for="tahun">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="Tahun" placeholder="Contoh: 2024" required>
        </div>

        <div class="form-group mb-3">
            <label for="rt">RT</label>
            <input type="text" class="form-control" id="rt" name="RT" placeholder="RT">
        </div>

        <div class="form-group mb-3">
            <label for="rw">RW</label>
            <input type="text" class="form-control" id="rw" name="RW" placeholder="RW">
        </div>

        <div class="form-group mb-3">
            <label for="jumlah_nasabah">Jumlah Nasabah</label>
            <input type="number" class="form-control" id="jumlah_nasabah" name="Jumlah Nasabah" placeholder="Jumlah Nasabah" required>
        </div>

        <div class="form-group mb-3">
            <label for="nasabah_aktif">Nasabah Aktif</label>
            <input type="number" class="form-control" id="nasabah_aktif" name="Nasabah aktif" placeholder="Nasabah Aktif" required>
        </div>

        <button type="submit" class="btn btn-primary">Daftarkan Mitra</button>
    </form>
@endsection
