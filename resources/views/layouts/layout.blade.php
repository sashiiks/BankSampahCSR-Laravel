<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | BS-CSR Admin</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <span class="title">Bs-admin</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.index') }}">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.mitra') }}">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Mitra Bank Sampah</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('transaksi.index') }}">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Transaksi Bank Sampah</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard.pelaporan') }}">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Pelaporan</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

                <!-- Main Content -->
                <main class="col py-3">
                    <div class="container">
                        @yield('content')
                    </div>
                </main>

                <!-- Footer -->
                <footer class="bg-dark text-white text-center py-3">
                    <p class="mb-0">&copy; 2024 Bank Sampah Mitra CSR Indocement. All Rights Reserved.</p>
                </footer>

                <!-- Bootstrap JS -->
                <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
