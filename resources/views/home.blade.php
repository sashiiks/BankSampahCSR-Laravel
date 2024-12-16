@extends('layouts.user')

@section('content')
    <!-- Hero Section -->
    <div class="row gy-4">
        <section id="hero" class="hero section">
            <div class="col-lg-6 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
                <img src="{{ asset('images/galleryBS/hero.png') }}" class="img-fluid animated" alt="">
            </div>
            <div class="col-lg-6  d-flex flex-column justify-content-center" data-aos="fade-in">
                <h2>Sistem Manajemen Bank Sampah</h2>
                <h3>Mitra CSR PT Indocement Tunggal Prakarsa Tbk.</h3>
                <p>Untuk Pelaporan Bulanan Bank Sampah Silahkan Klik dibawah ini</p>
                <div class="d-flex mt-4 justify-content ">
                    <a href="{{ route('transaksi.form') }}" class="download-btn"></i> <span>Pengisian Form</span></a>
                </div>
            </div>
    </div>
    </div>
    </section>
    <!-- /Hero Section -->

    <!-- Card Section -->
    <section id="info-cards" class="mt-5">
        <div class="container">
            <h2 class="text-center mb-4">Informasi Lainnya</h2>
            <div class="row gy-4">
                <!-- Card 1 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-container mb-3">
                                <i class="bi bi-people-fill card-icon"></i> <!-- Bootstrap Icon -->
                            </div>
                            <h5 class="card-title">Tentang Bank Sampah</h5>
                            <p class="card-text">Sekilas mengenai Bank sampah Mitra CSR Indocement</p>
                            <a href="{{ route('profile') }}" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-container mb-3">
                                <i class="bi bi-gem card-icon"></i> <!-- Bootstrap Icon -->
                            </div>
                            <h5 class="card-title">Galeri Kegiatan Bank Sampah</h5>
                            <p class="card-text">Foto kegiatan dari bank sampah mitra CSR</p>
                            <a href="{{ route('galeri') }}" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="card">
                        <div class="card-body">
                            <div class="icon-container mb-3">
                                <i class="bi bi-file-earmark-bar-graph-fill card-icon"></i> <!-- Bootstrap Icon -->
                            </div>
                            <h5 class="card-title">Laporan Bulanan</h5>
                            <p class="card-text">Akses laporan bulanan bank sampah secara transparan untuk memantau
                                perkembangan dan kontribusi Anda.</p>
                            <a href="{{ route('report') }}" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Card Section -->

    <!-- Achievement Section -->
    <section id="achievement" class="achievement-section mt-5">
        <div class="container text-center">
            <h2 class="section-title">Pencapaian Bank Sampah Mitra CSR Indocement</h2>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <h3 class="achievement-number" id="counter1">{{ $totalBankSampah }}</h3>
                    <p class="achievement-text">Jumlah Bank Sampah Mitra</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <h3 class="achievement-number" id="counter2">{{ number_format($totalPengelolaanSampah, 0, ',', '.') }} kg</h3>
                    <p class="achievement-text">Total Pengelolaan Sampah</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <h3 class="achievement-number" id="counter3">{{ number_format($totalNasabah, 0, ',', '.') }}</h3>
                    <p class="achievement-text">Total Keseluruhan Nasabah</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <h3 class="achievement-number" id="counter4">{{ $totalDaerahMitra }}</h3>
                    <p class="achievement-text">Total Desa Mitra</p>
                </div>
            </div>
            <a href="{{ route('report') }}" class="btn btn-outline-dark mt-4">Selengkapnya</a>
        </div>
    </section>
    <!-- /Achievement Section -->

    <!-- Map Section -->
    <section id="map-section" class="map-section mt-5">
        <div class="container">
            <h2 class="text-center mb-4">Peta Lokasi Bank Sampah</h2>
            <div class="row">
                <div class="col-md-12">
                    <div id="map" style="height: 500px;"></div>
                </div>
            </div>
            <div class="mt-4">
                <div class="container">
                    <h4>Keterangan Lokasi Bank Sampah Mitra CSR Indocement</h4>
                    <div class="keterangan-grid">
                        <div>
                            <h5>Kec. Citeureup:</h5>
                            <ul>
                                <li>Citeureup</li>
                                <li>Puspa Negara</li>
                                <li>Tarikolot</li>
                                <li>Gunung Sari</li>
                                <li>Pasir Mukti</li>
                                <li>Tajur</li>
                                <li>Hambalang</li>
                            </ul>
                        </div>
                        <div>
                            <h5>Kec. Kelapa Nunggal:</h5>
                            <ul>
                                <li>Lewih Karet</li>
                                <li>Lulut</li>
                                <li>Bantarjati</li>
                                <li>Nambo</li>
                            </ul>
                        </div>
                        <div>
                            <h5>Kec. Gunung Putri:</h5>
                            <ul>
                                <li>Desa Gunung Putri</li>
                            </ul>
                        </div>
                    </div>
                </div>
    </section>
    <!-- /Map Section -->
@endsection

<script src="{{ asset('js/achievement-counter.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzEWOfDIuMzipvo4n70-KSR5vilHhl0QQ&callback=initMap" async defer></script>
<script src="{{ asset('js/map.js') }}"></script>
