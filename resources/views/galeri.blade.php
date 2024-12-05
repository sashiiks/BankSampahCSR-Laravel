@extends('layouts.user')

@section('content')
    <!--Gallery Section-->
    <h2 class="text-center">Galeri Bank Sampah Mitra CSR Indocement</h2>
    <div class="gallery-container">
        <div class="card">
            <img src="{{ asset('images/galleryBS/2.jpg') }}" alt="Image Description">
            <div class="card-body">
                <h4>The Importance of Innovative Design</h4>
                <p>... on a product.</p>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('images/galleryBS/5.jpg') }}" alt="Image Description">
            <div class="card-body">
                <h4>Point #1: Thinking Inside the Box</h4>
                <p>... on a product.</p>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('images/galleryBS/6.jpg') }}" alt="Image Description">
            <div class="card-body">
                <h4>How Apple, Google, and Amazon...</h4>
                <p>... on a product.</p>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('images/galleryBS/9.jpg') }}" alt="Image Description">
            <div class="card-body">
                <h4>The Importance of Innovative Design</h4>
                <p>... on a product.</p>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('images/galleryBS/20.jpg') }}" alt="Image Description">
            <div class="card-body">
                <h4>Point #2: Thinking Inside the Box</h4>
                <p>... on a product.</p>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('images/galleryBS/14.jpg') }}" alt="Image Description">
            <div class="card-body">
                <h4>How Apple, Google, and Amazon...</h4>
                <p>... on a product.</p>
            </div>
        </div>
    </div>

@endsection
