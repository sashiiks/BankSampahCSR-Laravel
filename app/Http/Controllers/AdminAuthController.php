<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use App\Models\Admin;
use App\Models\TransaksiSampah;

class AdminAuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Proses login admin
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Autentikasi
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            // Redirect ke admin dashboard setelah login berhasil
            return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
        }

        // Jika login gagal, kembali ke halaman login dengan error
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
    }

    // Menampilkan halaman registrasi admin
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    // Proses registrasi admin
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Buat admin baru
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('admin.login')->with('success', 'Registration successful! Please login.');
    }

    // Menampilkan halaman dashboard admin
    public function dashboard()
    {
    $bulanMap = [
        'Januari' => 1, 'Februari' => 2, 'Maret' => 3,
        'April' => 4, 'Mei' => 5, 'Juni' => 6,
        'Juli' => 7, 'Agustus' => 8, 'September' => 9,
        'Oktober' => 10, 'November' => 11, 'Desember' => 12,
    ];

    // Query data dari database
    $data = TransaksiSampah::select(
        'nama_desa',
        'nama_bank_sampah',
        'tahun',
        'bulan',
        DB::raw('SUM(pembelian_kg) as total_pembelian_kg'),
        DB::raw('SUM(pembelian_rp) as total_pembelian_rp'),
        DB::raw('SUM(penjualan_kg) as total_penjualan_kg'),
        DB::raw('SUM(penjualan_rp) as total_penjualan_rp')
    )
    ->groupBy('nama_desa', 'nama_bank_sampah', 'tahun', 'bulan')
    ->get();

    // Ubah nama bulan menjadi angka untuk pengurutan
    $data = $data->map(function ($item) use ($bulanMap) {
        $item->bulan_angka = $bulanMap[$item->bulan] ?? null;
        return $item;
    });

    $data = $data->sortBy(['tahun', 'bulan_angka']);

    // Reformat data untuk tabel dan chart
    $tableData = [];
    $years = $data->pluck('tahun')->unique();

    foreach ($data as $row) {
        // Format data untuk tabel
        $tableData[$row->nama_desa][$row->bulan][$row->nama_bank_sampah] = [
            'pembelian_kg' => $row->total_pembelian_kg,
            'pembelian_rp' => $row->total_pembelian_rp,
            'penjualan_kg' => $row->total_penjualan_kg,
            'penjualan_rp' => $row->total_penjualan_rp,
        ];
    }

    return view('admin.dashboard', compact(
        'tableData',
        'years'
    ));
    }


    // Proses logout admin
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    // Menampilkan halaman form untuk meminta reset link
    public function showLinkRequestForm()
    {
        return view('admin.auth.passwords.email');
    }

    // Mengirimkan link reset password ke email
    public function sendResetLinkEmail(Request $request)
    {
        // Validasi input email
        $request->validate([
            'email' => 'required|email',
        ]);

        // Mengirimkan email reset password
        $response = Password::broker('admins')->sendResetLink(
            $request->only('email')
        );

        // Cek jika email berhasil dikirimkan
        if ($response == Password::RESET_LINK_SENT) {
            return back()->with('status', 'Reset password link has been sent!');
        }

        return back()->withErrors(['email' => 'We could not find a user with that email address.']);
    }

    // Menampilkan form untuk reset password
    public function showResetForm($token)
    {
        return view('admin.auth.passwords.reset', ['token' => $token]);
    }

    // Proses reset password
    public function reset(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
            'token' => 'required',
        ]);

        // Melakukan reset password
        $response = Password::broker('admins')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($admin, $password) {
                $admin->password = Hash::make($password);
                $admin->save();
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            return redirect()->route('admin.login')->with('success', 'Your password has been reset!');
        }

        return back()->withErrors(['email' => 'Failed to reset password. Please try again.']);
    }
}

