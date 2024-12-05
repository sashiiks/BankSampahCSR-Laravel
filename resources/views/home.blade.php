@extends('layouts.user')

@section('content')
    <!-- Hero Section -->
    <div class="row gy-4">
        <section id="hero" class="hero section">
            <div class="col-lg-6 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
                <img src="{{ asset('images/galleryBS/hero.jpg') }}" class="img-fluid animated" alt="">
            </div>
            <div class="col-lg-6  d-flex flex-column justify-content-center" data-aos="fade-in">
                <h2>Sistem Manajemen Bank Sampah</h2>
                <h3>Mitra CSR PT Indocement Tunggal Prakarsa Tbk.</h3>
                <p>Untuk Pelaporan Bulanan Bank Sampah Silahkan Klik dibawah ini</p>
                <div class="d-flex mt-4 justify-content ">
                    <a href="{{ route('form_mitra') }}" class="download-btn"></i> <span>Mitra</span></a>
                    <a href="{{ route('form_nonmitra') }}" class="download-btn"></i> <span>Non Mitra</span></a>
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
                    <h3 class="achievement-number" id="counter1">105</h3>
                    <p class="achievement-text">Satisfied Customers</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <h3 class="achievement-number" id="counter2">1005</h3>
                    <p class="achievement-text">Project Completed</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <h3 class="achievement-number" id="counter3">1000</h3>
                    <p class="achievement-text">Employees</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <h3 class="achievement-number" id="counter4">85</h3>
                    <p class="achievement-text">Awards Winning</p>
                </div>
            </div>
            <a href="{{ route('report') }}" class="btn btn-outline-dark mt-4">Selengkapnya</a>
        </div>
    </section>
    <!-- /Achievement Section -->

    <!-- Map Section -->
@endsection

<script src="{{ asset('js/achievement-counter.js') }}"></script>
