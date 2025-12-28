<?php
$start = microtime(true);
echo "<h1>Test Speed Server</h1>";
echo "Waktu sekarang: " . date('H:i:s') . "<br>";
echo "Koneksi Database: ";

// Coba koneksi manual ke DB
$mysqli = new mysqli("127.0.0.1", "root", "", "cv_dinamika");
if ($mysqli->connect_errno) {
    echo "Gagal: " . $mysqli->connect_error;
} else {
    echo "Berhasil (Cepat!)";
}

$end = microtime(true);
echo "<br><br>Total Waktu Load: " . round($end - $start, 4) . " detik.";
