<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
    <title>BS-CSR</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/galleryBS/Logo.png') }}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('profile') }}">Profile <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('galeri') }}">Galeri <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('report') }}">Pencapaian</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('transaksi.form') }}">Transaksi</a>
                </li>
            </ul>

            <div class="form-inline my-2 my-lg-0">
                <a href="{{ route('admin.register') }}" class="btn btn-success mr-2">Sign In</a>
                <a href="{{ route('admin.login') }}" class="btn btn-outline-secondary">Login</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="col py-3">
        <div class="container">
            @yield('content')
        </div>
    </main>


    <!-- Footer Section -->
    <footer class="footer bg-light mt-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-4">
                    <h5>Tentang Kami</h5>
                    <img src="{{ asset('images/galleryBS/Logo.png') }}" alt="Logo Bank Sampah" class="footer-logo">
                    <p>Bank Sampah Mitra CSR Indocement berkomitmen untuk mendukung kelestarian lingkungan melalui
                        program daur ulang sampah yang efektif dan berkelanjutan.</p>
                </div>
                <p>
                    Powered by <a href="https://indocement.co.id/" target="_blank">Indocement</a>.
                    Follow us on
                    <a href="https://facebook.com" target="_blank">Facebook</a>,
                    <a href="https://instagram.com" target="_blank">Instagram</a>, and
                    <a href="https://twitter.com" target="_blank">Twitter</a>.
                </p>
            </div>
        </div>
        <div class="bg-dark text-white text-center py-2">
            <p class="mb-0">&copy; 2024 Bank Sampah Mitra CSR Indocement. All Rights Reserved.</p>
        </div>
    </footer>
    <!-- /Footer Section -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
