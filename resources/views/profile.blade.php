@extends('layouts.user')

@section('content')
    <section class="container my-5">
        <h2 class="text-center">Tentang Bank Sampah Mitra CSR Indocement</h2>

        <div class="row my-5">
            <div class="col-md-6 text-end">
                <h3>Kontribusi Lingkungan</h3>
                <h5>Mendorong Kesadaran Lingkungan di Masyarakat</h5>
                <p>
                    Bank Sampah Mitra CSR Indocement berperan penting dalam menjaga kebersihan lingkungan dan mengurangi dampak negatif sampah di sekitar kita. Dengan program-program pengelolaan sampah yang berbasis pada masyarakat, kami mendorong setiap individu untuk lebih peduli terhadap lingkungan sekitar.
                </p>
            </div>
            <div class="col-md-6">
                <div class="card shadow">
                    <img src="{{ asset('images/galleryBS/3.jpg') }}" class="card-img-top" alt="Gambar Bank Sampah" />
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-md-6">
                <div class="card shadow">
                    <img src="{{ asset('images/galleryBS/18.jpg') }}" class="card-img-top" alt="Pengelolaan Sampah" />
                </div>
            </div>
            <div class="col-md-6 text-start">
                <h3>Pemberdayaan Komunitas</h3>
                <h5>Menumbuhkan Kemandirian Melalui Sampah</h5>
                <p>
                    Bank Sampah Mitra CSR Indocement memberikan Edukasi kepada masyarakat untuk mengelola sampah secara mandiri. Program ini tidak hanya meningkatkan kesadaran, tetapi juga menciptakan peluang ekonomi bagi mereka yang terlibat.
                </p>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-md-6 text-end">
                <h3>Program Pengelolaan Sampah</h3>
                <h5>Mewujudkan Lingkungan Bersih dan Sehat</h5>
                <p>
                    Dengan dukungan dari Indocement, kami mengembangkan sistem pengelolaan sampah yang efektif dan berkelanjutan. Bank Sampah ini bertujuan untuk mengurangi volume sampah yang masuk ke tempat pembuangan akhir (TPA) dan memberikan manfaat ekonomi melalui proses daur ulang.
                </p>
            </div>
            <div class="col-md-6">
                <div class="card shadow">
                    <img src="{{ asset('images/galleryBS/17.jpg') }}" class="card-img-top" alt="Daur Ulang Sampah" />
                </div>
            </div>
        </div>
    </section>
@endsection
