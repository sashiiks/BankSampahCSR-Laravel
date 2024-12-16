@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="container">
        <h1 class="mb-4">Dashboard Admin</h1>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <!-- Topbar -->
            <div class="topbar d-flex justify-content-between align-items-center">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="#" alt="Admin Profile" class="rounded-circle" style="width: 40px; height: 40px;">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox d-flex flex-wrap justify-content-between mt-4">
                <!-- Total Mitra -->
                <div class="card text-center shadow-sm">
                    <div>
                        <div class="numbers">{{ $totalMitra }}</div>
                        <div class="cardName">Total Mitra Bank Sampah</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <!-- Total Nasabah -->
                <div class="card text-center shadow-sm">
                    <div>
                        <div class="numbers">{{ $totalNasabah }}</div>
                        <div class="cardName">Total Nasabah</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                </div>

                <!-- Total Transaksi -->
                <div class="card text-center shadow-sm">
                    <div>
                        <div class="numbers">{{ $totalTransaksi }}</div>
                        <div class="cardName">Total Transaksi</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="swap-horizontal-outline"></ion-icon>
                    </div>
                </div>

                <!-- Total Desa -->
                <div class="card text-center shadow-sm">
                    <div>
                        <div class="numbers">{{ $totalDesa }}</div>
                        <div class="cardName">Total Desa</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="location-outline"></ion-icon>
                    </div>
                </div>
            </div>
@endsection
