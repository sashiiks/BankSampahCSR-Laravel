@extends('layouts.user')

@section('content')
    <!--Gallery Section-->
    <h2 class="text-center">Galeri Bank Sampah Mitra CSR Indocement</h2>
    <div class="gallery-container">
        <div class="card">
            <img src="{{ asset('images/galleryBS/2.jpg') }}" alt="Kegiatan Bank Sampah Mitra CSR Indocement">
            <div class="card-body">
                <h4>Proses Pengolahan Sampah Plastik</h4>
                <p>
                    Sampah plastik merupakan salah satu jenis sampah yang sulit terurai. Melalui program Bank Sampah, kami mengolah plastik bekas menjadi barang yang berguna dan memiliki nilai ekonomi, mengurangi dampak negatif terhadap lingkungan.
                </p>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('images/galleryBS/5.jpg') }}" alt="Pemberdayaan Masyarakat Mitra CSR Indocement">
            <div class="card-body">
                <h4>Memberdayakan Masyarakat Melalui Program Daur Ulang</h4>
                <p>
                    Kami berkomitmen untuk memberdayakan masyarakat di sekitar area pabrik Indocement melalui pelatihan daur ulang sampah, sehingga mereka bisa memperoleh manfaat ekonomi dari kegiatan ini sambil menjaga lingkungan tetap bersih.
                </p>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('images/galleryBS/6.jpg') }}" alt="Kegiatan Sosial Bank Sampah Mitra CSR Indocement">
            <div class="card-body">
                <h4>Pengelolaan Sampah Organik untuk Kompos</h4>
                <p>
                    Bank Sampah Mitra CSR Indocement tidak hanya mengelola sampah anorganik, namun juga mengolah sampah organik menjadi kompos yang dapat digunakan untuk meningkatkan kualitas tanah dan pertanian di sekitar area.
                </p>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('images/galleryBS/9.jpg') }}" alt="Peningkatan Kualitas Lingkungan Bank Sampah Mitra CSR Indocement">
            <div class="card-body">
                <h4>Inovasi Pengelolaan Sampah yang Efektif</h4>
                <p>
                    Dengan inovasi dan kerja sama dari masyarakat, Bank Sampah Mitra CSR Indocement mampu menciptakan lingkungan yang lebih bersih dan sehat. Kami terus berinovasi untuk mengurangi sampah yang mencemari lingkungan sekitar.
                </p>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('images/galleryBS/20.jpg') }}" alt="Kegiatan Bank Sampah Mitra CSR Indocement">
            <div class="card-body">
                <h4>Program Edukasi tentang Pengelolaan Sampah</h4>
                <p>
                    Melalui program edukasi, kami mengajak masyarakat untuk lebih peduli dengan pengelolaan sampah. Bank Sampah Mitra CSR Indocement memberikan pelatihan dan informasi terkait cara-cara efektif dalam mendaur ulang sampah sehari-hari.
                </p>
            </div>
        </div>

        <div class="card">
            <img src="{{ asset('images/galleryBS/14.jpg') }}" alt="Komunitas Bank Sampah Mitra CSR Indocement">
            <div class="card-body">
                <h4>Kolaborasi dengan Komunitas Lokal</h4>
                <p>
                    Kami percaya bahwa kolaborasi dengan komunitas lokal sangat penting untuk suksesnya program pengelolaan sampah. Bank Sampah Mitra CSR Indocement bekerja sama dengan berbagai komunitas untuk meningkatkan partisipasi masyarakat dalam menjaga kebersihan lingkungan.
                </p>
            </div>
        </div>
    </div>

@endsection
