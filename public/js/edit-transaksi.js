document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('editTransaksiForm');

    form.addEventListener('submit', function (event) {
        const namaDesa = document.getElementById('nama_desa').value.trim();
        const bulan = document.getElementById('bulan').value.trim();
        const tahun = document.getElementById('tahun').value.trim();

        // Validasi input
        if (!namaDesa || !bulan || !tahun) {
            alert('Pastikan semua field wajib diisi!');
            event.preventDefault(); // Mencegah submit form jika validasi gagal
        }

        // Validasi tambahan, jika diperlukan
        const penjualanKg = document.getElementById('penjualan_kg').value;
        const penjualanRp = document.getElementById('penjualan_rp').value;

        if (penjualanKg < 0 || penjualanRp < 0) {
            alert('Jumlah tidak boleh negatif!');
            event.preventDefault();
        }
    });

    // Contoh interaksi otomatis (opsional)
    const tahunInput = document.getElementById('tahun');
    tahunInput.addEventListener('input', function () {
        const tahunValue = parseInt(tahunInput.value, 10);
        if (tahunValue < 2000 || tahunValue > new Date().getFullYear()) {
            alert('Tahun harus antara 2000 dan tahun saat ini.');
        }
    });
});
