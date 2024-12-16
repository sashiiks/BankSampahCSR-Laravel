$(document).ready(function() {
    setInterval(function() {
        $.ajax({
            url: "{{ route('transaksi.index') }}",  // Ganti dengan rute yang menampilkan data transaksi
            method: "GET",
            success: function(data) {
                $('table tbody').html(data);
            }
        });
    }, 5000); // Refresh data setiap 5 detik
});
