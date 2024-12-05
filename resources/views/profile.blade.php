@extends('layouts.user')

@section('content')
    <section class="container my-5">
        <h2 class="text-center">Tentang Bank Sampah Mitra CSR Indocement</h2>

        <div class="row my-5">
            <div class="col-md-6 text-end">
                <h3>Label</h3>
                <h5>IPSUM</h5>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vehicula
                    libero ut sapien euismod condimentum.
                </p>
            </div>
            <div class="col-md-6">
                <div class="card shadow">
                    <img src="{{ asset('images/galleryBS/3.jpg') }}" class="card-img-top" alt="..." />
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-md-6">
                <div class="card shadow">
                    <img src="{{ asset('images/galleryBS/18.jpg') }}" class="card-img-top" alt="..." />
                </div>
            </div>
            <div class="col-md-6 text-start">
                <h3>Label</h3>
                <h5>IPSUM</h5>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vehicula
                    libero ut sapien euismod condimentum.
                </p>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-md-6 text-end">
                <h3>Label</h3>
                <h5>IPSUM</h5>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vehicula
                    libero ut sapien euismod condimentum.
                </p>
            </div>
            <div class="col-md-6">
                <div class="card shadow">
                    <img src="{{ asset('images/galleryBS/17.jpg') }}" class="card-img-top" alt="..." />
                </div>
            </div>
        </div>
    </section>
@endsection
