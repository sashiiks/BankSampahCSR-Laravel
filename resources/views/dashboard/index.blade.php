@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <!-- Header -->
    <!--<h1 class="text-center">Welcome, {Auth::guard('admin')->user()->name }}</h1>

    <!-- Logout Button -->
    <!--<form method="POST" action="{ route('admin.logout') }}" class="text-center mb-4">
        csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>

<div class="container">
    <h1 class="mb-4">Dashboard Admin</h1>

      <!-- ========================= Main ==================== -->
      <div class="main">
        <div class="topbar">
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
                <img src="#" alt="">
            </div>
        </div>
    <!-- ======================= Cards ================== -->
    <div class="cardBox">
        <div class="card">
            <div>
                <div class="numbers">{{ $totalMitra }}</div>
                <div class="cardName">Total Mitra Bank Sampah</div>
            </div>

            <div class="iconBx">
                <ion-icon name="eye-outline"></ion-icon>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">{{ $totalNasabah }}</div>
                <div class="cardName">Total Nasabah</div>
            </div>

            <div class="iconBx">
                <ion-icon name="cart-outline"></ion-icon>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">{{ $totalTransaksi }}</div>
                <div class="cardName">Total Transaksi</div>
            </div>

            <div class="iconBx">
                <ion-icon name="chatbubbles-outline"></ion-icon>
            </div>
        </div>

    </div>
@endsection
