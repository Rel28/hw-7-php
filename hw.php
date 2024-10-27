<?php

//Pendeklarasian Variabel
$tiketDewasa = 50000;
$tiketAnak = 30000;
$hargaAkhirPekan = 10000; // Kenaikan harga akhir pekan
$totalSementara = 0;

// Judul Sistem 
echo "=========================================\n";
echo "|   Sistem Pemesanan Tiket Sederhana    |\n";
echo "=========================================\n";

// Meminta input hari untuk menentukan hari pemesanan
echo "Pilihan hari nonton: \n1. Senin \n2. Selasa \n3. Rabu \n4. Kamis \n5. Jumat \n6. Sabtu \n7. Minggu \n";
echo "-----------------------------------------\n";
echo "Masukkan pilihan hari (1-7): ";
$pilihanHari = trim(fgets(STDIN)); // Mengambil input pengguna

// Update harga tiket jika hari adalah akhir pekan
if ($pilihanHari == "6" || $pilihanHari == "7") {
    $tiketDewasa += $hargaAkhirPekan; // Menambah biaya akhir pekan untuk tiket dewasa
    $tiketAnak += $hargaAkhirPekan; // Menambah biaya akhir pekan untuk tiket anak-anak
    echo "Anda memilih hari akhir pekan, harga tiket dewasa menjadi Rp $tiketDewasa, dan tiket anak-anak menjadi Rp $tiketAnak\n";
} else {
    echo "Anda memilih harga normal di hari biasa.\n";
}

do {
    // Pilihan Tiket
    echo "Pilihan tiket yang tersedia: \n1. Tiket Dewasa: Rp $tiketDewasa \n2. Tiket Anak-Anak: Rp $tiketAnak \n";
    echo "-----------------------------------------\n";
    echo "Note:\n*input yang diterima berupa angka,\nselain angka maka input ulang \n";
    echo "-----------------------------------------\n";

    // Ambil input dari pengguna
    echo "Masukkan pilihan tiket (1 untuk Dewasa, 2 untuk Anak-Anak): ";
    $pilihanTiket = trim(fgets(STDIN)); // Mengambil input dari pengguna

    // Cek jenis tiket berdasarkan input
    if ($pilihanTiket == "1") {
        echo "Anda memilih Tiket Dewasa dengan harga Rp " . $tiketDewasa . "\n";
        $hargaTiket = $tiketDewasa;
    } elseif ($pilihanTiket == "2") {
        echo "Anda memilih Tiket Anak-Anak dengan harga Rp " . $tiketAnak . "\n";
        $hargaTiket = $tiketAnak;
    } else {
        echo "Input tidak valid, silakan masukkan angka 1 atau 2.\n";
        continue; // Kembali ke awal loop jika input tidak valid
    }

    // Meminta jumlah tiket
    echo "Masukkan jumlah tiket yang ingin dibeli: ";
    $jumlahTiket = (int)trim(fgets(STDIN)); // Mengambil input dari pengguna

    // Hitung total harga tiket
    $totalHarga = $hargaTiket * $jumlahTiket;
    $totalSementara += $totalHarga;

    echo "-----------------------------------------\n";
    echo "Total harga untuk $jumlahTiket tiket: Rp " . $totalHarga . "\n";
    echo "Total keseluruhan harga sampai saat ini: Rp " . $totalSementara . "\n";

    // Tanya apakah pengguna ingin melanjutkan atau memilih lagi
    echo "Apakah Anda ingin melanjutkan (y/n) atau memilih tiket lagi? ";
    $lanjut = trim(fgets(STDIN)); // Mengambil input dari pengguna

} while (strtolower($lanjut) == 'y');

if ($totalSementara > 150000) {
    $diskon = $totalSementara * 0.1; // Menghitung diskon 10%
    $totalAkhir = $totalSementara - $diskon;
    echo "Selamat! Anda mendapatkan diskon 10% sebesar Rp " . $diskon . "\n";
    echo "Total akhir yang harus dibayar setelah diskon: Rp " . $totalAkhir . "\n";
} else {
    $totalSementara = $totalAkhir;
    echo "Total akhir yang harus dibayar: Rp " . $totalAkhir . "\n";
    echo "Maaf, Anda tidak mendapatkan diskon karena total pembelian kurang dari Rp 150.000.\n";
}

?>
