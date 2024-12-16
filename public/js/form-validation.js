document.querySelector("#transaksiForm").addEventListener("submit", function (event) {
    let pembelianKgInput = document.getElementById("pembelian_kg");
    let pembelianRpInput = document.getElementById("pembelian_rp");
    let penjualanKgInput = document.getElementById("penjualan_kg");
    let penjualanRpInput = document.getElementById("penjualan_rp");

    let pembelianKg = parseFloat(pembelianKgInput.value);
    let pembelianRp = parseFloat(pembelianRpInput.value);
    let penjualanKg = parseFloat(penjualanKgInput.value);
    let penjualanRp = parseFloat(penjualanRpInput.value);

    let valid = true;
    let errorMessage = "";

    if (isNaN(pembelianKg) || pembelianKg <= 0) {
        valid = false;
        errorMessage = "Jumlah pembelian (kg) harus berupa angka positif!";
        pembelianKgInput.focus();
    } else if (isNaN(pembelianRp) || pembelianRp <= 0) {
        valid = false;
        errorMessage = "Jumlah pembelian (Rp) harus berupa angka positif!";
        pembelianRpInput.focus();
    } else if (isNaN(penjualanKg) || penjualanKg <= 0) {
        valid = false;
        errorMessage = "Jumlah penjualan (kg) harus berupa angka positif!";
        penjualanKgInput.focus();
    } else if (isNaN(penjualanRp) || penjualanRp <= 0) {
        valid = false;
        errorMessage = "Jumlah penjualan (Rp) harus berupa angka positif!";
        penjualanRpInput.focus();
    }

    if (valid && pembelianKg > penjualanKg) {
        valid = false;
        errorMessage = "Jumlah pembelian (kg) tidak boleh lebih besar dari jumlah penjualan (kg).";
        pembelianKgInput.focus();
    }

    if (!valid) {
        alert(errorMessage);
        event.preventDefault();
    }
});
